<?php
// *******************************************************************
// プライバシーポリシー　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------

// リクエスト処理
// ------------------------------------



// データ読み込み
// ------------------------------------
	// 情報読み込み
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM text_notice";
	$sql .= " WHERE notice_id = 1";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$title = cn_contract($res, 0, "notice_title");
		$modify_body  = cn_contract($res, 0, "notice_body");
	}
	db_close($cnn);

	$privacy = $modify_body;

// 出力設定
// ------------------------------------
	$dsp = $_SESSION[ $s_name ];



?>