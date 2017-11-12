<?php
//***********************************************************************
//  サイト内検索　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_search_site.php" );

	$header_link = '';


	$class = ''
. '<li>サイト内検索<li>' . "\n";

?>