<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_ADMIN_KOUENSYA_MODIFY';

	// 設定配列
	$year_options = $YEAR_TYPE;
	$month_options = $MONT_TYPE;
	$day_options = $DAYT_TYPE;
	$pay_options = $CONFIG_PAY_TYPE;
	$pay_way_type = $CONFIG_PAY_WAY_TYPE;
	$hapyo_options = $CONFIG_HAPYO_TYPE;
	$kouen_type_options = convention_Type_Array_Read( $_SESSION[ 'JILM_CONVENTION_ID' ] );
	$kouen_keishiki_options = $CONFIG_KOUEN_KEISHIKI;
	$member_kubun_options = $CONFIG_MEMBER_TYPE_KOUEN;

	// 新しい講演申し込み分類
	$kouen_head_options=$kouen_keishiki_options;
	foreach($kouen_type_options as $key => $val) {
		if (strpos($key, 'T') !== false)
		{
			$kouen_head_options[$key]=$val;
		}
	}

	$kouen_section_style=( $_SESSION[ $s_name ][ 'kouen_head' ] == 1 ||  $_SESSION[ $s_name ][ 'kouen_head' ] == 3) ? '' : 'display: none;';

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

		// セッション切れに対応
		// --------------------------------
		if ( $_SESSION[ $s_name ] == NULL ) {

			// 戻り用にセッション格納
			$_SESSION[ 'JILM_KOUEN_ID' ] = stripslashes( $_POST[ 'kouen_id' ] );

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/kouensya_modify.php" );
			exit;

		}

		// 講演形式でセッションを操作する
		if ($_SESSION[ $s_name ]['kouen_head'] != 1 && $_SESSION[ $s_name ]['kouen_head'] != 3)
		{
			$_SESSION[ $s_name ]['kouen_section_head'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_1'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_2'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_3'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_4'] = 0;
			$_SESSION[ $s_name ]['kouen_section_head_5'] = 0;
		}

		// 書き込み処理
		// --------------------------------
		kouensya_Data_Update( $_SESSION[ $s_name ] );


		// リダイレクト処理
		// --------------------------------
		// セッションクリア
		$_SESSION[ 'JILM_CONVENTION_ID' ] = $_SESSION[ $s_name ][ 'convention_id' ];
		$_SESSION[ 'JILM_KOUEN_ID' ]   = NULL;
		$_SESSION[ $s_name ] = NULL;

		// 一覧にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/kouensya_list.php" );
		exit;


	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

		// 一覧にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/kouensya_modify.php" );
		exit;
	}



// 出力用整形
// ----------------------------------------
	if ( $_SESSION[ $s_name ][ 'pay_status' ] == 2 ) {
		$pay_date  = date_Format_1( $_SESSION[ $s_name ][ 'pay_date' ] );
	} else {
		$pay_date  = '---';
	}

// ******************************************************************
	$action = "kouensya_modify_confirm.php";
	$title  = "講演申込 編集";
	$title2  = "編集";
	$submit = "　登 録　";
	$submit_back = "　編集に戻る　";

	$dsp = $_SESSION[ $s_name ];


?>