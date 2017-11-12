<?php
//***********************************************************************
//  大会　講演申込　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_conv_kouen_entry_confirm.php" );

// 出力整形
$dsp[ 'kouen_cmnt1'] = nl2br( $dsp[ 'kouen_cmnt1'] );

$contents = <<<EOD
<form method="POST" action="{$action}">
<h2>講演申込</h2>
<div class="main_box">
<h3>講演申込入力フォーム</h3>
<p style="color: #F00;font-weight: bold;">$err_msg</p>
<table width="100%" border="0" cellpadding="0" cellspacing="3" class="entry">
<!--<tr>
<th><span class="fc_red">※</span>講演形式</th>
<td>{$kouen_keishiki_options[ $dsp['kouen_keishiki'] ]}</td>
</tr>-->
<tr>
<th><span class="fc_red">※</span>講演形式</th>
<td>{$kouen_head_options[ $dsp['kouen_head'] ]}</td>
</tr>
<!--<tr>
<th><span class="fc_red">※</span>講演分類</th>
<td>{$kouen_type_options[ $dsp['kouen_type'] ]}</td>
</tr>-->
<tr style="{$kouen_section_style}">
<th><span class="fc_red">※</span>講演分類</th>
<td>
[大分類・対象材料]<br>
&raquo;&nbsp;{$CONFIG_TYPE_SECTION_HEAD[ $dsp['kouen_section_head'] ]}<br>
[小分類1・用途]<br>
&raquo;&nbsp;{$CONFIG_TYPE_SECTION_HEAD_1[ $dsp['kouen_section_head_1'] ]}<br>
[小分類2・現象]<br>
&raquo;&nbsp;{$CONFIG_TYPE_SECTION_HEAD_2[ $dsp['kouen_section_head_2'] ]}<br>
[小分類3・検出・解析方法]<br>
&raquo;&nbsp;{$CONFIG_TYPE_SECTION_HEAD_3[ $dsp['kouen_section_head_3'] ]}<br>
[小分類4・目的]<br>
&raquo;&nbsp;{$CONFIG_TYPE_SECTION_HEAD_4[ $dsp['kouen_section_head_4'] ]}<br>
[小分類5・材料形状]<br>
&raquo;&nbsp;{$CONFIG_TYPE_SECTION_HEAD_5[ $dsp['kouen_section_head_5'] ]}<br>
</td>
</tr>
<tr>
<th><span class="fc_red">※</span>和文題目</th>
<td>{$dsp[ 'kouen_title']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>英文題目</th>
<td>{$dsp[ 'kouen_title_eng']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>講演要旨</th>
<td>{$dsp[ 'kouen_cmnt1']}</td>
</tr>

<tr>
<th><span class="fc_red">※</span>発表者</th>
<td>{$kouen_hapyo_uid_options[$dsp['kouen_hapyo_uid']]}</td>
</tr>

<tr>
<th>研究者1</th>
<td>
	会員番号：{$dsp['member_userid'][0]}<br />
	会員区分：{$member_kubun_options[$dsp['member_kubun01'][0]]}<br />
	　　氏名：{$dsp['member_name'][0]}<br />
	ローマ字：{$dsp['member_name_eng'][0]}<br />
	　　所属：{$dsp['member_info01'][0]}<br />
<!--	　　発表：{$hapyo_options[ $dsp['member_hapyo'][0]]}<br />-->
</td>
</tr>
<tr>
<th>研究者2</th>
<td>
	会員番号：{$dsp['member_userid'][1]}<br />
	会員区分：{$member_kubun_options[$dsp['member_kubun01'][1]]}<br />
	　　氏名：{$dsp['member_name'][1]}<br />
	ローマ字：{$dsp['member_name_eng'][1]}<br />
	　　所属：{$dsp['member_info01'][1]}<br />
<!--	　　発表：{$hapyo_options[ $dsp['member_hapyo'][1]]}<br />-->
</td>
</tr>
<tr>
<th>研究者3</th>
<td>
	会員番号：{$dsp['member_userid'][2]}<br />
	会員区分：{$member_kubun_options[$dsp['member_kubun01'][2]]}<br />
	　　氏名：{$dsp['member_name'][2]}<br />
	ローマ字：{$dsp['member_name_eng'][2]}<br />
	　　所属：{$dsp['member_info01'][2]}<br />
<!--	　　発表：{$hapyo_options[ $dsp['member_hapyo'][2]]}<br />-->
</td>
</tr>
<tr>
<th>研究者4</th>
<td>
	会員番号：{$dsp['member_userid'][3]}<br />
	会員区分：{$member_kubun_options[$dsp['member_kubun01'][3]]}<br />
	　　氏名：{$dsp['member_name'][3]}<br />
	ローマ字：{$dsp['member_name_eng'][3]}<br />
	　　所属：{$dsp['member_info01'][3]}<br />
<!--	　　発表：{$hapyo_options[ $dsp['member_hapyo'][3]]}<br />-->
</td>
</tr>
<tr>
<th>研究者5</th>
<td>
	会員番号：{$dsp['member_userid'][4]}<br />
	会員区分：{$member_kubun_options[$dsp['member_kubun01'][4]]}<br />
	　　氏名：{$dsp['member_name'][4]}<br />
	ローマ字：{$dsp['member_name_eng'][4]}<br />
	　　所属：{$dsp['member_info01'][4]}<br />
<!--	　　発表：{$hapyo_options[ $dsp['member_hapyo'][4]]}<br />-->
</td>
</tr>
<tr>
<th>研究者6</th>
<td>
	会員番号：{$dsp['member_userid'][5]}<br />
	会員区分：{$member_kubun_options[$dsp['member_kubun01'][5]]}<br />
	　　氏名：{$dsp['member_name'][5]}<br />
	ローマ字：{$dsp['member_name_eng'][5]}<br />
	　　所属：{$dsp['member_info01'][5]}<br />
<!--	　　発表：{$hapyo_options[ $dsp['member_hapyo'][5]]}<br />-->
</td>
</tr>
<tr>
<th>研究者7</th>
<td>
	会員番号：{$dsp['member_userid'][6]}<br />
	会員区分：{$member_kubun_options[$dsp['member_kubun01'][6]]}<br />
	　　氏名：{$dsp['member_name'][6]}<br />
	ローマ字：{$dsp['member_name_eng'][6]}<br />
	　　所属：{$dsp['member_info01'][6]}<br />
<!--	　　発表：{$hapyo_options[ $dsp['member_hapyo'][6]]}<br />-->
</td>
</tr>
<tr>
<th>研究者8</th>
<td>
	会員番号：{$dsp['member_userid'][7]}<br />
	会員区分：{$member_kubun_options[$dsp['member_kubun01'][7]]}<br />
	　　氏名：{$dsp['member_name'][7]}<br />
	ローマ字：{$dsp['member_name_eng'][7]}<br />
	　　所属：{$dsp['member_info01'][7]}<br />
<!--	　　発表：{$hapyo_options[ $dsp['member_hapyo'][7]]}<br />-->
</td>
</tr>
<tr>
<th>備考 </th>
<td>{$dsp[ 'kouen_biko1']}</td>
</tr>

<tr>
<td colspan="2"><div class="alignC"><strong>申込者情報</strong></div></td>
</tr>

<tr>
<th><span class="fc_red">※</span>会員区分</th>
<td>{$member_kubun_options[$dsp[ 'kouen_kubun01']]}</td>
</tr>

<tr>
<th><span class="fc_red">※</span>会員番号</th>
<td>{$dsp[ 'kouen_userid']}</td>
</tr>

<tr>
<th><span class="fc_red">※</span>会員氏名</th>
<td>{$dsp[ 'kouen_name']}</td>
</tr>


<tr>
<th><span class="fc_red">※</span>メールアドレス<br />
<span class="fs10">（半角英数）</span></th>
<td>{$dsp[ 'kouen_mail']}</td>
</tr>

<tr>
<th><span class="fc_red">※</span>勤務先/学校名・所属</th>
<td>{$dsp[ 'kouen_info01']}</td>
</tr>

<tr>
<th><span class="fc_red">※</span>電話番号<br />
<span class="fs10">（半角数字）</span></th>
<td>{$dsp[ 'kouen_tel']}</td>
</tr>
<tr>
<th>FAX番号<br />
<span class="fs10">（半角数字）</span></th>
<td>{$dsp[ 'kouen_fax']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>所属住所<br />
<span class="fs10">（全角、数字は半角）</span></th>
<td> 〒{$dsp[ 'kouen_zip1']}-{$dsp[ 'kouen_zip2']}<br />{$dsp[ 'kouen_address']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>講演発表登録料<br />支払方法</th>
<td>{$pay_way_type[ $dsp['pay_way']]}</td>
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