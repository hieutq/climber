<?
// *******************************************************************
// ENGLISH管理画面記事リスト　PHP　Encording UTF-8
// *******************************************************************

	$catg = $_GET[ "catg" ];

	if(!$catg){

		// カテゴリー設定がない場合は強制的に1へリダイレクト
		$cts_plus = $cts_id + 1;
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/eng_content_list.php?catg=1" );
		exit;

	}

	$catg_op2 = Category_Select_Create_2( $catg );

	// 変更が押された
	if( $_GET[ "modify" ] != NULL ){
		$cid = $_GET[ "id" ];

		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] ) .
			"/eng_content_modify.php?catg=" . $catg . "&id=" . $cid );
		exit;

	}

	// リスト表示(ID2以降/status:0=表示中、status:1=非表示、status:2=削除)
	$status = 1;
	$allow_id = 1;

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_id,cts_title,cts_rank,status'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status <= ?'.
' AND '
	.'cts_id >= ?'.
' AND '
	.'cts_ctgr = ?'.
' ORDER BY '
	.'cts_rank, -update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "iii", $status, $allow_id, $catg);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$cts_id,
				$cts_title,
				$cts_rank,
				$status
			);
			while (mysqli_stmt_fetch($stmt)) {

$confirm .= "	var confirm = false;\n";
$confirm .= "	$(\"#confirm" . $cts_id . "\").click(function(){\n";
$confirm .= "		var button = $(this);\n";
$confirm .= "		if (confirm || jConfirm(\"内容変更画面へ移動します。\\nよろしいですか？\", \"ページ移動\",function(r){\n";
$confirm .= "			if (r == true) {\n";
$confirm .= "				confirm = true;\n";
$confirm .= "				button.click();\n";
$confirm .= "			}\n";
$confirm .= "		}));\n";
$confirm .= "		return confirm ? !(confirm = false) : confirm;\n";
$confirm .= "	});\n";

$cts_tbl .= "<form method=\"get\" action=\"eng_content_list.php\">\n";
$cts_tbl .= "<input type=\"hidden\" name=\"catg\" value=\"" . $catg . "\" />\n";
$cts_tbl .= "<input type=\"hidden\" name=\"id\" value=\"" . $cts_id . "\" />\n";
$cts_tbl .= "<tr>\n";
$cts_tbl .= "<td class=\"alignR\">" . $cts_id . "</td>\n";
$cts_tbl .= "<td>" . $cts_title . "</td>\n";
$cts_tbl .= "<td>" . $cts_rank . "</td>\n";
if( $status == 1 ){
	$cts_tbl .= "<td><span style=\"color:red\">非表示</span></td>\n";
}else{
	$cts_tbl .= "<td>表示中</td>\n";
}
$cts_tbl .= "<td class=\"alignC\">\n";
$cts_tbl .= "<input type=\"submit\" name=\"modify\" class=\"submit\" id=\"confirm" . $cts_id . "";
$cts_tbl .= "\" value=\"変更\" />\n";
$cts_tbl .= "</td>\n";
$cts_tbl .= "</tr>\n";
$cts_tbl .= "</form>\n";

			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

?>