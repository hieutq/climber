<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_ADMIN_CALENDAR_SEARCH'; // 検索用セッション名

	// 設定配列
	$year_options = $CONFIG_CALENDAR_YEAR_TYPE;

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_search ] = NULL;
	}


// リクエスト処理
// ----------------------------------------
	if ( $_POST[ 'SEARCH_ON' ] != '' ) {
		$_POST[ 'SEARCH_ON' ] = NULL;
		$_SESSION[ $s_search ]['year']      = stripslashes( $_POST[ 'search_year' ] );
	}

	if ( $_POST[ 'SEARCH_RESET' ] != '' ) {

		$_SESSION[ $s_search ] = NULL;

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/calendar_list.php" );
		exit;
	}

	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] != '';
		
		$_SESSION[ 'JILM_CAL_ID' ] = stripslashes( $_GET[ 'cal_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/calendar_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] != '';

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/calendar_regist.php?INIT_FLG=1" );
		exit;
	}

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';
		
		$cal_id = stripslashes( $_GET[ 'cal_id' ] );
		
		$data = array();
		$data['cal_id'] = $cal_id;
		
		// DBをUPDATE
		calendar_Data_Delete( $data );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/calendar_list.php" );
		exit;

	}

// 情報読込
// ----------------------------------------
	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM calendar_data";
	$sql .= "    WHERE";
	if ( $_SESSION[ $s_search ]['year'] ) {
		$next_year = $_SESSION[ $s_search ]['year'] + 1;
		$next_year .= '0000';

		$before_year = $_SESSION[ $s_search ]['year'] - 1;
		$before_year .= '1231';

		$sql .= ' ( cal_date < "' . $next_year . '" AND  cal_date > "' . $before_year . '" ) AND ' ;
	}
	$sql .= "        status = 0";
	$sql .= "    ORDER BY -cal_date";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		// ページ当たりの件数の取得
		$dsp_cnt = 25;
		$dsp_page = $_GET[ "dsp_page" ];
		if ($dsp_page == "")    { $dsp_page = 1; }

		// ＭＡＸページの取得
		$max_page = floor($max_cnt / $dsp_cnt) + 1;
		if (!($max_cnt % $dsp_cnt)) { $max_page--; }

		// ページリンクの作成
		for ($i=1; $i<=$max_page; $i++) {
			if ($dsp_page != 1 && $i == $dsp_page - 1) {
				$page_link1 = "[ <a href='calendar_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='calendar_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
			}
		}
		if ($dsp_page != $max_page || $max_cnt % $dsp_cnt == 0) {
			$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
		} else {
			$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . ($max_cnt % $dsp_cnt) . "件表示";
		}

		$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
		$end_cnt = $dsp_page * $dsp_cnt - 1;


		// データの頁表示
		for ($i=0; $i<$max_cnt; $i++) {

			if ( $i >= $stt_cnt && $i <= $end_cnt ) {

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
				$update_dt       = cn_contract( $res, $i, 'update_dt' );
				$regist_dt       = cn_contract( $res, $i, 'regist_dt' );

				$delete_link = date_Format_1($cal_date);
				$year = substr( $cal_date, 0, 4 );


				$tbl .= '<form method="GET" name="listForm' . $cal_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";

				$tbl .= '<input type="hidden" name="cal_id" value="' . $cal_id . '">' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 24px;text-align: center;">' . "\n";
				$tbl .= '<input type="submit" name="EDIT" value=" 編集 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $cal_id . ',\'' . $delete_link . '\')">' . "\n";
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap;text-align: center;">';
				$tbl .= $year . '年度<br /><span style="font-weight: bold;">' . nl2br($cal_date_text) . '</span>';
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap;text-align: center;">';
				$tbl .= $cal_text_1 . '<br>' . $cal_text_2;
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap;text-align: center;">';
				$tbl .= $cal_syusai;
				$tbl .= '</td>' . "\n";

				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "calendar_list.php";
	$title  = "カレンダー一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>