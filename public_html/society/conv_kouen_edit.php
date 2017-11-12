<?php
//***********************************************************************
//  大会　講演申込編集　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_conv_kouen_edit.php" );

$radio_kouen_keishiki = html_radios(
	$op_arr = $kouen_keishiki_options,
	$selected = $dsp[ 'kouen_keishiki' ],
	$op_name = 'ko_keishiki',
	$separator='&nbsp;',
	$col=''
);

$radio_kouen_hapyo_uid = html_radios(
			$op_arr = $kouen_hapyo_uid_options,
			$selected = $dsp['kouen_hapyo_uid'],
			$op_name='kouen_hapyo_uid',
			$separator='　',
			$col=''
);

/* 新講演形式 */
$radio_kouen_head = html_radios(
			$op_arr = $kouen_head_options,
			$selected = $dsp['kouen_head'],
			$op_name='kouen_head',
			$separator='<br>',
			$col=''
);

$radio_kouen_section_head = html_radios(
			$op_arr = $CONFIG_TYPE_SECTION_HEAD,
			$selected = $dsp['kouen_section_head'],
			$op_name='kouen_section_head',
			$separator='<br>',
			$col=''
);

$radio_kouen_section_head_1 = html_radios(
			$op_arr = $CONFIG_TYPE_SECTION_HEAD_1,
			$selected = $dsp['kouen_section_head_1'],
			$op_name='kouen_section_head_1',
			$separator='<br>',
			$col=''
);

$radio_kouen_section_head_2 = html_radios(
			$op_arr = $CONFIG_TYPE_SECTION_HEAD_2,
			$selected = $dsp['kouen_section_head_2'],
			$op_name='kouen_section_head_2',
			$separator='<br>',
			$col=''
);

$radio_kouen_section_head_3 = html_radios(
			$op_arr = $CONFIG_TYPE_SECTION_HEAD_3,
			$selected = $dsp['kouen_section_head_3'],
			$op_name='kouen_section_head_3',
			$separator='<br>',
			$col=''
);

$radio_kouen_section_head_4 = html_radios(
			$op_arr = $CONFIG_TYPE_SECTION_HEAD_4,
			$selected = $dsp['kouen_section_head_4'],
			$op_name='kouen_section_head_4',
			$separator='<br>',
			$col=''
);

$radio_kouen_section_head_5 = html_radios(
			$op_arr = $CONFIG_TYPE_SECTION_HEAD_5,
			$selected = $dsp['kouen_section_head_5'],
			$op_name='kouen_section_head_5',
			$separator='<br>',
			$col=''
);

$select_kouen_type = html_options(
			$op_arr = $kouen_type_options,
			$selected = $dsp['kouen_type']
		);

$select_memmber_kubun = html_options(
			$op_arr = $member_kubun_options,
			$selected = $dsp['kouen_kubun01']
		);

for( $i=0;$i<8;$i++ ) {
	$select_hapyo[$i] = html_options(
			$op_arr   = $hapyo_options,
			$selected = $dsp['member_hapyo'][$i]
	);
	$select_kubun[$i] = html_options(
			$op_arr   = $member_kubun_options_kouen,
			$selected = $dsp['member_kubun01'][$i]
	);
}

$input_radio_2 = html_radios(
	$op_arr = $pay_way_type,
	$selected = $dsp[ 'pay_way' ],
	$op_name = 'shiharai',
	$separator='&nbsp;',
	$col=''
);

