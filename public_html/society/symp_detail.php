<?php
//***********************************************************************
//  シンポジウム詳細　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_symp_detail.php" );

$contents = ''
. '<h2>参加申込</h2>' . "\n"
. '<div class="main_box">' . "\n"
. '<h3>' . $data[ 'symp_name' ] . '</h3>' . "\n"
. '<h4>概要</h4>' . "\n"
. '<p>' . $contents_tbl_1 . '</p>' . "\n"
. '<h4>開催期間</h4>' . "\n"
. '<p>' . $contents_tbl_2 . '</p>' . "\n"
. '</table>' . "\n"
. '</div>' . "\n"
. '<div class="line"></div>' . "\n"
. '<div align="center"><a href="symp_entry.php?INIT_FLG=1&ID=' . $data[ 'symp_id' ] . '"><img src="./images/moushikomi.jpg" alt="お申し込みはこちらから" width="196" height="32" class="hoverImg" /></a></div><br />' . "\n";

	$class = ''
. '<li>シンポジウム・セミナー・基礎技術講座</li>' . "\n"
. '<li>参加申込一覧</li>' . "\n"
. '<li>' . $data[ 'symp_name' ] . '</li>' . "\n";


include( "./templates/common_tmpl2.html" );
?>