<?PHP
// *******************************************************************
// トップページ@Encording UTF-8
// *******************************************************************

	session_start();

	include_once( "../../include/az_constant.php" );
	include_once( "../../include/alma_admin.php" );

	$navi = "";
	$p = $_GET[ "p" ];
	$self = str_replace( array("/alma/", ".php"), "", $_SERVER[ "PHP_SELF" ] );

	if(!$p){
		include_once( "../../src/alma_index.php" );
		$index_flg = true;
		$title = "";
		$body = "index";
		$contents = "./templates/alma_index.html";
	}else{
		$page = Contents_Read_All( $p );
		$title = $page[0] . " | ";
		$body = "page";
		$contents = "./templates/alma_contents.html";
	}
	$_SESSION[ "ALMA_SEARCH_WORD" ] = "";
	$navi_arr = Navi_Menu_Read($p);
	$link_navi = "<li><a href=\"links\">Links</a></li>";
	$navi = $navi_arr[0] . $link_navi . $navi_arr[1];

// $navi=explode('</li>', $navi);
// $navi_link=$navi[2];
// $navi[2]=$navi[3];
// $navi[3]=$navi_link;
// $navi=implode('</li>', $navi);
// $navi.='</li>';
/*
$navi=<<<EOM
<li><a href="./" class="selection">Home</a></li>
<li><a href="what">What is ALMA</a></li>
<li><a href="collaborations">ALMA Forum and meetings</a></li>
<li><a href="links">Links</a></li>
<li><a href="?p=13">International Conferences</a></li>
<li><a href="domestic">Domestic Conferences</a></li>
<li><a href="bulletinboard">Bulletin board</a></li>
<li><a href="resource">Human Resource</a></li>
EOM;*/

	include_once( "./templates/common_tmpl.html" );

?>