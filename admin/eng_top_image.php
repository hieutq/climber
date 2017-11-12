<?
// *******************************************************************
// ENGLISHトップバナー編集　PHP　Encording UTF-8
// *******************************************************************

	// 変更が押された
	if( $_GET[ "modify" ] != NULL ){

		$img_alt = stripslashes( $_GET[ "img_alt" ] );

		$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tri_begin($cnn);
		$sql =
"UPDATE eng_top_image SET ".
	"img_alt = ?, ".
	"img_order = ?, ".
	"status = ?, ".
	"update_dt = ? ".
"WHERE img_id = ?";
		$stmt = dbi_prepare($cnn, $sql);
		mysqli_stmt_bind_param($stmt, 'siisi',
			$alt,
			$order,
			$status,
			$now,
			$id
		);
		$now = date( "Y-m-d h:i:s" );
		$alt = mysqli_real_escape_string($cnn, $img_alt);
		$status = $_GET[ "status" ];
		$order = $_GET[ "img_order" ];
		$id = $_GET[ "id" ];
		dbi_stmt_exe($stmt);
		tri_commit($cnn);
		dbi_close($cnn);

		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/eng_top_image.php" );
		exit;

	}

	// 削除が押された
	if( $_GET[ "delete" ] != NULL ){

		$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tri_begin($cnn);
		$sql =
"UPDATE eng_top_image SET ".
	"status = 2, ".
	"update_dt = ? ".
"WHERE img_id = ?";
		$stmt = dbi_prepare($cnn, $sql);
		mysqli_stmt_bind_param($stmt, 'si',
			$now,
			$id
		);
		$now = date( "Y-m-d h:i:s" );
		$id = $_GET[ "id" ];
		dbi_stmt_exe($stmt);
		tri_commit($cnn);
		dbi_close($cnn);

		$dfile = "../eng/images/top/top_image_" . $id . ".jpg";
		rename( $dfile, $dfile.".".date("YmdHis") );

		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/eng_top_image.php" );
		exit;

	}

	// 新規追加が押された
	if( $_POST[ "regist" ] != NULL ){
		$_POST[ "regist" ] = NULL;

		$img_file = $_FILES['img_file']['tmp_name'];
		$img_alt = stripslashes( $_POST[ "img_alt" ] );
		$extension = pathinfo($_FILES['img_file']['name'], PATHINFO_EXTENSION);
		$finfo = getimagesize($img_file);

		// エラーチェック
		if($extension != "jpg"){
			if($extension != "JPG"){ 
				$err_msg = "許可されている拡張子はjpgまたはJPGのみです";
			}
		}elseif($finfo[0] !== 690){
			$err_msg = "画像サイズが異なります";
		}elseif($finfo[1] !== 206){
			$err_msg = "画像サイズが異なります";
		}

		if(!$err_msg){

			// DB格納
			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"INSERT INTO eng_top_image ("
	."img_file,".
	 "img_alt,".
	 "img_order,".
	 "status,".
	 "regist_dt,".
	 "update_dt".
") VALUES ("
	."?,?,?,?,?,?".
")";
			$stmt = dbi_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'ssiiss',
				$file,
				$alt,
				$order,
				$status,
				$now,
				$now
			);
			$now    = date( "Y-m-d h:i:s" );
			$status = $_POST[ "status" ];
			$file = $_FILES['img_file']['name'];
			$alt = mysqli_real_escape_string($cnn, $img_alt);
			$order = $_POST[ "img_order" ];
			dbi_stmt_exe($stmt);
			$new_id = mysqli_insert_id($cnn);
			tri_commit($cnn);
			dbi_close($cnn);

			// アップフォルダ定義
			$filedir = "../eng/images/top/";

			// アップ＆リネーム処理
			$image_name = "top_image_" . $new_id . ".jpg";
			move_uploaded_file($_FILES['img_file']['tmp_name'], $filedir . $image_name);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/eng_top_image.php" );
			exit;

		}
	}

	// リスト表示(status=0及び1)
	$status = 1;

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'img_id,img_file,img_alt,img_order,status'.
' FROM '
	.'eng_top_image'.
' WHERE '
	.'status <= ?'.
