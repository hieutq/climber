<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_BOOK_MODIFY';

	// 設定配列
	$book_year_options = $CONFIG_BOOK_YEAR_TYPE;
	$book_genre_options = book_Genre_Data_Read_Options();

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
	// 最大値挿入ボタンが押された
	if( $_POST[ "SID_MAX_INSERT" ] != "" ){
		$_POST[ "SID_MAX_INSERT" ] = "";

		// セッションに格納（下記）
		book_Data_Session_Set($s_name);

		if ( $_SESSION[ $s_name ][ 'book_genre' ] > 0 ) {
			$max_sid = book_Data_Get_Max_Sid( $_SESSION[$s_name]['book_genre'] );
			$_SESSION[$s_name]['book_sid'] = $max_sid + 1;
		} else {
			$err_msg = 'ジャンルが選択されていません';
		}

	}

	// 編集ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// セッションに格納（下記）
		book_Data_Session_Set($s_name);

		$err_msg = book_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_modify_confirm.php" );
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
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/book_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------

	// データ読出
	if ( $_SESSION[ $s_name ] == NULL ) {

		$_SESSION[ $s_name ] = book_Data_Read_By_ID( $_SESSION[ 'JILM_BOOK_ID' ] );

	}

	// デフォルト値設定
	// --------------------------------------------------------




// ******************************************************************
	$action = "book_modify.php";
	$title  = "書籍情報 修正";
	$title2  = "編集";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];


function book_Data_Session_Set($s_name) {
	// 入力データを変数に変換
	$_SESSION[ $s_name ][ 'book_name' ]    = stripslashes( $_POST[ 'book_name' ] );
	$_SESSION[ $s_name ][ 'book_genre' ]   = stripslashes( $_POST[ 'book_genre' ] );
	$_SESSION[ $s_name ][ 'book_year' ]    = stripslashes( $_POST[ 'book_year' ] );
	$_SESSION[ $s_name ][ 'book_price1' ]  = stripslashes( $_POST[ 'book_price1' ] );
	$_SESSION[ $s_name ][ 'book_price2' ]  = stripslashes( $_POST[ 'book_price2' ] );
	$_SESSION[ $s_name ][ 'book_biko' ]    = stripslashes( $_POST[ 'book_biko' ] );
	$_SESSION[ $s_name ][ 'book_sid' ]     = stripslashes( $_POST[ 'book_sid' ] );

	if ( strpos( $_SESSION[ $s_name ][ 'book_price1' ], 'コピー' ) === FALSE  ) {
		$_SESSION[ $s_name ][ 'book_price1' ] = price_Re_Format( $_SESSION[ $s_name ][ 'book_price1' ] );
	}
	if ( strpos( $_SESSION[ $s_name ][ 'book_price2' ], 'コピー' ) === FALSE ) {
		$_SESSION[ $s_name ][ 'book_price2' ] = price_Re_Format( $_SESSION[ $s_name ][ 'book_price2' ] );
	}
	$_SESSION[ $s_name ][ 'book_sid' ] = mb_convert_kana($_SESSION[ $s_name ][ 'book_sid' ], 'n', 'UTF-8');
	$_SESSION[ $s_name ][ 'book_sid' ] = intval($_SESSION[ $s_name ][ 'book_sid' ]);
}

?>