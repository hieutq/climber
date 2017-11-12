<?php

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_ADMIN_KOUENSYA_REGIST';

	// 設定配列
	$year_options = $YEAR_TYPE;
	$month_options = $MONT_TYPE;
	$day_options = $DAYT_TYPE;
	$pay_options = $CONFIG_PAY_TYPE;
	$pay_way_type = $CONFIG_PAY_WAY_TYPE;
	$hapyo_options = $CONFIG_HAPYO_TYPE;
	$kouen_type_options = convention_Type_Array_Read( $_SESSION[ 'JILM_CONVENTION_ID' ] );
	$kouen_keishiki_options = $CONFIG_KOUEN_KEISHIKI;
	$member_kubun_options = $CONFIG_MEMBER_TYPE_KOUEN;
	$kouen_hapyo_uid_options = $CONFIG_HAPYO_UID_TYPE;

	// 新しい講演申し込み分類
	$kouen_head_options=$kouen_keishiki_options;
	foreach($kouen_type_options as $key => $val) {
		if (strpos($key, 'T') !== false)
		{
			$kouen_head_options[$key]=$val;
		}
	}

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// 初期設定
	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_name ] = NULL;
	}


// リクエスト処理
// ----------------------------------------
	if( $_POST[ "MEMBER_READ" ] != "" ){
		$_POST[ "MEMBER_READ" ] = "";

		// ユーザーIDから会員情報読込
		$member_userid  = stripslashes( $_POST[ 'kouen_userid' ] );
		$member_data = member_Mast_Read_By_UserID( $member_userid );
		$_SESSION[ $s_name ][ 'kouen_userid' ]      = $member_data[ 'member_userid' ];
		$_SESSION[ $s_name ][ 'kouen_name' ]        = $member_data[ 'member_name' ];
		$_SESSION[ $s_name ][ 'kouen_info01' ]      = $member_data[ 'member_info01' ] . ' ' . $member_data[ 'member_info02' ];
		$_SESSION[ $s_name ][ 'kouen_mail' ]        = $member_data[ 'member_mail' ];
		$_SESSION[ $s_name ][ 'kouen_tel' ]         = $member_data[ 'member_tel' ];
		$_SESSION[ $s_name ][ 'kouen_fax' ]         = $member_data[ 'member_fax' ];
		$_SESSION[ $s_name ][ 'kouen_zip1' ]        = $member_data[ 'member_zip1' ];
		$_SESSION[ $s_name ][ 'kouen_zip2' ]        = $member_data[ 'member_zip2' ];
		$_SESSION[ $s_name ][ 'kouen_address' ]     = $member_data[ 'member_address' ];
		$_SESSION[ $s_name ][ 'kouen_kubun01' ]     = $member_data[ 'member_kubun01' ];


		// 入金情報をセッションセット
		// この下部に記述
		kouensya_Data_Session_Set( $s_name );
	}

	// 登録ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		// この下部に記述
		kouensya_Data_Session_Set( $s_name );

		// 申込者情報を格納
		// ---------------------------------
		$_SESSION[ $s_name ][ 'kouen_userid' ]      = stripslashes( $_POST[ 'kouen_userid' ] );
		$_SESSION[ $s_name ][ 'kouen_name' ]        = stripslashes( $_POST[ 'kouen_name' ] );
		$_SESSION[ $s_name ][ 'kouen_info01' ]      = stripslashes( $_POST[ 'kouen_info01' ] );
		$_SESSION[ $s_name ][ 'kouen_mail' ]        = stripslashes( $_POST[ 'kouen_mail' ] );
		$_SESSION[ $s_name ][ 'kouen_tel' ]         = stripslashes( $_POST[ 'kouen_tel' ] );
		$_SESSION[ $s_name ][ 'kouen_fax' ]         = stripslashes( $_POST[ 'kouen_fax' ] );
		$_SESSION[ $s_name ][ 'kouen_zip1' ]        = stripslashes( $_POST[ 'kouen_zip1' ] );
		$_SESSION[ $s_name ][ 'kouen_zip2' ]        = stripslashes( $_POST[ 'kouen_zip2' ] );
		$_SESSION[ $s_name ][ 'kouen_address' ]     = stripslashes( $_POST[ 'kouen_address' ] );
		$_SESSION[ $s_name ][ 'kouen_kubun01' ]     = stripslashes( $_POST[ 'kouen_kubun01' ] );
		// $_SESSION[ $s_name ][ 'kouen_send_name' ]   = stripslashes( $_POST[ 'kouen_send_name' ] );

		$err_msg = kouensya_Error_Check($_SESSION[ $s_name ], 'admin_regist');

		// 問題が無い場合
		if( $err_msg == "" ){

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/kouensya_regist_confirm.php" );
			exit;

		}

	}


	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );
			$_SESSION[ 'JILM_KOUENSYA_ID' ]   = NULL;

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/kouensya_list.php" );
			exit;

	}


// データ読出
// ----------------------------------------

	// デフォルト値設定
	// -------------------------------------------
	if ( $_SESSION[ $s_name ] == NULL ) {
		$_SESSION[ $s_name ][ 'convention_id' ] = $_SESSION[ 'JILM_CONVENTION_ID' ];

		$_SESSION[ $s_name ][ 'pay_date_y' ] = date( 'Y' );
		$_SESSION[ $s_name ][ 'pay_date_m' ] = date( 'm' );
		$_SESSION[ $s_name ][ 'pay_date_d' ] = date( 'd' );
		$_SESSION[ $s_name ][ 'kouen_hapyo_uid' ] = 1;

	}


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
			$link_display_none[$i] = '<span class="min bold blue" id="dropdown_' . $next_id . '">▼次のリスト</span>';
		} else {
			$css_display_none[$i] = 'style="display: none;"';
			$link_display_none[$i] = '<span class="min bold blue" id="dropdown_' . $next_id . '">▼次のリスト</span>';
		}

	}






