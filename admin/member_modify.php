<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_MEMBER_MODIFY';

	// 設定配列


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
		$_SESSION[ $s_name ][ 'member_id' ]      = stripslashes( $_POST[ 'member_id' ] );
		$_SESSION[ $s_name ][ 'member_userid' ]  = stripslashes( $_POST[ 'member_userid' ] );
		$_SESSION[ $s_name ][ 'member_pass' ]    = stripslashes( $_POST[ 'member_pass' ] );
		$_SESSION[ $s_name ][ 'member_name' ]    = stripslashes( $_POST[ 'member_name' ] );
		$_SESSION[ $s_name ][ 'member_kana' ]    = stripslashes( $_POST[ 'member_kana' ] );
		$_SESSION[ $s_name ][ 'member_info01' ]  = stripslashes( $_POST[ 'member_info01' ] );
		$_SESSION[ $s_name ][ 'member_info02' ]  = stripslashes( $_POST[ 'member_info02' ] );
		$_SESSION[ $s_name ][ 'member_mail' ]    = stripslashes( $_POST[ 'member_mail' ] );
		$_SESSION[ $s_name ][ 'member_zip1' ]    = stripslashes( $_POST[ 'member_zip1' ] );
		$_SESSION[ $s_name ][ 'member_zip2' ]    = stripslashes( $_POST[ 'member_zip2' ] );
		$_SESSION[ $s_name ][ 'member_address' ] = stripslashes( $_POST[ 'member_address' ] );
		$_SESSION[ $s_name ][ 'member_tel' ]     = stripslashes( $_POST[ 'member_tel' ] );
		$_SESSION[ $s_name ][ 'member_fax' ]     = stripslashes( $_POST[ 'member_fax' ] );
		$_SESSION[ $s_name ][ 'member_kubun01' ] = stripslashes( $_POST[ 'member_kubun01' ] );

		$err_msg = member_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/member_modify_confirm.php" );
			exit;
		}


	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			$_SESSION[ $s_name ] = NULL;

			$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );
			$_SESSION[ 'JILM_KOUENSYA_ID' ]   = NULL;

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/member_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------

	// データ読出
	if ( $_SESSION[ $s_name ] == NULL ) {

		$_SESSION[ $s_name ] = member_Mast_Read_By_ID( $_SESSION[ 'JILM_MEMBER_ID' ] );

	}


// ******************************************************************
	$action = "member_modify.php";
	$title  = "会員情報 修正";
	$title2  = "編集";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];




?>