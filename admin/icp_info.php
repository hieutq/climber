<?PHP
// *******************************************************************
// ICP管理画面お知らせ編集　PHP　Encording UTF-8
// *******************************************************************

	$show = $_GET[ "status" ];
	if($show == NULL){
		$show = 0;
	}
	$dsp = $_GET[ "dsp" ];
	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// 属性変更が押された
	if( $_GET[ "modify" ] != NULL ){

		$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tri_begin($cnn);
		$sql =
"UPDATE icp_info SET ".
	"status = ?, ".
	"update_dt = ? ".
"WHERE info_id = ?";
		$stmt = mysqli_prepare($cnn, $sql);
		mysqli_stmt_bind_param($stmt, 'isi',
			$status_ch,
			$now,
			$info_id
		);
		$now = date( "Y-m-d h:i:s" );
		$status_ch = $_GET[ "status_ch" ];
		$info_id = $_GET[ "id" ];
		dbi_stmt_exe($stmt);
		tri_commit($cnn);
		dbi_close($cnn);

		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/icp_info.php?status=" . $show );
		exit;

	}

	// 新規追加が押された
	if( $_POST[ "regist" ] != NULL ){
		$_POST[ "regist" ] = NULL;

		$info_body  = stripslashes( $_POST[ "info_body" ] );
		$info_url   = stripslashes( $_POST[ "info_url" ] );
		$info_datey = $_POST[ "info_datey" ];
		$info_datem = $_POST[ "info_datem" ];
		$info_dated = $_POST[ "info_dated" ];

		// エラーチェック
		if($info_body == NULL){
			$err_msg = "本文が入力されていません";
		}

		if(!$err_msg){

			// 日付生成
			$info_date = $info_datey . "-" . $info_datem . "-" . $info_dated;

			// DB格納
			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"INSERT INTO icp_info ("
	."info_date,".
	 "info_url,".
	 "info_body,".
	 "status,".
	 "regist_dt,".
	 "update_dt".
") VALUES ("
	."?,?,?,?,?,?".
")";
			$stmt = mysqli_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'sssiss',
				$info_date,
				$info_url,
				$info_body,
				$status,
				$now,
				$now
			);
			$now    = date( "Y-m-d h:i:s" );
			$status = 0;
			$info_date = mysqli_real_escape_string($cnn, $info_date);
			$info_url  = mysqli_real_escape_string($cnn, $info_url);
			$info_body = mysqli_real_escape_string($cnn, $info_body);
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/icp_info.php?status=0" );
			exit;

		}
	}

	// リスト表示
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '
	.'info_id,info_date,info_url,info_body,status'.
' FROM '
	.'icp_info'.
' WHERE '
	.'status <= ?'.
' ORDER BY '
	.'-info_date, -info_id';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $show);
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
				$page_info = $cnt . "件中 " . (($dsp - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
			} else {
				$page_info = $cnt . "件中 " . (($dsp - 1) * $dsp_cnt + 1) . "件から " . ($cnt % $dsp_cnt) . "件表示";
			}

			$page_footer = pager( "dsp", $cnt );

			// データ読み出し
			$stmt2 = dbi_stmt_init($cnn);
			$sql2  = $sql . " LIMIT ?,?";

			if (mysqli_stmt_prepare($stmt2,$sql2)) {

				mysqli_stmt_bind_param($stmt2, "iii", $show, $stt_cnt, $dsp_cnt);
				dbi_stmt_exe($stmt2);
				dbi_store_res($stmt2);
				mysqli_stmt_bind_result($stmt2,
					$info_id,
					$info_date,
					$info_url,
					$info_body,
					$status
				);
				$i = 1;
				while (mysqli_stmt_fetch($stmt2)) {

// ボタン用
$m_cnt = $i * 2;
$d_cnt = $m_cnt + 1;
$i = $i+1;

// 日付整形
$info_date = strtotime($info_date);
$info_date = date( 'Y/m/d', $info_date );

$jq_tbl .= "	$(\"#confirm" . $m_cnt . "\").click(function(){\n";
$jq_tbl .= "		var button = $(this);\n";
$jq_tbl .= "		if (confirm || jConfirm(\"表示属性を変更します\\nよろしいですか？\"";
$jq_tbl .= ", \"表示属性変更\",function(r){\n";
$jq_tbl .= "			if (r == true) {\n";
$jq_tbl .= "				confirm = true;\n";
$jq_tbl .= "				button.click();\n";
$jq_tbl .= "			}\n";
$jq_tbl .= "		}));\n";
$jq_tbl .= "		return confirm ? !(confirm = false) : confirm;\n";
$jq_tbl .= "	});\n";

$tpcs_tbl .= "<form method=\"get\" action=\"icp_info.php\">\n";
$tpcs_tbl .= "<input type=\"hidden\" name=\"p\" value=\"tpcs\" />\n";
$tpcs_tbl .= "<input type=\"hidden\" name=\"id\" value=\"" . $info_id . "\" />\n";
$tpcs_tbl .= "<input type=\"hidden\" name=\"status\" value=\"" . $show . "\" />\n";
$tpcs_tbl .= "<tr>\n";
$tpcs_tbl .= "<td class=\"alignR\">" . $info_id . "</td>\n";
if($info_url){
$tpcs_tbl .= "<td><a href=\"" . $info_url . "\" target=\"_blank\">";
$tpcs_tbl .= $info_body . "</a></td>\n";
}else{
$tpcs_tbl .= "<td>" . $info_body . "</td>\n";
}
$tpcs_tbl .= "<td class=\"alignC\">" . $info_date . "</td>\n";
$tpcs_tbl .= "<td class=\"alignC\">\n";
$tpcs_tbl .= "<select name=\"status_ch\" class=\"dropdown\">\n";
if(($status == 0)||($status == NULL)){
	$tpcs_tbl .= "    <option value=\"0\" selected>表示する</option>\n";
	$tpcs_tbl .= "    <option value=\"1\">表示しない</option>\n";
	$tpcs_tbl .= "    <option value=\"2\">削除する</option>\n";
}elseif($status == 1){
	$tpcs_tbl .= "    <option value=\"0\">表示する</option>\n";
	$tpcs_tbl .= "    <option value=\"1\" selected>表示しない</option>\n";
	$tpcs_tbl .= "    <option value=\"2\">削除する</option>\n";
}
$tpcs_tbl .= "</select>&nbsp;\n";
$tpcs_tbl .= "<input type=\"submit\" name=\"modify\" class=\"submit\" id=\"confirm";
$tpcs_tbl .= $m_cnt . "\" value=\"変更\" />\n";
$tpcs_tbl .= "</td>\n";
$tpcs_tbl .= "</tr>\n";
$tpcs_tbl .= "</form>\n";

$info_id = NULL;
$info_date = "";
$info_url = "";
$info_body = "";
$status = NULL;

				}
				dbi_stmt_close($stmt2);
			}
		}
	}
	dbi_close($cnn);

// ***********************************************************************

	$dy = date( "Y" );
	$dm = date( "n" );
	$dd = date( "j" );
	$datey = Date_Select_Create_1( $dy - 2, $dy + 5, $dy );
	$datem = Date_Select_Create_1( 1, 12, $dm );
	$dated = Date_Select_Create_1( 1, 31, $dd );

	if($show == 1){
		$status_op = " selected";
	}

	$action = "icp_info.php?status=" . $show;

?>