<?PHP
// *******************************************************************
// リンク@Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "../../include/az_constant.php" );
	include_once( "../../include/icp_admin.php" );

	$navi = "";
	$catg = $_GET[ "cat" ];
	// デフォルトはorderの一番若いカテゴリーを表示
	if(!$catg){ $catg = Link_firstOrder_Read(); }
	$self = str_replace( array("/icp/", ".php"), "", $_SERVER[ "PHP_SELF" ] );//link

	$body = "page";
	include_once( "../../src/icp_link.php" );
	$contents = "./templates/icp_link.html";
	$h3 =  Link_Category_Read( $catg );
	$_SESSION[ "ICP_SEARCH_WORD" ] = "";
	$navi_arr = Navi_Menu_Read($self);
	$link_navi = Navi_linkMenu_Read($self, $catg);
	$navi = $navi_arr[0] . $link_navi . $navi_arr[1];

	include_once( "./templates/common_tmpl.html" );

?>