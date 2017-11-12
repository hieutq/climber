<?php
// *******************************************************************
// 講演申込一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();


	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/conv_file_list.php" );


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
		var alert_text = name + "を削除します。よろしいですか？";
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
<div id="title"><?=$conv_name?> 講演関連 ファイル 一覧</div>

<div id="list">

<form method="POST" action="">
<input type="submit" name="BACK" value=" &laquo; 大会一覧に戻る ">&nbsp;
<input type="submit" name="REGIST" value=" ファイル追加 ">&nbsp;
<input type="hidden" name="convention_id" value="<?=$convention_id?>">
</form>

<br />
<?=$page_link1?> <?=$page_link2?>

<table class="ubar">

	<tr>
		<th width="200" style="text-align: center;">タイトル</th>
		<th width="200" style="text-align: center;">ファイル名</th>
		<th width="100" style="text-align: center;">　種別</th>
		<th width="100" style="text-align: center;">　表示</th>
		<th width="200" style="text-align: center;">　処理</th>
	</tr>

<?=$dsp_tbl?>

</table>

<?=$page_link1?> <?=$page_link2?>
<br />

<form method="POST" action="">
<input type="submit" name="BACK" value=" &laquo; 大会一覧に戻る ">&nbsp;
<input type="submit" name="REGIST" value=" ファイル追加 ">&nbsp;
<input type="hidden" name="convention_id" value="<?=$convention_id?>">
</form>


<br>
</div>
</body>
</html>
