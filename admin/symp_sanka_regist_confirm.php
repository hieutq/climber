<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_SYMP_SANKA_REGIST';

	// 設定配列
	$year_options         = $YEAR_TYPE;
	$month_options        = $MONT_TYPE;
	$day_options          = $DAYT_TYPE;
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE_SYMP;
	$symp_pay_status_type = $CONFIG_PAY_TYPE;
	$symp_pay_way_type    = $CONFIG_PAY_WAY_TYPE_SYMP;
	$symp_pay_bill_type   = $CONFIG_PAY_BILL_TYPE;

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
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_sanka_regist.php?INIT_FLG=1" );
			exit;

		}

		// DBにINSERT
		symp_Sanka_Data_Insert( $_SESSION[ $s_name ] );

		// セッションをクリア
		$_SESSION[ $s_name ] = NULL;

		// 確認画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_sanka_list.php" );
		exit;

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_sanka_regist.php" );
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



// ******************************************************************
	$action = "symp_sanka_regist_confirm.php";
	$title  = "シンポジウム参加者情報 登録確認";
	$title2  = "登録確認";
	$submit = "　登 録　";
	$submit_back = "　編集画面に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>