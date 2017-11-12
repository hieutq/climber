<?php
// *******************************************************************
// 管理者ログインページ　PHP　Encording UTF-8
// *******************************************************************

	session_start();

	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );

?>
<html id="menu">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<title>MENU</title>
<link rel="stylesheet" href="./css/admin.css" type="text/css" media="all" />
</head>


<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0">

<div id="system_menu">
<a href="contents_list.php?mode=bang" target="main">
<img src="./css/logo.gif" width="35" height="29" style="float:left" />
<span style="font-size: 18px">Applied</span><br />Contents Manager
</a></div>
<div id="sub_system">System Menu</div>

<div id="category">他画面へ</div>

<div id="menu">
<a href="../" target="_top">ホームページへ戻る</a>
</div>

<div id="category">コンテンツ管理</div>

<div id="menu">
<a href="category_list.php?mode=bang" target="main">カテゴリー管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="contents_regist.php?mode=bang" target="main">コンテンツ登録<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="contents_list.php?mode=bang" target="main">コンテンツ一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="topics_list.php" target="main">TOPICS<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="whats_new.php?mode=bang" target="main">Whats New<span class="arrow">&gt;&gt;</span></a>
</div>


<div id="category">会員管理</div>

<div id="menu">
<a href="member_regist.php?INIT_FLG=1" target="main">会員 登録<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="member_list.php?INIT_FLG=1" target="main">会員 一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="member_uncertified_list.php?INIT_FLG=1" target="main">未認証会員 一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="dm_regist.php?INIT_FLG=1&TYPE=1" target="main">DM 送信<span class="arrow">&gt;&gt;</span></a>
</div>


<div id="category">春秋期講演大会</div>

<div id="menu">
<a href="convention_regist.php?INIT_FLG=1" target="main">大会 登録<span class="arrow">&gt;&gt;</span></a>
</div>


<div id="menu">
<a href="convention_list.php?INIT_FLG=1" target="main">大会 一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="convention_cate_edit.php?INIT_FLG=1" target="main">大会分類 初期設定<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="convention_price_edit.php?INIT_FLG=1" target="main">大会料金 初期設定<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="category">シンポジウム・セミナー</div>

<div id="menu">
<a href="symp_regist.php?INIT_FLG=1" target="main">シンポジウム 登録<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="symp_list.php?INIT_FLG=1" target="main">シンポジウム 一覧<span class="arrow">&gt;&gt;</span></a>
</div>


<div id="category">書籍管理</div>

<div id="menu">
<a href="book_regist.php?INIT_FLG=1" target="main">書籍 登録<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="book_list.php?INIT_FLG=1" target="main">書籍 一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="book_genre_list.php?INIT_FLG=1" target="main">書籍 分類一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="book_order_list.php?INIT_FLG=1" target="main">書籍 注文一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="category">カレンダー管理</div>

<div id="menu">
<a href="calendar_list.php?INIT_FLG=1" target="main">カレンダー編集<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="category">その他</div>

<div id="menu">
<a href="notice_modify.php?id=1&mode=bang" target="main">個人情報保護方針<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="inquiry_admin.php?mode=bang" target="main">お問い合わせ管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="inquiry2_admin.php?mode=bang" target="main">技術相談室管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="mail_admin.php" target="main">お問い合わせ設定<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="link_list.php?mode=bang" target="main">リンク管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="tmp_modify.php" target="main">テンプレート編集<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="js_modify.php" target="main">JSファイル編集<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="css_modify.php" target="main">スタイルシート編集<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="category">ALMA</div>

<div id="menu">
<a href="alma_info.php" target="main">What's New管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="alma_news.php" target="main">News UpToDate管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="alma_category.php" target="main">ページカテゴリー管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="alma_content_regist.php" target="main">新規ページ追加<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="alma_content_list.php" target="main">ページ一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="alma_link_category.php" target="main">リンクカテゴリー管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="alma_link.php" target="main">リンク編集<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="alma_top_image.php" target="main">トップイメージ編集<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="category">ENGLISH</div>

<div id="menu">
<a href="eng_info.php" target="main">New管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="eng_news.php" target="main">News UpToDate管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="eng_category.php" target="main">ページカテゴリー管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="eng_content_regist.php" target="main">新規ページ追加<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="eng_content_list.php" target="main">ページ一覧<span class="arrow">&gt;&gt;</span></a>
</div>

<!--
<div id="menu">
<a href="eng_link_category.php" target="main">リンクカテゴリー管理<span class="arrow">&gt;&gt;</span></a>
</div>

<div id="menu">
<a href="eng_link.php" target="main">リンク編集<span class="arrow">&gt;&gt;</span></a>
</div>
-->
<div id="menu">
<a href="eng_top_image.php" target="main">トップイメージ編集<span class="arrow">&gt;&gt;</span></a>
</div>

</body></html>
