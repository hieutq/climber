<?php
//***********************************************************************
//  出版物一覧　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_book_list.php" );

$contents = <<<EOD
<h2>出版物</h2>
<div class="main_box">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="alignT"><strong>購入方法(1):</strong></td>
<td>ホームページより購入の申込みができます。<br />
下記のリストからご希望書籍の&quot;<a href="#">購入</a>&quot;をクリックしてください。<br />
購入の受付ページが表示されますのでお申込みください。出版物と請求書をお送り致します。</td>
</tr>
<tr>
<td class="alignT"><strong>購入方法(2):</strong></td>
<td>出版物のタイトル、必要部数、送付先、連絡先（Tel、Fax、E-mail）を明記の上、<br />
Fax：03-3538-0226までお申し込み下さい。<br />
出版物と請求書をお送り致します。</td>
</tr>
</table>

<div class="line"></div>
<p> ・送料別<br />
・在庫のないものについて・・・1ページ50円でコピー致します。<br />
　定価欄に(コピー)とし、会員価格欄に1冊全部をコピーしたときの代金を表示しています。 </p>
<div class="line"></div>

<form method="post" action="bookbuy.asp">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="t_border">
<tbody>
<tr>
<th align="center">No.</th>
<th align="center">タイトル</th>
<th align="center" nowrap="nowrap"><font size="2">発行年</font></th>
<th align="center" nowrap="nowrap"><font size="2">定価</font></th>
<th align="center" nowrap="nowrap" style="white-space: nowrap;">会員価格</th>
<th align="center" nowrap="nowrap">購入</th>
</tr>
{$book_tbl}
</tbody>
</table>
</form>
</div>
EOD;

	$class = ''
. '<li>出版物</li>' . "\n";


?>