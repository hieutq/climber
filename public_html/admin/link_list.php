<?php
// *******************************************************************
// リンク管理　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/link_list.php" );

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
<div id="title">リンク一覧</div>
<form method="POST" action="<?=$action?>" enctype="multipart/form-data">
<table class="search_tbl">
<tr>
<th>■新規登録</th>
<td>
<? if($err_msg != ""){ ?>
<span style="color:red"><?=$err_msg?></span><br>
<? } ?>
サイト名：
<input type="text" name="regist_name" size="40">&nbsp;
カテゴリー：
<select name="regist_genre">
<option value=""></option>
<option value="1">学会</option>
<option value="2">協会等</option>
<option value="3">公共機関</option>
<option value="4">試験・評価機関</option>
<option value="5">出版社</option>
<option value="6">企業（特別維持会員）</option>
<option value="7">企業（維持会員）</option>
<option value="8">企業（その他）</option>
<option value="99">その他</option>
</select><br />
URL：
<input type="text" name="regist_url" size="40" />
&nbsp;表示ランク：
<select name="regist_rank">
<option value=""></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5" SELECTED>5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select><br />
バナー元ファイル(150x50px,JPGのみ)：<input type="file" size="30" name="regist_bnr1" /><br />
バナーマウスオーバー(150x50px,JPGのみ)：<input type="file" size="30" name="regist_bnr2" />&nbsp;
<input type="submit" value="新規登録" name="OK_1" />
</td></tr></table>
<p style="padding:10px 0;"><select name="search_genre">
<option value=""></option>
<option value="1"<?=$genre_chk1?>>学会</option>
<option value="2"<?=$genre_chk2?>>協会等</option>
<option value="3"<?=$genre_chk3?>>公共機関</option>
<option value="4"<?=$genre_chk4?>>試験・評価機関</option>
<option value="5"<?=$genre_chk5?>>出版社</option>
<option value="6"<?=$genre_chk6?>>企業（特別維持会員）</option>
<option value="7"<?=$genre_chk7?>>企業（維持会員）</option>
<option value="8"<?=$genre_chk8?>>企業（その他）</option>
<option value="99"<?=$genre_chk99?>>その他</option>
</select>&nbsp;
<input type="submit" value="絞 込" name="OK_2" />&nbsp;
<input type="submit" value="絞込解除" name="OK_3" /></p>
</form>
<?=$page_info?> <?=$page_link1?> <?=$page_link2?>
<table class="ubar">
<tr>
<th width="200">　サイト名</th>
<th width="300">　URL</th>
<th width="80">　ｶﾃｺﾞﾘ</th>
<th width="40">　ﾗﾝｸ</th>
<th width="100">　処理</th>
</tr>
<?=$dsp_tbl?>
</table>
<?=$page_info?> <?=$page_link1?> <?=$page_link2?>

</body>
</html>
