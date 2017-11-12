<?php
// *******************************************************************
// サイト内検索　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------

	if ( $_GET[ 'keywords1' ] != '' ) {
		$keyword = htmlspecialchars( $_GET[ 'keywords1' ], ENT-QUOTES );
		$_GET[ 'keywords1' ] = '';
	} else {
		header( 'Location: ./index.php' );
	}

// リクエスト処理
// ------------------------------------



// データ読み込み
// ------------------------------------

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM content_body'
		 . '    WHERE'
		 . '        ( cts_title LIKE "%' . $keyword . '%" || cts_body LIKE "%' . $keyword . '%" ) AND'
		 . '        status = 0';
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$contents_id = cn_contract($res, $i, "cts_id");
					$page_title  = cn_contract($res, $i, "cts_title");
					$page_body   = cn_contract($res, $i, "cts_body");

					$page_title = htmlspecialchars( $page_title, ENT_QUOTES );

					$page_body = strip_tags( $page_body );
					$page_body = mb_substr( $page_body, 0, 100, 'UTF-8' ) . '...';

					$out[$i]['contents_id'] = $contents_id;
					$out[$i]['page_title']  = $page_title;
					$out[$i]['page_body']   = $page_body;

				}
				if ($i >= $max_cnt) { break; }
			}
		}
	}

	db_close($cnn);



// 出力設定
// ------------------------------------
	$dsp = $out;
	$search_site_keyword = $keyword;



?>