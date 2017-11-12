<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_SYMP_SANKA_SEARCH'; // 検索用セッション名

	// 設定配列
	$year_options         = $YEAR_TYPE;
	$month_options        = $MONT_TYPE;
	$day_options          = $DAYT_TYPE;
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE_SYMP;
	$symp_pay_status_type = $CONFIG_PAY_TYPE;
	$symp_pay_way_type    = $CONFIG_PAY_WAY_TYPE_SYMP;
	$symp_pay_bill_type   = $CONFIG_PAY_BILL_TYPE;

	$search_pay_options    = $CONFIG_PAY_TYPE;
	$search_member_options = $CONFIG_MEMBER_TYPE;

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_search ] = NULL;
	}

	$symp_id = $_SESSION[ 'JILM_SYMP_ID' ];


// リクエスト処理
// ----------------------------------------
	if ( $_POST[ 'SEARCH_ON' ] != '' ) {
		$_POST[ 'SEARCH_ON' ] = NULL;
		$_SESSION[ $s_search ]['sanka_uid']        = stripslashes( $_POST[ 'search_sanka_uid' ] );
		$_SESSION[ $s_search ]['member_userid']    = stripslashes( $_POST[ 'search_member_userid' ] );
		$_SESSION[ $s_search ]['member_name']      = stripslashes( $_POST[ 'search_member_name' ] );
		$_SESSION[ $s_search ]['member_info']      = stripslashes( $_POST[ 'search_member_info' ] );
		$_SESSION[ $s_search ]['member_mail']      = stripslashes( $_POST[ 'search_member_mail' ] );
		$_SESSION[ $s_search ]['pay_status']       = stripslashes( $_POST[ 'search_pay_status' ] );
		$_SESSION[ $s_search ]['member_kubun01'] = stripslashes( $_POST[ 'search_member_kubun01' ] );
	}

	if ( $_POST[ 'SEARCH_RESET' ] != '' ) {

		// 戻り用にセッション保持
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_POST[ 'symp_id' ] );

		// 検索セッションクリア
		$_SESSION[ $s_search ] = NULL;

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_sanka_list.php" );
		exit;
	}

	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] != '';
		
		$_SESSION[ 'JILM_SYMP_ID' ]      = stripslashes( $_GET[ 'symp_id' ] );
		$_SESSION[ 'JILM_SYMP_SANKA_ID' ] = stripslashes( $_GET[ 'sanka_id' ] );

		// 編集画面ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_sanka_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] != '';

		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_POST[ 'symp_id' ] );

		// 新規追加ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_sanka_regist.php?INIT_FLG=1" );
		exit;
	}

	if ( $_POST[ 'SEMD_DM' ] != '' ) {
		$_POST[ 'SEMD_DM' ] = '';
		
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_POST[ 'symp_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/dm_regist.php?INIT_FLG=1&TYPE=4" );
		exit;
	}

	if ( $_POST[ 'CSV_DL' ] != '' ) {
		$_POST[ 'CSV_DL' ] = '';
		
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_POST[ 'symp_id' ] );

		// CSVファイル生成
		$csv_options['member_kubun']   = $member_kubun01_type;
		$csv_options['pay_way']        = $symp_pay_way_type;
		$csv_options['pay_status']     = $symp_pay_status_type;
		$csv_name = symp_Sanka_Data_Set_CSV($_SESSION[ 'JILM_SYMP_ID' ], $csv_options);


		// ＣＳＶデータのダウンロード
		$save_dir  = '../../csv/';
		$file_name = $csv_name;

		header ("Content-Disposition: attachment; filename=$file_name");
		header ("Content-type: vnd.ms-excel");
		readfile ($save_dir . $file_name);

	}

	if ( $_GET[ 'PAY_ON' ] != '' ) {
		$_GET[ 'PAY_ON' ] = '';

		// 引数取得
		$input[ 'sanka_id' ] = stripslashes( $_GET[ 'sanka_id' ] );
		$pay_y    = stripslashes( $_GET[ 'pay_y' ] );
		$pay_m    = stripslashes( $_GET[ 'pay_m' ] );
		$pay_d    = stripslashes( $_GET[ 'pay_d' ] );

		$input[ 'pay_date' ] = $pay_y . $pay_m . $pay_d;

		// DBをUPDATE
		symp_Sanka_Data_Pay_On( $input );

		// 戻り用にセッション保持
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_sanka_list.php" );
		exit;
	}

	if ( $_GET[ 'PAY_OFF' ] != '' ) {
		$_GET[ 'PAY_OFF' ] = '';

		// 引数取得
		$input[ 'sanka_id' ] = stripslashes( $_GET[ 'sanka_id' ] );

		// DBをUPDATE
		symp_Sanka_Data_Pay_Off( $input );

		// 戻り用にセッション保持
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_sanka_list.php" );
		exit;
	}

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';

		// 引数取得
		$input[ 'sanka_id' ] = stripslashes( $_GET[ 'sanka_id' ] );

		// DBをUPDATE
		symp_Sanka_Data_Delete( $input );

		// 戻り用にセッション保持
		$_SESSION[ 'JILM_SYMP_ID' ] = stripslashes( $_GET[ 'symp_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/symp_sanka_list.php" );
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
	$sql  = "SELECT * FROM symp_sanka_data";
	$sql .= "    INNER JOIN symp_sanka_member_mast ON";
	$sql .= "    symp_sanka_data.sanka_id = symp_sanka_member_mast.sanka_id";
	$sql .= "    WHERE";
	$sql .= "        symp_sanka_data.symp_id = " . $_SESSION[ 'JILM_SYMP_ID' ] . " AND ";

	if ( $_SESSION[ $s_search ]['sanka_uid'] ) {
		$sql .= "        symp_sanka_data.sanka_uid = '" . $_SESSION[ $s_search ]['sanka_uid'] . "' AND ";
	}
	if ( $_SESSION[ $s_search ]['member_userid'] ) {
		$sql .= "        symp_sanka_member_mast.member_userid = '" . $_SESSION[ $s_search ]['member_userid'] . "' AND ";
	}
	if ( $_SESSION[ $s_search ]['member_name'] ) {
		$sql .= "       ( symp_sanka_member_mast.member_name LIKE '%" . $_SESSION[ $s_search ]['member_name'] . "%' OR ";
		$sql .= "        symp_sanka_member_mast.member_kana LIKE '%" . $_SESSION[ $s_search ]['member_name'] . "%' ) AND ";
	}
	if ( $_SESSION[ $s_search ]['member_info'] ) {
		$sql .= "       ( symp_sanka_member_mast.member_info01 LIKE '%" . $_SESSION[ $s_search ]['member_info'] . "%' OR ";
		$sql .= "        symp_sanka_member_mast.member_info02 LIKE '%" . $_SESSION[ $s_search ]['member_info'] . "%' ) AND ";
	}
	if ( $_SESSION[ $s_search ]['member_mail'] ) {
		$sql .= "        symp_sanka_member_mast.member_mail LIKE '%" . $_SESSION[ $s_search ]['member_mail'] . "%' AND ";
	}
	if ( $_SESSION[ $s_search ]['pay_status'] ) {
		$sql .= "        symp_sanka_data.pay_status = '" . $_SESSION[ $s_search ]['pay_status'] . "' AND ";
	}
	if ( $_SESSION[ $s_search ]['member_kubun01'] ) {
		$sql .= "        symp_sanka_member_mast.member_kubun01 = '" . $_SESSION[ $s_search ]['member_kubun01'] . "' AND ";
	}

	$sql .= "        symp_sanka_data.status = 0";
	$sql .= "    ORDER BY symp_sanka_data.sanka_id DESC";
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
				$page_link1 = "[ <a href='symp_sanka_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='symp_sanka_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

				$sanka_id      = cn_contract($res, $i, 'sanka_id');
				$symp_id       = cn_contract($res, $i, 'symp_id');
				$sanka_uid     = cn_contract($res, $i, 'sanka_uid');
				$pay_status    = cn_contract($res, $i, 'pay_status');
				$pay_date      = cn_contract($res, $i, 'pay_date');
				$pay_date_plan = cn_contract($res, $i, 'pay_date_plan');
				$pay_way       = cn_contract($res, $i, 'pay_way');
				$pay_way_text  = cn_contract($res, $i, 'pay_way_text');
				$pay_money     = cn_contract($res, $i, 'pay_money');
				$sanka_biko1   = cn_contract($res, $i, 'sanka_biko1');

				$member_id      = cn_contract( $res, $i, 'member_id' );
				$member_userid  = cn_contract( $res, $i, 'member_userid');
				$member_name    = cn_contract( $res, $i, 'member_name' );
				$member_kana    = cn_contract( $res, $i, 'member_kana' );
				$member_info01  = cn_contract( $res, $i, 'member_info01' );
				$member_info02  = cn_contract( $res, $i, 'member_info02' );
				$member_kubun01 = cn_contract( $res, $i, 'member_kubun01' );
				$member_mail    = cn_contract( $res, $i, 'member_mail' );
				$member_zip1    = cn_contract( $res, $i, 'member_zip1' );
				$member_zip2    = cn_contract( $res, $i, 'member_zip2' );
				$member_address = cn_contract( $res, $i, 'member_address' );
				$member_tel     = cn_contract( $res, $i, 'member_tel' );
				$member_fax     = cn_contract( $res, $i, 'member_fax' );

				if ( $pay_date != '' ) {
					$pay_date_text = date_Format_1( $pay_date );
				} else {
					$pay_date_text = '---';
				}

				if ( $pay_date_plan != '' ) {
					$pay_date_plan_text = date_Format_1( $pay_date_plan );
				} else {
					$pay_date_plan_text = '---';
				}

				// 送金方法
				if ( $pay_way != 99 ) {
					$pay_way_text = $CONFIG_PAY_WAY_TYPE[ $pay_way ];
				}


				$tbl .= '<form method="GET" name="listForm' . $sanka_id . '" action="">' . "\n";

				if ( $pay_status == 2 ) {
					$tbl .= '<tr>' . "\n";
				} else {
					$tbl .= '<tr class="colored">' . "\n";
				}

				$tbl .= '<input type="hidden" name="symp_id" value="' . $symp_id . '">' . "\n";
				$tbl .= '<input type="hidden" name="sanka_id" value="' . $sanka_id . '">' . "\n";

				$tbl .= '<td style="text-align: center;">' . $sanka_uid . '</td>' . "\n";

				$tbl .= '<td style="padding: 6px 0 6px 20px;white-space: nowrap;line-height: 25px; text-align: center;">' . "\n";
				if ( $pay_status == 1 ) {
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
					$tbl .= '<input type="submit" name="PAY_ON" value="入金確定">&nbsp;<select name="pay_y">' . "\n";
					$tbl .= $year_options_html;
					$tbl .= '</select>/';

					$tbl .= '<select name="pay_m">' . "\n";
					$tbl .= $month_options_html;
					$tbl .= '</select>/';

					$tbl .= '<select name="pay_d">' . "\n";
					$tbl .= $day_options_html;
					$tbl .= '</select>';
					$tbl .= '<br>' . "\n";
				} else {
					$tbl .= '<input type="submit" name="PAY_OFF" value=" 入金取り消し "><br>' . "\n";
				}
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" value=" 削除 " name="DELETE" onClick="delete_ok(' . $sanka_id . ',' . '\'' . $member_name . '\');">&nbsp;' . "\n";
				$tbl .= '</td>' . "\n";

				$tbl .= '<td  style="padding: 6px 0 6px 20px;white-space: nowrap;"><span style="line-height: 16px;">';
				$tbl .= '入金日:' . $pay_date_text . '<br>';
				$tbl .= '予定日:' . $pay_date_plan_text . '<br>';
				$tbl .= '(' . $pay_way_text . ')</span></td>' . "\n";

				$tbl .= '<td style="padding: 6px 0 6px 20px;white-space: nowrap;"><span style="line-height: 16px;">';
				$tbl .= '<span style="font-weight: bold;">' . $member_name . '(' . $member_kana . ')</span><br>';
				$tbl .= '・<span style="color: #777;">' . $member_info01 . $member_info02 . '</span><br>';
				$tbl .= '・<a href="mailto:' . $member_mail . '">' . $member_mail . '</a>';
				$tbl .= '</span></td>' . "\n";

				$tbl .= '<td style="padding: 6px 0 6px 20px;white-space: nowrap;"><span style="line-height: 16px;">';
				$tbl .= '会員番号:<span style="font-weight: bold;">' . $member_userid . '</span>&nbsp;(' . $member_kubun01_type[ $member_kubun01 ] . ')<br>';
//				$tbl .= $pay_money . '円<br>';
//				$tbl .= $sanka_menu_text . '<br>';
				$tbl .= '</span></td>' . "\n";

				$tbl .= '<td style="padding: 6px 0 6px 20px;white-space: nowrap;"><span style="line-height: 16px;">';
				$tbl .= $member_zip1 . '-' . $member_zip2 . '<br>';
				$tbl .= $member_address . '<br>';
				$tbl .= 'TEL:' . $member_tel . ' FAX:' . $member_fax . '<br>';
				$tbl .= '</span></td>' . "\n";

				$tbl .= '<td style="padding: 6px 0 6px 20px;"><span style="line-height: 16px;">';
				$tbl .= '<p style="width: 200px; text-align: center;">' . $sanka_biko1 . '</p>';
				$tbl .= '</span></td>' . "\n";

				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

				$j++;

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "symp_sanka_list.php";
	$title  = "プログラム一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>