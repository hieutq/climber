<?php
// *******************************************************************
// ICPトップバナー編集　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/icp_admin.php" );
	include_once( "./../../admin/icp_top_image.php" );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>ICP 管理画面</title>
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
	$("#confirm").click(function(){
		var button = $(this);
		if (confirm || jConfirm("トップイメージを追加します\nよろしいですか？", "トップイメージ追加",function(r){
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
<h2>新規トップイメージ追加</h2>
<? if($err_msg){ ?><div id="err"><?=$err_msg?></div><? } ?>
<form method="post" action="<?=$action?>" enctype="multipart/form-data">
<div id="h_halt">
	<label>画像ファイル（サイズ：横690px,縦206px,jpgのみ）</label><br />
	<input name="img_file" type="file" class="text" size="36" value="" /><br />
	<label>画層代替文字（画像が表示されなかった場合に表示される文字）</label><br />
	<input name="img_alt" type="text" class="text" size="36" value="" /><br />
</div>
<div id="h_bottom">
	<label>表示順</label>
	<select name="img_order" class="dropdown">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5" selected>5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
	</select>&nbsp;
	<label>表示属性</label>
	<select name="status" class="dropdown">
		<option value="0">表示する</option>
		<option value="1">表示しない</option>
	</select>&nbsp;
	<input type="submit" name="regist" class="submit" value="追加" id="confirm" />
</div>
</form>

<h2>トップイメージ一覧</h2>
<table id="list">
<tr>
<th width="30">ID</th>
<th width="240">元ファイル名</th>
<th width="240">代替文字</th>
<th width="50">表示順</th>
<th width="80">表示属性</th>
<th width="120">編集</th>
</tr>
<?=$img_tbl?>
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
