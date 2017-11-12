<?php
//***********************************************************************
//  シンポジウム詳細　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );

$contents = <<<EOD
<h2>参加申込 編集</h2>
<div class="main_box">
<h3>参加申込み内容 編集完了</h3>
<p>参加申込み内容の編集を受け付けました。</p>
</div>
EOD;


	$class = ''
. '<li>シンポジウム・セミナー・基礎技術講座</li>' . "\n"
. '<li>参加申込一覧</li>' . "\n"
. '<li>参加申込 編集シート</li>' . "\n"
. '<li>参加申込 編集完了</li>' . "\n";

include( "./templates/common_tmpl2.html" );
?>