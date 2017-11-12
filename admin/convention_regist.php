<?php

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_ADMIN_CONVENTION_REGIST';

	// 設定配列
	$year_options = $YEAR_TYPE;
	$month_options = $MONT_TYPE;
	$day_options = $DAYT_TYPE;
	$member_type_options = $CONFIG_MEMBER_TYPE;
	$view_status_options = $CONFIG_CONVENTION_VIEW_TYPE;

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
	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		// --------------------------------
		$_SESSION[ $s_name ][ 'convention_id' ]  = stripslashes( $_POST[ 'convention_id' ] );

		// 基本情報
		$_SESSION[ $s_name ][ 'conv_name' ]   = stripslashes( $_POST[ 'conv_name' ] );
		$_SESSION[ $s_name ][ 'conv_open' ]   = stripslashes( $_POST[ 'conv_open' ] );
		$_SESSION[ $s_name ][ 'conv_place' ]  = stripslashes( $_POST[ 'conv_place' ] );
		$_SESSION[ $s_name ][ 'view_status' ] = stripslashes( $_POST[ 'view' ] );

		// 公演開始
		$_SESSION[ $s_name ][ 'kouen_open_y' ]  = stripslashes( $_POST[ 'kouen_open_y' ] );
		$_SESSION[ $s_name ][ 'kouen_open_m' ]  = stripslashes( $_POST[ 'kouen_open_m' ] );
		$_SESSION[ $s_name ][ 'kouen_open_d' ]  = stripslashes( $_POST[ 'kouen_open_d' ] );
		$_SESSION[ $s_name ][ 'kouen_open' ] = $_SESSION[ $s_name ][ 'kouen_open_y' ]
											 . $_SESSION[ $s_name ][ 'kouen_open_m' ]
											 . $_SESSION[ $s_name ][ 'kouen_open_d' ];
		// 公演締切
		$_SESSION[ $s_name ][ 'kouen_close_y' ] = stripslashes( $_POST[ 'kouen_close_y' ] );
		$_SESSION[ $s_name ][ 'kouen_close_m' ] = stripslashes( $_POST[ 'kouen_close_m' ] );
		$_SESSION[ $s_name ][ 'kouen_close_d' ] = stripslashes( $_POST[ 'kouen_close_d' ] );
		$_SESSION[ $s_name ][ 'kouen_close' ] = $_SESSION[ $s_name ][ 'kouen_close_y' ]
											  . $_SESSION[ $s_name ][ 'kouen_close_m' ]
											  . $_SESSION[ $s_name ][ 'kouen_close_d' ];
		// 参加開始
		$_SESSION[ $s_name ][ 'sanka_open_y' ]  = stripslashes( $_POST[ 'sanka_open_y' ] );
		$_SESSION[ $s_name ][ 'sanka_open_m' ]  = stripslashes( $_POST[ 'sanka_open_m' ] );
		$_SESSION[ $s_name ][ 'sanka_open_d' ]  = stripslashes( $_POST[ 'sanka_open_d' ] );
		$_SESSION[ $s_name ][ 'sanka_open' ] = $_SESSION[ $s_name ][ 'sanka_open_y' ]
											 . $_SESSION[ $s_name ][ 'sanka_open_m' ]
											 . $_SESSION[ $s_name ][ 'sanka_open_d' ];
		// 参加締切
		$_SESSION[ $s_name ][ 'sanka_close_y' ] = stripslashes( $_POST[ 'sanka_close_y' ] );
		$_SESSION[ $s_name ][ 'sanka_close_m' ] = stripslashes( $_POST[ 'sanka_close_m' ] );
		$_SESSION[ $s_name ][ 'sanka_close_d' ] = stripslashes( $_POST[ 'sanka_close_d' ] );
		$_SESSION[ $s_name ][ 'sanka_close' ]   = $_SESSION[ $s_name ][ 'sanka_close_y' ]
											    . $_SESSION[ $s_name ][ 'sanka_close_m' ]
											    . $_SESSION[ $s_name ][ 'sanka_close_d' ];

		// 料金
		$p1_arr   = $_POST[ "p1_arr" ];
		$p2_arr   = $_POST[ "p2_arr" ];
		$p3_arr   = $_POST[ "p3_arr" ];

		// 区分-料金,区分-料金,,,,のテキストへ
		$_SESSION[ $s_name ][ 'price01' ] =  price_Combine( $p1_arr, $CONFIG_MEMBER_TYPE );
		$_SESSION[ $s_name ][ 'price02' ] =  price_Combine( $p2_arr, $CONFIG_MEMBER_TYPE );
		$_SESSION[ $s_name ][ 'price03' ] =  price_Combine( $p3_arr, $CONFIG_MEMBER_TYPE );

		// 区分=>料金,区分=>料金,,,,の配列へ
		$_SESSION[ $s_name ][ 'p1_arr' ]   = price_Apart( $_SESSION[ $s_name ][ 'price01' ] );
		$_SESSION[ $s_name ][ 'p2_arr' ]   = price_Apart( $_SESSION[ $s_name ][ 'price02' ] );
		$_SESSION[ $s_name ][ 'p3_arr' ]   = price_Apart( $_SESSION[ $s_name ][ 'price03' ] );


		// 講演分類
		$type_cnt = count( $_POST[ "c_type" ] );
		for ( $i=0;$i<$type_cnt;$i++ ) {
			$_SESSION[ $s_name ]['c_type' ][$i] = stripslashes( $_POST[ "c_type" ][$i] );
			$_SESSION[ $s_name ]['c_body' ][$i] = stripslashes( $_POST[ "c_body" ][$i] );
		}

		// タブ区切りへ
		$_SESSION[ $s_name ][ 'type_text' ] = implode( "\t", $_SESSION[ $s_name ]['c_type' ] );
		$_SESSION[ $s_name ][ 'body_text' ] = implode( "\t", $_SESSION[ $s_name ]['c_body' ] );

		$err_msg = convention_Error_Check( $_SESSION[ $s_name ] );

		// 問題が無い場合
		if( $err_msg == "" ){

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_regist_confirm.php" );
			exit;

		}

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK_TO_LIST" ] != "" ){
		$_POST[ "BACK_TO_LIST" ] = "";

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_list.php" );
			exit;

	}



