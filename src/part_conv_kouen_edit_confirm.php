<?php
// *******************************************************************
// 大会 講演 申込 編集　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_CONV_KOUENSYA_EDIT_FORM';

	// 大会ID取得
	$convention_id = convention_Data_Maxid_Get();

	// 設定配列
	$year_options  = $YEAR_TYPE;
	$month_options = $MONT_TYPE;
	$day_options   = $DAYT_TYPE;
	$pay_options   = $CONFIG_PAY_TYPE;
	$pay_way_type  = $CONFIG_PAY_WAY_TYPE;
	$hapyo_options = $CONFIG_HAPYO_TYPE;
	$kouen_type_options = convention_Type_Array_Read( $convention_id );
	$kouen_keishiki_options = $CONFIG_KOUEN_KEISHIKI;
	$member_kubun_options = $CONFIG_MEMBER_TYPE_KOUEN;
	$member_login_options = $CONFIG_MEMBER_LOGIN_STATUS_TYPE;
	$kouen_hapyo_uid_options = $CONFIG_HAPYO_UID_TYPE;
	$member_kubun_options_kouen = $CONFIG_MEMBER_TYPE_KOUEN;

	// 新しい講演申し込み分類
	$kouen_head_options=$kouen_keishiki_options;
	foreach($kouen_type_options as $key => $val) {
		if (strpos($key, 'T') !== false)
		{
			$kouen_head_options[$key]=$val;
		}
	}

	$kouen_section_style=( $_SESSION[ $s_name ][ 'kouen_head' ] == 1 ||  $_SESSION[ $s_name ][ 'kouen_head' ] == 3) ? '' : 'display: none;';


// リクエスト処理
// ------------------------------------
	if ( $_POST[ 'CONV_KOUEN_SEND' ] != '' ) {

		// セッション切れに対応
		// --------------------------------
		if ( $_SESSION[ $s_name ] == NULL ) {

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=conv_kouen_edit" );
			exit;

		}

		// 講演形式でセッションを操作する
		if ($_SESSION[ $s_name ]['kouen_head'] != 1 && $_SESSION[ $s_name ]['kouen_head'] != 3)
		{
			$_SESSION[ $s_name ]['kouen_section_head'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_1'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_2'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_3'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_4'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_5'] = 0;
		}

		// 書き込み処理
		// --------------------------------
		kouensya_Data_Update( $_SESSION[ $s_name ] );

		// ログイン状況取得
		if ( $config_login_flg ) {
			$_SESSION[ $s_name ][ 'login_flg' ] = 1;
		} else {
			$_SESSION[ $s_name ][ 'login_flg' ] = 0;
		}

		$convention_data = convention_Data_Read_By_ID( $_SESSION[ $s_name ][ 'convention_id' ] );
		$_SESSION[ $s_name ][ 'conv_name' ] = $convention_data[ 'conv_name' ];

		// メール送信
		// --------------------------------
		$mail_options['kouen_keishiki'] = $kouen_keishiki_options;
		$mail_options['kouen_type']     = $kouen_type_options;
		$mail_options['kouen_head']     = $kouen_head_options;
		$mail_options['kouen_section_head'] = $CONFIG_TYPE_SECTION_HEAD;
		$mail_options['kouen_section_head_1'] = $CONFIG_TYPE_SECTION_HEAD_1;
		$mail_options['kouen_section_head_2'] = $CONFIG_TYPE_SECTION_HEAD_2;
		$mail_options['kouen_section_head_3'] = $CONFIG_TYPE_SECTION_HEAD_3;
		$mail_options['kouen_section_head_4'] = $CONFIG_TYPE_SECTION_HEAD_4;
		$mail_options['kouen_section_head_5'] = $CONFIG_TYPE_SECTION_HEAD_5;
		$mail_options['member_kubun']   = $member_kubun_options;
		$mail_options['hapyo']          = $hapyo_options;
		$mail_options['pay_way']        = $pay_way_type;
		$mail_options['member_login']   = $member_login_options;
		kouensya_Data_Send_Mail( $_SESSION[ $s_name ], $mail_options, 'pc_modify' );

		// リダイレクト処理
		// --------------------------------
		// セッションクリア
		$_SESSION[ $s_name ]   = NULL;

		// 一覧にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/conv_kouen_edit_fin.php" );
		exit;

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

		// 一覧にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=conv_kouen_edit" );
		exit;

	}


// データ読出
// ----------------------------------------


	

// ******************************************************************
	$action = 'conv_kouen_edit_confirm.php';
	$dsp = $_SESSION[ $s_name ];








?>