<?php
// *******************************************************************
// カテゴリー修正確認　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/category_modify_confirm.php" );

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
<div id="title">カテゴリー修正確認</div>
<div id="list">
トップ&nbsp;&gt;&nbsp;<?=$fold_list?><br />
<hr width="700" />
</div>
<table>
<tr>
<th>ID</th>
<td><?=$modify_id?></td>
</tr>
<tr>
<th>親カテゴリー</th>
<td><?=$modify_oya?></td>
</tr>
<tr>
<th>カテゴリー名</th>
<td><?=$modify_ctgr?></td>
</tr>
<tr>
<th>表示ランク</th>
<td><?=$modify_rank?></td>
</tr>
<tr>
<th>ステータス</th>
<td><?=$modify_status?></td>
</tr>
<tr>
<th>登録日</th>
<td><?=$regist_dt?></td>
</tr>
<tr>
<th>更新日</th>
<td>現在の日時</td>
</tr>
</table>
<form action="<?=$action?>" method="post">
<input type="submit" value=" 登録 " name="OK_1">&nbsp;
<input type="submit" value="編集画面へ戻る" name="BK_1"><br />
</form>
</div>
</body>
</html>
