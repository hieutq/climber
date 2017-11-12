<?php
// *******************************************************************
// 大会一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();


	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/convention_list.php" );



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
	function delete_ok(id) {
		var alert_text = "第" + id + "大会をを削除します。よろしいですか？";
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
<div id="title">大会一覧</div>
<div id="list">
<?=$page_link1?> <?=$page_link2?>

<form method="GET" action="">
<input type="submit" name="REGIST" value=" 大会追加 ">
</form>
<table class="ubar">
	<tr>
		<th width="180" style="text-align: center;">大会名</th>
		<th width="80" style="text-align: center;">表示</th>
		<th width="250" style="text-align: center;">開催期間・場所</th>
		<th width="80" style="text-align: center;">講演<br />開始/締切</th>
		<th width="80" style="text-align: center;">参加<br />開始/締切</th>
		<th width="160" style="text-align: center;">処理</th>
	</tr>

<?=$dsp_tbl?>

</table>
<?=$page_link1?> <?=$page_link2?>

</div>
</body>
</html>
