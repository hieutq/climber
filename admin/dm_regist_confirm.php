<?php


// 設定
// ----------------------------------------
	// 設定配列

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}


	if ( $_GET[ 'TYPE' ] != '' ) {
		$mail_type = intval( $_GET[ 'TYPE' ] );
		$_GET[ 'TYPE' ] = NULL;
	} else {
		$mail_type = 1;
	}

	// セッション名
	$s_name = 'JILM_ADMIN_DIRECT_MAIL_REGIST' . $mail_type;



// リクエスト処理
// ----------------------------------------
	if( $_POST[ "REGIST" ] != "" ){
		$_POST[ "REGIST" ] = "";

		// セッション切れに対応
		if ( $_SESSION[ $s_name ] == NULL ) {

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist.php?TYPE=" . $mail_type );
			exit;

		}

		// DBにINSERT
		DM_Data_Update( $_SESSION[ $s_name ] );

		// セッションをクリア
		$_SESSION[ $s_name ] = NULL;

		// コメント生成
		$_SESSION[ 'JILM_COMMENT' ] = 'メールを登録しました';

		// 確認画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist.php?TYPE=" . $mail_type );
		exit;

	}

	if( $_POST[ "REGIST_AND_SEND" ] != "" ){
		$_POST[ "REGIST_AND_SEND" ] = "";

		// セッション切れに対応
		if ( $_SESSION[ $s_name ] == NULL ) {

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist.php?TYPE=" . $mail_type );
			exit;

		}

		// DBにINSERT
		DM_Data_Update( $_SESSION[ $s_name ] );

		// メール送信
		DM_Data_Send( $_SESSION[ $s_name ] );

		// セッションをクリア
		$_SESSION[ $s_name ] = NULL;

		// コメント生成
		$_SESSION[ 'JILM_COMMENT' ] = 'メールを登録・送信しました。';

		// 確認画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist.php?TYPE=" . $mail_type );
		exit;

	}

	if( $_POST[ "SEND" ] != "" ){
		$_POST[ "SEND" ] = "";

		// セッション切れに対応
		if ( $_SESSION[ $s_name ] == NULL ) {

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist.php?TYPE=" . $mail_type );
			exit;

		}

		// メール送信
		DM_Data_Send( $_SESSION[ $s_name ] );

		// セッションをクリア
		$_SESSION[ $s_name ] = NULL;

		// コメント生成
		$_SESSION[ 'JILM_COMMENT' ] = 'メールを送信しました。';

		// 確認画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist.php?TYPE=" . $mail_type );
		exit;

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist.php?TYPE=" . $mail_type );
			exit;
	}



// データ読出
// ----------------------------------------



	// デフォルト値設定
	// --------------------------------------------------------



// ******************************************************************
	$action = "dm_regist_confirm.php?TYPE=" . $mail_type;
	$title  = "ダイレクトメール 登録";
	$title2  = "登録";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];


?>