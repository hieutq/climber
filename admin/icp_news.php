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
"UPDATE icp_news SET ".
	"status = ?, ".
	"update_dt = ? ".
"WHERE news_id = ?";
		$stmt = mysqli_prepare($cnn, $sql);
		mysqli_stmt_bind_param($stmt, 'isi',
			$status_ch,
			$now,
			$news_id
		);
		$now = date( "Y-m-d h:i:s" );
		$status_ch = $_GET[ "status_ch" ];
		$news_id = $_GET[ "id" ];
		dbi_stmt_exe($stmt);
		tri_commit($cnn);
		dbi_close($cnn);

		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/icp_news.php?status=" . $show );
		exit;

	}

	// 新規追加が押された
	if( $_POST[ "regist" ] != NULL ){
		$_POST[ "regist" ] = NULL;

		$news_body  = stripslashes( $_POST[ "news_body" ] );
		$news_url   = stripslashes( $_POST[ "news_url" ] );
		$news_datey = $_POST[ "news_datey" ];
		$news_datem = $_POST[ "news_datem" ];
		$news_dated = $_POST[ "news_dated" ];

		// エラーチェック
		if($news_body == NULL){
			$err_msg = "本文が入力されていません";
		}

		if(!$err_msg){

			// 日付生成
			$news_date = $news_datey . "-" . $news_datem . "-" . $news_dated;

			// DB格納
			$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tri_begin($cnn);
			$sql =
"INSERT INTO icp_news ("
	."news_date,".
	 "news_url,".
	 "news_body,".
	 "status,".
	 "regist_dt,".
	 "update_dt".
") VALUES ("
	."?,?,?,?,?,?".
")";
			$stmt = mysqli_prepare($cnn, $sql);
			mysqli_stmt_bind_param($stmt, 'sssiss',
				$news_date,
				$news_url,
				$news_body,
				$status,
				$now,
				$now
			);
			$now    = date( "Y-m-d h:i:s" );
			$status = 0;
			$news_date = mysqli_real_escape_string($cnn, $news_date);
			$news_url  = mysqli_real_escape_string($cnn, $news_url);
			$news_body = mysqli_real_escape_string($cnn, $news_body);
			dbi_stmt_exe($stmt);
			tri_commit($cnn);
			dbi_close($cnn);

			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/icp_news.php?status=0" );
			exit;

		}
	}

	// リスト表示
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '
	.'news_id,news_date,news_url,news_body,status'.
' FROM '
	.'icp_news'.
' WHERE '
	.'status <= ?'.
' ORDER BY '
	.'-news_date, -news_id';

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
					$news_id,
					$news_date,
					$news_url,
					$news_body,
					$status
				);
				$i = 1;
				while (mysqli_stmt_fetch($stmt2)) {

// ボタン用
$m_cnt = $i * 2;
$d_cnt = $m_cnt + 1;
$i = $i+1;

// 日付整形
$news_date = strtotime($news_date);
$news_date = date( 'Y/m/d', $news_date );

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

$news_tbl .= "<form method=\"get\" action=\"icp_news.php\">\n";
$news_tbl .= "<input type=\"hidden\" name=\"id\" value=\"" . $news_id . "\" />\n";
$news_tbl .= "<input type=\"hidden\" name=\"status\" value=\"" . $show . "\" />\n";
$news_tbl .= "<tr>\n";
$news_tbl .= "<td class=\"alignR\">" . $news_id . "</td>\n";
if($news_url){
$news_tbl .= "<td><a href=\"" . $news_url . "\" target=\"_blank\">";
$news_tbl .= $news_body . "</a></td>\n";
}else{
$news_tbl .= "<td>" . $news_body . "</td>\n";
}
$news_tbl .= "<td class=\"alignC\">" . $news_date . "</td>\n";
$news_tbl .= "<td class=\"alignC\">\n";
$news_tbl .= "<select name=\"status_ch\" class=\"dropdown\">\n";
if(($status == 0)||($status == NULL)){
	$news_tbl .= "    <option value=\"0\" selected>表示する</option>\n";
	$news_tbl .= "    <option value=\"1\">表示しない</option>\n";
	$news_tbl .= "    <option value=\"2\">削除する</option>\n";
}elseif($status == 1){
	$news_tbl .= "    <option value=\"0\">表示する</option>\n";
	$news_tbl .= "    <option value=\"1\" selected>表示しない</option>\n";
	$news_tbl .= "    <option value=\"2\">削除する</option>\n";
}
$news_tbl .= "</select>&nbsp;\n";
$news_tbl .= "<input type=\"submit\" name=\"modify\" class=\"submit\" id=\"confirm";
$news_tbl .= $m_cnt . "\" value=\"変更\" />\n";
$news_tbl .= "</td>\n";
$news_tbl .= "</tr>\n";
$news_tbl .= "</form>\n";

$news_id = NULL;
$news_date = "";
$news_url = "";
$news_body = "";
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

	$action = "icp_news.php?status=" . $show;

?>