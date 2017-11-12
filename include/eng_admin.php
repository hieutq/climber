<?php
// *******************************************************************
// 英語版サイト 管理画面専用スクリプト Encording UTF-8
// *******************************************************************
// 管理者メール
define( 'CMN_ADMIN_MAIL', '790cd5d5a8-cdd944@inbox.mailtrap.io' );
//define( 'CMN_ADMIN_MAIL',   'ino1221@gmail.com' );
define( 'CMN_FROM_MAIL',    '790cd5d5a8-cdd944@inbox.mailtrap.io' );
define( 'CMN_SYSTEM_MAIL',  '790cd5d5a8-cdd944@inbox.mailtrap.io' );
// **************************************************************************
// データベース関連
// **************************************************************************
// *******************************************
// データベース接続
// *******************************************
function db_connect($host, $user, $pass, $datb, $port){

	switch (CMN_DBTYPE) {
	case 1:
		$cnn = mysql_connect($host, $user, $pass);
		mysql_select_db($datb, $cnn);
		break;
	case 2:
		$cnn = pg_connect("host=$host port=$port dbname=$datb user=$user password=$pass");
		break;
	}

	mysql_query('SET NAMES utf8;');

	return $cnn;

}

// *******************************************
// データベース接続(mysqli)
// *******************************************
function dbi_connect($host, $user, $pass, $datb, $port){

	$cnn = mysqli_connect($host, $user, $pass, $datb);
	mysqli_set_charset($cnn, 'utf8');
	return $cnn;

}

// *******************************************
// ステートメント初期化(mysqli)
// *******************************************
function dbi_stmt_init($cnn){

	$stmt = mysqli_stmt_init($cnn);
	return $stmt;

}

// *******************************************
// ステートメントを閉じる(mysqli)
// *******************************************
function dbi_stmt_close($stmt){

	mysqli_stmt_close($stmt);
	return true;

}

// *******************************************
// プリペアドステートメント作成(mysqli)
// *******************************************
function dbi_prepare($cnn, $sql){

	$stmt = mysqli_prepare($cnn, $sql);
	return $stmt;

}

// *******************************************
// データベース切断
// *******************************************
function db_close($cnn){

	switch (CMN_DBTYPE) {
	case 1:
		mysql_close($cnn);
		break;
	case 2:
		pg_close($cnn);
		break;
	}

	return true;

}

// *******************************************
// データベース切断(mysqli)
// *******************************************
function dbi_close($cnn){

	mysqli_close($cnn);
	return true;

}

// *******************************************
// ＳＱＬ実行
// *******************************************
function cn_query($sql, $cnn){

	switch (CMN_DBTYPE) {
	case 1:
		$res = mysql_query($sql, $cnn);
		break;
	case 2:
		$res = pg_exec($cnn, $sql);
		break;
	}

	return $res;

}

// *******************************************
// ＳＱＬ実行(mysqli)
// *******************************************
function cni_query($sql, $cnn){

	$res = mysqli_query($cnn, $sql);
	return $res;

}

// *******************************************
// ステートメント実行(mysqli)
// *******************************************
function dbi_stmt_exe($stmt){

	mysqli_stmt_execute($stmt);
	return true;

}

// *******************************************
// ステートメント結果格納(mysqli)
// *******************************************
function dbi_store_res($stmt){

	mysqli_stmt_store_result($stmt);
	return true;

}

// *******************************************
// ステートメント結果開放(mysqli)
// *******************************************
function dbi_free_res($stmt){

	mysqli_stmt_free_result($stmt);
	return true;

}

// *************************************
// 該当レコードカウント
// *************************************
function cn_count($res){

	switch (CMN_DBTYPE) {
	case 1:
		$row = mysql_num_rows($res);
		break;
	case 2:
		$row = pg_numrows($res);
		break;
	}

	return $row;

}

// *************************************
// 該当レコードカウント(mysqli)
// *************************************
function cni_count($stmt){

	$cnt = mysqli_stmt_num_rows($stmt);
	return $cnt;

}

// *******************************************
// ＳＱＬ実行（ＳＥＬＥＣＴ）のデータ抽出
// *******************************************
function cn_contract($res, $no, $field){

	switch (CMN_DBTYPE) {
	case 1:
		$dat = 	mysql_result($res, $no, $field);
		break;
	case 2:
		$dat = 	pg_result($res, $no, $field);
		break;
	}

	return $dat;

}

// *************************************
// トランザクション開始
// *************************************
function tr_begin($cnn){

	cn_query("BEGIN", $cnn);
	return true;

}

// *************************************
// トランザクション開始(mysqli)
// *************************************
function tri_begin($cnn){

	mysqli_autocommit($cnn, FALSE);
	return true;

}

// *************************************
// トランザクションコミット
// *************************************
function tr_commit($cnn){

	if (!cn_query("COMMIT", $cnn)) {
		cn_query("ROLLBACK", $cnn);
	}

	return true;

}

// *************************************
// トランザクションコミット(mysqli)
// *************************************
function tri_commit($cnn){

	if (!mysqli_commit($cnn)) {
		mysqli_rollback($cnn);
	}

	return true;

}

// **************************************************************************
// 共通ファンクション
// **************************************************************************
// *******************************************
// 入力エリアの数値チェック
// *******************************************
function is_Number( $chk_data ){

	$err_msg = "";
	if ( ereg("[^0-9]", $chk_data) != 0) {
		$err_msg = "数字以外の入力は出来ません。";
	}

	return $err_msg;

}

// *******************************************
// 入力エリアのＴＥＬＬチェック
// *******************************************
function is_Tell( $chk_data ){

	$err_msg = "";
	if ( ereg("[^0-9-]", $chk_data) != 0) {
		$err_msg = "数字と－以外の入力は出来ません。";
	}

	return $err_msg;

}