// データ読出
// ----------------------------------------

	if ( $_SESSION[ $s_name ] == NULL ) {

		// 分類　初期設定　読込
		$cate_data = convention_Cate_Data_Read();
		$_SESSION[ $s_name ]['c_type' ] = $cate_data['convention_cate_type' ];
		$_SESSION[ $s_name ]['c_body' ] = $cate_data['convention_cate_body' ];

		// 料金　初期設定　読込
		$price_data  = convention_Price_Data_Read();
		$_SESSION[ $s_name ][ 'p1_arr' ] = $price_data[1];
		$_SESSION[ $s_name ][ 'p2_arr' ] = $price_data[2];
		$_SESSION[ $s_name ][ 'p3_arr' ] = $price_data[3];

		// 日程関連
		$_SESSION[ $s_name ][ 'kouen_open_y' ]  = date( 'Y' );
		$_SESSION[ $s_name ][ 'kouen_open_m' ]  = date( 'm' );
		$_SESSION[ $s_name ][ 'kouen_open_d' ]  = date( 'd' );
		$_SESSION[ $s_name ][ 'kouen_close_y' ] = date( 'Y' );
		$_SESSION[ $s_name ][ 'kouen_close_m' ] = date( 'm' );
		$_SESSION[ $s_name ][ 'kouen_close_d' ] = date( 'd' );
		$_SESSION[ $s_name ][ 'sanka_open_y' ]  = date( 'Y' );
		$_SESSION[ $s_name ][ 'sanka_open_m' ]  = date( 'm' );
		$_SESSION[ $s_name ][ 'sanka_open_d' ]  = date( 'd' );
		$_SESSION[ $s_name ][ 'sanka_close_y' ] = date( 'Y' );
		$_SESSION[ $s_name ][ 'sanka_close_m' ] = date( 'm' );
		$_SESSION[ $s_name ][ 'sanka_close_d' ] = date( 'd' );

	}

	// セッションエラー等、確認ページからリダイレクトした場合
	// --------------------------------------------------------
	if ( $_SESSION[ 'JILM_ERROR' ] != '' ) {
		$err_msg = $_SESSION[ 'JILM_ERROR' ];
		$_SESSION[ 'JILM_ERROR' ] = NULL;
	}


// ******************************************************************

	$action = "convention_regist.php";
	$title  = "大会登録・編集";
	$title2  = "新規登録";
	$submit = "　確　認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>