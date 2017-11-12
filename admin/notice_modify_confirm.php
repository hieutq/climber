<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$notice_id = $_GET[ "id" ];

	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		$modify_body  = $_SESSION[ "JILM_NOTICE_BODY" ];

		// データ格納
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE text_notice";
		$sql .= " SET notice_body = '" . $modify_body . "',";
		$sql .= "       update_dt = '" . date(YmdHis) . "'";
		$sql .= " WHERE notice_id = " . $notice_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// セッションクリア
		$_SESSION[ "JILM_NOTICE_TMP_BODY" ]  = "";
		$_SESSION[ "JILM_NOTICE_BODY" ]      = "";

		// 元の画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/notice_modify.php?id=" . $notice_id . "&mode=bang" );
	}

	// 戻るボタンが押された
	if( $_POST[ "BK_1" ] != "" ){
		$_POST[ "BK_1" ] = "";

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/notice_modify.php?id=" . $notice_id );
		exit;
	}

// ******************************************************************

	$action = "notice_modify_confirm.php?id=" . $notice_id;
	$title  = "内容修正確認";
	$modify_body  = $_SESSION[ "JILM_NOTICE_BODY" ];
	$modify_id    = $notice_id;

?>