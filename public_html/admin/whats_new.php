<?php
// *******************************************************************
// トップお知らせリスト＆登録　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/whats_new.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
</head>
<body>
<div id="admin_cts">
<div id="title">WHATS NEW一覧</div>
<form method="POST" action="<?=$action?>">
<table class="search_tbl">
<tr>
<th>■新規登録</th>
<td>
<? if($err_msg != ""){ ?>
<span style="color:red"><?=$err_msg?></span><br>
<? } ?>
表示文章：<textarea name="regist_whn_body" rows="2" cols="64"></textarea><br />
登録日：
<select name="regist_whn_datey">
<?
      while(list ($key, $val) = each($slct_datey_options)) {

        if ($key != $slct_datey_selected){
          print "<option value='$key'>";
        } else {
          print "<option value='$key' selected>";
        }
        print "$val</option>\n";

      }
?>
</select>年
<select name="regist_whn_datem">
<?
      while(list ($key, $val) = each($slct_datem_options)) {

        if ($key != $slct_datem_selected){
          print "<option value='$key'>";
        } else {
          print "<option value='$key' selected>";
        }
        print "$val</option>\n";

      }
?>
</select>月
<select name="regist_whn_dated">
<?
      while(list ($key, $val) = each($slct_dated_options)) {

        if ($key != $slct_dated_selected){
          print "<option value='$key'>";
        } else {
          print "<option value='$key' selected>";
        }
        print "$val</option>\n";

      }
?>
</select>日&nbsp;
<input type="submit" value="<?=$submit?>" name="OK_1"></font>
</td></tr></table>
</td>
</tr>
</table>
</form>
<div id="list">
<?=$page_link1?> <?=$page_link2?>
<table class="ubar">
<tr>
<th width="30">　ID</th>
<th width="400">　本文</th>
<th width="60">　日付</th>
<th width="150">　編集</th>
</tr>
<?=$dsp_tbl?>
</table>
<?=$page_link1?> <?=$page_link2?>
</div>
</body>
</html>
