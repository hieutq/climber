<?php
// *******************************************************************
// 大会 講演 申込　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_CONV_KOUENSYA_FORM';

	// 大会ID取得
	$convention_id  = convention_Data_Maxid_Get();
//	$convention_id = $_SESSION[ 'JILM_CONVENTION_ID' ];

	// 講演分類ウィンドウが開いているかどうか
	$is_subwindow_open=0;

	// 設定配列
	$year_options = $YEAR_TYPE;
	$month_options = $MONT_TYPE;
	$day_options = $DAYT_TYPE;
	$pay_options = $CONFIG_PAY_TYPE;
	$pay_way_type = $CONFIG_PAY_WAY_TYPE;
	$hapyo_options = $CONFIG_HAPYO_TYPE;
	$kouen_type_options = convention_Type_Array_Read( $convention_id );
	$kouen_keishiki_options = $CONFIG_KOUEN_KEISHIKI;
	$member_kubun_options = $CONFIG_MEMBER_TYPE_KOUEN;
	$member_kubun_options_kouen = $CONFIG_MEMBER_TYPE_KOUEN;
	$kouen_hapyo_uid_options = $CONFIG_HAPYO_UID_TYPE;

	// 新しい講演申し込み分類
	$kouen_head_options=$kouen_keishiki_options;
	foreach($kouen_type_options as $key => $val) {
		if (strpos($key, 'T') !== false)
		{
			$kouen_head_options[$key]=$val;
		}
	}

	$referer = $_SERVER["HTTP_REFERER"];
	// 初期化
	if( $referer ) {
		if ( strpos( $referer, '?mode=content&pid=33' ) || strpos( $referer, 'conv_kouen' ) ) {

		} else {
			$_SESSION[ $s_name ] = NULL;
		}

	} else {
		$_SESSION[ $s_name ] = NULL;
	};


// リクエスト処理
// ------------------------------------
	if ( $_POST[ 'CONV_KOUEN_CONFIRM' ] != '' ) {

		// 入力データを変数に変換
		$_SESSION[ 'JILM_CONVENTION_ID' ]         = stripslashes( $_POST[ 'convention_id' ] );
		$_SESSION[ $s_name ][ 'convention_id' ]   = stripslashes( $_POST[ 'convention_id' ] );

		//$_SESSION[ $s_name ][ 'kouen_keishiki' ]    = stripslashes( $_POST[ 'ko_keishiki' ] );
		//$_SESSION[ $s_name ][ 'kouen_type' ]        = stripslashes( $_POST[ 'ko_type' ] );
		$_SESSION[ $s_name ][ 'kouen_head' ]        = stripslashes( $_POST[ 'kouen_head' ] );

		$_SESSION[ $s_name ][ 'kouen_section_head' ] = stripslashes( $_POST[ 'kouen_section_head' ] );
		$_SESSION[ $s_name ][ 'kouen_section_head_1' ] = stripslashes( $_POST[ 'kouen_section_head_1' ] );
		$_SESSION[ $s_name ][ 'kouen_section_head_2' ] = stripslashes( $_POST[ 'kouen_section_head_2' ] );
		$_SESSION[ $s_name ][ 'kouen_section_head_3' ] = stripslashes( $_POST[ 'kouen_section_head_3' ] );
		$_SESSION[ $s_name ][ 'kouen_section_head_4' ] = stripslashes( $_POST[ 'kouen_section_head_4' ] );
		$_SESSION[ $s_name ][ 'kouen_section_head_5' ] = stripslashes( $_POST[ 'kouen_section_head_5' ] );

		$_SESSION[ $s_name ][ 'kouen_title' ]       = stripslashes( $_POST[ 'ko_title' ] );
		$_SESSION[ $s_name ][ 'kouen_title_eng' ]   = stripslashes( $_POST[ 'ko_title_eng' ] );
		$_SESSION[ $s_name ][ 'kouen_cmnt1' ]       = stripslashes( $_POST[ 'ko_cmnt1' ] );

		$member_cnt = count( $_POST[ 'k_userid' ] );
		for( $i=0;$i<$member_cnt;$i++ ) {
			$_SESSION[ $s_name ][ 'member_userid' ][$i]   = stripslashes( $_POST[ 'k_userid' ][$i] );
			$_SESSION[ $s_name ][ 'member_name' ][$i]     = stripslashes( $_POST[ 'k_name' ][$i] );
			$_SESSION[ $s_name ][ 'member_name_eng' ][$i] = stripslashes( $_POST[ 'k_name_eng' ][$i] );
			$_SESSION[ $s_name ][ 'member_info01' ][$i]   = stripslashes( $_POST[ 'k_info01' ][$i] );
			$_SESSION[ $s_name ][ 'member_hapyo' ][$i]    = stripslashes( $_POST[ 'k_hapyo' ][$i] );
			$_SESSION[ $s_name ][ 'member_kubun01' ][$i]  = stripslashes( $_POST[ 'k_kubun' ][$i] );
		}

		$_SESSION[ $s_name ][ 'kouen_kubun01' ]        = stripslashes( $_POST[ 'kubun01' ] );
		$_SESSION[ $s_name ][ 'kouen_userid' ]        = stripslashes( $_POST[ 'userid' ] );
		$_SESSION[ $s_name ][ 'kouen_name' ]        = stripslashes( $_POST[ 'name' ] );
		$_SESSION[ $s_name ][ 'kouen_info01' ]        = stripslashes( $_POST[ 'info01' ] );
		$_SESSION[ $s_name ][ 'kouen_mail' ]        = stripslashes( $_POST[ 'mail' ] );
		$_SESSION[ $s_name ][ 'kouen_tel' ]         = stripslashes( $_POST[ 'tel' ] );
		$_SESSION[ $s_name ][ 'kouen_fax' ]         = stripslashes( $_POST[ 'fax' ] );
		$_SESSION[ $s_name ][ 'kouen_zip1' ]        = stripslashes( $_POST[ 'zip1' ] );
		$_SESSION[ $s_name ][ 'kouen_zip2' ]        = stripslashes( $_POST[ 'zip2' ] );
		$_SESSION[ $s_name ][ 'kouen_address' ]     = stripslashes( $_POST[ 'address' ] );
		$_SESSION[ $s_name ][ 'kouen_send_name' ]   = stripslashes( $_POST[ 'ko_send_name' ] );

		$_SESSION[ $s_name ][ 'pay_status' ]  = 1; // 未入金にする（入金=status 2)
		$_SESSION[ $s_name ][ 'pay_way' ]     = stripslashes( $_POST[ 'shiharai' ] );
		$_SESSION[ $s_name ][ 'kouen_biko1' ] = stripslashes( $_POST[ 'ko_biko1' ] );

		$_SESSION[ $s_name ][ 'kouen_hapyo_uid' ] = stripslashes( $_POST[ 'kouen_hapyo_uid'] );

		// 入力を調整
		$_SESSION[ $s_name ] = kouensya_Data_Adjust($_SESSION[ $s_name ]);

		$err_msg = kouensya_Error_Check($_SESSION[ $s_name ], 'pc_regist');

		// 問題が無い場合
		if( $err_msg == "" ){

			//リダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/conv_kouen_entry_confirm.php" );
			exit;

		}

	}

	if ( $_POST[ 'RESET' ] != '' ) {

		$_SESSION[ $s_name ] = NULL;
		$_SESSION[ $s_name ][ 'convention_id' ] = stripslashes( $_POST[ 'convention_id' ] );


		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=content&pid=33" );
		exit;
	}



