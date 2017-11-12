<?php
// *******************************************************************
// カレンダー一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();


	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/calendar_list.php" );

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
		var alert_text = "『" + name + "』を削除します。よろしいですか？";
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
<div id="title">カレンダー 一覧</div>

<form method="POST" action="">
<table class="search_tbl">
	<tr>
	<th>■検索</th>
		<td>
		<? if($err_msg != ""){ ?>
		<span style="color:red"><?=$err_msg?></span><br>
		<? } ?>
		年度：<select name="search_year"><option value="">----</option>
<?=
	html_options(
		$op_arr = $year_options,
		$selected = $dsp_search['year']
	);
?>
		</select>
　　　　　　<input type="submit" value=" 検 索 " name="SEARCH_ON">&nbsp;
		<input type="submit" value=" リセット " name="SEARCH_RESET">
	</tr>
</table>
</form>


<div id="list">
<?=$page_link1?> <?=$page_link2?>

<form method="POST" action="">
<input type="submit" name="REGIST" value=" カレンダー追加 ">
</form>

<table class="ubar">
	<tr>
		<th width="140" style="text-align: center;">処理</th>
		<th width="160" style="text-align: center;">開催日</th>
		<th width="300" style="text-align: center;">行事名（開催地）</th>
		<th width="200" style="text-align: center;">主催</th>
	</tr>

<?=$dsp_tbl?>

</table>
<?=$page_link1?> <?=$page_link2?>
<br>

</div>
</body>
</html>
