<?php
//***********************************************************************
//  出版物購入　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_book_buy.php" );



$input_radio_1 = html_radios(
	$op_arr = $member_kubun01_type,
	$selected = $dsp[ 'member_kubun01' ],
	$op_name = 'kubun',
	$separator='&nbsp;',
	$col=''
);

$select_book_cnt = html_options( 
	$op_arr = $book_cnt_options,
	$selected= $dsp[ 'book_cnt' ]
);

// ログインしている場合
if ( $login_flg == 1 ) {


$contents = <<<EOD
<h2>出版物購入の申込</h2>
<div class="main_box">
<p style="color: #F00;font-weight: bold;">$err_msg</p>
<form method="POST" action="?mode=bookbuy&ID={$book_data[ 'book_id']}">
<table width="100%" border="0" cellpadding="0" cellspacing="3" class="entry">
<tr>
<th>分類</th>
<td>{$book_genre_options[ $book_data[ 'book_genre'] ]}</td>
</tr>
<tr>
<th>タイトル</th>
<td>{$book_data[ 'book_name']}</td>
</tr>
<tr>
<th>発行年</th>
<td>{$book_data[ 'book_year']}</td>
</tr>
<tr>
<th>定価</th>
<td>{$book_data[ 'book_price1']}</td>
</tr>
<tr>
<th>会員価格</th>
<td>{$book_data[ 'book_price2']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>部数</th>
<td><select name="book_cnt">$select_book_cnt</select></td>
</tr>

<tr>
<th><span class="fc_red">※</span>申込者氏名</th>
<td>{$dsp[ 'member_name']}</td>
</tr>
<tr>
<tr>
<th><span class="fc_red">※</span>勤務先／学校名・所属<br />
<span class="fs10">（全角）</span></th>
<td> 勤務先／学校名
<input type="text" name="belong1" size="30" value="{$dsp[ 'member_info01']}" />
<br />
所属
<input type="text" name="belong2" size="30" value="{$dsp[ 'member_info02']}" /></td>
</tr>
<tr>
<tr>
<th><span class="fc_red">※</span>住所<br />
<span class="fs10">（全角、数字は半角）</span></th>
<td> 〒
<input size="3" type="text" name="zip1" maxlength="3" value="{$dsp[ 'member_zip1']}" />
-
<input size="4" type="text" name="zip2" maxlength="4" value="{$dsp[ 'member_zip2']}" />
<br />
<input type="text" name="address" size="40" value="{$dsp[ 'member_address']}" /></td>
</tr>

<tr>
<th><span class="fc_red">※</span>メールアドレス<br />
<span class="fs10">（半角英数）</span></th>
<td><input type="text" name="mail" size="30" style="ime-mode:disabled;" value="{$dsp[ 'member_mail']}" /></td>
</tr>
<tr>
<th><span class="fc_red">※</span>電話番号<br />
<span class="fs10">（半角数字）</span></th>
<td><input type="text" name="tel" size="30" value="{$dsp[ 'member_tel']}" />
例：03-3538-0232</td>
</tr>

</table>
<div class="line"></div>
<div class="alignC">
内容を充分にご確認の上、購入ボタンを押して下さい。<br />
<input name="BOOK_BUY" type="submit" value="　購　入　" />　<input name="BACK" type="submit" value="　戻る　" />
<input type="hidden" name="book_id" value="{$book_data[ 'book_id']}" />
</div>
<input type="hidden" name="kubun" value="{$dsp[ 'member_kubun01' ]}" />
<input type="hidden" name="name" value="{$dsp[ 'member_name' ]}" />
</form>
</div>
EOD;


// ログインしていない場合
} else {



$contents = <<<EOD
<h2>出版物購入の申込</h2>
<div class="main_box">
<p style="color: #F00;font-weight: bold;">学会員の方でインターネットサービスを利用している人はログイン後に購入手続きを行ってください</p>
<p style="color: #F00;font-weight: bold;">$err_msg</p>
<form method="POST" action="?mode=bookbuy&ID={$book_data[ 'book_id']}">
<table width="100%" border="0" cellpadding="0" cellspacing="3" class="entry">
<tr>
<th>分類</th>
<td>{$book_genre_options[ $book_data[ 'book_genre'] ]}</td>
</tr>
<tr>
<th>タイトル</th>
<td>{$book_data[ 'book_name']}</td>
</tr>
<tr>
<th>発行年</th>
<td>{$book_data[ 'book_year']}</td>
</tr>
<tr>
<th>定価</th>
<td>{$book_data[ 'book_price1']}</td>
</tr>
<tr>
<th>会員価格</th>
<td>{$book_data[ 'book_price2']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>部数</th>
<td><select name="book_cnt">$select_book_cnt</select></td>
</tr>
<!--
<tr>
<th><span class="fc_red">※</span>会員番号<br />
<span class="fs10">「軽金属」送付袋参照</span></th>
<td><input type="text" name="userid" size="30" value="{$dsp[ 'member_userid']}" />
例：123456(半角数字6桁)<br />※非会員の方は0を記入してください</td>
</tr>
-->
<tr>
<th><span class="fc_red">※</span>会員区分</th>
<td>$input_radio_1</td>
</tr>
<tr>
<th><span class="fc_red">※</span>申込者氏名</th>
<td><input type="text" name="name" size="30" value="{$dsp[ 'member_name']}" /></td>
</tr>
<tr>
<tr>
<th><span class="fc_red">※</span>勤務先／学校名・所属<br />
<span class="fs10">（全角）</span></th>
<td> 勤務先／学校名
<input type="text" name="belong1" size="30" value="{$dsp[ 'member_info01']}" />
<br />
所属
<input type="text" name="belong2" size="30" value="{$dsp[ 'member_info02']}" /></td>
</tr>
<tr>
<th><span class="fc_red">※</span>住所<br />
<span class="fs10">（全角、数字は半角）</span></th>
<td> 〒
<input size="3" type="text" name="zip1" maxlength="3" value="{$dsp[ 'member_zip1']}" />
-
<input size="4" type="text" name="zip2" maxlength="4" value="{$dsp[ 'member_zip2']}" />
<br />
<input type="text" name="address" size="40" value="{$dsp[ 'member_address']}" /></td>
</tr>

<tr>
<th><span class="fc_red">※</span>メールアドレス<br />
<span class="fs10">（半角英数）</span></th>
<td><input type="text" name="mail" size="30" style="ime-mode:disabled;" value="{$dsp[ 'member_mail']}" /></td>
</tr>
<tr>
<th><span class="fc_red">※</span>電話番号<br />
<span class="fs10">（半角数字）</span></th>
<td><input type="text" name="tel" size="30" value="{$dsp[ 'member_tel']}" />
例：03-3538-0232</td>
</tr>

</table>
<div class="line"></div>
<div class="alignC">
内容を充分にご確認の上、購入ボタンを押して下さい。<br />
<input name="BOOK_BUY" type="submit" value="　購　入　" />　<input name="BACK" type="submit" value="　戻る　" />
<input type="hidden" name="book_id" value="{$book_data[ 'book_id']}" />
</div>
</form>
</div>
EOD;


}

	$class = ''
. '<li>出版物</li>' . "\n"
. '<li>購入</li>' . "\n";

?>