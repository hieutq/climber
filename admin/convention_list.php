<?php

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	if ( $_GET[ 'REGIST' ] != '' ) {
		$_GET[ 'REGIST' ] != '';

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_regist.php?INIT_FLG=1" );
		exit;
	}

	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] != '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'VIEW_ON' ] != '' ) {
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		convention_Data_View_On($_SESSION[ 'JILM_CONVENTION_ID' ]);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_list.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'VIEW_OFF' ] != '' ) {
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		convention_Data_View_Off($_SESSION[ 'JILM_CONVENTION_ID' ]);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_list.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'PDF_UPLOAD' ] != '' ) {
		$_GET[ 'PDF_UPLOAD' ] != '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_pdf.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'UPLOAD' ] != '' ) {
		$_GET[ 'UPLOAD' ] != '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/conv_file_list.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'KOUEN_LIST' ] != '' ) {
		$_GET[ 'KOUEN_LIST' ] != '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/kouensya_list.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'CHIEN' ] != '' ) {
		$_GET[ 'CHIEN' ] != '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_chien.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'SANKA_LIST' ] != '' ) {
		$_GET[ 'SANKA_LIST' ] != '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/sankasya_list.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE convention_data SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . $_SESSION[ 'JILM_CONVENTION_ID' ] . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_list.php" );
		exit;


	}



	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM convention_data";
	$sql .= "    WHERE status = 0";
	$sql .= "    ORDER BY -convention_id";
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
				$page_link1 = "[ <a href='convention_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='convention_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

				$convention_id = cn_contract($res, $i, "convention_id");
				$conv_name     = cn_contract($res, $i, "conv_name");
				$conv_open     = cn_contract($res, $i, "conv_open");
				$conv_place    = cn_contract($res, $i, "conv_place");
				$kouen_open    = cn_contract($res, $i, "kouen_open");
				$kouen_close   = cn_contract($res, $i, "kouen_close");
				$sanka_open    = cn_contract($res, $i, "sanka_open");
				$sanka_close   = cn_contract($res, $i, "sanka_close");
				$type_text     = cn_contract($res, $i, "type_text");
				$body_text     = cn_contract($res, $i, "body_text");
				$view_status   = cn_contract($res, $i, "view_status");

				if ( $view_status == 0 ) {
					$view_status_text = '<font style="color: #888;">非表示</span>';
				} else {
					$view_status_text = '<span style="color: #60b3de;font-weight: bold;">表示中</span>';
				}

				$kouen_open_text = substr($kouen_open,2,2) . '.' . substr($kouen_open,4,2) . '.' . substr($kouen_open,6,2);
				$kouen_close_text = substr($kouen_close,2,2) . '.' . substr($kouen_close,4,2) . '.' . substr($kouen_close,6,2);
				$sanka_open_text = substr($sanka_open,2,2) . '.' . substr($sanka_open,4,2) . '.' . substr($sanka_open,6,2);
				$sanka_close_text = substr($sanka_close,2,2) . '.' . substr($sanka_close,4,2) . '.' . substr($sanka_close,6,2);

				$tbl .= '<form method="GET" name="listForm' . $convention_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";
				$tbl .= '<input type="hidden" name="convention_id" value="' . $convention_id . '">' . "\n";
				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $conv_name . '</td>' . "\n";
				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $view_status_text . '</td>' . "\n";
				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $conv_open . '<br />' . $conv_place . '</td>' . "\n";
				$tbl .= '<td>' . $kouen_open_text . '<br /><span class="blue">' . $kouen_close_text . '</span></td>' . "\n";
				$tbl .= '<td>' . $sanka_open_text . '<br /><span class="blue">' . $sanka_close_text . '</span></td>' . "\n";
				$tbl .= '<td style="line-height: 22px;padding: 4px 10px;white-space: nowrap;">' . "\n";
				$tbl .= '<input type="submit" name="KOUEN_LIST" value=" 講演申込一覧 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="CHIEN" value=" 遅延申込 ">&nbsp;<br />' . "\n";
				$tbl .= '<input type="submit" name="SANKA_LIST" value=" 参加申込一覧 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 ">&nbsp;<br />' . "\n";
//				$tbl .= '<input type="submit" name="PDF_UPLOAD" value=" PDF管理 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="UPLOAD" value=" ファイル管理 ">&nbsp;' . "\n";
				if ( $view_status == 0 ) {
					$tbl .= '<input type="submit" name="VIEW_ON" value=" 表示する ">&nbsp;<br />' . "\n";
				} else {
					$tbl .= '<input type="submit" name="VIEW_OFF" value=" 非表示にする ">&nbsp;<br />' . "\n";
				}
				$tbl .= '<!--<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $convention_id . ')">&nbsp;-->' . "\n";
				$tbl .= '</td>' . "\n";
				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "convention_list.php";
	$title  = "大会一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;

?>