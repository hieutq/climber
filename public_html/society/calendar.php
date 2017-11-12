<?php
//***********************************************************************
//  カレンダー　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
//	include_once( "./../../src/part_roadmap.php" );

	if ( $_GET[ 'year' ] != '' ) {
		$year = intval( $_GET[ 'year' ] );
	} else {
		$year = date( 'Y' ) - 1;
	}


	$contents = './templates/part_calendar_' . $year . '.html';

	if ( ! file_exists( $contents ) ) {
		$year = date( 'Y' ) - 2;
		$contents = './templates/part_calendar_' . $year . '.html';
	}


?>