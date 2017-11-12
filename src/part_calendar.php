<?php
// *******************************************************************
// カレンダー　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	if ( $_SESSION[ 'CALENDAR_YEAR' ] != '' ) {
		$target_year = $_SESSION[ 'CALENDAR_YEAR' ];
	} else {
		$target_year = date( 'Y' );
	}

/*
	// 年度計算
	$next_year = $target_year + 1;
	$next_year .= '0000';

	$before_year = $target_year - 1;
	$before_year .= '1231';
*/
	// 翌年及び昨年のカレンダーはあるか
	$nyear = $target_year + 1;
	$byear = $target_year - 1;

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM calendar_data";
	$sql .= " WHERE DATE_FORMAT(cal_date, '%Y') = " . $nyear;
	$sql .= "  AND status = 0";
	$res = cn_query( $sql, $cnn );
	if ($res == true){
		$ny_cnt = cn_count($res);
	}
	$sql2  = "SELECT * FROM calendar_data";
	$sql2 .= " WHERE DATE_FORMAT(cal_date, '%Y') = " . $byear;
	$sql2 .= "  AND status = 0";
	$res2 = cn_query( $sql2, $cnn );
	if ($res2 == true){
		$by_cnt = cn_count($res2);
	}
	db_close($cnn);

	if( $ny_cnt > 0 ){
		$link_year = $target_year + 1;
		$link_year_text1 = '<a href="?mode=calendar_list&year=' . $link_year . '">';
		$link_year_text1 .= '&gt;&gt;' . $link_year . '年カレンダーはこちら';
		$link_year_text1 .= '</a>';
	}else{
		$link_year = $target_year + 1;
		$link_year_text1 = $link_year . '年カレンダーはこちら';
	}

	if( $by_cnt > 0 ){
		$link_year = $target_year - 1;
		$link_year_text2 = '<a href="?mode=calendar_list&year=' . $link_year . '">';
		$link_year_text2 .= '&gt;&gt;' . $link_year . '年カレンダーはこちら';
		$link_year_text2 .= '</a>';
	}else{
		$link_year = $target_year - 1;
		$link_year_text2 = $link_year . '年カレンダーはこちら';
	}

	if( date( 'Y' ) != $_SESSION[ 'CALENDAR_YEAR' ] ){
		$link_year_text3 = '<a href="?mode=calendar_list&year=' . date( 'Y' ) . '">';
		$link_year_text3 .= '&gt;&gt;本年度カレンダーに戻る';
		$link_year_text3 .= '</a>';
	}else{
		$link_year_text3 = '本年度カレンダーに戻る';
	}
/*
	$last_year = date( 'Y' ) - 1;
	$link_year = $last_year;
	$link_year_text1 = '<a href="?mode=calendar_list&year=' . $link_year . '">';
	$link_year_text1 .= '&gt;&gt;' . $link_year . '年カレンダーはこちら';
	$link_year_text1 .= '</a>';

	$link_year = $last_year - 1;
	$link_year_text2 = '<a href="?mode=calendar_list&year=' . $link_year . '">';
	$link_year_text2 .= '&gt;&gt;' . $link_year . '年カレンダーはこちら';
	$link_year_text2 .= '</a>';

	$link_year = $last_year - 2;
	$link_year_text3 = '<a href="?mode=calendar_list&year=' . $link_year . '">';
	$link_year_text3 .= '&gt;&gt;' . $link_year . '年カレンダーはこちら';
	$link_year_text3 .= '</a>';
*/
// リクエスト処理
// ------------------------------------



// データ読み込み
// ------------------------------------
	$tbl = '';

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM calendar_data";
	$sql .= "    WHERE";
	$sql .= "        DATE_FORMAT(cal_date, '%Y') = " . $target_year . " AND";
	$sql .= "        status = 0";
	$sql .= "    ORDER BY -cal_date";
	$res = cn_query( $sql, $cnn );

	if ($res == true){
		$max_cnt = cn_count($res);

		// データの頁表示
		for ($i=0; $i<$max_cnt; $i++) {

			$cal_id          = cn_contract( $res, $i, 'cal_id' );
			$cal_date        = cn_contract( $res, $i, 'cal_date' );
			$cal_date_text   = cn_contract( $res, $i, 'cal_date_text' );
			$cal_text_1      = cn_contract( $res, $i, 'cal_text_1' );
			$cal_text_2      = cn_contract( $res, $i, 'cal_text_2' );
			$cal_link_1      = cn_contract( $res, $i, 'cal_link_1' );
			$cal_link_2      = cn_contract( $res, $i, 'cal_link_2' );
			$cal_syusai      = cn_contract( $res, $i, 'cal_syusai' );
			$cal_syusai_link = cn_contract( $res, $i, 'cal_syusai_link' );
			$dl_type         = cn_contract( $res, $i, 'dl_type' );
			$cal_colored     = cn_contract( $res, $i, 'cal_colored' );
			$update_dt       = cn_contract( $res, $i, 'update_dt' );
			$regist_dt       = cn_contract( $res, $i, 'regist_dt' );
		

			if ( ! empty( $cal_link_1 ) ) {
				$cal_text_1 = '<a href="' . $cal_link_1 . '">' . $cal_text_1 . '</a>';
			}
			if ( ! empty( $cal_link_2 ) ) {
				$cal_text_2 = '<a href="' . $cal_link_2 . '">' . $cal_text_2 . '</a>';
			}
			if ( ! empty( $cal_syusai_link ) ) {
				$cal_syusai = '<a href="' . $cal_syusai_link . '">' . $cal_syusai . '</a>';
			}

			$color_text = '';
			if ( $cal_colored == 1 ) {
				$color_text = 'bgcolor="#F3F8F7"';
			}

$tbl .= '<tr>' . "\n";
$tbl .= '<td ' . $color_text .'>' . nl2br($cal_date_text) . '</td>' . "\n";
$tbl .= '<td ' . $color_text .'>' . nl2br($cal_text_1) . '<br />' . nl2br($cal_text_2) . '</td>' . "\n";
$tbl .= '<td ' . $color_text .'>' . nl2br($cal_syusai) . '</td>' . "\n";
$tbl .= '</tr>' . "\n";



		}
	}

	db_close($cnn);



// 出力設定
// ------------------------------------
	$calendar_tbl = $tbl;



?>