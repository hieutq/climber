<?php
//***********************************************************************
//  大会　参加申込　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_conv_sanka_entry_confirm.php" );

$contents = <<<EOD
<form method="POST" action="{$action}">
<h2>講演申込</h2>
<div class="main_box">
<h3>講演申込入力フォーム</h3>
<p style="color: #F00;font-weight: bold;">$err_msg</p>
<table width="100%" border="0" cellpadding="0" cellspacing="3" class="entry">
<tr>
<th><span class="fc_red">※</span>講演分類</th>
<td>{$kouen_type_options[ $dsp['kouen_type'] ]}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>講演題目</th>
<td>{$dsp[ 'kouen_title']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>講演題目（英文）</th>
<td>{$dsp[ 'kouen_title_eng']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>講演要旨</th>
<td>{$dsp[ 'kouen_cmnt1']}</td>
</tr>


<tr>
<th><span class="fc_red">※</span>メールアドレス<br />
<span class="fs10">（半角英数）</span></th>
<td>{$dsp[ 'kouen_mail']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>連絡先電話番号<br />
<span class="fs10">（半角数字）</span></th>
<td>{$dsp[ 'kouen_tel']}</td>
</tr>
<tr>
<th>連絡先FAX番号<br />
<span class="fs10">（半角数字）</span></th>
<td>{$dsp[ 'kouen_fax']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>連絡先住所<br />
<span class="fs10">（全角、数字は半角）</span></th>
<td> 〒{$dsp[ 'kouen_zip1']}-{$dsp[ 'kouen_zip2']}<br />{$dsp[ 'kouen_address']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>宛名</th>
<td>{$dsp[ 'kouen_send_name']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>申込リスト1<br />
<span class="fs10">一人目が代表者となります</span></th>
<td>
	会員番号：{$dsp['member_userid'][0]}<br />
	　　氏名：{$dsp['member_name'][0]}<br />
	ローマ字：{$dsp['member_name_eng'][0]}<br />
	　　所属：{$dsp['member_info01'][0]}<br />
	　　発表：{$hapyo_options[ $dsp['member_hapyo'][0]]}<br />
</td>
</tr>
<tr>
<th>申込リスト2</th>
<td>
	会員番号：{$dsp['member_userid'][1]}<br />
	　　氏名：{$dsp['member_name'][1]}<br />
	ローマ字：{$dsp['member_name_eng'][1]}<br />
	　　所属：{$dsp['member_info01'][1]}<br />
	　　発表：{$hapyo_options[ $dsp['member_hapyo'][1]]}<br />
</td>
</tr>
<tr>
<th>申込リスト3</th>
<td>
	会員番号：{$dsp['member_userid'][2]}<br />
	　　氏名：{$dsp['member_name'][2]}<br />
	ローマ字：{$dsp['member_name_eng'][2]}<br />
	　　所属：{$dsp['member_info01'][2]}<br />
	　　発表：{$hapyo_options[ $dsp['member_hapyo'][2]]}<br />
</td>
</tr>
<tr>
<th>申込リスト4</th>
<td>
	会員番号：{$dsp['member_userid'][3]}<br />
	　　氏名：{$dsp['member_name'][3]}<br />
	ローマ字：{$dsp['member_name_eng'][3]}<br />
	　　所属：{$dsp['member_info01'][3]}<br />
	　　発表：{$hapyo_options[ $dsp['member_hapyo'][3]]}<br />
</td>
</tr>
<tr>
<th>申込リスト5</th>
<td>
	会員番号：{$dsp['member_userid'][4]}<br />
	　　氏名：{$dsp['member_name'][4]}<br />
	ローマ字：{$dsp['member_name_eng'][4]}<br />
	　　所属：{$dsp['member_info01'][4]}<br />
	　　発表：{$hapyo_options[ $dsp['member_hapyo'][4]]}<br />
</td>
</tr>
<tr>
<th>申込リスト6</th>
<td>
	会員番号：{$dsp['member_userid'][5]}<br />
	　　氏名：{$dsp['member_name'][5]}<br />
	ローマ字：{$dsp['member_name_eng'][5]}<br />
	　　所属：{$dsp['member_info01'][5]}<br />
	　　発表：{$hapyo_options[ $dsp['member_hapyo'][5]]}<br />
</td>
</tr>
<tr>
<th>申込リスト7</th>
<td>
	会員番号：{$dsp['member_userid'][6]}<br />
	　　氏名：{$dsp['member_name'][6]}<br />
	ローマ字：{$dsp['member_name_eng'][6]}<br />
	　　所属：{$dsp['member_info01'][6]}<br />
	　　発表：{$hapyo_options[ $dsp['member_hapyo'][6]]}<br />
</td>
</tr>
<tr>
<th>申込リスト8</th>
<td>
	会員番号：{$dsp['member_userid'][7]}<br />
	　　氏名：{$dsp['member_name'][7]}<br />
	ローマ字：{$dsp['member_name_eng'][7]}<br />
	　　所属：{$dsp['member_info01'][7]}<br />
	　　発表：{$hapyo_options[ $dsp['member_hapyo'][7]]}<br />
</td>
</tr>

<tr>
<th><span class="fc_red">※</span>支払方法</th>
<td>{$pay_way_type[ $dsp['pay_way']]}</td>
</tr>
<tr>
<th>備考 </th>
<td>{$dsp[ 'kouen_biko1']}</td>
</tr>

</table>
<div class="line"></div>
<div class="alignC">
内容を充分にご確認の上、送信して下さい。<br />
<input name="CONV_KOUEN_SEND" type="submit" value="　送　信　" />　<input name="BACK" type="submit" value="　戻　る　" />
</div>
</div>
</form>
EOD;

	$class = ''
. '<li>講演大会・国際会議</li>' . "\n"
. '<li>講演大会</li>' . "\n"
. '<li>講演申込</li>' . "\n"
. '<li>確認</li>' . "\n";

include( "./templates/common_tmpl2.html" );
?>