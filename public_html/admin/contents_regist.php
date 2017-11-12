<?php
// *******************************************************************
// コンテンツ新規登録　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/contents_regist.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
<script type="text/javascript">
<!--
var CYA=1
function HantenC(InTA) {
var akoTP=eval("document."+InTA)
akoTP.focus()
akoTP.select()
if (document.all&&CYA==1){
therange=akoTP.createTextRange()
therange.execCommand("Copy")
window.status="コピー"
setTimeout("window.status=''",1800) }}
//-->
</script>
</head>
<body>
<div id="admin_cts">
<div id="title">コンテンツ新規登録</div>
<? if($add_flg == ""){ ?>
<form method="post" action="<?=$action?>">
<table class="search_tbl">
<tr>
<th>■新規登録</th>
<td>
<? if($err_msg != ""){ ?>
<span style="color:red"><?=$err_msg?></span><br>
<? } ?>
ページタイトル：<input type="text" name="regist_cts_title" value="" size="40">&nbsp;
表示ランク：<select name="regist_cts_rank">
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
親カテゴリー：<select name="regist_cts_fold">
<option value="">トップ階層</option>
<?=$ctgr_fold_option?>
</select>&nbsp;
<? if( $_SESSION[ 'JILM_ADMIN_FOLD_SCH' ] != "" ){ ?>
<input type="submit" value="↑" name="OK_2">
<? } ?>
<input type="submit" value="↓" name="OK_3">&nbsp;
<input type="submit" value="<?=$submit?>" name="OK_1"></font>
</td></tr></table>
</td>
</tr>
</table>
</form>
<? }else{ ?>
<div id="list">
トップ&nbsp;&gt;&nbsp;<?=$fold_list?>&nbsp;
<a href="contents_regist.php?mode=bang">本文入力を中止する</a><br />
<hr width="700" />
<form action="<?=$action?>" method="post" name="akoarea" enctype="multipart/form-data">
■&nbsp;ファイルアップロード<br />
<input type="file" name="image_file"><input type="submit" value="アップロード" name="UP_1">
&nbsp;※ 画像でアップできるのはjpg, gif, pngのみです。<br />
<?=$img_tbl?>
■&nbsp;HTMLソース<br />
<textarea name="regist_body" cols="96" rows="8"><?=$regist_body?></textarea><br />
<input type="submit" value="プレビュー" name="OK_4">&nbsp;
<input type="submit" value="登録確認へ" name="OK_5"><br />
</form>
</div>
<? } ?>
<? if( $sum_body != "" ){ ?>
<div id="preview">
<?=$sum_body?>
</div>
<? } ?>
</div>
</body>
</html>
