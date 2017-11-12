<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_MEMBER_SEARCH'; // 検索用セッション名

	// 設定配列
	$member_type_options = $CONFIG_MEMBER_TYPE_1;

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
		$_SESSION[ $s_search ]['member_name']    = stripslashes( $_POST[ 'search_name' ] );
		$_SESSION[ $s_search ]['member_userid']  = stripslashes( $_POST[ 'search_userid' ] );
		$_SESSION[ $s_search ]['member_id']      = stripslashes( $_POST[ 'search_id' ] );
		$_SESSION[ $s_search ]['member_info']    = stripslashes( $_POST[ 'search_info' ] );
		$_SESSION[ $s_search ]['member_mail']    = stripslashes( $_POST[ 'search_mail' ] );
		$_SESSION[ $s_search ]['member_kubun01'] = stripslashes( $_POST[ 'search_kubun' ] );
	}

	if ( $_POST[ 'SEARCH_RESET' ] != '' ) {

		$_SESSION[ $s_search ] = NULL;

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/member_list.php" );
		exit;
	}

	if ( $_GET[ 'EDIT' ] != '' ) {
		$_GET[ 'EDIT' ] != '';
		
		$_SESSION[ 'JILM_MEMBER_ID' ] = stripslashes( $_GET[ 'member_id' ] );

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/member_modify.php?INIT_FLG=1" );
		exit;

	}

	if ( $_POST[ 'REGIST' ] != '' ) {
		$_POST[ 'REGIST' ] != '';

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/member_regist.php?INIT_FLG=1" );
		exit;
	}

	if ( $_POST[ 'SEMD_DM' ] != '' ) {
		$_POST[ 'SEMD_DM' ] = '';

		// 編集ページヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/dm_regist.php?INIT_FLG=1&TYPE=1" );
		exit;
	}

	if ( $_POST[ 'CSV_DL' ] != '' ) {
		$_POST[ 'CSV_DL' ] = '';

		// CSVファイル生成
		$csv_options['member_kubun']   = $CONFIG_MEMBER_TYPE;
		$csv_name = member_Mast_Set_CSV( $csv_options );

		// ＣＳＶデータのダウンロード
		$save_dir  = '../../csv/';
		$file_name = $csv_name;

		header ("Content-Disposition: attachment; filename=$file_name");
		header ("Content-type: vnd.ms-excel");
		readfile ($save_dir . $file_name);

	}


	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';
		
		$member_id = stripslashes( $_GET[ 'member_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = 'UPDATE member_mast SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        member_id = "' . $member_id . '"';
		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/member_list.php" );
		exit;

	}


// 情報読込
// ----------------------------------------
	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM member_mast";
	$sql .= "    WHERE";
	$sql .= "        member_kubun01 != 99 AND";
	$sql .= "        member_userid != 0 AND";
	$sql .= "        ninsyou_status != 0 AND";
	if ( $_SESSION[ $s_search ]['member_id'] ) {
		$sql .= "        member_id = '" . $_SESSION[ $s_search ]['member_id'] . "' AND ";
	}
	if ( $_SESSION[ $s_search ]['member_userid'] ) {
		$sql .= "        member_userid = '" . $_SESSION[ $s_search ]['member_userid'] . "' AND ";
	}
	if ( $_SESSION[ $s_search ]['member_name'] ) {
		$sql .= "       ( member_name LIKE '%" . $_SESSION[ $s_search ]['member_name'] . "%' OR ";
		$sql .= "        member_kana LIKE '%" . $_SESSION[ $s_search ]['member_name'] . "%' ) AND ";
	}
	if ( $_SESSION[ $s_search ]['member_info'] ) {
		$sql .= "       ( member_info01 LIKE '%" . $_SESSION[ $s_search ]['member_info'] . "%' OR ";
		$sql .= "        member_info02 LIKE '%" . $_SESSION[ $s_search ]['member_info'] . "%' ) AND ";
	}
	if ( $_SESSION[ $s_search ]['member_mail'] ) {
		$sql .= "       member_mail LIKE '%" . $_SESSION[ $s_search ]['member_mail'] . "%' AND ";
	}
	if ( $_SESSION[ $s_search ]['member_kubun01'] ) {
		$sql .= "        member_kubun01 = '" . $_SESSION[ $s_search ]['member_kubun01'] . "' AND ";
	}
	$sql .= "        status = 0";
	$sql .= "    ORDER BY -member_id";
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
				$page_link1 = "[ <a href='member_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='member_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
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

				$member_id      = cn_contract( $res, $i, 'member_id' );
				$member_userid  = cn_contract( $res, $i, 'member_userid' );
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

				$tbl .= '<form method="GET" name="listForm' . $member_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";

				$tbl .= '<input type="hidden" name="member_id" value="' . $member_id . '">' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $member_id . '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $member_userid . '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $CONFIG_MEMBER_TYPE[ $member_kubun01 ] . '</td>' . "\n";

				$tbl .= '<td>';
				$tbl .= $member_name . '(' . $member_kana . ')<br>';
				$tbl .=  '<a href="mailto:' . $member_mail . '">' . $member_mail . '</a>';
				$tbl .=  '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap;">';
				$tbl .= '所属：' . $member_info01 . '<br>';
				$tbl .= '部署：' . $member_info02 . '<br>';
				$tbl .=  '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap;">' . "\n";
				$tbl .= '<input type="submit" name="EDIT" value=" 内容編集 ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $member_id . ',\'' . $member_name . '\')">&nbsp;' . "\n";
				$tbl .= '</td>' . "\n";
				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "member_list.php";
	$title  = "会員一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>