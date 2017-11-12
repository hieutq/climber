<?
// *******************************************************************
// 検索結果表示　PHP　Encording UTF-8
// *******************************************************************

	if( $_POST[ "btnG" ] != "" ){
		$_POST[ "btnG" ] = "";

		$_SESSION[ "JILM_ENG_SEARCH_WORD" ] = stripslashes( $_POST[ "search_word" ] );
		$word_s = preg_replace( "/　/", " ", $_SESSION[ "JILM_ENG_SEARCH_WORD" ] );
		$word_t = explode( " ", $word_s );
	}

	// コンテンツ読み込み
	$view = 0;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_id,cts_title,cts_ctgr,cts_body,cts_alias'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = ?'.
' AND '
	.'cts_id != 1';
if ($word_t) {
	for ($i=0; $i<count($word_t); $i++) {
		$sql .= " AND (( cts_title  LIKE '%" . $word_t[ $i ] . "%' ) OR";
		$sql .= "       ( cts_body  LIKE '%" . $word_t[ $i ] . "%' ) )";
	}
}
	$sql .= 
' ORDER BY '
	.'cts_ctgr, cts_rank';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $view);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			// ページ当たりの件数の取得
			$dsp_cnt = PER_PAGE;
			if ($dsp == "") { $dsp = 1; }
			$stt_cnt = ($dsp - 1) * $dsp_cnt;

			// ＭＡＸページの取得
			$max_page = floor($cnt / $dsp_cnt) + 1;
			if (!($cnt % $dsp_cnt)) { $max_page--; }

			if ($dsp != $max_page || $cnt % $dsp_cnt == 0) {
//					$page_info = $cnt . "件中 " . (($dsp - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
				$page_info = "Displaying " . (($dsp - 1) * $dsp_cnt + 1) . " to " . $dsp_cnt . " of " . $cnt . "items";
			} else {
//					$page_info = $cnt . "件中 " . (($dsp - 1) * $dsp_cnt + 1) . "件から " . ($cnt % $dsp_cnt) . "件表示";
				$page_info = "Displaying " . (($dsp - 1) * $dsp_cnt + 1) . " to " . ($cnt % $dsp_cnt) . " of " . $cnt . "items";
			}

			$page_footer = pager( "dsp", $cnt );

			// データ読み出し
			$stmt2 = dbi_stmt_init($cnn);
			$sql2  = $sql . " LIMIT ?,?";

			if (mysqli_stmt_prepare($stmt2,$sql2)) {

				mysqli_stmt_bind_param($stmt2, "iii", $view, $stt_cnt, $dsp_cnt);
				dbi_stmt_exe($stmt2);
				dbi_store_res($stmt2);
				mysqli_stmt_bind_result($stmt2,
					$cts_id,
					$cts_title,
					$cts_ctgr,
					$cts_body,
					$cts_alias
				);
				$result = "";
				while (mysqli_stmt_fetch($stmt2)) {

$catg_arr = Search_Category_Read( $cts_ctgr );//0:カテ名、1:最前CID、2:最前エイリアス
$cts_body = strip_tags($cts_body, '<a>');
$cts_body = mb_strimwidth($cts_body, 0, 100, "...",utf8);

$result .= "	<li>\n";
if($catg_arr[2] == ""){
	$result .= "	<div class=\"pan\"><a href=\"./\">Top</a>&nbsp;&gt;&nbsp;<a href=\"./?p=";
	$result .= $catg_arr[1] . "\">" . $catg_arr[0] . "</a>&nbsp;&gt;</div>\n";
}else{
	$result .= "	<div class=\"pan\"><a href=\"./\">Top</a>&nbsp;&gt;&nbsp;<a href=\"";
	$result .= $catg_arr[2] . "\">" . $catg_arr[0] . "</a>&nbsp;&gt;</div>\n";
}
if($cts_alias == ""){
	$result .= "	<div class=\"title\"><a href=\"./?p=" . $cts_id . "\">" . $cts_title . "</a></div>\n";
}else{
	$result .= "	<div class=\"title\"><a href=\"" . $cts_alias . "\">" . $cts_title . "</a></div>\n";
}
$result .= "	<div class=\"summary\">" . $cts_body . "</div>\n";
$result .= "	</li>\n";

$cts_id = NULL;
$cts_title = "";
$cts_ctgr = NULL;
$cts_body = "";
$cts_alias = "";

				}
				dbi_stmt_close($stmt2);
			}
		}
	}
	dbi_close($cnn);

?>