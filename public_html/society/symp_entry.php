<?php
//***********************************************************************
//  シンポジウム詳細　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_symp_entry.php" );

$input_radio_1 = html_radios(
	$op_arr = $member_kubun01_type,
	$selected = $dsp[ 'member_kubun01' ],
	$op_name = 'kubun',
	$separator='&nbsp;',
	$col=''
);

$input_radio_2 = html_radios(
	$op_arr = $symp_pay_way_type,
	$selected = $dsp[ 'pay_way' ],
	$op_name = 'shiharai',
	$separator='&nbsp;',
	$col=''
);

$input_radio_3 = html_radios(
	$op_arr = $symp_pay_bill_type,
	$selected = $dsp[ 'pay_bill' ],
	$op_name = 'seikyusyo',
	$separator='&nbsp;',
	$col=''
);

$pay_play_y_options = html_options ( 
	$op_arr = $year_options,
	$selected= $dsp[ 'pay_date_plan_y' ]
);

$pay_play_m_options = html_options ( 
	$op_arr = $month_options,
	$selected= $dsp[ 'pay_date_plan_m' ]
);

$pay_play_d_options = html_options ( 
	$op_arr = $day_options,
	$selected= $dsp[ 'pay_date_plan_d' ]
);


// 参加申込み期間かどうかチェックする
$flg = symposium_Date_Check( $dsp[ 'symp_id'] );

