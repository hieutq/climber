<?php
// *******************************************************************
// カテゴリー修正　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/category_modify.php" );

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
■&nbsp;ID: <?=$modify_id?><br />
■&nbsp;親カテゴリー<br />
<select name="modify_oya">
<?=$ctgr_fold_option?>
</select>&nbsp;
<? if( $modify_oya != "0" ){ ?>
<input type="submit" value="↑" name="OK_3">
<? } ?>
<input type="submit" value="↓" name="OK_2"><br />
■&nbsp;カテゴリー名<br />
<input type="text" name="modify_name" size="40" value="<?=$modify_name?>" /><br />
■&nbsp;表示ランク<br />
<select name="modify_rank">
<option value="1"<?=$rank_op1?>>1</option>
<option value="2"<?=$rank_op2?>>2</option>
<option value="3"<?=$rank_op3?>>3</option>
<option value="4"<?=$rank_op4?>>4</option>
<option value="5"<?=$rank_op5?>>5</option>
<option value="6"<?=$rank_op6?>>6</option>
<option value="7"<?=$rank_op7?>>7</option>
<option value="8"<?=$rank_op8?>>8</option>
<option value="9"<?=$rank_op9?>>9</option>
<option value="10"<?=$rank_op10?>>10</option>
</select><br />
■&nbsp;ステータス<br />
<?=$status?><br />
■&nbsp;登録日<br />
<?=$regist_dt?><br />
■&nbsp;更新日<br />
<?=$update_dt?><br />
<input type="submit" value="登録確認へ" name="OK_1"><br />
</form>
</div>
</div>
</body>
</html>
