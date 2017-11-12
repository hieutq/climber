<?php

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_ADMIN_SANKASYA_REGIST';

	// 設定配列
	$year_options         = $YEAR_TYPE;
	$month_options        = $MONT_TYPE;
	$day_options          = $DAYT_TYPE;
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE;
	$pay_status_type      = $CONFIG_PAY_TYPE;
	$pay_way_type         = $CONFIG_PAY_WAY_TYPE_TAIKAI_SANKA;
	$pay_menu_type        = $CONFIG_PAY_MENU_TYPE_LONG;
	$bill_type            = $CONFIG_PAY_BILL_TYPE;

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}


// リクエスト処理
// ----------------------------------------
	// 確認ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] = "";

		// ページを戻る際に使用
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// セッション切れに対応
		// --------------------------------
		if ( $_SESSION[ $s_name ] == NULL ) {

			$_SESSION[ 'JILM_SANKASYA_ID' ]   = stripslashes( $_POST[ 'sankasya_id' ] );

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/sankasya_regist.php" );
			exit;

		}

		// 会員データ変更
		$member_update_flg = $_POST[ 'member_update' ];

		// DBに登録
		// --------------------------------
		sankasya_Data_Insert( $_SESSION[ $s_name ] );

		// セッションをクリア
		$_SESSION[ 'JILM_SANKASYA_ID' ] = NULL;
		$_SESSION[ $s_name ]   = NULL;

		// 一覧にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/sankasya_list.php" );
		exit;

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			$_SESSION[ 'JILM_CONVENTION_ID' ]   = stripslashes( $_POST[ 'convention_id' ] );
			$_SESSION[ 'JILM_SANKASYA_ID' ]   = stripslashes( $_POST[ 'sankasya_id' ] );

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/sankasya_regist.php" );
			exit;

	}


// 出力用整形
// ----------------------------------------

	// 入金日・入金予定日
	if ( $_SESSION[ $s_name ]['pay_date'] != '' ) {
		$pay_date_text = date_Format_1( $_SESSION[ $s_name ]['pay_date'] );
	} else {
		$pay_date_text = '<span style="color: #F00;">未入金</span>';
	}
	if ( $_SESSION[ $s_name ]['pay_date_plan'] != '' ) {
		$pay_date_plan_text = date_Format_1( $_SESSION[ $s_name ]['pay_date_plan'] );
	} else {
		$pay_date_plan_text = '---';
	}

	// 参加費の計算
	$pay_money = sankasya_Data_Calc_Price(
							$member_kubun = $_SESSION[ $s_name ][ 'member_kubun01' ],
							$sanka_array  = $_SESSION[ $s_name ][ 'sanka_menu_array' ],
							$conv_id      = $_SESSION[ $s_name ][ 'convention_id' ]
					);

	// 参加項目テキスト生成
	$sanka_menu_text = sankasya_Data_Get_Menu_Text(
							$sanka_array   = $_SESSION[ $s_name ][ 'sanka_menu_array' ],
							$pay_menu_type = $pay_menu_type,
							$separator     = '<br />'
					);



// ******************************************************************

	$action = "sankasya_regist_confirm.php";
	$title  = "参加者 登録確認";
	$title2  = "新規登録";
	$submit = "　登　録　";
	$submit_back = "　戻る　";


	$dsp = $_SESSION[ $s_name ];





?>