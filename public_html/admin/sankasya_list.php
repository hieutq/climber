<?php
// *******************************************************************
// 講演申込一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();


	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../Classes/PHPExcel.php" );
	include_once( "./../../admin/sankasya_list.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
<link rel="stylesheet" href="./css/admin2.css" type="text/css" media="all" />
<script type="text/javascript">
<!--
	function delete_ok(id,name) {
		var alert_text = name + "さんを削除します。よろしいですか？";
		var form_id = "listForm" + id;
		target_form = window.document.forms[form_id];

		if (window.confirm( alert_text )) {


		} else {
			target_form.DELETE.value = '';
		}

		return false;
	}
-->
</script>
</head>
<body>
<div id="admin_cts">
<div id="title"><?=$conv_name?> 参加者 一覧</div>

<form method="POST" action="">
<table class="search_tbl">
	<tr>
	<th>■検索</th>
		<td>
		<? if($err_msg != ""){ ?>
		<span style="color:red"><?=$err_msg?></span><br>
		<? } ?>
		<div style="float: left;">
			<div style="margin-right: 20px;">
			受付ID：<input type="text" name="search_sanka_uid" value="<?=$dsp_search['sanka_uid']?>" style="width: 40px;">&nbsp;
			会員ID：<input type="text" name="search_member_userid" value="<?=$dsp_search['member_userid']?>" style="width: 60px;"><br>
			　氏名：<input type="text" name="search_member_name" value="<?=$dsp_search['member_name']?>" style="width: 80px;"><br>
			　所属：<input type="text" name="search_member_info" value="<?=$dsp_search['member_info']?>" style="width: 200px;">&nbsp;<br>
			</div>
		</div>
		MAIL：<input type="text" name="search_member_mail" value="<?=$dsp_search['member_mail']?>" style="width: 200px;">&nbsp;<br>
		&nbsp;入金：<select name="search_pay_status"><option value="">----</option>
		<?=
			html_options(
					$op_arr = $search_pay_options,
					$selected = $dsp_search['pay_status']
				);
		?>
		</select>&nbsp;
		区分：<select name="search_member_kubun01"><option value="">----</option>
<?=
			html_options(
					$op_arr = $CONFIG_MEMBER_TYPE,
					$selected = $dsp_search['member_kubun01']
				);
?>
			</select><br>
		　　　　　　<input type="submit" value=" 検 索 " name="SEARCH_ON">&nbsp;
		<input type="submit" value=" リセット " name="SEARCH_RESET">
		</td></tr></table>
		</td>
	</tr>
</table>
<input type="hidden" name="convention_id" value="<?=$convention_id?>">
</form>
<div id="list">

<form method="POST" action="">
<input type="submit" name="BACK" value=" &laquo; 大会一覧に戻る ">&nbsp;
<input type="submit" name="REGIST" value=" 参加者追加 ">&nbsp;
<input type="submit" name="SEMD_DM" value=" 参加者全員にDM送信 ">&nbsp;
<input type="submit" name="CSV_DL" value=" CSVデータ ">&nbsp;
<input type="hidden" name="convention_id" value="<?=$convention_id?>">
</form>
<br />
<?=$page_link1?> <?=$page_link2?>

<table class="ubar">
	<tr>

		<th width="80" style="text-align: center; white-space: nowrap;">受付ID</th>
		<th width="300" style="text-align: center; white-space: nowrap;">処理</th>
		<th width="200" style="text-align: center; white-space: nowrap;line-height: 17px;">入金日・予定日<br>支払い方法</th>
		<th width="300" style="text-align: center; white-space: nowrap;">氏名・所属・メールアドレス</th>
		<th width="300" style="text-align: center; white-space: nowrap;">参加項目・会員番号</th>
		<th width="300" style="text-align: center; white-space: nowrap;">住所・電話番号</th>
		<th width="200" style="text-align: center; white-space: nowrap;">備考</th>

	</tr>

<?=$dsp_tbl?>

</table>

<?=$page_link1?> <?=$page_link2?>
<br />
<form method="POST" action="">
<input type="submit" name="BACK" value=" &laquo; 大会一覧に戻る ">&nbsp;
<input type="submit" name="REGIST" value=" 参加者追加 ">&nbsp;
<input type="submit" name="SEMD_DM" value=" 参加者全員にDM送信 ">&nbsp;
<input type="submit" name="CSV_DL" value=" CSVデータ ">&nbsp;
<input type="hidden" name="convention_id" value="<?=$convention_id?>">
</form>


</form>
<br>
</div>
</body>
</html>
