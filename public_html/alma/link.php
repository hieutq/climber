<?PHP
// *******************************************************************
// リンク@Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "../../include/az_constant.php" );
	include_once( "../../include/alma_admin.php" );

	$navi = "";
	$p = $_GET[ "p" ];
	$catg = $_GET[ "cat" ];
	// デフォルトはorderの一番若いカテゴリーを表示
	if(!$catg){ $catg = Link_firstOrder_Read(); }
	$self = str_replace( array("/alma/", ".php"), "", $_SERVER[ "PHP_SELF" ] );//link
	
	if(!$p){
		$body = "page";
		include_once( "../../src/alma_link.php" );
		$contents = "./templates/alma_link.html";
		$h3 =  Link_Category_Read( $catg );
		$_SESSION[ "ALMA_SEARCH_WORD" ] = "";
		$navi_arr = Navi_Menu_Read($self);
		$link_navi = Navi_linkMenu_Read($self, $catg);
		$navi = $navi_arr[0] . $link_navi . $navi_arr[1];
	}else{
		$page = Contents_Read_All( $p );
		$title = $page[0] . " | ";
		$body = "page";
		$contents = "./templates/alma_contents.html";
		$_SESSION[ "ALMA_SEARCH_WORD" ] = "";
		$navi_arr = Navi_Menu_Read($p);
		$link_navi = "<li><a href=\"links\">Links</a></li>";
		$navi = $navi_arr[0] . $link_navi . $navi_arr[1];
	}

	include_once( "./templates/common_tmpl.html" );

?>