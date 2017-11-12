<?php
// *******************************************************************
// 軽金属学会　設定ファイル　Encording UTF-8
// *******************************************************************

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
// 該当レコードカウント
// *************************************
function db_rows($res){

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
// トランザクションコミット
// *************************************
function tr_commit($cnn){

	if (!cn_query("COMMIT", $cnn)) {
		cn_query("ROLLBACK", $cnn);
	}

	return true;

}

// **************************************************************************
// 変数設定
// **************************************************************************

// ＰＣ用表示ページ件数
define("CNST_PC_PAGE_05",  5);
define("CNST_PC_PAGE_10", 10);
define("CNST_PC_PAGE_15", 15);
define("CNST_PC_PAGE_20", 20);
define("CNST_PC_PAGE_25", 25);
define("CNST_PC_PAGE_30", 30);

// 有無区分
$UMU1_TYPE  = Array( 1 => '有り', 2 => '無し' );
$UMU2_TYPE  = Array( 0 => '', 1 => '有り', 2 => '無し' );

// 年リスト
$yyyy = substr( date( "Ymd" ), 0, 4 );
$YEAR_TYPE  = Array( '0' => '',
					 $yyyy   => $yyyy,   $yyyy-1 => $yyyy-1, $yyyy-2 => $yyyy-2, $yyyy-3 => $yyyy-3, $yyyy-4 => $yyyy-4,
					 $yyyy-5 => $yyyy-5, $yyyy-6 => $yyyy-6 );

// 年リスト
$YEAR_TYPE  = Array(
		'2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015',
		'2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020',
);

// 月リスト
$MONT_TYPE  = Array( '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
					'08' => '08','09' => '09', '10' => '10', '11' => '11', '12' => '12' );

// 日リスト
$DAYT_TYPE  = Array( '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
					'08' => '08','09' => '09', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15',
					'16' => '16','17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23',
					'24' => '24','25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31' );

// 曜日リスト
$YOBI1_TYPE = Array( '0' =>  '日', '1' => '月', '2' => '火', '3' => '水', '4' => '木', '5' => '金', '6' => '土' );
$YOBI2_TYPE = Array( '0' =>  'Sun', '1' => 'Mon', '2' => 'Tue', '3' => 'Wed', '4' => 'Thu', '5' => 'Fri', '6' => 'Sat' );

$PREF_TYPE  = Array( '0' => '未設定',
	'1' => '北海道','2' => '青森県','3' => '岩手県','4' => '宮城県','5' => '秋田県',
	'6' => '山形県','7' => '福島県','9' => '栃木県','15' => '新潟県','10' => '群馬県',
	'11' => '埼玉県','8' => '茨城県','12' => '千葉県','13' => '東京都','14' => '神奈川県',
	'19' => '山梨県','20' => '長野県','21' => '岐阜県','16' => '富山県','17' => '石川県',
	'22' => '静岡県','23' => '愛知県','24' => '三重県','29' => '奈良県','30' => '和歌山県',
	'18' => '福井県','25' => '滋賀県','26' => '京都府','27' => '大阪府','28' => '兵庫県',
	'33' => '岡山県','31' => '鳥取県','32' => '島根県','34' => '広島県','35' => '山口県',
	'37' => '香川県','36' => '徳島県','38' => '愛媛県','39' => '高知県','40' => '福岡県',
	'41' => '佐賀県','44' => '大分県','43' => '熊本県','45' => '宮崎県','42' => '長崎県',
	'46' => '鹿児島県','47' => '沖縄県','49' => '海外' );

// 性別リスト
$SEX_TYPE  = Array( '0' =>  '未設定', '1' => '男性', '2' => '女性' );


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
	if ( ereg("[^0-9 -]", $chk_data) != 0) {
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
//	if ( ereg("[^0-9a-zA-Z\-\+\/\*\<\>\?\!\#\$\%\&]", $chk_data) != 0) {
	if ( ereg("[^0-9a-zA-Z-]", $chk_data) != 0) {
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
	if ( ereg("[^0-9a-zA-Z\.\-\_]", $chk_data) != 0) {
		$err_msg = "英数字以外の入力は出来ません。";
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
// smarty風option生成
// *******************************************
function html_options( $op_arr, $selected='' ) {
	$op = "";
	if ( is_array( $op_arr ) ) {
		reset( $op_arr );
		while( list( $key, $val ) = each ( $op_arr ) ) {
			$op .= "<option value='" . $key . "' ";
			if ( $selected == $key ) {
				$op .= "selected";
			}
			$op .= ">" . $val . "</option>\n";
		}
	}

	return $op;
}

// *******************************************
// smarty風radioボタン生成
// *******************************************
function html_radios( $op_arr, $selected='', $op_name='', $separator='', $col='' ) {
	$op = "";
	$i = 1;
	if ( is_array( $op_arr ) ) {
		reset( $op_arr );
		while( list( $key, $val ) = each ( $op_arr ) ) {
			$op .= "<input type='radio' ";
			$op .= "name='" . $op_name . "' ";
			$op .= "value='" . $key . "' ";
			$op .= "id='radio_" . $op_name . $key . "' ";
			if ( $selected == $key ) {
				$op .= "checked";
			}
			$op .= ">";
			$op .= "<label for='radio_" . $op_name . $key ."' >";
			$op .= $val;
			$op .= "</label>";
			$op .= $separator . "\n";

			if ( $col != '' ) {
				$j = $i % $col;
				if ( $j == 0 ) {
					$op .= "<br>";
				}
			}

			$i++;
		}
	}

	return $op;
}

// **************************************************************************
// 管理画面専用
// **************************************************************************
// *******************************************
// 上階層チェック
// *******************************************
function Jilm_Fold_List_1( $chk_data, $file ){

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE ctgr_id = " . $chk_data;
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$ctgr_name = cn_contract($res, 0, "ctgr_name");
		$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
	}
	db_close($cnn);

	$tmp_data  = "<a href=\"" . $file . "?fold=" . $chk_data . "\">";
	$tmp_data .= $ctgr_name . "</a>";

	$_SESSION[ "JILM_ADMIN_FOLD_LIST" ] = $tmp_data . "&nbsp;&gt;&nbsp;" . $_SESSION[ "JILM_ADMIN_FOLD_LIST" ];

	if( $ctgr_fold > 0 ){
		Jilm_Fold_List_1( $ctgr_fold, $file );
	}
	return true;

}

// *******************************************
// 上階層チェック(リンクなし)
// *******************************************
function Jilm_Fold_List_2( $chk_data ){

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE ctgr_id = " . $chk_data;
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$ctgr_name = cn_contract($res, 0, "ctgr_name");
		$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
	}
	db_close($cnn);

	$_SESSION[ "JILM_ADMIN_FOLD_LIST2" ] = $ctgr_name . "&nbsp;&gt;&nbsp;" . $_SESSION[ "JILM_ADMIN_FOLD_LIST2" ];

	if( $ctgr_fold > 0 ){
		Jilm_Fold_List_2( $ctgr_fold );
	}
	return true;

}

// *******************************************
// 画像のwidth heightを取得
// *******************************************
Function Image_Type_Read( $imgdir, $tmpfile ) {

	$in_file = $imgdir . $tmpfile;

	if( $_SESSION[ "JILM_IMAGE_TYPE" ] == "jpg" ){
		$in_id   = imageCreatefromjpeg( $in_file );
	}elseif( $_SESSION[ "JILM_IMAGE_TYPE" ] == "gif" ){
		$in_id   = imageCreatefromgif( $in_file );
	}elseif( $_SESSION[ "JILM_IMAGE_TYPE" ] == "png" ){
		$in_id   = imageCreatefrompng( $in_file );
	}

	// 画像のサイズをセッションに格納
		$_SESSION[ "JILM_IMAGE_HEIGHT" ] = Imagesx( $in_id );
		$_SESSION[ "JILM_IMAGE_WIDTH" ]  = Imagesy( $in_id );

}

// *******************************************
// 画像の拡張子を取得
// *******************************************
Function Image_Type_Read_1( $chk_photo ) {

  if ( (strpos($chk_photo, ".jpg")  != 0) ||
       (strpos($chk_photo, ".jpeg") != 0) ||
       (strpos($chk_photo, ".JPG")  != 0) ||
       (strpos($chk_photo, ".JPEG") != 0) ){

    $_SESSION[ "JILM_IMAGE_TYPE" ] = "jpg";

  }elseif ( (strpos($chk_photo, ".gif")  != 0) ||
       (strpos($chk_photo, ".GIF") != 0) ){

    $_SESSION[ "JILM_IMAGE_TYPE" ] = "gif";

  }elseif ( (strpos($chk_photo, ".png")  != 0) ||
       (strpos($chk_photo, ".PNG") != 0) ){

    $_SESSION[ "JILM_IMAGE_TYPE" ] = "png";

  }elseif ( (strpos($chk_photo, ".swf")  != 0) ||
       (strpos($chk_photo, ".SWF") != 0) ){

    $_SESSION[ "JILM_IMAGE_TYPE" ] = "swf";

  }

}

// **************************************************************************
// 表ページ専用
// **************************************************************************
// *******************************************
// コンテンツ表示（会員用）
// *******************************************
Function Jilm_Contents_Read_1( $chk_data ) {

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_body";
	$sql .= " WHERE cts_id = " . $chk_data;
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
	}
	if( $max_cnt > 0 ){
		$_SESSION[ "JILM_CONTENTS_CTGR" ]   = cn_contract($res, 0, "cts_ctgr");
		$_SESSION[ "JILM_CONTENTS_TITLE" ]  = cn_contract($res, 0, "cts_title");
		$_SESSION[ "JILM_CONTENTS_BODY" ]   = cn_contract($res, 0, "cts_body");
		$_SESSION[ "JILM_CONTENTS_STATUS" ] = cn_contract($res, 0, "status");
	}
	db_close($cnn);
	return true;

}

// *******************************************
// リスト表示
// *******************************************
Function Jilm_Contents_Read_2( $chk_data ) {

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE status = 0";
	$sql .= "  AND ctgr_oya = " . $chk_data;
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$ctgr_id   = cn_contract($res, $i, "ctgr_id");
					$ctgr_name = cn_contract($res, $i, "ctgr_name");

					$tbl .= "<li><a href=\"./?mode=list&fid=" . $ctgr_id;
					$tbl .= "\"><img src=\"./images/fold.png\" width=\"18\" ";
					$tbl .= "height=\"18\" />&nbsp;" . $ctgr_name . "</a></li>\n";
				}
			}
		}
	}
	db_close($cnn);

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_body";
	$sql .= " WHERE status = 0";
	$sql .= "  AND cts_ctgr = " . $chk_data;
	$sql .= " ORDER BY cts_rank, update_dt";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$dsp_cnt = 50;
			$dsp_page = $_GET[ "dsp_page" ];
			if ($dsp_page == "")    { $dsp_page = 1; }
			$max_page = floor($max_cnt / $dsp_cnt) + 1;
			if (!($max_cnt % $dsp_cnt)) { $max_page--; }
			for ($i=1; $i<=$max_page; $i++) {
				if ($dsp_page != 1 && $i == $dsp_page - 1) {
					$page_link1 = "[ <a href='./?mode=list&fid=".$chk_data."&dsp_page=".$i."'>前の" . $dsp_cnt . "件</a> ]";
				}
				if ($dsp_page != $max_page && $i == $dsp_page + 1) {
					$page_link2 = "[ <a href='./?mode=list&fid=".$chk_data."&dsp_page=".$i."'>次の" . $dsp_cnt . "件</a> ]";
				}
			}
			if ($dsp_page != $max_page || $max_cnt % $dsp_cnt == 0) {
				$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
			} else {
				$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . ($max_cnt % $dsp_cnt) . "件表示";
			}
			$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
			$end_cnt = $dsp_page * $dsp_cnt - 1;
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= $stt_cnt && $i <= $end_cnt ) {

					$cts_id    = cn_contract($res, $i, "cts_id");
					$cts_title = cn_contract($res, $i, "cts_title");

					$tbl .= "<li>&nbsp;&nbsp;<a href=\"./?mode=view&cid=";
					$tbl .= $cts_id . "\">" . $cts_title . "</a></li>\n";
				}
				if ($i >= $end_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	$_SESSION[ "JILM_CATEGORY_LIST" ] = $tbl;

}

