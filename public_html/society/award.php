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

	if ( $_GET[ 'ID' ] != '' ) {
		$award_id = intval( $_GET[ 'ID' ] );
	} else {
		$award_id = 1;
	}

	$award_id_format = sprintf( "%02d", $award_id );

	$contents = './templates/part_award' . $award_id_format . '.html';

	$class = ''
. '<li><a href="./">HOME</a></li>' . "\n"
. '<li>表彰・若手育成・インターンシップ</li>' . "\n"
. '<li>表彰</li>' . "\n";


	include( "./templates/common_tmpl3.html" );



?>