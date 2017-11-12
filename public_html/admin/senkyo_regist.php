<?php
// *******************************************************************
// 選挙新規登録　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/senkyo_regist.php" );

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
	if(window.confirm('<?=$name_check?>(<?=$shozk_check?>)を\n上記選挙の電子選挙管理者に設定しますか？')){ // 確認ダイアログを表示
		return true; // 「OK」時は送信を実行
	}
	else{ // 「キャンセル」時の処理
		return false; // 送信を中止
	}
}
function retire(){
	if(window.confirm('退会処理します よろしいですか？')){ // 確認ダイアログを表示
		return true; // 「OK」時は送信を実行
	}
	else{ // 「キャンセル」時の処理
		return false; // 送信を中止
	}
}
var stopCount = 20;
function strLength(strSrc){
	len = 0;
	strSrc = escape(strSrc);
	for(i = 0; i < strSrc.length; i++, len++){
		if(strSrc.charAt(i) == "%"){
			if(strSrc.charAt(++i) == "u"){
				i += 3;
				len++;
			}
			i++;
		}
	}
	return len;
}
function restChar1( str,name ) {
	var strCount = Math.ceil(strLength(str).toString() / 2);
	if(strCount > stopCount){
		document.getElementById(name + "Inner").innerHTML = '<em style="color:#ff0000;">' + strCount + ' / 20 Over!</em>';
	}else if(strCount == stopCount){
		document.getElementById(name + "Inner").innerHTML = '<em style="color:#ff0000;">' + strCount + ' / 20</em>';
	}else{
		document.getElementById(name + "Inner").innerHTML = strCount + " / 20";
	}

}
// -->
</script
</head>
<body>
<div id="admin_cts">
<div id="title">選挙登録</div>
<BR>

<form action="<?=$action?>" method="post" name="member_regist">
<table border="0">
<tr>
<td colspan="2">
<fieldset style="margin-bottom:10px;padding:10px;">
<table width="100%">
<tr>
<td width="46%">
<? if($err_msg){ ?>
<span style="color:red"><?=$err_msg?></span><BR>
<? } ?>
■&nbsp;選挙管理委員長の会員番号&nbsp;
<input type="text" name="senkyo_master" value="<?=$senkyo_master?>" size="10">
<input type="submit" name="name_check" value="確認" /><BR>
<? if($name_check){ ?>
■&nbsp;名前：<?=$name_check?><BR>
■&nbsp;所属：<?=$shozk_check?><BR>
<? } ?>
■&nbsp;選挙名&nbsp;
<input type="text" name="senkyo_name" value="<?=$senkyo_name?>" size="40"><BR>
</td>
</tr>
<? if($name_check){ ?>
<tr><th height="50px" style="line-height:50px;padding-left:20px;">
<input type="submit" value="　登　録　" name="OK_11" onClick="return modify()">&nbsp;
</th></tr>
<? } ?>
</table>
</form>
</div>
</div>
</body>
</html>