// *******************************************
// 入力エリアのＭＡＩＬチェック
// *******************************************
function is_Mail( $chk_data ){

	$err_msg = "";
	if ( $chk_data != "") {
		if ( ereg("^[^@]+@[^.]+\..+", $chk_data) == 0) {
			$err_msg = "入力が正しくありません。";
		}
	}
	if ( ereg("[~]", $chk_data) + ereg("[\]", $chk_data) + ereg("[?]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[/]", $chk_data) + ereg("[$]", $chk_data) + ereg("[%]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[']", $chk_data) + ereg("[<]", $chk_data) + ereg("[>]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[*]", $chk_data) + ereg("[+]", $chk_data) + ereg("[=]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[&]", $chk_data) + ereg("[#]", $chk_data) + ereg("[!]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[,]", $chk_data) + ereg("[(]", $chk_data) + ereg("[)]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[:]", $chk_data) + ereg("[;]", $chk_data) + ereg("[|]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}

	return $err_msg;

}

// *******************************************
// 入力エリアのＵＲＬチェック
// *******************************************
function is_Url( $chk_data ){

	$err_msg = "";
	if ( ereg("[~]", $chk_data) + ereg("[']", $chk_data) + ereg("[\]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[<]", $chk_data) + ereg("[>]", $chk_data) + ereg("[$]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[,]", $chk_data) + ereg("[;]", $chk_data) != 0 ) {
		$err_msg = "入力が正しくありません。";
	}

	return $err_msg;

}

// *******************************************
// 入力エリアのパスワードチェック
// *******************************************
function is_PassWord( $chk_data ){

	$err_msg = "";
	if ( ereg("[^0-9a-zA-Z\-\+\/\*\<\>\?\!\#\$\%\&]", $chk_data) != 0) {
		$err_msg = "入力が正しくありません。";
	}
	if ( ereg("[\]", $chk_data) != 0) {
		$err_msg = "入力が正しくありません。";
	}

	return $err_msg;

}

// *******************************************
// 入力エリアの英数字チェック
// *******************************************
function is_ArphNumber( $chk_data ){

	$err_msg = "";
	if ( ereg("[^0-9a-zA-Z]", $chk_data) != 0) {
		$err_msg = "英数字以外の入力は出来ません。";
	}

	return $err_msg;

}

// *******************************************
// 入力バイト数チェック
// *******************************************
function is_StrCount_1( $chk_data, $int ){

	$count = strlen( $chk_data );
	if( $count >= $int ){
		$err_msg = "入力文字数がオーバーしています";
	}

	return $err_msg;

}

// *******************************************
// 入力文字数チェック（文字数限定）
// *******************************************
function is_CharCount_2( $chk_data, $int ){

	$count = mb_strlen( $chk_data );
	if( $count != $int ){
		$err_msg = "入力文字数は" . $int . "桁のみです";
	}

	return $err_msg;

}

// *******************************************
// 入力エリアの禁止文字チェック
// *******************************************
function is_Restrict( $chk_data ){

	$chk_data = ereg_replace( "[\]", "￥", $chk_data );
	$chk_data = ereg_replace( "[[]", "［", $chk_data );
	$chk_data = ereg_replace( "[]]", "］", $chk_data );
	$chk_data = ereg_replace( "_",   "＿", $chk_data );
	$chk_data = ereg_replace( "%",   "％", $chk_data );
	$chk_data = ereg_replace( "'",   "’", $chk_data );
	$chk_data = htmlspecialchars( $chk_data );

	return $chk_data;

}

// *******************************************
// 入力エリアの9999/99/99(年月日)チェック
// *******************************************
function is_Yyyymmdd( $chk_data ){

	// xxxx/x/xをxxxx/0x/0xに成形してからチェック
	if ( (substr( $chk_data, 4, 1 ) == "/") &&
		 (ereg( "[^0-9]", substr( $chk_data, 0, 4 ) ) == 0) ) {

		if ( strlen($chk_data) == 9 ) {
			if ( (substr( $chk_data, 6, 1 ) == "/") &&
				 (ereg("[^0-9]", substr( $chk_data, 5, 1 ) ) == 0) ) {
				$chk_data = substr( $chk_data, 0, 5 ) . "0" . substr( $chk_data, 5, 4 );
			}
		}

		if ( strlen($chk_data) == 9 ) {
			if ( (substr( $chk_data, 7, 1 ) == "/") &&
				 (ereg("[^0-9]", substr( $chk_data, 8, 1 ) ) == 0) ) {
				$chk_data = substr( $chk_data, 0, 8 ) . "0" . substr( $chk_data, 8, 1 );
			}
		}

		if ( strlen($chk_data) == 8 ) {
			if ( (substr( $chk_data, 6, 1 ) == "/") &&
				 (ereg("[^0-9]", substr( $chk_data, 5, 1 ) ) == 0) ) {
				$chk_data = substr( $chk_data, 0, 5 ) . "0" . substr( $chk_data, 5, 3 );
			}
			if ( (substr( $chk_data, 7, 1 ) == "/") &&
				 (ereg("[^0-9]", substr( $chk_data, 8, 1 ) ) == 0) ) {
				$chk_data = substr( $chk_data, 0, 8 ) . "0" . substr( $chk_data, 8, 1 );
			}
		}
	}

	$err_msg = "";
	if ( (strlen($chk_data) != 0) && (strlen($chk_data) != 10) ) {
		$err_msg = "9999/99/99以外の入力は出来ません。";
	}

	if (strlen($chk_data) == 10) {
		if ( ereg("[^0-9]", substr( $chk_data, 0, 4) ) != 0) {
			$err_msg = "9999/99/99以外の入力は出来ません。";
		}
		if ( ereg("[^0-9]", substr( $chk_data, 5, 2) ) != 0) {
			$err_msg = "9999/99/99以外の入力は出来ません。";
		}
		if ( ereg("[^0-9]", substr( $chk_data, 8, 2) ) != 0) {
			$err_msg = "9999/99/99以外の入力は出来ません。";
		}
		if ( substr( $chk_data, 4, 1) != "/" ) {
			$err_msg = "9999/99/99以外の入力は出来ません。";
		}
		if ( substr( $chk_data, 7, 1) != "/" ) {
			$err_msg = "9999/99/99以外の入力は出来ません。";
		}
	}

	$ary_Yyyymmdd[0] = $err_msg;
	$ary_Yyyymmdd[1] = $chk_data;

	return $ary_Yyyymmdd;

}

// *************************************
// 生年月日から年齢の計算
// *************************************
function age_calc( $age_data ){

	$sys_ymd = date(Ymd);
	$sys_yy  = substr( $sys_ymd, 0, 4 );
	$sys_mm  = substr( $sys_ymd, 4, 2 );
	$sys_dd  = substr( $sys_ymd, 6, 2 );

	$bir_ymd = $age_data;
	$bir_yy  = substr( $age_data, 0, 4 );
	$bir_mm  = substr( $age_data, 5, 2 );
	$bir_dd  = substr( $age_data, 8, 2 );

	$calc_age = 0;

	if ( $sys_yy != $bir_yy ) {
		if ( $sys_mm * 100 + $sys_dd >= $bir_mm * 100 + $bir_dd ) {
			$calc_age = $sys_yy - $bir_yy;
		} else {
			$calc_age = $sys_yy - $bir_yy - 1;
		}
	}

	return $calc_age;

}

// *************************************
// 年齢から生年月日計算
// *************************************
function birth_calc( $age_data ){

	$sys_ymd = date(Ymd);
	$sys_yy  = substr( $sys_ymd, 0, 4 );
	$sys_mm  = substr( $sys_ymd, 4, 2 );
	$sys_dd  = substr( $sys_ymd, 6, 2 );

	$age_yy1 = $sys_yy - $age_data - 1;
	$age_mm1 = $sys_mm;
	$age_dd1 = $sys_dd + 1;

	$age_yy2 = $sys_yy - $age_data;
	$age_mm2 = $sys_mm;
	$age_dd2 = $sys_dd;

	$age_yy1 = sprintf("%04d", $age_yy1);
	$age_mm1 = sprintf("%02d", $age_mm1);
	$age_dd1 = sprintf("%02d", $age_dd1);

	$age_yy2 = sprintf("%04d", $age_yy2);
	$age_mm2 = sprintf("%02d", $age_mm2);
	$age_dd2 = sprintf("%02d", $age_dd2);

	$ary_birth[0] = $age_yy1 . "/" . $age_mm1 . "/" . $age_dd1;
	$ary_birth[1] = $age_yy2 . "/" . $age_mm2 . "/" . $age_dd2;

	return $ary_birth;

}

// *******************************************
// システム日時を基準にした日付計算
// *******************************************
function is_calcdate( $valY, $valm, $vald, $valH, $vali, $vals ){

	return date( "YmdHis", mktime( date("H")+$valH, date("i")+$vali, date("s")+$vals,
								   date("m")+$valm, date("d")+$vald, date("Y")+$valY ));
}

// *******************************************
// 数値型ランダムデータの自動作成
// *******************************************
function number_automake( $keta ){

	srand((double)microtime()*1000000);
	$auto_number = "";

	for ($i=0; $i<$keta; $i++) {
		$auto_number .= rand(0, 9);
	}

	return $auto_number;

}

// *******************************************
// アルファ数値型ランダムデータの自動作成
// *******************************************
function alpnum_automake( $keta ){

	$alphabet = array(
		"a", "b", "c", "d", "e", "f", "g", "h", "i",
		"j", "k", "l", "m", "n", "o", "p", "q", "r",
		"s", "t", "u", "v", "w", "x", "y", "z",
		"A", "B", "C", "D", "E", "F", "G", "H", "I",
		"J", "K", "L", "M", "N", "O", "P", "Q", "R",
		"S", "T", "U", "V", "W", "X", "Y", "Z"
	);

	srand((double)microtime()*1000000);
	$auto_alpnum = "";

	for ($i=0; $i<$keta; $i++) {
		$temp_alpnum = rand(0, 61);

		if ($temp_alpnum < 10) {
			$auto_alpnum .= $temp_alpnum;
		} else {
			$auto_alpnum .= $alphabet[ $temp_alpnum - 10 ];
		}
	}

	return $auto_alpnum;

}

// *******************************************
// 英語のみのデータ禁止
// *******************************************
function alponly_ban( $chk_data ){

	if (!preg_match("/[\x80-\xff]/", $chk_data)) {
		$err_msg = "日本語が含まれないデータの投稿は出来ません。";
	}

}

// *******************************************
// 会員ID重複チェック
// *******************************************
function id_Overlap_check( $chk_data ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'member_id'.
' FROM '
	.'member_data'.
' WHERE '
	.'member_login = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "s", $chk_data);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);

	}
	dbi_stmt_close($stmt);
	dbi_close($cnn);

	return $cnt;

}


// *******************************************
// セレクトボックスのオプション要素生成(smarty風に生成）
// *******************************************
function html_options( $op_arr, $selected ) {
	$op = "";
	if ( is_array( $op_arr ) ) {
		reset( $op_arr );
		while( list( $key, $val ) = each ( $op_arr ) ) {
			$op .= "<option value='" . $key . "'";
			if ( $selected == $key ) {
				$op .= " selected";
			}
			$op .= ">" . $val . "</option>\n";
		}
	}

	return $op;
}

// *******************************************
// MINEヘッダ取得
// *******************************************
function getFileConfigArray() {
	$file_header_config = array(
		'ai'	=>	'application/postscript',
		'aif'	=>	'audio/x-aiff',
		'aifc'	=>	'audio/x-aiff',
		'aiff'	=>	'audio/x-aiff',
		'asc'	=>	'text/plain',
		'au'	=>	'audio/basic',
		'avi'	=>	'video/x-msvideo',
		'bcpio'	=>	'application/x-bcpio',
		'bin'	=>	'application/octet-stream',
		'bmp'	=>	'image/bmp',
		'cdf'	=>	'application/x-netcdf',
		'class'	=>	'application/octet-stream',
		'cpio'	=>	'application/x-cpio',
		'cpt'	=>	'application/mac-compactpro',
		'csh'	=>	'application/x-csh',
		'css'	=>	'text/css',
		'dcr'	=>	'application/x-director',
		'dir'	=>	'application/x-director',
		'djv'	=>	'image/vnd.djvu',
		'djvu'	=>	'image/vnd.djvu',
		'dll'	=>	'application/octet-stream',
		'dms'	=>	'application/octet-stream',
		'doc'	=>	'application/msword',
		'docx'	=>	'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'docm'	=>	'application/vnd.ms-word.document.macroEnabled.12',
		'dvi'	=>	'application/x-dvi',
		'dxr'	=>	'application/x-director',
		'eps'	=>	'application/postscript',
		'etx'	=>	'text/x-setext',
		'exe'	=>	'application/octet-stream',
		'ez'	=>	'application/andrew-inset',
		'gif'	=>	'image/gif',
		'gtar'	=>	'application/x-gtar',
		'hdf'	=>	'application/x-hdf',
		'hqx'	=>	'application/mac-binhex40',
		'htm'	=>	'text/html',
		'html'	=>	'text/html',
		'ice'	=>	'x-conference/x-cooltalk',
		'ief'	=>	'image/ief',
		'iges'	=>	'model/iges',
		'igs'	=>	'model/iges',
		'jpe'	=>	'image/jpeg',
		'jpeg'	=>	'image/jpeg',
		'jpg'	=>	'image/jpeg',
		'js'	=>	'application/x-javascript',
		'kar'	=>	'audio/midi',
		'latex'	=>	'application/x-latex',
		'lha'	=>	'application/octet-stream',
		'lzh'	=>	'application/octet-stream',
		'm3u'	=>	'audio/x-mpegurl',
		'man'	=>	'application/x-troff-man',
		'me'	=>	'application/x-troff-me',
		'mesh'	=>	'model/mesh',
		'mid'	=>	'audio/midi',
		'midi'	=>	'audio/midi',
		'mif'	=>	'application/vnd.mif',
		'mov'	=>	'video/quicktime',
		'movie'	=>	'video/x-sgi-movie',
		'mp2'	=>	'audio/mpeg',
		'mp3'	=>	'audio/mpeg',
		'mpe'	=>	'video/mpeg',
		'mpeg'	=>	'video/mpeg',
		'mpg'	=>	'video/mpeg',
		'mpga'	=>	'audio/mpeg',
		'ms'	=>	'application/x-troff-ms',
		'msh'	=>	'model/mesh',
		'mxu'	=>	'video/vnd.mpegurl',
		'nc'	=>	'application/x-netcdf',
		'oda'	=>	'application/oda',
		'pbm'	=>	'image/x-portable-bitmap',
		'pdb'	=>	'chemical/x-pdb',
		'pdf'	=>	'application/pdf',
		'pgm'	=>	'image/x-portable-graymap',
		'pgn'	=>	'application/x-chess-pgn',
		'png'	=>	'image/png',
		'pnm'	=>	'image/x-portable-anymap',
		'ppm'	=>	'image/x-portable-pixmap',
		'ppt'	=>	'application/vnd.ms-powerpoint',
		'pptx'	=>	'application/vnd.openxmlformats-officedocument.presentationml.presentation',
		'pptm'	=>	'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
		'ps'	=>	'application/postscript',
		'qt'	=>	'video/quicktime',
		'ra'	=>	'audio/x-realaudio',
		'ram'	=>	'audio/x-pn-realaudio',
		'ras'	=>	'image/x-cmu-raster',
		'rgb'	=>	'image/x-rgb',
		'rm'	=>	'audio/x-pn-realaudio',
		'roff'	=>	'application/x-troff',
		'rpm'	=>	'audio/x-pn-realaudio-plugin',
		'rtf'	=>	'text/rtf',
		'rtx'	=>	'text/richtext',
		'sgm'	=>	'text/sgml',
		'sgml'	=>	'text/sgml',
		'sh'	=>	'application/x-sh',
		'shar'	=>	'application/x-shar',
		'silo'	=>	'model/mesh',
		'sit'	=>	'application/x-stuffit',
		'skd'	=>	'application/x-koan',
		'skm'	=>	'application/x-koan',
		'skp'	=>	'application/x-koan',
		'skt'	=>	'application/x-koan',
		'smi'	=>	'application/smil',
		'smil'	=>	'application/smil',
		'snd'	=>	'audio/basic',
		'so'	=>	'application/octet-stream',
		'spl'	=>	'application/x-futuresplash',
		'src'	=>	'application/x-wais-source',
		'sv4cpio'	=>	'application/x-sv4cpio',
		'sv4crc'	=>	'application/x-sv4crc',
		'swf'	=>	'application/x-shockwave-flash',
		't'		=>	'application/x-troff',
		'tar'	=>	'application/x-tar',
		'tcl'	=>	'application/x-tcl',
		'tex'	=>	'application/x-tex',
		'texi'	=>	'application/x-texinfo',
		'texinfo'	=>	'application/x-texinfo',
		'tif'	=>	'image/tiff',
		'tiff'	=>	'image/tiff',
		'tr'	=>	'application/x-troff',
		'tsv'	=>	'text/tab-separated-values',
		'txt'	=>	'text/plain',
		'ustar'	=>	'application/x-ustar',
		'vcd'	=>	'application/x-cdlink',
		'vrml'	=>	'model/vrml',
		'wav'	=>	'audio/x-wav',
		'wbmp'	=>	'image/vnd.wap.wbmp',
		'wbxml'	=>	'application/vnd.wap.wbxml',
		'wml'	=>	'text/vnd.wap.wml',
		'wmlc'	=>	'application/vnd.wap.wmlc',
		'wmls'	=>	'text/vnd.wap.wmlscript',
		'wmlsc'	=>	'application/vnd.wap.wmlscriptc',
		'wrl'	=>	'model/vrml',
		'xbm'	=>	'image/x-xbitmap',
		'xht'	=>	'application/xhtml+xml',
		'xhtml'	=>	'application/xhtml+xml',
		'xls'	=>	'application/vnd.ms-excel',
		'xlsx'	=>	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'xlsm'	=>	'application/vnd.ms-excel.sheet.macroEnabled.12',
		'xml'	=>	'text/xml',
		'xpm'	=>	'image/x-xpixmap',
		'xsl'	=>	'text/xml',
		'xwd'	=>	'image/x-xwindowdump',
		'xyz'	=>	'chemical/x-xyz',
		'zip'	=>	'application/zip'
	);

	return $file_header_config;
}

// *******************************************
// ディレクトリ削除
// *******************************************
function remove_directory($dir) {
  if ($handle = opendir("$dir")) {
   while (false !== ($item = readdir($handle))) {
     if ($item != "." && $item != "..") {
       if (is_dir("$dir/$item")) {
         remove_directory("$dir/$item");
       } else {
         unlink("$dir/$item");
       }
     }
   }
   closedir($handle);
   rmdir($dir);
  }
}

// *******************************************
// PAGER設定
// *******************************************
function pager($idname,$countRe){

	$id =$_GET[$idname];
	foreach($_GET as $key => $value){
		if ($key != $idname){
			$other_param .= "&".$key."=".urlencode($value);
		}
	}
	if($id==""){ $id=1; }
	$maxPage=ceil($countRe / PER_PAGE);
	if( ($maxPage == 1) or ($maxPage < $id) ) return false;
	$page_footer_ul = "<ul class=\"pager\">\n";
	if($id > VIEW_PAGE_MENU_WIDTH + 1){
		$startPage = $id - VIEW_PAGE_MENU_WIDTH;
		$startMore = "<li><a href=\"$PHP_SELF?".$idname."=".($startPage - 1).$other_param."\">".PREV_MARK." </a></li>\n";
	}else{
		$startPage = 1;
	}
	if($id + VIEW_PAGE_MENU_WIDTH < $maxPage){
		$endPage = $id + VIEW_PAGE_MENU_WIDTH;
		$endMore = "<li><a href=\"$PHP_SELF?".$idname."=".($endPage + 1).$other_param."\"> ".NEXT_MARK."</a></li>\n";
	}else{
		$endPage = $maxPage;
	}
	for($i = $startPage ; $i <= $endPage ; $i++){
		if($id==$i){
			$page_footer.= "<li><span>$i</span></li>\n";
		}else{
			$page_footer.= "<li><a href=\"$PHP_SELF?$idname=$i$other_param\">$i</a></li>\n";
		}
	}
	$page_footer_eul = "</ul>\n";
	$page_footer = $page_footer_ul.$startMore.$page_footer.$endMore.$page_footer_eul;
	return $page_footer;
}

// *******************************************
// カテゴリー配列生成
// *******************************************
function Category_Select_Create_1( $select ){

	$status = 1;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'ctgr_id,ctgr_name'.
' FROM '
	.'eng_category'.
' WHERE '
	.'status <= ?'.
' ORDER BY '
	.'ctgr_order, update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$ctgr_id,
				$ctgr_name
			);
			$arr = array();
			while (mysqli_stmt_fetch($stmt)) {
				$arr += array($ctgr_id => $ctgr_name);
			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	$catg_op = html_options( $arr, $select );

	return $catg_op;

}

// *******************************************
// 表示順配列生成
// *******************************************
function Order_Select_Create_1( $max, $select ){

	$arr = array();
	for ($i=1; $i<=$max; $i++) {
		if ( $i >= 1 && $i <= $max ) {
			$arr += array($i => $i);
		}
		if ($i >= $max) { break; }
	}

	$order_op = html_options( $arr, $select );

	return $order_op;

}

// *******************************************
// 日付配列生成
// *******************************************
function Date_Select_Create_1( $stt, $max, $select ){

	$arr = array();
	for ($i=$stt; $i<=$max; $i++) {
		if ( $i >= $stt && $i <= $max ) {
			$arr += array($i => $i);
		}
		if ($i >= $max) { break; }
	}

	$date_op = html_options( $arr, $select );

	return $date_op;

}

// **************************************************************************
// ページ固有関数
// **************************************************************************
// *******************************************
// コンテンツ新規登録
// *******************************************
function Icp_Contets_Regist( $arr ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tri_begin($cnn);
	$sql =
"INSERT INTO eng_content ("
	."cts_title,".
	"cts_ctgr,".
	"cts_body,".
	"cts_alias,".
	"cts_rank,".
	"status,".
	"regist_dt,".
	"update_dt".
") VALUES ("
	."?,?,?,?,?,?,?,?".
")";
	$stmt = mysqli_prepare($cnn, $sql);
	mysqli_stmt_bind_param($stmt, 'sissiiss',
		$title,
		$catg,
		$body,
		$alias,
		$rank,
		$status,
		$now,
		$now
	);
	$now    = date( "Y-m-d h:i:s" );
	$status = 0;
	$title  = mysqli_real_escape_string($cnn, $arr[0]);
	$catg   = $arr[1];
//	$body   = mysqli_real_escape_string($cnn, $arr[2]);
	$body   = $arr[2];
	$rank   = $arr[3];
	$alias  = $arr[4];
	dbi_stmt_exe($stmt);
	tri_commit($cnn);
	dbi_close($cnn);

}

// *******************************************
// コンテンツ内容変更
// *******************************************
function Icp_Contets_Edit( $id, $arr ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tri_begin($cnn);
	$sql =
"UPDATE eng_content SET ".
	"cts_title = ?, ".
	"cts_ctgr = ?, ".
	"cts_body = ?, ".
	"cts_alias = ?, ".
	"cts_rank = ?, ".
	"status = ?, ".
	"update_dt = ? ".
"WHERE cts_id = ?";
	$stmt = mysqli_prepare($cnn, $sql);
	mysqli_stmt_bind_param($stmt, 'sissiisi',
		$title,
		$catg,
		$body,
		$alias,
		$rank,
		$status,
		$now,
		$cid
	);
	$cid    = $id;
	$now    = date( "Y-m-d h:i:s" );
	$status = $arr[4];
	$title  = mysqli_real_escape_string($cnn, $arr[0]);
	$catg   = $arr[1];
	$body   = $arr[2];
	$rank   = $arr[3];
	$alias   = $arr[5];
	dbi_stmt_exe($stmt);
	tri_commit($cnn);
	dbi_close($cnn);

}

// *******************************************
// コンテンツリストのカテゴリー変更
// *******************************************
function Category_Select_Create_2( $select ){

	$status = 1;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'ctgr_id,ctgr_name'.
' FROM '
	.'eng_category'.
' WHERE '
	.'status <= ?'.
' ORDER BY '
	.'ctgr_order, update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$ctgr_id,
				$ctgr_name
			);
			$arr = array();
			while (mysqli_stmt_fetch($stmt)) {
				$arr += array('eng_content_list.php?catg='.$ctgr_id => $ctgr_name);
			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	$catg_op2 = html_options( $arr, 'eng_content_list.php?catg='.$select );

	return $catg_op2;

}

// *******************************************
// リンクのカテゴリー変更（カテゴリー編集）
// *******************************************
function Category_Select_Create_3( $select ){

	$status = 1;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'lctgr_id,lctgr_name'.
' FROM '
	.'eng_link_category'.
' WHERE '
	.'status <= ?'.
' ORDER BY '
	.'lctgr_order, update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$ctgr_id,
				$ctgr_name
			);
			$arr = array();
			while (mysqli_stmt_fetch($stmt)) {
				$arr += array('eng_link_category.php?sub='.$ctgr_id => '├　'.$ctgr_name);
			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	$catg_op3 = html_options( $arr, 'eng_link_category.php?sub='.$select );

	return $catg_op3;

}

// *******************************************
// リンクのカテゴリー変更（リンク編集）
// *******************************************
function Category_Select_Create_4( $select ){

	$status = 1;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'lctgr_id,lctgr_name'.
' FROM '
	.'eng_link_category'.
' WHERE '
	.'status <= ?'.
' ORDER BY '
	.'lctgr_order, update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$ctgr_id,
				$ctgr_name
			);
			$arr = array();
			while (mysqli_stmt_fetch($stmt)) {
				$arr += array('eng_link.php?catg='.$ctgr_id => '├　'.$ctgr_name);
			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	$catg_op4 = html_options( $arr, 'eng_link.php?catg='.$select );

	return $catg_op4;

}

// *******************************************
// リンクのサブカテゴリー変更（リンク編集）
// *******************************************
function Category_Select_Create_5( $category, $select ){

	$status = 1;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'sctgr_id,sctgr_name'.
' FROM '
	.'eng_link_sub'.
' WHERE '
	.'status <= ?'.
' AND '
	.'sctgr_lcatg = ?'.
' ORDER BY '
	.'sctgr_order, update_dt';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "ii", $status, $category);
		dbi_stmt_exe($stmt);
		dbi_store_res($stmt);
		$cnt = cni_count($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$ctgr_id,
				$ctgr_name
			);
			$arr = array();
			while (mysqli_stmt_fetch($stmt)) {
				$arr += array('eng_link.php?catg='.$category.'&sub='.$ctgr_id => '├　'.$ctgr_name);
			}
			dbi_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	$catg_op5 = html_options( $arr, 'eng_link.php?catg='.$category.'&sub='.$select );

	return $catg_op5;

}

