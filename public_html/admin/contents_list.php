<?php
// *******************************************************************
// コンテンツ一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/contents_list.php" );

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
<div id="title">コンテンツ一覧</div>
<form method="post" action="<?=$action?>">
<table class="search_tbl">
<tr>
<th>■検索</th>
<td>
フリーワード：<input type="text" name="search_word" value="<?=$search_word?>" size="40">&nbsp;
<input type="submit" value="一発検索" name="OK_1">&nbsp;
<input type="submit" value="検索解除" name="OK_2"></font>
</td></tr></table>
</td>
</tr>
</table>
</form>
<div id="list">
<a href="contents_list.php?fold=0">トップ</a>&nbsp;&gt;&nbsp;<?=$fold_list?><br />
<hr width="700" />
<?=$page_link1?> <?=$page_link2?>
<table class="ubar">
<tr>
<th width="60">　ID<span class="order"><a href="<?=$action?>&odr=10">▲</a>&nbsp;<a href="<?=$action?>&odr=11">▼</a></div></th>
<th width="300">　ページタイトル</th>
<th width="90">　ランク<span class="order"><a href="<?=$action?>&odr=20">▲</a>&nbsp;<a href="<?=$action?>&odr=21">▼</a></div></th>
<th width="100">　更新日<span class="order"><a href="<?=$action?>&odr=30">▲</a>&nbsp;<a href="<?=$action?>&odr=31">▼</a></div></th>
<th width="140">　編集</th>
</tr>
<?=$dsp_tbl?>
</table>
<?=$page_link1?> <?=$page_link2?>
</div>
</div>
</body>
</html>
