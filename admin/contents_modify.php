<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$mode = $_GET[ "mode" ];
	$_SESSION[ "JILM_CONTENTS_MODIFY_ID" ] = $_GET[ "id" ];

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
	// 画像消去
	}elseif( $mode == "del" ){

		$img_did = $_GET[ "did" ];

		// 画像名取得
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM image_data";
		$sql .= " WHERE img_id = " . $img_did;
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$img_cts  = cn_contract($res, 0, "img_contents");
			$img_file = cn_contract($res, 0, "img_file");
		}
		db_close($cnn);

		// DBのステータスを変更
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = "UPDATE image_data";
		$sql .= "   SET status = '1',";
		$sql .= "    update_dt = '" . date(YmdHis) . "'";
		$sql .= " WHERE img_id = " . $img_did;
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// ファイル削除
		$del_fold = "./../society/images/contents/" . $img_cts . "/" . $img_file;
		unlink( $del_fold );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_modify.php?id=" . $img_cts );
		exit;

	}

	// アップロードボタンが押された
	if( $_POST[ "UP_1" ] != "" ){
		$_POST[ "UP_1" ] = "";

		// アップロード画像保存用フォルダ
		$imgdir = "./../society/images/contents/" . $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ] . "/";

		// 無い場合は作成
		if (! file_exists( $imgdir )) { mkdir( $imgdir ); }
		chmod($imgdir, 0777);

		// アップロード
		move_uploaded_file($_FILES['image_file']['tmp_name'], $imgdir . mb_convert_encoding( $_FILES['image_file']['name'], "SJIS", "UTF-8" ));

		// 拡張子を取得
		$image_type = $_FILES['image_file']['type'];

		// 画像の場合はwidthとheightを取得
		if(( $image_type == "image/pjpeg" )||( $image_type == "image/jpeg" )){
			$_SESSION[ "JILM_IMAGE_TYPE" ] = "jpg";
		}elseif( $image_type == "image/gif" ){
			$_SESSION[ "JILM_IMAGE_TYPE" ] = "gif";
		}elseif( $image_type == "image/x-png" ){
			$_SESSION[ "JILM_IMAGE_TYPE" ] = "png";
		}
/*
		if( $_SESSION[ "JILM_IMAGE_TYPE" ] != "" ){
			Image_Type_Read( $imgdir, $_FILES['image_file']['name'] );
		}
*/
		// DBに記載
		$img_width  = $_SESSION[ "JILM_IMAGE_WIDTH" ];
		$img_height = $_SESSION[ "JILM_IMAGE_HEIGHT" ];
		$img_file   = $_FILES['image_file']['name'];
		$img_cts    = $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ];

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
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_modify.php?id=" . $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ] );
		exit;
	}

	// プレビューボタンが押された
	if( $_POST[ "OK_4" ] != "" ){
		$_POST[ "OK_4" ] = "";

		// 内容をセッションに格納
		$_SESSION[ "JILM_CONTENTS_TMP_BODY" ] = StripSlashes( $_POST[ "modify_body" ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_modify.php?id=" . $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ] );
		exit;
	}

	// 登録ボタンが押された
	if( $_POST[ "OK_5" ] != "" ){
		$_POST[ "OK_5" ] = "";

		// 内容をセッションに格納
		$_SESSION[ "JILM_CONTENTS_TITLE" ] = StripSlashes( $_POST[ "modify_title" ] );
		$_SESSION[ "JILM_CONTENTS_RANK" ]  = StripSlashes( $_POST[ "modify_rank" ] );
		$_SESSION[ "JILM_CONTENTS_BODY" ]  = StripSlashes( $_POST[ "modify_body" ] );

		// 確認画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/contents_modify_confirm.php?id=" . $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ] );
		exit;
	}

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
		$sql .= " WHERE cts_id = " . $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ];
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$tmp_data = cn_contract($res, 0, "cts_title");
		}
		db_close($cnn);

		$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] = $_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] . "&nbsp;&gt;&nbsp;" . $tmp_data;

	}

	// 画像リスト表示
	if( $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ] != "" ){

		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM image_data";
		$sql .= " WHERE img_contents = " . $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ];
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

	// 修正情報読み込み
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_body";
	$sql .= " WHERE cts_id = " . $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ];
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$modify_title = cn_contract($res, 0, "cts_title");
		$modify_rank  = cn_contract($res, 0, "cts_rank");
		$modify_body  = cn_contract($res, 0, "cts_body");
	}
	db_close($cnn);

// ******************************************************************

	$action = "contents_modify.php?id=" . $_SESSION[ "JILM_CONTENTS_MODIFY_ID" ];
	$title  = "ページ内容修正";
	$fold_list = $_SESSION[ "JILM_ADMIN_FOLD_LIST2" ];
	$sum_body    = $_SESSION[ "JILM_CONTENTS_TMP_BODY" ];
	if( $_SESSION[ "JILM_CONTENTS_TMP_BODY" ] != ""){
		$modify_body = $_SESSION[ "JILM_CONTENTS_TMP_BODY" ];
	}
	if( $_SESSION[ "JILM_CONTENTS_BODY" ] != ""){
		$modify_body = $_SESSION[ "JILM_CONTENTS_BODY" ];
	}

	$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] = "";

	if( $modify_rank == "1" ){
		$rank_option1 = " selected";
	}elseif( $modify_rank == "2" ){
		$rank_option2 = " selected";
	}elseif( $modify_rank == "3" ){
		$rank_option3 = " selected";
	}elseif( $modify_rank == "4" ){
		$rank_option4 = " selected";
	}elseif( $modify_rank == "5" ){
		$rank_option5 = " selected";
	}elseif( $modify_rank == "6" ){
		$rank_option6 = " selected";
	}elseif( $modify_rank == "7" ){
		$rank_option7 = " selected";
	}elseif( $modify_rank == "8" ){
		$rank_option8 = " selected";
	}elseif( $modify_rank == "9" ){
		$rank_option9 = " selected";
	}elseif( $modify_rank == "10" ){
		$rank_option10 = " selected";
	}

	$dsp_tbl = $tbl;

?>