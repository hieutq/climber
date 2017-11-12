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

// リクエスト処理
// ----------------------------------------
	// 編集ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] = "";

		// セッション切れに対応
		if ( $_SESSION[ $s_name ] == NULL ) {

			// セッション切れエラーを返す
			$_SESSION[ 'JILM_ERROR' ] = 'セッション切れです。もう一度ご入力下さい';

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_list.php" );
			exit;

		}

		// DBをUPDATE
		symposium_Data_Update( $arr = $_SESSION[ $s_name ], $id = $_SESSION[ $s_name ][ 'symp_id' ] );


		// セッションをクリア
		$_SESSION[ $s_name ] = NULL;

		// 確認画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_list.php" );
		exit;



	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_modify.php" );
			exit;
	}


// 出力用整形
// ----------------------------------------
	$symp_sewa = str_replace( "\n", '<br>', $_SESSION[ $s_name ][ 'symp_sewa' ] );
	$symp_date1 = date_Format_1( $_SESSION[ $s_name ][ 'symp_date1' ] );
	$symp_date2 = date_Format_1( $_SESSION[ $s_name ][ 'symp_date2' ] );
	$symp_date3 = date_Format_1( $_SESSION[ $s_name ][ 'symp_date3' ] );




// ******************************************************************
	$action = "symp_modify_confirm.php";
	$title  = "シンポジウム・セミナー情報 修正確認";
	$title2  = "編集確認";
	$submit = "　登 録　";
	$submit_back = "　編集画面に戻る　";

	$dsp = $_SESSION[ $s_name ];



?>