// *******************************************
// リンクのカテゴリー読み込み
// *******************************************
function Sub_Link_name_Read( $id ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '.
	 'lctgr_name'.
' FROM '
	.'eng_link_category'.
' WHERE '
	.'status = 0'.
' AND '
	.'lctgr_id = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$name
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	return $name;

}

// *******************************************
// 旧エイリアス読み込み
// *******************************************
function Alias_Before_Read( $id ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '.
	 'cts_alias'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = 0'.
' AND '
	.'cts_id = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$alias
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	return $alias;

}

// *******************************************
// コンテンツ読み込み
// *******************************************
function Contents_Read_Index( $id ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_title, cts_body, cts_alias'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = 0'.
' AND '
	.'cts_id = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$cts_title,
				$cts_body,
				$cts_alias
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);
	$arr = array( $cts_title, $cts_body, $cts_alias );
	return $arr;

}

// *******************************************
// エイリアスからコンテンツIDを出力
// *******************************************
function Contents_Read_Id( $alias ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_id'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = 0'.
' AND '
	.'cts_alias = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "s", $alias);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$cts_id
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	return $cts_id;

}

// *******************************************
// コンテンツIDからカテゴリーを出力
// *******************************************
function Contents_Category_Read( $id ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_ctgr'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = 0'.
' AND '
	.'cts_id = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$ctgr
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	return $ctgr;

}

