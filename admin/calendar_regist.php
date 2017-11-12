<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_CALENDAR_REGIST';

	// 設定配列
	$year_options = $CONFIG_CALENDAR_YEAR_TYPE;
	$month_options = $MONT_TYPE;
	$day_options = $DAYT_TYPE;
	$colored_type = $CONFIG_CALENDAR_COLORED_TYPE;

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

		// セッションに格納
		$_SESSION[ $s_name ][ 'cal_date_text' ]    = stripslashes( $_POST[ 'date_text' ] );
		$_SESSION[ $s_name ][ 'cal_date_y' ]   = stripslashes( $_POST[ 'date_y' ] );
		$_SESSION[ $s_name ][ 'cal_date_m' ]    = stripslashes( $_POST[ 'date_m' ] );
		$_SESSION[ $s_name ][ 'cal_date_d' ]  = stripslashes( $_POST[ 'date_d' ] );
		$_SESSION[ $s_name ][ 'cal_text_1' ]  = stripslashes( $_POST[ 'text_1' ] );
		$_SESSION[ $s_name ][ 'cal_text_2' ]    = stripslashes( $_POST[ 'text_2' ] );
		$_SESSION[ $s_name ][ 'cal_link_1' ]     = stripslashes( $_POST[ 'link_1' ] );
		$_SESSION[ $s_name ][ 'cal_link_2' ]     = stripslashes( $_POST[ 'link_2' ] );
		$_SESSION[ $s_name ][ 'cal_syusai' ]     = stripslashes( $_POST[ 'syusai' ] );
		$_SESSION[ $s_name ][ 'cal_syusai_link' ]     = stripslashes( $_POST[ 'syusai_link' ] );
		$_SESSION[ $s_name ][ 'cal_colored' ]     = stripslashes( $_POST[ 'colored' ] );

		$_SESSION[ $s_name ][ 'cal_date' ] = $_SESSION[ $s_name ][ 'cal_date_y' ]
                                           . $_SESSION[ $s_name ][ 'cal_date_m' ]
                                           . $_SESSION[ $s_name ][ 'cal_date_d' ];

		$err_msg = calendar_Data_Error_Check($_SESSION[ $s_name ], 'admin_regist');

		// 問題が無い場合
		if( $err_msg == "" ){

			// DBにINSERT
			calendar_Data_Insert( $_SESSION[ $s_name ] );

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/calendar_list.php" );
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
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/calendar_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------



	// デフォルト値設定
	// --------------------------------------------------------
	if ( $_SESSION[ $s_name ] == NULL ) {
		$max_date = calendar_Data_MaxDate_Get();
		$_SESSION[ $s_name ][ 'cal_date_y' ] = substr( $max_date, 0, 4 );
		$_SESSION[ $s_name ][ 'cal_date_m' ] = substr( $max_date, 5, 2 );
		$_SESSION[ $s_name ][ 'cal_date_d' ] = substr( $max_date, 8, 2 );
	}


// ******************************************************************
	$action = "calendar_regist.php";
	$title  = "カレンダー情報 登録";
	$title2  = "新規登録";
	$submit = "　登 録　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];




?>