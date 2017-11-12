<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$mode = $_GET[ "mode" ];
	$_SESSION[ "JILM_INFO_MODIFY_ID" ] = $_GET[ "id" ];

	// セッションクリア
	if( $mode == "bang" ){
		$_SESSION[ "JILM_INFO_MODIFY_DATEY" ] = "";
		$_SESSION[ "JILM_INFO_MODIFY_DATEM" ] = "";
		$_SESSION[ "JILM_INFO_MODIFY_DATED" ] = "";
		$_SESSION[ "JILM_INFO_MODIFY_BODY" ]  = "";
	}

	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 内容をセッションに格納
		$_SESSION[ "JILM_INFO_MODIFY_DATEY" ] = StripSlashes( $_POST[ "modify_whn_datey" ] );
		$_SESSION[ "JILM_INFO_MODIFY_DATEM" ] = StripSlashes( $_POST[ "modify_whn_datem" ] );
		$_SESSION[ "JILM_INFO_MODIFY_DATED" ] = StripSlashes( $_POST[ "modify_whn_dated" ] );
		$_SESSION[ "JILM_INFO_MODIFY_BODY" ]  = StripSlashes( $_POST[ "modify_body" ] );

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/whats_new_modify_confirm.php?id=" . $_SESSION[ "JILM_INFO_MODIFY_ID" ] );
		exit;
	}

	// 修正情報読み込み
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM info_msg";
	$sql .= " WHERE info_id = " . $_SESSION[ "JILM_INFO_MODIFY_ID" ];
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$modify_date = cn_contract($res, 0, "info_date");
		$modify_body = cn_contract($res, 0, "info_body");
		$status_tmp  = cn_contract($res, 0, "status");
		$tmp_date1   = cn_contract($res, 0, "regist_dt");
		$tmp_date2   = cn_contract($res, 0, "update_dt");

		$slct_datey_selected = substr($modify_date,0,4);
		$slct_datem_selected = substr($modify_date,5,2);
		$slct_dated_selected = substr($modify_date,8,2);

		$regist_dt  = substr($tmp_date1,2,2) . "/";
		$regist_dt .= substr($tmp_date1,5,2) . "/";
		$regist_dt .= substr($tmp_date1,8,2) . "&nbsp;";
		$regist_dt .= substr($tmp_date1,11,2) . ":";
		$regist_dt .= substr($tmp_date1,14,2);
		$update_dt  = substr($tmp_date2,2,2) . "/";
		$update_dt .= substr($tmp_date2,5,2) . "/";
		$update_dt .= substr($tmp_date2,8,2) . "&nbsp;";
		$update_dt .= substr($tmp_date2,11,2) . ":";
		$update_dt .= substr($tmp_date2,14,2);

	}
	db_close($cnn);

	// セッションがある場合は変数上書き
	if($_SESSION[ "JILM_INFO_MODIFY_DATEY" ] != ""){
		$slct_datey_selected = $_SESSION[ "JILM_INFO_MODIFY_DATEY" ];
	}
	if($_SESSION[ "JILM_INFO_MODIFY_DATEM" ] != ""){
		$slct_datem_selected = $_SESSION[ "JILM_INFO_MODIFY_DATEM" ];
	}
	if($_SESSION[ "JILM_INFO_MODIFY_DATED" ] != ""){
		$slct_dated_selected = $_SESSION[ "JILM_INFO_MODIFY_DATED" ];
	}
	if($_SESSION[ "JILM_INFO_MODIFY_BODY" ] != ""){
		$modify_body = $_SESSION[ "JILM_INFO_MODIFY_BODY" ];
	}

// ******************************************************************

	$action = "whats_new_modify.php?id=" . $_SESSION[ "JILM_INFO_MODIFY_ID" ];
	$title  = "Whats new修正";

	$info_id = $_SESSION[ "JILM_INFO_MODIFY_ID" ];

	$slct_datey_options = $YEAR_TYPE;
	$slct_datem_options = $MONT_TYPE;
	$slct_dated_options = $DAYT_TYPE;

	if($status_tmp == 0){
		$status = "公開中";
	}else{
		$status = "非公開";
	}

	$dsp_tbl = $tbl;

?>