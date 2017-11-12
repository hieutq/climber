<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_BOOK_GENRE_SEARCH'; // 検索用セッション名

	// 設定配列
	$book_genre_order_type = $CONFIG_BOOK_GENRE_ORDER;

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
	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] != '';
		
		$_SESSION[ 'JILM_BOOK_GENRE_ID' ] = stripslashes( $_GET[ 'genre_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_genre_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] != '';

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_genre_regist.php?INIT_FLG=1" );
		exit;
	}

	if ( $_GET[ 'RANK_ON' ] != '' ) {
		$_GET[ 'RANK_ON' ] != '';
		
		$genre_id    = stripslashes( $_GET[ 'genre_id' ] );
		$genre_order = stripslashes( $_GET[ 'genre_order' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE book_genre_data SET';
		$sql .= '        genre_order = "' . mysql_real_escape_string( $genre_order ) . '"';
		$sql .= '    WHERE';
		$sql .= '        genre_id = "' . $genre_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_genre_list.php" );
		exit;

	} 

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';
		
		$genre_id = stripslashes( $_GET[ 'genre_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE book_genre_data SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        genre_id = "' . $genre_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_genre_list.php" );
		exit;

	}


// 情報読込
// ----------------------------------------
	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM book_genre_data";
	$sql .= "    WHERE";
	$sql .= "        status = 0";
	$sql .= "    ORDER BY genre_order,genre_id";
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
				$page_link1 = "[ <a href='book_genre_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='book_genre_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

				$genre_id      = cn_contract( $res, $i, 'genre_id' );
				$genre_name    = cn_contract( $res, $i, 'genre_name' );
				$genre_order   = cn_contract( $res, $i, 'genre_order' );


				$tbl .= '<form method="GET" name="listForm' . $genre_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";

				$tbl .= '<input type="hidden" name="genre_id" value="' . $genre_id . '">' . "\n";



				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $genre_id . '</td>' . "\n";

				$tbl .= '<td style="line-height: 24px;padding: 4px 0;text-align: center;white-space: nowrap; ">' . "\n";
				$genre_options_html = html_options(
										$op_arr = $book_genre_order_type,
										$selected = $genre_order
									);
				$tbl .= '<select name="genre_order">' . "\n";
				$tbl .= $genre_options_html;
				$tbl .= '</select>&nbsp;';
				$tbl .= '<input type="submit" name="RANK_ON" value=" ランク決定 "><br>' . "\n";
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $genre_id . ',\'' . $genre_name . '\')">' . "\n";
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">';
				$tbl .= '<span style="font-weight: bold;">' . $genre_name . '</span>';
				$tbl .= '</td>' . "\n";

				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "book_genre_list.php";
	$title  = "書籍一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>