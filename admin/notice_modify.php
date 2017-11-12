<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$mode = $_GET[ "mode" ];
	$_SESSION[ "JILM_NOTICE_MODIFY_ID" ] = $_GET[ "id" ];

	// セッションクリア
	if( $mode == "bang" ){
		$_SESSION[ "JILM_NOTICE_BODY" ]      = "";
		$_SESSION[ "JILM_NOTICE_TMP_BODY" ]  = "";
	}

	// プレビューボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 内容をセッションに格納
		$_SESSION[ "JILM_NOTICE_TMP_BODY" ] = StripSlashes( $_POST[ "modify_body" ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/notice_modify.php?id=" . $_SESSION[ "JILM_NOTICE_MODIFY_ID" ] );
		exit;
	}

	// 登録ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] = "";

		// 内容をセッションに格納
		$_SESSION[ "JILM_NOTICE_BODY" ]  = StripSlashes( $_POST[ "modify_body" ] );

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/notice_modify_confirm.php?id=" . $_SESSION[ "JILM_NOTICE_MODIFY_ID" ] );
		exit;
	}

	// 情報読み込み
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM text_notice";
	$sql .= " WHERE notice_id = " . $_SESSION[ "JILM_NOTICE_MODIFY_ID" ];
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$title = cn_contract($res, 0, "notice_title");
		$modify_body  = cn_contract($res, 0, "notice_body");
	}
	db_close($cnn);

// ******************************************************************

	$action = "notice_modify.php?id=" . $_SESSION[ "JILM_NOTICE_MODIFY_ID" ];
	$sum_body    = $_SESSION[ "JILM_NOTICE_TMP_BODY" ];
	if( $_SESSION[ "JILM_NOTICE_TMP_BODY" ] != ""){
		$modify_body = $_SESSION[ "JILM_NOTICE_TMP_BODY" ];
	}
	if( $_SESSION[ "JILM_NOTICE_BODY" ] != ""){
		$modify_body = $_SESSION[ "JILM_NOTICE_BODY" ];
	}
	$dsp_tbl = $tbl;

?>