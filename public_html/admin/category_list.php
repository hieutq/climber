<?php
// *******************************************************************
// コンテンツカテゴリー　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/category_list.php" );

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
<div id="title">コンテンツカテゴリー一覧</div>
<form method="POST" action="<?=$action?>">
<table class="search_tbl">
<tr>
<th>■新規登録</th>
<td>
<? if($err_msg != ""){ ?>
<span style="color:red"><?=$err_msg?></span><br>
<? } ?>
カテゴリー名：<input type="text" name="regist_ctgr_name" value="" size="40">&nbsp;
表示ランク：<select name="regist_ctgr_rank">
<option value=""></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select><br>
親カテゴリー：<select name="regist_ctgr_fold">
<option value="">トップ階層</option>
<?=$ctgr_fold_option?>
</select>&nbsp;
<input type="submit" value="<?=$submit?>" name="OK_1"></font>
</td></tr></table>
</td>
</tr>
</table>
</form>
<div id="list">
<a href="category_list.php?fold=0">トップ</a>&nbsp;&gt;&nbsp;<?=$fold_list?>
</div>
<div id="list">
<?=$page_link1?> <?=$page_link2?>
<table class="ubar">
<tr>
<th width="30">　ID</th>
<th width="200">　カテゴリー名</th>
<th width="60">　ランク</th>
<th width="260">　編集</th>
</tr>
<?=$dsp_tbl?>
</table>
<?=$page_link1?> <?=$page_link2?>
</div>
</body>
</html>
