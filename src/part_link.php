<?PHP

	// カテゴリー１
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM link_data";
	$sql .= " WHERE status = 0";
	$sql .= "  AND link_category = 1";
	$sql .= " ORDER BY link_category, link_rank, update_dt";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$link_name = cn_contract($res, $i, "link_name");
					$link_url  = cn_contract($res, $i, "link_url");

					$link_list1 .= "<li><a href=\"" . $link_url;
					$link_list1 .= "\" target=\"_blank\">" . $link_name;
					$link_list1 .= "</a></li>\n";
				}
				if ($i >= $max_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	// カテゴリー２
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM link_data";
	$sql .= " WHERE status = 0";
	$sql .= "  AND link_category = 2";
	$sql .= " ORDER BY link_category, link_rank, update_dt";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$link_name = cn_contract($res, $i, "link_name");
					$link_url  = cn_contract($res, $i, "link_url");

					$link_list2 .= "<li><a href=\"" . $link_url;
					$link_list2 .= "\" target=\"_blank\">" . $link_name;
					$link_list2 .= "</a></li>\n";
				}
				if ($i >= $max_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	// カテゴリー３
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM link_data";
	$sql .= " WHERE status = 0";
	$sql .= "  AND link_category = 3";
	$sql .= " ORDER BY link_category, link_rank, update_dt";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$link_name = cn_contract($res, $i, "link_name");
					$link_url  = cn_contract($res, $i, "link_url");

					$link_list3 .= "<li><a href=\"" . $link_url;
					$link_list3 .= "\" target=\"_blank\">" . $link_name;
					$link_list3 .= "</a></li>\n";
				}
				if ($i >= $max_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	// カテゴリー９９
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM link_data";
	$sql .= " WHERE status = 0";
	$sql .= "  AND link_category = 99";
	$sql .= " ORDER BY link_category, link_rank, update_dt";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$link_name = cn_contract($res, $i, "link_name");
					$link_url  = cn_contract($res, $i, "link_url");

					$link_list99 .= "<li><a href=\"" . $link_url;
					$link_list99 .= "\" target=\"_blank\">" . $link_name;
					$link_list99 .= "</a></li>\n";
				}
				if ($i >= $max_cnt) { break; }
			}
		}
	}

	db_close($cnn);

// ***********************************************************

	$contents = "./templates/part_link.html";

?>