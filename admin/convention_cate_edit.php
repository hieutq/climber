<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// データ追加ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		for($i=1; $i<=27; $i++) {
			$cate_type[$i]   = StripSlashes( $_POST[ "cate_type_" . $i ] );
			$cate_body[$i]   = StripSlashes( $_POST[ "cate_body_" . $i ] );
		}

		// 問題が無い場合
		if( $err_msg == "" ){

			$cate_cnt = count( $cate_type );

			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);

			for ( $i=1;$i<=$cate_cnt;$i++ ) {
				$sql = 'UPDATE convention_cate_data SET';
				$sql .= '        type = "' . mysql_real_escape_string( $cate_type[$i] ) . '",';
				$sql .= '        body = "' . mysql_real_escape_string( $cate_body[$i] ) . '",';
				$sql .= '        update_dt = "' . date('YmdHis') . '"';
				$sql .= '    WHERE convention_cate_id = "' . $i . '"';
				$res = cn_query($sql, $cnn);
			}

			tr_commit($cnn);
			db_close($cnn);

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_cate_edit.php" );
			exit;

		}
	}

	// 一覧出力
	$out = array();
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM convention_cate_data";
	$sql .= " WHERE status = 0";
	$sql .= " ORDER BY convention_cate_id";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		if ($max_cnt > 0){

			// データの頁表示
			for ($i=0; $i<$max_cnt; $i++) {

				$cate_id    = cn_contract($res, $i, "convention_cate_id");

				$out[$cate_id]['type']    = cn_contract($res, $i, "type");
				$out[$cate_id]['body']    = cn_contract($res, $i, "body");

			}
		}
	}

	db_close($cnn);


// ******************************************************************

	$action = "convention_cate_edit.php";
	$title  = "講義分類 初期設定";
	$submit = "　登 録　";

	$dsp = $out;

?>