// ログイン状態の確認
if ( $login_flg == 1 ) {

	// 講演申込み期間かどうかチェックする
	$date_flg = convention_Date_Check( 'kouen' );
	
	// 開催期間中の場合
	if ( $date_flg ) {

		// 申込の存在チェック
		$exist_flg = kouensya_Data_Userid_Double_Check( $dsp[ 'kouen_userid'], $dsp['convention_id'] );

		// 存在していた場合
		if ( $exist_flg ) {

			$contents = <<<EOF
<form method="POST" action="{$action}">
<h2>講演申込 編集</h2>
<div class="main_box">
<h3>講演申込入力フォーム</h3>
<p style="color: #F00;font-weight: bold;">$err_msg</p>
<table width="100%" border="0" cellpadding="0" cellspacing="3" class="entry">
<!--
<tr>
<th><span class="fc_red">※</span>講演形式</th>
<td>$radio_kouen_keishiki</td>
</tr>
<tr>
<th><span class="fc_red">※</span>講演分類</th>
<td><select name="ko_type">$select_kouen_type</select></td>
</tr>
-->
<tr>
<script><!--
$(document).ready(function(){
	$("input[name='kouen_head']:radio").change(function(){
    if ($(this).val() == 1 || $(this).val() == 3) {
    	if (!$('.ajax_open_conv_head').is(':visible')) {
    		$('.ajax_open_conv_head').show();
    	}
    } else {
    	if ($('.ajax_open_conv_head').is(':visible')) {
    		$('.ajax_open_conv_head').hide();
    	}
    }
  });
});
//-->
</script>
<tr>
<th><span class="fc_red">※</span>講演形式</th>
<td>
{$radio_kouen_head}
</td>
<tr>
<tr class="ajax_open_conv_head" style="{$subwindow_style}">
<th><span class="fc_red">※</span>講演分類</th>
<td>
■大分類・対象材料<br>
{$radio_kouen_section_head}<br>
■小分類1・用途<br>
{$radio_kouen_section_head_1}<br>
■小分類2・現象<br>
{$radio_kouen_section_head_2}<br>
■小分類3・検出・解析方法<br>
{$radio_kouen_section_head_3}<br>
■小分類4・目的<br>
{$radio_kouen_section_head_4}<br>
■小分類5・材料形状<br>
{$radio_kouen_section_head_5}<br>
</td>
</tr>
<th><span class="fc_red">※</span>和文題目</th>
<td><input type="text" name="ko_title" size="40" value="{$dsp[ 'kouen_title']}" /><br />
	40字程度。飾り文字（上付，下付，イタリックなど）を使用の場合は，備考欄に記入
</td>
</tr>
<tr>
<th><span class="fc_red">※</span>英文題目</th>
<td><input type="text" name="ko_title_eng" size="40" value="{$dsp[ 'kouen_title_eng']}" /><br />
	行頭以外は，略語，固有名詞を除き，すべて小文字で入力
</td>
</tr>
<tr>
<th><span class="fc_red">※</span>講演要旨<br />200字以内</th>
<td><textarea name="ko_cmnt1" cols="70" rows="8">{$dsp[ 'kouen_cmnt1']}</textarea></td>
</tr>
<tr>
<th><span class="fc_red">※</span>発表するのは何番目の方ですか？</th>
<td>{$radio_kouen_hapyo_uid}</td>
</tr>

<script><!--
$(document).ready(function(){
  $('#dropdown_1').click(function(){
    $('#dropdown_1_contents').slideToggle('slow');
	$('#dropdown_1').hide('slow');
  });
  $('#dropdown_2').click(function(){
    $('#dropdown_2_contents').slideToggle('slow');
	$('#dropdown_2').hide('slow');
  });
  $('#dropdown_3').click(function(){
    $('#dropdown_3_contents').slideToggle('slow');
	$('#dropdown_3').hide('slow');
  });
  $('#dropdown_4').click(function(){
    $('#dropdown_4_contents').slideToggle('slow');
	$('#dropdown_4').hide('slow');
  });
  $('#dropdown_5').click(function(){
    $('#dropdown_5_contents').slideToggle('slow');
	$('#dropdown_5').hide('slow');
  });
  $('#dropdown_6').click(function(){
    $('#dropdown_6_contents').slideToggle('slow');
	$('#dropdown_6').hide('slow');
  });
  $('#dropdown_7').click(function(){
    $('#dropdown_7_contents').slideToggle('slow');
	$('#dropdown_7').hide('slow');
  });
});
//-->
</script>
<tr>
<th>研究者1</th>
<td>
	会員番号：<input type="text" name="k_userid[]" size="30" value="{$dsp['member_userid'][0]}" />&nbsp;例：123456(半角数字6桁)<br />
	会員区分：<select name="k_kubun[]"><option value="">---</option>$select_kubun[0]</select>&nbsp;<br />
	　　氏名：<input type="text" name="k_name[]" size="30" value="{$dsp['member_name'][0]}" />&nbsp;姓と名の間に一字あけない　例：軽金属太郎<br />
	ローマ字：<input type="text" name="k_name_eng[]" size="30" value="{$dsp['member_name_eng'][0]}" />&nbsp;半角　　例：T.Keikinzoku<br />
	　　所属：<input type="text" name="k_info01[]" size="30" value="{$dsp['member_info01'][0]}" />&nbsp;7文字以内に略記，<br />
	　　　　　　学部学生は○○大（学），大学院生は○○大（院）と所属機関の後に明記<br />
<!--	　　発表：<select name="k_hapyo[]"><option value="">---</option>$select_hapyo[0]</select>&nbsp;<br />-->
</td>
</tr>
<tr>
<th>研究者2</th>
<td>{$link_display_none[0]}
	<div id="dropdown_1_contents" {$css_display_none[1]}>
	<span class="fs10">入力される場合は氏名は必ず入力してください</span><br />
	会員番号：<input type="text" name="k_userid[]" size="30" value="{$dsp['member_userid'][1]}" />&nbsp;例：123456(半角数字6桁)<br />
	会員区分：<select name="k_kubun[]"><option value="">---</option>$select_kubun[1]</select>&nbsp;<br />
	　　氏名：<input type="text" name="k_name[]" size="30" value="{$dsp['member_name'][1]}" />&nbsp;姓と名の間に一字あけない　例：軽金属太郎<br />
	ローマ字：<input type="text" name="k_name_eng[]" size="30" value="{$dsp['member_name_eng'][1]}" />&nbsp;半角　　例：T.Keikinzoku<br />
	　　所属：<input type="text" name="k_info01[]" size="30" value="{$dsp['member_info01'][1]}" />&nbsp;7文字以内に略記，<br />
	　　　　　　学部学生は○○大（学），大学院生は○○大（院）と所属機関の後に明記<br />
<!--	　　発表：<select name="k_hapyo[]"><option value="">---</option>$select_hapyo[1]</select>&nbsp;<br />-->
	</div>
</td>
</tr>
<tr>
<th>研究者3</th>
<td>{$link_display_none[1]}
	<div id="dropdown_2_contents" {$css_display_none[2]}>
	<span class="fs10">入力される場合は氏名は必ず入力してください</span><br />
	会員番号：<input type="text" name="k_userid[]" size="30" value="{$dsp['member_userid'][2]}" />&nbsp;例：123456(半角数字6桁)<br />
	会員区分：<select name="k_kubun[]"><option value="">---</option>$select_kubun[2]</select>&nbsp;<br />
	　　氏名：<input type="text" name="k_name[]" size="30" value="{$dsp['member_name'][2]}" />&nbsp;姓と名の間に一字あけない　例：軽金属太郎<br />
	ローマ字：<input type="text" name="k_name_eng[]" size="30" value="{$dsp['member_name_eng'][2]}" />&nbsp;半角　　例：T.Keikinzoku<br />
	　　所属：<input type="text" name="k_info01[]" size="30" value="{$dsp['member_info01'][2]}" />&nbsp;7文字以内に略記，<br />
	　　　　　　学部学生は○○大（学），大学院生は○○大（院）と所属機関の後に明記<br />
<!--	　　発表：<select name="k_hapyo[]"><option value="">---</option>$select_hapyo[2]</select>&nbsp;<br />-->
	</div>
</td>
</tr>
<tr>
<th>研究者4</th>
<td>{$link_display_none[2]}
	<div id="dropdown_3_contents" {$css_display_none[3]}>
	<span class="fs10">入力される場合は氏名は必ず入力してください</span><br />
	会員番号：<input type="text" name="k_userid[]" size="30" value="{$dsp['member_userid'][3]}" />&nbsp;例：123456(半角数字6桁)<br />
	会員区分：<select name="k_kubun[]"><option value="">---</option>$select_kubun[3]</select>&nbsp;<br />
	　　氏名：<input type="text" name="k_name[]" size="30" value="{$dsp['member_name'][3]}" />&nbsp;姓と名の間に一字あけない　例：軽金属太郎<br />
	ローマ字：<input type="text" name="k_name_eng[]" size="30" value="{$dsp['member_name_eng'][3]}" />&nbsp;半角　　例：T.Keikinzoku<br />
	　　所属：<input type="text" name="k_info01[]" size="30" value="{$dsp['member_info01'][3]}" />&nbsp;7文字以内に略記，<br />
	　　　　　　学部学生は○○大（学），大学院生は○○大（院）と所属機関の後に明記<br />
<!--	　　発表：<select name="k_hapyo[]"><option value="">---</option>$select_hapyo[3]</select>&nbsp;<br />-->
	</div>
</td>
</tr>
<tr>
<th>研究者5</th>
<td>{$link_display_none[3]}
	<div id="dropdown_4_contents" {$css_display_none[4]}>
	<span class="fs10">入力される場合は氏名は必ず入力してください</span><br />
	会員番号：<input type="text" name="k_userid[]" size="30" value="{$dsp['member_userid'][4]}" />&nbsp;例：123456(半角数字6桁)<br />
	会員区分：<select name="k_kubun[]"><option value="">---</option>$select_kubun[4]</select>&nbsp;<br />
	　　氏名：<input type="text" name="k_name[]" size="30" value="{$dsp['member_name'][4]}" />&nbsp;姓と名の間に一字あけない　例：軽金属太郎<br />
	ローマ字：<input type="text" name="k_name_eng[]" size="30" value="{$dsp['member_name_eng'][4]}" />&nbsp;半角　　例：T.Keikinzoku<br />
	　　所属：<input type="text" name="k_info01[]" size="30" value="{$dsp['member_info01'][4]}" />&nbsp;7文字以内に略記，<br />
	　　　　　　学部学生は○○大（学），大学院生は○○大（院）と所属機関の後に明記<br />
<!--	　　発表：<select name="k_hapyo[]"><option value="">---</option>$select_hapyo[4]</select>&nbsp;<br />-->
	</div>
</td>
</tr>
<tr>
<th>研究者6</th>
<td>{$link_display_none[4]}
	<div id="dropdown_5_contents" {$css_display_none[5]}>
	<span class="fs10">入力される場合は氏名は必ず入力してください</span><br />
	会員番号：<input type="text" name="k_userid[]" size="30" value="{$dsp['member_userid'][5]}" />&nbsp;例：123456(半角数字6桁)<br />
	会員区分：<select name="k_kubun[]"><option value="">---</option>$select_kubun[5]</select>&nbsp;<br />
	　　氏名：<input type="text" name="k_name[]" size="30" value="{$dsp['member_name'][5]}" />&nbsp;姓と名の間に一字あけない　例：軽金属太郎<br />
	ローマ字：<input type="text" name="k_name_eng[]" size="30" value="{$dsp['member_name_eng'][5]}" />&nbsp;半角　　例：T.Keikinzoku<br />
	　　所属：<input type="text" name="k_info01[]" size="30" value="{$dsp['member_info01'][5]}" />&nbsp;7文字以内に略記，<br />
	　　　　　　学部学生は○○大（学），大学院生は○○大（院）と所属機関の後に明記<br />
<!--	　　発表：<select name="k_hapyo[]"><option value="">---</option>$select_hapyo[5]</select>&nbsp;<br />-->
	</div>
</td>
</tr>
<tr>
<th>研究者7</th>
<td>{$link_display_none[5]}
	<div id="dropdown_6_contents" {$css_display_none[6]}>
	<span class="fs10">入力される場合は氏名は必ず入力してください</span><br />
	会員番号：<input type="text" name="k_userid[]" size="30" value="{$dsp['member_userid'][6]}" />&nbsp;例：123456(半角数字6桁)<br />
	会員区分：<select name="k_kubun[]"><option value="">---</option>$select_kubun[6]</select>&nbsp;<br />
	　　氏名：<input type="text" name="k_name[]" size="30" value="{$dsp['member_name'][6]}" />&nbsp;姓と名の間に一字あけない　例：軽金属太郎<br />
	ローマ字：<input type="text" name="k_name_eng[]" size="30" value="{$dsp['member_name_eng'][6]}" />&nbsp;半角　　例：T.Keikinzoku<br />
	　　所属：<input type="text" name="k_info01[]" size="30" value="{$dsp['member_info01'][6]}" />&nbsp;7文字以内に略記，<br />
	　　　　　　学部学生は○○大（学），大学院生は○○大（院）と所属機関の後に明記<br />
<!--	　　発表：<select name="k_hapyo[]"><option value="">---</option>$select_hapyo[6]</select>&nbsp;<br />-->
	</div>
</td>
</tr>
<tr>
<th>研究者8</th>
<td>{$link_display_none[6]}
	<div id="dropdown_7_contents" {$css_display_none[7]}>
	<span class="fs10">入力される場合は氏名は必ず入力してください</span><br />
	会員番号：<input type="text" name="k_userid[]" size="30" value="{$dsp['member_userid'][7]}" />&nbsp;例：123456(半角数字6桁)<br />
	会員区分：<select name="k_kubun[]"><option value="">---</option>$select_kubun[7]</select>&nbsp;<br />
	　　氏名：<input type="text" name="k_name[]" size="30" value="{$dsp['member_name'][7]}" />&nbsp;姓と名の間に一字あけない　例：軽金属太郎<br />
	ローマ字：<input type="text" name="k_name_eng[]" size="30" value="{$dsp['member_name_eng'][7]}" />&nbsp;半角　　例：T.Keikinzoku<br />
	　　所属：<input type="text" name="k_info01[]" size="30" value="{$dsp['member_info01'][7]}" />&nbsp;7文字以内に略記，<br />
	　　　　　　学部学生は○○大（学），大学院生は○○大（院）と所属機関の後に明記<br />
<!--	　　発表：<select name="k_hapyo[]"><option value="">---</option>$select_hapyo[7]</select>&nbsp;<br />-->
	</div>
</td>
</tr>

<tr>
<th>備考<br />(飾り文字については「Al2O3の2と3は下付」のように記入)</th>
<td><textarea name="ko_biko1" cols="70" rows="8" id="bikou">{$dsp[ 'kouen_biko1']}</textarea></td>
</tr>

<tr>
<td colspan="2"><div class="alignC"><strong>申込者情報</strong></div></td>
</tr>

<tr>
<th>会員区分</th>
<td>{$member_kubun_options[$dsp[ 'kouen_kubun01']]}</td>
</tr>

<tr>
<th>会員番号</th>
<td>{$dsp[ 'kouen_userid']}</td>
</tr>

<tr>
<th>会員氏名</th>
<td>{$dsp[ 'kouen_name']}</td>
</tr>

<tr>
<th>メールアドレス</th>
<td>{$dsp[ 'kouen_mail']}</td>
</tr>
<tr>
<th><span class="fc_red">※</span>勤務先/学校名・所属</th>
<td><input type="text" name="info01" size="30" value="{$dsp[ 'kouen_info01']}" /></td>
</tr>

<tr>
<th><span class="fc_red">※</span>電話番号<br />
<span class="fs10">（半角数字）</span></th>
<td><input type="text" name="tel" size="30" value="{$dsp[ 'kouen_tel']}" />
例：03-3538-0232</td>
</tr>
<tr>
<th>FAX番号<br />
<span class="fs10">（半角数字）</span></th>
<td><input type="text" name="fax" size="30" value="{$dsp[ 'kouen_fax']}" />
例：03-3538-0226</td>
</tr>
<tr>
<th><span class="fc_red">※</span>所属住所<br />
<span class="fs10">（全角、数字は半角）</span></th>
<td> 〒
<input size="3" type="text" name="zip1" maxlength="3" value="{$dsp[ 'kouen_zip1']}" />
-
<input size="4" type="text" name="zip2" maxlength="4" value="{$dsp[ 'kouen_zip2']}" />
<br />
<input type="text" name="address" size="40" value="{$dsp[ 'kouen_address']}" /></td>
</tr>
<tr>
<th><span class="fc_red">※</span>講演発表登録料<br />支払方法</th>
<td>$input_radio_2</td>
</tr>

<input type="hidden" name="kubun01" value="{$dsp[ 'kouen_kubun01']}" />
<input type="hidden" name="userid" value="{$dsp[ 'kouen_userid']}" />
<input type="hidden" name="name" value="{$dsp[ 'kouen_name']}" />
<input type="hidden" name="mail" value="{$dsp[ 'kouen_mail']}" />


</table>
<div class="line"></div>
<div class="alignC">
<br />
<input name="CONV_KOUEN_CONFIRM" type="submit" value="　確 認　" />　<!--<input name="RESET" type="submit" value="　リセット　" />-->
<input type="hidden" name="convention_id" value="{$dsp['convention_id']}">
<input type="hidden" name="kouen_uid" value="{$dsp['kouen_uid']}">
</div>
</div>
</form>
EOF;

		// 存在していない場合
		} else {

			$contents = <<<EOF
<h2>講演申込</h2>
<div class="main_box">
申込が登録されていません。
</div>
EOF;

		}



	// 開催期間外の場合->期間外テキスト
	} else {

		$contents = <<<EOF
<h2>講演申込</h2>
<div class="main_box">
只今 講演申込みは受付しておりません。
</div>
EOF;

	}

// ログインしていない場合
} else {

	$contents = <<<EOF
<h2>講演申込</h2>
<div class="main_box">
ログインしてください。
</div>
EOF;

}

?>