<?php
// *******************************************************************
// 軽金属学会　設定ファイル - 2　Encording UTF-8
// *******************************************************************

// 歳リスト
$yyyy = substr(date(Ymd), 0, 4);
$YEAR_TYPE   = Array( '' => '', $yyyy-15 => $yyyy-15, $yyyy-16 => $yyyy-16, $yyyy-17 => $yyyy-17, $yyyy-18 => $yyyy-18, $yyyy-19 => $yyyy-19,
					 $yyyy-20 => $yyyy-20, $yyyy-21 => $yyyy-21, $yyyy-22 => $yyyy-22, $yyyy-23 => $yyyy-23, $yyyy-24 => $yyyy-24,
					 $yyyy-25 => $yyyy-25, $yyyy-26 => $yyyy-26, $yyyy-27 => $yyyy-27, $yyyy-28 => $yyyy-28, $yyyy-29 => $yyyy-29,
					 $yyyy-30 => $yyyy-30, $yyyy-31 => $yyyy-31, $yyyy-32 => $yyyy-32, $yyyy-33 => $yyyy-33, $yyyy-34 => $yyyy-34,
					 $yyyy-35 => $yyyy-35, $yyyy-36 => $yyyy-36, $yyyy-37 => $yyyy-37, $yyyy-38 => $yyyy-38, $yyyy-39 => $yyyy-39,
					 $yyyy-40 => $yyyy-40, $yyyy-41 => $yyyy-41, $yyyy-42 => $yyyy-42, $yyyy-43 => $yyyy-43, $yyyy-44 => $yyyy-44,
					 $yyyy-45 => $yyyy-45, $yyyy-46 => $yyyy-46, $yyyy-47 => $yyyy-47, $yyyy-48 => $yyyy-48, $yyyy-49 => $yyyy-49,
					 $yyyy-50 => $yyyy-50, $yyyy-51 => $yyyy-51, $yyyy-52 => $yyyy-52, $yyyy-53 => $yyyy-53, $yyyy-54 => $yyyy-54,
					 $yyyy-55 => $yyyy-55, $yyyy-56 => $yyyy-56, $yyyy-57 => $yyyy-57, $yyyy-58 => $yyyy-58, $yyyy-59 => $yyyy-59,
					 $yyyy-60 => $yyyy-60, $yyyy-61 => $yyyy-61, $yyyy-62 => $yyyy-62, $yyyy-63 => $yyyy-63, $yyyy-64 => $yyyy-64,
					 $yyyy-65 => $yyyy-65, $yyyy-66 => $yyyy-66, $yyyy-67 => $yyyy-67, $yyyy-68 => $yyyy-68, $yyyy-69 => $yyyy-69,
					 $yyyy-70 => $yyyy-70, $yyyy-71 => $yyyy-71, $yyyy-72 => $yyyy-72, $yyyy-73 => $yyyy-73, $yyyy-74 => $yyyy-74,
					 $yyyy-75 => $yyyy-75, $yyyy-76 => $yyyy-76, $yyyy-77 => $yyyy-77, $yyyy-78 => $yyyy-78, $yyyy-79 => $yyyy-79,
					 $yyyy-80 => $yyyy-80, $yyyy-81 => $yyyy-81, $yyyy-82 => $yyyy-82, $yyyy-83 => $yyyy-83, $yyyy-84 => $yyyy-84,
					 $yyyy-85 => $yyyy-85, $yyyy-86 => $yyyy-86, $yyyy-87 => $yyyy-87, $yyyy-88 => $yyyy-88, $yyyy-89 => $yyyy-89,
					 $yyyy-90 => $yyyy-90, $yyyy-91 => $yyyy-91, $yyyy-92 => $yyyy-92, $yyyy-93 => $yyyy-93, $yyyy-94 => $yyyy-94,
					 $yyyy-95 => $yyyy-95, $yyyy-96 => $yyyy-96, $yyyy-97 => $yyyy-97, $yyyy-98 => $yyyy-98, $yyyy-99 => $yyyy-99 );

// 月リスト
$MONT_TYPE  = Array( '' => '', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
					'08' => '08','09' => '09', '10' => '10', '11' => '11', '12' => '12' );

// 日リスト
$DAYT_TYPE  = Array( '' => '', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
					'08' => '08','09' => '09', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15',
					'16' => '16','17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23',
					'24' => '24','25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31' );

$YEAR2_TYPE   = Array( $yyyy+1 => $yyyy+1, $yyyy => $yyyy, $yyyy-1 => $yyyy-1, $yyyy-2 => $yyyy-2, $yyyy-3 => $yyyy-3, $yyyy-4 => $yyyy-4,
					 $yyyy-5 => $yyyy-5, $yyyy-6 => $yyyy-6, $yyyy-7 => $yyyy-7, $yyyy-8 => $yyyy-8, $yyyy-9 => $yyyy-9,
					 $yyyy-10 => $yyyy-10, $yyyy-11 => $yyyy-11, $yyyy-12 => $yyyy-12, $yyyy-13 => $yyyy-13, $yyyy-14 => $yyyy-14,
					 $yyyy-15 => $yyyy-15, $yyyy-16 => $yyyy-16, $yyyy-17 => $yyyy-17, $yyyy-18 => $yyyy-18, $yyyy-19 => $yyyy-19,
					 $yyyy-20 => $yyyy-20, $yyyy-21 => $yyyy-21, $yyyy-22 => $yyyy-22, $yyyy-23 => $yyyy-23, $yyyy-24 => $yyyy-24,
					 $yyyy-25 => $yyyy-25, $yyyy-26 => $yyyy-26, $yyyy-27 => $yyyy-27, $yyyy-28 => $yyyy-28, $yyyy-29 => $yyyy-29,
					 $yyyy-30 => $yyyy-30 );
$YEAR3_TYPE   = Array( '' => '', $yyyy+1 => $yyyy+1, $yyyy => $yyyy, $yyyy-1 => $yyyy-1, $yyyy-2 => $yyyy-2, $yyyy-3 => $yyyy-3, $yyyy-4 => $yyyy-4,
					 $yyyy-5 => $yyyy-5, $yyyy-6 => $yyyy-6, $yyyy-7 => $yyyy-7, $yyyy-8 => $yyyy-8, $yyyy-9 => $yyyy-9,
					 $yyyy-10 => $yyyy-10, $yyyy-11 => $yyyy-11, $yyyy-12 => $yyyy-12, $yyyy-13 => $yyyy-13, $yyyy-14 => $yyyy-14,
					 $yyyy-15 => $yyyy-15, $yyyy-16 => $yyyy-16, $yyyy-17 => $yyyy-17, $yyyy-18 => $yyyy-18, $yyyy-19 => $yyyy-19,
					 $yyyy-20 => $yyyy-20, $yyyy-21 => $yyyy-21, $yyyy-22 => $yyyy-22, $yyyy-23 => $yyyy-23, $yyyy-24 => $yyyy-24,
					 $yyyy-25 => $yyyy-25, $yyyy-26 => $yyyy-26, $yyyy-27 => $yyyy-27, $yyyy-28 => $yyyy-28, $yyyy-29 => $yyyy-29,
					 $yyyy-30 => $yyyy-30 );


// 月リスト
$MONT2_TYPE  = Array( '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
					'08' => '08','09' => '09', '10' => '10', '11' => '11', '12' => '12' );

// 日リスト
$DAYT2_TYPE  = Array( '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
					'08' => '08','09' => '09', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15',
					'16' => '16','17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23',
					'24' => '24','25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31' );

// 曜日リスト
$YOBI_TYPE  = Array( '0' =>  '日', '1' => '月', '2' => '火', '3' => '水', '4' => '木', '5' => '金', '6' => '土' );


$PREF_TYPE  = Array( '' => '',
	"北海道" => "北海道","青森県" => "青森県","秋田県" => "秋田県","岩手県" => "岩手県","宮城県" => "宮城県",
	"山形県" => "山形県","福島県" => "福島県","栃木県" => "栃木県","新潟県" => "新潟県","群馬県" => "群馬県",
	"埼玉県" => "埼玉県","茨城県" => "茨城県","千葉県" => "千葉県","東京都" => "東京都","神奈川県" => "神奈川県",
	"山梨県" => "山梨県","長野県" => "長野県","岐阜県" => "岐阜県","富山県" => "富山県","石川県" => "石川県",
	"静岡県" => "静岡県","愛知県" => "愛知県","三重県" => "三重県","奈良県" => "奈良県","和歌山県" => "和歌山県",
	"福井県" => "福井県","滋賀県" => "滋賀県","京都府" => "京都府","大阪府" => "大阪府","兵庫県" => "兵庫県",
	"岡山県" => "岡山県","鳥取県" => "鳥取県","島根県" => "島根県","広島県" => "広島県","山口県" => "山口県",
	"香川県" => "香川県","徳島県" => "徳島県","愛媛県" => "愛媛県","高知県" => "高知県","福岡県" => "福岡県",
	"佐賀県" => "佐賀県","大分県" => "大分県","熊本県" => "熊本県","宮崎県" => "宮崎県","長崎県" => "長崎県",
	"鹿児島県" => "鹿児島県","沖縄県" => "沖縄県","日本以外" => "日本以外" );

// 性別リスト
$SEX_TYPE  = Array( '0' =>  '', '1' => '男性', '2' => '女性' );

// 地方会権限リスト
$CHIHOK_TYPE  = Array( '0' =>  '', '1' => '管理者' );