// *******************************************
// リスト表示（ログイン後）
// *******************************************
Function Jilm_Contents_Read_3( $chk_data ) {

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE status = 0";
	$sql .= "  AND ctgr_oya = " . $chk_data;
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$ctgr_id   = cn_contract($res, $i, "ctgr_id");
					$ctgr_name = cn_contract($res, $i, "ctgr_name");

					$tbl .= "<li><a href=\"./?mode=list&fid=" . $ctgr_id;
					$tbl .= "\"><img src=\"./images/fold.png\" width=\"18\" ";
					$tbl .= "height=\"18\" />&nbsp;" . $ctgr_name . "</a></li>\n";
				}
			}
		}
	}
	db_close($cnn);

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE status = 1";
	$sql .= "  AND ctgr_oya = " . $chk_data;
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= 0 && $i <= $max_cnt ) {
					$ctgr_id   = cn_contract($res, $i, "ctgr_id");
					$ctgr_name = cn_contract($res, $i, "ctgr_name");

					$tbl .= "<li><a href=\"./?mode=list&fid=" . $ctgr_id;
					$tbl .= "\"><img src=\"./images/fold_key.png\" width=\"18\" ";
					$tbl .= "height=\"18\" />&nbsp;" . $ctgr_name . "</a></li>\n";
				}
			}
		}
	}
	db_close($cnn);

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_body";
	$sql .= " WHERE status < 2";
	$sql .= "  AND cts_ctgr = " . $chk_data;
	$sql .= " ORDER BY cts_rank, update_dt";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$dsp_cnt = 50;
			$dsp_page = $_GET[ "dsp_page" ];
			if ($dsp_page == "")    { $dsp_page = 1; }
			$max_page = floor($max_cnt / $dsp_cnt) + 1;
			if (!($max_cnt % $dsp_cnt)) { $max_page--; }
			for ($i=1; $i<=$max_page; $i++) {
				if ($dsp_page != 1 && $i == $dsp_page - 1) {
					$page_link1 = "[ <a href='./?mode=list&fid=".$chk_data."&dsp_page=".$i."'>前の" . $dsp_cnt . "件</a> ]";
				}
				if ($dsp_page != $max_page && $i == $dsp_page + 1) {
					$page_link2 = "[ <a href='./?mode=list&fid=".$chk_data."&dsp_page=".$i."'>次の" . $dsp_cnt . "件</a> ]";
				}
			}
			if ($dsp_page != $max_page || $max_cnt % $dsp_cnt == 0) {
				$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
			} else {
				$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . ($max_cnt % $dsp_cnt) . "件表示";
			}
			$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
			$end_cnt = $dsp_page * $dsp_cnt - 1;
			for ($i=0; $i<$max_cnt; $i++) {
				if ( $i >= $stt_cnt && $i <= $end_cnt ) {

					$cts_id    = cn_contract($res, $i, "cts_id");
					$cts_title = cn_contract($res, $i, "cts_title");

					$tbl .= "<li>&nbsp;&nbsp;<a href=\"./?mode=view&cid=";
					$tbl .= $cts_id . "\">" . $cts_title . "</a></li>\n";
				}
				if ($i >= $end_cnt) { break; }
			}
		}
	}

	db_close($cnn);

	$_SESSION[ "JILM_CATEGORY_LIST" ] = $tbl;

}

