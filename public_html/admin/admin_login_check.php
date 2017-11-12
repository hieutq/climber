<?php
// *******************************************************************
// 管理者ログインページ　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/admin_login_check.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title>Login Check</title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
</head>
<body>
<form id="login" method="POST" action="admin_login_check.php" Accept-charset="UTF-8">
<div id="main_top">
<p>
<?
	if($err_msg != ""){
?>
<span style="color: Red"><?=$err_msg?></span><br>
<? } ?>
<table>
<tr>
<th colspan="2" style="text-align: center;">** LOGIN **</th>
</tr>
<tr>
<td>ID:</td>
<td><input type="text" size="20" name="login_id"></td>
</tr>
<tr>
<td>PW:</td>
<td><input type="password" size="20" name="login_pw"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" value="LOGIN" name="OK_1" class="submit"></td>
</tr>
</table>
</p>
</div>
</form>
</body>
</html>