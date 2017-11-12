<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_SYMP_PROG_REGIST';

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

	$symp_id = $_SESSION[ 'JILM_SYMP_ID' ];


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
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_prog_regist_confirm.php" );
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

	// デフォルト値設定
	// --------------------------------------------------------
	// シンポジウムIDをセット
	if ( $_SESSION[ $s_name ][ 'symp_id' ] == NULL ) {
		$_SESSION[ $s_name ][ 'symp_id' ] = $symp_id;
	}
	// 10時にセット
	if ( $_SESSION[ $s_name ][ 'start_time' ] == NULL ){ 
		$_SESSION[ $s_name ][ 'start_time' ] = 20;
	}

	



// ******************************************************************
	$action = "symp_prog_regist.php";
	$title  = "プログラム情報 登録";
	$title2  = "新規登録";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];




?>