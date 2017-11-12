<?PHP
// *******************************************************************
// トップページ@Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "../../include/az_constant.php" );
	include_once( "../../include/icp_admin.php" );

	$navi = "";
	$p = $_GET[ "p" ];
	$self = str_replace( array("/icp/", ".php"), "", $_SERVER[ "PHP_SELF" ] );

	if(!$p){
		include_once( "../../src/icp_index.php" );
		$index_flg = true;
		$title = "";
		$body = "index";
		$contents = "./templates/icp_index.html";
	}else{
		$page = Contents_Read_All( $p );
		$title = $page[0] . " | ";
		$body = "page";
		$contents = "./templates/icp_contents.html";
	}
	$_SESSION[ "ICP_SEARCH_WORD" ] = "";
	$navi_arr = Navi_Menu_Read($p);
	$link_navi = "<li><a href=\"links\">Links</a></li>";
	$navi = $navi_arr[0] . $link_navi . $navi_arr[1];

	include_once( "./templates/common_tmpl.html" );

?>