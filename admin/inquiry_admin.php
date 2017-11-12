<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$mode = $_GET[ "mode" ];

	// 初回セッションクリア
	if( $mode == "bang" ){
		$_SESSION[ "JILM_SEARCH_INQ_NAME" ]  = "";
		$_SESSION[ "JILM_SEARCH_INQ_EMAIL" ] = "";
		$_SESSION[ "JILM_SEARCH_INQ_BODY" ]  = "";
		$_SESSION[ "JILM_SEARCH_INQ_FAQ" ]   = "";
		$_SESSION[ "JILM_SEARCH_INQ_IMP" ]   = "";
		$_SESSION[ "JILM_SEARCH_INQ_ANSW" ]  = "";
	}

	// メンバー詳細へリダイレクト
	if( $mode == "redirect" ){

		$_SESSION[ "JILM_MEMBER_ID" ] = $_GET[ "member_id" ];

		// 修正にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/member_modify.php?INIT_FLG=1" );
		exit;

	}

	// 回答済み数値変更
	if( $_GET[ "ans" ] != NULL ){

		$inq_id = $_GET[ "id" ];
		$answer = $_GET[ "ans" ];

		// 数値変更
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE contact_log SET';
		$sql .= '        ctct_answer = "' . $answer . '"';
		$sql .= '    WHERE';
		$sql .= '        ctct_id = "' . $inq_id . '"';
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/inquiry_admin.php#". $inq_id );
		exit;

	}

	// 削除
	if( $_GET[ "del" ] != NULL ){

		$inq_id = $_GET[ "id" ];
		$status = 1;

		// 数値変更
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE contact_log SET';
		$sql .= '        status = "1"';
		$sql .= '    WHERE';
		$sql .= '        ctct_id = "' . $inq_id . '"';
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/inquiry_admin.php#". $inq_id );
		exit;

	}

	// 検索ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$_SESSION[ "JILM_SEARCH_INQ_NAME" ]  = StripSlashes( $_POST[ "search_name" ] );
		$_SESSION[ "JILM_SEARCH_INQ_EMAIL" ] = StripSlashes( $_POST[ "search_email" ] );
		$_SESSION[ "JILM_SEARCH_INQ_BODY" ]  = StripSlashes( $_POST[ "search_body" ] );
		$_SESSION[ "JILM_SEARCH_INQ_FAQ" ]   = StripSlashes( $_POST[ "search_faq" ] );
		$_SESSION[ "JILM_SEARCH_INQ_IMP" ]   = StripSlashes( $_POST[ "search_imp" ] );
		$_SESSION[ "JILM_SEARCH_INQ_ANSW" ]  = $_POST[ "search_answ" ];

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/inquiry_admin.php" );
		exit;
	}

	// 検索解除ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] = "";

		// 入力データを変数に変換
		$_SESSION[ "JILM_SEARCH_INQ_NAME" ]  = "";
		$_SESSION[ "JILM_SEARCH_INQ_EMAIL" ] = "";
		$_SESSION[ "JILM_SEARCH_INQ_BODY" ]  = "";
		$_SESSION[ "JILM_SEARCH_INQ_FAQ" ]   = "";
		$_SESSION[ "JILM_SEARCH_INQ_IMP" ]   = "";
		$_SESSION[ "JILM_SEARCH_INQ_ANSW" ]  = "";

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/inquiry_admin.php" );
		exit;
	}

	// 一覧出力
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM contact_log";
	$sql .= " WHERE status = 0";

	// 名前検索がある場合
	if( $_SESSION[ "JILM_SEARCH_INQ_NAME" ] != "" ){
		$sql .= "  AND ctct_name LIKE '%" . $_SESSION[ "JILM_SEARCH_INQ_NAME" ] . "%'";
	}
	// メール検索がある場合
	if( $_SESSION[ "JILM_SEARCH_INQ_EMAIL" ] != "" ){
		$sql .= "  AND ctct_email LIKE '%" . $_SESSION[ "JILM_SEARCH_INQ_EMAIL" ] . "%'";
	}
	// 本文検索がある場合
	if( $_SESSION[ "JILM_SEARCH_INQ_BODY" ] != "" ){
		$sql .= "  AND ctct_body LIKE '%" . $_SESSION[ "JILM_SEARCH_INQ_BODY" ] . "%'";
	}
	// FAQ検索がある場合
	if( $_SESSION[ "JILM_SEARCH_INQ_FAQ" ] != "" ){
		$sql .= "  AND ctct_faq = '" . $_SESSION[ "JILM_SEARCH_INQ_FAQ" ] . "'";
	}
	// 印象検索がある場合
	if( $_SESSION[ "JILM_SEARCH_INQ_IMP" ] != "" ){
		$sql .= "  AND ctct_impr = '" . $_SESSION[ "JILM_SEARCH_INQ_IMP" ] . "'";
	}
	// 見回答検索がある場合
	if( $_SESSION[ "JILM_SEARCH_INQ_ANSW" ] != "" ){
		$sql .= "  AND ctct_answer = '" . $_SESSION[ "JILM_SEARCH_INQ_ANSW" ] . "'";
	}
	$sql .= " ORDER BY regist_dt DESC";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		if ($max_cnt > 0){

			// ページ当たりの件数の取得
			$dsp_cnt = 50;
			$dsp_page = $_GET[ "dsp_page" ];
			if ($dsp_page == "")    { $dsp_page = 1; }

			// ＭＡＸページの取得
			$max_page = floor($max_cnt / $dsp_cnt) + 1;
			if (!($max_cnt % $dsp_cnt)) { $max_page--; }

			// ページリンクの作成
			for ($i=1; $i<=$max_page; $i++) {
				if ($dsp_page != 1 && $i == $dsp_page - 1) {
					$page_link1 = "[ <a href='inquiry_admin.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
				}
				if ($dsp_page != $max_page && $i == $dsp_page + 1) {
					$page_link2 = "[ <a href='inquiry_admin.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
				}
			}
			if ($dsp_page != $max_page || $max_cnt % $dsp_cnt == 0) {
				$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
			} else {
				$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . ($max_cnt % $dsp_cnt) . "件表示";
			}

			$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
			$end_cnt = $dsp_page * $dsp_cnt - 1;

			// データの頁表示
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= $stt_cnt && $i <= $end_cnt ) {

					$ctct_id   = cn_contract($res, $i, "ctct_id");
					$ctct_name = cn_contract($res, $i, "ctct_name");
					$ctct_mail = cn_contract($res, $i, "ctct_mail");
					$ctct_answ = cn_contract($res, $i, "ctct_answer");
					$tmp_date  = cn_contract($res, $i, "regist_dt");
					$regist_dt = substr($tmp_date,0,4) . "年" . substr($tmp_date,5,2) . "月" . substr($tmp_date,8,2) . "日";

					$tbl .= "<tr id=\"" . $ctct_id . "\">\n";
					$tbl .= "<td>" . $ctct_id . "</td>\n";
					if( $ctct_mbr == 0 ){
						$tbl .= "<td>" . $ctct_name . "</td>\n";
					}else{
						$tbl .= "<td><a href=\"/admin/inquiry_admin.php?mode=redirect&member_id=";
						$tbl .= $ctct_mbr . "\">" . $ctct_name . "</a></td>\n";
					}
					$tbl .= "<td><a href=\"mailto:" . $ctct_mail . "\">";
					$tbl .= $ctct_mail . "</a></td>\n";

//					if( $ctct_cc == "" ){
						$tbl .= "<td>&nbsp;</td>\n";
/*					}else{
						$tbl .= "<td>済</td>\n";
					}
*/
					$tbl .= "<td><a href=\"inquiry_detail.php?id=" . $ctct_id;
					$tbl .= "\">詳細画面へ</a></td>\n";
					$tbl .= "<td>" . $regist_dt . "</td>\n";
					if( $ctct_answ == 1 ){
						$tbl .= "<td><input type=\"checkbox\" onclick=\"location.href='inquiry_admin.php?ans=0&id=" . $ctct_id . "'\" /></td>\n";
					}else{
						$tbl .= "<td><input type=\"checkbox\" onclick=\"location.href='inquiry_admin.php?ans=1&id=" . $ctct_id . "'\" checked /></td>\n";
					}
					$tbl .= "<td><input type=\"checkbox\" onclick=\"del_inq(" . $ctct_id . ")\" value=\"削除\"></td>\n";
					$tbl .= "</tr>\n";

				}
				if ($i >= $end_cnt) { break; }
			}
		}
	}

	db_close($cnn);