// 都道府県リスト
$PREF_TYPE  = Array( '' => '',
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




// ***********************************************
// 会員のセッションクリア
// ***********************************************
Function Member_Session_Clear_1(){

	$_SESSION[ "JILM_MEMBER_ID" ]      = "";
	$_SESSION[ "JILM_MEMBER_NO" ]      = "";
	$_SESSION[ "JILM_MEMBER_NAME" ]    = "";
	$_SESSION[ "JILM_MEMBER_KANA" ]    = "";
	$_SESSION[ "JILM_MEMBER_BIRTH1" ]  = "";
	$_SESSION[ "JILM_MEMBER_BIRTH2" ]  = "";
	$_SESSION[ "JILM_MEMBER_BIRTH3" ]  = "";
	$_SESSION[ "JILM_MEMBER_BIRTH" ]   = "";
	$_SESSION[ "JILM_MEMBER_MAIL" ]    = "";
	$_SESSION[ "JILM_MEMBER_TDFK" ]    = "";
	$_SESSION[ "JILM_MEMBER_OFFICE" ]  = "";
	$_SESSION[ "JILM_MEMBER_OFFICE2" ] = "";
	$_SESSION[ "JILM_MEMBER_OFZIP" ]   = "";
	$_SESSION[ "JILM_MEMBER_OFADDR1" ] = "";
	$_SESSION[ "JILM_MEMBER_OFADDR2" ] = "";
	$_SESSION[ "JILM_MEMBER_OFTEL" ]   = "";
	$_SESSION[ "JILM_MEMBER_OFFAX" ]   = "";
	$_SESSION[ "JILM_MEMBER_SOUFU" ]   = "";
	$_SESSION[ "JILM_MEMBER_HAIFU" ]   = "";
	$_SESSION[ "JILM_MEMBER_KBN" ]     = "";
	$_SESSION[ "JILM_MEMBER_ZIP" ]     = "";
	$_SESSION[ "JILM_MEMBER_ADDR1" ]   = "";
	$_SESSION[ "JILM_MEMBER_ADDR2" ]   = "";
	$_SESSION[ "JILM_MEMBER_TEL" ]     = "";
	$_SESSION[ "JILM_MEMBER_FAX" ]     = "";
	$_SESSION[ "JILM_MEMBER_SEX" ]     = "";
	$_SESSION[ "JILM_MEMBER_IN1" ]     = "";
	$_SESSION[ "JILM_MEMBER_IN2" ]     = "";
	$_SESSION[ "JILM_MEMBER_IN3" ]     = "";
	$_SESSION[ "JILM_MEMBER_NENDO" ]   = "";
	$_SESSION[ "JILM_MEMBER_IN" ]      = "";
	$_SESSION[ "JILM_MEMBER_OUT1" ]    = "";
	$_SESSION[ "JILM_MEMBER_OUT2" ]    = "";
	$_SESSION[ "JILM_MEMBER_OUT3" ]    = "";
	$_SESSION[ "JILM_MEMBER_OUT" ]     = "";
	$_SESSION[ "JILM_MEMBER_TYPE" ]    = "";
	$_SESSION[ "JILM_MEMBER_YAKU" ]    = "";
	$_SESSION[ "JILM_MEMBER_SIKA1" ]   = "";
	$_SESSION[ "JILM_MEMBER_SIKA2" ]   = "";
	$_SESSION[ "JILM_MEMBER_SIKA3" ]   = "";
	$_SESSION[ "JILM_MEMBER_CHIHO" ]   = "";;
	$_SESSION[ "JILM_MEMBER_CHIHOK" ]  = "";;
	$_SESSION[ "JILM_MEMBER_SYO1" ]    = "";
	$_SESSION[ "JILM_MEMBER_SYO2" ]    = "";
	$_SESSION[ "JILM_MEMBER_SYO3" ]    = "";
	$_SESSION[ "JILM_MEMBER_SYO4" ]    = "";
	$_SESSION[ "JILM_MEMBER_BIKO1" ]   = "";
	$_SESSION[ "JILM_MEMBER_BIKO2" ]   = "";
	$_SESSION[ "JILM_MEMBER_PASSWD" ]  = "";
	$_SESSION[ "JILM_MEMBER_ADMIN" ]   = "";

}

// ***********************************************
// 会員のセッションセット
// ***********************************************
Function Member_Session_Set_1(){

	$_SESSION[ "JILM_MEMBER_NO" ]      = $_POST[ "member_no" ];
	$_SESSION[ "JILM_MEMBER_NAME" ]    = $_POST[ "member_name" ];
	$_SESSION[ "JILM_MEMBER_KANA" ]    = $_POST[ "member_kana" ];
	$_SESSION[ "JILM_MEMBER_BIRTH1" ]  = $_POST[ "member_birth1" ];
	$_SESSION[ "JILM_MEMBER_BIRTH2" ]  = $_POST[ "member_birth2" ];
	$_SESSION[ "JILM_MEMBER_BIRTH3" ]  = $_POST[ "member_birth3" ];
	$_SESSION[ "JILM_MEMBER_MAIL" ]    = $_POST[ "member_mail" ];
	$_SESSION[ "JILM_MEMBER_TDFK" ]    = $_POST[ "member_tdfk" ];
	$_SESSION[ "JILM_MEMBER_OFFICE" ]  = $_POST[ "member_office" ];
	$_SESSION[ "JILM_MEMBER_OFFICE2" ] = $_POST[ "member_office2" ];
	$_SESSION[ "JILM_MEMBER_OFZIP" ]   = $_POST[ "member_ofzip" ];
	$_SESSION[ "JILM_MEMBER_OFADDR1" ] = $_POST[ "member_ofaddr1" ];
	$_SESSION[ "JILM_MEMBER_OFADDR2" ] = $_POST[ "member_ofaddr2" ];
	$_SESSION[ "JILM_MEMBER_OFTEL" ]   = $_POST[ "member_oftel" ];
	$_SESSION[ "JILM_MEMBER_OFFAX" ]   = $_POST[ "member_offax" ];
	$_SESSION[ "JILM_MEMBER_SOUFU" ]   = $_POST[ "member_soufu" ];
	$_SESSION[ "JILM_MEMBER_HAIFU" ]   = $_POST[ "member_haifu" ];
	$_SESSION[ "JILM_MEMBER_KBN" ]     = $_POST[ "member_kbn" ];
	$_SESSION[ "JILM_MEMBER_ZIP" ]     = $_POST[ "member_zip" ];
	$_SESSION[ "JILM_MEMBER_ADDR1" ]   = $_POST[ "member_addr1" ];
	$_SESSION[ "JILM_MEMBER_ADDR2" ]   = $_POST[ "member_addr2" ];
	$_SESSION[ "JILM_MEMBER_TEL" ]     = $_POST[ "member_tel" ];
	$_SESSION[ "JILM_MEMBER_FAX" ]     = $_POST[ "member_fax" ];
	$_SESSION[ "JILM_MEMBER_SEX" ]     = $_POST[ "member_sex" ];
	$_SESSION[ "JILM_MEMBER_IN1" ]     = $_POST[ "member_in1" ];
	$_SESSION[ "JILM_MEMBER_IN2" ]     = $_POST[ "member_in2" ];
	$_SESSION[ "JILM_MEMBER_IN3" ]     = $_POST[ "member_in3" ];
	$_SESSION[ "JILM_MEMBER_NENDO" ]   = $_POST[ "member_nendo" ];
	$_SESSION[ "JILM_MEMBER_OUT1" ]    = $_POST[ "member_out1" ];
	$_SESSION[ "JILM_MEMBER_OUT2" ]    = $_POST[ "member_out2" ];
	$_SESSION[ "JILM_MEMBER_OUT3" ]    = $_POST[ "member_out3" ];
	$_SESSION[ "JILM_MEMBER_TYPE" ]    = $_POST[ "member_type" ];
	$_SESSION[ "JILM_MEMBER_YAKU" ]    = $_POST[ "member_yaku" ];
	$_SESSION[ "JILM_MEMBER_SIKA1" ]   = $_POST[ "member_sika1" ];
	$_SESSION[ "JILM_MEMBER_SIKA2" ]   = $_POST[ "member_sika2" ];
	$_SESSION[ "JILM_MEMBER_SIKA3" ]   = $_POST[ "member_sika3" ];
	$_SESSION[ "JILM_MEMBER_CHIHO" ]   = $_POST[ "member_chiho" ];
	$_SESSION[ "JILM_MEMBER_CHIHOK" ]  = $_POST[ "member_chihok" ];
	$_SESSION[ "JILM_MEMBER_SYO1" ]    = $_POST[ "member_syo1" ];
	$_SESSION[ "JILM_MEMBER_SYO2" ]    = $_POST[ "member_syo2" ];
	$_SESSION[ "JILM_MEMBER_SYO3" ]    = $_POST[ "member_syo3" ];
	$_SESSION[ "JILM_MEMBER_SYO4" ]    = $_POST[ "member_syo4" ];
	$_SESSION[ "JILM_MEMBER_BIKO1" ]   = $_POST[ "member_biko1" ];
	$_SESSION[ "JILM_MEMBER_BIKO2" ]   = $_POST[ "member_biko2" ];
	$_SESSION[ "JILM_MEMBER_PASSWD" ]  = $_POST[ "member_passwd" ];
	$_SESSION[ "JILM_MEMBER_ADMIN" ]   = $_POST[ "member_admin" ];

	$_SESSION[ "JILM_MEMBER_BIRTH" ]   = $_SESSION[ "JILM_MEMBER_BIRTH1" ] . $_SESSION[ "JILM_MEMBER_BIRTH2" ] . $_SESSION[ "JILM_MEMBER_BIRTH3" ];
	$_SESSION[ "JILM_MEMBER_IN" ]   = $_SESSION[ "JILM_MEMBER_IN1" ] . $_SESSION[ "JILM_MEMBER_IN2" ] . $_SESSION[ "JILM_MEMBER_IN3" ];
	$_SESSION[ "JILM_MEMBER_OUT" ]   = $_SESSION[ "JILM_MEMBER_OUT1" ] . $_SESSION[ "JILM_MEMBER_OUT2" ] . $_SESSION[ "JILM_MEMBER_OUT3" ];

}

// ***********************************************
// 会員のエラーチェック
// ***********************************************
Function Member_Error_Check_1(){

	$err_msg = "";

	if( $_SESSION[ "JILM_MEMBER_NAME" ] == "" ){
		$err_msg = "氏名が未入力です。";
		return $err_msg;
	}
	if( $_SESSION[ "JILM_MEMBER_BIRTH" ] == "" ){
		$err_msg = "生年月日が未入力です。";
		return $err_msg;
	}
	if( $_SESSION[ "JILM_MEMBER_BIRTH" ] < 10000000 ){
		$err_msg = "生年月日が未入力です。";
		return $err_msg;
	}


	if( ( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_BIRTH1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_BIRTH2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_BIRTH3" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_IN1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_IN2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_IN3" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_OUT1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_OUT2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_OUT3" ] ) ) ){
		$err_msg = "年月日は半角数字で入力してください。";
		return $err_msg;
	}

	return $err_msg;



}

// ***********************************************
// 会員データの新規登録
// ***********************************************
Function Member_Data_Write_1(){

	$member_no      = $_SESSION[ "JILM_MEMBER_NO" ];
	$member_name    = $_SESSION[ "JILM_MEMBER_NAME" ];
	$member_kana    = $_SESSION[ "JILM_MEMBER_KANA" ];
	$member_birth   = $_SESSION[ "JILM_MEMBER_BIRTH" ];
	$member_mail    = $_SESSION[ "JILM_MEMBER_MAIL" ];
	$member_tdfk    = $_SESSION[ "JILM_MEMBER_TDFK" ];
	$member_office  = $_SESSION[ "JILM_MEMBER_OFFICE" ];
	$member_office2 = $_SESSION[ "JILM_MEMBER_OFFICE2" ];
	$member_ofzip   = $_SESSION[ "JILM_MEMBER_OFZIP" ];
	$member_ofaddr1 = $_SESSION[ "JILM_MEMBER_OFADDR1" ];
	$member_ofaddr2 = $_SESSION[ "JILM_MEMBER_OFADDR2" ];
	$member_oftel   = $_SESSION[ "JILM_MEMBER_OFTEL" ];
	$member_offax   = $_SESSION[ "JILM_MEMBER_OFFAX" ];
	$member_soufu   = $_SESSION[ "JILM_MEMBER_SOUFU" ];
	$member_haifu   = $_SESSION[ "JILM_MEMBER_HAIFU" ];
	$member_kbn     = $_SESSION[ "JILM_MEMBER_KBN" ];
	$member_zip     = $_SESSION[ "JILM_MEMBER_ZIP" ];
	$member_addr1   = $_SESSION[ "JILM_MEMBER_ADDR1" ];
	$member_addr2   = $_SESSION[ "JILM_MEMBER_ADDR2" ];
	$member_tel     = $_SESSION[ "JILM_MEMBER_TEL" ];
	$member_fax     = $_SESSION[ "JILM_MEMBER_FAX" ];
	$member_sex     = $_SESSION[ "JILM_MEMBER_SEX" ];
	$member_in      = $_SESSION[ "JILM_MEMBER_IN" ];
	$member_nendo   = $_SESSION[ "JILM_MEMBER_NENDO" ];
	$member_out     = $_SESSION[ "JILM_MEMBER_OUT" ];
	$member_type    = $_SESSION[ "JILM_MEMBER_TYPE" ];
	$member_yaku    = $_SESSION[ "JILM_MEMBER_YAKU" ];
	$member_sika1   = $_SESSION[ "JILM_MEMBER_SIKA1" ];
	$member_sika2   = $_SESSION[ "JILM_MEMBER_SIKA2" ];
	$member_sika3   = $_SESSION[ "JILM_MEMBER_SIKA3" ];
	$member_chiho   = $_SESSION[ "JILM_MEMBER_CHIHO" ];
	$member_chihok  = $_SESSION[ "JILM_MEMBER_CHIHOK" ];
	$member_syo1    = $_SESSION[ "JILM_MEMBER_SYO1" ];
	$member_syo2    = $_SESSION[ "JILM_MEMBER_SYO2" ];
	$member_syo3    = $_SESSION[ "JILM_MEMBER_SYO3" ];
	$member_syo4    = $_SESSION[ "JILM_MEMBER_SYO4" ];
	$member_biko1   = $_SESSION[ "JILM_MEMBER_BIKO1" ];
	$member_biko2   = $_SESSION[ "JILM_MEMBER_BIKO2" ];
	$member_passwd  = $_SESSION[ "JILM_MEMBER_BIRTH" ];
	$member_admin   = $_SESSION[ "JILM_MEMBER_ADMIN" ];

	$member_no = sprintf ("%08d", $member_no);

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "INSERT INTO member_data";
	$sql .= "     (       member_name,";
	$sql .= "             member_kana,";
	$sql .= "             member_birth,";
	$sql .= "             member_mail,";
	$sql .= "             member_tdfk,";
	$sql .= "             member_office,";
	$sql .= "             member_office2,";
	$sql .= "             member_ofzip,";
	$sql .= "             member_ofaddr1,";
	$sql .= "             member_ofaddr2,";
	$sql .= "             member_oftel,";
	$sql .= "             member_offax,";
	$sql .= "             member_soufu,";
	$sql .= "             member_haifu,";
	$sql .= "             member_kbn,";
	$sql .= "             member_zip,";
	$sql .= "             member_addr1,";
	$sql .= "             member_addr2,";
	$sql .= "             member_tel,";
	$sql .= "             member_fax,";
	$sql .= "             member_sex,";
	$sql .= "             member_in,";
	$sql .= "             member_nendo,";
	$sql .= "             member_out,";
	$sql .= "             member_type,";
	$sql .= "             member_yaku,";
	$sql .= "             member_sika1,";
	$sql .= "             member_sika2,";
	$sql .= "             member_sika3,";
	$sql .= "             member_chiho,";
	$sql .= "             member_chihok,";
	$sql .= "             member_syo1,";
	$sql .= "             member_syo2,";
	$sql .= "             member_syo3,";
	$sql .= "             member_syo4,";
	$sql .= "             member_biko1,";
	$sql .= "             member_biko2,";
	$sql .= "             member_passwd,";
	$sql .= "             member_admin,";
	$sql .= "             regist_dt,";
	$sql .= "             update_dt,";
	$sql .= "             status";
	$sql .= "     )";
	$sql .= "     VALUES";
	$sql .= "     (  '" . $member_name . "',";
	$sql .= "        '" . $member_kana . "',";
	$sql .= "        '" . $member_birth . "',";
	$sql .= "        '" . $member_mail . "',";
	$sql .= "        '" . $member_tdfk . "',";
	$sql .= "        '" . $member_office . "',";
	$sql .= "        '" . $member_office2 . "',";
	$sql .= "        '" . $member_ofzip . "',";
	$sql .= "        '" . $member_ofaddr1 . "',";
	$sql .= "        '" . $member_ofaddr2 . "',";
	$sql .= "        '" . $member_oftel . "',";
	$sql .= "        '" . $member_offax . "',";
	$sql .= "        '" . $member_soufu . "',";
	$sql .= "        '" . $member_haifu . "',";
	$sql .= "        '" . $member_kbn . "',";
	$sql .= "        '" . $member_zip . "',";
	$sql .= "        '" . $member_addr1 . "',";
	$sql .= "        '" . $member_addr2 . "',";
	$sql .= "        '" . $member_tel . "',";
	$sql .= "        '" . $member_fax . "',";
	$sql .= "        '" . $member_sex . "',";
	$sql .= "        '" . $member_in . "',";
	$sql .= "        '" . $member_nendo . "',";
	$sql .= "        '" . $member_out . "',";
	$sql .= "        '" . $member_type . "',";
	$sql .= "        '" . $member_yaku . "',";
	$sql .= "        '" . $member_sika1 . "',";
	$sql .= "        '" . $member_sika2 . "',";
	$sql .= "        '" . $member_sika3 . "',";
	$sql .= "        '" . $member_chiho . "',";
	$sql .= "        '" . $member_chihok . "',";
	$sql .= "        '" . $member_syo1 . "',";
	$sql .= "        '" . $member_syo2 . "',";
	$sql .= "        '" . $member_syo3 . "',";
	$sql .= "        '" . $member_syo4 . "',";
	$sql .= "        '" . $member_biko1 . "',";
	$sql .= "        '" . $member_biko2 . "',";
	$sql .= "        '" . $member_passwd . "',";
	$sql .= "        '" . $member_admin . "',";
	$sql .= "        '" . date(YmdHis) . "',";
	$sql .= "        '" . date(YmdHis) . "',";
	$sql .= "             0";
	$sql .= "     )";

	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);


	return true;

}

// ***********************************************
// 会員データの修正登録
// ***********************************************
Function Member_Data_Write_2(){

	$member_id      = $_SESSION[ "JILM_MEMBER_ID" ];
//	$member_no      = $_SESSION[ "JILM_MEMBER_NO" ];
	$member_name    = $_SESSION[ "JILM_MEMBER_NAME" ];
	$member_kana    = $_SESSION[ "JILM_MEMBER_KANA" ];
	$member_birth   = $_SESSION[ "JILM_MEMBER_BIRTH" ];
	$member_mail    = $_SESSION[ "JILM_MEMBER_MAIL" ];
	$member_tdfk    = $_SESSION[ "JILM_MEMBER_TDFK" ];
	$member_office  = $_SESSION[ "JILM_MEMBER_OFFICE" ];
	$member_office2 = $_SESSION[ "JILM_MEMBER_OFFICE2" ];
	$member_ofzip   = $_SESSION[ "JILM_MEMBER_OFZIP" ];
	$member_ofaddr1 = $_SESSION[ "JILM_MEMBER_OFADDR1" ];
	$member_ofaddr2 = $_SESSION[ "JILM_MEMBER_OFADDR2" ];
	$member_oftel   = $_SESSION[ "JILM_MEMBER_OFTEL" ];
	$member_offax   = $_SESSION[ "JILM_MEMBER_OFFAX" ];
	$member_soufu   = $_SESSION[ "JILM_MEMBER_SOUFU" ];
	$member_haifu   = $_SESSION[ "JILM_MEMBER_HAIFU" ];
	$member_kbn     = $_SESSION[ "JILM_MEMBER_KBN" ];
	$member_zip     = $_SESSION[ "JILM_MEMBER_ZIP" ];
	$member_addr1   = $_SESSION[ "JILM_MEMBER_ADDR1" ];
	$member_addr2   = $_SESSION[ "JILM_MEMBER_ADDR2" ];
	$member_tel     = $_SESSION[ "JILM_MEMBER_TEL" ];
	$member_fax     = $_SESSION[ "JILM_MEMBER_FAX" ];
	$member_sex     = $_SESSION[ "JILM_MEMBER_SEX" ];
	$member_in      = $_SESSION[ "JILM_MEMBER_IN" ];
	$member_nendo   = $_SESSION[ "JILM_MEMBER_NENDO" ];
	$member_out     = $_SESSION[ "JILM_MEMBER_OUT" ];
	$member_type    = $_SESSION[ "JILM_MEMBER_TYPE" ];
	$member_yaku    = $_SESSION[ "JILM_MEMBER_YAKU" ];
	$member_sika1   = $_SESSION[ "JILM_MEMBER_SIKA1" ];
	$member_sika2   = $_SESSION[ "JILM_MEMBER_SIKA2" ];
	$member_sika3   = $_SESSION[ "JILM_MEMBER_SIKA3" ];
	$member_chiho   = $_SESSION[ "JILM_MEMBER_CHIHO" ];
	$member_chihok  = $_SESSION[ "JILM_MEMBER_CHIHOK" ];
	$member_syo1    = $_SESSION[ "JILM_MEMBER_SYO1" ];
	$member_syo2    = $_SESSION[ "JILM_MEMBER_SYO2" ];
	$member_syo3    = $_SESSION[ "JILM_MEMBER_SYO3" ];
	$member_syo4    = $_SESSION[ "JILM_MEMBER_SYO4" ];
	$member_biko1   = $_SESSION[ "JILM_MEMBER_BIKO1" ];
	$member_biko2   = $_SESSION[ "JILM_MEMBER_BIKO2" ];
	$member_passwd  = $_SESSION[ "JILM_MEMBER_PASSWD" ];
	$member_admin   = $_SESSION[ "JILM_MEMBER_ADMIN" ];
	$member_no = sprintf ("%08d", $member_id);

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE member_data";
	$sql .= "     SET member_no      = '" . $member_no . "',";
	$sql .= "         member_name    = '" . $member_name . "',";
	$sql .= "         member_kana    = '" . $member_kana . "',";
	$sql .= "         member_birth   = '" . $member_birth . "',";
	$sql .= "         member_mail    = '" . $member_mail . "',";
	$sql .= "         member_tdfk    = '" . $member_tdfk . "',";
	$sql .= "         member_office  = '" . $member_office . "',";
	$sql .= "         member_office2 = '" . $member_office2 . "',";
	$sql .= "         member_ofzip   = '" . $member_ofzip . "',";
	$sql .= "         member_ofaddr1 = '" . $member_ofaddr1 . "',";
	$sql .= "         member_ofaddr2 = '" . $member_ofaddr2 . "',";
	$sql .= "         member_oftel   = '" . $member_oftel . "',";
	$sql .= "         member_offax   = '" . $member_offax . "',";
	$sql .= "         member_soufu   = '" . $member_soufu . "',";
	$sql .= "         member_haifu   = '" . $member_haifu . "',";
	$sql .= "         member_kbn     = '" . $member_kbn . "',";
	$sql .= "         member_zip     = '" . $member_zip . "',";
	$sql .= "         member_addr1   = '" . $member_addr1 . "',";
	$sql .= "         member_addr2   = '" . $member_addr2 . "',";
	$sql .= "         member_tel     = '" . $member_tel . "',";
	$sql .= "         member_fax     = '" . $member_fax . "',";
	$sql .= "         member_sex     = '" . $member_sex . "',";
	$sql .= "         member_in      = '" . $member_in . "',";
	$sql .= "         member_nendo   = '" . $member_nendo . "',";
	$sql .= "         member_out     = '" . $member_out . "',";
	$sql .= "         member_type    = '" . $member_type . "',";
	$sql .= "         member_yaku    = '" . $member_yaku . "',";
	$sql .= "         member_sika1   = '" . $member_sika1 . "',";
	$sql .= "         member_sika2   = '" . $member_sika2 . "',";
	$sql .= "         member_sika3   = '" . $member_sika3 . "',";
	$sql .= "         member_chiho   = '" . $member_chiho . "',";
	$sql .= "         member_chihok  = '" . $member_chihok . "',";
	$sql .= "         member_syo1    = '" . $member_syo1 . "',";
	$sql .= "         member_syo2    = '" . $member_syo2 . "',";
	$sql .= "         member_syo3    = '" . $member_syo3 . "',";
	$sql .= "         member_syo4    = '" . $member_syo4 . "',";
	$sql .= "         member_biko1   = '" . $member_biko1 . "',";
	$sql .= "         member_biko2   = '" . $member_biko2 . "',";
	$sql .= "         member_passwd  = '" . $member_passwd . "',";
	$sql .= "         member_admin   = '" . $member_admin . "',";
	$sql .= "         update_dt      = '" . date(YmdHis) . "'";
	$sql .= "     WHERE member_id    = " . $member_id;

	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

	return true;
}

// ***********************************************
// 会員データのID登録
// ***********************************************
Function Member_Id_Write_1(){

	$member_id      = $_SESSION[ "JILM_MEMBER_ID" ];
	$member_no = sprintf ("%08d", $member_id);

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE member_data";
	$sql .= "     SET member_no      = '" . $member_no . "',";
	$sql .= "         update_dt      = '" . date(YmdHis) . "'";
	$sql .= "     WHERE member_id    = " . $member_id;

	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

	return true;
}
// *******************************************
// 	会員ID読み込み
// *******************************************
Function Member_Id_Read_1(){

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$sql = "SELECT * FROM member_data";
	$sql .= "     WHERE status   = 0";
	$sql .= " ORDER BY member_id DESC";
	$res = cn_query($sql, $cnn);

	if ($res == true){
		$cnt = cn_count($res);
		if ($cnt > 0){
			$_SESSION[ "JILM_MEMBER_ID" ]      = cn_contract($res, 0, "member_id");
		}
	}

	db_close($cnn);

	return true;

}





// ***********************************************
// 会員データの削除登録
// ***********************************************
Function Member_Data_Delete_1(){

	$member_id      = $_SESSION[ "JILM_MEMBER_ID" ];

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE member_data";
	$sql .= "     SET status      = '1',";
	$sql .= "         update_dt   = '" . date(YmdHis) . "'";
	$sql .= "     WHERE member_id = " . $member_id;

	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

	return true;
}

// ***********************************************
// 会員データの退会登録
// ***********************************************
Function Member_Taikai_Write_1(){

	$member_id      = $_SESSION[ "JILM_MEMBER_ID" ];

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE member_data";
	$sql .= "     SET member_out  = '" . date(Ymd) . "',";
	$sql .= "         update_dt   = '" . date(YmdHis) . "'";
	$sql .= "     WHERE member_id = " . $member_id;

	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

	return true;
}


// *******************************************
// 	会員データ読み込み
// *******************************************
Function Member_Data_Read_1(){

	$member_id      = $_SESSION[ "JILM_MEMBER_ID" ];

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$sql = "SELECT * FROM member_data";
	$sql .= "     WHERE member_id = " . $member_id;
	$sql .= "     AND   status   = 0";

	$res = cn_query($sql, $cnn);

	if ($res == true){
		$cnt = cn_count($res);
		if ($cnt > 0){
			$_SESSION[ "JILM_MEMBER_ID" ]      = cn_contract($res, 0, "member_id");
			$_SESSION[ "JILM_MEMBER_NO" ]      = cn_contract($res, 0, "member_no");
			$_SESSION[ "JILM_MEMBER_NAME" ]    = cn_contract($res, 0, "member_name");
			$_SESSION[ "JILM_MEMBER_KANA" ]    = cn_contract($res, 0, "member_kana");
			$_SESSION[ "JILM_MEMBER_BIRTH" ]   = cn_contract($res, 0, "member_birth");
			$_SESSION[ "JILM_MEMBER_MAIL" ]    = cn_contract($res, 0, "member_mail");
			$_SESSION[ "JILM_MEMBER_TDFK" ]    = cn_contract($res, 0, "member_tdfk");
			$_SESSION[ "JILM_MEMBER_OFFICE" ]  = cn_contract($res, 0, "member_office");
			$_SESSION[ "JILM_MEMBER_OFFICE2" ] = cn_contract($res, 0, "member_office2");
			$_SESSION[ "JILM_MEMBER_OFZIP" ]   = cn_contract($res, 0, "member_ofzip");
			$_SESSION[ "JILM_MEMBER_OFADDR1" ] = cn_contract($res, 0, "member_ofaddr1");
			$_SESSION[ "JILM_MEMBER_OFADDR2" ] = cn_contract($res, 0, "member_ofaddr2");
			$_SESSION[ "JILM_MEMBER_OFTEL" ]   = cn_contract($res, 0, "member_oftel");
			$_SESSION[ "JILM_MEMBER_OFFAX" ]   = cn_contract($res, 0, "member_offax");
			$_SESSION[ "JILM_MEMBER_SOUFU" ]   = cn_contract($res, 0, "member_soufu");
			$_SESSION[ "JILM_MEMBER_HAIFU" ]   = cn_contract($res, 0, "member_haifu");
			$_SESSION[ "JILM_MEMBER_KBN" ]     = cn_contract($res, 0, "member_kbn");
			$_SESSION[ "JILM_MEMBER_ZIP" ]     = cn_contract($res, 0, "member_zip");
			$_SESSION[ "JILM_MEMBER_ADDR1" ]   = cn_contract($res, 0, "member_addr1");
			$_SESSION[ "JILM_MEMBER_ADDR2" ]   = cn_contract($res, 0, "member_addr2");
			$_SESSION[ "JILM_MEMBER_TEL" ]     = cn_contract($res, 0, "member_tel");
			$_SESSION[ "JILM_MEMBER_FAX" ]     = cn_contract($res, 0, "member_fax");
			$_SESSION[ "JILM_MEMBER_SEX" ]     = cn_contract($res, 0, "member_sex");
			$_SESSION[ "JILM_MEMBER_IN" ]      = cn_contract($res, 0, "member_in");
			$_SESSION[ "JILM_MEMBER_NENDO" ]   = cn_contract($res, 0, "member_nendo");
			$_SESSION[ "JILM_MEMBER_OUT" ]     = cn_contract($res, 0, "member_out");
			$_SESSION[ "JILM_MEMBER_TYPE" ]    = cn_contract($res, 0, "member_type");
			$_SESSION[ "JILM_MEMBER_YAKU" ]    = cn_contract($res, 0, "member_yaku");
			$_SESSION[ "JILM_MEMBER_SIKA1" ]   = cn_contract($res, 0, "member_sika1");
			$_SESSION[ "JILM_MEMBER_SIKA2" ]   = cn_contract($res, 0, "member_sika2");
			$_SESSION[ "JILM_MEMBER_SIKA3" ]   = cn_contract($res, 0, "member_sika3");
			$_SESSION[ "JILM_MEMBER_CHIHO" ]   = cn_contract($res, 0, "member_chiho");
			$_SESSION[ "JILM_MEMBER_CHIHOK" ]  = cn_contract($res, 0, "member_chihok");
			$_SESSION[ "JILM_MEMBER_SYO1" ]    = cn_contract($res, 0, "member_syo1");
			$_SESSION[ "JILM_MEMBER_SYO2" ]    = cn_contract($res, 0, "member_syo2");
			$_SESSION[ "JILM_MEMBER_SYO3" ]    = cn_contract($res, 0, "member_syo3");
			$_SESSION[ "JILM_MEMBER_SYO4" ]    = cn_contract($res, 0, "member_syo4");
			$_SESSION[ "JILM_MEMBER_BIKO1" ]   = cn_contract($res, 0, "member_biko1");
			$_SESSION[ "JILM_MEMBER_BIKO2" ]   = cn_contract($res, 0, "member_biko2");
			$_SESSION[ "JILM_MEMBER_PASSWD" ]  = cn_contract($res, 0, "member_passwd");
			$_SESSION[ "JILM_MEMBER_ADMIN" ]   = cn_contract($res, 0, "member_admin");

			$tmp_date = cn_contract($res, 0, "regist_dt");
			$tmp_date = substr($tmp_date,0,4) . "年" . substr($tmp_date,4,2) . "月" . substr($tmp_date,6,2) . "日";
			$_SESSION[ "JILM_MEMBER_REGIST_DT" ]   = $tmp_date;

			$tmp_date = cn_contract($res, 0, "update_dt");
			$tmp_date = substr($tmp_date,0,4) . "年" . substr($tmp_date,4,2) . "月" . substr($tmp_date,6,2) . "日";
			$_SESSION[ "JILM_MEMBER_UPDATE_DT" ]   = $tmp_date;
			$_SESSION[ "JILM_UPDATE_DT" ] = cn_contract($res, 0, "update_dt");
		}
	}

	db_close($cnn);

	return true;

}


// ***********************************************
// 入金のセッションクリア
// ***********************************************
Function Member_Pay_Session_Clear_1(){

	$_SESSION[ "JILM_MEMBER_PAY1" ]    = "";
	$_SESSION[ "JILM_MEMBER_PAY2" ]    = "";
	$_SESSION[ "JILM_MEMBER_PAY3" ]    = "";
	$_SESSION[ "JILM_MEMBER_PAY" ]     = "";
	$_SESSION[ "JILM_MEMBER_NENDO" ]   = "";

}

// ***********************************************
// 入金のセッションセット
// ***********************************************
Function Member_Pay_Session_Set_1(){

	$_SESSION[ "JILM_MEMBER_PAY1" ]  = $_POST[ "member_pay1" ];
	$_SESSION[ "JILM_MEMBER_PAY2" ]  = $_POST[ "member_pay2" ];
	$_SESSION[ "JILM_MEMBER_PAY3" ]  = $_POST[ "member_pay3" ];
	$_SESSION[ "JILM_MEMBER_NENDO" ]  = $_POST[ "member_nendo" ];
	$_SESSION[ "JILM_MEMBER_PAY" ]   = $_SESSION[ "JILM_MEMBER_PAY1" ] . $_SESSION[ "JILM_MEMBER_PAY2" ] . $_SESSION[ "JILM_MEMBER_PAY3" ];

}

// ***********************************************
// 入金のエラーチェック
// ***********************************************
Function Member_Pay_Error_Check_1(){

	$err_msg = "";

	if( $_SESSION[ "JILM_MEMBER_PAY" ] < 10000000 ){
		$err_msg = "入金日の入力が不正です。";
		return $err_msg;
	}
	if( $_SESSION[ "JILM_MEMBER_PAY" ] > 21000000 ){
		$err_msg = "入金日の入力が不正です。";
		return $err_msg;
	}
	if( $_SESSION[ "JILM_MEMBER_NENDO" ] > 2100 ){
		$err_msg = "入金年度の入力が不正です。";
		return $err_msg;
	}


	if( ( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_PAY1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_PAY2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_PAY3" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_MEMBER_NENDO" ] ) ) ){
		$err_msg = "半角数字で入力してください。";
		return $err_msg;
	}

	return $err_msg;



	return $err_msg;

}

