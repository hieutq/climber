<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$info_id = $_GET[ "id" ];

	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		$info_id   = $_GET[ "id" ];
		$info_date = $_SESSION[ "JILM_INFO_MODIFY_DATEY" ] . "-";
		$info_date .= $_SESSION[ "JILM_INFO_MODIFY_DATEM" ] . "-";
		$info_date .= $_SESSION[ "JILM_INFO_MODIFY_DATED" ];
		$info_body = $_SESSION[ "JILM_INFO_MODIFY_BODY" ];

		// データ格納
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE info_msg";
		$sql .= " SET info_date = '" . $info_date . "',";
		$sql .= "     info_body = '" . $info_body . "',";
		$sql .= "     update_dt = '" . date(YmdHis) . "'";
		$sql .= " WHERE info_id = " . $info_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// セッションクリア
		$_SESSION[ "JILM_INFO_MODIFY_ID" ]    = "";
		$_SESSION[ "JILM_INFO_MODIFY_DATEY" ] = "";
		$_SESSION[ "JILM_INFO_MODIFY_DATEM" ] = "";
		$_SESSION[ "JILM_INFO_MODIFY_DATED" ] = "";
		$_SESSION[ "JILM_INFO_MODIFY_BODY" ]  = "";

		// 一覧ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/whats_new.php" );
		exit;
	}

	// 戻るボタンが押された
	if( $_POST[ "BK_1" ] != "" ){
		$_POST[ "BK_1" ] = "";

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/whats_new_modify.php?id=" . $info_id );
		exit;
	}

	// 登録情報表示
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM info_msg";
	$sql .= " WHERE info_id = " . $_SESSION[ "JILM_INFO_MODIFY_ID" ];
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$status_tmp  = cn_contract($res, 0, "status");
		$tmp_date1   = cn_contract($res, 0, "regist_dt");
		$tmp_date2   = cn_contract($res, 0, "update_dt");

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

// ******************************************************************

	$action = "whats_new_modify_confirm.php?id=" . $info_id;
	$title  = "Whats new修正確認";

	$modify_date = $_SESSION[ "JILM_INFO_MODIFY_DATEY" ] . "/";
	$modify_date .= $_SESSION[ "JILM_INFO_MODIFY_DATEM" ] . "/";
	$modify_date .= $_SESSION[ "JILM_INFO_MODIFY_DATED" ];
	$modify_body = $_SESSION[ "JILM_INFO_MODIFY_BODY" ];

	if($status_tmp == 0){
		$status = "公開中";
	}else{
		$status = "非公開";
	}

?>