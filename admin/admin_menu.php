<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// 一言メッセージが追加された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		//情報を変数化
		$msg_member = $_POST[ "msg_name" ];
		$msg_body   = $_POST[ "msg_body" ];
		$msg_impt   = $_POST[ "msg_impt" ];

		// データぶっこみ
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "INSERT INTO message_board";
		$sql .= "     (       msg_member,";
		$sql .= "             msg_body,";
		$sql .= "             msg_impt,";
		$sql .= "             status,";
		$sql .= "             regist_dt,";
		$sql .= "             update_dt";
		$sql .= "     )";
		$sql .= "     VALUES";
		$sql .= "     (  '" . $msg_member . "',";
		$sql .= "        '" . $msg_body . "',";
		$sql .= "        '" . $msg_impt . "',";
		$sql .= "        '0',";
		$sql .= "        '" . date(YmdHis) . "',";
		$sql .= "        '" . date(YmdHis) . "'";
		$sql .= "     )";

		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" 														 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/admin_menu.php" );
		exit;

	}

	// 一言メッセージ
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM message_board";
	$sql .= " WHERE status = '0'";
	$sql .= " ORDER BY regist_dt DESC";
	$res  = cn_query($sql, $cnn);
	$rows = db_rows($res);
	if ($rows > 0) {
		for ($i=0; $i<$rows; $i++) {
			if ( $i >= 0 && $i <= $rows ) {

				$msg_name    = cn_contract($res, $i, "msg_member");
				$msg_body    = cn_contract($res, $i, "msg_body");
				$msg_impt    = cn_contract($res, $i, "msg_impt");
				$tmp_date    = cn_contract($res, $i, "regist_dt");
				$tmp_date    = substr($tmp_date,5,2) . "/" . substr($tmp_date,8,2) . "&nbsp;" . substr($tmp_date,11,2) . ":" . substr($tmp_date,14,2);
				$regist_dt   = $tmp_date;

				if( $msg_impt == "1" ){
					$msg_tbl .= "<li style='font-weight:bold; color:Red;'>" . $msg_name;
					$msg_tbl .= "：". $msg_body . "&nbsp;<span class='smallf'>-";
					$msg_tbl .= $regist_dt . "-</span>";
				}else{
					$msg_tbl .= "<li>" . $msg_name . "：";
					$msg_tbl .= $msg_body . "&nbsp;-<span class='smallf'>";
					$msg_tbl .= $regist_dt . "-</span>";
				}

			}

			if ($i >= $rows) { break; }
		}
	}

	db_close($cnn);

?>