// 開催期間中の場合->フォーム表示
if ( $flg ) {

	// ログインチェック
	if ( $login_flg == 1 ) {

$contents = <<<EOD
<script type="text/javascript"> 
<!-- 
function check(){
	if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示
		return true; // 「OK」時は送信を実行
	}
	else{ // 「キャンセル」時の処理
		return false; // 送信を中止
	}
}
// -->
</script>
<form method="POST" action="symp_entry.php" onSubmit="return check()">
<h2>参加申込</h2>
<div class="main_box">
<h3>{$dsp[ 'symp_name']}参加申込</h3>
<p style="color: #F00;font-weight: bold;">$err_msg</p>
<table width="100%" border="0" cellpadding="0" cellspacing="3" class="entry">
<tr>
<th>会員区分</th>
<td>{$member_kubun01_type[$dsp[ 'member_kubun01' ]]}</td>
</tr>
<!--
<tr>
<th>会員番号</th>
<td>{$dsp[ 'member_userid']}</td>
</tr>-->
<tr>
<th>会員氏名</th>
<td>{$dsp[ 'member_name']}</td>
</tr>
<tr>
<th>フリガナ</th>
<td>{$dsp[ 'member_kana']}</td>
</tr>
<tr>
<th>メールアドレス</th>
<td>{$dsp[ 'member_mail']}</td>
</tr>
<tr>
<th>勤務先／学校名・所属</th>
<td> 勤務先／学校名：&nbsp;{$dsp[ 'member_info01']}<br />所属：&nbsp;{$dsp[ 'member_info02']}</td>
</tr>
<tr>
<th>連絡先住所</th>
<td> 〒 {$dsp[ 'member_zip1']} - {$dsp[ 'member_zip2']}<br /> {$dsp[ 'member_address']}</td>
</tr>
<tr>
<th>電話番号</th>
<td>{$dsp[ 'member_tel']}</td>
</tr>
<tr>
<th>FAX番号</th>
<td>{$dsp[ 'member_fax']}</td>
</tr>

{$tag[ 'pay_way_view_commentOut_1' ]}
<tr>
<th>送金予定日</th>
<td>
<select name="pay_plan_y">$pay_play_y_options</select>年
<select name="pay_plan_m">$pay_play_m_options</select>月
<select name="pay_plan_d">$pay_play_d_options</select>日
</td>
</tr>
{$tag[ 'pay_way_view_commentOut_2' ]}

{$tag[ 'pay_way_view_commentOut_1' ]}
<tr>
<th>支払方法</th>
<td>{$input_radio_2}
</td>
</tr>
{$tag[ 'pay_way_view_commentOut_2' ]}

<tr>
<th>備考</th>
<td><textarea name="bikou" cols="70" rows="4" id="bikou">{$dsp[ 'sanka_biko1']}</textarea>
</td>
</tr>

{$tag[ 'pay_way_view_commentOut_1' ]}
<tr>
<th>請求書希望</th>
<td>$input_radio_3</td>
</tr>
{$tag[ 'pay_way_view_commentOut_2' ]}
<!--
<tr>
<th>紹介者名</th>
<td><input type="text" name="syoukai_name" size="30" value="{$dsp[ 'intro_name']}" /></td>
</tr>
<tr>
<th>紹介者勤務先/学校名</th>
<td>勤務先／学校名
<input type="text" name="syoukai_belong1" size="30" value="{$dsp[ 'intro_info01']}" />
</td>
</tr>
<tr>
<th>紹介者所属</th>
<td>所属
<input type="text" name="syoukai_belong2" size="30" value="{$dsp[ 'intro_info02']}" /></td>
</tr>
<tr>
<th>紹介者住所</th>
<td>〒
<input size="3" type="text" name="syoukai_zip1" maxlength="3" value="{$dsp[ 'intro_zip1']}" />
-
<input size="4" type="text" name="syoukai_zip2" maxlength="4" value="{$dsp[ 'intro_zip2']}" />
<br />
<input type="text" name="syoukai_address" size="40" value="{$dsp[ 'intro_address']}" /></td>
</tr>
<tr>
<th>紹介者電話番号</th>
<td><input type="text" name="syoukai_tel" size="30" value="{$dsp[ 'intro_tel']}" />
例：03-3538-0232</td>
</tr>
-->
</table>
<div class="line"></div>
<div class="alignC">
内容を充分にご確認の上、送信して下さい。<br />
<input name="SYMP_SANKA_SEND" type="submit" value="　送　信　" />　<input name="RESET" type="submit" value="　リセット　" />
<input type="hidden" name="symp_id" value="{$dsp[ 'symp_id']}" />
</div>
</div>
<input type="hidden" name="kubun" value="{$dsp[ 'member_kubun01']}" />
<input type="hidden" name="userid" value="{$dsp[ 'member_userid']}" />
<input type="hidden" name="name" value="{$dsp[ 'member_name']}" />
<input type="hidden" name="kana" value="{$dsp[ 'member_kana']}" />
<input type="hidden" name="mail" value="{$dsp[ 'member_mail']}" />
<input type="hidden" name="belong1" value="{$dsp[ 'member_info01']}" />
<input type="hidden" name="belong2" value="{$dsp[ 'member_info02']}" />
<input type="hidden" name="zip1" value="{$dsp[ 'member_zip1']}" />
<input type="hidden" name="zip2" value="{$dsp[ 'member_zip2']}" />
<input type="hidden" name="address" value="{$dsp[ 'member_address']}" />
<input type="hidden" name="tel" value="{$dsp[ 'member_tel']}" />
<input type="hidden" name="fax" value="{$dsp[ 'member_fax']}" />
</form>
EOD;

	// ログインしていない場合
	} else {


$contents = <<<EOD
<script type="text/javascript"> 
<!-- 
function check(){
	if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示
		return true; // 「OK」時は送信を実行
	}
	else{ // 「キャンセル」時の処理
		return false; // 送信を中止
	}
}
// -->
</script>
<form method="POST" action="symp_entry.php" onSubmit="return check()">
<h2>参加申込</h2>
<div class="main_box">
<h3>{$dsp[ 'symp_name']}参加申込</h3>
<p style="color: #F00;font-weight: bold;">$err_msg</p>
<table width="100%" border="0" cellpadding="0" cellspacing="3" class="entry">
<tr>
<th><span class="fc_red">※</span>会員区分</th>
<td>$input_radio_1</td>
</tr>
<!--
<tr>
<th><span class="fc_red">※</span>会員番号<br />
<span class="fs10">「軽金属」送付袋参照</span></th>
<td><input type="text" name="userid" size="30" value="{$dsp[ 'member_userid']}" />
例：123456(半角数字6桁)</td>
</tr>
-->
<tr>
<th><span class="fc_red">※</span>氏名<br />
<span class="fs10">（全角漢字）</span></th>
<td><input type="text" name="name" size="30" value="{$dsp[ 'member_name']}" /></td>
</tr>
<tr>
<th><span class="fc_red">※</span>フリガナ<br />
<span class="fs10">（全角カナ）</span></th>
<td><input type="text" name="kana" size="30" value="{$dsp[ 'member_kana']}" /></td>
</tr>
<tr>
<th><span class="fc_red">※</span>メールアドレス<br />
<span class="fs10">（半角英数）</span></th>
<td><input type="text" name="mail" size="30" style="ime-mode:disabled;" value="{$dsp[ 'member_mail']}" /></td>
</tr>
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
<th><span class="fc_red">※</span>所属住所<br />
<span class="fs10">（全角、数字は半角）</span></th>
<td> 〒
<input size="3" type="text" name="zip1" maxlength="3" value="{$dsp[ 'member_zip1']}" />
-
<input size="4" type="text" name="zip2" maxlength="4" value="{$dsp[ 'member_zip2']}" />
<br />
<input type="text" name="address" size="40" value="{$dsp[ 'member_address']}" /></td>
</tr>
<tr>
<th><span class="fc_red">※</span>電話番号<br />
<span class="fs10">（半角数字）</span></th>
<td><input type="text" name="tel" size="30" value="{$dsp[ 'member_tel']}" />
例：03-3538-0232</td>
</tr>
<tr>
<th>FAX番号<br />
<span class="fs10">（半角数字）</span></th>
<td><input type="text" name="fax" size="30" value="{$dsp[ 'member_fax']}" />
例：03-3538-0226</td>
</tr>

