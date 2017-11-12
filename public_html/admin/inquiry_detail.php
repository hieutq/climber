<?php
// *******************************************************************
// お問い合わせ詳細表示　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/inquiry_detail.php" );

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
<div id="title">お問い合わせ詳細表示</div>
■&nbsp;お名前<br />
<?=$inquiry_name?>(<?=$inquiry_kana?>)<br />
■&nbsp;性別<br />
<?=$CONFIG_SEX_TYPE[$inquiry_sex]?><br />
■&nbsp;E-Mail<br />
<?=$inquiry_mail?><br />
■&nbsp;電話番号<br />
<?=$inquiry_tel?><br />
■&nbsp;住所<br />
<?=$inquiry_zip?><br />
<?=$PREF_TYPE[ $inquiry_add1]?><?=$inquiry_add2?><br />
<?=$inquiry_add3?><br />
■&nbsp;送信日時<br />
<?=$inquiry_reg?><br />
■&nbsp;本文<br />
<?=$inquiry_body?>
</div>
</div>
</body>
</html>
