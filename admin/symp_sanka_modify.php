<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_SYMP_SANKA_MODIFY';

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

	// 初期設定
	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_name ] = NULL;
	}

	// 前ページより引き継ぎ
	$symp_id  = $_SESSION[ 'JILM_SYMP_ID' ];
	$sanka_id = $_SESSION[ 'JILM_SYMP_SANKA_ID' ];

// リクエスト処理
// ----------------------------------------
	if( $_POST[ "MEMBER_READ" ] != "" ){
		$_POST[ "MEMBER_READ" ] = "";

		// ユーザーIDから会員情報読込
		$member_userid  = stripslashes( $_POST[ 'member_userid' ] );
		$_SESSION[ $s_name ] = member_Mast_Read_By_UserID( $member_userid );

		// 入金情報をセッションセット
		// この下部に記述
		symp_Sanka_Data_Session_Set($s_name);

	}

	// 編集ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 常に現在登録されている申込者のユーザーIDを読み込む（重複登録を避けるため）
		$old_datas = symp_Sanka_Data_Read_By_ID( $_SESSION[ 'JILM_SYMP_SANKA_ID' ] );
		$_SESSION[ $s_name ][ 'old_member_userid' ] = $old_datas[ 'member_userid' ];

		// 会員情報をセッションセット
		$_SESSION[ $s_name ][ 'member_id' ]      = stripslashes( $_POST[ 'member_id' ] );
		$_SESSION[ $s_name ][ 'member_userid' ]  = stripslashes( $_POST[ 'member_userid' ] );
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

		// 入金情報をセッションセット
		// この下部に記述
		symp_Sanka_Data_Session_Set($s_name);

		// 入力を調節
		$_SESSION[ $s_name ] = symp_Sanka_Adjust( $_SESSION[ $s_name ] );

		// エラーチェック
		$err_msg = symp_Sanka_Error_Check($_SESSION[ $s_name ], 'admin_modify');

		// 問題が無い場合
		if( $err_msg == "" ){

			// 確認画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_sanka_modify_confirm.php" );
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
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_sanka_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------

	// データ読出
	if ( $_SESSION[ $s_name ] == NULL ) {

		$_SESSION[ $s_name ] = symp_Sanka_Data_Read_By_ID( $sanka_id );

	}

	// 常に現在登録されている申込者のユーザーIDを読み込む（重複登録を避けるため）
	$old_datas = symp_Sanka_Data_Read_By_ID( $_SESSION[ 'JILM_SYMP_SANKA_ID' ] );
	$_SESSION[ $s_name ][ 'old_member_userid' ] = $old_datas[ 'member_userid' ];

	// デフォルト値設定
	// --------------------------------------------------------
	if ( $_SESSION[ $s_name ][ 'pay_date_y' ] == '' ) {
		$_SESSION[ $s_name ][ 'pay_date_y' ] = date( 'Y' );
		$_SESSION[ $s_name ][ 'pay_date_m' ] = date( 'm' );
		$_SESSION[ $s_name ][ 'pay_date_d' ] = date( 'd' );
	}
	$_SESSION[ $s_name ][ 'pay_date_plan_y' ] = substr( $_SESSION[ $s_name ][ 'pay_date_plan' ], 0, 4 );
	$_SESSION[ $s_name ][ 'pay_date_plan_m' ] = substr( $_SESSION[ $s_name ][ 'pay_date_plan' ], 4, 2 );
	$_SESSION[ $s_name ][ 'pay_date_plan_d' ] = substr( $_SESSION[ $s_name ][ 'pay_date_plan' ], 6, 2 );

	// セッションエラー等、確認ページからリダイレクトした場合
	// --------------------------------------------------------
	if ( $_SESSION[ 'JILM_ERROR' ] != '' ) {
		$err_msg = $_SESSION[ 'JILM_ERROR' ];
		$_SESSION[ 'JILM_ERROR' ] = NULL;
	}



// ******************************************************************
	$action = "symp_sanka_modify.php";
	$title  = "シンポジウム参加者情報 修正";
	$title2  = "編集";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];

