<?php
//***********************************************************************
//  公募情報　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
//	include_once( "./../../src/part_roadmap.php" );

	$koubo_array = array(
		1 => 'part_koubo-kumamoto110107.html',
	);

	if ( $_GET[ 'ID' ] != '' ) {
		$id = intval( $_GET[ 'ID' ] );
	} else {
		$id = 1;
	}


	$contents = $koubo_array[$id];

	$class = ''
. '<li><a href="./">HOME</a></li>' . "\n"
. '<li>表彰・若手育成・インターンシップ</li>' . "\n"
. '<li>公募情報</li>' . "\n";


	include( "./templates/common_tmpl3.html" );



?>