// *******************************************
// 階層表示
// *******************************************
Function Jilm_Fold_List_3( $chk_data ){

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE ctgr_id = " . $chk_data;
	$sql .= "  AND status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$ctgr_id   = cn_contract($res, 0, "ctgr_id");
		$ctgr_name = cn_contract($res, 0, "ctgr_name");
		$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
	}
	db_close($cnn);

	$tmp_data  = "<li>" . $ctgr_name . "</li>\n";

	$_SESSION[ "JILM_CLASS_LIST" ] = $tmp_data . $_SESSION[ "JILM_CLASS_LIST" ];

	if( $ctgr_fold > 0 ){
		Jilm_Fold_List_3( $ctgr_fold );
	}
	return true;

}

// *******************************************
// 上層チェック
// *******************************************
Function Jilm_Fold_List_4( $chk_data ){

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE ctgr_id = " . $chk_data;
	$sql .= "  AND status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$fold_new = cn_contract($res, 0, "ctgr_oya");
	}
	db_close($cnn);

	if( $fold_new != "0" ){
		$_SESSION[ "JILM_FOLD_CHECK" ] = $fold_new;
		Jilm_Fold_List_4( $fold_new );
	}
	return $_SESSION[ "JILM_FOLD_CHECK" ];

}

// *******************************************
// メニューカテゴリー作成
// *******************************************
Function Jilm_Menu_List_1( $chk_data ){

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE ctgr_id = " . $chk_data;
	$sql .= "  AND status = 0";
	$res  = cn_query($sql, $cnn);

	$sql2  = " SELECT * FROM content_body";
	$sql2 .= " WHERE cts_ctgr = " . $chk_data;
	$sql2 .= "  AND status = 0";
	$sql2 .= " ORDER BY cts_rank LIMIT 0,1";
	$res2  = cn_query($sql2, $cnn);
	if ($res2 == true){
		$max_cnt = cn_count($res);
	}
	if( $max_cnt > 0 ){
		$cts_id    = cn_contract($res2, 0, "cts_id");
		$ctgr_name = cn_contract($res, 0, "ctgr_name");

		$_SESSION[ "JILM_MENU_CLASS" ] .= "<li><a href=\"./?mode=content&pid=" . $cts_id;
		$_SESSION[ "JILM_MENU_CLASS" ] .= "\">" . $ctgr_name . "</a>\n";
		$_SESSION[ "JILM_MENU_CLASS" ] .= "<ul>\n";
		$_SESSION[ "JILM_MENU_KFLG" ] = "ON";
	}
	db_close($cnn);
	return true;

}