// ページ内共通処理をfunction化
function symp_Sanka_Data_Session_Set($s_name) {

	// 紹介者情報をセッションセット
	$_SESSION[ $s_name ][ 'intro_name' ]     = stripslashes( $_POST[ 'intro_name' ] );
	$_SESSION[ $s_name ][ 'intro_info01' ]   = stripslashes( $_POST[ 'intro_info01' ] );
	$_SESSION[ $s_name ][ 'intro_info02' ]   = stripslashes( $_POST[ 'intro_info02' ] );
	$_SESSION[ $s_name ][ 'intro_zip1' ]     = stripslashes( $_POST[ 'intro_zip1' ] );
	$_SESSION[ $s_name ][ 'intro_zip2' ]     = stripslashes( $_POST[ 'intro_zip2' ] );
	$_SESSION[ $s_name ][ 'intro_address' ]  = stripslashes( $_POST[ 'intro_address' ] );
	$_SESSION[ $s_name ][ 'intro_tel' ]      = stripslashes( $_POST[ 'intro_tel' ] );

	// 入金情報をセッションセット
	$_SESSION[ $s_name ][ 'sanka_id' ]      = stripslashes( $_POST[ 'sanka_id' ] );
	$_SESSION[ $s_name ][ 'symp_id' ]       = stripslashes( $_POST[ 'symp_id' ] );
	$_SESSION[ $s_name ][ 'pay_way' ]       = stripslashes( $_POST[ 'pay_way' ] );
	$_SESSION[ $s_name ][ 'pay_way_text' ]  = stripslashes( $_POST[ 'pay_way_text' ] );
	$_SESSION[ $s_name ][ 'sanka_biko1' ]   = stripslashes( $_POST[ 'sanka_biko1' ] );
	$_SESSION[ $s_name ][ 'pay_bill' ]      = stripslashes( $_POST[ 'pay_bill' ] );
	$_SESSION[ $s_name ][ 'pay_date_y' ]    = stripslashes( $_POST[ 'pay_date_y' ] );
	$_SESSION[ $s_name ][ 'pay_date_m' ]    = stripslashes( $_POST[ 'pay_date_m' ] );
	$_SESSION[ $s_name ][ 'pay_date_d' ]    = stripslashes( $_POST[ 'pay_date_d' ] );

	$_SESSION[ $s_name ][ 'pay_status' ]    = stripslashes( $_POST[ 'pay_status' ] );
	$_SESSION[ $s_name ][ 'pay_date' ] = "";
	if ( $_SESSION[ $s_name ][ 'pay_status' ] == 2 ) {
		$_SESSION[ $s_name ][ 'pay_date' ]  = $_SESSION[ $s_name ][ 'pay_date_y' ];
		$_SESSION[ $s_name ][ 'pay_date' ] .= $_SESSION[ $s_name ][ 'pay_date_m' ];
		$_SESSION[ $s_name ][ 'pay_date' ] .= $_SESSION[ $s_name ][ 'pay_date_d' ];
	}
	$_SESSION[ $s_name ][ 'pay_date_plan_y' ] = stripslashes( $_POST[ 'pay_date_plan_y' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan_m' ] = stripslashes( $_POST[ 'pay_date_plan_m' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan_d' ] = stripslashes( $_POST[ 'pay_date_plan_d' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan' ] = "";
	if ( $_SESSION[ $s_name ][ 'pay_date_plan_y' ] != '' ) {
		$_SESSION[ $s_name ][ 'pay_date_plan' ]  = $_SESSION[ $s_name ][ 'pay_date_plan_y' ];
		$_SESSION[ $s_name ][ 'pay_date_plan' ] .= $_SESSION[ $s_name ][ 'pay_date_plan_m' ];
		$_SESSION[ $s_name ][ 'pay_date_plan' ] .= $_SESSION[ $s_name ][ 'pay_date_plan_d' ];
	}
}

?>