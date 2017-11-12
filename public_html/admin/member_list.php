<?php
// *******************************************************************
// 会員申込一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();


	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../Classes/PHPExcel.php" );
	include_once( "./../../admin/member_list.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
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
<div id="title">インターネットサービス登録者一覧</div>

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
			会員番号：<input type="text" name="search_userid" value="<?=$dsp_search['member_userid']?>" style="width: 50px;"><br>
			氏名：<input type="text" name="search_name" value="<?=$dsp_search['member_name']?>" style="width: 100px;">&nbsp;<br>
			所属：<input type="text" name="search_info" value="<?=$dsp_search['member_info']?>" style="width: 200px;">&nbsp;<br>
			</div>
		</div>
		MAIL：<input type="text" name="search_mail" value="<?=$dsp_search['member_mail']?>" style="width: 200px;">&nbsp;<br>
		&nbsp;区分：<select name="search_kubun"><option value="">----</option>
		<?=
			html_options(
					$op_arr = $member_type_options,
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
</form>
<div id="list">

<form method="POST" action="">
<input type="submit" name="REGIST" value=" 会員追加 ">&nbsp;
<input type="submit" name="SEMD_DM" value=" 全員にDM送信 ">&nbsp;
<input type="submit" name="CSV_DL" value=" CSVデータ ">&nbsp;
</form>
<br />

<?=$page_link1?> <?=$page_link2?>
<table class="ubar">
	<tr>
		<th width="60" style="text-align: center;">ID</th>
		<th width="100" style="text-align: center;">会員番号</th>
		<th width="80" style="text-align: center;">状態</th>
		<th width="80" style="text-align: center;">区分</th>
		<th width="300">　氏名・メール</th>
		<th width="300">　勤務先・所属</th>
		<th width="200" style="text-align: center;">　処理</th>
	</tr>

<?=$dsp_tbl?>

</table>
<?=$page_link1?> <?=$page_link2?>

<br>

<form method="POST" action="">
<input type="submit" name="REGIST" value=" 会員追加 ">&nbsp;
<input type="submit" name="SEMD_DM" value=" 全員にDM送信 ">&nbsp;
<input type="submit" name="CSV_DL" value=" CSVデータ ">&nbsp;
</form>

</div>
</body>
</html>