// *******************************************
// メニュー作成
// *******************************************
Function Jilm_Menu_List_2( $chk_data ){

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_body";
	$sql .= " WHERE cts_ctgr = " . $chk_data;
	$sql .= "  AND status = 0";
	$sql .= " ORDER BY cts_rank";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
	}
	if( $max_cnt > 0 ){
		for ($i=0; $i<$max_cnt; $i++) {
			$cts_id    = cn_contract($res, $i, "cts_id");
			$cts_title = cn_contract($res, $i, "cts_title");

			if(( $i == 0 )&&( $_SESSION[ "JILM_MENU_KFLG" ] == "" )){
				$_SESSION[ "JILM_MENU_CLASS" ] .= "<ul>\n";
			}
			$_SESSION[ "JILM_MENU_CLASS" ] .= "<li><a href=\"./?mode=content&pid=" . $cts_id;
			$_SESSION[ "JILM_MENU_CLASS" ] .= "\">" . $cts_title . "</a></li>\n";
			$_SESSION[ "JILM_MENU_KFLG" ] = "";
		}
	}
	db_close($cnn);
	return true;

}

// *******************************************
// ページ系セッションクリア
// *******************************************
Function Jilm_Contents_Session_clear(){

	$_SESSION[ "JILM_CONTENTS_TITLE" ]  = "";
	$_SESSION[ "JILM_CONTENTS_CTGR" ]   = "";
	$_SESSION[ "JILM_CONTENTS_BODY" ]   = "";
	$_SESSION[ "JILM_CONTENTS_STATUS" ] = "";
	$_SESSION[ "JILM_CLASS_LIST" ]      = "";
	$_SESSION[ "JILM_PAGE_TITLE" ]      = "";
	$_SESSION[ "JILM_CATEGORY_LIST" ]   = "";

}

