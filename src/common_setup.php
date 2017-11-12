<?php
// *******************************************************************
// 表画面 起動・設定読み込みプログラム　PHP　Encording UTF-8
// *******************************************************************

// ログインチェック
// ----------------------------------------
	// ログインセッション名(az_common_2.phpに記述）
	$login_s_name = LOGIN_SESSION_NAME;

	if ( member_Login_Check( $_SESSION[ $login_s_name ], $login_s_name ) ) {

		$login_member_data = member_Mast_Read_By_ID( $_SESSION[ $login_s_name ][ 'id' ] );
		$header_dsp[ 'member_name' ] = $login_member_data[ 'member_name' ];

		// headerテンプレ
		$header_contents = 'common_header_login.html';

		// ログインフラグ
		$config_login_flg = TRUE;

	} else {

		// 確実にセッションを消す
		$_SESSION[ $login_s_name ] = NULL;

		// headerテンプレ
		$header_contents = 'common_header.html';

		// ログインフラグ
		$config_login_flg = FALSE;

	}


?>