// *******************************************
// コンテンツ全出力
// *******************************************
function Contents_Read_All( $id ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_title, cts_ctgr, cts_body, cts_alias, cts_rank, status, regist_dt, update_dt'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = 0'.
' AND '
	.'cts_id = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$cts_title,
				$cts_ctgr,
				$cts_body,
				$cts_alias,
				$cts_rank,
				$status,
				$regist_dt,
				$update_dt
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);
	$arr = array(
		$cts_title,
		$cts_ctgr,
		$cts_body,
		$cts_alias,
		$cts_rank,
		$status,
		$regist_dt,
		$update_dt
	);
	return $arr;

}

// *******************************************
// メニュー出力(page)
// 通常表示
// *******************************************
function Navi_Menu_Read($select){

	$selected='class="selection"';

	if($select == ""){
		$s_menu2 = "<li><a href=\"./\"" . $selected . ">Home</a></li>\n";
	}else{
		$s_menu2 = "<li><a href=\"./\">Home</a></li>\n";
	}

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$status = 0;
	$stmt2 = dbi_stmt_init($cnn);
	$sql2  =
'SELECT '
	.'ctgr_id,ctgr_name'.
' FROM '
	.'eng_category'.
' WHERE '
	.'status = ?'.
' AND '
	.'ctgr_menu = 0'.
' ORDER BY '
	.'ctgr_order, ctgr_id';

	if (mysqli_stmt_prepare($stmt2,$sql2)) {

		mysqli_stmt_bind_param($stmt2, "i", $status);
		dbi_stmt_exe($stmt2);
		dbi_store_res($stmt2);
		$cnt2 = cni_count($stmt2);
		if($cnt2 > 0){
			mysqli_stmt_bind_result($stmt2,
				$ctgr_id,
				$ctgr_name
			);
			while (mysqli_stmt_fetch($stmt2)) {

				$stmt3 = dbi_stmt_init($cnn);
				$sql3 =
'SELECT '
	.'cts_id,cts_title,cts_alias, cts_body'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = 0'.
' AND '
	.'cts_ctgr = ?'.
// ' AND '
// 	.'cts_id > 2'.
' AND '
	.'cts_id != 1'.
' ORDER BY '
	.'cts_rank, cts_id';

				if (mysqli_stmt_prepare($stmt3,$sql3)) {

					mysqli_stmt_bind_param($stmt3, "i", $ctgr_id);
					dbi_stmt_exe($stmt3);
					dbi_store_res($stmt3);
					$cnt3 = mysqli_stmt_num_rows($stmt3);
					if($cnt3 == 0){
						$cts_id = NULL;
						$cts_title = "";
						$cts_alias = "";
					}elseif($cnt3 == 1){
						mysqli_stmt_bind_result($stmt3,
							$cts_id,
							$cts_title,
							$cts_alias,
							$cts_body
						);
						mysqli_stmt_fetch($stmt3);

						$selected_html = ($select == $cts_id) ? $selected : '';
						if ($cts_alias == 'redirect')
							$link = $cts_body;
						elseif ($cts_alias)
							$link = $cts_alias;
						else
							$link = '?p=' . $cts_id;

						$s_menu2 .= "<li><a href=\"" . $link . "\"" . $selected_html . ">" . $ctgr_name . "</a></li>\n";
						mysqli_stmt_close($stmt3);
					}else{
						$s_menu2 .= "<li><span class='menu_head'>" . $ctgr_name . "</span>\n";
						$s_menu2 .= "<ul>\n";

						mysqli_stmt_bind_result($stmt3,
							$cts_id,
							$cts_title,
							$cts_alias,
							$cts_body
						);
						while (mysqli_stmt_fetch($stmt3)) {

							$selected_html = ($select == $cts_id) ? $selected : '';
							if ($cts_alias == 'redirect')
								$link = $cts_body;
							elseif ($cts_alias)
								$link = $cts_alias;
							else
								$link = '?p=' . $cts_id;

							$s_menu2 .= "<li><a href=\"" . $link . "\"" . $selected_html . ">" . $cts_title . "</a></li>\n";
						}
						$s_menu2 .= "</ul>\n";
						$s_menu2 .= "</li>\n";
						mysqli_stmt_close($stmt3);
					}
				}
			}
			dbi_stmt_close($stmt2);
		}
	}
	dbi_close($cnn);
	//$menu_arr = array($s_menu, $s_menu2);
	return $s_menu2;

}

