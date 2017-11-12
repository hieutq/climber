<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_SYMP_MODIFY';

	// 設定配列
	$year_options = $YEAR_TYPE;
	$month_options = $MONT_TYPE;
	$day_options = $DAYT_TYPE;
	$member_kubun01_type = $CONFIG_MEMBER_TYPE_SYMP;
	$view_status_options = $CONFIG_SYMP_VIEW_TYPE;

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
		$_SESSION[ $s_name ][ 'symp_name' ]        = stripslashes( $_POST[ 'symp_name' ] );
		$_SESSION[ $s_name ][ 'symp_subtitle' ]    = stripslashes( $_POST[ 'symp_subtitle' ] );
		$_SESSION[ $s_name ][ 'symp_syusai' ]      = stripslashes( $_POST[ 'symp_syusai' ] );
		$_SESSION[ $s_name ][ 'symp_kouen' ]       = stripslashes( $_POST[ 'symp_kouen' ] );
		$_SESSION[ $s_name ][ 'symp_kyousan' ]     = stripslashes( $_POST[ 'symp_kyousan' ] );
		$_SESSION[ $s_name ][ 'symp_date3_text' ]  = stripslashes( $_POST[ 'symp_date3_text' ] );
		$_SESSION[ $s_name ][ 'symp_place' ]       = stripslashes( $_POST[ 'symp_place' ] );
		$_SESSION[ $s_name ][ 'symp_price_text' ]  = stripslashes( $_POST[ 'symp_price_text' ] );
		$_SESSION[ $s_name ][ 'symp_capacity' ]    = stripslashes( $_POST[ 'symp_capacity' ] );
		$_SESSION[ $s_name ][ 'symp_biko01' ]      = stripslashes( $_POST[ 'symp_biko01' ] );
		$_SESSION[ $s_name ][ 'symp_biko02' ]      = stripslashes( $_POST[ 'symp_biko02' ] );
		$_SESSION[ $s_name ][ 'view_status' ]      = stripslashes( $_POST[ 'view' ] );
		$_SESSION[ $s_name ][ 'pay_way_view_status' ] = stripslashes( $_POST[ 'pay_way_view' ] );

		$_SESSION[ $s_name ][ 'symp_date1_y' ]  = stripslashes( $_POST[ 'symp_date1_y' ] );
		$_SESSION[ $s_name ][ 'symp_date1_m' ]  = stripslashes( $_POST[ 'symp_date1_m' ] );
		$_SESSION[ $s_name ][ 'symp_date1_d' ]  = stripslashes( $_POST[ 'symp_date1_d' ] );
		$_SESSION[ $s_name ][ 'symp_date1' ] = $_SESSION[ $s_name ][ 'symp_date1_y' ]
											 . $_SESSION[ $s_name ][ 'symp_date1_m' ]
											 . $_SESSION[ $s_name ][ 'symp_date1_d' ];

		$_SESSION[ $s_name ][ 'symp_date2_y' ]  = stripslashes( $_POST[ 'symp_date2_y' ] );
		$_SESSION[ $s_name ][ 'symp_date2_m' ]  = stripslashes( $_POST[ 'symp_date2_m' ] );
		$_SESSION[ $s_name ][ 'symp_date2_d' ]  = stripslashes( $_POST[ 'symp_date2_d' ] );
		$_SESSION[ $s_name ][ 'symp_date2' ] = $_SESSION[ $s_name ][ 'symp_date2_y' ]
											 . $_SESSION[ $s_name ][ 'symp_date2_m' ]
											 . $_SESSION[ $s_name ][ 'symp_date2_d' ];

		$_SESSION[ $s_name ][ 'symp_date3_y' ]  = stripslashes( $_POST[ 'symp_date3_y' ] );
		$_SESSION[ $s_name ][ 'symp_date3_m' ]  = stripslashes( $_POST[ 'symp_date3_m' ] );
		$_SESSION[ $s_name ][ 'symp_date3_d' ]  = stripslashes( $_POST[ 'symp_date3_d' ] );
		$_SESSION[ $s_name ][ 'symp_date3' ] = $_SESSION[ $s_name ][ 'symp_date3_y' ]
											 . $_SESSION[ $s_name ][ 'symp_date3_m' ]
											 . $_SESSION[ $s_name ][ 'symp_date3_d' ];

		// 世話人
		$sewa_info1_array = $_POST[ 'symp_sewa_info1' ];
		$sewa_name_array  = $_POST[ 'symp_sewa_name' ];

		$sewa_txt_array = array();
		$sewa_cnt = count( $sewa_info1_array );
		for( $i=0;$i<$sewa_cnt;$i++ ) {
			$sewa_info1 = stripslashes( $sewa_info1_array[$i] );
			$sewa_name = stripslashes( $sewa_name_array[$i] );

			$sewa_txt = $sewa_info1 . ' ' . $sewa_name;
			if ( $sewa_info1 != '' || $sewa_name != '' ) {
				$sewa_txt_array[] = $sewa_txt;
			}

			$_SESSION[ $s_name ][ 'sewanin_info1' ][$i] = $sewa_info1; // 表示用
			$_SESSION[ $s_name ][ 'sewanin_name' ][$i]  = $sewa_name;  // 表示用
		}
		$_SESSION[ $s_name ][ 'symp_sewa' ] = implode( "\n", $sewa_txt_array ); // DB登録用

		// 区分別料金
		$_SESSION[ $s_name ][ 'symp_pric1' ] = price_Combine( $_POST[ 'price1' ], $member_kubun01_type); // DB登録用テキスト
		$_SESSION[ $s_name ][ 'price1' ] = price_Apart($_SESSION[ $s_name ][ 'symp_pric1' ], $member_kubun01_type); // 表示用


		$err_msg = symp_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_modify_confirm.php" );
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
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------

	// データ読出
	if ( $_SESSION[ $s_name ] == NULL ) {

		$_SESSION[ $s_name ] = symposium_Data_Read_By_ID( $_SESSION[ 'JILM_SYMP_ID' ] );

	}

	// デフォルト値設定
	// --------------------------------------------------------
	if ( $_SESSION[ $s_name ][ 'symp_date1_y' ] == '' ){

		// 世話人
		$sewa_txt_array = explode( "\n", $_SESSION[ $s_name ][ 'symp_sewa' ] );

		$sewa_cnt = count( $sewa_txt_array );
		for( $i=0;$i<$sewa_cnt;$i++ ) {

			$pos = mb_strpos( $sewa_txt_array[$i], ' 名前',0, 'UTF-8');
			$len = mb_strlen( $sewa_txt_array[$i], 'UTF-8');

			$name_len = $len - 4 - $pos;

			$sewa_info1 = mb_substr( $sewa_txt_array[$i], 3, $pos - 3, 'UTF-8');
			$sewa_name = mb_substr( $sewa_txt_array[$i], $pos + 4, $name_len, 'UTF-8');

			$_SESSION[ $s_name ][ 'sewanin_info1' ][$i] = $sewa_info1; // 表示用
			$_SESSION[ $s_name ][ 'sewanin_name' ][$i]  = $sewa_name;  // 表示用

		}

		// 料金
		$_SESSION[ $s_name ][ 'price1' ] = price_Apart($_SESSION[ $s_name ][ 'symp_pric1' ], $CONFIG_MEMBER_TYPE); // 表示用

		// 時間系
		$_SESSION[ $s_name ][ 'symp_date1_y' ] = substr( $_SESSION[ $s_name ][ 'symp_date1' ], 0, 4);
		$_SESSION[ $s_name ][ 'symp_date1_m' ] = substr( $_SESSION[ $s_name ][ 'symp_date1' ], 4, 2);
		$_SESSION[ $s_name ][ 'symp_date1_d' ] = substr( $_SESSION[ $s_name ][ 'symp_date1' ], 6, 2);

		$_SESSION[ $s_name ][ 'symp_date2_y' ] = substr( $_SESSION[ $s_name ][ 'symp_date2' ], 0, 4);
		$_SESSION[ $s_name ][ 'symp_date2_m' ] = substr( $_SESSION[ $s_name ][ 'symp_date2' ], 4, 2);
		$_SESSION[ $s_name ][ 'symp_date2_d' ] = substr( $_SESSION[ $s_name ][ 'symp_date2' ], 6, 2);

		$_SESSION[ $s_name ][ 'symp_date3_y' ] = substr( $_SESSION[ $s_name ][ 'symp_date3' ], 0, 4);
		$_SESSION[ $s_name ][ 'symp_date3_m' ] = substr( $_SESSION[ $s_name ][ 'symp_date3' ], 4, 2);
		$_SESSION[ $s_name ][ 'symp_date3_d' ] = substr( $_SESSION[ $s_name ][ 'symp_date3' ], 6, 2);
	}



// ******************************************************************
	$action = "symp_modify.php";
	$title  = "シンポジウム・セミナー情報 修正";
	$title2  = "編集";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>