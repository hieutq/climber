<?php
// *******************************************************************
// 軽金属学会 DB設定ファイル　Encording UTF-8
// *******************************************************************
error_reporting(E_WARNING | E_PARSE);
date_default_timezone_set('Asia/Tokyo');

// データベース
//1:mysql 2:postgresql
define("CMN_DBTYPE", 1);
define("CMN_HOST", "localhost");
define("CMN_USER", "root");
define("CMN_PASS", "");
define("CMN_PORT", 5432);
define("CMN_DATB", "old_climber");

// ＦＲＯＭメールアドレス
define("CMN_FROMML", "790cd5d5a8-cdd944@inbox.mailtrap.io");
define("BASE_URL", "");

// PAGER初期設定
define(PAGE_VALUE, "dsp");
define(PER_PAGE, 10);
define(VIEW_PAGE_MENU_WIDTH, 5);
define(PREV_MARK, "PREV");
define(NEXT_MARK, "NEXT");

?>