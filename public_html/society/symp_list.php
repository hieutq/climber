<?php
//***********************************************************************
//  シンポジウム一覧　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_symp_list.php" );

$contents = ''
. '<h2>参加申込一覧</h2>' . "\n"
. '<div class="main_box">' . "\n"
. '<h3>シンポジウム・セミナー・基礎技術講座 一覧</h3>' . "\n"
. '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl">' . "\n"
. $contents_tbl
. '</table>' . "\n"
. '</div>' . "\n";
?>