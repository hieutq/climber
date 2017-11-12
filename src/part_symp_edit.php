<?php
// *******************************************************************
// シンポジウム参加　編集　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_SYMP_SANKA_EDIT_FORM';

	// 設定配列
	$year_options         = $YEAR_TYPE;
	$month_options        = $MONT_TYPE;
	$day_options          = $DAYT_TYPE;
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE_SYMP;
	$symp_pay_status_type = $CONFIG_PAY_TYPE;
	$symp_pay_way_type    = $CONFIG_PAY_WAY_TYPE_SYMP;
	$symp_pay_bill_type   = $CONFIG_PAY_BILL_TYPE;
	$member_login_options = $CONFIG_MEMBER_LOGIN_STATUS_TYPE;


	// 初期化
	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_name ] = NULL;
	}

	// シンポジウム情報読み込み
	if ( $_GET[ 'ID' ] != '' ) {
		$symp_id = intval( $_GET[ 'ID' ] );
		$_GET[ 'ID' ] = '';
	}


// リクエスト処理
// ------------------------------------
if ( $_POST[ 'SYMP_SANKA_SEND' ] != '' ) {

	// DBから登録情報を直接読み込み
	$search_array[ 'symp_sanka_data.symp_id' ] = stripslashes( $_POST[ 'symp_id' ] );
	$search_array[ 'symp_sanka_member_mast.member_userid' ]  = $_SESSION[ LOGIN_SESSION_NAME ][ 'userid' ];
	$search_array[ 'symp_sanka_data.status' ]        = 0;
	$symp_member_data = symp_Sanka_Data_Custom( $search_array );

	$_SESSION[ $s_name ][ 'member_userid' ]  = $symp_member_data[ 'member_userid' ];
	$_SESSION[ $s_name ][ 'member_name' ]    = $symp_member_data[ 'member_name' ];
	$_SESSION[ $s_name ][ 'member_kana' ]    = $symp_member_data[ 'member_kana' ];
	$_SESSION[ $s_name ][ 'member_mail' ]    = $symp_member_data[ 'member_mail' ];
	$_SESSION[ $s_name ][ 'member_kubun01' ] = $symp_member_data[ 'member_kubun01' ];

	$_SESSION[ $s_name ][ 'sanka_id' ]    = $symp_member_data[ 'sanka_id' ];
	$_SESSION[ $s_name ][ 'member_id' ]   = $symp_member_data[ 'member_id' ];

	// 残りの情報はフォームから読み込み
	$_SESSION[ $s_name ][ 'member_info01' ]  = stripslashes( $_POST[ 'belong1' ] );
	$_SESSION[ $s_name ][ 'member_info02' ]  = stripslashes( $_POST[ 'belong2' ] );
	$_SESSION[ $s_name ][ 'member_zip1' ]    = stripslashes( $_POST[ 'zip1' ] );
	$_SESSION[ $s_name ][ 'member_zip2' ]    = stripslashes( $_POST[ 'zip2' ] );
	$_SESSION[ $s_name ][ 'member_address' ] = stripslashes( $_POST[ 'address' ] );
	$_SESSION[ $s_name ][ 'member_tel' ]     = stripslashes( $_POST[ 'tel' ] );
	$_SESSION[ $s_name ][ 'member_fax' ]     = stripslashes( $_POST[ 'fax' ] );

	// 紹介者情報をセッションセット
	$_SESSION[ $s_name ][ 'intro_name' ]     = stripslashes( $_POST[ 'syoukai_name' ] );
	$_SESSION[ $s_name ][ 'intro_info01' ]   = stripslashes( $_POST[ 'syoukai_belong1' ] );
	$_SESSION[ $s_name ][ 'intro_info02' ]   = stripslashes( $_POST[ 'syoukai_belong2' ] );
	$_SESSION[ $s_name ][ 'intro_zip1' ]     = stripslashes( $_POST[ 'syoukai_zip1' ] );
	$_SESSION[ $s_name ][ 'intro_zip2' ]     = stripslashes( $_POST[ 'syoukai_zip2' ] );
	$_SESSION[ $s_name ][ 'intro_address' ]  = stripslashes( $_POST[ 'syoukai_address' ] );
	$_SESSION[ $s_name ][ 'intro_tel' ]      = stripslashes( $_POST[ 'syoukai_tel' ] );

	// 入金情報をセッションセット
	$_SESSION[ $s_name ][ 'symp_id' ]       = stripslashes( $_POST[ 'symp_id' ] );
	$_SESSION[ $s_name ][ 'pay_way' ]       = stripslashes( $_POST[ 'shiharai' ] );
	$_SESSION[ $s_name ][ 'pay_way_text' ]  = stripslashes( $_POST[ 'shiharai_text' ] );
	$_SESSION[ $s_name ][ 'sanka_biko1' ]   = stripslashes( $_POST[ 'bikou' ] );
	$_SESSION[ $s_name ][ 'pay_bill' ]      = stripslashes( $_POST[ 'seikyusyo' ] );

	$_SESSION[ $s_name ][ 'pay_date_plan_y' ] = stripslashes( $_POST[ 'pay_plan_y' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan_m' ] = stripslashes( $_POST[ 'pay_plan_m' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan_d' ] = stripslashes( $_POST[ 'pay_plan_d' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan' ] = "";
	if ( $_SESSION[ $s_name ][ 'pay_date_plan_y' ] != '' ) {
		$_SESSION[ $s_name ][ 'pay_date_plan' ]  = $_SESSION[ $s_name ][ 'pay_date_plan_y' ];
		$_SESSION[ $s_name ][ 'pay_date_plan' ] .= $_SESSION[ $s_name ][ 'pay_date_plan_m' ];
		$_SESSION[ $s_name ][ 'pay_date_plan' ] .= $_SESSION[ $s_name ][ 'pay_date_plan_d' ];
	}

	$err_msg = symp_Sanka_Error_Check( $_SESSION[ $s_name ], 'pc_modify' );

	$_SESSION[ $s_name ] = symp_Sanka_Adjust_PC( $_SESSION[ $s_name ] );

	// 問題が無い場合
	if( $err_msg == "" ){

		// DBに格納
		symp_Sanka_Data_Update( $_SESSION[ $s_name ] );

		// 参加費の計算
		$_SESSION[ $s_name ][ 'pay_money' ] = symposium_Data_Calc_Price(
													$member_kubun       = $_SESSION[ $s_name ][ 'member_kubun01' ],
													$symp_id            = $_SESSION[ $s_name ][ 'symp_id' ]
											);

		// ログイン状況取得
		if ( $config_login_flg ) {
			$_SESSION[ $s_name ][ 'login_flg' ] = 1;
		} else {
			$_SESSION[ $s_name ][ 'login_flg' ] = 0;
		}

		$symp_data = symposium_Data_Read_By_ID( $_SESSION[ $s_name ][ 'symp_id' ] );
		$_SESSION[ $s_name ][ 'symp_name' ] = $symp_data[ 'symp_name' ];

		// 日付の整形
		$_SESSION[ $s_name ]['pay_date_plan_format'] = date_Format_1( $_SESSION[ $s_name ]['pay_date_plan'] );

		// メール送信
		// --------------------------------
		$mail_options['member_kubun']   = $member_kubun01_type;
		$mail_options['pay_way']        = $symp_pay_way_type;
		$mail_options['pay_bill']       = $symp_pay_bill_type;
		$mail_options['member_login']   = $member_login_options;
		symp_Sanka_Data_Send_Mail( $_SESSION[ $s_name ], $mail_options, 'pc_modify' );

		$_SESSION[ $s_name ] = NULL;

		// 完了画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_edit_fin.php" );
		exit;

	}

}

if ( $_POST[ 'RESET' ] != '' ) {

	$_SESSION[ $s_name ] = NULL;
	$_SESSION[ $s_name ][ 'symp_id' ] = stripslashes( $_POST[ 'symp_id' ] );

	// 自身にリダイレクト
	header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
	 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/symp_entry.php" );
	exit;
}



// データ読出
// ----------------------------------------
	// ログインしていた場合は会員情報を読み出す
	if ( $_SESSION[ $s_name ] == NULL ) {

		$search_array[ 'symp_sanka_data.symp_id' ] = $symp_id;
		$search_array[ 'symp_sanka_member_mast.member_userid' ]  = $_SESSION[ LOGIN_SESSION_NAME ][ 'userid' ];
		$search_array[ 'symp_sanka_data.status' ]        = 0;

		$_SESSION[ $s_name ] = symp_Sanka_Data_Custom( $search_array );

	}

	$login_flg = 0;
	// ログインチェックでテンプレ切り替え
	if ( $config_login_flg ) {
		$login_flg = 1;
	}

	// デフォルト値設定
	// --------------------------------------------------------
	if ( $_SESSION[ $s_name ][ 'pay_date_plan_y' ] == '' ) {
		$_SESSION[ $s_name ][ 'pay_date_plan_y' ] = date( 'Y' );
		$_SESSION[ $s_name ][ 'pay_date_plan_m' ] = date( 'm' );
		$_SESSION[ $s_name ][ 'pay_date_plan_d' ] = date( 'd' );
	}

	

// ******************************************************************
	$dsp = $_SESSION[ $s_name ];

?>