<?php
// *******************************************************************
// コンテンツ修正　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/contents_modify.php" );

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
<div id="title">ページ内容修正</div>
<div id="list">
トップ&nbsp;&gt;&nbsp;<?=$fold_list?>&nbsp;
<a href="contents_list.php">一覧へ戻る</a><br />
<hr width="700" />
<form action="<?=$action?>" method="post" name="akoarea" enctype="multipart/form-data">
■&nbsp;ファイルアップロード<br />
<input type="file" name="image_file"><input type="submit" value="アップロード" name="UP_1">
&nbsp;※ 画像でアップできるのはjpg, gif, pngのみです。<br />
<?=$img_tbl?>
■&nbsp;ページタイトル<br />
<input type="text" name="modify_title" value="<?=$modify_title?>" /><br />
■&nbsp;ページランク<br />
<select name="modify_rank">
<option value="1"<?=$rank_option1?>>1</option>
<option value="2"<?=$rank_option2?>>2</option>
<option value="3"<?=$rank_option3?>>3</option>
<option value="4"<?=$rank_option4?>>4</option>
<option value="5"<?=$rank_option5?>>5</option>
<option value="6"<?=$rank_option6?>>6</option>
<option value="7"<?=$rank_option7?>>7</option>
<option value="8"<?=$rank_option8?>>8</option>
<option value="9"<?=$rank_option9?>>9</option>
<option value="10"<?=$rank_option10?>>10</option>
</select><br />
■&nbsp;HTMLソース<br />
<textarea name="modify_body" cols="96" rows="8"><?=$modify_body?></textarea><br />
<input type="submit" value="プレビュー" name="OK_4">&nbsp;
<input type="submit" value="登録確認へ" name="OK_5"><br />
</form>
</div>
<? if( $sum_body != "" ){ ?>
<div id="preview">
<?=$sum_body?>
</div>
<? } ?>
</div>
</body>
</html>
