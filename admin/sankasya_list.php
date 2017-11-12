<?php

// 設定
// ----------------------------------------
	// セッション名
	$s_search = 'JILM_SANKASYA_SEARCH'; // 検索用セッション名

	// 設定配列
	$year_options         = $YEAR_TYPE;
	$month_options        = $MONT_TYPE;
	$day_options          = $DAYT_TYPE;
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE;
	$pay_status_type      = $CONFIG_PAY_TYPE;
	$pay_way_type         = $CONFIG_PAY_WAY_TYPE_TAIKAI_SANKA;
	$pay_menu_type        = $CONFIG_PAY_MENU_TYPE_LONG;
	$bill_type            = $CONFIG_PAY_BILL_TYPE;


	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$search_pay_options =  $pay_status_type;
	$convention_id = $_SESSION[ 'JILM_CONVENTION_ID' ];

	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ 'JILM_SANKASYA_SEARCH' ] = NULL;
	}

	if ( $_POST[ 'SEARCH_ON' ] != '' ) {
		$_POST[ 'SEARCH_ON' ] = NULL;
		$_SESSION[ $s_search ]['sanka_uid']        = stripslashes( $_POST[ 'search_sanka_uid' ] );
		$_SESSION[ $s_search ]['member_userid']    = stripslashes( $_POST[ 'search_member_userid' ] );
		$_SESSION[ $s_search ]['member_name']      = stripslashes( $_POST[ 'search_member_name' ] );
		$_SESSION[ $s_search ]['member_info']      = stripslashes( $_POST[ 'search_member_info' ] );
		$_SESSION[ $s_search ]['member_mail']      = stripslashes( $_POST[ 'search_member_mail' ] );
		$_SESSION[ $s_search ]['pay_status']       = stripslashes( $_POST[ 'search_pay_status' ] );
		$_SESSION[ $s_search ]['member_kubun01']   = stripslashes( $_POST[ 'search_member_kubun01' ] );
	}

	if ( $_POST[ 'SEARCH_RESET' ] != '' ) {

		$_SESSION[ $s_search ] = NULL;
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/sankasya_list.php" );
		exit;
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
		$_SESSION[ 'JILM_SANKASYA_ID' ] = stripslashes( $_GET[ 'sankasya_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/sankasya_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/sankasya_regist.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'SEMD_DM' ] != '' ) {
		$_POST[ 'SEMD_DM' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/dm_regist.php?INIT_FLG=1&TYPE=3" );
		exit;
	}

	if ( $_POST[ 'CSV_DL' ] != '' ) {
		$_POST[ 'CSV_DL' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// CSVファイル生成
		$csv_options['member_kubun']   = $member_kubun01_type;
		$csv_options['pay_way']        = $pay_way_type;
		$csv_options['pay_status']     = $pay_status_type;
		$csv_options['pay_bill']       = $bill_type;
		$csv_options['pay_menu']       = $pay_menu_type;
		$csv_name = sankasya_Data_Set_CSV($_POST[ 'convention_id' ], $csv_options);


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
		$sankasya_id = stripslashes( $_GET[ 'sankasya_id' ] );
		$pay_y = stripslashes( $_GET[ 'pay_y' ] );
		$pay_m = stripslashes( $_GET[ 'pay_m' ] );
		$pay_d = stripslashes( $_GET[ 'pay_d' ] );

		$pay_date = $pay_y . $pay_m . $pay_d;

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE sankasya_data SET';
		$sql .= '        pay_status = 2,';
		$sql .= '        pay_date = "' . mysql_real_escape_string( $pay_date ) . '",';
		$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . $convention_id . '" AND';
		$sql .= '        sankasya_id = "' . $sankasya_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/sankasya_list.php#id" . $sankasya_id );
		exit;

	}

	if ( $_GET[ 'PAY_OFF' ] != '' ) {
		$_GET[ 'PAY_OFF' ] = '';
		
		$convention_id = stripslashes( $_GET[ 'convention_id' ] );
		$sankasya_id = stripslashes( $_GET[ 'sankasya_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE sankasya_data SET';
		$sql .= '        pay_status = 1,';
		$sql .= '        pay_date = "",';
		$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . $convention_id . '" AND';
		$sql .= '        sankasya_id = "' . $sankasya_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/sankasya_list.php#id" . $sankasya_id );
		exit;

	}

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] = '';

		$convention_id = stripslashes( $_GET[ 'convention_id' ] );
		$sankasya_id = stripslashes( $_GET[ 'sankasya_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE sankasya_data SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . $convention_id . '" AND';
		$sql .= '        sankasya_id = "' . $sankasya_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/sankasya_list.php" );
		exit;


	}

	// 参加費読込
//	$convention_price_array = sanka_Price_Read( $_SESSION[ 'JILM_CONVENTION_ID' ] );

	// 大会データ読み込み
	$data = convention_Data_Read_By_ID( $_SESSION[ 'JILM_CONVENTION_ID' ] );
	$conv_name = $data[ 'conv_name' ];

	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM sankasya_data";
	$sql .= "    INNER JOIN sankasya_member_mast ON";
	$sql .= "    sankasya_data.sankasya_id = sankasya_member_mast.sankasya_id";
	$sql .= "    WHERE";
	$sql .= "        sankasya_data.convention_id = " . $_SESSION[ 'JILM_CONVENTION_ID' ] . " AND ";
	if ( $_SESSION[ $s_search ]['sanka_uid'] ) {
		$sql .= "        sankasya_data.sankasya_uid = '" . $_SESSION[ $s_search ]['sanka_uid'] . "' AND ";
	}
	if ( $_SESSION[ $s_search ]['member_userid'] ) {
		$sql .= "        sankasya_member_mast.member_userid = '" . $_SESSION[ $s_search ]['member_userid'] . "' AND ";
	}
	if ( $_SESSION[ $s_search ]['member_name'] ) {
		$sql .= "       ( sankasya_member_mast.member_name LIKE '%" . $_SESSION[ $s_search ]['member_name'] . "%' OR ";
		$sql .= "        sankasya_member_mast.member_kana LIKE '%" . $_SESSION[ $s_search ]['member_name'] . "%' ) AND ";
	}
	if ( $_SESSION[ $s_search ]['member_info'] ) {
		$sql .= "       ( sankasya_member_mast.member_info01 LIKE '%" . $_SESSION[ $s_search ]['member_info'] . "%' OR ";
		$sql .= "        sankasya_member_mast.member_info02 LIKE '%" . $_SESSION[ $s_search ]['member_info'] . "%' ) AND ";
	}
	if ( $_SESSION[ $s_search ]['member_mail'] ) {
		$sql .= "        sankasya_member_mast.member_mail LIKE '%" . $_SESSION[ $s_search ]['member_mail'] . "%' AND ";
	}
	if ( $_SESSION[ $s_search ]['pay_status'] ) {
		if ($_SESSION[ $s_search ]['pay_status'] === '1') { // 未入金の場合 pay_status = 0 も検索にHITさせる。（どこで0になっているか要調査）
			$sql .= "        ( sankasya_data.pay_status = '0' OR sankasya_data.pay_status = '1' ) AND ";
		} else {
			$sql .= "        sankasya_data.pay_status = '" . $_SESSION[ $s_search ]['pay_status'] . "' AND ";
		}
	}
	if ( $_SESSION[ $s_search ]['member_kubun01'] ) {
		$sql .= "        sankasya_member_mast.member_kubun01 = '" . $_SESSION[ $s_search ]['member_kubun01'] . "' AND ";
	}
	$sql .= "        sankasya_data.status = 0";
	$sql .= "    ORDER BY sankasya_data.sankasya_uid";
	$res  = cn_query($sql, $cnn);

	if ($res == true){

		$max_cnt = cn_count($res);

		if ( $max_cnt > 0 ) {
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
					$page_link1 = "[ <a href='sankasya_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
				}
				if ($dsp_page != $max_page && $i == $dsp_page + 1) {
					$page_link2 = "[ <a href='sankasya_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

//				if ( $i >= $stt_cnt && $i <= $end_cnt ) {

					$convention_id = cn_contract($res, $i, "convention_id");
					$sankasya_id   = cn_contract($res, $i, "sankasya_id");
					$sankasya_uid  = cn_contract($res, $i, "sankasya_uid");
					$member_id     = cn_contract($res, $i, "member_id" );
					$member_userid = cn_contract($res, $i, "member_userid");
					$pay_status    = cn_contract($res, $i, "pay_status");
					$pay_date      = cn_contract($res, $i, "pay_date");
					$pay_date_plan = cn_contract($res, $i, "pay_date_plan");
					$pay_way       = cn_contract($res, $i, "pay_way");
					$pay_way_text  = cn_contract($res, $i, "pay_way_text");
					$pay_money     = cn_contract($res, $i, "pay_money");
					$sanka_menu    = cn_contract($res, $i, "sanka_menu");
					$sanka_biko1   = cn_contract($res, $i, "sanka_biko1");

					$member_name   = cn_contract( $res, $i, 'member_name' );
					$member_kana   = cn_contract( $res, $i, 'member_kana' );
					$member_info01 = cn_contract( $res, $i, 'member_info01' );
					$member_info02 = cn_contract( $res, $i, 'member_info02' );
					$member_kubun01 = cn_contract( $res, $i, 'member_kubun01' );
					$member_mail   = cn_contract( $res, $i, 'member_mail' );
					$member_zip1   = cn_contract( $res, $i, 'member_zip1' );
					$member_zip2   = cn_contract( $res, $i, 'member_zip2' );
					$member_address = cn_contract( $res, $i, 'member_address' );
					$member_tel    = cn_contract( $res, $i, 'member_tel' );

					if ( $pay_date != '' ) {
						$pay_date_text = substr($pay_date,2,2) . '.' . substr($pay_date,4,2) . '.' . substr($pay_date,6,2);
					} else {
						$pay_date_text = '---';
					}

					if ( $pay_date_plan != '' ) {
						$pay_date_plan_text = substr($pay_date_plan,2,2) . '.' . substr($pay_date_plan,4,2) . '.' . substr($pay_date_plan,6,2);
					} else {
						$pay_date_plan_text = '---';
					}

					// 会員区分
					$member_kubun01_text = $member_kubun01_type[ $member_kubun01 ];

					// 送金方法
					if ( $pay_way != 99 ) {
						$pay_way_text = $pay_way_type[ $pay_way ];
					}

					// 参加項目の配列生成
					$sanka_menu_array = explode( ",", $sanka_menu );

					// 参加項目テキスト生成
					$sanka_menu_text = sankasya_Data_Get_Menu_Text(
									$sanka_array   = $sanka_menu_array,
									$pay_menu_type = $CONFIG_PAY_MENU_TYPE,
									$separator     = '　'
					);

					// 参加費の計算
					$pay_money = sankasya_Data_Calc_Price(
									$member_kubun = $member_kubun01,
									$sanka_array  = $sanka_menu_array,
									$conv_id      = $convention_id
					);



					$tbl .= '<form method="GET" name="listForm' . $sankasya_uid . '" action="">' . "\n";

					if ( $pay_status == 2 ) {
						$tbl .= '<tr>' . "\n";
					} else {
						$tbl .= '<tr class="colored">' . "\n";
					}

					$tbl .= '<input type="hidden" name="convention_id" value="' . $convention_id . '">' . "\n";
					$tbl .= '<input type="hidden" name="sankasya_id" value="' . $sankasya_id . '">' . "\n";

					$tbl .= '<td style="text-align: center;"><a name="id' . $sankasya_id . '">' . $sankasya_uid . '</a></td>' . "\n";

					$tbl .= '<td style="padding: 6px 0 6px 20px;white-space: nowrap;line-height: 25px; text-align: center;">' . "\n";
					if ( $pay_status != 2 ) {
						$year_options_html = html_options(
													$op_arr = $year_options,
													$selected = date( 'Y' )
												);
						$month_options_html = html_options(
													$op_arr = $month_options,
													$selected = date( 'm' )
												);
						$day_options_html = html_options(
													$op_arr = $day_options,
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
					$tbl .= '<input type="submit" value=" 削除 " name="DELETE" onClick="delete_ok(' . $sankasya_uid . ',' . '\'' . $member_name . '\');">&nbsp;' . "\n";
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
					$tbl .= '会員番号:<span style="font-weight: bold;">' . $member_userid . '</span>&nbsp;(' . $member_kubun01_text . ')<br>';
					$tbl .= $pay_money . '円<br>';
					$tbl .= $sanka_menu_text . '<br>';
					$tbl .= '</span></td>' . "\n";

					$tbl .= '<td style="padding: 6px 0 6px 20px;white-space: nowrap;"><span style="line-height: 16px;">';
					$tbl .= $member_zip1 . '-' . $member_zip2 . '<br>';
					$tbl .= $member_address . '<br>';
					$tbl .= 'TEL:' . $member_tel . '<br>';
					$tbl .= '</span></td>' . "\n";

					$tbl .= '<td style="padding: 6px 0 6px 20px;"><span style="line-height: 16px;">';
					$tbl .= '<p style="width: 200px; text-align: center;">' . $sanka_biko1 . '</p>';
					$tbl .= '</span></td>' . "\n";

					$tbl .= '</tr>' . "\n";
					$tbl .= '</form>' . "\n";

//				}
//				if ($i >= $end_cnt) { break; }

			}

		}

	}

	db_close($cnn);




// ******************************************************************

	$action = "sankasya_list.php";
	$title  = "講演申込 一覧";
	$submit = "　確 認　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];




?>