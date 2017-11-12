<?php

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	$member_type_options = $CONFIG_MEMBER_TYPE;

	// データ追加ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$input01_array   = $_POST[ "price01" ];
		$input02_array   = $_POST[ "price02" ];
		$input03_array   = $_POST[ "price03" ];

		$err_msg = convention_Price_Check( $input01_array, $input02_array, $input03_array );

		// 区分-料金,区分-料金,,,,のテキストを生成
		$input01_mixed_text =  price_Combine( $input01_array, $CONFIG_MEMBER_TYPE );
		$input02_mixed_text =  price_Combine( $input02_array, $CONFIG_MEMBER_TYPE );
		$input03_mixed_text =  price_Combine( $input03_array, $CONFIG_MEMBER_TYPE );

		// 問題が無い場合
		if( $err_msg == "" ){

			// DBをUPDATE
			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);

			$sql = 'UPDATE convention_price_data SET';
			$sql .= '        price01 = "' . mysql_real_escape_string( $input01_mixed_text ) . '",';
			$sql .= '        price02 = "' . mysql_real_escape_string( $input02_mixed_text ) . '",';
			$sql .= '        price03 = "' . mysql_real_escape_string( $input03_mixed_text ) . '",';
			$sql .= '        update_dt = "' . date('YmdHis') . '"';
			$sql .= '    WHERE price_id = 1';
			$res = cn_query($sql, $cnn);

			tr_commit($cnn);
			db_close($cnn);

			// 自身にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_price_edit.php" );
			exit;

		} else {

			$input01 =  price_Apart( $input01_mixed_text );
			$input02 =  price_Apart( $input02_mixed_text );
			$input03 =  price_Apart( $input03_mixed_text );
		}
	}

	// 一覧出力
	$out = array();
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM convention_price_data";
	$sql .= " WHERE status = 0";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		if ($max_cnt > 0){

			// データの頁表示
			for ($i=0; $i<$max_cnt; $i++) {

				$price01_mixed_text    = cn_contract($res, $i, "price01");
				$price02_mixed_text    = cn_contract($res, $i, "price02");
				$price03_mixed_text    = cn_contract($res, $i, "price03");

				// バラして表示変数にセット
				$price01 =  price_Apart( $price01_mixed_text );
				$price02 =  price_Apart( $price02_mixed_text );
				$price03 =  price_Apart( $price03_mixed_text );

			}
		}
	}

	db_close($cnn);


// ******************************************************************

	$action = "convention_price_edit.php";
	$title  = "大会料金 初期設定";
	$submit = "　登 録　";

	if ( !is_array( $input01 ) ) {
		$dsp01 = $price01;
		$dsp02 = $price02;
		$dsp03 = $price03;
	} else {
		$dsp01 = $input01;
		$dsp02 = $input02;
		$dsp03 = $input03;
	}

// 入力チェック
function convention_Price_Check( $arr1, $arr2, $arr3 ) {

	$err_msg = '';

	reset( $arr1 );
	while( list( , $val ) = each( $arr1 ) ) {
		if ( $val == '' ) {
			$err_msg .= '入力されていないデータがあります。';
			return $err_msg;
		}
		if ( is_Number( $val ) != '' ) {
			$err_msg .= '料金は半角数字のみしか入力できません。';
			return $err_msg;
		}
	}

	reset( $arr2 );
	while( list( , $val ) = each( $arr2 ) ) {
		if ( $val == '' ) {
			$err_msg .= '入力されていないデータがあります。';
			return $err_msg;
		}
		if ( is_Number( $val ) != '' ) {
			$err_msg .= '料金は半角数字のみしか入力できません。';
			return $err_msg;
		}
	}

	reset( $arr2 );
	while( list( , $val ) = each( $arr2 ) ) {
		if ( $val == '' ) {
			$err_msg .= '入力されていないデータがあります。';
			return $err_msg;
		}
		if ( is_Number( $val ) != '' ) {
			$err_msg .= '料金は半角数字のみしか入力できません。';
			return $err_msg;
		}
	}

	return $err_msg;

}

?>