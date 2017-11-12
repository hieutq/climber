<?php
// *******************************************************************
// 書籍ジャンル一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();


	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/book_genre_list.php" );

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
<div id="title">書籍ジャンル 一覧</div>

<div id="list">
<?=$page_link1?> <?=$page_link2?>

<form method="POST" action="">
<input type="submit" name="REGIST" value=" 書籍ジャンル追加 ">
</form>

<table class="ubar">
	<tr>
		<th width="50" style="text-align: center;">ID</th>
		<th width="180" style="text-align: center;">処理</th>
		<th width="300" style="text-align: center;">ジャンル名</th>
	</tr>

<?=$dsp_tbl?>

</table>
<?=$page_link1?> <?=$page_link2?>
<br>

</div>
</body>
</html>