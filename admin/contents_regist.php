<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$mode = $_GET[ "mode" ];

	// セッションクリア
	if( $mode == "bang" ){
		$_SESSION[ "JILM_CONTENTS_INSERT_ID" ] = "";
		$_SESSION[ "JILM_ADMIN_FOLD" ]         = "";
		$_SESSION[ "JILM_ADMIN_FOLD_SCH" ]     = "";
		$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ]   = "";
		$_SESSION[ "JILM_IMAGE_TYPE" ]         = "";
		$_SESSION[ "JILM_IMAGE_WIDTH" ]        = "";
		$_SESSION[ "JILM_IMAGE_HEIGHT" ]       = "";
		$_SESSION[ "JILM_CONTENTS_TMP_BODY" ]  = "";
		$_SESSION[ "JILM_CONTENTS_BODY" ]      = "";
	}

	// アップロードボタンが押された
	if( $_POST[ "UP_1" ] != "" ){
		$_POST[ "UP_1" ] = "";

		// アップロード画像保存用フォルダ
		$imgdir = "./../society/images/contents/" . $_SESSION[ "JILM_CONTENTS_INSERT_ID" ] . "/";

		// 無い場合は作成
		if (! file_exists( $imgdir )) { mkdir( $imgdir ); }
		chmod($imgdir, 0777);

		// アップロード
		move_uploaded_file($_FILES['image_file']['tmp_name'], $imgdir . mb_convert_encoding( $_FILES['image_file']['name'], "SJIS", "UTF-8" ));

		// 拡張子を取得
		$image_type = $_FILES['image_file']['type'];

		// 画像の場合はwidthとheightを取得
		if( $image_type == "image/pjpeg" ){
			$_SESSION[ "JILM_IMAGE_TYPE" ] = "jpg";
		}elseif( $image_type == "image/gif" ){
			$_SESSION[ "JILM_IMAGE_TYPE" ] = "gif";
		}elseif( $image_type == "image/x-png" ){
			$_SESSION[ "JILM_IMAGE_TYPE" ] = "png";
		}

		if( $_SESSION[ "JILM_IMAGE_TYPE" ] != "" ){
			Image_Type_Read( $imgdir, $_FILES['image_file']['name'] );
		}

		// DBに記載
		$img_width  = $_SESSION[ "JILM_IMAGE_WIDTH" ];
		$img_height = $_SESSION[ "JILM_IMAGE_HEIGHT" ];
		$img_file   = $_FILES['image_file']['name'];
		$img_cts    = $_SESSION[ "JILM_CONTENTS_INSERT_ID" ];

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = "INSERT INTO image_data";
		$sql .= "     (       img_file,";
		$sql .= "             img_contents,";
		$sql .= "             img_width,";
		$sql .= "             img_height,";
		$sql .= "             status,";
		$sql .= "             regist_dt,";
		$sql .= "             update_dt";
		$sql .= "     )";
		$sql .= "     VALUES";
		$sql .= "     (  '" . $img_file . "',";
		$sql .= "        '" . $img_cts . "',";
		$sql .= "        '" . $img_width . "',";
		$sql .= "        '" . $img_height . "',";
		$sql .= "        '0',";
		$sql .= "        '" . date(YmdHis) . "',";
		$sql .= "        '" . date(YmdHis) . "'";
		$sql .= "     )";

		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// セッションクリア
		$_SESSION[ "JILM_IMAGE_WIDTH" ]  = "";
		$_SESSION[ "JILM_IMAGE_HEIGHT" ] = "";
		$_SESSION[ "JILM_IMAGE_TYPE" ]   = "";

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_regist.php" );
		exit;
	}

	// プレビューボタンが押された
	if( $_POST[ "OK_4" ] != "" ){
		$_POST[ "OK_4" ] = "";

		// 内容をセッションに格納
		$_SESSION[ "JILM_CONTENTS_TMP_BODY" ] = StripSlashes( $_POST[ "regist_body" ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_regist.php" );
		exit;
	}

	// 登録ボタンが押された
	if( $_POST[ "OK_5" ] != "" ){
		$_POST[ "OK_5" ] = "";

		// 内容をセッションに格納
		$_SESSION[ "JILM_CONTENTS_BODY" ] = StripSlashes( $_POST[ "regist_body" ] );

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_regist_confirm.php?id=" . $_SESSION[ "JILM_CONTENTS_INSERT_ID" ] );
		exit;
	}

	// データ追加ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$regist_title = StripSlashes( $_POST[ "regist_cts_title" ] );
		$regist_fold  = StripSlashes( $_POST[ "regist_cts_fold" ] );
		$regist_rank  = StripSlashes( $_POST[ "regist_cts_rank" ] );

		// 入力データのエラーチェック
		if( $regist_title == "" ){
			$err_msg = "ページタイトルが入力されていません。";
		}

		// 問題が無い場合
		if( $err_msg == "" ){

			// ランクが設定されていない場合は強制で10
			if( $regist_rank == "" ){
				$regist_rank = 10;
			}

			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = "INSERT INTO content_body";
			$sql .= "     (       cts_title,";
			$sql .= "             cts_ctgr,";
			$sql .= "             cts_rank,";
			$sql .= "             status,";
			$sql .= "             regist_dt,";
			$sql .= "             update_dt";
			$sql .= "     )";
			$sql .= "     VALUES";
			$sql .= "     (  '" . $regist_title . "',";
			$sql .= "        '" . $regist_fold . "',";
			$sql .= "        '" . $regist_rank . "',";
			$sql .= "        '1',";
			$sql .= "        '" . date(YmdHis) . "',";
			$sql .= "        '" . date(YmdHis) . "'";
			$sql .= "     )";

			$res = cn_query($sql, $cnn);
			// 最新IDを編集セッションに格納
			$_SESSION[ "JILM_CONTENTS_INSERT_ID" ] = mysql_insert_id();
			tr_commit($cnn);
			db_close($cnn);

			$_SESSION[ "JILM_ADMIN_FOLD" ] = $regist_fold;

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/contents_regist.php" );

			exit;

		}
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

	// 階層↓ボタンが押された
	if( $_POST[ "OK_3" ] != "" ){
		$_POST[ "OK_3" ] == "";

		// 親階層取得
		$_SESSION[ "JILM_ADMIN_FOLD_SCH" ] = StripSlashes( $_POST[ "regist_cts_fold" ] );

	}

	// 階層↑ボタンが押された
	if( $_POST[ "OK_2" ] != "" ){
		$_POST[ "OK_2" ] == "";

		// 親階層データ取得
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = " . $_SESSION[ "JILM_ADMIN_FOLD_SCH" ];
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$_SESSION[ "JILM_ADMIN_FOLD_SCH" ] = cn_contract($res, 0, "ctgr_oya");
		}
		db_close($cnn);

		// 親が０の場合はセッションクリア
		if( $_SESSION[ "JILM_ADMIN_FOLD_SCH" ] == "0" ){
			$_SESSION[ "JILM_ADMIN_FOLD_SCH" ] = "";
		}

	}

	// フォルダ階層セレクトボックス
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE status < 2";
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

	// 画像リスト表示
	if( $_SESSION[ "JILM_CONTENTS_INSERT_ID" ] != "" ){

		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM image_data";
		$sql .= " WHERE img_contents = " . $_SESSION[ "JILM_CONTENTS_INSERT_ID" ];
		$sql .= "  AND status = 0";
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$max_cnt = cn_count($res);
			if ($max_cnt > 0){
				for ($i=0; $i<$max_cnt; $i++) {
					if ( $i >= 0 && $i <= $max_cnt ) {
						$img_id     = cn_contract($res, $i, "img_id");
						$img_cts    = cn_contract($res, $i, "img_contents");
						$img_file   = cn_contract($res, $i, "img_file");
						$img_width  = cn_contract($res, $i, "img_width");
						$img_height = cn_contract($res, $i, "img_height");
						$iplus      = $i + 1;

						if((strpos($img_file, ".jpg"))||(strpos($img_file, ".gif"))||(strpos($img_file, ".png"))){
							$img_tbl .= "<table class=\"img_tbl\">\n<tr>\n";
							$img_tbl .= "<td width='80' style=\"background-color:black\">";
							$img_tbl .= "&nbsp;<span style=\"color:white\">FILE" . $iplus;
							$img_tbl .= "\n</span>\n";
							$img_tbl .= "<textarea name=\"select" . $iplus . "\" cols=1 ";
							$img_tbl .= "rows=1 class=\"img\">";
							$img_tbl .= "<img src=\"./images/contents/" . $img_cts . "/" . $img_file;
							$img_tbl .= "\" width=\"" . $img_width . "\" height=\"" . $img_height;
							$img_tbl .= "\" alt=\"\" border=\"0\"></textarea>\n</td>\n";
							$img_tbl .= "<td>\n<input type=\"button\" value=\"Copy\" name=\"copy\"";
							$img_tbl .= " onclick=\"javascript:HantenC('akoarea.select" . $iplus;
							$img_tbl .= "')\" class=\"img\" />\n";
							$img_tbl .= "</td>\n<td width='573'>&nbsp;&nbsp;<span><a href=";
							$img_tbl .= "'./../society/images/contents/" . $img_cts . "/" . $img_file;
							$img_tbl .= "' target='_blank'>./images/contents/" . $img_cts . "/";
							$img_tbl .= $img_file . "</a>&nbsp;&nbsp;（&nbsp;" . $img_width;
							$img_tbl .= "&nbsp;×&nbsp;" . $img_height . "&nbsp;）&nbsp;";
							$img_tbl .= "&nbsp;<a href=\"contents_modify.php?mode=del&did=";
							$img_tbl .= $img_id . "\">ファイル削除</a></span>";
							$img_tbl .= "</td>\n</tr>\n</table>\n";
						}else{
							$img_tbl .= "<table class=\"img_tbl\">\n<tr>\n";
							$img_tbl .= "<td width='80' style=\"background-color:black\">";
							$img_tbl .= "&nbsp;<span style=\"color:white\">FILE" . $iplus;
							$img_tbl .= "\n</span>\n";
							$img_tbl .= "<textarea name=\"select" . $iplus . "\" cols=1 ";
							$img_tbl .= "rows=1 class=\"img\">";
							$img_tbl .= "<a href=\"./images/contents/" . $img_cts . "/" . $img_file;
							$img_tbl .= "\">" . $img_file . "</a>";
							$img_tbl .= "</textarea>\n</td>\n";
							$img_tbl .= "<td>\n<input type=\"button\" value=\"Copy\" name=\"copy\"";
							$img_tbl .= " onclick=\"javascript:HantenC('akoarea.select" . $iplus;
							$img_tbl .= "')\" class=\"img\" />\n";
							$img_tbl .= "</td>\n<td width='573'>&nbsp;&nbsp;<span><a href=";
							$img_tbl .= "'./../society/images/contents/" . $img_cts . "/" . $img_file;
							$img_tbl .= "' target='_blank'>./images/contents/" . $img_cts . "/";
							$img_tbl .= $img_file . "</a>&nbsp;";
							$img_tbl .= "&nbsp;<a href=\"contents_modify.php?mode=del&did=";
							$img_tbl .= $img_id . "\">ファイル削除</a></span>";
							$img_tbl .= "</td>\n</tr>\n</table>\n";
							$img_tbl .= "</tr>\n</table>\n";
						}
					}
					if ($i >= $max_cnt) { break; }
				}
			}
		}

		db_close($cnn);
	}

// ******************************************************************

	$action = "contents_regist.php";
	$title  = "コンテンツ新規登録";
	$submit = "本文入力へ進む";
	$fold_list = $_SESSION[ "JILM_ADMIN_FOLD_LIST2" ];
	if( $_SESSION[ "JILM_CONTENTS_INSERT_ID" ] != ""){
		$add_flg = "ON";
	}
	$regist_body = $_SESSION[ "JILM_CONTENTS_TMP_BODY" ];
	$sum_body    = $_SESSION[ "JILM_CONTENTS_TMP_BODY" ];
	if( $_SESSION[ "JILM_CONTENTS_BODY" ] != ""){
		$regist_body = $_SESSION[ "JILM_CONTENTS_BODY" ];
	}

	$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] = "";

	$dsp_tbl = $tbl;

?>