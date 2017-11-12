<?PHP
// *******************************************************************
// ICP管理画面記事更新 PHP Encording UTF-8
// *******************************************************************

	$id = $_GET[ "id" ];
	$catg = $_GET[ "catg" ];

	// 更新が押された
	if( $_POST[ "contents_submit" ] ){
		$_POST[ "contents_submit" ] = NULL;

		// エイリアス重複チェック
		$bf_alias = Alias_Before_Read( $id );
		if(($_POST[ "contents_alias" ] != "")&&($_POST[ "contents_alias" ] != $bf_alias)){
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
				$_POST[ "contents_status" ],
				$_POST[ "contents_alias" ]
			);

			$before_alias = Alias_Before_Read( $id );
			$after_alias = $_POST[ "contents_alias" ];

			if( $before_alias != $after_alias ){

				$htaccess = "../icp/.htaccess";
				$fp = @fopen( $htaccess, 'r' );
				$fd = @file($htaccess);
				$cnt =sizeof($fd);
				fclose($fp);

				// 配列再構築
				$modify_before = "?p=" . $id;
				$modify_after = str_replace('.', '\\.', $after_alias);
				$modify_line = "RewriteRule ^" . $modify_after . "$ " . $modify_before . " [QSA,L]\n";

				$new_fd = array();
				for($i=0; $i < $cnt; $i++){
					$exp_tmp = explode( ' ', $fd[$i]);
					$after_tmp = str_replace(array("^","$"," ",'\\'), '', $exp_tmp[1]);
					if( $before_alias != $after_tmp ){
						array_push( $new_fd, $fd[$i] );
					}
				}
				array_push( $new_fd, $modify_line );

				$fd = join( "", $new_fd);
				$fh = @fopen( $htaccess,"w" );
				fwrite( $fh, $fd );
				fclose( $fh );

			}

			// DB格納
			Icp_Contets_Edit( $id, $cts_arr );

			// コンテンツリストへ
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/icp_content_list.php?catg=" . $_POST[ "contents_catg" ] );
			exit;
		}
	}

	// 情報取得
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_title,cts_ctgr,cts_body,cts_alias,cts_rank,status,regist_dt,update_dt'.
' FROM '
	.'icp_content'.
' WHERE '
	.'cts_id = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$contents_title,
				$cts_ctgr,
				$contents_body,
				$contents_alias,
				$cts_rank,
				$status,
				$regist_dt,
				$update_dt
			);
			mysqli_stmt_fetch($stmt);
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	// セレクトボックス生成
	$catg_op  = Category_Select_Create_1( $cts_ctgr );
	$order_op = Order_Select_Create_1( 20, $cts_rank );

	// 画像確認
	$target_dir = "../icp/images/contents/" . $id . "/";

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
			$clip_js .= "	$(\"a#copy-desc" . $j . "\").zclip({path:\"js/ZeroClipboard.swf\",copy:$(\"span#desc" . $j . "\").text()});\n";

			$img_tmp = BASE_URL . "icp/images/contents/" . $id . "/" . $file;
			$img_file .= "<a href=\"" . $img_tmp . "\" onclick=\"return hs.expand(this)\" class=\"highslide\">" . $img_tmp . "</a>&nbsp;\n";
			$img_file .= "<a href=\"#\" id=\"copy-desc" . $j . "\">URLコピー</a>\n";
			$img_file .= "<span style=\"display:none\" id=\"desc" . $j . "\">" . $img_tmp . "</span><br />\n";
			$j++;
		}
		closedir($dh);
	}

	if( $status == 0 ){
		$status_op0 = " selected";
	}elseif( $status == 1 ){
		$status_op1 = " selected";
	}

	$regist_dt = strtotime($regist_dt);
	$regist_dt = date( 'Y/m/d/ H:i', $regist_dt );
	$update_dt = strtotime($update_dt);
	$update_dt = date( 'Y/m/d/ H:i', $update_dt );

	$confirm1 = "記事を編集します<BR>登録後リストページへジャンプします<BR>よろしいですか？";
	$confirm2 = "記事編集";
	$action = "icp_content_modify.php?catg=" . $catg . "&id=" . $id;
	$contents_submit = "ページ編集";
	$sk_url = BASE_URL . "icp/?p=" . $id;
	$bs_url = BASE_URL . "icp/";
	if($contents_alias){
		$mr_url = BASE_URL . "icp/" . $contents_alias;
	}
?>