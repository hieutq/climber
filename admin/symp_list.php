<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_SYMP_SEARCH'; // 検索用セッション名

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
		
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] != '';

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_regist.php?INIT_FLG=1" );
		exit;
	}

	if ( $_GET[ 'SANKA_LIST' ] != '' ) {
		$_GET[ 'SANKA_LIST' ] != '';
		
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_sanka_list.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'PROGRAM_LIST' ] != '' ) {
		$_GET[ 'PROGRAM_LIST' ] != '';
		
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_prog_list.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'PROGRAM_REGIST' ] != '' ) {
		$_GET[ 'PROGRAM_LIST' ] != '';
		
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_prog_regist.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'VIEW_ON' ] != '' ) {
		
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		symposium_Data_View_On($_SESSION[ 'JILM_SYMP_ID' ]);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_list.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'VIEW_OFF' ] != '' ) {
		
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		symposium_Data_View_Off($_SESSION[ 'JILM_SYMP_ID' ]);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_list.php?INIT_FLG=1" );
		exit;

	}


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
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_list.php" );
		exit;

	}


// 情報読込
// ----------------------------------------
	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM symposium_data";
	$sql .= "    WHERE";
	$sql .= "        status = 0";
	$sql .= "    ORDER BY -symp_id";
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
				$page_link1 = "[ <a href='symp_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='symp_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

				$symp_id      = cn_contract( $res, $i, 'symp_id' );
				$symp_name    = cn_contract( $res, $i, 'symp_name' );
				$symp_date1  = cn_contract( $res, $i, 'symp_date1' );
				$symp_date2  = cn_contract( $res, $i, 'symp_date2' );
				$symp_date3 = cn_contract( $res, $i, 'symp_date3' );
				$view_status   = cn_contract($res, $i, "view_status");

				$symp_date1 = date_Format_1( $symp_date1 );
				$symp_date2 = date_Format_1( $symp_date2 );
				$symp_date3 = date_Format_1( $symp_date3 );

				if ( $view_status == 0 ) {
					$view_status_text = '<font style="color: #888;">非表示</span>';
				} else {
					$view_status_text = '<span style="color: #60b3de;font-weight: bold;">表示中</span>';
				}

				$tbl .= '<form method="GET" name="listForm' . $symp_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";

				$tbl .= '<input type="hidden" name="symp_id" value="' . $symp_id . '">' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;text-align: center;">' . $symp_id . '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 24px;text-align: center;white-space: nowrap;">' . "\n";

				$tbl .= '<input type="submit" name="PROGRAM_LIST" value=" プログラム一覧 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="PROGRAM_REGIST" value=" プログラム追加 "><br>' . "\n";
				$tbl .= '<input type="submit" name="SANKA_LIST" value=" 参加申込一覧 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 "><br>' . "\n";
				$tbl .= '<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $symp_id . ',\'' . $symp_name . '\')">' . "\n";
				if ( $view_status == 0 ) {
					$tbl .= '<input type="submit" name="VIEW_ON" value=" 表示する ">&nbsp;<br />' . "\n";
				} else {
					$tbl .= '<input type="submit" name="VIEW_OFF" value=" 非表示にする ">&nbsp;<br />' . "\n";
				}
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $view_status_text . '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap; line-height: 16px;padding: 4px 0;text-align: center;">';
				$tbl .= '申込開始：' . $symp_date1 . '<br>';
				$tbl .= '申込締切：' . $symp_date2 . '<br>';
				$tbl .= '　開催日：' . $symp_date3 . '<br>';
				$tbl .= '</td>' . "\n";

				$tbl .= '<td>';
				$tbl .= $symp_name . '<br>';
				$tbl .=  '</td>' . "\n";




				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "symp_list.php";
	$title  = "シンポジウム・セミナー一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>