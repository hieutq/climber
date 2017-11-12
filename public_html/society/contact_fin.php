<?php
//***********************************************************************
//  お問い合わせ完了　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );


$contents = <<<EOD
<h2>お問い合わせ 送信完了</h2>
<div class="main_box">
お問い合わせを送信いたしました。<br />
<br />
後ほど担当者よりご連絡させていただきます。<br />
<br />
ご返信までに数日かかる場合がありますので予めご了承ください。<br />
<br />
今後とも軽金属学会をよろしくお願いします。<br />
<br />
</div>
EOD;

	$class = ''
. '<li>お問い合わせ</li>' . "\n"
. '<li>お問い合わせ完了</li>' . "\n";

?>