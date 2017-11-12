<?php
// *******************************************************************
// メニュー出力　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../include/az_constant.php" );
	include_once( "./../include/az_common.php" );

	// ログインを行っていない場合
	if( $_SESSION[ "JSOH_MEMBER_IDR" ] == "" ){

		include_once( "./templates/part_menu_1.html" );

	// ログインを行っているまたはログインクッキーを保持している
	}else{

		$member_id = $_SESSION[ "JSOH_MEMBER_IDR" ];

		// 規定IDには管理者フラグ
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM member_data";
		$sql .= " WHERE member_id = " . $member_id;
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$login_check = cn_contract($res, 0, "member_admin");
		}
		db_close($cnn);

		if( $login_check == 1 ){
			// フラグ設定
			$_SESSION[ "JSOH_ADMIN_EDIT_FLG" ] = "ON";
		}
		$login_check = $_SESSION[ "JSOH_ADMIN_EDIT_FLG" ];
		include_once( "./templates/part_menu_2.html" );
	}

	// バナー読み込み
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM banner_data";
	$sql .= " WHERE status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$bnr_id   = cn_contract($res, 0, "bnr_id");
			$bnr_type = cn_contract($res, 0, "bnr_type");
			$bnr_alt  = cn_contract($res, 0, "bnr_alt");
			$bnr_url  = cn_contract($res, 0, "bnr_url");
		}
	}
	db_close($cnn);

	if( $bnr_type != "" ){
		if( $bnr_type == "swf" ){
			$bnr_tag  = "<embed src=\"./../images/banner/" . $bnr_id;
			$bnr_tag .= ".swf\" type=\"application/x-shockwave-flash\"";
			$bnr_tag .= " width=\"180\" height=\"180\">";
		}else{
			$bnr_tag  = "<a href=\"" . $bnr_url . "\">";
			$bnr_tag .= "<img src=\"./../images/banner/" . $bnr_id;
			$bnr_tag .= "." . $bnr_type . "\" width=\"180\" height=\"180\"";
			$bnr_tag .= " alt=\"" . $bnr_alt . "\" /></a>";
		}
	}

?>