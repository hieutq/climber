<?
// *******************************************************************
// ICP管理画面リンクカテゴリー編集 PHP Encording UTF-8
// *******************************************************************

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}
	$catg = $_GET[ "catg" ];
	$sub = $_GET[ "sub" ];

	// 変更が押された
	if( $_GET[ "modify" ] != NULL ){

		$link_name = stripslashes( $_GET[ "link_name" ] );
		$link_url = stripslashes( $_GET[ "link_url" ] );
		$link_group = stripslashes( $_GET[ "link_group" ] );

		$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tri_begin($cnn);
		$sql =
"UPDATE icp_link_data SET ".
	"link_order = ?, ".
	"link_name = ?, ".
	"link_url = ?, ".
	"link_group = ?, ".
	"update_dt = ? ".
"WHERE link_id = ?";
		$stmt = dbi_prepare($cnn, $sql);
		mysqli_stmt_bind_param($stmt, 'issssi',
			$order,
			$name,
			$url,
			$group,
			$now,
			$id
		);
		$now = date( "Y-m-d h:i:s" );
		$name  = mysqli_real_escape_string($cnn, $link_name);
		$url  = mysqli_real_escape_string($cnn, $link_url);
		if($link_group){
			$group  = mysqli_real_escape_string($cnn, $link_group);
		}else{
			$group  = NULL;
		}
		$order = $_GET[ "link_order" ];
		$id    = $_GET[ "id" ];
		dbi_stmt_exe($stmt);
		tri_commit($cnn);
		dbi_close($cnn);

		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/icp_link.php?catg=" . $catg . "&sub=" . $sub );
		exit;

	}

	// 削除が押された
	if( $_GET[ "delete" ] != NULL ){

		$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tri_begin($cnn);
		$sql =
"UPDATE icp_link_data SET ".
	"status = ?, ".
	"update_dt = ? ".
"WHERE link_id = ?";
		$stmt = dbi_prepare($cnn, $sql);
		mysqli_stmt_bind_param($stmt, 'isi',
			$status,
			$now,
			$link_id
		);
		$now = date( "Y-m-d h:i:s" );
		$status = 2;
		$link_id = $_GET[ "id" ];
		dbi_stmt_exe($stmt);
		tri_commit($cnn);
		dbi_close($cnn);

		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/icp_link.php?catg=" . $catg . "&sub=" . $sub );
		exit;

	}

	// 新規追加が押された
	if( $_POST[ "regist" ] != NULL ){
		$_POST[ "regist" ] = NULL;

		$link_name = stripslashes( $_POST[ "link_name" ] );
		$link_url = stripslashes( $_POST[ "link_url" ] );
		$link_group = stripslashes( $_POST[ "link_group" ] );

		// エラーチェック
		if($link_name == NULL){
			$err_msg = "リンク名称が入力されていません";
		}elseif($link_url == NULL){
			$err_msg = "リンクURLが入力されていません";
		}

		if(!$err_msg){

			// DB格納
			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"INSERT INTO icp_link_data ("
	."link_lctgr,".
	 "link_sctgr,".
	 "link_order,".
	 "link_name,".
	 "link_url,".
	 "link_group,".
	 "status,".
	 "regist_dt,".
	 "update_dt".
") VALUES ("
	."?,?,?,?,?,?,?,?,?".
")";
			$stmt = dbi_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'iiisssiss',
				$lcatg,
				$scatg,
				$order,
				$name,
				$url,
				$group,
				$status,
				$now,
				$now
			);
			$now    = date( "Y-m-d h:i:s" );
			$status = 0;
			$name  = mysqli_real_escape_string($cnn, $link_name);
			$url  = mysqli_real_escape_string($cnn, $link_url);
			if($link_group){
				$group  = mysqli_real_escape_string($cnn, $link_group);
			}else{
				$goup = NULL;
			}
			$order = $_POST[ "link_order" ];
			$lcatg  = $catg;
			$scatg  = $sub;
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/icp_link.php?catg=" . $catg . "&sub=" . $sub );
			exit;

		}
	}

	// リスト表示(status=1以下)
	$view = 1;

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'link_id,link_order,link_name,link_url,link_group,status'.
' FROM '
	.'icp_link_data'.
' WHERE '
	.'status <= ?'.
' AND '
	.'link_lctgr = ?'.
' AND '
	.'link_sctgr = ?'.