// *******************************************
// メニュー出力(page)
// Linksページを間に挿入する為に決め打ちしている部分あり
// cts_id < 2 と cts_id = 5 （上３つ）のメニューは決め打ち部分
// *******************************************
function Navi_Menu_Read_EX($select){

	// 決め打ち部分cts_id < 2 を最初に読み込み
	$cate = Contents_Category_Read( $select );
	$status = 0;
	$selected = " class=\"selection\"";
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_alias'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = ?'.
' AND '
	.'cts_id = 2';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$first
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	if($select == ""){
		$s_menu = "<li><a href=\"./\"" . $selected . ">Home</a></li>\n";
	}else{
		$s_menu = "<li><a href=\"./\">Home</a></li>\n";
	}
	if($select == 2){
		$s_menu .= "<li><a href=\"" . $first . "\"" . $selected . ">What is ALMA</a></li>\n";
	}else{
		$s_menu .= "<li><a href=\"" . $first . "\">What is ALMA</a></li>\n";
	}

	// 決め打ち部分cts_id = 5 を最初に読み込み
	$stmt5 = dbi_stmt_init($cnn);
	$sql  =
'SELECT '
	.'cts_alias, cts_title'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = ?'.
' AND '
	.'cts_id = 5';

	if (mysqli_stmt_prepare($stmt5,$sql)) {

		mysqli_stmt_bind_param($stmt5, "i", $status);
		mysqli_stmt_execute($stmt5);
		mysqli_stmt_store_result($stmt5);
		$cnt = mysqli_stmt_num_rows($stmt5);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt5,
				$cts_alias,
				$cts_title
			);
			mysqli_stmt_fetch($stmt5);
			mysqli_stmt_close($stmt5);
		}
	}
	if($select == 5){
		$s_menu .= "<li><a href=\"" . $cts_alias . "\"" . $selected . ">" . $cts_title . "</a></li>\n";
	}else{
		$s_menu .= "<li><a href=\"" . $cts_alias . "\">" . $cts_title . "</a></li>\n";
	}





	$stmt2 = dbi_stmt_init($cnn);
	$sql2  =
