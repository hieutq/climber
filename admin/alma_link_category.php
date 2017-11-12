<?
// *******************************************************************
// ALMA管理画面リンクカテゴリー編集 PHP Encording UTF-8
// *******************************************************************

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}
	$sub = $_GET[ "sub" ];

	// 変更が押された
	if( $_GET[ "modify" ] != NULL ){

		$catg_name = stripslashes( $_GET[ "catg_name" ] );

		if(!$sub){

			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"UPDATE icp_link_category SET ".
	"lctgr_menu = ?, ".
	"lctgr_order = ?, ".
	"lctgr_name = ?, ".
	"update_dt = ? ".
"WHERE lctgr_id = ?";
			$stmt = dbi_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'iissi',
				$catg_menu,
				$catg_order,
				$catg_name,
				$now,
				$catg_id
			);
			$now = date( "Y-m-d h:i:s" );
			$catg_name  = mysqli_real_escape_string($cnn, $catg_name);
			$catg_order = $_GET[ "catg_order" ];
			$catg_menu  = $_GET[ "catg_menu" ];
			$catg_id    = $_GET[ "id" ];
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/alma_link_category.php" );
			exit;

		}else{

			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"UPDATE icp_link_sub SET ".
	"sctgr_order = ?, ".
	"sctgr_name = ?, ".
	"update_dt = ? ".
"WHERE sctgr_id = ? ";
			$stmt = dbi_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'issi',
				$catg_order,
				$catg_name,
				$now,
				$catg_id
			);
			$now = date( "Y-m-d h:i:s" );
			$catg_name  = mysqli_real_escape_string($cnn, $catg_name);
			$catg_order = $_GET[ "catg_order" ];
			$catg_id    = $_GET[ "id" ];
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/alma_link_category.php?sub=" . $sub );
			exit;

		}
	}

	// 削除が押された
	if( $_GET[ "delete" ] != NULL ){

		if(!$sub){

			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"UPDATE icp_link_category SET ".
	"status = ?, ".
	"update_dt = ? ".
"WHERE lctgr_id = ?";
			$stmt = dbi_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'isi',
				$status,
				$now,
				$catg_id
			);
			$now = date( "Y-m-d h:i:s" );
			$status = 2;
			$catg_id = $_GET[ "id" ];
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/alma_link_category.php" );
			exit;

		}else{

			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"UPDATE icp_link_sub SET ".
	"status = ?, ".
	"update_dt = ? ".
"WHERE sctgr_id = ?";
			$stmt = dbi_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'isi',
				$status,
				$now,
				$catg_id
			);
			$now = date( "Y-m-d h:i:s" );
			$status = 2;
			$catg_id = $_GET[ "id" ];
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/alma_link_category.php?sub=" . $sub );
			exit;

		}

	}

	// 新規追加が押された
	if( $_POST[ "regist" ] != NULL ){
		$_POST[ "regist" ] = NULL;

		$catg_name = stripslashes( $_POST[ "catg_name" ] );

		// エラーチェック
		if($catg_name == NULL){
			$err_msg = "カテゴリー名が入力されていません";
		}

		if((!$err_msg)&&(!$sub)){

			// DB格納
			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"INSERT INTO icp_link_category ("
	."lctgr_menu,".
	 "lctgr_order,".
	 "lctgr_name,".
	 "status,".
	 "regist_dt,".
	 "update_dt".
") VALUES ("
	."?,?,?,?,?,?".
")";
			$stmt = dbi_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'iisiss',
				$catg_menu,
				$catg_order,
				$catg_name,
				$status,
				$now,
				$now
			);
			$now    = date( "Y-m-d h:i:s" );
			$status = 0;
			$catg_name  = mysqli_real_escape_string($cnn, $catg_name);
			$catg_order = $_POST[ "catg_order" ];
			$catg_menu  = $_POST[ "catg_menu" ];
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/alma_link_category.php" );
			exit;

		}elseif((!$err_msg)&&($sub)){

			// DB格納
			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"INSERT INTO icp_link_sub ("
	."sctgr_lcatg,".
	 "sctgr_order,".
	 "sctgr_name,".
	 "status,".
	 "regist_dt,".
	 "update_dt".
") VALUES ("
	."?,?,?,?,?,?".
")";
			$stmt = dbi_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'iisiss',
				$lcatg,
				$catg_order,
				$catg_name,
				$status,
				$now,
				$now
			);
			$now    = date( "Y-m-d h:i:s" );
			$status = 0;
			$catg_name  = mysqli_real_escape_string($cnn, $catg_name);
			$catg_order = $_POST[ "catg_order" ];
			$lcatg  = $sub;
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/alma_link_category.php?sub=" . $sub );
			exit;

		}
	}

	// リスト表示(status=1以下)
	$view = 1;

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);

	// rootカテゴリの場合
	if(!$sub){

		$sql  =
'SELECT '
	.'lctgr_id,lctgr_menu,lctgr_order,lctgr_name,status'.
' FROM '
	.'icp_link_category'.
' WHERE '
	.'status <= ?'.
' ORDER BY '
	.'lctgr_order, update_dt';

	}else{

		$sql  =
'SELECT '
	.'sctgr_id,sctgr_order,sctgr_name,status'.
' FROM '
	.'icp_link_sub'.
' WHERE '
	.'status <= ?'.
' AND '
	.'sctgr_lcatg = ?'.
' ORDER BY '
	.'sctgr_order, update_dt';

	}

	if (mysqli_stmt_prepare($stmt,$sql)) {

		if(!$sub){
			mysqli_stmt_bind_param($stmt, "i", $view);
		}else{
			mysqli_stmt_bind_param($stmt, "ii", $view, $sub);
		}
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){

			if(!$sub){
				mysqli_stmt_bind_result($stmt,
					$ctgr_id,
					$ctgr_menu,
					$ctgr_order,
					$ctgr_name,
					$status
				);

			}else{

				mysqli_stmt_bind_result($stmt,
					$ctgr_id,
					$ctgr_order,
					$ctgr_name,
					$status
				);

			}
			$i = 1;
			while (mysqli_stmt_fetch($stmt)) {

// ボタン用
$m_cnt = $i * 2;
$d_cnt = $m_cnt + 1;
$i = $i+1;

$jq_tbl .= "	$(\"#confirm" . $m_cnt . "\").click(function(){\n";
$jq_tbl .= "		var button = $(this);\n";
$jq_tbl .= "		if (confirm || jConfirm(\"カテゴリーを変更します\\nよろしいですか？\"";
$jq_tbl .= ", \"カテゴリー変更\",function(r){\n";
$jq_tbl .= "			if (r == true) {\n";
$jq_tbl .= "				confirm = true;\n";
$jq_tbl .= "				button.click();\n";
$jq_tbl .= "			}\n";
$jq_tbl .= "		}));\n";
$jq_tbl .= "		return confirm ? !(confirm = false) : confirm;\n";
$jq_tbl .= "	});\n";
$jq_tbl .= "	$(\"#confirm" . $d_cnt . "\").click(function(){\n";
$jq_tbl .= "		var button = $(this);\n";
$jq_tbl .= "		if (confirm || jConfirm(\"カテゴリーを削除します\\nよろしいですか？\"";
$jq_tbl .= ", \"カテゴリー削除\",function(r){\n";
$jq_tbl .= "			if (r == true) {\n";
$jq_tbl .= "				confirm = true;\n";
$jq_tbl .= "				button.click();\n";
$jq_tbl .= "			}\n";
$jq_tbl .= "		}));\n";
$jq_tbl .= "		return confirm ? !(confirm = false) : confirm;\n";
$jq_tbl .= "	});\n";

$catg_tbl .= "<form method=\"get\" action=\"alma_link_category.php\">\n";
$catg_tbl .= "<input type=\"hidden\" name=\"id\" value=\"" . $ctgr_id . "\" />\n";
if($sub){
$catg_tbl .= "<input type=\"hidden\" name=\"sub\" value=\"" . $sub . "\" />\n";
}
$catg_tbl .= "<tr>\n";
$catg_tbl .= "<td class=\"alignR\">" . $ctgr_id . "</td>\n";
$catg_tbl .= "<td class=\"alignC\"><input name=\"catg_name\" type=\"text\" class=\"text\"";
$catg_tbl .= " size=\"24\" value=\"" . $ctgr_name . "\" /></td>\n";
$catg_tbl .= "<td class=\"alignC\">\n";
$catg_tbl .= "<select name=\"catg_order\" class=\"dropdown\">\n";
if($ctgr_order == 1){
	$catg_tbl .= "    <option value=\"1\" selected>1</option>\n";
}else{
	$catg_tbl .= "    <option value=\"1\">1</option>\n";
}
if($ctgr_order == 2){
	$catg_tbl .= "    <option value=\"2\" selected>2</option>\n";
}else{
	$catg_tbl .= "    <option value=\"2\">2</option>\n";
}
if($ctgr_order == 3){
	$catg_tbl .= "    <option value=\"3\" selected>3</option>\n";
}else{
	$catg_tbl .= "    <option value=\"3\">3</option>\n";
}
if($ctgr_order == 4){
	$catg_tbl .= "    <option value=\"4\" selected>4</option>\n";
}else{
	$catg_tbl .= "    <option value=\"4\">4</option>\n";
}
if($ctgr_order == 5){
	$catg_tbl .= "    <option value=\"5\" selected>5</option>\n";
}else{
	$catg_tbl .= "    <option value=\"5\">5</option>\n";
}
if($ctgr_order == 6){
	$catg_tbl .= "    <option value=\"6\" selected>6</option>\n";
}else{
	$catg_tbl .= "    <option value=\"6\">6</option>\n";
}
if($ctgr_order == 7){
	$catg_tbl .= "    <option value=\"7\" selected>7</option>\n";
}else{
	$catg_tbl .= "    <option value=\"7\">7</option>\n";
}
if($ctgr_order == 8){
	$catg_tbl .= "    <option value=\"8\" selected>8</option>\n";
}else{
	$catg_tbl .= "    <option value=\"8\">8</option>\n";
}
if($ctgr_order == 9){
	$catg_tbl .= "    <option value=\"9\" selected>9</option>\n";
}else{
	$catg_tbl .= "    <option value=\"9\">9</option>\n";
}
if($ctgr_order == 10){
	$catg_tbl .= "    <option value=\"10\" selected>10</option>\n";
}else{
	$catg_tbl .= "    <option value=\"10\">10</option>\n";
}
$catg_tbl .= "</select>\n";
$catg_tbl .= "</td>\n";
$catg_tbl .= "<td class=\"alignC\">\n";
if(!$sub){
$catg_tbl .= "<select name=\"catg_menu\" class=\"dropdown\">\n";
if(($ctgr_menu == 0)||($ctgr_menu == NULL)){
	$catg_tbl .= "    <option value=\"\" selected>表示する</option>\n";
	$catg_tbl .= "    <option value=\"1\">表示しない</option>\n";
}else{
	$catg_tbl .= "    <option value=\"\">表示する</option>\n";
	$catg_tbl .= "    <option value=\"1\" selected>表示しない</option>\n";
}
}else{
	$catg_tbl .= "&nbsp;";
}
$catg_tbl .= "</select>\n";
$catg_tbl .= "</td>\n";
/*
$catg_tbl .= "<td class=\"alignC\">\n";
$catg_tbl .= "<select name=\"status\" class=\"dropdown\">\n";
if(($status == 0)||($status == NULL)){
	$catg_tbl .= "    <option value=\"0\" selected>一般向け</option>\n";
	$catg_tbl .= "    <option value=\"1\">会員専用</option>\n";
}else{
	$catg_tbl .= "    <option value=\"\">一般向け</option>\n";
	$catg_tbl .= "    <option value=\"1\" selected>会員専用</option>\n";
}
$catg_tbl .= "</select>\n";
$catg_tbl .= "</td>\n";
*/
$catg_tbl .= "<td class=\"alignC\">";
$catg_tbl .= "<input type=\"submit\" name=\"modify\" class=\"submit\" id=\"confirm";
$catg_tbl .= $m_cnt . "\" value=\"変更\" />&nbsp;\n";
$catg_tbl .= "<input type=\"submit\" name=\"delete\" class=\"submit\" id=\"confirm";
$catg_tbl .= $d_cnt . "\" value=\"削除\" />&nbsp;\n";
/*
$catg_tbl .= "<a href=\"up.php?mode=category&id=" . $ctgr_id . "\" onclick=\"return hs.htmlExpand(this, {";
$catg_tbl .= " objectType: 'iframe', width: '720', height: '200' } )\" class=\"highslide submit\">画像</a>\n";
$catg_tbl .= "<button href=\"up.php?mode=category&id=" . $ctgr_id . "\" onclick=\"return hs.htmlExpand(this, {";
$catg_tbl .= " objectType: 'iframe', width: '720', height: '200' } )\" class=\"highslide submit\">画像</button>\n";
*/
$catg_tbl .= "</td>\n";
$catg_tbl .= "</tr>\n";
$catg_tbl .= "</form>\n";

			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	$sub_op  = Category_Select_Create_3( $sub );
	$sub_name = Sub_Link_name_Read( $sub );
	if($sub_name){
		$sub_pk = $sub_name . "&nbsp;&gt;&nbsp;";
	}
	if(!$sub){
		$action = "alma_link_category.php";
	}else{
		$action = "alma_link_category.php?sub=" . $sub;
	}

?>