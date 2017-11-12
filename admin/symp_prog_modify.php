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

	// 初期設定
	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_name ] = NULL;
	}

	$symp_id    = $_SESSION[ 'JILM_SYMP_ID' ];
	$program_id = $_SESSION[ 'JILM_SYMP_PROG_ID' ];

// リクエスト処理
// ----------------------------------------
	// 編集ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$_SESSION[ $s_name ][ 'program_name' ]  = stripslashes( $_POST[ 'program_name' ] );
		$_SESSION[ $s_name ][ 'program_time_text' ]  = stripslashes( $_POST[ 'program_time_text' ] );
		$_SESSION[ $s_name ][ 'kouensya_name' ]  = stripslashes( $_POST[ 'kouensya_name' ] );
		$_SESSION[ $s_name ][ 'kouensya_info01' ]  = stripslashes( $_POST[ 'kouensya_info01' ] );
		$_SESSION[ $s_name ][ 'program_biko01' ]  = stripslashes( $_POST[ 'program_biko01' ] );
		$_SESSION[ $s_name ][ 'start_time' ]  = stripslashes( $_POST[ 'start_time' ] );

		$err_msg = symp_Prog_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_prog_modify_confirm.php" );
			exit;
		}
	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// 戻り用セッションセット
			$_SESSION[ 'JILM_SYMP_ID' ]  = stripslashes( $_POST[ 'symp_id' ] );

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_prog_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------

	// データ読出
	if ( $_SESSION[ $s_name ] == NULL ) {

		$_SESSION[ $s_name ] = symp_Program_Data_Read_By_ID( $program_id );

	}

	// デフォルト値設定
	// --------------------------------------------------------



// ******************************************************************
	$action = "symp_prog_modify.php";
	$title  = "プログラム情報 修正";
	$title2  = "編集";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>