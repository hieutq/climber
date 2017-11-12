<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_BOOK_ORDER_LOOK';

	// 設定配列
	$member_kubun01_options = $CONFIG_MEMBER_TYPE;
	$book_genre_options     = book_Genre_Data_Read_Options();
	$member_bookBuy_login_type  = $CONFIG_MEMBER_BOOKBUY_LOGIN_TYPE;

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// 初期設定
	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_name ] = NULL;
	}

	// 前ページからのセッション
	$book_sell_id = $_SESSION[ 'JILM_BOOK_SELL_ID' ];

/*
// リクエスト処理
// ----------------------------------------
	// 編集ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$_SESSION[ $s_name ][ 'symp_name' ]        = stripslashes( $_POST[ 'symp_name' ] );
		$_SESSION[ $s_name ][ 'symp_subtitle' ]    = stripslashes( $_POST[ 'symp_subtitle' ] );
		$_SESSION[ $s_name ][ 'symp_syusai' ]      = stripslashes( $_POST[ 'symp_syusai' ] );
		$_SESSION[ $s_name ][ 'symp_kouen' ]       = stripslashes( $_POST[ 'symp_kouen' ] );
		$_SESSION[ $s_name ][ 'symp_kyousan' ]     = stripslashes( $_POST[ 'symp_kyousan' ] );
		$_SESSION[ $s_name ][ 'symp_date3_text' ]  = stripslashes( $_POST[ 'symp_date3_text' ] );
		$_SESSION[ $s_name ][ 'symp_place' ]       = stripslashes( $_POST[ 'symp_place' ] );
		$_SESSION[ $s_name ][ 'symp_price_text' ]  = stripslashes( $_POST[ 'symp_price_text' ] );
		$_SESSION[ $s_name ][ 'symp_capacity' ]    = stripslashes( $_POST[ 'symp_capacity' ] );
		$_SESSION[ $s_name ][ 'symp_biko01' ]      = stripslashes( $_POST[ 'symp_biko01' ] );
		$_SESSION[ $s_name ][ 'symp_biko02' ]      = stripslashes( $_POST[ 'symp_biko02' ] );


		$_SESSION[ $s_name ][ 'symp_date1_y' ]  = stripslashes( $_POST[ 'symp_date1_y' ] );
		$_SESSION[ $s_name ][ 'symp_date1_m' ]  = stripslashes( $_POST[ 'symp_date1_m' ] );
		$_SESSION[ $s_name ][ 'symp_date1_d' ]  = stripslashes( $_POST[ 'symp_date1_d' ] );
		$_SESSION[ $s_name ][ 'symp_date1' ] = $_SESSION[ $s_name ][ 'symp_date1_y' ]
											 . $_SESSION[ $s_name ][ 'symp_date1_m' ]
											 . $_SESSION[ $s_name ][ 'symp_date1_d' ];

		$_SESSION[ $s_name ][ 'symp_date2_y' ]  = stripslashes( $_POST[ 'symp_date2_y' ] );
		$_SESSION[ $s_name ][ 'symp_date2_m' ]  = stripslashes( $_POST[ 'symp_date2_m' ] );
		$_SESSION[ $s_name ][ 'symp_date2_d' ]  = stripslashes( $_POST[ 'symp_date2_d' ] );
		$_SESSION[ $s_name ][ 'symp_date2' ] = $_SESSION[ $s_name ][ 'symp_date2_y' ]
											 . $_SESSION[ $s_name ][ 'symp_date2_m' ]
											 . $_SESSION[ $s_name ][ 'symp_date2_d' ];

		$_SESSION[ $s_name ][ 'symp_date3_y' ]  = stripslashes( $_POST[ 'symp_date3_y' ] );
		$_SESSION[ $s_name ][ 'symp_date3_m' ]  = stripslashes( $_POST[ 'symp_date3_m' ] );
		$_SESSION[ $s_name ][ 'symp_date3_d' ]  = stripslashes( $_POST[ 'symp_date3_d' ] );
		$_SESSION[ $s_name ][ 'symp_date3' ] = $_SESSION[ $s_name ][ 'symp_date3_y' ]
											 . $_SESSION[ $s_name ][ 'symp_date3_m' ]
											 . $_SESSION[ $s_name ][ 'symp_date3_d' ];

		// 世話人
		$sewa_info1_array = $_POST[ 'symp_sewa_info1' ];
		$sewa_name_array  = $_POST[ 'symp_sewa_name' ];

		$sewa_txt_array = array();
		$sewa_cnt = count( $sewa_info1_array );
		for( $i=0;$i<$sewa_cnt;$i++ ) {
			$sewa_info1 = stripslashes( $sewa_info1_array[$i] );
			$sewa_name = stripslashes( $sewa_name_array[$i] );

			$sewa_txt = '所属：' . $sewa_info1 . ' 名前：' . $sewa_name;
			if ( $sewa_info1 != '' || $sewa_name != '' ) {
				$sewa_txt_array[] = $sewa_txt;
			}

			$_SESSION[ $s_name ][ 'sewanin_info1' ][$i] = $sewa_info1; // 表示用
			$_SESSION[ $s_name ][ 'sewanin_name' ][$i]  = $sewa_name;  // 表示用
		}
		$_SESSION[ $s_name ][ 'symp_sewa' ] = implode( "\n", $sewa_txt_array ); // DB登録用

		// 区分別料金
		$_SESSION[ $s_name ][ 'symp_pric1' ] = price_Combine( $_POST[ 'price1' ], $CONFIG_MEMBER_TYPE); // DB登録用テキスト
		$_SESSION[ $s_name ][ 'price1' ] = price_Apart($_SESSION[ $s_name ][ 'symp_pric1' ], $CONFIG_MEMBER_TYPE); // 表示用


		$err_msg = symp_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_modify_confirm.php" );
			exit;
		}


	}
*/
	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_order_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------

	// データ読出
	if ( $_SESSION[ $s_name ] == NULL ) {

		$_SESSION[ $s_name ] = log_Book_Sell_Read_By_ID( $book_sell_id );

	}

	// デフォルト値設定
	// --------------------------------------------------------
	// 料金計算
	$book_cnt = $_SESSION[ $s_name ][ 'book_cnt' ];

	if( $_SESSION[ $s_name ][ 'member_kubun01' ] == 99 ) {

		if ( strpos( $_SESSION[ $s_name ][ 'book_price1' ], 'コピー' )  === FALSE ) {

			$teika = price_Re_Format( $_SESSION[ $s_name ][ 'book_price1' ] );
			$book_price = $teika * $book_cnt;
			$book_price_info = '定価';

		} else {

			$member_kakaku = price_Re_Format( $_SESSION[ $s_name ][ 'book_price2' ] );
			$book_price = $member_kakaku * $book_cnt;
			$book_price_info = 'コピー価格';
		}

	} else {

		if ( strpos( $_SESSION[ $s_name ][ 'book_price1' ], 'コピー' )  === FALSE ) {

			$member_kakaku = price_Re_Format( $_SESSION[ $s_name ][ 'book_price2' ] );
			$book_price = $member_kakaku * $book_cnt;
			$book_price_info = '会員価格';

		} else {

			$member_kakaku = price_Re_Format( $_SESSION[ $s_name ][ 'book_price2' ] );
			$book_price = $member_kakaku * $book_cnt;
			$book_price_info = 'コピー価格';
		}

	}

	$book_price = price_Format( $book_price );


// ******************************************************************
	$action = "book_order_look.php";
	$title  = "書籍注文 確認";
	$title2  = "確認";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>