'SELECT '
	.'ctgr_id,ctgr_name'.
' FROM '
	.'eng_category'.
' WHERE '
	.'status = ?'.
' AND '
	.'ctgr_menu = 0'.
' ORDER BY '
	.'ctgr_order, ctgr_id';

	if (mysqli_stmt_prepare($stmt2,$sql2)) {

		mysqli_stmt_bind_param($stmt2, "i", $status);
		dbi_stmt_exe($stmt2);
		dbi_store_res($stmt2);
		$cnt2 = cni_count($stmt2);
		if($cnt2 > 0){
			mysqli_stmt_bind_result($stmt2,
				$ctgr_id,
				$ctgr_name
			);
			while (mysqli_stmt_fetch($stmt2)) {

				$stmt3 = dbi_stmt_init($cnn);
				$sql3 =
'SELECT '
	.'cts_id,cts_title,cts_alias'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = 0'.
' AND '
	.'cts_ctgr = ?'.
' AND '
	.'cts_id > 2'.
' AND '
	.'cts_id != 5'.
' ORDER BY '
	.'cts_rank, cts_id';

				if (mysqli_stmt_prepare($stmt3,$sql3)) {

					mysqli_stmt_bind_param($stmt3, "i", $ctgr_id);
					dbi_stmt_exe($stmt3);
					dbi_store_res($stmt3);
					$cnt3 = mysqli_stmt_num_rows($stmt3);
					if($cnt3 == 0){
						$cts_id = NULL;
						$cts_title = "";
						$cts_alias = "";
					}elseif($cnt3 == 1){
						mysqli_stmt_bind_result($stmt3,
							$cts_id,
							$cts_title,
							$cts_alias
						);
						mysqli_stmt_fetch($stmt3);
						if($cts_alias){
							if($cate == $ctgr_id){
								$s_menu2 .= "<li><a href=\"" . $cts_alias . "\"" . $selected . ">" . $ctgr_name . "</a></li>\n";
							}else{
								$s_menu2 .= "<li><a href=\"" . $cts_alias . "\">" . $ctgr_name . "</a></li>\n";
							}
						}else{
							if($cate == $ctgr_id){
								$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\"" . $selected . ">" . $ctgr_name . "</a></li>\n";
							}else{
								$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\">" . $ctgr_name . "</a></li>\n";
							}
						}
						mysqli_stmt_close($stmt3);
					}else{
						mysqli_stmt_bind_result($stmt3,
							$cts_id,
							$cts_title,
							$cts_alias
						);
						mysqli_stmt_fetch($stmt3);
						if($cate == $ctgr_id){
							if($cts_alias){
								if($cate == $ctgr_id){
									$s_menu2 .= "<li><a href=\"" . $cts_alias . "\"" . $selected . ">" . $ctgr_name . "</a>\n";
									$s_menu2 .= "<ul>\n";
								}else{
									$s_menu2 .= "<li><a href=\"" . $cts_alias . "\">" . $ctgr_name . "</a>\n";
									$s_menu2 .= "<ul>\n";
								}
							}else{
								if($cate == $ctgr_id){
									$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\"" . $selected . ">" . $ctgr_name . "</a>\n";
									$s_menu2 .= "<ul>\n";
								}else{
									$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\">" . $ctgr_name . "</a>\n";
									$s_menu2 .= "<ul>\n";
								}
							}
							if($cts_alias){
								if($select == $cts_id){
									$s_menu2 .= "<li><a href=\"" . $cts_alias . "\"" . $selected . ">" . $cts_title . "</a></li>\n";
								}else{
									$s_menu2 .= "<li><a href=\"" . $cts_alias . "\">" . $cts_title . "</a></li>\n";
								}
							}else{
								if($select == $cts_id){
									$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\"" . $selected . ">" . $cts_title . "</a></li>\n";
								}else{
									$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\">" . $cts_title . "</a></li>\n";
								}
							}
							while (mysqli_stmt_fetch($stmt3)) {
								if($cts_alias){
									if($select == $cts_id){
										$s_menu2 .= "<li><a href=\"" . $cts_alias . "\"" . $selected . ">" . $cts_title . "</a></li>\n";
									}else{
										$s_menu2 .= "<li><a href=\"" . $cts_alias . "\">" . $cts_title . "</a></li>\n";
									}
								}else{
									if($select == $cts_id){
										$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\"" . $selected . ">" . $cts_title . "</a></li>\n";
									}else{
										$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\">" . $cts_title . "</a></li>\n";
									}
								}
							}
							$s_menu2 .= "</ul>\n";
							$s_menu2 .= "</li>\n";
						}else{
							if($cts_alias){
								if($cate == $ctgr_id){
									$s_menu2 .= "<li><a href=\"" . $cts_alias . "\"" . $selected . ">" . $ctgr_name . "</a></li>\n";
								}else{
									$s_menu2 .= "<li><a href=\"" . $cts_alias . "\">" . $ctgr_name . "</a></li>\n";
								}
							}else{
								if($cate == $ctgr_id){
									$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\"" . $selected . ">" . $ctgr_name . "</a></li>\n";
								}else{
									$s_menu2 .= "<li><a href=\"?p=" . $cts_id . "\">" . $ctgr_name . "</a></li>\n";
								}
							}
						}
						mysqli_stmt_close($stmt3);
					}
				}
			}
			dbi_stmt_close($stmt2);
		}
	}
	dbi_close($cnn);
	$menu_arr = array($s_menu, $s_menu2);
	return $menu_arr;

}

