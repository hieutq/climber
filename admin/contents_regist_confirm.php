<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$cts_id   = $_GET[ "id" ];

	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		$cts_id   = $_GET[ "id" ];
		$cts_body = $_SESSION[ "JILM_CONTENTS_BODY" ];

		// データ格納
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

		$cts_body = stripslashes( $cts_body );
		$cts_body = mysql_real_escape_string( $cts_body );

		tr_begin($cnn);
		$sql = "UPDATE content_body";
		$sql .= " SET cts_body = '" . $cts_body . "',";
		$sql .= "       status = '0',";
		$sql .= "    update_dt = '" . date(YmdHis) . "'";
		$sql .= " WHERE cts_id = " . $cts_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// セッションクリア
		$_SESSION[ "JILM_CONTENTS_INSERT_ID" ] = "";
		$_SESSION[ "JILM_ADMIN_FOLD" ]         = "";
		$_SESSION[ "JILM_ADMIN_FOLD_SCH" ]     = "";
		$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ]   = "";
		$_SESSION[ "JILM_IMAGE_TYPE" ]         = "";
		$_SESSION[ "JILM_IMAGE_WIDTH" ]        = "";
		$_SESSION[ "JILM_IMAGE_HEIGHT" ]       = "";
		$_SESSION[ "JILM_CONTENTS_TMP_BODY" ]  = "";
		$_SESSION[ "JILM_CONTENTS_BODY" ]      = "";

		// 一覧ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_list.php" );
		exit;
	}

	// 戻るボタンが押された
	if( $_POST[ "BK_1" ] != "" ){
		$_POST[ "BK_1" ] = "";

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_regist.php" );
		exit;
	}

	// フォルダ階層セレクトボックス
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE status = 0";
	if( $_SESSION[ "JILM_ADMIN_FOLD_SCH" ] != "" ){
		$sql .= "  AND ctgr_oya = " . $_SESSION[ "JILM_ADMIN_FOLD_SCH" ];
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
			$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] = cn_contract($res, 0, "ctgr_name");
			$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
		}
		db_close($cnn);

		// 親がある場合は親の名前追加
		if( $ctgr_fold != "0" ){
			JILM_Fold_List_2( $ctgr_fold );
		}

		// 最後に自身のタイトル表示
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_body";
		$sql .= " WHERE cts_id = " . $_SESSION[ "JILM_CONTENTS_INSERT_ID" ];
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$tmp_data = cn_contract($res, 0, "cts_title");
		}
		db_close($cnn);

		$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] = $_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] . "&nbsp;&gt;&nbsp;" . $tmp_data;

	}

// ******************************************************************

	$action = "contents_regist_confirm.php?id=" . $cts_id;
	$title  = "コンテンツ新規登録確認";
	$fold_list = $_SESSION[ "JILM_ADMIN_FOLD_LIST2" ];
	$sum_body    = $_SESSION[ "JILM_CONTENTS_BODY" ];

	$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] = "";

	$dsp_tbl = $tbl;

?>