{$tag[ 'pay_way_view_commentOut_1' ]}
<tr>
<th>送金予定日</th>
<td>
<select name="pay_plan_y">$pay_play_y_options</select>年
<select name="pay_plan_m">$pay_play_m_options</select>月
<select name="pay_plan_d">$pay_play_d_options</select>日
</td>
</tr>
{$tag[ 'pay_way_view_commentOut_2' ]}

{$tag[ 'pay_way_view_commentOut_1' ]}
<tr>
<th>支払方法</th>
<td>{$input_radio_2}</td>
</tr>
{$tag[ 'pay_way_view_commentOut_2' ]}

<tr>
<th>備考<!--<br><span class="fs10">（個別相談会で相談したい内容をこちらにご記入ください）</span>--></th>
<td><textarea name="bikou" cols="70" rows="4" id="bikou">{$dsp[ 'sanka_biko1']}</textarea>
</td>
</tr>

{$tag[ 'pay_way_view_commentOut_1' ]}
<tr>
<th>請求書希望</th>
<td>$input_radio_3</td>
</tr>
{$tag[ 'pay_way_view_commentOut_2' ]}
<!--
<tr>
<th>紹介者名</th>
<td><input type="text" name="syoukai_name" size="30" value="{$dsp[ 'intro_name']}" /></td>
</tr>
<tr>
<th>紹介者勤務先/学校名</th>
<td>勤務先／学校名
<input type="text" name="syoukai_belong1" size="30" value="{$dsp[ 'intro_info01']}" />
</td>
</tr>
<tr>
<th>紹介者所属</th>
<td>所属
<input type="text" name="syoukai_belong2" size="30" value="{$dsp[ 'intro_info02']}" /></td>
</tr>
<tr>
<th>紹介者住所</th>
<td>〒
<input size="3" type="text" name="syoukai_zip1" maxlength="3" value="{$dsp[ 'intro_zip1']}" />
-
<input size="4" type="text" name="syoukai_zip2" maxlength="4" value="{$dsp[ 'intro_zip2']}" />
<br />
<input type="text" name="syoukai_address" size="40" value="{$dsp[ 'intro_address']}" /></td>
</tr>
<tr>
<th>紹介者電話番号</th>
<td><input type="text" name="syoukai_tel" size="30" value="{$dsp[ 'intro_tel']}" />
例：03-3538-0232</td>
</tr>
-->
</table>
<div class="line"></div>
<div class="alignC">
内容を充分にご確認の上、送信して下さい。<br />
<input name="SYMP_SANKA_SEND" type="submit" value="　送　信　" />　<input name="RESET" type="submit" value="　リセット　" />
<input type="hidden" name="symp_id" value="{$dsp[ 'symp_id']}" />
</div>
</div>
</form>
EOD;

	}

// 開催期間外の場合->期間外テキスト
} else {

$contents = <<<EOD
<h2>{$dsp[ 'symp_name']}参加申込</h2>
<div class="main_box">
只今 参加申込みは受付しておりません。
</div>
EOD;

}


	$class = ''
. '<li>講座</li>' . "\n"
. '<li>参加申込一覧</li>' . "\n"
. '<li>' . $dsp[ 'symp_name' ] . '</li>' . "\n"
. '<li>参加申込</li>' . "\n";

include( "./templates/common_tmpl2.html" );
?>