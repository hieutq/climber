<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_SYMP_PROG_MODIFY';

	// 設定配列
	$start_time_options = $CONFIG_STAR_TIME_TYPE;

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

		// 戻り用セッションセット
		$_SESSION[ 'JILM_SYMP_ID' ]  = stripslashes( $_POST[ 'symp_id' ] );

		// セッション切れに対応
		if ( $_SESSION[ $s_name ] == NULL ) {

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_prog_list.php" );
			exit;
		}

		// DBをUPDATE
		symp_Program_Data_Update( $arr = $_SESSION[ $s_name ], $id = $_SESSION[ $s_name ][ 'program_id' ] );

		// セッションをクリア
		$_SESSION[ $s_name ] = NULL;

		// 確認画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_prog_list.php" );
		exit;



	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_prog_modify.php" );
			exit;
	}


// 出力用整形
// ----------------------------------------





// ******************************************************************
	$action = "symp_prog_modify_confirm.php";
	$title  = "プログラム情報 修正確認";
	$title2  = "編集確認";
	$submit = "　登 録　";
	$submit_back = "　編集画面に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>