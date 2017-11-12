<?php
// *******************************************************************
// 選挙一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/senkyo_list.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
<script type="text/javascript">
<!-- 
function modify(){
	if(window.confirm('選挙情報を削除します よろしいですか？')){
		return modify2();
	}else{
		return false;
	}
}
function modify2(){
	if(window.confirm('削除された情報は二度と復元できません。\n削除してよろしいですか？')){
		return modify3();
	}else{
		return false;
	}
}function modify3(){
	if(window.confirm('本当に削除してよろしいですか？')){
		return true;
	}else{
		return false;
	}
}
// -->
</script>
</head>
<body>
<div id="admin_cts">
<div id="title">選挙一覧</div>
<form method="POST" action="<?=$action?>">
<?=$page_link1?> <?=$page_link2?>

<table class="search_tbl">
<tr>
<div id="list">
<table class="ubar">
<tr>
<th width="230">　選挙名</th>
<th width="140">　管理委員長氏名</th>
<th width="100">　管理委員長No</th>
<th width="70">　状態</th>
<th width="130">　電子投票開始日</th>
<th width="80">　選挙削除</th>
<?=$dsp_tbl?>
</table>
<?=$page_link1?> <?=$page_link2?>
</div>
</body>
</html>
