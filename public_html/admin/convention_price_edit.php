<?php
// *******************************************************************
// 大会一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/convention_price_edit.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
<link rel="stylesheet" href="./css/admin2.css" type="text/css" media="all" />
</head>
<body>
<div id="admin_cts">
<div id="title">大会料金 初期設定</div>
<form method="POST" action="<?=$action?>">
<table class="search_tbl">
<tr>
<th>■料金登録</th>
<td>
<? if($err_msg != ""){ ?>
<span style="color:red"><?=$err_msg?></span><br>
<? } ?>



<p class="mini_title">▼料金設定</p>

<table class="inner_tbl" cellspacing="0" cellpadding="0" border="0">

	<tr>
		<td class="index_col" width="150">講演会：</td>
		<td class="value_col">
<?php
	reset( $member_type_options );
	while( list( $key, $val ) = each( $member_type_options ) ) {
?>
<?=$val?>：<input type="text" value="<?=$dsp01[$key]?>" name="price01[]" style="width: 50px;">円<br>
<?php	
	}
?>
		</td>
	</tr>

	<tr>
		<td class="index_col" width="150">懇親会：</td>
		<td class="value_col">
<?php
	reset( $member_type_options );
	while( list( $key, $val ) = each( $member_type_options ) ) {
?>
<?=$val?>：<input type="text" value="<?=$dsp02[$key]?>" name="price02[]" style="width: 50px;">円<br>
<?php	
	}
?>
		</td>
	</tr>

	<tr>
		<td class="index_col" width="150">事前送付：</td>
		<td class="value_col">
<?php
	reset( $member_type_options );
	while( list( $key, $val ) = each( $member_type_options ) ) {
?>
<?=$val?>：<input type="text" value="<?=$dsp03[$key]?>" name="price03[]" style="width: 50px;">円<br>
<?php	
	}
?>
		</td>
	</tr>
</table>
<br>
<div style="text-align: center;">
<input type="submit" value="<?=$submit?>" name="OK_1">
</div>
<br>
</td></tr></table>
</td>
</tr>
</table>
</form>

</body>
</html>
