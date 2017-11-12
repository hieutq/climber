<?php
// *******************************************************************
// お問い合わせ先メール設定　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/mail_admin.php" );

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
<div id="title">お問い合わせ先発送メール宛先設定</div>
<form method="POST" action="<?=$action?>">
<table class="search_tbl">
<tr>
<th>■登録</th>
<td>
<? if($err_msg != ""){ ?>
<span style="color:red"><?=$err_msg?></span><br>
<? } ?>
メールアドレス：<input type="text" name="regist_email" value="" size="60">&nbsp;
<input type="submit" value="<?=$submit?>" name="OK_1">
</td></tr></table>
</td>
</tr>
</table>
</form>
<div id="list">
<?=$page_link1?> <?=$page_link2?>
<table class="ubar">
<tr>
<th width="30">　ID</th>
<th width="300">　メールアドレス</th>
<th width="200">　登録日</th>
<th width="150">　編集</th>
</tr>
<?=$dsp_tbl?>
</table>
<?=$page_link1?> <?=$page_link2?>
</div>
</body>
</html>
