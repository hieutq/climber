<?php

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// 大会キー
	$convention_id = $_SESSION[ 'JILM_CONVENTION_ID' ];

	// 遅延キー生成
	$key = number_automake(10);

	// 遅延申込用URL
	$url = 'http://tokyo.applied-g.jp/~jilm/?mode=content&pid=33&key=' . $key;

	// 有効期限（７日後までぐらいで）
	$stamp = mktime( 0, 0, 0, date('n'), date('j')+7, date('Y') );
	$date = date( 'Ymd', $stamp );
	$date_text = date( 'Y', $stamp ) . '年' . date( 'n', $stamp ) . '月' . date( 'j', $stamp ) . '日';

	// 出力変数にセット
	$output[ 'convention_id' ] = $convention_id;
	$output[ 'url' ]         = $url;
	$output[ 'date_text' ]   = $date_text;

	// DB格納用変数にセット
	$input[ 'convention_id' ] = $convention_id;
	$input[ 'chien_key' ]     = $key;
	$input[ 'limit_date' ]    = $date;
	$input[ 'access_status' ] = 0;
	$input[ 'entry_status' ]  = 0;

	// DBに格納
	convention_Chien_Insert($input);


// ******************************************************************

	$action = "";
	$title  = "大会遅延申込み";

	$dsp = $output;





?>