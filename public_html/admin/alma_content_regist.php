<?php
// *******************************************************************
// ALMAページ登録　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/alma_admin.php" );
	include_once( "./../../admin/alma_contents_regist.php" );

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
		if (confirm || jConfirm("<?=$confirm1?>", "<?=$confirm2?>",function(r){
			if (r == true) {
				confirm = true;
				button.click();
			}
		}));
		return confirm ? !(confirm = false) : confirm;
	});
});
</script>
</head>

<body>
<div id="wrap">
<div id="con_L">

</div><!--con_L end-->

<div id="con_R">
<h2>記事入力</h2>
<? if($err_msg){ ?>
<div class="ui-widget">
	<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<strong>Alert:</strong> <?=$err_msg?></p>
	</div>
</div>
<? } ?>
<form method="post" action="<?=$action?>">
<div id="h_halt">作成予定URL: <?=$sk_url?></div>
<div id="h_halt">
<label>カテゴリー：</label>
<select name="contents_catg" class="dropdown">
<?=$catg_op?>
</select>&nbsp;
<label>表示順：</label>
<select name="contents_order" class="dropdown">
<?=$order_op?>
</select>
<? if($p == "contents_modify"){ ?>
&nbsp;
<label>属性：</label>
<select name="contents_status" class="dropdown">
<option value="0"<?=$status_op0?>>表示中</option>
<option value="1"<?=$status_op1?>>非表示</option>
<option value="2">削除</option>
</select>
<? } ?>
</div>
<div id="h_halt">
<label>表題名：</label>
<input name="contents_title" type="text" class="text" size="36" value="<?=$contents_title?>" />
</div>
<div id="h_halt">
<label>エイリアス：</label>
<?=$bs_url?><input name="contents_alias" type="text" class="text" size="18" value="<?=$contents_alias?>" />
</div>
<div id="h_halt">
<textarea name="contents_body" class="ckeditor" id="contents_body"><?=$contents_body?></textarea>
</div>
<div id="h_bottom">
<input type="submit" name="contents_submit" value="<?=$contents_submit?>" class="submit" id="confirm1" />
</div>
<h2>ファイルアップロード</h2>
<script src="js/fileuploader.js?cid=<?=$id?>" type="text/javascript" id="plusId"></script>
<link href="css/fileuploader.css" rel="stylesheet" type="text/css">
<div style="margin:10px 0;" id="clip">
<?=$img_file?>
</div>
<h3 style="padding-left:20px;">新規アップロード</h3>
<div id="file-uploader-demo1">
<noscript>
	<p>Please enable JavaScript to use file uploader.</p>
</noscript>
<script>
	function createUploader(){
		var uploader = new qq.FileUploader({
			element: document.getElementById('file-uploader-demo1'),
			action: 'script/upload.php?id=<?=$id?>',
			debug: true
		});
	}
	window.onload = createUploader;
</script>
<script type="text/javascript">
//<![CDATA[
CKEDITOR.replace( 'contents_body', {
	toolbar : [ [ 'Source','-','Preview','-','Bold','Italic','Underline','NumberedList','BulletedList','-','Image','Link' ],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Table'],['Format','Font','FontSize'],['TextColor','BGColor'] ],
	baseHref : 'http://www.jilm.or.jp/alma/',
//	contentsCss : 'css/import.css',
	height : '460px'
});
//]]>
$(document).ready(function(){
<?=$clip_js?>
});
</script>
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
