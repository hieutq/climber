<?
// *******************************************************************
// トップページ　PHP　Encording UTF-8
// *******************************************************************

	// スライド読み込み
	$status = 0;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '
	.'img_id,
		img_alt'.
' FROM '
	.'eng_top_image'.
' WHERE '
	.'status = ?'.
' ORDER BY '
	.'img_order, -update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$id,
				$alt
			);
			$i = 0;
			while (mysqli_stmt_fetch($stmt)) {
if($i > 0){
$slide_tbl .= "<img src=\"images/top/top_image_" . $id . ".jpg\" alt=\"" . $alt . "\" />\n";
}else{
$slide_tbl .= "<img src=\"images/top/top_image_" . $id . ".jpg\" alt=\"" . $alt . "\" class=\"active\" />\n";
}
$i++;
			}
			mysqli_stmt_close($stmt);
		}
	}

	// 最新情報読み込み
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '
	.'info_id,info_date,info_url,info_body'.
' FROM '
	.'eng_info'.
' WHERE '
	.'status = ?'.
' ORDER BY '
	.'-info_date, -update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$id,
				$date,
				$url,
				$body
			);
			while (mysqli_stmt_fetch($stmt)) {

$tmp_date = strtotime($date);
$new_date = date("F j, Y", $tmp_date);

$info_tbl .= "<dt>" . $new_date . "</dt>\n";
if($url){
$info_tbl .= "<dd><a href=\"" . $url . "\">" . $body . "</a></dd>\n";
}else{
$info_tbl .= "<dd>" . $body . "</dd>\n";
}
			}
			mysqli_stmt_close($stmt);
		}
	}

	// 最新ニュース読み込み
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '
	.'news_id,news_date,news_url,news_body'.
' FROM '
	.'eng_news'.
' WHERE '
	.'status = ?'.
' ORDER BY '
	.'-news_date, -update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$id,
				$date,
				$url,
				$body
			);
			while (mysqli_stmt_fetch($stmt)) {

$tmp_date = strtotime($date);
$new_date = date("F j, Y", $tmp_date);

$news_tbl .= "<dt>" . $new_date . "</dt>\n";
if($url){
$news_tbl .= "<dd><a href=\"" . $url . "\">" . $body . "</a></dd>\n";
}else{
$news_tbl .= "<dd>" . $body . "</dd>\n";
}
			}
			mysqli_stmt_close($stmt);
		}
	}

	$contents_body = Contents_Read_Index(1);

?>