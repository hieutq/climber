<?php
// *******************************************************************
// メインページ　PHP　Encording UTF-8
// *******************************************************************

	// インフォメーション表示
	$cnn = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = "SELECT * FROM info_msg WHERE status = 0";
	$sql .= " ORDER BY info_date DESC, regist_dt DESC";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {

					$date_tmp  = cn_contract($res, $i, "info_date");
					$info_body = ereg_replace("\n","<br />",cn_contract($res, $i, "info_body"));
					$info_date  = substr($date_tmp,2,2) . ".";
					$info_date .= substr($date_tmp,5,2) . ".";
					$info_date .= substr($date_tmp,8,2);

					$infomation .= "<tr>\n";
					$infomation .= "<td class=\"ico\"><img src=\"images/news_ico.jpg\" alt=\"\" width=\"10\" height=\"10\" /></td>\n";
					$infomation .= "<td>" . $info_body . "</td>\n";
					$infomation .= "</tr>\n";

				}

				if ($i >= $max_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	// トピックス表示
	$cnn = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = "SELECT * FROM topics_msg WHERE status = 0";
	$sql .= " ORDER BY -topics_date, -update_dt";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {

					$date_tmp     = cn_contract($res, $i, "topics_date");
					$topics_body  = cn_contract($res, $i, "topics_body");
					$topics_date  = substr($date_tmp,2,2) . ".";
					$topics_date .= substr($date_tmp,5,2) . ".";
					$topics_date .= substr($date_tmp,8,2);

					$topics .= "<div>" . $topics_body . "（" . $topics_date . "）</div>\n";
				}

				if ($i >= $max_cnt) { break; }
			}
		}
	}

	// リンク読み込み
	$sql2 = "SELECT * FROM link_data WHERE status = 0";
	$sql2 .= "  AND link_category = 6";
	$sql2 .= " ORDER BY rand()";
	$res2  = cn_query($sql2, $cnn);
	if ($res2 == true){
		$max_cnt2 = cn_count($res2);
		if ($max_cnt2 > 0){
			for ($j=0; $j<$max_cnt2; $j++) {
				if ( $j >= 0 && $j <= $max_cnt2 ) {

					$link_id   = cn_contract($res2, $j, "link_id");
					$link_name = cn_contract($res2, $j, "link_name");
					$link_url  = cn_contract($res2, $j, "link_url");

					$link_bnr .= "<li><a href=\"" . $link_url . "\" target=\"_blank\">";
					$link_bnr .= "<img src=\"images/banner/" . $link_id . ".jpg\" alt=\"";
					$link_bnr .= $link_name . "\" width=\"150\" height=\"50\" class=\"hoverImg\" /></a></li>\n";
				}

				if ($j >= $max_cnt2) { break; }
			}
		}
	}

	db_close($cnn);

?>