// ***********************************************
// 入金データの新規登録
// ***********************************************
Function Member_Pay_Data_Write_1(){

	$member_id    = $_SESSION[ "JILM_MEMBER_ID" ];
	$member_pay   = $_SESSION[ "JILM_MEMBER_PAY" ];
	$member_nendo = $_SESSION[ "JILM_MEMBER_NENDO" ];

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "INSERT INTO member_pay_data";
	$sql .= "     (       member_id,";
	$sql .= "             member_pay_dt,";
	$sql .= "             member_pay_nendo,";
	$sql .= "             regist_dt,";
	$sql .= "             update_dt,";
	$sql .= "             status";
	$sql .= "     )";
	$sql .= "     VALUES";
	$sql .= "     (  '" . $member_id . "',";
	$sql .= "        '" . $member_pay . "',";
	$sql .= "        '" . $member_nendo . "',";
	$sql .= "        '" . date(YmdHis) . "',";
	$sql .= "        '" . date(YmdHis) . "',";
	$sql .= "             0";
	$sql .= "     )";

	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);


	return true;

}

// ***********************************************
// 入金データの修正登録
// ***********************************************
Function Member_Pay_Data_Write_2(){

	$member_pay_id = $_SESSION[ "JILM_MEMBER_PAY_ID" ];
	$member_pay    = $_SESSION[ "JILM_MEMBER_PAY" ];

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE member_pay_data";
	$sql .= "     SET member_pay_dt = '" . $member_pay . "',";
	$sql .= "         update_dt      = '" . date(YmdHis) . "'";
	$sql .= "     WHERE member_pay_id    = " . $member_pay_id;

	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

	return true;
}

