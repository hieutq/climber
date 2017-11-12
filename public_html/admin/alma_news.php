<?php
// *******************************************************************
// ALMAニュース情報　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/alma_admin.php" );
	include_once( "./../../admin/alma_news.php" );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>ALMA 管理画面</title>
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
<?=$clip_js?>
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
	var confirm = false;
	$("#confirm1").click(function(){
		var button = $(this);
		if (confirm || jConfirm("ニュース情報を登録します\nよろしいですか？", "ニュース情報登録",function(r){
			if (r == true) {
				confirm = true;
				button.click();
			}
		}));
		return confirm ? !(confirm = false) : confirm;
	});
<?=$jq_tbl?>
});
</script>
</head>

<body>
<div id="wrap">
<div id="con_L">

</div><!--con_L end-->

<div id="con_R">

<h2>新規ニュース情報追加</h2>
<? if($err_msg){ ?><div id="err"><?=$err_msg?></div><? } ?>
<form method="post" action="<?=$action?>">
<div id="h_halt">
	<label>ニュース文章</label><br />
	<input name="news_body" type="text" class="text" size="48" value="" />
</div>
<div id="normal">
	<label>リンク先URL</label><br />
	<input name="news_url" type="text" class="text" size="48" value="" />
</div>
<div id="h_bottom">
	<label>登録表示日</label>
	<select name="news_datey" class="dropdown">
<?=$datey?>
	</select>年&nbsp;
	<select name="news_datem" class="dropdown">
<?=$datem?>
	</select>月&nbsp;
	<select name="news_dated" class="dropdown">
<?=$dated?>
	</select>日&nbsp;
	<input type="submit" name="regist" class="submit" value="追加" id="confirm1" />
</div>
</form>

<h2>ニュース情報一覧</h2>
<form>
<div id="h_halt">
<select onchange="location.href=this.options[this.selectedIndex].value" class="dropdown">
<option value='alma_news.php?status=0'>表示中のアイテムのみ</option>
<option value='alma_news.php?status=1'<?=$status_op?>>全表示</option>
</select>
</div>
</form>

<div id="pager">
<?=$page_info?>
<?=$page_footer?>
</div>
<table id="list">
<tr>
<th width="20">ID</th>
<th width="580">本文</th>
<th width="80">日付</th>
<th width="160">表示切替</th>
</tr>
<?=$news_tbl?>
</table>
<div id="pager">
<?=$page_info?>
<?=$page_footer?>
</div>

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
