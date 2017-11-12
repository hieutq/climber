<?php

// 設定
// ----------------------------------------

	$s_search = 'JILM_ADMIN_KOUENSYA_SEARCH'; // 検索用セッション名

	// 設定配列
	$search_pay_options = $CONFIG_PAY_TYPE;

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
		$_SESSION[ $s_search ]['id']    = stripslashes( $_POST[ 'search_id' ] );
		$_SESSION[ $s_search ]['name']  = stripslashes( $_POST[ 'search_name' ] );
		$_SESSION[ $s_search ]['info1'] = stripslashes( $_POST[ 'search_info1' ] );
		$_SESSION[ $s_search ]['mail']  = stripslashes( $_POST[ 'search_mail' ] );
		$_SESSION[ $s_search ]['pay']   = stripslashes( $_POST[ 'search_pay' ] );
	}

	if ( $_POST[ 'SEARCH_RESET' ] != '' ) {
		$_SESSION[ $s_search ] = NULL;
	}

	if ( $_POST[ 'BACK' ] ) {

		$_SESSION[ 'JILM_CONVENTION_ID' ] = NULL;

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_list.php" );
		exit;
	}

	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );
		$_SESSION[ 'JILM_KOUEN_ID' ] = stripslashes( $_GET[ 'kouen_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/kouensya_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/kouensya_regist.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'SEMD_DM' ] != '' ) {
		$_POST[ 'SEMD_DM' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/dm_regist.php?INIT_FLG=1&TYPE=2" );
		exit;
	}

	if ( $_POST[ 'CSV_DL' ] != '' ) {
		$_POST[ 'CSV_DL' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// 新しい講演申し込み分類
		$kouen_type_options = convention_Type_Array_Read( $_SESSION[ 'JILM_CONVENTION_ID' ] );
		$kouen_keishiki_options = $CONFIG_KOUEN_KEISHIKI;
		$kouen_head_options=$kouen_keishiki_options;
		foreach($kouen_type_options as $key => $val) {
			if (strpos($key, 'T') !== false)
			{
				$kouen_head_options[$key]=$val;
			}
		}

		// CSVファイル生成
		$csv_options['kouen_keishiki'] = $CONFIG_KOUEN_KEISHIKI;
		$csv_options['member_kubun']   = $CONFIG_MEMBER_TYPE_KOUEN;
		$csv_options['hapyo']          = $CONFIG_HAPYO_TYPE;
		$csv_options['pay_way']        = $CONFIG_PAY_WAY_TYPE;
		$csv_options['pay_status']     = $CONFIG_PAY_TYPE;
		$csv_options['kouen_head']     = $kouen_head_options;
		$csv_options['kouen_section_head'] = $CONFIG_TYPE_SECTION_HEAD;
		$csv_options['kouen_section_head_1'] = $CONFIG_TYPE_SECTION_HEAD_1;
		$csv_options['kouen_section_head_2'] = $CONFIG_TYPE_SECTION_HEAD_2;
		$csv_options['kouen_section_head_3'] = $CONFIG_TYPE_SECTION_HEAD_3;
		$csv_options['kouen_section_head_4'] = $CONFIG_TYPE_SECTION_HEAD_4;
		$csv_options['kouen_section_head_5'] = $CONFIG_TYPE_SECTION_HEAD_5;
		$csv_name = kouensya_Data_Set_CSV($_POST[ 'convention_id' ], $csv_options);


		// ＣＳＶデータのダウンロード
		$save_dir  = '../../csv/';
		$file_name = $csv_name;

		header ("Content-Disposition: attachment; filename=$file_name");
		header ("Content-type: vnd.ms-excel");
		readfile ($save_dir . $file_name);


	}

	if ( $_GET[ 'PAY_ON' ] != '' ) {
		$_GET[ 'PAY_ON' ] = '';
		
		$convention_id = stripslashes( $_GET[ 'convention_id' ] );
		$kouen_id = stripslashes( $_GET[ 'kouen_id' ] );
		$pay_y = stripslashes( $_GET[ 'pay_y' ] );
		$pay_m = stripslashes( $_GET[ 'pay_m' ] );
		$pay_d = stripslashes( $_GET[ 'pay_d' ] );

		$pay_date = $pay_y . $pay_m . $pay_d;

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE kouensya_data SET';
		$sql .= '        pay_status = 2,';
		$sql .= '        pay_date = "' . mysql_real_escape_string( $pay_date ) . '",';
		$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . $convention_id . '" AND';
		$sql .= '        kouen_id = "' . $kouen_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/kouensya_list.php#id" . $kouen_id );
		exit;

	}

	if ( $_GET[ 'PAY_OFF' ] != '' ) {
		$_GET[ 'PAY_OFF' ] = '';
		
		$convention_id = stripslashes( $_GET[ 'convention_id' ] );
		$kouen_id = stripslashes( $_GET[ 'kouen_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE kouensya_data SET';
		$sql .= '        pay_status = 1,';
		$sql .= '        pay_date = "",';
		$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . $convention_id . '" AND';
		$sql .= '        kouen_id = "' . $kouen_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/kouensya_list.php#id" . $kouen_id );
		exit;

	}

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] = '';

		$convention_id = stripslashes( $_GET[ 'convention_id' ] );
		$kouen_id = stripslashes( $_GET[ 'kouen_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE kouensya_data SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . $convention_id . '" AND';
		$sql .= '        kouen_id = "' . $kouen_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/kouensya_list.php" );
		exit;


	}


// 情報読込
// ----------------------------------------
	// 大会データ読み込み
	$data = convention_Data_Read_By_ID( $_SESSION[ 'JILM_CONVENTION_ID' ] );
	$conv_name = $data[ 'conv_name' ];

	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM kouensya_data";
	$sql .= "    WHERE";
	$sql .= "        convention_id = " . $_SESSION[ 'JILM_CONVENTION_ID' ] . " AND ";
	if ( $_SESSION[ $s_search ]['id'] ) {
		$sql .= ' kouen_uid = "' . $_SESSION[ $s_search ]['id'] . '" AND ';
	}
	if ( $_SESSION[ $s_search ]['name'] ) {
		$sql .= ' kouen_name LIKE "%' . $_SESSION[ $s_search ]['name'] . '%" AND ';
	}
	if ( $_SESSION[ $s_search ]['info1'] ) {
		$sql .= ' kouen_info01 LIKE "%' . $_SESSION[ $s_search ]['info1'] . '%" AND ';
	}
	if ( $_SESSION[ $s_search ]['mail'] ) {
		$sql .= ' kouen_mail LIKE "%' . $_SESSION[ $s_search ]['mail'] . '%" AND ';
	}
	if ( $_SESSION[ $s_search ]['pay'] ) {
		$sql .= ' pay_status = "' . $_SESSION[ $s_search ]['pay'] . '" AND ';
	}
	$sql .= "        status = 0";
	$sql .= "    ORDER BY kouen_uid";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);
/*
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
				$page_link1 = "[ <a href='kouensya_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='kouensya_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
			}
		}
		if ($dsp_page != $max_page || $max_cnt % $dsp_cnt == 0) {
			$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
		} else {
			$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . ($max_cnt % $dsp_cnt) . "件表示";
		}

		$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
		$end_cnt = $dsp_page * $dsp_cnt - 1;

*/
		// データの頁表示
		for ($i=0; $i<$max_cnt; $i++) {

//			if ( $i >= $stt_cnt && $i <= $end_cnt ) {

				$convention_id = cn_contract($res, $i, "convention_id");
				$kouen_id      = cn_contract($res, $i, "kouen_id");
				$kouen_uid     = cn_contract($res, $i, "kouen_uid");
				$pay_status    = cn_contract($res, $i, "pay_status");
				$pay_date      = cn_contract($res, $i, "pay_date");
				$kouen_name    = cn_contract($res, $i, "kouen_name");
				$kouen_info01  = cn_contract($res, $i, "kouen_info01");
				$kouen_mail    = cn_contract($res, $i, "kouen_mail");

				if ( $pay_status == 2 ) {
					$pay_date_text = substr($pay_date,2,2) . '.' . substr($pay_date,4,2) . '.' . substr($pay_date,6,2);
				} else {
					$pay_date_text = '---';
				}

				$tbl .= '<form method="GET" name="listForm' . $kouen_uid . '" action="">' . "\n";

				if ( $pay_status == 2 ) {
					$tbl .= '<tr>' . "\n";
				} else {
					$tbl .= '<tr class="colored">' . "\n";
				}

				$tbl .= '<input type="hidden" name="convention_id" value="' . $convention_id . '">' . "\n";
				$tbl .= '<input type="hidden" name="kouen_id" value="' . $kouen_id . '">' . "\n";
				$tbl .= '<td style="text-align: center;"><a name="id' . $kouen_id . '">' . $kouen_uid . '</a></td>' . "\n";
				$tbl .= '<td>' . $pay_date_text . '</td>' . "\n";
				$tbl .= '<td style="padding: 4px 0 4px 10px;"><span style="line-height: 15px;">';
				$tbl .= '<span style="font-weight: bold;">' . $kouen_name . '</span><br>';
				$tbl .= '・<span style="color: #777;">' . $kouen_info01 . '</span><br>';
				$tbl .= '・<a href="mailto:' . $kouen_mail . '">' . $kouen_mail . '</a>';
				$tbl .= '</span></td>' . "\n";
				$tbl .= '<td>' . "\n";
				if ( $pay_status != 2 ) {
					$year_options_html = html_options(
												$op_arr = $YEAR_TYPE,
												$selected = date( 'Y' )
											);
					$month_options_html = html_options(
												$op_arr = $MONT_TYPE,
												$selected = date( 'm' )
											);
					$day_options_html = html_options(
												$op_arr = $DAYT_TYPE,
												$selected = date( 'd' )
											);
					$tbl .= '<select name="pay_y">' . "\n";
					$tbl .= $year_options_html;
					$tbl .= '</select>年';

					$tbl .= '<select name="pay_m">' . "\n";
					$tbl .= $month_options_html;
					$tbl .= '</select>月';

					$tbl .= '<select name="pay_d">' . "\n";
					$tbl .= $day_options_html;
					$tbl .= '</select>日&nbsp;';
					$tbl .= '<input type="submit" name="PAY_ON" value="入金確定"><br>' . "\n";
				} else {
					$tbl .= '<input type="submit" name="PAY_OFF" value=" 入金取り消し ">&nbsp;' . "\n";
				}
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" value=" 削除 " name="DELETE" onClick="delete_ok(' . $kouen_uid . ',' . '\'' . $kouen_name . '\');">&nbsp;' . "\n";
				$tbl .= '</td>' . "\n";
				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

//			}
//			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "kouensya_list.php";
	$title  = "講演申込 一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];
	$convention_id = $_SESSION[ 'JILM_CONVENTION_ID' ];
?>