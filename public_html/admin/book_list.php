<?php
// *******************************************************************
// 書籍申込一覧　PHP　Encording UTF-8
// *******************************************************************

	session_start();


	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../admin/book_list.php" );

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?=$title?></title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
<script type="text/javascript">
<!--
	function delete_ok(id,name) {
		var alert_text = "『" + name + "』を削除します。よろしいですか？";
		var form_id = "listForm" + id;
		target_form = window.document.forms[form_id];

		if (window.confirm( alert_text )) {


		} else {
			target_form.DELETE.value = '';
		}

		return false;
	}
-->
</script>
</head>
<body>
<div id="admin_cts">
<div id="title">書籍 一覧</div>

<form method="POST" action="">
<table class="search_tbl">
	<tr>
	<th>■検索</th>
		<td>
		<? if($err_msg != ""){ ?>
		<span style="color:red"><?=$err_msg?></span><br>
		<? } ?>
		<div style="float: left;">
			<div style="margin-right: 20px;">
			　書籍No：<input type="text" name="search_sid" value="<?=$dsp_search['book_sid']?>" style="width: 40px;">&nbsp;
			　書籍ID：<input type="text" name="search_id" value="<?=$dsp_search['book_id']?>" style="width: 40px;"><br>
			　書籍名：<input type="text" name="search_name" value="<?=$dsp_search['book_name']?>" style="width: 80px;"><br>
			　　メモ：<input type="text" name="search_biko" value="<?=$dsp_search['book_biko']?>" style="width: 200px;">&nbsp;<br>
			</div>
		</div>
		ジャンル：<select name="search_genre"><option value="">----</option>
<?=
	html_options(
		$op_arr = $book_genre_options,
		$selected = $dsp_search['book_genre']
	);
?>
		</select><br />
		　発行年：<select name="search_year"><option value="">----</option>
<?=
	html_options(
		$op_arr = $book_year_options,
		$selected = $dsp_search['book_year']
	);
?>
			</select><br>
		　　　　　　<input type="submit" value=" 検 索 " name="SEARCH_ON">&nbsp;
		<input type="submit" value=" リセット " name="SEARCH_RESET">
		</td></tr></table>
		</td>
	</tr>
</table>
</form>


<div id="list">
<?=$page_link1?> <?=$page_link2?>

<form method="POST" action="">
<input type="submit" name="REGIST" value=" 書籍追加 ">
</form>

<table class="ubar">
	<tr>
		<th width="50" style="text-align: center;">No</th>
		<th width="180" style="text-align: center;">処理</th>
		<th width="300" style="text-align: center;">タイトル・情報</th>
		<th width="180" style="text-align: center;">定価</th>
	</tr>

<?=$dsp_tbl?>

</table>
<?=$page_link1?> <?=$page_link2?>
<br>

</div>
</body>
</html>
