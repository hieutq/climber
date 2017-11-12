<?php
//***********************************************************************
//  大会一覧　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_convention_list.php" );

$contents = ''
. '<h2>講演大会</h2>' . "\n"
. '<div class="main_box">' . "\n"
. '<h3>春秋講演大会</h3>' . "\n"
. '<script><!--' . "\n"
. '$(document).ready(function(){' . "\n"
. '  $(\'#dropdown_1\').click(function(){' . "\n"
. '    $(\'#dropdown_1_contents\').slideToggle(\'slow\');' . "\n"
. '  });' . "\n"
. '});' . "\n"
. '//-->' . "\n"
. '</script>' . "\n"
. '<table border="0" cellpadding="0" cellspacing="0" class="tbl">' . "\n"
. '<tbody>' . "\n"
. '<tr>' . "\n"
. '<th align="center">名称</th>' . "\n"
. '<th align="center">開催期間</th>' . "\n"
. '<th align="center">開催場所</th>' . "\n"
. '<th align="center">備考</th>' . "\n"
. '</tr>' . "\n"
. $convention_list_tbl
. '</tbody>' . "\n"
. '</table>' . "\n"
. '</div>' . "\n";


?>