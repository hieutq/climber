<?php
//***********************************************************************
//  ログイン処理　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );
	include_once( "./../../src/part_login.php" );

	if ( ! $config_login_flg ) {

$contents = <<<EOD
<h2>ログイン</h2>
<div class="main_box">
<form action="?mode=content&pid=76" method="post">
<p style="color: #F00;font-weight: bold;">$err_msg</p>
<table border="0" cellpadding="10" cellspacing="0" class="t_border">
<tr>
<th nowrap="nowrap">会員番号</th>
<td><input size="20" type="text" name="kid" maxlength="15" value="{$dsp[ 'userid' ]}" /></td>
</tr>
<tr>
<th nowrap="nowrap">インターネットサービス パスワード</th>
<td><input size="20" type="password" name="pass" maxlength="15" value="{$dsp[ 'passwd' ]}" /></td>
</tr>
<tr>
<td colspan="2" class="alignC"><input type="submit" name="USER_LOGIN" value="　ログイン　" />　
<input type="submit" name="RESET" value="　リセット　" /></td>
</tr>
</table>
</form>
<br />
会員でインターネットサービスの登録をしてない方はこちら<br />
<a href="./?mode=content&pid=72#touroku">インターネットサービスの登録</a>
</div>
EOD;

	} else {

$contents = <<<EOD
<h2>ログイン</h2>
<div class="main_box">

すでにログインしています<br />
<br />
&raquo;&nbsp;<a href="./?mode=logout">ログアウトする</a><br />
<br />

</div>
EOD;

	}

?>