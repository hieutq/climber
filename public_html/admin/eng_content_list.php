<?php
// *******************************************************************
// 英語版ページ一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/eng_admin.php" );
	include_once( "./../../admin/eng_contents_list.php" );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>英語版 管理画面</title>
<script type="text/javascript" src="./js/rollover.js"></script>
<script type="text/javascript" src="./js/slider.js"></script>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery.jfade.js"></script>
<script type="text/javascript" src="./js/jquery.alerts.js"></script>
<script type="text/javascript" src="./js/highslide-full.js"></script>
<script type="text/javascript" src="./js/highslide-with-html.js"></script>
<script type="text/javascript" src="./js/jquery.zclip.js"></script>
<script type="text/javascript" src="./js/jquery-ui.js"></script>
<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("table tr").jFade({trigger:'mouseover',property:'background',end:'f5deb3'});
	$("table tr").jFade({trigger:'mouseout',property:'background',end:'ffffff'});
});
hs.graphicsDir = 'images/';
hs.outlineType = 'rounded-white';
hs.outlineWhileAnimating = true;
hs.objectLoadTime = 'after';
</script>
<link href="./css/import.css" rel="stylesheet" type="text/css" media="all" />
<link href="./css/highslide.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="highslide/highslide-ie6.css" />
<![endif]-->
<link href="./css/jquery.alerts.css" rel="stylesheet" type="text/css" media="all" />
<link href="./css/slider.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
<?=$confirm?>
});
</script>
</head>

<body>
<div id="wrap">
<div id="con_L">

</div><!--con_L end-->

<div id="con_R">

<h2>カテゴリー変更</h2>
<form>
<div id="h_bottom">
<select onchange="location.href=this.options[this.selectedIndex].value" class="dropdown">
<?=$catg_op2?>
</select>
</div>
</form>

<h2>ページ一覧</h2>
<table id="list">
<tr>
<th width="40">ID</th>
<th width="500">ページ名</th>
<th width="60">表示順</th>
<th width="60">属性</th>
<th width="60">編集</th>
</tr>
<?=$cts_tbl?>
</table>

</div><!--con_R end-->
</div><!--wrap end-->

<div id="footer">
<div id="ft_box"></div><!--ft_box end-->
</div><!--footer end-->

<script type="text/javascript">
	var slider=new accordion.slider("slider");
	slider.init("slider");
</script>

</body>
</html>
