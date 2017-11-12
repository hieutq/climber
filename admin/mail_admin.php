<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// メールアドレス追加ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$regist_email = StripSlashes( $_POST[ "regist_email" ] );

		// 入力データのエラーチェック
		if( $regist_email == "" ){
			$err_msg = "メールアドレスが入力されていません";
		}

		// 問題が無い場合
		if( $err_msg == "" ){

			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "INSERT INTO mail_admin";
			$sql .= "     (       mlad_mail,";
			$sql .= "             status,";
			$sql .= "             regist_dt";
			$sql .= "     )";
			$sql .= "     VALUES";
			$sql .= "     (  '" . $regist_email . "',";
			$sql .= "        '0',";
			$sql .= "        '" . date(YmdHis) . "'";
			$sql .= "     )";

			$res = cn_query($sql, $cnn);
			tr_commit($cnn);
			db_close($cnn);

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/mail_admin.php" );

			exit;

		}
	}

	// ステータスが変更された
	if( $_GET[ "chg_status" ] != "" ){

		// 値をセッションに格納
		$status  = $_GET[ "chg_status" ];
		$mlad_id = $_GET[ "mlad_id" ];

		// ステータス変更
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE mail_admin";
		$sql .= "       SET status  = '" . $status . "'";
		$sql .= "    WHERE mlad_id  = " . $mlad_id;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// リロード
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] )	. "/mail_admin.php" );
		exit;

	}

	// 一覧出力
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM mail_admin";
	$sql .= " WHERE status < 2";
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
					$page_link1 = "[ <a href='mail_admin.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
				}
				if ($dsp_page != $max_page && $i == $dsp_page + 1) {
					$page_link2 = "[ <a href='mail_admin.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

					$mlad_id   = cn_contract($res, $i, "mlad_id");
					$mlad_mail = cn_contract($res, $i, "mlad_mail");
					$status    = cn_contract($res, $i, "status");
					$tmp_date  = cn_contract($res, $i, "regist_dt");
					$regist_dt = substr($tmp_date,0,4) . "年" . substr($tmp_date,5,2) . "月" . substr($tmp_date,8,2) . "日";

					$tbl .= "<form method='GET' name='chg_status' action='";
					$tbl .= "mail_admin.php'>\n";
					if( $status == 1 ){
						$tbl .= "<tr bgcolor='#EEEEEE'>\n";
					}else{
						$tbl .= "<tr bgcolor='#FFFFFF'>\n";
					}
					$tbl .= "<input type='hidden' name='mlad_id' value='";
					$tbl .= $mlad_id . "'>\n<td>" . $mlad_id . "</td>\n";
					$tbl .= "<td>" . $mlad_mail . "</td>\n";
					$tbl .= "<td>" . $regist_dt . "</td>\n";
					$tbl .= "<td><select name='chg_status' onchange=\"submit()\">\n";
					if($status == 0){
						$tbl .= "<option value='0' SELECTED>適用中</option>\n";
						$tbl .= "<option value='1'>送付中止</option>\n";
						$tbl .= "<option value='2'>削除</option>\n";
					}elseif($status == 1){
						$tbl .= "<option value='0'>適用中</option>\n";
						$tbl .= "<option value='1' SELECTED>送付中止</option>\n";
						$tbl .= "<option value='2'>削除</option>\n";
					}
					$tbl .= "</select>\n</font>\n</td>\n</tr>\n</form>";

					$max_cnt2 = "";
				}
				if ($i >= $end_cnt) { break; }
			}
		}
	}

	db_close($cnn);

// ******************************************************************

	$action = "mail_admin.php";
	$title  = "お問い合わせ先発送メール宛先設定";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;

?>