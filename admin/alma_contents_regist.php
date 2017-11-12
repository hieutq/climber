<?PHP
// *******************************************************************
// ALMA管理画面記事新規作成　PHP　Encording UTF-8
// *******************************************************************

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

//	$mode = $_GET[ "mode" ];
	$id = $_GET[ "id" ];
//	$catg = $_GET[ "catg" ];

	// 最新IDを取得
	if(!$id){

		$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$stmt = dbi_stmt_init($cnn);
		$sql  =
'SELECT '
	.'cts_id'.
' FROM '
	.'icp_content'.
' ORDER BY '
	.'cts_id DESC';

		if (mysqli_stmt_prepare($stmt,$sql)) {

			dbi_stmt_exe($stmt);
			dbi_store_res($stmt);
			$cnt = cni_count($stmt);
			if($cnt > 0){
				mysqli_stmt_bind_result($stmt,
					$cts_id
				);
				mysqli_stmt_fetch($stmt);
				dbi_stmt_close($stmt);
			}
		}
		dbi_close($cnn);

		// 正規URLへリダイレクト
		$cts_plus = $cts_id + 1;
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/alma_content_regist.php?id=" . $cts_plus );
		exit;

	}

	// 新規作成が押された
	if( $_POST[ "contents_submit" ] != NULL ){
		$_POST[ "contents_submit" ] = NULL;

		// エイリアス重複チェック
		if($_POST[ "contents_alias" ] != ""){
			$err_msg = Alias_Cross_Check( $_POST[ "contents_alias" ], $id );
		}

		if(!$err_msg){

			// 格納
			$cts_arr = array();
			$cts_arr = array(
				stripslashes( $_POST[ "contents_title" ] ),
				$_POST[ "contents_catg" ],
				stripslashes( $_POST[ "contents_body" ] ),
				$_POST[ "contents_order" ],
				$_POST[ "contents_alias" ]
			);

			// 設定
			$htaccess = "../alma/.htaccess"; // ファイル格納場所

			$fp = @fopen( $htaccess, 'r' );
			$fd = @file($htaccess);
			$cnt =sizeof($fd);
			fclose($fp);

			$regist_before = "?p=" . $id;
			$regist_after = $_POST[ "contents_alias" ];

			// 行作成
			$regist_before = str_replace('.', '\\.', $regist_before);
			$regist_after = str_replace('.', '\\.', $regist_after);
			$regist_line = "RewriteRule ^" . $regist_after . "$ " . $regist_before . " [QSA,L]\n";

			// 現状ファイルに追加
			$regist_file = @fopen( $htaccess, 'a' );
			fwrite($regist_file, $regist_line);
			fclose($regist_file);

			$fp = @fopen( $htaccess, 'r' );
			$fd = @file($htaccess);
			$cnt =sizeof($fd);
			fclose($fp);

			// DB格納
			Icp_Contets_Regist( $cts_arr );

			// コンテンツリストへ
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/alma_content_list.php?catg=" . $_POST[ "contents_catg" ] );
			exit;

		}
	}

	// セレクトボックス生成
	$catg_op  = Category_Select_Create_1( $catg );
	$order_op = Order_Select_Create_1( 20, 10 );

	// 画像確認
	$target_dir = "../alma/images/contents/" . $id . "/";

	// ディレクトリまたはファイルがない場合は無しフラグ
	if(!is_dir($target_dir) && !is_link($target_dir)){
		$up_flg = NULL;
	}else{
		$up_flg = true;
	}

	if (!($dh = @opendir($target_dir))) {
	}

	if($up_flg){

		$j = 1;
		$img_file .= "<h3>過去アップロードしたファイル</h3>\n";

		while ($file = readdir($dh)) {
			if ($file == "." || $file == "..") continue;
			$clip_js .= "	$(\"a#copy-desc" . $j . "\").zclip({path:\"js/ZeroClipboard.swf\",copy:$(\"p#desc" . $j . "\").text()});\n";
			$clip_js .= "$(\"a#copy-desc" . $j . "\").zclip({\n";
			$clip_js .= "   path:\"js/ZeroClipboard.swf\",\n";
			$clip_js .= "   copy:$(\"p#desc" . $j . "\").text()\n";
			$clip_js .= "});\n";

			$img_tmp = BASE_URL . "alma/images/contents/" . $id . "/" . $file;
			$img_file .= "<a href=\"" . $img_tmp . "\" onclick=\"return hs.expand(this)\" class=\"highslide\">" . $img_tmp . "</a>&nbsp;\n";
			$img_file .= "<a href=\"#\" id=\"copy-desc" . $j . "\">URLコピー</a>\n";
			$img_file .= "<p style=\"display:none\" id=\"desc" . $j . "\">" . $img_tmp . "</p>\n";
			$j++;
		}
		closedir($dh);
	}

	$confirm1 = "記事を登録します<BR>登録後リストページへジャンプします<BR>よろしいですか？";
	$confirm2 = "記事新規登録";
	$action = "alma_content_regist.php?id=" . $id;
	$contents_submit = "ページ新規登録";
	$sk_url = BASE_URL . "alma/?p=" . $id;
	$bs_url = BASE_URL . "alma/";
?>