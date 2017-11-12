<?php
//***********************************************************************
//  出版物購入　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );

	$member_name     = $_SESSION[ 'COMP_SESSION' ]['member_name' ];
	$member_mail     = $_SESSION[ 'COMP_SESSION' ]['member_mail' ];
	$book_price_text = $_SESSION[ 'COMP_SESSION' ]['book_price_text' ];

	$_SESSION[ 'COMP_SESSION' ] = NULL;

$contents = <<<EOD
<h2>出版物購入の申込完了</h2>
<div class="main_box">
<br />
<span style="font-weight: bold;">{$member_name}</span>様<br />
<br />
購入申込完了いたしました。<br />
<br />
記入されたメールアドレス(<span style="font-weight: bold;">{$member_mail}</span>)宛に<br />
ご注文の控えをお送りしていますので、ご確認ください。<br />
<br />
注文合計金額は<br />
<span style="font-weight: bold;">{$book_price_text}</span><br />
となります。<br />
<br />
ご購入、ありがとうございました。<br />
<br />
</div>
EOD;

	$class = ''
. '<li>出版物</li>' . "\n"
. '<li>購入</li>' . "\n"
. '<li>購入完了</li>' . "\n";

?>