// *******************************************
// メニュー出力(link)
// *******************************************
function Navi_linkMenu_Read($self, $cate){

	$status = 0;
	$selected = " class=\"selection\"";
	if($self == "link"){
		$s_menu2 .= "<li><a href=\"links\"" . $selected . ">Links</a>\n";
		$s_menu2 .= "<ul>\n";
	}else{
		$s_menu2 .= "<li><a href=\"links\">Links</a>\n";
		$s_menu2 .= "<ul>\n";
	}
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt2 = dbi_stmt_init($cnn);
	$sql2  =
'SELECT '
	.'lctgr_id,lctgr_name'.
' FROM '
	.'eng_link_category'.
' WHERE '
	.'status = ?'.
' ORDER BY '
	.'lctgr_order';

	if (mysqli_stmt_prepare($stmt2,$sql2)) {

		mysqli_stmt_bind_param($stmt2, "i", $status);
		dbi_stmt_exe($stmt2);
		dbi_store_res($stmt2);
		$cnt2 = cni_count($stmt2);
		if($cnt2 > 0){
			mysqli_stmt_bind_result($stmt2,
				$lctgr_id,
				$lctgr_name
			);
			while (mysqli_stmt_fetch($stmt2)) {

				$stmt3 = dbi_stmt_init($cnn);
				$sql3 =
'SELECT '
	.'sctgr_id,sctgr_name'.
' FROM '
	.'eng_link_sub'.
' WHERE '
	.'status = 0'.
' AND '
	.'sctgr_lcatg = ?'.
' ORDER BY '
	.'sctgr_order';

				if (mysqli_stmt_prepare($stmt3,$sql3)) {

					mysqli_stmt_bind_param($stmt3, "i", $lctgr_id);
					dbi_stmt_exe($stmt3);
					dbi_store_res($stmt3);
					$cnt3 = mysqli_stmt_num_rows($stmt3);
					if($cnt3 == 0){
						if($cate == $lctgr_id){
							$s_menu2 .= "<li><a href=\"links?cat=" . $lctgr_id . "\"" . $selected . ">" . $lctgr_name . "</a></li>\n";
						}else{
							$s_menu2 .= "<li><a href=\"links?cat=" . $lctgr_id . "\">" . $lctgr_name . "</a></li>\n";
						}
						mysqli_stmt_close($stmt3);
					}else{
						mysqli_stmt_bind_result($stmt3,
							$sctgr_id,
							$sctgr_name
						);
						mysqli_stmt_fetch($stmt3);
						if($cate == $lctgr_id){
							$s_menu2 .= "<li><a href=\"links?cat=" . $lctgr_id . "\"" . $selected . ">" . $lctgr_name . "</a>\n";
							$s_menu2 .= "<ul>\n";
							$s_menu2 .= "<li><a href=\"links?cat=" . $lctgr_id . "#contents" . $sctgr_id . "\">" . $sctgr_name . "</a></li>\n";
						}else{
							$s_menu2 .= "<li><a href=\"links?cat=" . $lctgr_id . "\">" . $lctgr_name . "</a>\n";
							$s_menu2 .= "<ul>\n";
							$s_menu2 .= "<li><a href=\"links?cat=" . $lctgr_id . "#contents" . $sctgr_id . "\">" . $sctgr_name . "</a></li>\n";
						}
						while (mysqli_stmt_fetch($stmt3)) {
							$s_menu2 .= "<li><a href=\"links?cat=" . $lctgr_id . "#contents" . $sctgr_id . "\">" . $sctgr_name . "</a></li>\n";
						}
						$s_menu2 .= "</ul>\n";
						$s_menu2 .= "</li>\n";
						mysqli_stmt_close($stmt3);
					}
				}
			}
			$s_menu2 .= "</ul>\n";
			$s_menu2 .= "</li>\n";
			dbi_stmt_close($stmt2);
		}
	}
	dbi_close($cnn);

	return $s_menu2;

}

