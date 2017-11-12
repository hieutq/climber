<?php


// 設定
// ----------------------------------------
	// 設定配列

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// typeによって送信先振り分け
	// mail_type = 1 => 全会員宛DM
	// mail_type = 2 => 大会講演者宛DM
	// mail_type = 3 => 大会参加者宛DM
	// mail_type = 4 => シンポジウム参加者宛DM
	if ( $_GET[ 'TYPE' ] != '' ) {
		$mail_type = intval( $_GET[ 'TYPE' ] );
		$_GET[ 'TYPE' ] = NULL;
	} else {
		$mail_type = 1;
	}



	

	// セッション名
	$s_name = 'JILM_ADMIN_DIRECT_MAIL_REGIST' . $mail_type;

	// 初期設定
	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_name ] = NULL;
	}






// リクエスト処理
// ----------------------------------------
	// 編集ボタンが押された
	if( $_POST[ "CONFIRM" ] != "" ){
		$_POST[ "CONFIRM" ] = "";

		// 入力データを変数に変換
		$_SESSION[ $s_name ][ 'sender_name' ]   = stripslashes( $_POST[ 'sender_name' ] );
		$_SESSION[ $s_name ][ 'sender_mail' ]   = stripslashes( $_POST[ 'sender_mail' ] );
		$_SESSION[ $s_name ][ 'mail_title' ]    = stripslashes( $_POST[ 'mail_title' ] );
		$_SESSION[ $s_name ][ 'mail_body' ]     = stripslashes( $_POST[ 'mail_body' ] );
		$_SESSION[ $s_name ][ 'mail_type' ]     = stripslashes( $_POST[ 'mail_type' ] );

		$_SESSION[ $s_name ][ 'convention_id' ] = stripslashes( $_POST[ 'convention_id' ] );
		$_SESSION[ $s_name ][ 'symp_id' ]       = stripslashes( $_POST[ 'symp_id' ] );

		$err_msg = DM_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist_confirm.php?TYPE=" . $_SESSION[ $s_name ][ 'mail_type' ] );
			exit;
		}

	}

	// 戻るボタンが押された
	if( $_POST[ "RESET" ] != "" ){
		$_POST[ "RESET" ] = "";

			$mail_type     = stripslashes( $_POST[ 'mail_type' ] );

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/dm_regist.php?TYPE=" . $mail_type );
			exit;
	}

/*
	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_list.php" );
			exit;
	}
*/



// データ読出
// ----------------------------------------
	if ( $_SESSION[ $s_name ] == NULL ) {

		$_SESSION[ $s_name ] = DM_Data_Read_By_TYPE( $mail_type );

	}


	// デフォルト値設定
	// --------------------------------------------------------
	if ( $mail_type == 2 ) {
		$_SESSION[ $s_name ]['convention_id'] = $_SESSION[ 'JILM_CONVENTION_ID' ];
	}
	if ( $mail_type == 3 ) {
		$_SESSION[ $s_name ]['convention_id'] = $_SESSION[ 'JILM_CONVENTION_ID' ];
	}
	if ( $mail_type == 4 ) {
		$_SESSION[ $s_name ]['symp_id']       = $_SESSION[ 'JILM_SYMP_ID' ];
	}



	// コメント処理
	// --------------------------------------------------------
	if ( $_SESSION[ 'JILM_COMMENT' ] != '' ) {
		$comment_msg = $_SESSION[ 'JILM_COMMENT' ];
		$_SESSION[ 'JILM_COMMENT' ] = NULL;
	}

	// エラー処理
	// --------------------------------------------------------
	if ( $_SESSION[ 'JILM_ERROR' ] != '' ) {
		$err_msg = $_SESSION[ 'JILM_ERROR' ];
		$_SESSION[ 'JILM_ERROR' ] = NULL;
	}



// ******************************************************************
	$action = "dm_regist.php";
	$title  = "ダイレクトメール 登録";
	$title2  = "新規登録";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];





?>