// *******************************************
// 読み物系読み込み
// *******************************************
Function Jilm_Notice_Read_1( $id ){

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM text_notice";
	$sql .= " WHERE notice_id = " . $id;
	$sql .= "  AND status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$_SESSION[ "JILM_NOTICE_TITLE" ] = cn_contract($res, 0, "notice_title");
		$_SESSION[ "JILM_NOTICE_BODY" ]  = cn_contract($res, 0, "notice_body");
	}
	db_close($cnn);

}

// *******************************************
// 読み物系セッションクリア
// *******************************************
Function Jilm_Notice_Session_Clear(){

	$_SESSION[ "JILM_NOTICE_TITLE" ] = "";
	$_SESSION[ "JILM_NOTICE_BODY" ]  = "";

}

// *******************************************
// メニュー作成
// *******************************************
Function Jilm_Menu_Create( $chk_data ){

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE ctgr_oya != 0";
	$sql .= "  AND status = 0";
	$sql .= " ORDER BY ctgr_rank";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
	}
	if( $max_cnt > 0 ){
		for ($i=0; $i<$max_cnt; $i++) {
			$ctgr_id   = cn_contract($res, $i, "ctgr_id");
			$ctgr_name = cn_contract($res, $i, "ctgr_name");
			$ctgr_oya  = cn_contract($res, $i, "ctgr_oya");

			// 上層チェック
			Jilm_Fold_List_4( $ctgr_id );

			if( $_SESSION[ "JILM_FOLD_CHECK" ] == $chk_data ){

				// まずフォルダを並べる
				Jilm_Menu_List_1( $ctgr_id );

				// メニューを並べる
				Jilm_Menu_List_2( $ctgr_id );
				$_SESSION[ "JILM_MENU_CLASS" ] .= "</ul>\n</li>\n";

			}
			$_SESSION[ "JILM_FOLD_CHECK" ] = "";

		}
	}
	$_SESSION[ "JILM_MENU_KFLG" ] = "ON";
	Jilm_Menu_List_2( $chk_data );
	$_SESSION[ "JILM_MENU_KFLG" ] = "";
	$menu = $_SESSION[ "JILM_MENU_CLASS" ];
	$_SESSION[ "JILM_MENU_CLASS" ] = "";

	return $menu;
}

