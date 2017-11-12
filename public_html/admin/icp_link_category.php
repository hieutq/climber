<?php
// *******************************************************************
// ICPリンクカテゴリー　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/icp_admin.php" );
	include_once( "./../../admin/icp_link_category.php" );

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
	$("#confirm1").click(function(){
		var button = $(this);
		if (confirm || jConfirm("リンクカテゴリーを登録します\nよろしいですか？", "リンクカテゴリー登録",function(r){
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

<h2>新規リンクカテゴリー追加</h2>
<? if($err_msg){ ?><div id="err"><?=$err_msg?></div><? } ?>
<form method="post" action="<?=$action?>">
<div id="h_halt">
	<label><?=$sub_pk?>カテゴリー名</label><br />
	<input name="catg_name" type="text" class="text" size="35" value="" />
</div>
<div id="h_bottom">
	<label>表示順</label>
	<select name="catg_order" class="dropdown">
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
<? if(!$sub_pk){ ?>
	<label>表示</label>
	<select name="catg_menu" class="dropdown">
		<option value="">表示する</option>
		<option value="1">表示しない</option>
	</select>&nbsp;
<? } ?>
	<input type="submit" name="regist" class="submit" value="追加" id="confirm1" />
</div>
</form>

<h2>リンクカテゴリー一覧</h2>
<form>
<div>
<select onchange="location.href=this.options[this.selectedIndex].value" class="dropdown">
<option value='icp_link_category.php'>(root)</option>
<?=$sub_op?>
</select>
</div>
</form>
<table id="list">
<tr>
<th width="30">ID</th>
<th width="400">カテゴリー名</th>
<th width="50">表示順</th>
<th width="80">メニュー</th>
<th width="120">編集</th>
</tr>
<?=$catg_tbl?>
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