// ***********************************************
// 入金データの削除登録
// ***********************************************
Function Member_Pay_Delete_1($pay_id){

	$member_pay_id      = $pay_id;

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE member_pay_data";
	$sql .= "     SET status      = '1',";
	$sql .= "         update_dt   = '" . date(YmdHis) . "'";
	$sql .= "     WHERE member_pay_id = " . $member_pay_id;

	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

	return true;
}

// ***********************************************
// 検索のセッションクリア
// ***********************************************
Function Search_Session_Clear_1(){

	$_SESSION[ "JILM_SEARCH_ID" ]      = "";
	$_SESSION[ "JILM_SEARCH_NO" ]      = "";
	$_SESSION[ "JILM_SEARCH_NAME" ]    = "";
	$_SESSION[ "JILM_SEARCH_KANA" ]    = "";
	$_SESSION[ "JILM_SEARCH_BIRTH1" ]  = "";
	$_SESSION[ "JILM_SEARCH_BIRTH2" ]  = "";
	$_SESSION[ "JILM_SEARCH_BIRTH3" ]  = "";
	$_SESSION[ "JILM_SEARCH_BIRTH4" ]  = "";
	$_SESSION[ "JILM_SEARCH_BIRTH5" ]  = "";
	$_SESSION[ "JILM_SEARCH_BIRTH6" ]  = "";
	$_SESSION[ "JILM_SEARCH_BIRTH" ]   = "";
	$_SESSION[ "JILM_SEARCH_MAIL" ]    = "";
	$_SESSION[ "JILM_SEARCH_TDFK" ]    = "";
	$_SESSION[ "JILM_SEARCH_OFFICE" ]  = "";
	$_SESSION[ "JILM_SEARCH_OFZIP" ]   = "";
	$_SESSION[ "JILM_SEARCH_OFADDR1" ] = "";
	$_SESSION[ "JILM_SEARCH_OFADDR2" ] = "";
	$_SESSION[ "JILM_SEARCH_OFTEL" ]   = "";
	$_SESSION[ "JILM_SEARCH_OFFAX" ]   = "";
	$_SESSION[ "JILM_SEARCH_SOUFU" ]   = "";
	$_SESSION[ "JILM_SEARCH_HAIFU" ]   = "";
	$_SESSION[ "JILM_SEARCH_KBN" ]     = "";
	$_SESSION[ "JILM_SEARCH_ZIP" ]     = "";
	$_SESSION[ "JILM_SEARCH_ADDR1" ]   = "";
	$_SESSION[ "JILM_SEARCH_ADDR2" ]   = "";
	$_SESSION[ "JILM_SEARCH_TEL" ]     = "";
	$_SESSION[ "JILM_SEARCH_FAX" ]     = "";
	$_SESSION[ "JILM_SEARCH_SEX" ]     = "";
	$_SESSION[ "JILM_SEARCH_IN1" ]     = "";
	$_SESSION[ "JILM_SEARCH_IN2" ]     = "";
	$_SESSION[ "JILM_SEARCH_IN3" ]     = "";
	$_SESSION[ "JILM_SEARCH_IN4" ]     = "";
	$_SESSION[ "JILM_SEARCH_IN5" ]     = "";
	$_SESSION[ "JILM_SEARCH_IN6" ]     = "";
	$_SESSION[ "JILM_SEARCH_IN" ]      = "";
	$_SESSION[ "JILM_SEARCH_OUT1" ]    = "";
	$_SESSION[ "JILM_SEARCH_OUT2" ]    = "";
	$_SESSION[ "JILM_SEARCH_OUT3" ]    = "";
	$_SESSION[ "JILM_SEARCH_OUT4" ]    = "";
	$_SESSION[ "JILM_SEARCH_OUT5" ]    = "";
	$_SESSION[ "JILM_SEARCH_OUT6" ]    = "";
	$_SESSION[ "JILM_SEARCH_OUT" ]     = "";
	$_SESSION[ "JILM_SEARCH_TYPE" ]    = "";
	$_SESSION[ "JILM_SEARCH_SIKA1" ]   = "";
	$_SESSION[ "JILM_SEARCH_SIKA2" ]   = "";
	$_SESSION[ "JILM_SEARCH_SIKA3" ]   = "";
	$_SESSION[ "JILM_SEARCH_CHIHO" ]   = "";;
	$_SESSION[ "JILM_SEARCH_CHIHOK" ]  = "";;
	$_SESSION[ "JILM_SEARCH_SENKYO" ]  = "";;
	$_SESSION[ "JILM_SEARCH_SYO1" ]    = "";
	$_SESSION[ "JILM_SEARCH_SYO2" ]    = "";
	$_SESSION[ "JILM_SEARCH_SYO3" ]    = "";
	$_SESSION[ "JILM_SEARCH_SYO4" ]    = "";
	$_SESSION[ "JILM_SEARCH_BIKO1" ]   = "";
	$_SESSION[ "JILM_SEARCH_BIKO2" ]   = "";
	$_SESSION[ "JILM_SEARCH_PASSWD" ]  = "";
	$_SESSION[ "JILM_SEARCH_CNT1" ]    = "";
	$_SESSION[ "JILM_SEARCH_CNT2" ]    = "";
	$_SESSION[ "JILM_SEARCH_PAY1" ]    = "";
	$_SESSION[ "JILM_SEARCH_PAY2" ]    = "";
	$_SESSION[ "JILM_SEARCH_PAY3" ]    = "";
	$_SESSION[ "JILM_SEARCH_PAY4" ]    = "";
	$_SESSION[ "JILM_SEARCH_PAY5" ]    = "";
	$_SESSION[ "JILM_SEARCH_PAY6" ]    = "";
	$_SESSION[ "JILM_SEARCH_UPDATE1" ] = "";
	$_SESSION[ "JILM_SEARCH_UPDATE2" ] = "";
	$_SESSION[ "JILM_SEARCH_UPDATE3" ] = "";
	$_SESSION[ "JILM_SEARCH_UPDATE4" ] = "";
	$_SESSION[ "JILM_SEARCH_UPDATE5" ] = "";
	$_SESSION[ "JILM_SEARCH_UPDATE6" ] = "";
	$_SESSION[ "JILM_SEARCH_ADMIN" ]   = "";
	$_SESSION[ "JILM_SEARCH_NENDO" ]   = "";
	$_SESSION[ "JILM_SEARCH_NOU" ]     = "";
	$_SESSION[ "JILM_SEARCH_NOU1" ]    = "";
	$_SESSION[ "JILM_SEARCH_NOU2" ]    = "";
	$_SESSION[ "JILM_SEARCH_NOU3" ]    = "";
	$_SESSION[ "JILM_SEARCH_TAIKAI" ]  = "";
	$_SESSION[ "JILM_SEARCH_NOU_FLG" ] = "";
	$_SESSION[ "JILM_SEARCH_PNENDO" ]  = "";

}

