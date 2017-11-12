<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$mode = $_GET[ "mode" ];
	$_SESSION[ "JILM_CTGR_MODIFY_ID" ] = $_GET[ "id" ];

	// 初回セッションクリア
	if( $mode == "bang" ){
		$_SESSION[ "JILM_CTGR_EDIT_FLG" ]    = "";
		$_SESSION[ "JILM_CTGR_MODIFY_NAME" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_OYA" ]  = "";
		$_SESSION[ "JILM_CTGR_MODIFY_RANK" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_RGST" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_UPDT" ] = "";
		$_SESSION[ "JILM_CTGR_STATUS" ]      = "";
	}

	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 内容をセッションに格納
		$_SESSION[ "JILM_CTGR_MODIFY_NAME" ] = StripSlashes( $_POST[ "modify_name" ] );
		$_SESSION[ "JILM_CTGR_MODIFY_OYA" ]  = StripSlashes( $_POST[ "modify_oya" ] );
		$_SESSION[ "JILM_CTGR_MODIFY_RANK" ] = StripSlashes( $_POST[ "modify_rank" ] );

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/category_modify_confirm.php?id=" . $_SESSION[ "JILM_CTGR_MODIFY_ID" ] );
		exit;
	}

	// 初回修正情報読み込み
	if( $_SESSION[ "JILM_CTGR_EDIT_FLG" ] == "" ){
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = " . $_SESSION[ "JILM_CTGR_MODIFY_ID" ];
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$_SESSION[ "JILM_CTGR_MODIFY_NAME" ] = cn_contract($res, 0, "ctgr_name");
			$_SESSION[ "JILM_CTGR_MODIFY_OYA" ]  = cn_contract($res, 0, "ctgr_oya");
			$_SESSION[ "JILM_CTGR_MODIFY_RANK" ] = cn_contract($res, 0, "ctgr_rank");
			$status_tmp  = cn_contract($res, 0, "status");
			$tmp_date1   = cn_contract($res, 0, "regist_dt");
			$tmp_date2   = cn_contract($res, 0, "update_dt");

			$_SESSION[ "JILM_CTGR_MODIFY_RGST" ]  = substr($tmp_date1,2,2) . "/";
			$_SESSION[ "JILM_CTGR_MODIFY_RGST" ] .= substr($tmp_date1,5,2) . "/";
			$_SESSION[ "JILM_CTGR_MODIFY_RGST" ] .= substr($tmp_date1,8,2) . "&nbsp;";
			$_SESSION[ "JILM_CTGR_MODIFY_RGST" ] .= substr($tmp_date1,11,2) . ":";
			$_SESSION[ "JILM_CTGR_MODIFY_RGST" ] .= substr($tmp_date1,14,2);
			$_SESSION[ "JILM_CTGR_MODIFY_UPDT" ]  = substr($tmp_date2,2,2) . "/";
			$_SESSION[ "JILM_CTGR_MODIFY_UPDT" ] .= substr($tmp_date2,5,2) . "/";
			$_SESSION[ "JILM_CTGR_MODIFY_UPDT" ] .= substr($tmp_date2,8,2) . "&nbsp;";
			$_SESSION[ "JILM_CTGR_MODIFY_UPDT" ] .= substr($tmp_date2,11,2) . ":";
			$_SESSION[ "JILM_CTGR_MODIFY_UPDT" ] .= substr($tmp_date2,14,2);

		}
		db_close($cnn);
	}

	// 変数化
	$modify_name = $_SESSION[ "JILM_CTGR_MODIFY_NAME" ];
	$modify_oya  = $_SESSION[ "JILM_CTGR_MODIFY_OYA" ];
	$modify_rank = $_SESSION[ "JILM_CTGR_MODIFY_RANK" ];
	$regist_dt   = $_SESSION[ "JILM_CTGR_MODIFY_RGST" ];
	$update_dt   = $_SESSION[ "JILM_CTGR_MODIFY_UPDT" ];

	// 階層↓ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] == "";

		$modify_oya = StripSlashes( $_POST[ "modify_oya" ] );

	}

	// 階層↑ボタンが押された
	if( $_POST[ "OK_3" ] != "" ){
		$_POST[ "OK_3" ] == "";

		// 親の親で上書き
		$oya_tmp = StripSlashes( $_POST[ "modify_oya" ] );
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = " . $oya_tmp;
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$oya_tmp2 = cn_contract($res, 0, "ctgr_oya");
		}
		db_close($cnn);

		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = " . $oya_tmp2;
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$modify_oya = cn_contract($res, 0, "ctgr_oya");
		}
		db_close($cnn);

	}

	// フォルダ階層セレクトボックス
	if( $modify_oya == "0" ){
		$ctgr_fold_option = "<option value=\"0\">トップ階層</option>\n";

	}else{
		// 親の親を抽出
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = " . $modify_oya;
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$ctgr_boya = cn_contract($res, 0, "ctgr_oya");
		}
		db_close($cnn);
	}

	if( $_SESSION[ "JILM_CTGR_EDIT_FLG" ] == "" ){
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE status < 2";
		if( $modify_oya == "0" ){
			$sql .= "  AND ctgr_oya = 0";
		}else{
			$sql .= "  AND ctgr_oya = " . $ctgr_boya;
		}
		$sql .= " ORDER BY ctgr_rank, update_dt DESC";
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$max_cnt = cn_count($res);
			if ($max_cnt > 0){
				for ($i=0; $i<$max_cnt; $i++) {
					if ( $i >= 0 && $i <= $max_cnt ) {
						$ctgr_fid   = cn_contract($res, $i, "ctgr_id");
						$ctgr_fname = cn_contract($res, $i, "ctgr_name");

						if( $ctgr_fid == $modify_oya ){
							$ctgr_fold_option .= "<option value=\"" . $ctgr_fid;
							$ctgr_fold_option .= "\" SELECTED>" . $ctgr_fname . "</option>\n";
						}else{
							$ctgr_fold_option .= "<option value=\"" . $ctgr_fid;
							$ctgr_fold_option .= "\">" . $ctgr_fname . "</option>\n";
						}
					}
					if ($i >= $max_cnt) { break; }
				}
			}
		}

		db_close($cnn);

	}else{

		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE status < 2";
		if( $modify_oya == "0" ){
			$sql .= "  AND ctgr_oya = 0";
		}else{
			$sql .= "  AND ctgr_oya = " . $modify_oya;
		}
		$sql .= " ORDER BY ctgr_rank, update_dt DESC";
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$max_cnt = cn_count($res);
			if ($max_cnt > 0){
				for ($i=0; $i<$max_cnt; $i++) {
					if ( $i >= 0 && $i <= $max_cnt ) {
						$ctgr_fid   = cn_contract($res, $i, "ctgr_id");
						$ctgr_fname = cn_contract($res, $i, "ctgr_name");

						if( $ctgr_fid == $modify_oya ){
							$ctgr_fold_option .= "<option value=\"" . $ctgr_fid;
							$ctgr_fold_option .= "\" SELECTED>" . $ctgr_fname . "</option>\n";
						}else{
							$ctgr_fold_option .= "<option value=\"" . $ctgr_fid;
							$ctgr_fold_option .= "\">" . $ctgr_fname . "</option>\n";
						}
					}
					if ($i >= $max_cnt) { break; }
				}
			}
		}

		db_close($cnn);

	}

