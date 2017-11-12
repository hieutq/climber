<?php
//***********************************************************************
//  出版物購入　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );


$contents = <<<EOD
<h2>インターネットサービス登録内容 変更完了</h2>
<div class="main_box">
インターネットサービス登録内容の変更が完了いたしました。<br />
<br />
<br />
</div>
EOD;

	$class = ''
. '<li>HPからの申込</li>' . "\n"
. '<li>インターネットサービス登録内容変更</li>' . "\n";

?>