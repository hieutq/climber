<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_BOOK_ORDER_SEARCH'; // 検索用セッション名

	// 設定配列
	$member_kubun01_type = $CONFIG_MEMBER_TYPE;

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
	}


// リクエスト処理
// ----------------------------------------
	if ( $_GET[ 'LOOK' ] != '' ) {
		$_GET[ 'LOOK' ] != '';
		
		$_SESSION[ 'JILM_BOOK_SELL_ID' ] = stripslashes( $_GET[ 'book_sell_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_order_look.php?INIT_FLG=1" );
		exit;

	}

/*
	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';
		
		$symp_id = stripslashes( $_GET[ 'symp_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE symposium_data SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        symp_id = "' . $symp_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_order_list.php" );
		exit;

	}
*/


// 情報読込
// ----------------------------------------
	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM log_book_sell";
	$sql .= "    INNER JOIN book_data ON";
	$sql .= "        log_book_sell.book_id = book_data.book_id";
	$sql .= "    WHERE";
	$sql .= "        log_book_sell.status = 0";
	$sql .= "    ORDER BY -log_book_sell.book_sell_id";
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
				$page_link1 = "[ <a href='book_order_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='book_order_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

				$book_sell_id   = cn_contract( $res, $i, 'book_sell_id' );
				$book_id        = cn_contract( $res, $i, 'book_id' );
				$book_name      = cn_contract( $res, $i, 'book_name' );
				$book_cnt       = cn_contract( $res, $i, 'book_cnt' );
				$member_name    = cn_contract( $res, $i, 'member_name' );
				$member_kubun01 = cn_contract( $res, $i, 'member_kubun01' );
				$book_price1    = cn_contract( $res, $i, 'book_price1' );
				$book_price2    = cn_contract( $res, $i, 'book_price2' );
				$regist_dt      = cn_contract( $res, $i, 'regist_dt' );


				$book_price_text = book_Buy_Calc_Price($member_kubun01, $book_cnt, $book_price1, $book_price2 );


				$tbl .= '<form method="GET" name="listForm' . $book_sell_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";

				$tbl .= '<input type="hidden" name="book_sell_id" value="' . $book_sell_id . '">' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;text-align: center;">' . $book_sell_id . '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 24px;text-align: center;">' . "\n";

				$tbl .= '<input type="submit" name="LOOK" value=" 内容確認 ">&nbsp;' . "\n";
				$tbl .= '<!--<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $book_sell_id . ',\'' . $symp_name . '\')">-->' . "\n";
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 16px;padding: 4px 0;padding-left: 10px;">';
				$tbl .= $book_price_text . '<br>';
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 16px;padding: 4px 0;padding-left: 10px;">';
				$tbl .= '<span style="font-weight: bold;">' . $member_name . '</span>(' . $member_kubun01_type[ $member_kubun01 ] . ')<br>';
				$tbl .= $regist_dt . '<br>';
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="padding-left: 10px;">';
				$tbl .= $book_name . '(' . $book_cnt . '冊)<br>';
				$tbl .=  '</td>' . "\n";


				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "book_order_list.php";
	$title  = "シンポジウム・セミナー一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>