// ***********************************************
// 検索のセッションセット
// ***********************************************
Function Search_Session_Set_1(){

	$_SESSION[ "JILM_SEARCH_NO" ]      = $_POST[ "member_no" ];
	$_SESSION[ "JILM_SEARCH_NAME" ]    = $_POST[ "member_name" ];
	$_SESSION[ "JILM_SEARCH_KANA" ]    = $_POST[ "member_kana" ];
	$_SESSION[ "JILM_SEARCH_BIRTH1" ]  = $_POST[ "member_birth1" ];
	$_SESSION[ "JILM_SEARCH_BIRTH2" ]  = $_POST[ "member_birth2" ];
	$_SESSION[ "JILM_SEARCH_BIRTH3" ]  = $_POST[ "member_birth3" ];
	$_SESSION[ "JILM_SEARCH_BIRTH4" ]  = $_POST[ "member_birth4" ];
	$_SESSION[ "JILM_SEARCH_BIRTH5" ]  = $_POST[ "member_birth5" ];
	$_SESSION[ "JILM_SEARCH_BIRTH6" ]  = $_POST[ "member_birth6" ];
	$_SESSION[ "JILM_SEARCH_MAIL" ]    = $_POST[ "member_mail" ];
	$_SESSION[ "JILM_SEARCH_TDFK" ]    = $_POST[ "member_tdfk" ];
	$_SESSION[ "JILM_SEARCH_OFFICE" ]  = $_POST[ "member_office" ];
	$_SESSION[ "JILM_SEARCH_OFZIP" ]   = $_POST[ "member_ofzip" ];
	$_SESSION[ "JILM_SEARCH_OFADDR1" ] = $_POST[ "member_ofaddr1" ];
	$_SESSION[ "JILM_SEARCH_OFADDR2" ] = $_POST[ "member_ofaddr2" ];
	$_SESSION[ "JILM_SEARCH_OFTEL" ]   = $_POST[ "member_oftel" ];
	$_SESSION[ "JILM_SEARCH_OFFAX" ]   = $_POST[ "member_offax" ];
	$_SESSION[ "JILM_SEARCH_SOUFU" ]   = $_POST[ "member_soufu" ];
	$_SESSION[ "JILM_SEARCH_HAIFU" ]   = $_POST[ "member_haifu" ];
	$_SESSION[ "JILM_SEARCH_KBN" ]     = $_POST[ "member_kbn" ];
	$_SESSION[ "JILM_SEARCH_ZIP" ]     = $_POST[ "member_zip" ];
	$_SESSION[ "JILM_SEARCH_ADDR1" ]   = $_POST[ "member_addr1" ];
	$_SESSION[ "JILM_SEARCH_ADDR2" ]   = $_POST[ "member_addr2" ];
	$_SESSION[ "JILM_SEARCH_TEL" ]     = $_POST[ "member_tel" ];
	$_SESSION[ "JILM_SEARCH_FAX" ]     = $_POST[ "member_fax" ];
	$_SESSION[ "JILM_SEARCH_SEX" ]     = $_POST[ "member_sex" ];
	$_SESSION[ "JILM_SEARCH_IN1" ]     = $_POST[ "member_in1" ];
	$_SESSION[ "JILM_SEARCH_IN2" ]     = $_POST[ "member_in2" ];
	$_SESSION[ "JILM_SEARCH_IN3" ]     = $_POST[ "member_in3" ];
	$_SESSION[ "JILM_SEARCH_IN4" ]     = $_POST[ "member_in4" ];
	$_SESSION[ "JILM_SEARCH_IN5" ]     = $_POST[ "member_in5" ];
	$_SESSION[ "JILM_SEARCH_IN6" ]     = $_POST[ "member_in6" ];
	$_SESSION[ "JILM_SEARCH_OUT1" ]    = $_POST[ "member_out1" ];
	$_SESSION[ "JILM_SEARCH_OUT2" ]    = $_POST[ "member_out2" ];
	$_SESSION[ "JILM_SEARCH_OUT3" ]    = $_POST[ "member_out3" ];
	$_SESSION[ "JILM_SEARCH_OUT4" ]    = $_POST[ "member_out4" ];
	$_SESSION[ "JILM_SEARCH_OUT5" ]    = $_POST[ "member_out5" ];
	$_SESSION[ "JILM_SEARCH_OUT6" ]    = $_POST[ "member_out6" ];
	$_SESSION[ "JILM_SEARCH_TYPE" ]    = $_POST[ "member_type" ];
	$_SESSION[ "JILM_SEARCH_YAKU" ]    = $_POST[ "member_yaku" ];
	$_SESSION[ "JILM_SEARCH_SIKA1" ]   = $_POST[ "member_sika1" ];
	$_SESSION[ "JILM_SEARCH_SIKA2" ]   = $_POST[ "member_sika2" ];
	$_SESSION[ "JILM_SEARCH_SIKA3" ]   = $_POST[ "member_sika3" ];
	$_SESSION[ "JILM_SEARCH_CHIHO" ]   = $_POST[ "member_chiho" ];
	$_SESSION[ "JILM_SEARCH_CHIHOK" ]  = $_POST[ "member_chihok" ];
	$_SESSION[ "JILM_SEARCH_SENKYO" ]  = $_POST[ "member_senkyo" ];
	$_SESSION[ "JILM_SEARCH_SYO1" ]    = $_POST[ "member_syo1" ];
	$_SESSION[ "JILM_SEARCH_SYO2" ]    = $_POST[ "member_syo2" ];
	$_SESSION[ "JILM_SEARCH_SYO3" ]    = $_POST[ "member_syo3" ];
	$_SESSION[ "JILM_SEARCH_SYO4" ]    = $_POST[ "member_syo4" ];
	$_SESSION[ "JILM_SEARCH_BIKO1" ]   = $_POST[ "member_biko1" ];
	$_SESSION[ "JILM_SEARCH_BIKO2" ]   = $_POST[ "member_biko2" ];
	$_SESSION[ "JILM_SEARCH_PASSWD" ]  = $_POST[ "member_passwd" ];
	$_SESSION[ "JILM_SEARCH_PAY1" ]    = $_POST[ "member_pay1" ];
	$_SESSION[ "JILM_SEARCH_PAY2" ]    = $_POST[ "member_pay2" ];
	$_SESSION[ "JILM_SEARCH_PAY3" ]    = $_POST[ "member_pay3" ];
	$_SESSION[ "JILM_SEARCH_PAY4" ]    = $_POST[ "member_pay4" ];
	$_SESSION[ "JILM_SEARCH_PAY5" ]    = $_POST[ "member_pay5" ];
	$_SESSION[ "JILM_SEARCH_PAY6" ]    = $_POST[ "member_pay6" ];
	$_SESSION[ "JILM_SEARCH_PNENDO" ]  = $_POST[ "nk_nendo" ];
	$_SESSION[ "JILM_SEARCH_CNT1" ]    = $_POST[ "member_cnt1" ];
	$_SESSION[ "JILM_SEARCH_CNT2" ]    = $_POST[ "member_cnt2" ];
	$_SESSION[ "JILM_SEARCH_UPDATE1" ] = $_POST[ "update_dt1" ];
	$_SESSION[ "JILM_SEARCH_UPDATE2" ] = $_POST[ "update_dt2" ];
	$_SESSION[ "JILM_SEARCH_UPDATE3" ] = $_POST[ "update_dt3" ];
	$_SESSION[ "JILM_SEARCH_UPDATE4" ] = $_POST[ "update_dt4" ];
	$_SESSION[ "JILM_SEARCH_UPDATE5" ] = $_POST[ "update_dt5" ];
	$_SESSION[ "JILM_SEARCH_UPDATE6" ] = $_POST[ "update_dt6" ];
	$_SESSION[ "JILM_SEARCH_ADMIN" ]   = $_POST[ "member_admin" ];
	$_SESSION[ "JILM_SEARCH_NENDO" ]   = $_POST[ "member_nendo" ];
	$_SESSION[ "JILM_SEARCH_NOU" ]     = $_POST[ "member_nou" ];
	$_SESSION[ "JILM_SEARCH_NOU1" ]    = $_POST[ "member_nou1" ];
	$_SESSION[ "JILM_SEARCH_NOU2" ]    = $_POST[ "member_nou2" ];
	$_SESSION[ "JILM_SEARCH_NOU3" ]    = $_POST[ "member_nou3" ];
	$_SESSION[ "JILM_SEARCH_TAIKAI" ]  = $_POST[ "member_taikai" ];
	$_SESSION[ "JILM_SEARCH_NOU_FLG" ] = $_POST[ "member_nou_flg" ];



}

