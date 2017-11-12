<?php
// *******************************************************************
// シンポジウム情報　PHP　Encording UTF-8
// *******************************************************************

	// 現在日付
	$now_date = date( 'Ymd' );

	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM symposium_data";
	$sql .= "    WHERE";
	$sql .= "        view_status = 1 AND";
	$sql .= "        status = 0";
	$sql .= "    ORDER BY -symp_id";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		// データの頁表示
		for ($i=0; $i<$max_cnt; $i++) {

			$symp_id      = cn_contract( $res, $i, 'symp_id' );
			$symp_name    = cn_contract( $res, $i, 'symp_name' );
			$symp_date1   = cn_contract( $res, $i, 'symp_date1' );
			$symp_date2   = cn_contract( $res, $i, 'symp_date2' );

			$sanka_open_flg = 0;
			if ( $now_date >= $symp_date1 && $now_date <= $symp_date2 ) {
				$sanka_open_flg = 1;
			}

			$contents_tbl .= '<tr';
			if ( $i % 2 ) {
				$contents_tbl .= ' class="off"';
			} else {
				$contents_tbl .= ' class="on"';
			}
			$contents_tbl .= '>' . "\n";

			$contents_tbl .= '<td width="80%"><a href="symp_detail.php?ID=' . $symp_id . '">' . $symp_name . '</a></td>' . "\n";
			$contents_tbl .= '<td width="20%" class="alignC">';

			if ( $sanka_open_flg == 1 ) {
				if ( ! $config_login_flg ) {
					$contents_tbl .= '<a href="symp_entry.php?INIT_FLG=1&ID=' . $symp_id . '">【参加申込】</a><br />';
				} else {

					if ( symp_Sanka_Userid_Double_Check( $_SESSION[ LOGIN_SESSION_NAME ][ 'userid' ], $symp_id ) ) {
//						$contents_tbl .= '<a href="symp_edit.php?INIT_FLG=1&ID=' . $symp_id . '">【申込内容修正】</a>';
						$contents_tbl .= '【参加申込済】';
					} else {
						$contents_tbl .= '<a href="symp_entry.php?INIT_FLG=1&ID=' . $symp_id . '">【参加申込】</a><br />';
					}

				}
			}


			$contents_tbl .= '</td>' . "\n";
			$contents_tbl .= '</tr>' . "\n";

		}
	}

	db_close($cnn);




	$pid = $_GET[ "pid" ];
	if( $pid != "" ){

		// セッションクリア
		Jilm_Contents_Session_clear();

		Jilm_Contents_Read_1( $pid );

		// 非公開の場合はエラー表示
		if( $_SESSION[ "JILM_CONTENTS_STATUS" ] > 0 ){
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "/?mode=pgerror" );
			exit;
		}

		// 階層表示
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = '" . $_SESSION[ "JILM_CONTENTS_CTGR" ] . "'";
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$class_tmp = cn_contract($res, 0, "ctgr_name");
			$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
			$_SESSION[ "JILM_CLASS_LIST" ] = "<li>" . $class_tmp . "</li>\n";
		}
		db_close($cnn);

		// 親がある場合は親の名前追加
		if( $ctgr_fold != "0" ){
			Jilm_Fold_List_3( $ctgr_fold );
		}

		$action   = "./?mode=content&pid=" . $pid;
		$title    = $_SESSION[ "JILM_CONTENTS_TITLE" ];
		$class    = $_SESSION[ "JILM_CLASS_LIST" ] . "<li>" . $_SESSION[ "JILM_CONTENTS_TITLE" ] . "</li>\n";
//		$contents = $_SESSION[ "JILM_CONTENTS_BODY" ];
	}

?>