// ******************************************************************

	$action = "inquiry_admin.php";
	$title  = "お問い合わせ一覧";

	$search_name = $_SESSION[ "JILM_SEARCH_INQ_NAME" ];
	$search_mail = $_SESSION[ "JILM_SEARCH_INQ_EMAIL" ];
	$search_body = $_SESSION[ "JILM_SEARCH_INQ_BODY" ];

	if( $_SESSION[ "JILM_SEARCH_INQ_FAQ" ] == "読みました" ){
		$faq_slct1 = " selected";
	}elseif( $_SESSION[ "JILM_SEARCH_INQ_FAQ" ] == "読んでません" ){
		$faq_slct2 = " selected";
	}
	if( $_SESSION[ "JILM_SEARCH_INQ_IMP" ] == "良かった" ){
		$imp_slct1 = " selected";
	}elseif( $_SESSION[ "JILM_SEARCH_INQ_IMP" ] == "まあまあ" ){
		$imp_slct2 = " selected";
	}elseif( $_SESSION[ "JILM_SEARCH_INQ_IMP" ] == "良くない" ){
		$imp_slct3 = " selected";
	}
	if( $_SESSION[ "JILM_SEARCH_INQ_ANSW" ] == "1" ){
		$answ_chk = " checked";
	}

	$dsp_tbl = $tbl;

?>