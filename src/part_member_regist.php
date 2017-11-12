<?php
// *******************************************************************
// インターネットサービス 新規登録　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_MEMBER_REGIST_FORM';

	// 設定配列
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE_MEMBER_REGIST;

	// 初期化
	$referer = $_SERVER["HTTP_REFERER"];
	// 初期化
	if( $referer ) {
		if ( strpos( $referer, '?mode=content&pid=72' ) ) {

		} else {
			$_SESSION[ $s_name ] = NULL;
		}

	} else {
		$_SESSION[ $s_name ] = NULL;
	};


// リクエスト処理
// ------------------------------------
if ( ! $config_login_flg ) {

	if ( $_POST[ 'MEMBER_REGIST_SEND' ] != '' ) {

		$_SESSION[ $s_name ][ 'member_userid' ]  = stripslashes( $_POST[ 'userid' ] );
		$_SESSION[ $s_name ][ 'member_name' ]    = stripslashes( $_POST[ 'name' ] );
		$_SESSION[ $s_name ][ 'member_kana' ]    = stripslashes( $_POST[ 'kana' ] );
		$_SESSION[ $s_name ][ 'member_info01' ]  = stripslashes( $_POST[ 'belong1' ] );
		$_SESSION[ $s_name ][ 'member_info02' ]  = stripslashes( $_POST[ 'belong2' ] );
		$_SESSION[ $s_name ][ 'member_mail' ]    = stripslashes( $_POST[ 'mail' ] );
		$_SESSION[ $s_name ][ 'member_zip1' ]    = stripslashes( $_POST[ 'zip1' ] );
		$_SESSION[ $s_name ][ 'member_zip2' ]    = stripslashes( $_POST[ 'zip2' ] );
		$_SESSION[ $s_name ][ 'member_address' ] = stripslashes( $_POST[ 'address' ] );
		$_SESSION[ $s_name ][ 'member_tel' ]     = stripslashes( $_POST[ 'tel' ] );
		$_SESSION[ $s_name ][ 'member_fax' ]     = stripslashes( $_POST[ 'fax' ] );
		$_SESSION[ $s_name ][ 'member_kubun01' ] = stripslashes( $_POST[ 'kubun' ] );

		$_SESSION[ $s_name ][ 'member_pass' ]   = stripslashes( $_POST[ 'pass1' ] );
		$_SESSION[ $s_name ][ 'member_pass_2' ] = stripslashes( $_POST[ 'pass2' ] );

		$err_msg = member_Error_Check_PC( $_SESSION[ $s_name ] );

		// 問題が無い場合
		if( $err_msg == "" ){

			// 認証なし(ninsyou_status=0)でDBに格納
			member_Mast_Insert_PC( $_SESSION[ $s_name ] );

			$mail_assign = get_Mail_Assign(); // 認証を追加

			$mail_main_text = <<<EOD

-------------------------------
■登録情報

[会員番号]
{$_SESSION[ $s_name ][ 'member_userid' ]}

[会員区分]
{$member_kubun01_type[ $_SESSION[ $s_name ][ 'member_kubun01' ] ]}

[氏名]
{$_SESSION[ $s_name ][ 'member_name' ]}

[カナ]
{$_SESSION[ $s_name ][ 'member_kana' ]}

[メールアドレス]
{$_SESSION[ $s_name ][ 'member_mail' ]}

[所属]
{$_SESSION[ $s_name ][ 'member_info01' ]} / {$_SESSION[ $s_name ][ 'member_info02' ]}

[所属住所]
{$_SESSION[ $s_name ][ 'member_zip1' ]} - {$_SESSION[ $s_name ][ 'member_zip2' ]}
{$_SESSION[ $s_name ][ 'member_address' ]}

[電話番号]
{$_SESSION[ $s_name ][ 'member_tel' ]}

[FAX番号]
{$_SESSION[ $s_name ][ 'member_fax' ]}


EOD;


			// 管理者にメール送信
			// -----------------------------------------
			$mail_data[ 'subject' ]     = 'インターネットサービスの新規登録がありました'; //件名
			$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
			$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
			$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
			$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

インターネットサービスの新規登録がありました。

{$mail_main_text}

{$mail_assign}


EOD;

			// メール送信処理１（管理者宛）
			$err_msg = common_mail_send_1( $mail_data );

			$mail_data = array();


			// ユーザーにメール送信
			// -----------------------------------------
			$mail_data[ 'subject' ]     = 'インターネットサービス会員に仮登録しました'; //件名
			$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
			$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
			$mail_data[ 'to' ]          = $_SESSION[ $s_name ][ 'member_mail' ]; //メールの宛先
			$mail_data[ 'body' ]        = <<<EOD

{$_SESSION[ $s_name ][ 'member_name' ]}様

インターネットサービスを仮登録しました。

{$mail_main_text}


{$mail_assign}


EOD;

			// メール送信処理１（ユーザー宛）
			$err_msg = common_mail_send_1( $mail_data );


			$_SESSION[ $s_name ] = NULL;

			// 完了画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=member_regist_fin" );
			exit;
		}

	}

	if ( $_POST[ 'RESET' ] != '' ) {

		$_SESSION[ $s_name ] = NULL;

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=content&pid=72" );
		exit;
	}

} else {
	$err_msg = 'すでに登録している方は重複登録はできません';
}

// データ読出
// ----------------------------------------




// ******************************************************************
	$dsp = $_SESSION[ $s_name ];

?>