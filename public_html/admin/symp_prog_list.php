<?php
// *******************************************************************
// シンポジウム・セミナーのプログラム一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();


	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/symp_prog_list.php" );

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
<div id="title">『<?=$symp_name?>』登録プログラム 一覧</div>

<div id="list">
<?=$page_link1?> <?=$page_link2?>

<form method="POST" action="">
<input type="submit" name="REGIST" value=" プログラム追加 ">
<input type="hidden" name="symp_id" value="<?=$symp_id?>">
</form>

<table class="ubar">
	<tr>
		<th width="50" style="text-align: center;">順番</th>
		<th width="200" style="text-align: center;">処理</th>
		<th width="300" style="text-align: center;">プログラム名</th>
		<th width="180" style="text-align: center;">講演者・所属</th>
		<th width="300" style="text-align: center;">内容</th>
	</tr>

<?=$dsp_tbl?>

</table>
<?=$page_link1?> <?=$page_link2?>
<br>
<form method="POST" action="">
<p style="width: 500px;text-align: center;">
<input type="submit" name="BACK" value=" シンポジウム一覧に戻る ">
</p>
</form>
</div>
</body>
</html>
