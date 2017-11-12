<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// データ追加ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$regist_body  = StripSlashes( $_POST[ "regist_tpc_body" ] );
		$regist_datey = StripSlashes( $_POST[ "regist_tpc_datey" ] );
		$regist_datem = StripSlashes( $_POST[ "regist_tpc_datem" ] );
		$regist_dated = StripSlashes( $_POST[ "regist_tpc_dated" ] );

		// 入力データのエラーチェック
		if( $regist_body == "" ){
			$err_msg = "本文が入力されていません。";
		}

		// 問題が無い場合
		if( $err_msg == "" ){

			$regist_date  = $regist_datey . "-";
			$regist_date .= $regist_datem . "-";
			$regist_date .= $regist_dated;

			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "INSERT INTO topics_msg";
			$sql .= "     (       topics_date,";
			$sql .= "             topics_body,";
			$sql .= "             status,";
			$sql .= "             regist_dt,";
			$sql .= "             update_dt";
			$sql .= "     )";
			$sql .= "     VALUES";
			$sql .= "     (  '" . $regist_date . "',";
			$sql .= "        '" . $regist_body . "',";
			$sql .= "        '1',";
			$sql .= "        '" . date(YmdHis) . "',";
			$sql .= "        '" . date(YmdHis) . "'";
			$sql .= "     )";

			$res = cn_query($sql, $cnn);
			tr_commit($cnn);
			db_close($cnn);

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/topics_list.php" );

			exit;

		}
	}

	// ステータスが変更された
	if( $_GET[ "chg_status" ] != "" ){

		// 値をセッションに格納
		$status  = $_GET[ "chg_status" ];
		$tpcs_id = $_GET[ "tpcs_id" ];

		// ステータス変更
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE topics_msg";
		$sql .= "       SET status  = '" . $status . "',";
		$sql .= "        update_dt  = '" . date(YmdHis) . "'";
		$sql .= "  WHERE topics_id  = " . $tpcs_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/topics_list.php" );
		exit;

	}

	// 一覧出力
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM topics_msg";
	$sql .= " WHERE status < 2";
	$sql .= " ORDER BY -topics_date";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		if ($max_cnt > 0){

			// ページ当たりの件数の取得
			$dsp_cnt = 25;
			$dsp_page = $_GET[ "dsp_page" ];
			if ($dsp_page == "")    { $dsp_page = 1; }

			// ＭＡＸページの取得
			$max_page = floor($max_cnt / $dsp_cnt) + 1;
			if (!($max_cnt % $dsp_cnt)) { $max_page--; }

			// ページリンクの作成
			for ($i=1; $i<=$max_page; $i++) {
				if ($dsp_page != 1 && $i == $dsp_page - 1) {
					$page_link1 = "[ <a href='topics_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
				}
				if ($dsp_page != $max_page && $i == $dsp_page + 1) {
					$page_link2 = "[ <a href='topics_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

					$topics_id   = cn_contract($res, $i, "topics_id");
					$body_tmp    = cn_contract($res, $i, "topics_body");
					$status      = cn_contract($res, $i, "status");
					$tmp_date    = cn_contract($res, $i, "topics_date");
					$tmp_date    = substr($tmp_date,2,2) . "." . substr($tmp_date,5,2) . "." . substr($tmp_date,8,2);
					$topics_date = $tmp_date;
					$topics_body = ereg_replace("\n", "<br />", $body_tmp);

					$tbl .= "<form method='GET' name='chg_status' action='";
					$tbl .= "topics_list.php'>\n";
					if( $status == 1 ){
						$tbl .= "<tr style='background:#EEE'>\n";
					}else{
						$tbl .= "<tr style='background:#FFF'>\n";
					}
					$tbl .= "<input type='hidden' name='tpcs_id' value='";
					$tbl .= $topics_id . "'>\n<td>" . $topics_id . "</td>\n";
					$tbl .= "<td>" . $topics_body . "</td>\n";
					$tbl .= "<td>" . $topics_date . "</td>\n";
					$tbl .= "<td><select name='chg_status' onchange=\"submit()\">\n";
					if($status == 0){
						$tbl .= "<option value='0' SELECTED>公開中</option>\n";
						$tbl .= "<option value='1'>非公開</option>\n";
						$tbl .= "<option value='2'>削除</option>\n";
					}elseif($status == 1){
						$tbl .= "<option value='0'>公開中</option>\n";
						$tbl .= "<option value='1' SELECTED>非公開</option>\n";
						$tbl .= "<option value='2'>削除</option>\n";
					}
					$tbl .= "</select>\n</td>\n</tr>\n</form>";

				}
				if ($i >= $end_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	// 現在の日付を取得して簡単セレクト
	$today = date(YmdHis);
	$slct_datey_selected = substr($today,0,4);
	$slct_datem_selected = substr($today,4,2);
	$slct_dated_selected = substr($today,6,2);

	$slct_datey_options = $YEAR_TYPE;
	$slct_datem_options = $MONT_TYPE;
	$slct_dated_options = $DAYT_TYPE;

// ******************************************************************

	$action = "topics_list.php";
	$title  = "TOPICS一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;

?>