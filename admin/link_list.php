<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$mode = $_GET[ "mode" ];

	// 初回セッションクリア
	if( $mode == "bang" ){
		$_SESSION[ "JILM_LINK_GENRE" ] = "";

	// 消去モード
	}elseif( $mode == del ){

		$link_id = $_GET[ "id" ];

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE link_data";
		$sql .= "       SET status  = '1',";
		$sql .= "        update_dt  = '" . date(YmdHis) . "'";
		$sql .= "    WHERE link_id  = " . $link_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// 自身処理へリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] )	. "/link_list.php" );
		exit;

	}

	// 絞込ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] = "";

		// 検索をセッションに格納
		$_SESSION[ "JILM_LINK_GENRE" ] = $_POST[ "search_genre" ];

		// 自身処理へリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] )	. "/link_list.php" );
		exit;

	}

	// 絞込解除が押された
	if( $_POST[ "OK_3" ] != "" ){
		$_POST[ "OK_3" ] = "";

		// 検索セッションをクリア
		$_SESSION[ "JILM_LINK_GENRE" ] = "";

		// 自身処理へリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] )	. "/link_list.php" );
		exit;

	}

	// 新規登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$regist_name  = $_POST[ "regist_name" ];
		$regist_url   = $_POST[ "regist_url" ];
		$regist_genre = $_POST[ "regist_genre" ];
		$regist_rank  = $_POST[ "regist_rank" ];

		// ランクが設定されてない場合は自動で5
		if( $regist_rank == "" ){
			$regist_rank = "5";
		}

		// 入力データのエラーチェック
		if( $regist_name == "" ){
			$err_msg = "サイト名が入力されていません。";
		}

		// 問題が無い場合
		if( $err_msg == "" ){

			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "INSERT INTO link_data";
			$sql .= "     (       link_name,";
			$sql .= "             link_url,";
			$sql .= "             link_category,";
			$sql .= "             link_rank,";
			$sql .= "             status,";
			$sql .= "             regist_dt,";
			$sql .= "             update_dt";
			$sql .= "     )";
			$sql .= "     VALUES";
			$sql .= "     (  '" . $regist_name . "',";
			$sql .= "        '" . $regist_url . "',";
			$sql .= "        '" . $regist_genre . "',";
			$sql .= "        '" . $regist_rank . "',";
			$sql .= "        '0',";
			$sql .= "        '" . date(YmdHis) . "',";
			$sql .= "        '" . date(YmdHis) . "'";
			$sql .= "     )";

			$res = cn_query($sql, $cnn);
			$new_id = mysql_insert_id();
			tr_commit($cnn);
			db_close($cnn);

			// バナーがアップされた場合
			if( $_FILES['regist_bnr1']['name'] != "" ){
				move_uploaded_file($_FILES['regist_bnr1']['tmp_name'], "./../images/banner/" . $new_id . ".jpg");
			}
			if( $_FILES['regist_bnr2']['name'] != "" ){
				move_uploaded_file($_FILES['regist_bnr2']['tmp_name'], "./../images/banner/" . $new_id . "_ov.jpg");
			}

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
				. dirname( $_SERVER[ "PHP_SELF" ] )	. "/link_list.php" );
			exit;

		}
	}

	// 一覧出力
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM link_data";
	$sql .= " WHERE status = 0";

	if( $_SESSION[ "JILM_LINK_GENRE" ] != "" ){
		$sql .= "  AND link_category = " . $_SESSION[ "JILM_LINK_GENRE" ];
	}

	$sql .= " ORDER BY link_category, link_rank, -update_dt";
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
					$page_link1 = "[ <a href='link_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
				}
				if ($dsp_page != $max_page && $i == $dsp_page + 1) {
					$page_link2 = "[ <a href='link_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

					$lk_id      = cn_contract($res, $i, "link_id");
					$lk_name    = cn_contract($res, $i, "link_name");
					$lk_url     = cn_contract($res, $i, "link_url");
					$lk_genre   = cn_contract($res, $i, "link_category");
					$lk_rank    = cn_contract($res, $i, "link_rank");
					$status     = cn_contract($res, $i, "status");
					$tmp_date   = cn_contract($res, $i, "update_dt");
					$tmp_date   = substr($tmp_date,0,4) . "年" . substr($tmp_date,5,2) . "月" . substr($tmp_date,8,2) . "日";
					$update_dt  = $tmp_date;

					$bnr_img = "./../images/banner/" . $lk_id . ".jpg";
					$bnr_ovr = "./../images/banner/" . $lk_id . "_ov.jpg";

					if ( file_exists( $bnr_img )) {
						$lk_url_op  = "<a href='" . $lk_url . "' target='_blank'>";
						$lk_url_op .= "<img src=\"" . $bnr_img . "\" onmouseover=\"this.src='" . $bnr_ovr . "'\" ";
						$lk_url_op .= "onmouseout=\"this.src='" . $bnr_img . "'\"></a>";
					}else{
						$lk_url_op  = "<a href='" . $lk_url . "' target='_blank'>";
						$lk_url_op .= $lk_url . "</a>";
					}

					$tbl .= "<tr>\n";
					$tbl .= "<td>" . $lk_name . "</td>\n";
					$tbl .= "<td>" . $lk_url_op . "</td>\n";
					$tbl .= "<td>";
					if( $lk_genre == '1' ){
						$tbl .= "学会";
					}elseif( $lk_genre == '2' ){
						$tbl .= "協会等";
					}elseif( $lk_genre == '3' ){
						$tbl .= "公共機関";
					}elseif( $lk_genre == '4' ){
						$tbl .= "試験・評価機関";
					}elseif( $lk_genre == '5' ){
						$tbl .= "出版社";
					}elseif( $lk_genre == '6' ){
						$tbl .= "企業（特別維持会員）";
					}elseif( $lk_genre == '7' ){
						$tbl .= "企業（維持会員）";
					}elseif( $lk_genre == '8' ){
						$tbl .= "企業（その他）";
					}else{
						$tbl .= "その他";
					}
					$tbl .= "</td>\n<td>" . $lk_rank . "</td>\n";
					$tbl .= "<td><a href=\"link_list.php?mode=del&id=";
					$tbl .= $lk_id . "\">リンク削除</a></td>\n</tr>\n";
				}
				if ($i >= $end_cnt) { break; }
			}
		}
	}

	db_close($cnn);


