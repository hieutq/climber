<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$inquiry_id = $_GET[ "id" ];

	// 一覧出力
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM contact_log";
	$sql .= " WHERE ctct_id = " . $inquiry_id;
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$inquiry_name = cn_contract($res, 0, "ctct_name");
		$inquiry_kana = cn_contract($res, 0, "ctct_kana");
		$inquiry_sex  = cn_contract($res, 0, "ctct_sex");
		$tmp_mail     = cn_contract($res, 0, "ctct_mail");
		$inquiry_mail = "<a href=\"mailto:" . $tmp_mail . "\">" . $tmp_mail . "</a>";
		$tmp_body     = cn_contract($res, 0, "ctct_cmnt");
		$inquiry_body = ereg_replace("\n","<BR>",$tmp_body);
		$inquiry_tel  = cn_contract($res, 0, "ctct_tel");
		$inquiry_zip  = cn_contract($res, 0, "ctct_zip");
		$inquiry_add1 = cn_contract($res, 0, "ctct_add1");
		$inquiry_add2 = cn_contract($res, 0, "ctct_add2");
		$inquiry_add3 = cn_contract($res, 0, "ctct_add3");
		$tmp_date     = cn_contract($res, 0, "regist_dt");
		$inquiry_reg  = substr($tmp_date,0,4) . "年" . substr($tmp_date,5,2) . "月" . substr($tmp_date,8,2) . "日";
	}

	db_close($cnn);

// ******************************************************************

	$action = "inquiry_detail.php";
	$title  = "お問い合わせ詳細";

?>