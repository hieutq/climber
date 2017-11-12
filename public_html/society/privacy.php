<?php
//***********************************************************************
//  プライバシーポリシー　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_privacy.php" );

$privacy_text = $privacy;

$contents = <<<EOD
<h2>プライバシーポリシー</h2>
<div class="main_box">
{$privacy_text}<br />
<br />
<br />
</div>
EOD;

	$class = ''
. '<li>プライバシーポリシー</li>' . "\n";

?>