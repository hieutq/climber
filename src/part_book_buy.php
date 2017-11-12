<?php
// *******************************************************************
// 出版物　購入　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_BOOK_BUY';

	// 設定配列
	$book_genre_options = book_Genre_Data_Read_Options();
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE_BOOK;
	$member_bookBuy_login_type  = $CONFIG_MEMBER_BOOKBUY_LOGIN_TYPE;
	$book_cnt_options   = array( 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10 );

	$referer = $_SERVER["HTTP_REFERER"];
	// 初期化
	if( $referer ) {
		if ( strpos( $referer, '?mode=bookbuy' ) ) {

		} else {
			$_SESSION[ $s_name ] = NULL;
		}

	} else {
		$_SESSION[ $s_name ] = NULL;
	};

	// 本のID取得
	if ( $_GET[ 'ID' ] != '' ) {
		$book_id = intval( $_GET[ 'ID' ] );
		$_GET[ 'ID' ] = '';
	} else {
		header( 'Location: ./?mode_booklist' );
	}

// リクエスト処理
// ------------------------------------
	if ( $_POST[ 'BOOK_BUY' ] != '' ) {

		// 入力データを変数に変換
		// ログインしているときは会員情報から引っ張る
		if ( $config_login_flg ) {
			$member_data = member_Mast_Read_By_ID( $_SESSION[ LOGIN_SESSION_NAME ][ 'id' ] );
			$_SESSION[ $s_name ][ 'member_name' ]    = $member_data[ 'member_name' ];
			$_SESSION[ $s_name ][ 'member_userid' ]  = $member_data[ 'member_userid' ];
			$_SESSION[ $s_name ][ 'member_kubun01' ] = $member_data[ 'member_kubun01' ];
			$_SESSION[ $s_name ][ 'login_flg' ]      = 1; // ログインフラグもDBに保存
		} else {
			$_SESSION[ $s_name ][ 'member_name' ]        = stripslashes( $_POST[ 'name' ] );
			$_SESSION[ $s_name ][ 'member_kubun01' ]     = stripslashes( $_POST[ 'kubun' ] );
			$_SESSION[ $s_name ][ 'member_userid' ]      = stripslashes( $_POST[ 'userid' ] );
			$_SESSION[ $s_name ][ 'login_flg' ]          = 0;
		}

		$_SESSION[ $s_name ][ 'book_id' ]            = stripslashes( $_POST[ 'book_id' ] );
		$_SESSION[ $s_name ][ 'book_cnt' ]           = stripslashes( $_POST[ 'book_cnt' ] );

		$_SESSION[ $s_name ][ 'member_mail' ]        = stripslashes( $_POST[ 'mail' ] );
		$_SESSION[ $s_name ][ 'member_tel' ]         = stripslashes( $_POST[ 'tel' ] );
		$_SESSION[ $s_name ][ 'member_fax' ]         = stripslashes( $_POST[ 'fax' ] );
		$_SESSION[ $s_name ][ 'member_zip1' ]        = stripslashes( $_POST[ 'zip1' ] );
		$_SESSION[ $s_name ][ 'member_zip2' ]        = stripslashes( $_POST[ 'zip2' ] );
		$_SESSION[ $s_name ][ 'member_address' ]     = stripslashes( $_POST[ 'address' ] );
		$_SESSION[ $s_name ][ 'member_info01' ]      = stripslashes( $_POST[ 'belong1' ] );
		$_SESSION[ $s_name ][ 'member_info02' ]      = stripslashes( $_POST[ 'belong2' ] );

		$_SESSION[ $s_name ] = book_Buy_Adjust( $_SESSION[ $s_name ] );

		$err_msg = book_Buy_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			// 本データ読み込み
			$book_data = book_Data_Read_By_ID( $_SESSION[ $s_name ][ 'book_id' ] );

			// ログに書き出し
			$log_id = log_Book_Sell_Set( $_SESSION[ $s_name ] );

			$book_price_text = book_Buy_Calc_Price(
								$member_kubun01 = $_SESSION[ $s_name ]['member_kubun01' ], 
								$book_cnt       = $_SESSION[ $s_name ]['book_cnt' ], 
								$book_price1    = $book_data['book_price1' ], 
								$book_price2    = $book_data['book_price2' ]
							);

			$mail_assign = get_Mail_Assign();


			// 管理者にメール送信
			// -----------------------------------------
			$mail_data[ 'subject' ]     = '書籍注文[ID:' . $log_id . ']が入りました'; //件名
			$mail_data[ 'sender_mail' ] = CMN_SYSTEM_MAIL; //メールのFROM
			$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
			$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
			$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

書籍の注文が入りました。（注文番号：{$log_id}）
-------------------------------
■書籍情報

[書籍ID]
{$book_data[ 'book_id' ]}

[書籍名]
{$book_genre_options[ $book_data[ 'book_genre'] ]} No.{$book_data[ 'book_sid' ]}
{$book_data[ 'book_name' ]}

-------------------------------
■購入者情報

[氏名]
{$_SESSION[ $s_name ][ 'member_name' ]}

[会員区分]
{$member_kubun01_type[ $_SESSION[ $s_name ][ 'member_kubun01' ] ]}

[ログイン状況]
{$member_bookBuy_login_type[ $_SESSION[ $s_name ][ 'login_flg' ] ]}


-------------------------------
■注文内容

[合計金額]
{$book_price_text}

[書籍名]
{$book_genre_options[ $book_data[ 'book_genre'] ]} No.{$book_data[ 'book_sid' ]}
{$book_data[ 'book_name' ]}

[部数]
{$_SESSION[ $s_name ][ 'book_cnt' ]}部

[お届け先住所]
郵便番号：{$_SESSION[ $s_name ][ 'member_zip1' ]}-{$_SESSION[ $s_name ][ 'member_zip2' ]}
住所：{$_SESSION[ $s_name ][ 'member_address' ]}
所属：{$_SESSION[ $s_name ][ 'member_info01' ]} / {$_SESSION[ $s_name ][ 'member_info02' ]}
氏名：{$_SESSION[ $s_name ][ 'member_name' ]}
電話：{$_SESSION[ $s_name ][ 'member_tel' ]}


{$mail_assign}

EOD;


			// メール送信処理１（管理者宛）
			$err_msg = common_mail_send_1( $mail_data );


			// 購入者にメール送信
			// -----------------------------------------
			$mail_data2[ 'subject' ]     = '書籍注文ありがとうございました'; //件名
			$mail_data2[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
			$mail_data2[ 'fromname' ]    = '軽金属学会'; //FROMの名称（差出人名称)
			$mail_data2[ 'to' ]          = $_SESSION[ $s_name ][ 'member_mail' ]; //メールの宛先
			$mail_data2[ 'body' ]        = <<<EOD

{$_SESSION[ $s_name ][ 'member_name' ]}様

この度は、書籍のご注文ありがとうございました。
このメールは自動送信されています。

ご注文控え
-------------------------------
■注文内容

[合計金額]
{$book_price_text}

[書籍名]
{$book_genre_options[ $book_data[ 'book_genre'] ]} No.{$book_data[ 'book_sid' ]}
{$book_data[ 'book_name' ]}

[部数]
{$_SESSION[ $s_name ][ 'book_cnt' ]}部

[お届け先住所]
郵便番号：{$_SESSION[ $s_name ][ 'member_zip1' ]}-{$_SESSION[ $s_name ][ 'member_zip2' ]}
住所：{$_SESSION[ $s_name ][ 'member_address' ]}
所属：{$_SESSION[ $s_name ][ 'member_info01' ]} / {$_SESSION[ $s_name ][ 'member_info02' ]}
氏名：{$_SESSION[ $s_name ][ 'member_name' ]}
電話：{$_SESSION[ $s_name ][ 'member_tel' ]}


{$mail_assign}

EOD;

			// メール送信処理１（購入者宛）
			$err_msg = common_mail_send_1( $mail_data2 );

			// 完了ページ用にセッションキープ
			$_SESSION[ 'COMP_SESSION' ]['member_name' ] = $_SESSION[ $s_name ][ 'member_name' ];
			$_SESSION[ 'COMP_SESSION' ]['member_mail' ] = $_SESSION[ $s_name ][ 'member_mail' ];
			$_SESSION[ 'COMP_SESSION' ]['book_price_text' ] = $book_price_text;

			// セッションクリア
			$_SESSION[ $s_name ] = NULL;

			//リダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=bookbuy_fin" );
			exit;

		}


	}

	if ( $_POST[ 'BACK' ] != '' ) {


		$_SESSION[ $s_name ] = NULL;

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=booklist" );
		exit;
	}


// データ読み込み
// ------------------------------------
	// ログインしていた場合は会員情報を読み出す
	if ( $_SESSION[ $s_name ] == NULL ) {

		if ( $config_login_flg ) {

			$_SESSION[ $s_name ] = member_Mast_Read_By_ID( $_SESSION[ LOGIN_SESSION_NAME ][ 'id' ] );

		}
	}

	$login_flg = 0;
	// ログインチェックでテンプレ切り替え
	if ( $config_login_flg ) {
		$login_flg = 1;
	}

	// 本データ読み込み
	$book_data = book_Data_Read_By_ID( $book_id );


	if ( !strpos( $book_data['book_price1'], 'コピー' ) ) {
		$book_data['book_price1'] = price_Format($book_data['book_price1']);
	}
	$book_data['book_price2'] = price_Format($book_data['book_price2']);



// 出力設定
// ------------------------------------
	$dsp = $_SESSION[ $s_name ];



?>