<?php
// *******************************************************************
// Whats New修正　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../admin/whats_new_modify.php" );

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
<div id="title">Whats new修正</div>
<form action="<?=$action?>" method="post">
■&nbsp;ID: <?=$info_id?><br />
■&nbsp;日付設定<br />
<select name="modify_whn_datey">
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
<select name="modify_whn_datem">
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
<select name="modify_whn_dated">
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
</select>日<br />
■&nbsp;本　文<br />
<textarea name="modify_body" cols="96" rows="8"><?=$modify_body?></textarea><br />
■&nbsp;ステータス<br />
<?=$status?><br />
■&nbsp;登録日<br />
<?=$regist_dt?><br />
■&nbsp;更新日<br />
<?=$update_dt?><br />
<input type="submit" value="登録確認へ" name="OK_1"><br />
</form>
</div>
</div>
</body>
</html>
