<?php
// *******************************************************************
// 出版物一覧　PHP　Encording UTF-8
// *******************************************************************

	$book_genre_options = book_Genre_Data_Read_Options();

	$book_tbl = '';
	$j = 0;
	reset( $book_genre_options );
	while( list( $key, $val ) = each( $book_genre_options ) ) {

		$book_head = ''
. '<tr>' . "\n"
. '<th colspan="6"><a name="book_genre' . $key . '" id="book_genre' . $key . '"></a>' . $val . '</th>' . "\n"
. '</tr>' . "\n";
		$tbl = '';
		// 一覧出力
		$tbl = '';
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = "SELECT * FROM book_data";
		$sql .= "    WHERE";
		$sql .= "        book_genre = '" . $key . "' AND";
		$sql .= "        status     = 0";
		$sql .= "    ORDER BY book_sid";
		$res  = cn_query($sql, $cnn);

		if ($res == true){
			$max_cnt = cn_count($res);

			// データの頁表示
			for ($i=0; $i<$max_cnt; $i++) {

				$book_id      = cn_contract( $res, $i, 'book_id' );
				$book_sid     = cn_contract( $res, $i, 'book_sid' );
				$book_name    = cn_contract( $res, $i, 'book_name' );
				$book_genre   = cn_contract( $res, $i, 'book_genre' );
				$book_year    = cn_contract( $res, $i, 'book_year' );
				$book_price1  = cn_contract( $res, $i, 'book_price1' );
				$book_price2  = cn_contract( $res, $i, 'book_price2' );



				if ( !strpos( $book_price1, 'コピー' ) ) {
					$book_price1 = price_Format($book_price1);
				}
				$book_price2 = price_Format($book_price2);


				$tbl .= ''
. '<tr>' . "\n"
. '<td align="right">' . $book_sid . ' </td>' . "\n"
. '<td>' . $book_name . ' </td>' . "\n"
. '<td align="right">' . $book_year . ' </td>' . "\n"
. '<td align="right" nowrap="nowrap">' . $book_price1 . ' </td>' . "\n"
. '<td align="right" nowrap="nowrap">' . $book_price2 . ' </td>' . "\n"
. '<td><a href="./?mode=bookbuy&ID=' . $book_id . '">購入</a></td>' . "\n"
. '</tr>' . "\n";

			}
		}

		db_close($cnn);


		$book_tbl .= $book_head . $tbl;

		$j++;

	}



?>