<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_ADMIN_CONVENTION_REGIST';

	// 設定配列
	$year_options = $YEAR_TYPE;
	$month_options = $MONT_TYPE;
	$day_options = $DAYT_TYPE;
	$view_status_options = $CONFIG_CONVENTION_VIEW_TYPE;

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}


// リクエスト処理
// ----------------------------------------
	// 編集ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] = "";

		// セッション切れに対応
		if ( $_SESSION[ $s_name ] == NULL ) {

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_regist.php" );
			exit;

		}

		// DBにINSERT
		convention_Data_Insert( $_SESSION[ $s_name ] );

		// セッションをクリア
		$_SESSION[ $s_name ] = NULL;

		// 確認画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_list.php" );
		exit;

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_regist.php" );
			exit;
	}


// 出力用整形
// ----------------------------------------
	$kouen_open  = date_Format_1( $_SESSION[ $s_name ][ 'kouen_open' ] );
	$kouen_close = date_Format_1( $_SESSION[ $s_name ][ 'kouen_close' ] );
	$sanka_open  = date_Format_1( $_SESSION[ $s_name ][ 'sanka_open' ] );
	$sanka_close = date_Format_1( $_SESSION[ $s_name ][ 'sanka_close' ] );




// ******************************************************************
	$action = "convention_regist_confirm.php";
	$title  = "大会情報 登録確認";
	$title2  = "登録確認";
	$submit = "　登 録　";
	$submit_back = "　編集画面に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>