<?php
// *******************************************************************
// 大会一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/convention_cate_edit.php" );

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
<div id="title">講義分類 初期設定</div>
<form method="POST" action="<?=$action?>">
<table class="search_tbl">
<tr>
<th>■分類一覧</th>
<td>
<? if($err_msg != ""){ ?>
<span style="color:red"><?=$err_msg?></span><br>
<? } ?>
▼分類初期設定<br>
<div style="margin-left: 15px;">
<?php for($i=1; $i<=27;$i++) : ?>
<input type="text" name="cate_type_<?php echo $i; ?>" value="<?=$dsp[$i]['type']?>" style="width: 40px;">&nbsp;
<input type="text" name="cate_body_<?php echo $i; ?>" value="<?=$dsp[$i]['body']?>" style="width: 500px;"><br>
<?php endfor; ?>
</div>
<br>
<div style="text-align: center;">
<input type="submit" value="<?=$submit?>" name="OK_1">
</div>
<br>
</td></tr></table>
</td>
</tr>
</table>
</form>

</body>
</html>
