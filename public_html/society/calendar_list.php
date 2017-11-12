<?php
//***********************************************************************
//  カレンダー　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_calendar.php" );

	$cal_tbl = $calendar_tbl;

	$contents = './templates/part_calendar.html';


?>