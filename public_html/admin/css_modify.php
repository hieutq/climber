<?php
// *******************************************************************
// スタイルシート編集　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/css_modify.php" );

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
<div id="title">スタイルシート編集</div>
<form method="post" action="<?=$action?>">
<select name="file_select" style="margin-top:20px;" onchange="submit()">
<option value=""></option>
<?=$css_tbl?>
</select>
</form>
<p><?=$err_msg?></p>
<form method="POST" action="<?=$action?>" id="form1" name="css_form">
<p style="padding-top:20px;">
<textarea name="modify_css" rows="30" cols="96"><?=$css_file?></textarea><BR>
<input type="submit" name="OK_1" value="<?=$submit?>">
</p>
</form>