// ***********************************************
// 検索のエラーチェック
// ***********************************************
Function Search_Error_Check_1(){

	$err_msg = "";

	$_SESSION[ "JILM_SEARCH_BIRTH1" ]  = $_POST[ "member_birth1" ];
	$_SESSION[ "JILM_SEARCH_BIRTH2" ]  = $_POST[ "member_birth2" ];
	$_SESSION[ "JILM_SEARCH_BIRTH3" ]  = $_POST[ "member_birth3" ];
	$_SESSION[ "JILM_SEARCH_BIRTH4" ]  = $_POST[ "member_birth4" ];
	$_SESSION[ "JILM_SEARCH_BIRTH5" ]  = $_POST[ "member_birth5" ];
	$_SESSION[ "JILM_SEARCH_BIRTH6" ]  = $_POST[ "member_birth6" ];
	$_SESSION[ "JILM_SEARCH_IN1" ]     = $_POST[ "member_in1" ];
	$_SESSION[ "JILM_SEARCH_IN2" ]     = $_POST[ "member_in2" ];
	$_SESSION[ "JILM_SEARCH_IN3" ]     = $_POST[ "member_in3" ];
	$_SESSION[ "JILM_SEARCH_IN4" ]     = $_POST[ "member_in4" ];
	$_SESSION[ "JILM_SEARCH_IN5" ]     = $_POST[ "member_in5" ];
	$_SESSION[ "JILM_SEARCH_IN6" ]     = $_POST[ "member_in6" ];
	$_SESSION[ "JILM_SEARCH_OUT1" ]    = $_POST[ "member_out1" ];
	$_SESSION[ "JILM_SEARCH_OUT2" ]    = $_POST[ "member_out2" ];
	$_SESSION[ "JILM_SEARCH_OUT3" ]    = $_POST[ "member_out3" ];
	$_SESSION[ "JILM_SEARCH_OUT4" ]    = $_POST[ "member_out4" ];
	$_SESSION[ "JILM_SEARCH_OUT5" ]    = $_POST[ "member_out5" ];
	$_SESSION[ "JILM_SEARCH_OUT6" ]    = $_POST[ "member_out6" ];
	$_SESSION[ "JILM_SEARCH_PAY1" ]    = $_POST[ "member_pay1" ];
	$_SESSION[ "JILM_SEARCH_PAY2" ]    = $_POST[ "member_pay2" ];
	$_SESSION[ "JILM_SEARCH_PAY3" ]    = $_POST[ "member_pay3" ];
	$_SESSION[ "JILM_SEARCH_PAY4" ]    = $_POST[ "member_pay4" ];
	$_SESSION[ "JILM_SEARCH_PAY5" ]    = $_POST[ "member_pay5" ];
	$_SESSION[ "JILM_SEARCH_PAY6" ]    = $_POST[ "member_pay6" ];
	$_SESSION[ "JILM_SEARCH_UPDATE1" ] = $_POST[ "update_dt1" ];
	$_SESSION[ "JILM_SEARCH_UPDATE2" ] = $_POST[ "update_dt2" ];
	$_SESSION[ "JILM_SEARCH_UPDATE3" ] = $_POST[ "update_dt3" ];
	$_SESSION[ "JILM_SEARCH_UPDATE4" ] = $_POST[ "update_dt4" ];
	$_SESSION[ "JILM_SEARCH_UPDATE5" ] = $_POST[ "update_dt5" ];
	$_SESSION[ "JILM_SEARCH_UPDATE6" ] = $_POST[ "update_dt6" ];


	if( ( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_BIRTH1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_BIRTH2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_BIRTH3" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_BIRTH4" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_BIRTH5" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_BIRTH6" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_IN1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_IN2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_IN3" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_IN4" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_IN5" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_IN6" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_OUT1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_OUT2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_OUT3" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_OUT4" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_OUT5" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_OUT6" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_PAY1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_PAY2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_PAY3" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_PAY4" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_PAY5" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_PAY6" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_UPDATE1" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_UPDATE2" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_UPDATE3" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_UPDATE4" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_UPDATE5" ] ) ) OR 
		( $err_msg_tmp = is_Number( $_SESSION[ "JILM_SEARCH_UPDATE6" ] ) ) ){
		$err_msg = "半角数字で入力してください。";
		return $err_msg;
	}

	return $err_msg;

}

// ***********************************************
// 未払年度検索用処理
// ***********************************************

Function Search_Nendo_Write_1(){

	$search_nou_flg = $_SESSION[ "JILM_SEARCH_NOU_FLG" ];

	// 未納検索の場合
	if( $search_nou_flg == 1 ){

		// 全体を「0」にする
		$input_default = "0";

		// 該当を1にする
		$input_chenge = "1";

	// 納入済検索の場合
	}elseif( $search_nou_flg == 2 ){

		// 全体を「1」にする
		$input_default = "1";

		// 該当を0にする
		$input_chenge = "0";


	// 使わない場合
	}else{

		// 全体を「0」にする
		$input_default = "0";

	}

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE member_data";
	$sql .= "     SET member_flg = '" . $input_default . "'";
//	$sql .= "     WHERE member_id   > 0";

	$res = cn_query($sql, $cnn);

	$search_nou1    = $_SESSION[ "JILM_SEARCH_NOU1" ];
	$search_nou2    = $_SESSION[ "JILM_SEARCH_NOU2" ];
	$search_nou3    = $_SESSION[ "JILM_SEARCH_NOU3" ];

	$nou1_year      = "";
	$nou2_year      = "";
	$nou3_year      = "";

	if( date(m) < 3 ){
		if( $search_nou1 == 1 ){ $nou1_year      = date(Y) - 1; }
		if( $search_nou2 == 1 ){ $nou2_year      = date(Y) - 2; }
		if( $search_nou3 == 1 ){ $nou3_year      = date(Y) - 3; }
	}else{
		if( $search_nou1 == 1 ){ $nou1_year      = date(Y); }
		if( $search_nou2 == 1 ){ $nou2_year      = date(Y) - 1; }
		if( $search_nou3 == 1 ){ $nou3_year      = date(Y) - 2; }
	}

	if( $search_nou_flg > 0 ){

		if($nou1_year){

			$sql2  = " SELECT * FROM member_pay_data";
			$sql2 .= " WHERE status = 0";
			$sql2 .= "   AND  member_pay_nendo = '" . $nou1_year . "'";
			$sql2 .= " ORDER BY member_pay_id";
			$res2  = cn_query($sql2, $cnn);

			if ($res2 == true){
				$max_cnt = cn_count($res2);

				if ($max_cnt > 0){

					// ページ当たりの件数の取得
					$dsp_cnt = 500000;
					if ($dsp_page == "")    { $dsp_page = 1; }

					// ＭＡＸページの取得
					$max_page = floor($max_cnt / $dsp_cnt) + 1;
					if (!($max_cnt % $dsp_cnt)) { $max_page--; }
					$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
					$end_cnt = $dsp_page * $dsp_cnt - 1;

					// データの頁表示
					for ($i=0; $i<$max_cnt; $i++) {
						if ( $i >= $stt_cnt && $i <= $end_cnt ) {

							$mem_id = cn_contract($res2, $i, "member_id");


							$sql3 = "UPDATE member_data";
							$sql3 .= "     SET member_flg  = '" . $input_chenge . "'";
							$sql3 .= "     WHERE member_id = '" . $mem_id . "'";

							$res3 = cn_query($sql3, $cnn);



						}
						if ($i >= $end_cnt) { break; }
					}
				}
			}
		}

		if($nou2_year){

			$sql2  = " SELECT * FROM member_pay_data";
			$sql2 .= " WHERE status = 0";
			$sql2 .= "   AND  member_pay_nendo = '" . $nou2_year . "'";
			$sql2 .= " ORDER BY member_pay_id";
			$res2  = cn_query($sql2, $cnn);

			if ($res2 == true){
				$max_cnt = cn_count($res2);

				if ($max_cnt > 0){

					// ページ当たりの件数の取得
					$dsp_cnt = 500000;
					if ($dsp_page == "")    { $dsp_page = 1; }

					// ＭＡＸページの取得
					$max_page = floor($max_cnt / $dsp_cnt) + 1;
					if (!($max_cnt % $dsp_cnt)) { $max_page--; }
					$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
					$end_cnt = $dsp_page * $dsp_cnt - 1;

					// データの頁表示
					for ($i=0; $i<$max_cnt; $i++) {
						if ( $i >= $stt_cnt && $i <= $end_cnt ) {

							$mem_id = cn_contract($res2, $i, "member_id");


							$sql3 = "UPDATE member_data";
							$sql3 .= "     SET member_flg  = '" . $input_chenge . "'";
							$sql3 .= "     WHERE member_id = '" . $mem_id . "'";

							$res3 = cn_query($sql3, $cnn);



						}
						if ($i >= $end_cnt) { break; }
					}
				}
			}
		}

		if($nou3_year){

			$sql2  = " SELECT * FROM member_pay_data";
			$sql2 .= " WHERE status = 0";
			$sql2 .= "   AND  member_pay_nendo = '" . $nou3_year . "'";
			$sql2 .= "  ORDER BY member_pay_id";
			$res2  = cn_query($sql2, $cnn);

			if ($res2 == true){
				$max_cnt = cn_count($res2);

				if ($max_cnt > 0){

					// ページ当たりの件数の取得
					$dsp_cnt = 500000;
					if ($dsp_page == "")    { $dsp_page = 1; }

					// ＭＡＸページの取得
					$max_page = floor($max_cnt / $dsp_cnt) + 1;
					if (!($max_cnt % $dsp_cnt)) { $max_page--; }
					$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
					$end_cnt = $dsp_page * $dsp_cnt - 1;

					// データの頁表示
					for ($i=0; $i<$max_cnt; $i++) {
						if ( $i >= $stt_cnt && $i <= $end_cnt ) {

							$mem_id = cn_contract($res2, $i, "member_id");


							$sql3 = "UPDATE member_data";
							$sql3 .= "     SET member_flg  = '" . $input_chenge . "'";
							$sql3 .= "     WHERE member_id = '" . $mem_id . "'";

							$res3 = cn_query($sql3, $cnn);



						}
						if ($i >= $end_cnt) { break; }
					}
				}
			}
		}

	}


	tr_commit($cnn);
	db_close($cnn);

}
/*
Function Search_Nendo_Write_1(){

	$search_nou_flg = $_SESSION[ "JILM_SEARCH_NOU_FLG" ];

	// 未納検索の場合
	if( $search_nou_flg == 2 ){

		// 該当を2にする
		$input_chenge = "2";

	// 納入済検索の場合
	}elseif( $search_nou_flg == 1 ){

		// 該当を1にする
		$input_chenge = "1";

	}

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE member_data";
	$sql .= " SET member_flg = '0'";

	$res = cn_query($sql, $cnn);

	$search_nou1    = $_SESSION[ "JILM_SEARCH_NOU1" ];
	$search_nou2    = $_SESSION[ "JILM_SEARCH_NOU2" ];
	$search_nou3    = $_SESSION[ "JILM_SEARCH_NOU3" ];

	$nou1_year      = "";
	$nou2_year      = "";
	$nou3_year      = "";

	if( date(m) < 3 ){
		if( $search_nou1 == 1 ){ $nou1_year      = date(Y) - 1; }
		if( $search_nou2 == 1 ){ $nou2_year      = date(Y) - 2; }
		if( $search_nou3 == 1 ){ $nou3_year      = date(Y) - 3; }
	}else{
		if( $search_nou1 == 1 ){ $nou1_year      = date(Y); }
		if( $search_nou2 == 1 ){ $nou2_year      = date(Y) - 1; }
		if( $search_nou3 == 1 ){ $nou3_year      = date(Y) - 2; }
	}

	if( $search_nou_flg > 0 ){

		if($nou1_year){

			$sql2  = " SELECT * FROM member_pay_data";
			$sql2 .= " WHERE status = 0";
			$sql2 .= "   AND  member_pay_nendo = '" . $nou1_year . "'";
			$res2  = cn_query($sql2, $cnn);

			if ($res2 == true){
				$max_cnt = cn_count($res2);

				if ($max_cnt > 0){

					// データの頁表示
					for ($i=0; $i<$max_cnt; $i++) {
						if ( $i >= 0 && $i <= $max_cnt ) {

							$mem_id = cn_contract($res2, $i, "member_id");

							$sql3 = "UPDATE member_data";
							$sql3 .= " SET member_flg  = '" . $input_chenge . "'";
							$sql3 .= " WHERE member_id = '" . $mem_id . "'";

							$res3 = cn_query($sql3, $cnn);
							$mem_id = "";

						}
						if ($i >= $max_cnt) { break; }
					}
				}
			}
		}
		$i = "";
		$max_cnt = "";

		if($nou2_year){

			$sql2  = " SELECT * FROM member_pay_data";
			$sql2 .= " WHERE status = 0";
			$sql2 .= "   AND  member_pay_nendo = '" . $nou1_year . "'";
			$res2  = cn_query($sql2, $cnn);

			if ($res2 == true){
				$max_cnt = cn_count($res2);

				if ($max_cnt > 0){

					// データの頁表示
					for ($i=0; $i<$max_cnt; $i++) {
						if ( $i >= 0 && $i <= $max_cnt ) {

							$mem_id = cn_contract($res2, $i, "member_id");

							$sql3 = "UPDATE member_data";
							$sql3 .= " SET member_flg  = '" . $input_chenge . "'";
							$sql3 .= " WHERE member_id = '" . $mem_id . "'";

							$res3 = cn_query($sql3, $cnn);
							$mem_id = "";

						}
						if ($i >= $max_cnt) { break; }
					}
				}
			}
		}
		$i = "";
		$max_cnt = "";

		if($nou3_year){

			$sql2  = " SELECT * FROM member_pay_data";
			$sql2 .= " WHERE status = 0";
			$sql2 .= "   AND  member_pay_nendo = '" . $nou1_year . "'";
			$res2  = cn_query($sql2, $cnn);

			if ($res2 == true){
				$max_cnt = cn_count($res2);

				if ($max_cnt > 0){

					// データの頁表示
					for ($i=0; $i<$max_cnt; $i++) {
						if ( $i >= 0 && $i <= $max_cnt ) {

							$mem_id = cn_contract($res2, $i, "member_id");

							$sql3 = "UPDATE member_data";
							$sql3 .= " SET member_flg  = '" . $input_chenge . "'";
							$sql3 .= " WHERE member_id = '" . $mem_id . "'";

							$res3 = cn_query($sql3, $cnn);
							$mem_id = "";

						}
						if ($i >= $max_cnt) { break; }
					}
				}
			}
		}
	}
	tr_commit($cnn);
	db_close($cnn);

}
*/
// *********************************************************
// 選挙関連
// *********************************************************

// ***********************************************
// 管理者側　選挙のセッションクリア
// ***********************************************
Function Senkyo_Session_Clear_1(){

	$_SESSION[ "JILM_SENKYO_ID" ]      = "";
	$_SESSION[ "JILM_SENKYO_MASTER" ]  = "";
	$_SESSION[ "JILM_SENKYO_NAME" ]    = "";

}

// ***********************************************
// 管理者側　選挙のセッションセット
// ***********************************************
Function Senkyo_Session_Set_1(){

	$_SESSION[ "JILM_SENKYO_NAME" ]   = $_POST[ "senkyo_name" ];
	$_SESSION[ "JILM_SENKYO_MASTER" ] = $_POST[ "senkyo_master" ];

}

// ***********************************************
// 管理者側　選挙のエラーチェック
// ***********************************************
Function Senkyo_Error_Check_1(){

	$err_msg = "";

	if( $_SESSION[ "JILM_SENKYO_NAME" ] == "" ){
		$err_msg = "選挙名が未入力です。";
		return $err_msg;
	}
	if( $_SESSION[ "JILM_SENKYO_MASTER" ] == "" ){
		$err_msg = "管理委員長のNoが未入力です。";
		return $err_msg;
	}

	return $err_msg;
}

// ***********************************************
// 選挙データの新規登録
// ***********************************************
Function Senkyo_Data_Write_1(){

	$senkyo_name    = $_SESSION[ "JILM_SENKYO_NAME" ];
	$senkyo_master  = $_SESSION[ "JILM_SENKYO_MASTER" ];

	$senkyo_master = sprintf ("%08d", $senkyo_master);

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "INSERT INTO senkyo_data";
	$sql .= "     (       senkyo_name,";
	$sql .= "             senkyo_master,";
	$sql .= "             regist_dt,";
	$sql .= "             update_dt,";
	$sql .= "             status";
	$sql .= "     )";
	$sql .= "     VALUES";
	$sql .= "     (  '" . $senkyo_name . "',";
	$sql .= "        '" . $senkyo_master . "',";
	$sql .= "        '" . date(YmdHis) . "',";
	$sql .= "        '" . date(YmdHis) . "',";
	$sql .= "             9";
	$sql .= "     )";

	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);


	return true;

}

