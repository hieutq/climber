<?php
//***********************************************************************
//  お問い合わせ　Encording UTF-8
//***********************************************************************
	session_start();
	include_once( "./../../include/az_constant.php" );
	//include_once( "./../../include/az_common.php" );
	// include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/part_contact_eng.php" );
	$header_link = ''
. '<link rel="stylesheet" href="./commons/mailform.css" type="text/css" />' . "\n";
// . '<script type="text/javascript" src="./commons/jquery.js" charset="UTF-8"></script>' . "\n"
// . '<script type="text/javascript" src="./commons/mailform.js" charset="UTF-8"></script>' . "\n"
// . '<script type="text/javascript" src="./postcodes/get.cgi?js" charset="UTF-8"></script>' . "\n";
	$class = ''
. '<li>お問い合わせ</li>' . "\n";

?>