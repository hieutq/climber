<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$cts_id = $_GET[ "id" ];

	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		$modify_title = $_SESSION[ "JILM_CONTENTS_TITLE" ];
		$modify_rank  = $_SESSION[ "JILM_CONTENTS_RANK" ];
		$modify_body  = $_SESSION[ "JILM_CONTENTS_BODY" ];
		$modify_body  = ereg_replace("1ocation","location",$modify_body);

		// データ格納
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

		$modify_body = stripslashes( $modify_body );
		$modify_body = mysql_real_escape_string( $modify_body );

		tr_begin($cnn);
		$sql = "UPDATE content_body";
		$sql .= " SET cts_title = '" . $modify_title . "',";
		$sql .= "      cts_rank = '" . $modify_rank . "',";
		$sql .= "      cts_body = '" . $modify_body . "',";
		$sql .= "     update_dt = '" . date(YmdHis) . "'";
		$sql .= "  WHERE cts_id = " . $cts_id;
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
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_modify.php?id=" . $cts_id );
		exit;
	}

// ******************************************************************

	$action = "contents_modify_confirm.php?id=" . $cts_id;
	$title  = "ページ内容修正確認";

	$_SESSION[ "JILM_CONTENTS_BODY" ] = ereg_replace("location","1ocation",$_SESSION[ "JILM_CONTENTS_BODY" ]);
	$modify_title = $_SESSION[ "JILM_CONTENTS_TITLE" ];
	$modify_rank  = $_SESSION[ "JILM_CONTENTS_RANK" ];
	$modify_body  = $_SESSION[ "JILM_CONTENTS_BODY" ];
	$modify_id    = $cts_id;

?>