' ORDER BY '
	.'link_group is NULL, link_group ASC,link_order, update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "iii", $view, $catg, $sub);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$link_id,
				$link_order,
				$link_name,
				$link_url,
				$link_group,
				$status
			);
			$i = 1;
			while (mysqli_stmt_fetch($stmt)) {

// ボタン用
$m_cnt = $i * 2;
$d_cnt = $m_cnt + 1;
$i = $i+1;

$jq_tbl .= "	$(\"#confirm" . $m_cnt . "\").click(function(){\n";
$jq_tbl .= "		var button = $(this);\n";
$jq_tbl .= "		if (confirm || jConfirm(\"リンク情報を変更します\\nよろしいですか？\"";
$jq_tbl .= ", \"リンク情報変更\",function(r){\n";
$jq_tbl .= "			if (r == true) {\n";
$jq_tbl .= "				confirm = true;\n";
$jq_tbl .= "				button.click();\n";
$jq_tbl .= "			}\n";
$jq_tbl .= "		}));\n";
$jq_tbl .= "		return confirm ? !(confirm = false) : confirm;\n";
$jq_tbl .= "	});\n";
$jq_tbl .= "	$(\"#confirm" . $d_cnt . "\").click(function(){\n";
$jq_tbl .= "		var button = $(this);\n";
$jq_tbl .= "		if (confirm || jConfirm(\"リンク情報を削除します\\nよろしいですか？\"";
$jq_tbl .= ", \"リンク情報削除\",function(r){\n";
$jq_tbl .= "			if (r == true) {\n";
$jq_tbl .= "				confirm = true;\n";
$jq_tbl .= "				button.click();\n";
$jq_tbl .= "			}\n";
$jq_tbl .= "		}));\n";
$jq_tbl .= "		return confirm ? !(confirm = false) : confirm;\n";
$jq_tbl .= "	});\n";

$link_tbl .= "<form method=\"get\" action=\"icp_link.php\">\n";
$link_tbl .= "<input type=\"hidden\" name=\"catg\" value=\"" . $catg . "\" />\n";
$link_tbl .= "<input type=\"hidden\" name=\"sub\" value=\"" . $sub . "\" />\n";
$link_tbl .= "<input type=\"hidden\" name=\"id\" value=\"" . $link_id . "\" />\n";
$link_tbl .= "<tr>\n";
$link_tbl .= "<td class=\"alignR\">" . $link_id . "</td>\n";
$link_tbl .= "<td class=\"alignC\"><input name=\"link_name\" type=\"text\" class=\"text\"";
$link_tbl .= " size=\"13\" value=\"" . $link_name . "\" /></td>\n";
$link_tbl .= "<td class=\"alignC\"><input name=\"link_url\" type=\"text\" class=\"text\"";
$link_tbl .= " size=\"17\" value=\"" . $link_url . "\" /></td>\n";
$link_tbl .= "<td class=\"alignC\"><input name=\"link_group\" type=\"text\" class=\"text\"";
$link_tbl .= " size=\"13\" value=\"" . $link_group . "\" /></td>\n";
$link_tbl .= "<td class=\"alignC\">\n";
$link_tbl .= "<select name=\"link_order\" class=\"dropdown\">\n";
if($link_order == 1){
	$link_tbl .= "    <option value=\"1\" selected>1</option>\n";
}else{
	$link_tbl .= "    <option value=\"1\">1</option>\n";
}
if($link_order == 2){
	$link_tbl .= "    <option value=\"2\" selected>2</option>\n";
}else{
	$link_tbl .= "    <option value=\"2\">2</option>\n";
}
if($link_order == 3){
	$link_tbl .= "    <option value=\"3\" selected>3</option>\n";
}else{
	$link_tbl .= "    <option value=\"3\">3</option>\n";
}
if($link_order == 4){
	$link_tbl .= "    <option value=\"4\" selected>4</option>\n";
}else{
	$link_tbl .= "    <option value=\"4\">4</option>\n";
}
if($link_order == 5){
	$link_tbl .= "    <option value=\"5\" selected>5</option>\n";
}else{
	$link_tbl .= "    <option value=\"5\">5</option>\n";
}
if($link_order == 6){
	$link_tbl .= "    <option value=\"6\" selected>6</option>\n";
}else{
	$link_tbl .= "    <option value=\"6\">6</option>\n";
}
if($link_order == 7){
	$link_tbl .= "    <option value=\"7\" selected>7</option>\n";
}else{
	$link_tbl .= "    <option value=\"7\">7</option>\n";
}
if($link_order == 8){
	$link_tbl .= "    <option value=\"8\" selected>8</option>\n";
}else{
	$link_tbl .= "    <option value=\"8\">8</option>\n";
}
if($link_order == 9){
	$link_tbl .= "    <option value=\"9\" selected>9</option>\n";
}else{
	$link_tbl .= "    <option value=\"9\">9</option>\n";
}
if($link_order == 10){
	$link_tbl .= "    <option value=\"10\" selected>10</option>\n";
}else{
	$link_tbl .= "    <option value=\"10\">10</option>\n";
}
$link_tbl .= "</select>\n";
$link_tbl .= "</td>\n";
$link_tbl .= "<td class=\"alignC\">";
$link_tbl .= "<input type=\"submit\" name=\"modify\" class=\"submit\" id=\"confirm";
$link_tbl .= $m_cnt . "\" value=\"変更\" />&nbsp;\n";
$link_tbl .= "<input type=\"submit\" name=\"delete\" class=\"submit\" id=\"confirm";
$link_tbl .= $d_cnt . "\" value=\"削除\" />&nbsp;\n";
$link_tbl .= "</td>\n";
$link_tbl .= "</tr>\n";
$link_tbl .= "</form>\n";

			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	$catg_op = Category_Select_Create_4( $catg );
	$sub_op = Category_Select_Create_5( $catg, $sub );
	if($sub_name){
		$sub_pk = $sub_name . "&nbsp;&gt;&nbsp;";
	}
	if(!$sub){
		$action = "icp_link.php";
	}else{
		$action = "icp_link.php?catg=" . $catg . "&sub=" . $sub;
	}

?>