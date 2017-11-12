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
<h2>インターネットサービス新規登録受付完了</h2>
<div class="main_box">
インターネットサービス新規登録を受付ました。<br />
<br />
管理者認証後、インターネットサービスにログインできるようになります。<br />
<br />
<br />
</div>
EOD;

	$class = ''
. '<li>HPからの申込</li>' . "\n"
. '<li>新規登録受付完了</li>' . "\n";

?>