// ******************************************************************
	$action = "kouensya_regist.php";
	$title  = "講演申込 登録";
	$title2  = "新規追加";
	$submit = "　確 認　";
	$submit_back = "　一覧に戻る　";


	$dsp = $_SESSION[ $s_name ];
	$subwindow_style=( $_SESSION[ $s_name ][ 'kouen_head' ] == 1 ||  $_SESSION[ $s_name ][ 'kouen_head' ] == 3) ? '' : 'display: none;';



// ページ内共通処理をfunction化
function kouensya_Data_Session_Set($s_name) {

	$_SESSION[ $s_name ][ 'convention_id' ]   = stripslashes( $_POST[ 'convention_id' ] );
	$_SESSION[ $s_name ][ 'kouensya_id' ]     = stripslashes( $_POST[ 'kouensya_id' ] );
	$_SESSION[ $s_name ][ 'kouen_uid' ]       = stripslashes( $_POST[ 'kouen_uid' ] );
	$_SESSION[ $s_name ][ 'kouen_id' ]        = stripslashes( $_POST[ 'kouen_id' ] );

	$_SESSION[ $s_name ][ 'kouen_keishiki' ]    = stripslashes( $_POST[ 'kouen_keishiki' ] );
	$_SESSION[ $s_name ][ 'kouen_type' ]        = stripslashes( $_POST[ 'kouen_type' ] );

	$_SESSION[ $s_name ][ 'kouen_head' ]        = stripslashes( $_POST[ 'kouen_head' ] );
	$_SESSION[ $s_name ][ 'kouen_section_head' ] = stripslashes( $_POST[ 'kouen_section_head' ] );
	$_SESSION[ $s_name ][ 'kouen_section_head_1' ] = stripslashes( $_POST[ 'kouen_section_head_1' ] );
	$_SESSION[ $s_name ][ 'kouen_section_head_2' ] = stripslashes( $_POST[ 'kouen_section_head_2' ] );
	$_SESSION[ $s_name ][ 'kouen_section_head_3' ] = stripslashes( $_POST[ 'kouen_section_head_3' ] );
	$_SESSION[ $s_name ][ 'kouen_section_head_4' ] = stripslashes( $_POST[ 'kouen_section_head_4' ] );
	$_SESSION[ $s_name ][ 'kouen_section_head_5' ] = stripslashes( $_POST[ 'kouen_section_head_5' ] );

	$_SESSION[ $s_name ][ 'kouen_title' ]       = stripslashes( $_POST[ 'kouen_title' ] );
	$_SESSION[ $s_name ][ 'kouen_title_eng' ]   = stripslashes( $_POST[ 'kouen_title_eng' ] );
	$_SESSION[ $s_name ][ 'kouen_cmnt1' ]       = stripslashes( $_POST[ 'kouen_cmnt1' ] );

	$_SESSION[ $s_name ][ 'pay_way' ]     = stripslashes( $_POST[ 'pay_way' ] );
	$_SESSION[ $s_name ][ 'kouen_biko1' ] = stripslashes( $_POST[ 'kouen_biko1' ] );

	$_SESSION[ $s_name ][ 'pay_date_y' ] = stripslashes( $_POST[ 'pay_y' ] );
	$_SESSION[ $s_name ][ 'pay_date_m' ] = stripslashes( $_POST[ 'pay_m' ] );
	$_SESSION[ $s_name ][ 'pay_date_d' ] = stripslashes( $_POST[ 'pay_d' ] );
	$_SESSION[ $s_name ][ 'pay_date' ]   = NULL;
	$_SESSION[ $s_name ][ 'pay_status' ] = stripslashes( $_POST[ 'pay_status' ] );
	if ( $_SESSION[ $s_name ][ 'pay_status' ] == 2 ) {
		$_SESSION[ $s_name ][ 'pay_date' ] = $_SESSION[ $s_name ][ 'pay_date_y' ]
                                           . $_SESSION[ $s_name ][ 'pay_date_m' ]
                                           . $_SESSION[ $s_name ][ 'pay_date_d' ];
	}

	$member_cnt = count( $_POST[ 'k_userid' ] );
	for( $i=0;$i<$member_cnt;$i++ ) {
		$_SESSION[ $s_name ][ 'member_userid' ][$i]   = stripslashes( $_POST[ 'k_userid' ][$i] );
		$_SESSION[ $s_name ][ 'member_name' ][$i]     = stripslashes( $_POST[ 'k_name' ][$i] );
		$_SESSION[ $s_name ][ 'member_name_eng' ][$i] = stripslashes( $_POST[ 'k_name_eng' ][$i] );
		$_SESSION[ $s_name ][ 'member_info01' ][$i]   = stripslashes( $_POST[ 'k_info01' ][$i] );
//		$_SESSION[ $s_name ][ 'member_hapyo' ][$i]    = stripslashes( $_POST[ 'k_hapyo' ][$i] );
		$_SESSION[ $s_name ][ 'member_kubun01' ][$i]  = stripslashes( $_POST[ 'k_kubun' ][$i] );
	}

	$_SESSION[ $s_name ][ 'kouen_hapyo_uid' ] = stripslashes( $_POST[ 'kouen_hapyo_uid'] );

}


?>