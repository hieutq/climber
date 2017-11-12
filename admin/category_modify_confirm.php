<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$ctgr_id = $_GET[ "id" ];

	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		$modify_name = $_SESSION[ "JILM_CTGR_MODIFY_NAME" ];
		$modify_oya  = $_SESSION[ "JILM_CTGR_MODIFY_OYA" ];
		$modify_rank = $_SESSION[ "JILM_CTGR_MODIFY_RANK" ];

		// データ格納
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE content_category";
		$sql .= " SET ctgr_name = '" . $modify_name . "',";
		$sql .= "      ctgr_oya = '" . $modify_oya . "',";
		$sql .= "     ctgr_rank = '" . $modify_rank . "',";
		$sql .= "     update_dt = '" . date(YmdHis) . "'";
		$sql .= " WHERE ctgr_id = " . $ctgr_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// セッションクリア
		$_SESSION[ "JILM_CTGR_EDIT_FLG" ]    = "";
		$_SESSION[ "JILM_CTGR_MODIFY_NAME" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_OYA" ]  = "";
		$_SESSION[ "JILM_CTGR_MODIFY_RANK" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_RGST" ] = "";
		$_SESSION[ "JILM_CTGR_MODIFY_UPDT" ] = "";

		// 一覧ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/category_list.php?mode=bang" );
		exit;
	}

	// 戻るボタンが押された
	if( $_POST[ "BK_1" ] != "" ){
		$_POST[ "BK_1" ] = "";

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/category_modify.php?id=" . $ctgr_id );
		exit;
	}

// ******************************************************************

	$action = "category_modify_confirm.php?id=" . $ctgr_id;
	$title  = "カテゴリー修正確認";

	$modify_ctgr   = $_SESSION[ "JILM_CTGR_MODIFY_NAME" ];
	$modify_oya    = $_SESSION[ "JILM_CTGR_MODIFY_OYA" ];
	$modify_rank   = $_SESSION[ "JILM_CTGR_MODIFY_RANK" ];
	$regist_dt     = $_SESSION[ "JILM_CTGR_MODIFY_RGST" ];
	$modify_status = $_SESSION[ "JILM_CTGR_STATUS" ];
	$modify_id     = $ctgr_id;

	if($_SESSION[ "JILM_CTGR_STATUS" ] == 0){
		$status = "公開中";
	}else{
		$status = "非公開";
	}

?>