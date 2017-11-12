<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_SYMP_PROG_SEARCH'; // 検索用セッション名

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
	}

	$symp_id = $_SESSION[ 'JILM_SYMP_ID' ];


// リクエスト処理
// ----------------------------------------
	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] != '';
		
		$_SESSION[ 'JILM_SYMP_ID' ]      = stripslashes( $_GET[ 'symp_id' ] );
		$_SESSION[ 'JILM_SYMP_PROG_ID' ] = stripslashes( $_GET[ 'program_id' ] );

		// 編集画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_prog_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] != '';

		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_POST[ 'symp_id' ] );

		// 新規追加ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_prog_regist.php?INIT_FLG=1" );
		exit;
	}

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';
		
		$program_id = stripslashes( $_GET[ 'symp_prog_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE symp_program_data SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        program_id = "' . $program_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_prog_list.php" );
		exit;

	}

	if ( $_POST[ 'BACK' ] != '' ) {
		$_POST[ 'BACK' ] != '';

		$_SESSION[ 'JILM_SYMP_ID' ] = NULL;

		// 新規追加ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_list.php" );
		exit;
	}


// 情報読込
// ----------------------------------------

	// シンポジウムの名称読込
	$symp_data = symposium_Data_Read_By_ID( $symp_id );
	$symp_name = $symp_data[ 'symp_name' ];
	
	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM symp_program_data";
	$sql .= "    WHERE";
	$sql .= "        symp_id = '" . $symp_id . "' AND";
	$sql .= "        status = 0";
	$sql .= "    ORDER BY start_time";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		// ページ当たりの件数の取得
		$dsp_cnt = 40;
		$dsp_page = $_GET[ "dsp_page" ];
		if ($dsp_page == "")    { $dsp_page = 1; }

		// ＭＡＸページの取得
		$max_page = floor($max_cnt / $dsp_cnt) + 1;
		if (!($max_cnt % $dsp_cnt)) { $max_page--; }

		// ページリンクの作成
		for ($i=1; $i<=$max_page; $i++) {
			if ($dsp_page != 1 && $i == $dsp_page - 1) {
				$page_link1 = "[ <a href='symp_prog_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='symp_prog_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
			}
		}
		if ($dsp_page != $max_page || $max_cnt % $dsp_cnt == 0) {
			$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
		} else {
			$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . ($max_cnt % $dsp_cnt) . "件表示";
		}

		$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
		$end_cnt = $dsp_page * $dsp_cnt - 1;

		$j = 1; // プログラム順番

		// データの頁表示
		for ($i=0; $i<$max_cnt; $i++) {

			if ( $i >= $stt_cnt && $i <= $end_cnt ) {

				$program_id      = cn_contract( $res, $i, 'program_id' );
				$symp_id         = cn_contract( $res, $i, 'symp_id' );
				$start_time      = cn_contract( $res, $i, 'start_time' );
				$program_name    = cn_contract( $res, $i, 'program_name' );
				$program_time_text = cn_contract( $res, $i, 'program_time_text' );
				$kouensya_name   = cn_contract( $res, $i, 'kouensya_name' );
				$kouensya_info01 = cn_contract( $res, $i, 'kouensya_info01' );
				$program_biko01  = cn_contract( $res, $i, 'program_biko01' );

				$tbl .= '<form method="GET" name="listForm' . $program_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";

				$tbl .= '<input type="hidden" name="program_id" value="' . $program_id . '">' . "\n";
				$tbl .= '<input type="hidden" name="symp_id" value="' . $symp_id . '">' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;text-align: center;">' . $j . '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 24px;text-align: center;">' . "\n";
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $program_id . ',\'' . $program_name . '\')">&nbsp;' . "\n";
				$tbl .= '</td>' . "\n";

				$tbl .= '<td>';
				$tbl .= $program_name . '<br>';
				$tbl .= '(' . $program_time_text . ')';
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 16px;padding: 4px 0;text-align: center;">';
				$tbl .= '講演者：' . $kouensya_name . '<br>';
				$tbl .= '所属：' . $kouensya_info01 . '<br>';
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 16px;padding: 4px 0;text-align: center;">';
				$tbl .= $program_biko01;
				$tbl .= '</td>' . "\n";

				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

				$j++;

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "symp_prog_list.php";
	$title  = "プログラム一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>