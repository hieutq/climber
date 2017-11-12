<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_BOOK_GENRE_REGIST';

	// 設定配列
	$book_genre_order_type = $CONFIG_BOOK_GENRE_ORDER;

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


// リクエスト処理
// ----------------------------------------
	// 編集ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$_SESSION[ $s_name ][ 'genre_name' ]    = stripslashes( $_POST[ 'genre_name' ] );
		$_SESSION[ $s_name ][ 'genre_order' ]   = stripslashes( $_POST[ 'genre_order' ] );

		$err_msg = book_Genre_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_genre_regist_confirm.php" );
			exit;
		}

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_genre_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------



	// デフォルト値設定
	// --------------------------------------------------------



// ******************************************************************
	$action = "book_genre_regist.php";
	$title  = "書籍ジャンル情報 登録";
	$title2  = "新規登録";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];


?>