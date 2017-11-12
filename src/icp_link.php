<?
// *******************************************************************
// リンク表示　PHP　Encording UTF-8
// *******************************************************************

	// サブカテゴリー読み込み
	$status = 0;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '
	.'sctgr_id,sctgr_name'.
' FROM '
	.'icp_link_sub'.
' WHERE '
	.'status = ?'.
' AND '
	.'sctgr_lcatg = ?'.
' ORDER BY '
	.'sctgr_order';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "ii", $status, $catg);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$sctgr_id,
				$sctgr_name
			);
			$link_data = "";
			while (mysqli_stmt_fetch($stmt)) {

$link_data .= "<h4 id=\"contents" . $sctgr_id . "\">" . $sctgr_name . "</h4>\n";

				// グループごとにリンク表示
				$stmt2 = mysqli_stmt_init($cnn);
				$sql2  =
'SELECT '
	.'link_group,link_name,link_url'.
' FROM '
	.'icp_link_data'.
' WHERE '
	.'status = ?'.
' AND '
	.'link_sctgr = ?'.
' ORDER BY '
	.'link_group is NULL, link_group ASC, link_order';

				if (mysqli_stmt_prepare($stmt2,$sql2)) {

					mysqli_stmt_bind_param($stmt2, "ii", $status, $sctgr_id);
					dbi_stmt_exe($stmt2);
					dbi_store_res($stmt2);
					$cnt2 = mysqli_stmt_num_rows($stmt2);
					if($cnt2 > 0){
						mysqli_stmt_bind_result($stmt2,
							$link_group,
							$link_name,
							$link_url
						);
						$i = 0;
						$j = 0;
						while (mysqli_stmt_fetch($stmt2)) {

if($link_group){
	if($mae_group == $link_group){
		$link_data .= "	<li><a href=\"" . $link_url . "\">" . $link_name . "</a></li>\n";
	}else{
		if($i > 0){ $link_data .= "</ul>\n"; }
		$link_data .= "<h5>" . $link_group . "</h5>\n";
		$link_data .= "<ul class=\"link cf\">\n";
		$link_data .= "	<li><a href=\"" . $link_url . "\">" . $link_name . "</a></li>\n";
	}
	$mae_group = $link_group;
	$i++;
}else{
	if($j == 0){
		if($i > 0){ $link_data .= "</ul>\n"; }
		$link_data .= "<ul class=\"link cf\">\n";
		$link_data .= "	<li><a href=\"" . $link_url . "\">" . $link_name . "</a></li>\n";
	}else{
		$link_data .= "	<li><a href=\"" . $link_url . "\">" . $link_name . "</a></li>\n";
	}
	$j++;
}

						}
						mysqli_stmt_close($stmt2);
					}
				}
				if($cnt2 != 0){ $link_data .= "</ul>\n"; }
			}
			mysqli_stmt_close($stmt);
		}
	}



?>