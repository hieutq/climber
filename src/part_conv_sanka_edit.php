<?php
// *******************************************************************
// シンポジウム参加登録　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_SYMP_SANKA_EDIT_FORM';

	// 設定配列
	$year_options         = $YEAR_TYPE;
	$month_options        = $MONT_TYPE;
	$day_options          = $DAYT_TYPE;
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE;
	$pay_status_type      = $CONFIG_PAY_TYPE;
	$pay_way_type         = $CONFIG_PAY_WAY_TYPE_TAIKAI_SANKA;
	$pay_bill_type        = $CONFIG_PAY_BILL_TYPE;
	$pay_menu_type        = $CONFIG_PAY_MENU_TYPE_LONG;
	$member_login_options = $CONFIG_MEMBER_LOGIN_STATUS_TYPE;
	// 前ページより引き継ぎ
	$convention_id  = convention_Data_Maxid_Get();

	// 初期化
	$referer = $_SERVER["HTTP_REFERER"];
	// 初期化
	if( $referer ) {
		if ( strpos( $referer, '?mode=conv_sanka_edit' ) ) {

		} else {
			$_SESSION[ $s_name ] = NULL;
		}

	} else {
		$_SESSION[ $s_name ] = NULL;
	};


// リクエスト処理
// ------------------------------------
if ( $_POST[ 'CONV_SANKA_SEND' ] != '' ) {

	// DBから登録情報を直接読み込み
	$search_array[ 'sankasya_data.convention_id' ] = stripslashes( $_POST[ 'convention_id' ] );
	$search_array[ 'sankasya_member_mast.member_userid' ]  = $_SESSION[ LOGIN_SESSION_NAME ][ 'userid' ];
	$search_array[ 'sankasya_member_mast.status' ]        = 0;
	$sankasya_member_data = sankasya_Data_Read_Custom( $search_array );

	$_SESSION[ $s_name ][ 'member_userid' ]  = $sankasya_member_data[ 'member_userid' ];
	$_SESSION[ $s_name ][ 'member_name' ]    = $sankasya_member_data[ 'member_name' ];
	$_SESSION[ $s_name ][ 'member_kana' ]    = $sankasya_member_data[ 'member_kana' ];
	$_SESSION[ $s_name ][ 'member_info01' ]  = $sankasya_member_data[ 'member_info01' ];
	$_SESSION[ $s_name ][ 'member_info02' ]  = $sankasya_member_data[ 'member_info02' ];
	$_SESSION[ $s_name ][ 'member_mail' ]    = $sankasya_member_data[ 'member_mail' ];
	$_SESSION[ $s_name ][ 'member_kubun01' ] = $sankasya_member_data[ 'member_kubun01' ];

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
	$_SESSION[ $s_name ][ 'convention_id' ] = stripslashes( $_POST[ 'convention_id' ] );
	$_SESSION[ $s_name ][ 'pay_way' ]       = stripslashes( $_POST[ 'shiharai' ] );
	$_SESSION[ $s_name ][ 'pay_way_text' ]  = stripslashes( $_POST[ 'shiharai_text' ] );
	$_SESSION[ $s_name ][ 'sanka_biko1' ]   = stripslashes( $_POST[ 'bikou' ] );
	$_SESSION[ $s_name ][ 'pay_bill' ]      = stripslashes( $_POST[ 'seikyusyo' ] );

	$_SESSION[ $s_name ][ 'sanka_menu_array' ]   = $_POST[ 'sanka_menu_array' ];
	if ( $_POST[ 'sanka_menu_array' ] != '' ) {
		$_SESSION[ $s_name ][ 'sanka_menu' ] = implode( ",", $_SESSION[ $s_name ][ 'sanka_menu_array' ] );
	}

	$_SESSION[ $s_name ][ 'pay_date_plan_y' ] = stripslashes( $_POST[ 'pay_plan_y' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan_m' ] = stripslashes( $_POST[ 'pay_plan_m' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan_d' ] = stripslashes( $_POST[ 'pay_plan_d' ] );
	$_SESSION[ $s_name ][ 'pay_date_plan' ] = "";
	if ( $_SESSION[ $s_name ][ 'pay_date_plan_y' ] != '' ) {
		$_SESSION[ $s_name ][ 'pay_date_plan' ]  = $_SESSION[ $s_name ][ 'pay_date_plan_y' ];
		$_SESSION[ $s_name ][ 'pay_date_plan' ] .= $_SESSION[ $s_name ][ 'pay_date_plan_m' ];
		$_SESSION[ $s_name ][ 'pay_date_plan' ] .= $_SESSION[ $s_name ][ 'pay_date_plan_d' ];
	}

	$err_msg = sankasya_Data_Error_Check( $_SESSION[ $s_name ], 'pc_modify' );

	$_SESSION[ $s_name ] = sankasya_Data_Adjust_PC( $_SESSION[ $s_name ] );

	// 問題が無い場合
	if( $err_msg == "" ){

		// DBに格納
		sankasya_Data_Update( $_SESSION[ $s_name ] );

		// ログイン状況取得
		if ( $config_login_flg ) {
			$_SESSION[ $s_name ][ 'login_flg' ] = 1;
		} else {
			$_SESSION[ $s_name ][ 'login_flg' ] = 0;
		}

		// 参加費の計算
		$_SESSION[ $s_name ][ 'pay_money' ] = sankasya_Data_Calc_Price(
													$member_kubun = $_SESSION[ $s_name ][ 'member_kubun01' ],
													$sanka_array  = $_SESSION[ $s_name ][ 'sanka_menu_array' ],
													$conv_id      = $_SESSION[ $s_name ][ 'convention_id' ]
											);

		// 参加項目テキスト生成
		$_SESSION[ $s_name ][ 'sanka_menu_text' ] = sankasya_Data_Get_Menu_Text(
													$sanka_array   = $_SESSION[ $s_name ][ 'sanka_menu_array' ],
													$pay_menu_type = $pay_menu_type,
													$separator     = ', ',
													$mode='each'
											);

		// 日付の整形
		$_SESSION[ $s_name ]['pay_date_plan_format'] = date_Format_1( $_SESSION[ $s_name ]['pay_date_plan'] );

		// メール送信
		// --------------------------------
		$mail_options['member_kubun']   = $member_kubun01_type;
		$mail_options['pay_way']        = $pay_way_type;
		$mail_options['pay_bill']       = $pay_bill_type;
		$mail_options['member_login']   = $member_login_options;
		sankasya_Data_Send_Mail( $_SESSION[ $s_name ], $mail_options, 'pc_modify' );

		$_SESSION[ $s_name ] = NULL;

		// 完了画面にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/conv_sanka_edit_fin.php" );
		exit;
	}

}

if ( $_POST[ 'RESET' ] != '' ) {

	$_SESSION[ $s_name ] = NULL;

	// 自身にリダイレクト
	header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
	 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=conv_sanka_edit" );
	exit;
}



// データ読出
// ----------------------------------------
	// 登録情報を読み出す
	if ( $_SESSION[ $s_name ] == NULL ) {

		$search_array[ 'sankasya_data.convention_id' ] = $convention_id;
		$search_array[ 'sankasya_member_mast.member_userid' ]  = $_SESSION[ LOGIN_SESSION_NAME ][ 'userid' ];
		$search_array[ 'sankasya_data.status' ]        = 0;

		$_SESSION[ $s_name ] = sankasya_Data_Read_Custom( $search_array );

		$_SESSION[ $s_name ][ 'sanka_menu_array' ] = explode( ',', $_SESSION[ $s_name ][ 'sanka_menu' ] );

	}

	$login_flg = 0;
	// ログインチェックでテンプレ切り替え
	if ( $config_login_flg ) {
		$login_flg = 1;
	}


	// デフォルト値設定
	// --------------------------------------------------------
	if ( $_SESSION[ $s_name ][ 'pay_date_plan_y' ] == NULL ) {
		$_SESSION[ $s_name ][ 'convention_id' ] = $convention_id;
		$_SESSION[ $s_name ][ 'pay_date_y' ] = date( 'Y' );
		$_SESSION[ $s_name ][ 'pay_date_m' ] = date( 'm' );
		$_SESSION[ $s_name ][ 'pay_date_d' ] = date( 'd' );
		$_SESSION[ $s_name ][ 'pay_date_plan_y' ] = date( 'Y' );
		$_SESSION[ $s_name ][ 'pay_date_plan_m' ] = date( 'm' );
		$_SESSION[ $s_name ][ 'pay_date_plan_d' ] = date( 'd' );
	}

	

// ******************************************************************
	$action = './?mode=conv_sanka_edit';
	$dsp = $_SESSION[ $s_name ];









// ぱんくず読み出し
// ----------------------------------------
	$pid = $_GET[ "pid" ];
	if( $pid != "" ){

		// セッションクリア
		Jilm_Contents_Session_clear();

		Jilm_Contents_Read_1( $pid );

		// 非公開の場合はエラー表示
		if( $_SESSION[ "JILM_CONTENTS_STATUS" ] > 0 ){
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "/?mode=pgerror" );
			exit;
		}

		// 階層表示
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = '" . $_SESSION[ "JILM_CONTENTS_CTGR" ] . "'";
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$class_tmp = cn_contract($res, 0, "ctgr_name");
			$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
			$_SESSION[ "JILM_CLASS_LIST" ] = "<li>" . $class_tmp . "</li>\n";
		}
		db_close($cnn);

		// 親がある場合は親の名前追加
		if( $ctgr_fold != "0" ){
			Jilm_Fold_List_3( $ctgr_fold );
		}

		$action   = "./?mode=content&pid=" . $pid;
		$title    = $_SESSION[ "JILM_CONTENTS_TITLE" ];
		$class    = $_SESSION[ "JILM_CLASS_LIST" ] . "<li>" . $_SESSION[ "JILM_CONTENTS_TITLE" ] . "</li>\n";
//		$contents = $_SESSION[ "JILM_CONTENTS_BODY" ];
	}

?>