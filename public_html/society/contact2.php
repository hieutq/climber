<?php
//***********************************************************************
//  維持会員技術相談　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_contact2.php" );

	$header_link = ''
. '<link rel="stylesheet" href="./commons/mailform.css" type="text/css" />' . "\n"
. '<script type="text/javascript" src="./commons/jquery.js" charset="UTF-8"></script>' . "\n"
. '<script type="text/javascript" src="./commons/mailform.js" charset="UTF-8"></script>' . "\n"
. '<script type="text/javascript" src="./postcodes/get.cgi?js" charset="UTF-8"></script>' . "\n";

	$class = ''
. '<li>維持会員技術相談室</li>' . "\n";

?>