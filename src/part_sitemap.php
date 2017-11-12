<?PHP

	// ログインしていない場合
	if( $_SESSION[ "JSOH_MEMBER_IDR" ] == "" ){

		$fid = "0";

		// セッションクリア
		Jsoh_Contents_Session_clear();

		// データ読み込み
		Jsoh_Contents_Read_2($fid);

		$action = "./?mode=sitemap";
		$page_title = $_SESSION[ "JSOH_PAGE_TITLE" ];
		$class = "サイトマップ";
		$body = $_SESSION[ "JSOH_CATEGORY_LIST" ];
		$contents = "./templates/part_sitemap.html";

	// ログインしている場合
	}elseif( $_SESSION[ "JSOH_MEMBER_IDR" ] != "" ){

		$fid = "0";

		// セッションクリア
		Jsoh_Contents_Session_clear();

		// データ読み込み
		Jsoh_Contents_Read_3($fid);

		$action = "./?mode=sitemap";
		$page_title = "サイトマップ";
		$class = $_SESSION[ "JSOH_CLASS_LIST" ];
		$body = $_SESSION[ "JSOH_CATEGORY_LIST" ];
		$contents = "./templates/part_sitemap.html";

	}

?>