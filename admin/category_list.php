<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$mode = $_GET[ "mode" ];

	// 初回セッションクリア
	if( $mode == "bang" ){
		$_SESSION[ "JILM_ADMIN_FOLD" ]       = "";
		$_SESSION[ "JILM_ADMIN_FOLD_LIST" ]  = "";
		$_SESSION[ "JILM_CTGR_EDIT_FLG" ]    = "";
		$_SESSION[ "JILM_CTGR_MODIFY_NAME" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_OYA" ]  = "";
		$_SESSION[ "JILM_CTGR_MODIFY_RANK" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_RGST" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_UPDT" ] = "";
		$_SESSION[ "JILM_CTGR_STATUS" ]      = "";
	}

	// データ追加ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$regist_name  = StripSlashes( $_POST[ "regist_ctgr_name" ] );
		$regist_fold  = StripSlashes( $_POST[ "regist_ctgr_fold" ] );
		$regist_rank  = StripSlashes( $_POST[ "regist_ctgr_rank" ] );

		// 入力データのエラーチェック
		if( $regist_name == "" ){
			$err_msg = "カテゴリー名が入力されていません。";
		}

		// 問題が無い場合
		if( $err_msg == "" ){

			// ランクが設定されていない場合は強制で10
			if( $regist_rank == "" ){
				$regist_rank = 10;
			}

			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "INSERT INTO content_category";
			$sql .= "     (       ctgr_name,";
			$sql .= "             ctgr_oya,";
			$sql .= "             ctgr_rank,";
			$sql .= "             status,";
			$sql .= "             regist_dt,";
			$sql .= "             update_dt";
			$sql .= "     )";
			$sql .= "     VALUES";
			$sql .= "     (  '" . $regist_name . "',";
			$sql .= "        '" . $regist_fold . "',";
			$sql .= "        '" . $regist_rank . "',";
			$sql .= "        '2',";
			$sql .= "        '" . date(YmdHis) . "',";
			$sql .= "        '" . date(YmdHis) . "'";
			$sql .= "     )";

			$res = cn_query($sql, $cnn);
			tr_commit($cnn);
			db_close($cnn);

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/category_list.php" );

			exit;

		}
	}

	// ステータスが変更された
	if( $_GET[ "chg_status" ] != "" ){

		// 値をセッションに格納
		$status  = $_GET[ "chg_status" ];
		$ctgr_id = $_GET[ "ctgr_id" ];

		// ステータス変更
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE content_category";
		$sql .= "       SET status  = '" . $status . "',";
		$sql .= "        update_dt  = '" . date(YmdHis) . "'";
		$sql .= "    WHERE ctgr_id  = " . $ctgr_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/category_list.php" );
		exit;

	}

	// フォルダチェック
	if( $_GET[ "fold" ] != "" ){

		$_SESSION[ "JILM_ADMIN_FOLD" ] = $_GET[ "fold" ];

		// ０の場合はセッション削除
		if( $_GET[ "fold" ] == "0" ){
			$_SESSION[ "JILM_ADMIN_FOLD" ] = "";
		}

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/category_list.php" );
		exit;

	}

	// 一覧出力
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE status < 3";
	if( $_SESSION[ "JILM_ADMIN_FOLD" ] != "" ){
		$sql .= "  AND ctgr_oya = " . $_SESSION[ "JILM_ADMIN_FOLD" ];
	}else{
		$sql .= "  AND ctgr_oya = 0";
	}
	$sql .= " ORDER BY ctgr_rank, update_dt";
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
					$page_link1 = "[ <a href='category_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
				}
				if ($dsp_page != $max_page && $i == $dsp_page + 1) {
					$page_link2 = "[ <a href='category_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

					$ctgr_id   = cn_contract($res, $i, "ctgr_id");
					$ctgr_name = cn_contract($res, $i, "ctgr_name");
					$ctgr_fold = cn_contract($res, $i, "ctgr_oya");
					$ctgr_rank = cn_contract($res, $i, "ctgr_rank");
					$status    = cn_contract($res, $i, "status");
					$tmp_date  = cn_contract($res, $i, "update_dt");
					$tmp_date  = substr($tmp_date,0,4) . "年" . substr($tmp_date,5,2) . "月" . substr($tmp_date,8,2) . "日";
					$update_dt = $tmp_date;

					// 下階層があるかどうか
					$cnn2  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
					$sql2  = " SELECT * FROM content_category";
					$sql2 .= " WHERE status < 3";
					$sql2 .= "  AND ctgr_oya = " . $ctgr_id;
					$res2  = cn_query($sql2, $cnn2);
					if ($res2 == true){
						$max_cnt2 = cn_count($res2);
					}

					$tbl .= "<form method='GET' name='chg_status' action='";
					$tbl .= "category_list.php'>\n";
					if( $status == 2 ){
						$tbl .= "<tr bgcolor='#EEEEEE'>\n";
					}else{
						$tbl .= "<tr bgcolor='#FFFFFF'>\n";
					}
					$tbl .= "<input type='hidden' name='ctgr_id' value='";
					$tbl .= $ctgr_id . "'>\n<td>" . $ctgr_id . "</td>\n";
					$tbl .= "<td>" . $ctgr_name . "</td>\n";
					$tbl .= "<td>" . $ctgr_rank . "</td>\n";
					if( $max_cnt2 > 0 ){
						$tbl .= "<td><a href='category_list.php?fold=";
						$tbl .= $ctgr_id . "'>下階層へ</a>　";
					}else{
						$tbl .= "<td><font color=\"white\">下階層へ</font>　";
					}
					$tbl .= "<a href='category_modify.php?id=";
					$tbl .= $ctgr_id . "&mode=bang'>修正</a>&nbsp;";
					$tbl .= "<select name='chg_status' onchange=\"submit()\">\n";
					if($status == 0){
						$tbl .= "<option value='0' SELECTED>一般公開中</option>\n";
						$tbl .= "<option value='1'>会員のみ公開中</option>\n";
						$tbl .= "<option value='2'>非公開</option>\n";
						$tbl .= "<option value='3'>削除</option>\n";
					}elseif($status == 1){
						$tbl .= "<option value='0'>一般公開中</option>\n";
						$tbl .= "<option value='1' SELECTED>会員のみ公開中</option>\n";
						$tbl .= "<option value='2'>非公開</option>\n";
						$tbl .= "<option value='3'>削除</option>\n";
					}elseif($status == 2){
						$tbl .= "<option value='0'>一般公開中</option>\n";
						$tbl .= "<option value='1'>会員のみ公開中</option>\n";
						$tbl .= "<option value='2' SELECTED>非公開</option>\n";
						$tbl .= "<option value='3'>削除</option>\n";
					}
					$tbl .= "</select>\n</font>\n</td>\n</tr>\n</form>";

					$max_cnt2 = "";
				}
				if ($i >= $end_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	// フォルダ階層セレクトボックス
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE status = 0";
	if( $_SESSION[ "JILM_ADMIN_FOLD" ] != "" ){
		$sql .= "  AND ctgr_oya = " . $_SESSION[ "JILM_ADMIN_FOLD" ];
	}else{
		$sql .= "  AND ctgr_oya = 0";
	}
	$sql .= " ORDER BY ctgr_rank, update_dt DESC";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$ctgr_id   = cn_contract($res, $i, "ctgr_id");
					$ctgr_name = cn_contract($res, $i, "ctgr_name");

					$ctgr_fold_option .= "<option value=\"" . $ctgr_id;
					$ctgr_fold_option .= "\">" . $ctgr_name . "</option>\n";
				}
				if ($i >= $max_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	// 階層表示
	if( $_SESSION[ "JILM_ADMIN_FOLD" ] != "" ){

		// まずはリンクなしで自身を表示
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = " . $_SESSION[ "JILM_ADMIN_FOLD" ];
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$_SESSION[ "JILM_ADMIN_FOLD_LIST" ] = cn_contract($res, 0, "ctgr_name");
			$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
		}
		db_close($cnn);

		// 親がある場合は親の名前追加
		if( $ctgr_fold != "0" ){
			JILM_Fold_List_1( $ctgr_fold, "category_list.php" );
		}
	}

// ******************************************************************

	$action = "category_list.php";
	$title  = "コンテンツカテゴリー一覧";
	$submit = "　登 録　";
	$fold_list = $_SESSION[ "JILM_ADMIN_FOLD_LIST" ];

	$_SESSION[ "JILM_ADMIN_FOLD_LIST" ] = "";

	$dsp_tbl = $tbl;

?>