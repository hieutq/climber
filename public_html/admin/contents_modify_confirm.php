<?php
// *******************************************************************
// コンテンツ修正確認　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/contents_modify_confirm.php" );

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
<div id="title">ページ内容修正確認</div>
<div id="list">
■&nbsp;ページタイトル：&nbsp;<?=$modify_title?><br />
■&nbsp;ページランク　：&nbsp;<?=$modify_rank?><br />
■&nbsp;ページ内容　　：<br />
<div id="preview">
<?=$modify_body?>
</div>
<div style="padding-top:10px;">
<form action="<?=$action?>" method="post">
<input type="submit" value=" 修 正 " name="OK_1">&nbsp;
<input type="submit" value="編集画面へ戻る" name="BK_1"><br />
</form>
</div>
</div>
</div>
</body>
</html>
