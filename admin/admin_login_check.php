<?php
// *******************************************************************
// 管理者ログインページ　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );

	// ログインボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// IDパス変数化
		$login_id = $_POST[ "login_id" ];
		$login_pw = $_POST[ "login_pw" ];

		// ログインIDパスチェック
		if( $login_id != "jilm" ){
			$err_msg = "ログインIDが違います。";
		}elseif( $login_pw != "zxasqw12" ){
			$err_msg = "パスワードが違います。";
		}

		if( $err_msg == "" ){
			// 次回ログイン用クッキーを発行（1ヶ月）
			setcookie("JILM_MEMBER_LOGIN_CHK", "ON", time() + 60*60*24*30);

			// フラグ設定
			$_SESSION[ "JILM_ADMIN_EDIT_FLG" ] = "ON";

			// インデックスページへ
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
				. dirname( $_SERVER[ "PHP_SELF" ] ) . "" );
			exit;
		}
	}

	// クッキーを持っている場合
	if( $_COOKIE[ "JILM_MEMBER_LOGIN_CHK" ] == "ON" ){

		// フラグ設定
		$_SESSION[ "JILM_ADMIN_EDIT_FLG" ] = "ON";

		// インデックスページへ
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "" );
		exit;

	}

?>