' ORDER BY '
	.'img_order, update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$img_id,
				$img_file,
				$img_alt,
				$img_order,
				$view
			);
			while (mysqli_stmt_fetch($stmt)) {

$jq_tbl .= "	$(\"#mconfirm" . $img_id . "\").click(function(){\n";
$jq_tbl .= "		var button = $(this);\n";
$jq_tbl .= "		if (confirm || jConfirm(\"トップイメージを変更します\\nよろしいですか？\"";
$jq_tbl .= ", \"トップイメージ変更\",function(r){\n";
$jq_tbl .= "			if (r == true) {\n";
$jq_tbl .= "				confirm = true;\n";
$jq_tbl .= "				button.click();\n";
$jq_tbl .= "			}\n";
$jq_tbl .= "		}));\n";
$jq_tbl .= "		return confirm ? !(confirm = false) : confirm;\n";
$jq_tbl .= "	});\n";
$jq_tbl .= "	$(\"#dconfirm" . $img_id . "\").click(function(){\n";
$jq_tbl .= "		var button = $(this);\n";
$jq_tbl .= "		if (confirm || jConfirm(\"トップイメージを消去します\\nよろしいですか？\"";
$jq_tbl .= ", \"トップイメージ消去\",function(r){\n";
$jq_tbl .= "			if (r == true) {\n";
$jq_tbl .= "				confirm = true;\n";
$jq_tbl .= "				button.click();\n";
$jq_tbl .= "			}\n";
$jq_tbl .= "		}));\n";
$jq_tbl .= "		return confirm ? !(confirm = false) : confirm;\n";
$jq_tbl .= "	});\n";

$img_tbl .= "<form method=\"get\" action=\"eng_top_image.php\">\n";
$img_tbl .= "<input type=\"hidden\" name=\"id\" value=\"" . $img_id . "\" />\n";
$img_tbl .= "<tr>\n";
$img_tbl .= "<td class=\"alignR\">" . $img_id . "</td>\n";
$img_tbl .= "<td><a href=\"../eng/images/top/top_image_" . $img_id . ".jpg\" onclick=\"return hs.expand(this)\" class=\"highslide\">";
$img_tbl .= $img_file . "</a></td>\n";
$img_tbl .= "<td class=\"alignC\"><input name=\"img_alt\" type=\"text\" class=\"text\"";
$img_tbl .= " size=\"18\" value=\"" . $img_alt . "\" /></td>\n";
$img_tbl .= "<td class=\"alignC\">\n";
$img_tbl .= "<select name=\"img_order\" class=\"dropdown\">\n";
if($img_order == 1){
	$img_tbl .= "    <option value=\"1\" selected>1</option>\n";
}else{
	$img_tbl .= "    <option value=\"1\">1</option>\n";
}
if($img_order == 2){
	$img_tbl .= "    <option value=\"2\" selected>2</option>\n";
}else{
	$img_tbl .= "    <option value=\"2\">2</option>\n";
}
if($img_order == 3){
	$img_tbl .= "    <option value=\"3\" selected>3</option>\n";
}else{
	$img_tbl .= "    <option value=\"3\">3</option>\n";
}
if($img_order == 4){
	$img_tbl .= "    <option value=\"4\" selected>4</option>\n";
}else{
	$img_tbl .= "    <option value=\"4\">4</option>\n";
}
if($img_order == 5){
	$img_tbl .= "    <option value=\"5\" selected>5</option>\n";
}else{
	$img_tbl .= "    <option value=\"5\">5</option>\n";
}
if($img_order == 6){
	$img_tbl .= "    <option value=\"6\" selected>6</option>\n";
}else{
	$img_tbl .= "    <option value=\"6\">6</option>\n";
}
if($img_order == 7){
	$img_tbl .= "    <option value=\"7\" selected>7</option>\n";
}else{
	$img_tbl .= "    <option value=\"7\">7</option>\n";
}
if($img_order == 8){
	$img_tbl .= "    <option value=\"8\" selected>8</option>\n";
}else{
	$img_tbl .= "    <option value=\"8\">8</option>\n";
}
if($img_order == 9){
	$img_tbl .= "    <option value=\"9\" selected>9</option>\n";
}else{
	$img_tbl .= "    <option value=\"9\">9</option>\n";
}
if($img_order == 10){
	$img_tbl .= "    <option value=\"10\" selected>10</option>\n";
}else{
	$img_tbl .= "    <option value=\"10\">10</option>\n";
}
$img_tbl .= "</select>\n";
$img_tbl .= "</td>\n";
$img_tbl .= "<td class=\"alignC\">\n";
$img_tbl .= "<select name=\"status\" class=\"dropdown\">\n";
if(($view == 0)||($view == NULL)){
	$img_tbl .= "    <option value=\"0\" selected>表示する</option>\n";
	$img_tbl .= "    <option value=\"1\">表示しない</option>\n";
}else{
	$img_tbl .= "    <option value=\"0\">表示する</option>\n";
	$img_tbl .= "    <option value=\"1\" selected>表示しない</option>\n";
}
$img_tbl .= "</select>\n";
$img_tbl .= "</td>\n";
$img_tbl .= "<td class=\"alignC\">";
$img_tbl .= "<input type=\"submit\" name=\"modify\" class=\"submit\" id=\"mconfirm";
$img_tbl .= $img_id . "\" value=\"変更\" />&nbsp;\n";
$img_tbl .= "<input type=\"submit\" name=\"delete\" class=\"submit\" id=\"dconfirm";
$img_tbl .= $img_id . "\" value=\"削除\" />&nbsp;\n";
$img_tbl .= "</td>\n";
$img_tbl .= "</tr>\n";
$img_tbl .= "</form>\n";

			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	$action = "eng_top_image.php";

?>