<?php
// *******************************************************************
// 規約修正　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/notice_modify.php" );

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
<div id="title"><?=$title?></div>
<form action="<?=$action?>" method="post">
<p style="padding-top:20px;">■&nbsp;HTMLソース<br />
<textarea name="modify_body" cols="96" rows="8"><?=$modify_body?></textarea><br />
<br />
<input type="submit" value="プレビュー" name="OK_1">&nbsp;
<input type="submit" value="登録確認へ" name="OK_2"></p>
</form>
<? if( $sum_body != "" ){ ?>
<div id="preview">
<?=$sum_body?>
</div>
<? } ?>
</div>
</body>
</html>
