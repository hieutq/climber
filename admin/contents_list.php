<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// フォルダデータがある時はフォルダ表示
	if( $_GET[ "fold" ] != "" ){
		$_SESSION[ "JILM_CTS_SEARCH_FOLD" ] = $_GET[ "fold" ];
		if($_SESSION[ "JILM_CTS_SEARCH_FOLD" ] == "0"){
			$_SESSION[ "JILM_CTS_SEARCH_FOLD" ] = "";
		}
	}

	// 検索ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データをセッションに変換
		$_SESSION[ "JILM_CTS_SEARCH_WORD" ] = StripSlashes( $_POST[ "search_word" ] );

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/contents_list.php?fold=" . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] );
		exit;

	}

	// 検索解除ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] = "";

		// 入力データをセッションに変換
		$_SESSION[ "JILM_CTS_SEARCH_WORD" ] = "";

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/contents_list.php?fold=" . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] );
		exit;

	}

	// ステータスが変更された
	if( $_GET[ "chg_status" ] != "" ){

		// 値をセッションに格納
		$status = $_GET[ "chg_status" ];
		$cts_id = $_GET[ "cts_id" ];
		$rank   = $_GET[ "cts_rank" ];
		$s_fold = $_GET[ "fold" ];

		// ステータス変更
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE content_body";
		$sql .= "       SET status  = '" . $status . "',";
		$sql .= "         cts_rank  = '" . $rank . "',";
		$sql .= "        update_dt  = '" . date(YmdHis) . "'";
		$sql .= "     WHERE cts_id  = " . $cts_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/contents_list.php?fold=" . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] );
		exit;

	}

	// 並び替え用
	$cts_odr = $_GET[ "odr" ];

	// ランク入れ替え
	if( $_GET[ "rkchg" ] != "" ){

		if( $_GET[ "rkchg" ] == "n" ){

			// 自分のランク取得
			$gid   = $_GET[ "rid" ];
			$grank = $_GET[ "rk" ];

			// 次のランク取得
			$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			$sql  = " SELECT * FROM content_body";
			$sql .= " WHERE status < 3";
			if( $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] != "" ){
				$sql .= "  AND cts_ctgr = " . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];
			}else{
				$sql .= "  AND cts_ctgr = 0";
			}

			// 並び替え
			if($cts_odr == 10){
				$sql .= " ORDER BY cts_id";
			}elseif($cts_odr == 11){
				$sql .= " ORDER BY -cts_id";
			}elseif($cts_odr == 20){
				$sql .= " ORDER BY cts_rank";
			}elseif($cts_odr == 21){
				$sql .= " ORDER BY -cts_rank";
			}elseif($cts_odr == 30){
				$sql .= " ORDER BY update_dt";
			}elseif($cts_odr == 31){
				$sql .= " ORDER BY -update_dt";
			}else{
				$sql .= " ORDER BY cts_rank, update_dt";
			}

			$res  = cn_query($sql, $cnn);
			if ($res == true){
				$max_cnt = cn_count($res);
				if ($max_cnt > 0){
					for ($i=0; $i<=$max_cnt; $i++) {
						$next_id   = cn_contract($res, $i, "cts_id");
						$next_rank = cn_contract($res, $i, "cts_rank");
						if( $rstop_flg != "" ){
							break;
						}
						if( $next_id == $gid ){
							$rstop_flg = "on";
						}
					}
				}
			}
			db_close($cnn);

			// ランク入れ替え
			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "UPDATE content_body";
			$sql .= "     SET cts_rank  = '" . $next_rank . "',";
			$sql .= "        update_dt  = '" . date(YmdHis) . "'";
			$sql .= "     WHERE cts_id  = " . $gid;
			$res = cn_query($sql, $cnn);
			tr_commit($cnn);
			db_close($cnn);

			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "UPDATE content_body";
			$sql .= "     SET cts_rank  = '" . $grank . "',";
			$sql .= "        update_dt  = '" . date(YmdHis) . "'";
			$sql .= "     WHERE cts_id  = " . $next_id;
			$res = cn_query($sql, $cnn);
			tr_commit($cnn);
			db_close($cnn);

		}elseif( $_GET[ "rkchg" ] == "b" ){

			// 自分のランク取得
			$gid   = $_GET[ "rid" ];
			$grank = $_GET[ "rk" ];

			// 前のランク取得
			$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			$sql  = " SELECT * FROM content_body";
			$sql .= " WHERE status < 3";
			if( $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] != "" ){
				$sql .= "  AND cts_ctgr = " . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];
			}else{
				$sql .= "  AND cts_ctgr = 0";
			}

			// 並び替え
			if($cts_odr == 10){
				$sql .= " ORDER BY cts_id";
			}elseif($cts_odr == 11){
				$sql .= " ORDER BY -cts_id";
			}elseif($cts_odr == 20){
				$sql .= " ORDER BY cts_rank";
			}elseif($cts_odr == 21){
				$sql .= " ORDER BY -cts_rank";
			}elseif($cts_odr == 30){
				$sql .= " ORDER BY update_dt";
			}elseif($cts_odr == 31){
				$sql .= " ORDER BY -update_dt";
			}else{
				$sql .= " ORDER BY cts_rank, update_dt";
			}

			$res  = cn_query($sql, $cnn);
			if ($res == true){
				$max_cnt = cn_count($res);
				if ($max_cnt > 0){
					for ($i=0; $i<$max_cnt; $i++) {
						if ( $i >= 0 && $i <= $max_cnt ) {
							$kari_id   = cn_contract($res, $i, "cts_id");
							$kari_rank = cn_contract($res, $i, "cts_rank");

							if( $kari_id != $gid ){
								$before_id   = $kari_id;
								$before_rank = $kari_rank;
							}else{
								break;
							}
						}
					}
				}
			}
			db_close($cnn);

			// ランク入れ替え
			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "UPDATE content_body";
			$sql .= "     SET cts_rank  = '" . $before_rank . "',";
			$sql .= "        update_dt  = '" . date(YmdHis) . "'";
			$sql .= "     WHERE cts_id  = " . $gid;
			$res = cn_query($sql, $cnn);
			tr_commit($cnn);
			db_close($cnn);

			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "UPDATE content_body";
			$sql .= "     SET cts_rank  = '" . $grank . "',";
			$sql .= "        update_dt  = '" . date(YmdHis) . "'";
			$sql .= "     WHERE cts_id  = " . $before_id;
			$res = cn_query($sql, $cnn);
			tr_commit($cnn);
			db_close($cnn);

		}

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/contents_list.php?fold=" . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] );
		exit;

	}

	// 検索ワードがない場合、まずフォルダ表示
	if( $_SESSION[ "JILM_CTS_SEARCH_WORD" ] == "" ){
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE status < 3";
		if( $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] != "" ){
			$sql .= "  AND ctgr_oya = " . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];
		}else{
			$sql .= "  AND ctgr_oya = 0";
		}
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$max_cnt = cn_count($res);
			if ($max_cnt > 0){
				for ($i=0; $i<$max_cnt; $i++) {
					if ( $i >= 0 && $i <= $max_cnt ) {
						$ctgr_id   = cn_contract($res, $i, "ctgr_id");
						$ctgr_name = cn_contract($res, $i, "ctgr_name");

						$tbl .= "<tr>\n";
						$tbl .= "<td colspan=\"5\"><a href=\"contents_list.php?fold=" . $ctgr_id;
						$tbl .= "\"><img src=\"./css/fold.png\" width=\"18\" ";
						$tbl .= "height=\"18\" />&nbsp;" . $ctgr_name . "</a></td>\n</tr>\n";
					}
				}
			}
		}
		db_close($cnn);

		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE status = 1";
		if( $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] != "" ){
			$sql .= "  AND ctgr_oya = " . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];
		}else{
			$sql .= "  AND ctgr_oya = 0";
		}
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$max_cnt = cn_count($res);
			if ($max_cnt > 0){
				for ($i=0; $i<$max_cnt; $i++) {
					if ( $i >= 0 && $i <= $max_cnt ) {
						$ctgr_id   = cn_contract($res, $i, "ctgr_id");
						$ctgr_name = cn_contract($res, $i, "ctgr_name");

						$tbl .= "<tr>\n";
						$tbl .= "<td colspan=\"5\"><a href=\"contents_list.php?fold=" . $ctgr_id;
						$tbl .= "\"><img src=\"./css/fold_key.png\" width=\"18\" ";
						$tbl .= "height=\"18\" />&nbsp;" . $ctgr_name . "</a></td>\n</tr>\n";
					}
				}
			}
		}
		db_close($cnn);

		// 一覧出力
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_body";
		$sql .= " WHERE status < 3";

		// フォルダが絞り込まれている場合
		if( $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] != "" ){
			$sql .= "  AND cts_ctgr = " . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];
		}else{
			$sql .= "  AND cts_ctgr = 0";
		}

		// 並び替え
		if($cts_odr == 10){
			$sql .= " ORDER BY cts_id";
		}elseif($cts_odr == 11){
			$sql .= " ORDER BY -cts_id";
		}elseif($cts_odr == 20){
			$sql .= " ORDER BY cts_rank";
		}elseif($cts_odr == 21){
			$sql .= " ORDER BY -cts_rank";
		}elseif($cts_odr == 30){
			$sql .= " ORDER BY update_dt";
		}elseif($cts_odr == 31){
			$sql .= " ORDER BY -update_dt";
		}else{
			$sql .= " ORDER BY cts_rank, update_dt";
		}
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
						$page_link1 = "[ <a href='contents_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
					}
					if ($dsp_page != $max_page && $i == $dsp_page + 1) {
						$page_link2 = "[ <a href='contents_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

						$cts_id    = cn_contract($res, $i, "cts_id");
						$cts_title = cn_contract($res, $i, "cts_title");
						$cts_rank  = cn_contract($res, $i, "cts_rank");
						$status    = cn_contract($res, $i, "status");
						$tmp_date  = cn_contract($res, $i, "update_dt");
						$tmp_date  = substr($tmp_date,0,4) . "/" . substr($tmp_date,5,2) . "/" . substr($tmp_date,8,2);
						$update_dt = $tmp_date;
						$s_fold    = $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];

						$tbl .= "<form method='GET' name='chg_status' action='";
						$tbl .= "contents_list.php?fold=" . $s_fold . "'>\n";
						if( $status == 1 ){
							$tbl .= "<tr bgcolor='#EEEEEE'>\n";
						}else{
							$tbl .= "<tr bgcolor='#FFFFFF'>\n";
						}
						$tbl .= "<input type='hidden' name='cts_id' value='";
						$tbl .= $cts_id . "'>\n";
						$tbl .= "<td>" . $cts_id . "</td>\n";
						$tbl .= "<td>" . $cts_title . "</td>\n";
						$tbl .= "<td><input type=\"text\" name=\"cts_rank\"";
						$tbl .= " size=\"4\" value=\"" . $cts_rank . "\" />\n";
						$tbl .= "<input type=\"submit\" name=\"chg_status\" ";
						$tbl .= "value=\"変更\" />";
						if( $i != $stt_cnt ){
							$tbl .= "<a href=\"contents_list.php?fold=" . $s_fold . "&rid=";
							$tbl .= $cts_id . "&rk=" . $cts_rank . "&rkchg=b&odr=" . $cts_odr . "\">▲</a>\n";
						}
						if( $i != $max_cnt - 1 ){
							$tbl .= "<a href=\"contents_list.php?fold=" . $s_fold . "&rid=";
							$tbl .= $cts_id . "&rk=" . $cts_rank . "&rkchg=n&odr=" . $cts_odr . "\">▼</a>\n";
						}
						$tbl .= "</td>\n<td>" . $update_dt . "</td>\n";
						$tbl .= "<td><a href='contents_modify.php?id=";
						$tbl .= $cts_id . "&mode=bang'>修正</a>&nbsp;";
						$tbl .= "<select name='chg_status' onchange=\"submit()\">\n";
						if($status == 0){
							$tbl .= "<option value='0' SELECTED>公開中</option>\n";
							$tbl .= "<option value='1'>会員のみ</option>\n";
							$tbl .= "<option value='2'>非公開</option>\n";
							$tbl .= "<option value='3'>削除</option>\n";
						}elseif($status == 1){
							$tbl .= "<option value='0'>公開中</option>\n";
							$tbl .= "<option value='1' SELECTED>会員のみ</option>\n";
							$tbl .= "<option value='2'>非公開</option>\n";
							$tbl .= "<option value='3'>削除</option>\n";
						}elseif($status == 2){
							$tbl .= "<option value='0'>公開中</option>\n";
							$tbl .= "<option value='1'>会員のみ</option>\n";
							$tbl .= "<option value='2' SELECTED>非公開</option>\n";
							$tbl .= "<option value='3'>削除</option>\n";
						}
						$tbl .= "</select>\n</td>\n</tr>\n</form>";
					}
					if ($i >= $end_cnt) { break; }
				}
			}
		}

		db_close($cnn);

	// フリーワードが設定されている場合は一発表示
	}else{

		// 並び替え用
		$cts_odr = $_GET[ "odr" ];

		// 検索ワードを変数化
		$search_word = $_SESSION[ "JILM_CTS_SEARCH_WORD" ];

		// スペースで区切られた場合別キーワード扱い
		$search_word_s = ereg_replace( "　", " ", $_SESSION[ "JILM_CTS_SEARCH_WORD" ] );
		$search_word_t = split( " ", $search_word_s );

		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_body";
		$sql .= " WHERE status < 3";

		if ($search_word) {
			for ($i=0; $i<count($search_word_t); $i++) {
				$sql .= " AND (( cts_title LIKE '%" . $search_word_t[ $i ] . "%' ) OR";
				$sql .= "      ( cts_body  LIKE '%" . $search_word_t[ $i ] . "%' ) )";
			}
		}

		// 並び替え
		if($cts_odr == 10){
			$sql .= " ORDER BY cts_id";
		}elseif($cts_odr == 11){
			$sql .= " ORDER BY -cts_id";
		}elseif($cts_odr == 20){
			$sql .= " ORDER BY cts_rank";
		}elseif($cts_odr == 21){
			$sql .= " ORDER BY -cts_rank";
		}elseif($cts_odr == 30){
			$sql .= " ORDER BY update_dt";
		}elseif($cts_odr == 31){
			$sql .= " ORDER BY -update_dt";
		}else{
			$sql .= " ORDER BY cts_rank, update_dt";
		}
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
						$page_link1 = "[ <a href='contents_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
					}
					if ($dsp_page != $max_page && $i == $dsp_page + 1) {
						$page_link2 = "[ <a href='contents_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

						$cts_id    = cn_contract($res, $i, "cts_id");
						$cts_title = cn_contract($res, $i, "cts_title");
						$cts_rank  = cn_contract($res, $i, "cts_rank");
						$status    = cn_contract($res, $i, "status");
						$tmp_date  = cn_contract($res, $i, "update_dt");
						$tmp_date  = substr($tmp_date,0,4) . "/" . substr($tmp_date,5,2) . "/" . substr($tmp_date,8,2);
						$update_dt = $tmp_date;
						$s_fold    = $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];

						$tbl .= "<form method='GET' name='chg_status' action='";
						$tbl .= "contents_list.php?fold=" . $s_fold . "'>\n";
						if( $status == 1 ){
							$tbl .= "<tr bgcolor='#EEEEEE'>\n";
						}else{
							$tbl .= "<tr bgcolor='#FFFFFF'>\n";
						}
						$tbl .= "<input type='hidden' name='cts_id' value='";
						$tbl .= $cts_id . "'>\n";
						$tbl .= "<td>" . $cts_id . "</td>\n";
						$tbl .= "<td>" . $cts_title . "</td>\n";
						$tbl .= "<td>" . $cts_rank . "</td>\n";
						$tbl .= "<td>" . $update_dt . "</td>\n";
						$tbl .= "<td><a href='contents_modify.php?id=";
						$tbl .= $cts_id . "&mode=bang'>修正</a>&nbsp;";
						$tbl .= "<select name='chg_status' onchange=\"submit()\">\n";
						if($status == 0){
							$tbl .= "<option value='0' SELECTED>公開中</option>\n";
							$tbl .= "<option value='1'>会員のみ</option>\n";
							$tbl .= "<option value='2'>非公開</option>\n";
							$tbl .= "<option value='3'>削除</option>\n";
						}elseif($status == 1){
							$tbl .= "<option value='0'>公開中</option>\n";
							$tbl .= "<option value='1' SELECTED>会員のみ</option>\n";
							$tbl .= "<option value='2'>非公開</option>\n";
							$tbl .= "<option value='3'>削除</option>\n";
						}elseif($status == 2){
							$tbl .= "<option value='0'>公開中</option>\n";
							$tbl .= "<option value='1'>会員のみ</option>\n";
							$tbl .= "<option value='2' SELECTED>非公開</option>\n";
							$tbl .= "<option value='3'>削除</option>\n";
						}
						$tbl .= "</select>\n</td>\n</tr>\n</form>";
					}
					if ($i >= $end_cnt) { break; }
				}
			}
		}

		db_close($cnn);

	}

	// 階層表示
	if( $_SESSION[ "JILM_CTS_SEARCH_FOLD" ] != "" ){

		// まずはリンクなしで自身を表示
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = " . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$_SESSION[ "JILM_ADMIN_FOLD_LIST" ] = cn_contract($res, 0, "ctgr_name");
			$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
		}
		db_close($cnn);

		// 親がある場合は親の名前追加
		if( $ctgr_fold != "0" ){
			JILM_Fold_List_1( $ctgr_fold, "contents_list.php" );
		}
	}

// ******************************************************************

	$action = "contents_list.php?fold=" . $_SESSION[ "JILM_CTS_SEARCH_FOLD" ];
	$title  = "コンテンツ一覧";
	$fold_list = $_SESSION[ "JILM_ADMIN_FOLD_LIST" ];
	$_SESSION[ "JILM_ADMIN_FOLD_LIST" ] = "";
	$search_word = $_SESSION[ "JILM_CTS_SEARCH_WORD" ];

	$dsp_tbl = $tbl;

?>