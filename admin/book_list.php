<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_ADMIN_BOOK_SEARCH'; // 検索用セッション名

	// 設定配列
	$book_year_options = $CONFIG_BOOK_YEAR_TYPE;
	$book_genre_options = book_Genre_Data_Read_Options();

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
		$_SESSION[ $s_search ]['book_id']      = stripslashes( $_POST[ 'search_id' ] );
		$_SESSION[ $s_search ]['book_sid']     = stripslashes( $_POST[ 'search_sid' ] );
		$_SESSION[ $s_search ]['book_name']    = stripslashes( $_POST[ 'search_name' ] );
		$_SESSION[ $s_search ]['book_biko']    = stripslashes( $_POST[ 'search_biko' ] );
		$_SESSION[ $s_search ]['book_genre']   = stripslashes( $_POST[ 'search_genre' ] );
		$_SESSION[ $s_search ]['book_year']    = stripslashes( $_POST[ 'search_year' ] );
	}

	if ( $_POST[ 'SEARCH_RESET' ] != '' ) {

		$_SESSION[ $s_search ] = NULL;

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_list.php" );
		exit;
	}

	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] != '';
		
		$_SESSION[ 'JILM_BOOK_ID' ] = stripslashes( $_GET[ 'book_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] != '';

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_regist.php?INIT_FLG=1" );
		exit;
	}

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';
		
		$book_id = stripslashes( $_GET[ 'book_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE book_data SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        book_id = "' . $book_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/book_list.php" );
		exit;

	}

// 情報読込
// ----------------------------------------
	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM book_data";
	$sql .= "    WHERE";
	if ( $_SESSION[ $s_search ]['book_id'] ) {
		$sql .= ' book_id = "' . $_SESSION[ $s_search ]['book_id'] . '" AND ';
	}
	if ( $_SESSION[ $s_search ]['book_sid'] ) {
		$sql .= ' book_sid = "' . $_SESSION[ $s_search ]['book_sid'] . '" AND ';
	}
	if ( $_SESSION[ $s_search ]['book_name'] ) {
		$sql .= ' book_name LIKE "%' . $_SESSION[ $s_search ]['book_name'] . '%" AND ';
	}
	if ( $_SESSION[ $s_search ]['book_biko'] ) {
		$sql .= ' book_biko LIKE "%' . $_SESSION[ $s_search ]['book_biko'] . '%" AND ';
	}
	if ( $_SESSION[ $s_search ]['book_genre'] ) {
		$sql .= ' book_genre = "' . $_SESSION[ $s_search ]['book_genre'] . '" AND ';
	}
	if ( $_SESSION[ $s_search ]['book_year'] ) {
		$sql .= ' book_year = "' . $_SESSION[ $s_search ]['book_year'] . '" AND ';
	}
	$sql .= "        status = 0";
	$sql .= "    ORDER BY book_genre,-book_sid";
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
				$page_link1 = "[ <a href='book_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='book_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

				$book_id      = cn_contract( $res, $i, 'book_id' );
				$book_sid     = cn_contract( $res, $i, 'book_sid' );
				$book_name    = cn_contract( $res, $i, 'book_name' );
				$book_genre   = cn_contract( $res, $i, 'book_genre' );
				$book_year    = cn_contract( $res, $i, 'book_year' );
				$book_price1  = cn_contract( $res, $i, 'book_price1' );
				$book_price2  = cn_contract( $res, $i, 'book_price2' );


				$tbl .= '<form method="GET" name="listForm' . $book_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";

				$tbl .= '<input type="hidden" name="book_id" value="' . $book_id . '">' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $book_sid . '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 24px;text-align: center;">' . "\n";
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $book_id . ',\'' . $book_name . '\')">' . "\n";
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap;">';
				$tbl .= '<span style="font-weight: bold;">' . $book_name . '</span><br>';
				$tbl .= '発行年:' . $book_year_options[ $book_year ] . '　　ジャンル:' . $book_genre_options[ $book_genre ];
				$tbl .= '　　書籍ID:' . $book_id;
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">';
				$tbl .= '定価：' . $book_price1 . '<br>';
				$tbl .= '会員：' . $book_price2 . '<br>';
				$tbl .= '</td>' . "\n";

				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "book_list.php";
	$title  = "書籍一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>