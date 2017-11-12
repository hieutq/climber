<?PHP
// *******************************************************************
// リンク@Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "../../include/az_constant.php" );
	include_once( "../../include/alma_admin.php" );

	$navi = "";
	$body = "page";
	$dsp = $_GET[ "dsp" ];

	include_once( "../../src/alma_search.php" );
	$contents = "./templates/alma_search.html";

	$search_word = $_SESSION[ "ALMA_SEARCH_WORD" ];
	$navi_arr = Navi_Menu_Read(0);
	$link_navi = "<li><a href=\"links\">Links</a></li>";
	$navi = $navi_arr[0] . $link_navi . $navi_arr[1];

	include_once( "./templates/common_tmpl.html" );

?>