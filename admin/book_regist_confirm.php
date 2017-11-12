<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_BOOK_REGIST';

	// 設定配列
	$book_year_options = $CONFIG_BOOK_YEAR_TYPE;
	$book_genre_options = book_Genre_Data_Read_Options();

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
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_list.php" );
			exit;

		}

		// DBにINSERT
		book_Data_Insert( $arr = $_SESSION[ $s_name ] );

		// セッションをクリア
		$_SESSION[ $s_name ] = NULL;

		// 確認画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_list.php" );
		exit;

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_regist.php" );
			exit;
	}


// 出力用整形
// ----------------------------------------







// ******************************************************************
	$action = "book_regist_confirm.php";
	$title  = "書籍情報 登録確認";
	$title2  = "登録確認";
	$submit = "　登 録　";
	$submit_back = "　編集画面に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>