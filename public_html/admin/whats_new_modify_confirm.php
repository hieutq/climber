<?php
// *******************************************************************
// Whats New修正確認　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/whats_new_modify_confirm.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
</head>
<body>
<div id="admin_cts">
<div id="title">Whats new修正確認</div>
<form action="<?=$action?>" method="post">
■&nbsp;ID: <?=$info_id?><br />
■&nbsp;日付設定<br />
<?=$modify_date?><br />
■&nbsp;本　文<br />
<?=$modify_body?><br />
■&nbsp;ステータス<br />
<?=$status?><br />
■&nbsp;登録日<br />
<?=$regist_dt?><br />
■&nbsp;更新日<br />
<?=$update_dt?><br />
<input type="submit" value="登 録" name="OK_1">&nbsp;
<input type="submit" value="入力画面へ戻る" name="BK_1"><br />
</form>
</div>
</div>
</body>
</html>
