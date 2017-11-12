<?php
//***********************************************************************
//  大会　講演　申込み　完了　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );

$contents = <<<EOD
<h2>講演申込</h2>
<div class="main_box">
<h3>講演申込み完了</h3>
<p>講演申込みを受け付けました。</p>
<br>
<p><a href="./?mode=content&amp;pid=34">引続き参加申込される方はこちら</a></p>
</div>
EOD;


	$class = ''
. '<li>講演大会・国際会議</li>' . "\n"
. '<li>講演大会</li>' . "\n"
. '<li>講演申込</li>' . "\n"
. '<li>完了</li>' . "\n";

include( "./templates/common_tmpl2.html" );
?>