// ***********************************************
// 選挙管理人による選挙データの修正登録
// ***********************************************
Function Senkyo_Data_Write_2(){

	$senkyo_id    = $_SESSION[ "JILM_SENKYO_ID" ];
	$senkyo_date1 = $_SESSION[ "JILM_SENKYO_DATE1" ];
	$senkyo_date2 = $_SESSION[ "JILM_SENKYO_DATE2" ];
	$senkyo_date3 = $_SESSION[ "JILM_SENKYO_DATE3" ];
	$senkyo_date4 = $_SESSION[ "JILM_SENKYO_DATE4" ];
	$senkyo_biko  = $_SESSION[ "JILM_SENKYO_BIKO" ];
	$senkyo_hyou  = $_SESSION[ "JILM_SENKYO_HYOU" ];
	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = "UPDATE senkyo_data";
	$sql .= "     SET senkyo_date1 = '" . $senkyo_date1 . "',";
	$sql .= "         senkyo_date2 = '" . $senkyo_date2 . "',";
	$sql .= "         senkyo_date3 = '" . $senkyo_date3 . "',";
	$sql .= "         senkyo_date4 = '" . $senkyo_date4 . "',";
	$sql .= "         senkyo_biko  = '" . $senkyo_biko . "',";
	$sql .= "         senkyo_hyou  = '" . $senkyo_hyou . "',";
	$sql .= "         update_dt    = '" . date(YmdHis) . "'";
	$sql .= "     WHERE senkyo_id  = " . $senkyo_id;

	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

	return true;
}