// データ読出
// ----------------------------------------
	// ログインしていた場合は会員情報を読み出す
	if ( $_SESSION[ $s_name ] == NULL ) {

		if ( $config_login_flg ) {

			$login_member_data = member_Mast_Read_By_ID( $_SESSION[ LOGIN_SESSION_NAME ][ 'id' ] );

			$_SESSION[ $s_name ][ 'kouen_userid' ]      = $login_member_data[ 'member_userid' ];
			$_SESSION[ $s_name ][ 'kouen_name' ]        = $login_member_data[ 'member_name' ];
			$_SESSION[ $s_name ][ 'kouen_info01' ]      = $login_member_data[ 'member_info01' ]
													   . ' ' . $login_member_data[ 'member_info02' ];
			$_SESSION[ $s_name ][ 'kouen_mail' ]        = $login_member_data[ 'member_mail' ];
			$_SESSION[ $s_name ][ 'kouen_tel' ]         = $login_member_data[ 'member_tel' ];
			$_SESSION[ $s_name ][ 'kouen_fax' ]         = $login_member_data[ 'member_fax' ];
			$_SESSION[ $s_name ][ 'kouen_zip1' ]        = $login_member_data[ 'member_zip1' ];
			$_SESSION[ $s_name ][ 'kouen_zip2' ]        = $login_member_data[ 'member_zip2' ];
			$_SESSION[ $s_name ][ 'kouen_address' ]     = $login_member_data[ 'member_address' ];
			$_SESSION[ $s_name ][ 'kouen_send_name' ]   = $login_member_data[ 'member_name' ];
			$_SESSION[ $s_name ][ 'kouen_kubun01' ]     = $login_member_data[ 'member_kubun01' ];

		}
	}

	// ログインしていた場合編集不能にして、情報のみ表示する。そのスイッチ
	if ( $config_login_flg ) {

		$login_flg = 1;

	}

	$_SESSION[ $s_name ][ 'convention_id' ] = $convention_id;

	// CSS設定
	// -------------------------------------------
	$member_cnt = 8;
	$check_array = array(
		'member_userid', 'member_name', 'member_name_eng', 'member_info01', 'member_hapyo', 'member_kubun01',
	);
	$max_num = 0;
	for ( $i=0;$i<$member_cnt;$i++ ) {

		reset( $check_array );
		while( list( $key, $val ) = each( $check_array ) ) {
			if ( $_SESSION[ $s_name ][ $val ][$i] != '' ) {
				$max_num = $i;
			}
		}
	}

	for ( $i=0;$i<$member_cnt;$i++ ) {

		$next_id = $i + 1;

		if( $i < $max_num ) {
			$css_display_none[$i] = '';
			$link_display_none[$i] = '';
		} elseif ( $i == $max_num ) {
			$css_display_none[$i] = '';
			$link_display_none[$i] = '<span class="min bold blue" style="cursor: pointer" id="dropdown_' . $next_id . '">▼入力▼</span>';
		} else {
			$css_display_none[$i] = 'style="display: none;"';
			$link_display_none[$i] = '<span class="min bold blue" style="cursor: pointer" id="dropdown_' . $next_id . '">▼入力▼</span>';
		}

	}

	

// ******************************************************************
	$action = '?mode=content&pid=33';
	$dsp = $_SESSION[ $s_name ];
	$subwindow_style=($_SESSION[ $s_name ][ 'kouen_head' ] == 1 ||  $_SESSION[ $s_name ][ 'kouen_head' ] == 3) ? '' : 'display: none;';







// ぱんくず読み出し
// ----------------------------------------
	$pid = $_GET[ "pid" ];
	if( $pid != "" ){

		// セッションクリア
		Jilm_Contents_Session_clear();

		Jilm_Contents_Read_1( $pid );
/*
		// 非公開の場合はエラー表示
		if( $_SESSION[ "JILM_CONTENTS_STATUS" ] > 0 ){
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "/?mode=pgerror" );
			exit;
		}
*/

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