// ******************************************************************

	$action = "link_list.php";
	$title  = "リンク管理";

	$dsp_tbl = $tbl;

	if( $_SESSION[ "JILM_LINK_GENRE" ] == '1' ){
		$genre_chk1 = " SELECTED";
	}elseif( $_SESSION[ "JILM_LINK_GENRE" ] == '2' ){
		$genre_chk2 = " SELECTED";
	}elseif( $_SESSION[ "JILM_LINK_GENRE" ] == '3' ){
		$genre_chk3 = " SELECTED";
	}elseif( $_SESSION[ "JILM_LINK_GENRE" ] == '4' ){
		$genre_chk4 = " SELECTED";
	}elseif( $_SESSION[ "JILM_LINK_GENRE" ] == '5' ){
		$genre_chk5 = " SELECTED";
	}elseif( $_SESSION[ "JILM_LINK_GENRE" ] == '6' ){
		$genre_chk6 = " SELECTED";
	}elseif( $_SESSION[ "JILM_LINK_GENRE" ] == '7' ){
		$genre_chk7 = " SELECTED";
	}elseif( $_SESSION[ "JILM_LINK_GENRE" ] == '8' ){
		$genre_chk8 = " SELECTED";
	}elseif( $_SESSION[ "JILM_LINK_GENRE" ] == '99' ){
		$genre_chk99 = " SELECTED";
	}

?>