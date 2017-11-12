<?PHP
// *******************************************************************
// トップページ@Encording UTF-8
// *******************************************************************
	
	session_start();
	include_once( "../../include/az_constant.php" );
	include_once( "../../include/eng_admin.php" );

	$navi = "";
	$p = $_GET[ "p" ];
	$mode = $_GET[ "mode" ];
	$self = str_replace( array("/eng/", ".php"), "", $_SERVER[ "PHP_SELF" ] );

	if(!$p){

		// トップページ
		if ($mode) {
			$body = "page";
			// お問い合わせ
			if ( $mode == 'contact' ) {
				include_once( "./contact.php" );
				$contents = "./templates/part_contact.html";
			// お問い合わせ確認
			} elseif ( $mode == 'contact_confirm' ) {
				include_once( "./contact_confirm.php" );
				$contents = "./templates/part_contact_confirm.html";

			// お問い合わせ完了
			} elseif ( $mode == 'contact_fin' ) {
				include_once( "./contact_fin.php" );
				$contents = "./templates/part_contact_fin.html";
			}
		} else {
			include_once( "../../src/eng_index.php" );
			$index_flg = true;
			$title = "";
			$body = "index";
			//$body = "page";
			$contents = "./templates/eng_index.html";
		}
		
	}else{
		$page = Contents_Read_All( $p );
		$title = $page[0] . " | ";
		$body = "page";
		$contents = "./templates/eng_contents.html";
	}
	$_SESSION[ "JILM_ENG_SEARCH_WORD" ] = "";
	$navi_arr = Navi_Menu_Read($p);
	//$link_navi = "<li><a href=\"links\">Links</a></li>";
	$navi = $navi_arr;

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