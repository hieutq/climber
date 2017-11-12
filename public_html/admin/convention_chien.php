<?php
// *******************************************************************
// 大会一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/convention_chien.php" );

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
<div id="title">大会 遅延申込設定</div>
<br>
<br>
<span style="font-weight: bold;">第<?=$dsp['convention_id']?>回大会</span>の遅延申込みを受付けました。<br>
<br>
申込URL：<span style="font-weight: bold;"><?=$dsp['url']?></span><br>
有効期限：<span style="font-weight: bold;"><?=$dsp['date_text']?></span><br>
<br>
上記URLは一回しかアクセスできませんので、ご注意下さい。<br>
<br>
</body>
</html>