// ******************************************************************

	$action = "category_modify.php?id=" . $_SESSION[ "JILM_CTGR_MODIFY_ID" ];
	$title  = "カテゴリー修正";

	$modify_id = $_SESSION[ "JILM_CTGR_MODIFY_ID" ];

	if($modify_rank == 1){
		$rank_op1 = " SELECTED";
	}elseif($modify_rank == 2){
		$rank_op2 = " SELECTED";
	}elseif($modify_rank == 3){
		$rank_op3 = " SELECTED";
	}elseif($modify_rank == 4){
		$rank_op4 = " SELECTED";
	}elseif($modify_rank == 5){
		$rank_op5 = " SELECTED";
	}elseif($modify_rank == 6){
		$rank_op6 = " SELECTED";
	}elseif($modify_rank == 7){
		$rank_op7 = " SELECTED";
	}elseif($modify_rank == 8){
		$rank_op8 = " SELECTED";
	}elseif($modify_rank == 9){
		$rank_op9 = " SELECTED";
	}elseif($modify_rank == 10){
		$rank_op10 = " SELECTED";
	}

	if($status_tmp == 0){
		$status = "一般公開中";
	}elseif($status_tmp == 1){
		$status = "会員のみ公開中";
	}else{
		$status = "非公開";
	}
	$_SESSION[ "JILM_CTGR_STATUS" ] = $status_tmp;

	// 初回フラグ消し
	$_SESSION[ "JILM_CTGR_EDIT_FLG" ] = "ON";

?>