// *******************************************
// 該当メニューのステータスを調べる
// *******************************************
Function Jilm_Menu_Get_Status($chk_data) {

	if (!intval($chk_data))
		return false;

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM content_category";
	$sql .= " WHERE ";
	$sql .= "  ctgr_id = " . intval($chk_data);
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
	}
	if( $max_cnt > 0 ) {
		$status  = cn_contract($res, 0, "status");
		return $status;
	}
	return false;
}



// *************************************
// 会員のログインチェック処理
// @return: bool:ログインフラグ
// *************************************
function member_Login_Check( $arr, $login_session_name ) {

	$flg = FALSE;

	$_SESSION[ $login_session_name ][ 'id' ] = 0;

	$member_userid = $arr[ 'userid' ];
    $member_passwd = $arr[ 'passwd' ];

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = "SELECT * FROM member_mast";
	$sql .= "     WHERE member_userid  = '" . $member_userid . "'";
	$sql .= "     AND   member_pass    = '" . $member_passwd . "'";
	$sql .= "     AND   status = 0";
	$sql .= "     AND   ninsyou_status = 1";
	$res = cn_query($sql, $cnn);

	$cnt = 0;

	if ($res == true){
		$cnt = cn_count($res);
		if ($cnt > 0){

			$_SESSION[ $login_session_name ][ 'id' ] = cn_contract($res, 0, "member_id");

		}
	}

	db_close($cnn);

	if ( $cnt > 0 ) {
		$flg = TRUE;
	} 

	return $flg;

}

// *************************************
// 会員のログインフォームチェック
// @return: string:エラーメッセージ
// *************************************
function member_Loign_Error_Check( $arr ) {

	$err_msg = "";

	if ( ! $arr[ 'userid' ] ) {
		$err_msg .= '会員番号が入力されていません';
		return $err_msg;
	}
	if ( is_PassWord( $arr[ 'userid' ] ) ){
		$err_msg .= "会員番号の" . is_PassWord( $arr[ 'userid' ] );
		return $err_msg;
	}

	if ( ! $arr[ 'passwd' ] ) {
		$err_msg .= 'パスワードが入力されていません';
		return $err_msg;
	}
	if ( is_PassWord( $arr[ 'passwd' ] ) ){
		$err_msg .= "パスワードの" . is_PassWord( $arr[ 'passwd' ] );
		return $err_msg;
	}

	return $err_msg;

}

?>