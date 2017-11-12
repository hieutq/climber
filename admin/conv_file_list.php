<?php

// 設定
// ----------------------------------------


	// 設定配列
	$file_view_type = $CONFIG_FILE_VIEW_TYPE;

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
	if ( $_POST[ 'BACK' ] ) {

		$_SESSION[ 'JILM_CONVENTION_ID' ] = NULL;

		// 一覧ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/convention_list.php" );
		exit;
	}

	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_GET[ 'convention_id' ] );
		$_SESSION[ 'JILM_FILE_ID' ] = stripslashes( $_GET[ 'file_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/conv_file_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] = '';
		
		$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/conv_file_regist.php?INIT_FLG=1" );
		exit;

	}

	if ( $_GET[ 'VIEW_ON' ] != '' ) {
		$_GET[ 'VIEW_ON' ] = '';
		
		$data['file_id'] = stripslashes( $_GET[ 'file_id' ] );

		// DBをUPDATE
		convention_File_Data_View_On( $data );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/conv_file_list.php" );
		exit;

	}

	if ( $_GET[ 'VIEW_OFF' ] != '' ) {
		$_GET[ 'VIEW_OFF' ] = '';
		
		$data['file_id'] = stripslashes( $_GET[ 'file_id' ] );

		// DBをUPDATE
		convention_File_Data_View_Off( $data );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/conv_file_list.php" );
		exit;

	}

	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] = '';

		$data['file_id'] = stripslashes( $_GET[ 'file_id' ] );

		// DBをUPDATE
		convention_File_Data_Delete( $data );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/conv_file_list.php" );
		exit;

	}


// 情報読込
// ----------------------------------------
	// 大会データ読み込み
	$data = convention_Data_Read_By_ID( $_SESSION[ 'JILM_CONVENTION_ID' ] );
	$conv_name = $data[ 'conv_name' ];

	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM convention_file_data";
	$sql .= "    WHERE";
	$sql .= "        convention_id = '" . $_SESSION[ 'JILM_CONVENTION_ID' ] . "' AND";
	$sql .= "        status = 0";
	$sql .= "    ORDER BY file_id";
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
				$page_link1 = "[ <a href='conv_file_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='conv_file_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

				$file_id         = cn_contract($res, $i, 'file_id');
				$convention_id   = cn_contract($res, $i, 'convention_id');
				$file_title      = cn_contract($res, $i, 'file_title');
				$file_name       = cn_contract($res, $i, 'file_name');
				$file_extension  = cn_contract($res, $i, 'file_extension');
				$file_view       = cn_contract($res, $i, 'file_view');

				if ( $file_name == '' ) {
					$file_name = '---';
				}

				if ( $file_extension == '' ) {
					$file_extension = '---';
				} else {
					$file_extension .= 'ファイル';
				}

				$tbl .= '<form method="GET" name="listForm' . $file_id . '" action="">' . "\n";

				$tbl .= '<tr>' . "\n";
				$tbl .= '<input type="hidden" name="convention_id" value="' . $convention_id . '">' . "\n";
				$tbl .= '<input type="hidden" name="file_id" value="' . $file_id . '">' . "\n";
				$tbl .= '<td style="text-align: center;">' . $file_title . '</td>' . "\n";
				$tbl .= '<td style="text-align: center;">' . $file_name . '</td>' . "\n";
				$tbl .= '<td style="text-align: center;">' . $file_extension . '</td>' . "\n";
				$tbl .= '<td style="text-align: center;">' . $file_view_type[ $file_view ] . '</td>' . "\n";
				$tbl .= '<td>' . "\n";
				if ( $file_view == 1 ) {
					$tbl .= '<input type="submit" name="VIEW_OFF" value=" 非表示にする "><br />' . "\n";
				} else {
					$tbl .= '<input type="submit" name="VIEW_ON" value=" 表示する "><br />' . "\n";					
				}
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" value=" 削除 " name="DELETE" onClick="delete_ok(' . $file_id . ',' . '\'' . $file_title . '\');">&nbsp;' . "\n";
				$tbl .= '</td>' . "\n";
				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "conv_file_list.php";
	$title  = "講演関連 ファイル 一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;

	$convention_id = $_SESSION[ 'JILM_CONVENTION_ID' ];
?>