// *******************************************
// 	選挙ID読み込み
// *******************************************
Function Senkyo_Id_Read_1(){

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$sql = "SELECT * FROM senkyo_data";
	$sql .= " ORDER BY senkyo_id DESC";
	$res = cn_query($sql, $cnn);

	if ($res == true){
		$cnt = cn_count($res);
		if ($cnt > 0){
			$_SESSION[ "JILM_SENKYO_ID" ]      = cn_contract($res, 0, "senkyo_id");
		}
	}

	db_close($cnn);

	return true;

}


// *******************************************
// 	選挙データ読み込み
// *******************************************
Function Senkyo_Data_Read_1(){

	$senkyo_id      = $_SESSION[ "JILM_SENKYO_ID" ];

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$sql = "SELECT * FROM senkyo_data";
	$sql .= "     WHERE senkyo_id = " . $senkyo_id;
	$sql .= "     AND   status   = 0";

	$res = cn_query($sql, $cnn);

	if ($res == true){
		$cnt = cn_count($res);
		if ($cnt > 0){
			$_SESSION[ "JILM_SENKYO_ID" ]      = cn_contract($res, 0, "senkyo_id");
			$_SESSION[ "JILM_SENKYO_NAME" ]    = cn_contract($res, 0, "senkyo_name");
			$_SESSION[ "JILM_SENKYO_MASTER" ]  = cn_contract($res, 0, "senkyo_master");
			$_SESSION[ "JILM_SENKYO_DATE1" ]   = cn_contract($res, 0, "senkyo_date1");
			$_SESSION[ "JILM_SENKYO_DATE2" ]   = cn_contract($res, 0, "senkyo_date2");
			$_SESSION[ "JILM_SENKYO_DATE3" ]   = cn_contract($res, 0, "senkyo_date3");
			$_SESSION[ "JILM_SENKYO_DATE4" ]   = cn_contract($res, 0, "senkyo_date4");
			$_SESSION[ "JILM_SENKYO_HYOU" ]    = cn_contract($res, 0, "senkyo_hyou");
			$_SESSION[ "JILM_SENKYO_BIKO" ]    = cn_contract($res, 0, "senkyo_biko");

			$tmp_date = cn_contract($res, 0, "regist_dt");
			$tmp_date = substr($tmp_date,0,4) . "年" . substr($tmp_date,4,2) . "月" . substr($tmp_date,6,2) . "日";
			$_SESSION[ "JILM_SENKYO_REGIST_DT" ]   = $tmp_date;

			$tmp_date = cn_contract($res, 0, "update_dt");
			$tmp_date = substr($tmp_date,0,4) . "年" . substr($tmp_date,4,2) . "月" . substr($tmp_date,6,2) . "日";
			$_SESSION[ "JILM_SENKYO_UPDATE_DT" ]   = $tmp_date;
			$_SESSION[ "JILM_UPDATE_DT" ] = cn_contract($res, 0, "update_dt");
		}
	}

	db_close($cnn);

	return true;

}
// *******************************************
// 	立候補者データベース作成
// *******************************************
Function Senkyo_Db_Make_1($senkyo_id){

	$table = "senkyo1_" . $senkyo_id . "_data";

	$cnn = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = "CREATE TABLE  {$table} (
						senkyo_sub1_id    int(15) auto_increment primary key ,
						member_id    varchar(15) ,
						senkyo_sub1_name    varchar(50) ,
						senkyo_sub1_kana    varchar(50) ,
						senkyo_sub1_init    varchar(2) ,
						member_office  varchar(120) ,
						senkyo_sub1_cnt   varchar(10) ,
						regist_dt   timestamp , 
						update_dt   timestamp
	);";
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

	return true;

}


// *******************************************
// 	選挙権者データベース作成
// *******************************************
Function Senkyo_Db_Make_2($senkyo_id){

	$table = "senkyo2_" . $senkyo_id . "_data";

	$cnn = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = "CREATE TABLE  {$table} (
						senkyo_sub2_id    int(15) auto_increment primary key ,
						member_id    varchar(15) ,
						senkyo_sub2_name    varchar(50) ,
						senkyo_sub2_chk   int(4) DEFAULT 0,
						regist_dt   timestamp , 
						update_dt   timestamp
	);";
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

	return true;

}


// *******************************************
// 	投票情報データベース作成
// *******************************************
Function Senkyo_Db_Make_3($senkyo_id){

	$table = "senkyo3_" . $senkyo_id . "_data";

	$cnn = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = "CREATE TABLE  {$table} (
						senkyo_sub3_id    int(15) auto_increment primary key ,
						member_id    varchar(15) ,
						member_name  varchar(30) ,
						senkyo_sub1_id    varchar(15) ,
						senkyo_ip   varchar(20) ,
						senkyo_ua   varchar(100) ,
						regist_dt   timestamp , 
						update_dt   timestamp
	);";
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

	return true;

}


?>