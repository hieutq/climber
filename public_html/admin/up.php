<?PHP

	include_once( '../../include/jscr_constant.php' );
	include_once( '../../include/jscr_admin.php' );

	$mode = $_GET[ "mode" ];
	$id   = $_GET[ "id" ];

	if(!$mode){
		$body = " onLoad='window.close();'"; 
	}

	// 画像確認(category)
	if( $mode == "category" ){

		$target_dir = "../images/" . $mode . "/" . $id . "/";

		// ディレクトリまたはファイルがない場合は無しフラグ
		if(!is_dir($target_dir) && !is_link($target_dir)){
			$up_flg = NULL;
		}else{
			$up_flg = "on";
		}

		if (!($dh = @opendir($target_dir))) {
		}

		if($up_flg){
			while ($file = readdir($dh)) {
				if ($file == "." || $file == "..") continue;
				$img_file .= $file;
			}
			closedir($dh);
		}

		$action = "script/upload.php?mode=" . $mode . "&id=" . $id;

		if($img_file){

			// 削除ボタンが押された
			if( $_GET[ "delete" ] != NULL ){

				$file_name = $_GET[ "file" ];
				$del_file = "../images/" . $mode . "/" . $id . "/" . $file_name;
				unlink( $del_file );
				header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
				 . dirname( $_SERVER[ "PHP_SELF" ] ) . "/up.php?mode=" . $mode . "&id=" . $id );
				exit;

			}
			include_once( "../../templates/admin_category_img.html" );
		}else{
			include_once( "../../templates/admin_uploader.html" );
		}

	// 画像確認(banner)
	}elseif( $mode == "link" ){

		$target_dir = "../images/" . $mode . "/" . $id . "/";

		// ディレクトリまたはファイルがない場合は無しフラグ
		if(!is_dir($target_dir) && !is_link($target_dir)){
			$up_flg = NULL;
		}else{
			$up_flg = "on";
		}

		if (!($dh = @opendir($target_dir))) {
		}

		if($up_flg){
			while ($file = readdir($dh)) {
				if ($file == "." || $file == "..") continue;

$banner_img .= "<img src=\"../images/".$mode."/".$id."/".$file."\" width=\"185\" alt=\"\" />\n";

			}
$banner_img .= "<form method=\"get\" action=\"up.php\">\n";
$banner_img .= "<input type=\"hidden\" name=\"mode\" value=\"".$mode."\" />\n";
$banner_img .= "<input type=\"hidden\" name=\"id\" value=\"".$id."\" />\n";
$banner_img .= "<input type=\"submit\" name=\"delete\" class=\"submit\" value=\"画像削除\" /><br />\n";
			closedir($dh);
		}

		$action = "script/upload.php?mode=" . $mode . "&id=" . $id;

		if($banner_img){

			// 削除ボタンが押された
			if( $_GET[ "delete" ] != NULL ){

				$del_dir = "../images/" . $mode . "/" . $id;
				remove_directory( $del_dir );

				echo "<script type='text/javascript'>";
				echo "window.close();";
				echo "</script>";
				exit;
			}
		}
		include_once( "../../templates/admin_banner_img.html" );
	}else{
		include_once( "../../templates/admin_uploader.html" );
	}

?>