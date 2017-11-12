<?php
// *******************************************************************
// 更新情報　PHP　Encording UTF-8
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

?>