// *******************************************
// リンクの一番最初のカテゴリー取得
// *******************************************
function Link_firstOrder_Read(){

	$status = 0;
	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '.
	 'lctgr_id'.
' FROM '
	.'eng_link_category'.
' WHERE '
	.'status = ?'.
' ORDER BY '
	.'lctgr_order'.
' LIMIT '
	.'0,1';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $status);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$id
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	return $id;

}

// *******************************************
// リンクカテゴリー読み込み
// *******************************************
function Link_Category_Read( $id ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '.
	 'lctgr_name'.
' FROM '
	.'eng_link_category'.
' WHERE '
	.'lctgr_id = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$name
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	return $name;

}

// *******************************************
// エイリアス重複チェック
// *******************************************
function Alias_Cross_Check( $value, $id ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '.
	 'cts_id'.
' FROM '
	.'eng_content'.
' WHERE '
	.'cts_alias = ?'.
' AND '
	.'status = 0'.
' AND '
	.'cts_id != ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "si", $value, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			$msg = "重複するエイリアスが存在します";
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	dbi_close($cnn);

	return $msg;

}

// *******************************************
// カテゴリー名読み込み
// *******************************************
function Search_Category_Read( $id ){

	$cnn = dbi_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$stmt = mysqli_stmt_init($cnn);
	$sql  =
'SELECT '.
	 'ctgr_name'.
' FROM '
	.'eng_category'.
' WHERE '
	.'status = 0'.
' AND '
	.'ctgr_id = ?';

	if (mysqli_stmt_prepare($stmt,$sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$cnt = mysqli_stmt_num_rows($stmt);
		if($cnt > 0){
			mysqli_stmt_bind_result($stmt,
				$name
			);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
	}
	$stmt2 = mysqli_stmt_init($cnn);
	$sql2  =
'SELECT '.
	 'cts_id,cts_alias'.
' FROM '
	.'eng_content'.
' WHERE '
	.'status = 0'.
' AND '
	.'cts_ctgr = ?'.
' ORDER BY '
	.'cts_rank'.
' LIMIT '
	.'0,1';

	if (mysqli_stmt_prepare($stmt2,$sql2)) {

		mysqli_stmt_bind_param($stmt2, "i", $id);
		mysqli_stmt_execute($stmt2);
		mysqli_stmt_store_result($stmt2);
		$cnt2 = mysqli_stmt_num_rows($stmt2);
		if($cnt2 > 0){
			mysqli_stmt_bind_result($stmt2,
				$cid,
				$alias
			);
			mysqli_stmt_fetch($stmt2);
			mysqli_stmt_close($stmt2);
		}
	}
	dbi_close($cnn);
	$arr = array($name, $cid, $alias);
	return $arr;

}

// **********************************************************************************************
// メール系関数・設定
// **********************************************************************************************
// ***********************************************
// メール送信
// @return: エラーメッセージ
// ***********************************************
function common_mail_send_1( $arr ) {

	$err_msg = '';

	include_once(dirname(__FILE__) . "/../PHPMailer/jphpmailer.php");

	//言語設定、内部エンコーディングを指定する
	mb_language("japanese");
	mb_internal_encoding("utf-8");

	$subject  = $arr[ 'subject' ]; //件名
	$from     = $arr[ 'sender_mail' ]; //メールのFROM
	$fromname = $arr[ 'fromname' ]; //FROMの名称（差出人名称)
	$to       = $arr[ 'to' ]; //メールの宛先
	$body     = $arr[ 'body' ]; // 本文

	$mail = new JPHPMailer();

	$mail->IsSMTP();
	$mail->Host = 'mail.jilm.or.jp:587';
	$mail->SMTPAuth = TRUE;
	$mail->Username = 'webmaster@jilm.or.jp';
	$mail->Password = 'eZPcrPu1';

	$mail->addTo($to);
	$mail->setFrom($from,$fromname);
	$mail->setSubject($subject);
	$mail->setBody($body);
	if (!$mail->send()){
	    echo("メールが送信できませんでした。エラー:".$mail->getErrorMessage());
	}
/*
	$mail = new PHPMailer();
	$mail->CharSet = "iso-2022-jp";
	$mail->Encoding = "7bit";

	$mail->AddAddress($to);
	$mail->From = $from;
	$mail->FromName = mb_encode_mimeheader(mb_convert_encoding($fromname,"JIS","utf-8"));
	$mail->Subject = mb_encode_mimeheader(mb_convert_encoding($subject,"JIS","utf-8"));
	$mail->Body  = mb_convert_encoding($body,"JIS","utf-8");

	//エラーがある場合、echoしてみたりする。
	if (!$mail->Send()){
		$err_msg = "メール送信エラー:" . $mail->ErrorInfo;
	}
*/

	return $err_msg;
}

?>