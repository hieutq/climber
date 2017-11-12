<?php
// *******************************************************************
// お問い合わせログ　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/inquiry_admin.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
<script type="text/javascript">
<!--
function del_inq(id){
	if(window.confirm('削除します\nよろしいですか？')){
		location.href = 'inquiry_admin.php?del=on&id='+id;
	}
	else{
		return false;
	}
}
// -->
</script>

</head>
<body>
<div id="admin_cts">
<div id="title">お問い合わせ一覧</div>
<form method="POST" action="<?=$action?>">
<table class="search_tbl">
<tr>
<th>■検索</th>
<td>
送信者名：<input type="text" name="search_name" value="<?=$search_name?>" size="15">&nbsp;
E-Mail：<input type="text" name="search_email" value="<?=$search_mail?>" size="15">&nbsp;
本文：<input type="text" name="search_body" value="<?=$search_body?>" size="20"><br />
未回答：<input type="checkbox" name="search_answ" value="1"<?=$answ_chk?> />&nbsp;
<input type="submit" value="検　索" name="OK_1">&nbsp;
<input type="submit" value="検索解除" name="OK_2">
</td></tr></table>
</td>
</tr>
</table>
</form>
<div id="list">
<?=$page_link1?> <?=$page_link2?>
<table class="ubar">
<tr>
<th width="40">　ID</th>
<th width="150">　名前</th>
<th width="250">　E-Mail</th>
<th width="70"></th>
<th width="70">　詳細</th>
<th width="120">　送信日時</th>
<th width="60">　対応</th>
<th width="60">　削除</th>
</tr>
<?=$dsp_tbl?>
</table>
<?=$page_link1?> <?=$page_link2?>
</div>
</body>
</html>
