<?php
// *******************************************************************
// 軽金属学会　設定ファイル - 2　Encording UTF-8
// *******************************************************************

// 管理者メール
define( 'CMN_FROM_MAIL',    '790cd5d5a8-cdd944@inbox.mailtrap.io' );
define( 'CMN_SYSTEM_MAIL',  '790cd5d5a8-cdd944@inbox.mailtrap.io' );

//　メール設定（本番用）
define( 'CMN_ADMIN_MAIL', '790cd5d5a8-cdd944@inbox.mailtrap.io' );
define( 'JILM_SMTP_HOST',  'smtp.mailtrap.io' );
define( 'JILM_SMTP_USER',  '58470aaf3a86e5' );
define( 'JILM_SMTP_PASS',  'a3cb4eb30b5273' );

//　メール設定（テスト用）
// define( 'CMN_ADMIN_MAIL',   'ino1221@gmail.com' );
// define( 'JILM_SMTP_HOST',  'mail.clm-dev.com' );
// define( 'JILM_SMTP_USER',  'test1@clm-dev.com' );
// define( 'JILM_SMTP_PASS',  'clmtest1' );


// 歳リスト
$yyyy = substr(date(Ymd), 0, 4);
$CONFIG_BOOK_YEAR_TYPE   = array( 
	 $yyyy-0 => $yyyy-0, $yyyy-1 => $yyyy-1, $yyyy-2 => $yyyy-2, $yyyy-3 => $yyyy-3, $yyyy-4 => $yyyy-4,
	 $yyyy-5 => $yyyy-5, $yyyy-6 => $yyyy-6, $yyyy-7 => $yyyy-7, $yyyy-8 => $yyyy-8, $yyyy-9 => $yyyy-9,
	 $yyyy-10 => $yyyy-10, $yyyy-11 => $yyyy-11, $yyyy-12 => $yyyy-12, $yyyy-13 => $yyyy-13, $yyyy-14 => $yyyy-14,
	 $yyyy-15 => $yyyy-15, $yyyy-16 => $yyyy-16, $yyyy-17 => $yyyy-17, $yyyy-18 => $yyyy-18, $yyyy-19 => $yyyy-19,
	 $yyyy-20 => $yyyy-20, $yyyy-21 => $yyyy-21, $yyyy-22 => $yyyy-22, $yyyy-23 => $yyyy-23, $yyyy-24 => $yyyy-24,
	 $yyyy-25 => $yyyy-25, $yyyy-26 => $yyyy-26, $yyyy-27 => $yyyy-27, $yyyy-28 => $yyyy-28, $yyyy-29 => $yyyy-29,
	 $yyyy-30 => $yyyy-30, $yyyy-31 => $yyyy-31, $yyyy-32 => $yyyy-32, $yyyy-33 => $yyyy-33, $yyyy-34 => $yyyy-34,
	 $yyyy-35 => $yyyy-35, $yyyy-36 => $yyyy-36, $yyyy-37 => $yyyy-37, $yyyy-38 => $yyyy-38, $yyyy-39 => $yyyy-39,
	 $yyyy-40 => $yyyy-40, $yyyy-41 => $yyyy-41, $yyyy-42 => $yyyy-42, $yyyy-43 => $yyyy-43, $yyyy-44 => $yyyy-44,
	 $yyyy-45 => $yyyy-45, $yyyy-46 => $yyyy-46, $yyyy-47 => $yyyy-47, $yyyy-48 => $yyyy-48, $yyyy-49 => $yyyy-49,
	 $yyyy-50 => $yyyy-50,
);

/*
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
*/
/*
// 月リスト
$MONT_TYPE  = Array( '' => '', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
					'08' => '08','09' => '09', '10' => '10', '11' => '11', '12' => '12' );

// 日リスト
$DAYT_TYPE  = Array( '' => '', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
					'08' => '08','09' => '09', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15',
					'16' => '16','17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23',
					'24' => '24','25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31' );




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
*/


$PREF_TYPE  = Array( 
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



// =====================================
// 会員区分系
// =====================================
	/* 通常の区分 | 大会参加費に影響します */
	$CONFIG_MEMBER_TYPE = array( 
		1 => '正会員',
		3 => '名誉会員',
		4 => '永年会員',
		2 => '学生会員',
		99 => '非会員',
		5 => '維持会員',
	);

	/* 通常の区分 | 非会員系を省いている */
	$CONFIG_MEMBER_TYPE_1 = array( 
		1 => '正会員',
		3 => '名誉会員',
		4 => '永年会員',
		2 => '学生会員',
		5 => '維持会員',
	);

	/* 講演の研究者で使う区分 */
	$CONFIG_MEMBER_TYPE_KOUEN = array( 
		1 => '正会員',
		2 => '学生会員',
		3 => '名誉会員',
		4 => '永年会員',
		99 => '非会員',
		98 => '入会申込中',
	);

	/* 大会参加者の未ログイン状態での選択肢 */
	$CONFIG_MEMBER_TYPE_TAIKAI_SANKA_NOLOGIN = array( 
		99 => '非会員',
		5 => '維持会員・協賛学協会会員',
	);
	function getMemberTypeTaikaiSankaNoLogin() {
		return array( 
			99 => '非会員',
			5 => '維持会員・協賛学協会会員',
		);
	}

	/* シンポジウム参加者の会員区分(シンポジウム参加費との連動あり） */
	$CONFIG_MEMBER_TYPE_SYMP = array( 
		1 => '正会員',
		2 => '学生会員',
		3 => '名誉会員',
		4 => '永年会員',
		5 => '維持会員',
		6 => '協賛学協会員',
		7 => '非会員学生',
		99 => '非会員',
	);

	/* 会員登録・編集時の会員区分 */
	$CONFIG_MEMBER_TYPE_MEMBER_REGIST = array( 
		3 => '名誉会員',
		4 => '永年会員',
		1 => '正会員',
		2 => '学生会員',
	);

	/* 書籍購入時の会員区分 */
	$CONFIG_MEMBER_TYPE_BOOK = array( 
		1 => '会員',
		99 => '非会員',
	);

	/* 大会の表示非表示 */
	$CONFIG_CONVENTION_VIEW_TYPE = array( 
		0 => '非表示',
		1 => '表示',
	);

	/* シンポジウムの表示非表示 */
	$CONFIG_SYMP_VIEW_TYPE = array( 
		0 => '非表示',
		1 => '表示',
	);

// =====================================
// =====================================

	define( 'LOGIN_SESSION_NAME', 'JILM_LOGIN');

	$CONFIG_SEX_TYPE = array( 
		1 => '男',
		2 => '女',
	);

	$CONFIG_PAY_MENU_TYPE_LONG = array(
		1 => '研究発表講演会（参加証付き概要集を購入）',
		2 => '懇親会',
		3 => '概要集事前送付希望',
	);

	$CONFIG_PAY_MENU_TYPE = array(
		1 => '講演会',
		2 => '懇親会',
		3 => '送付希望',
	);

	// 大会講演の支払区分
	$CONFIG_PAY_WAY_TYPE = array( 
		1 => '郵便振替',
		2 => '銀行振込み',
		3 => '現金書留',
//	   99 => 'その他',
	);

	$CONFIG_PAY_WAY_TYPE_TAIKAI_SANKA = array( 
		1 => '郵便振替',
		2 => '銀行振込み',
		3 => '現金書留',
	);

	// シンポジウム参加用 支払区分
	$CONFIG_PAY_WAY_TYPE_SYMP = array( 
		1 => '郵便振替',
		2 => '銀行振込み',
//		3 => '現金書留',
	   99 => 'その他',
	);

	$CONFIG_PAY_BILL_TYPE = array(
		1 => '希望する',
		2 => '希望しない',
	);


	$CONFIG_PAY_TYPE = array( 
		1 => '未入金',
		2 => '入金済',
	);

	$CONFIG_BOOK_GENRE_ORDER = array( 
		1 => 1,
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8,
		9 => 9,
		10 => 10,
	);

	$CONFIG_HAPYO_TYPE = array( 
		1 => '発表する',
	);

	$CONFIG_HAPYO_UID_TYPE = array( 
		1 => '1番目',
		2 => '2番目',
		3 => '3番目',
		4 => '4番目',
		5 => '5番目',
		6 => '6番目',
		7 => '7番目',
		8 => '8番目',
	);

	$CONFIG_KOUEN_KEISHIKI = array(
		1 => '口頭発表',
		2 => 'ポスター発表',
		3 => '口頭でもポスターでもどちらでもよい',
	);

	$CONFIG_MEMBER_BOOKBUY_LOGIN_TYPE = array(
		0 => 'ログインせず直接購入',
		1 => 'ログイン後の購入',
	);

	$CONFIG_MEMBER_LOGIN_STATUS_TYPE = array(
		0 => 'ログインせず直接処理',
		1 => 'ログイン後に処理',
	);

	$CONFIG_FILE_VIEW_TYPE = array(
		1 => '表示',
		2 => '非表示',
	);

	$CONFIG_TYPE_SECTION_HEAD = array(
		'1'=>'アルミニウム',
		'2'=>'マグネシウム',
		'3'=>'チタン',
		'4'=>'軽金属応用・関連材料',
	);

	$CONFIG_TYPE_SECTION_HEAD_1 = array(
		'1'=>'自動車',
		'2'=>'航空機・宇宙',
		'3'=>'住宅建材',
		'4'=>'電子・電気材料',
		'5'=>'家電製品',
		'6'=>'包装容器',
		'7'=>'生体用途',
		'8'=>'新用途',
		'9'=>'その他',
	);

	$CONFIG_TYPE_SECTION_HEAD_2 = array(
		'1'=>'溶解・凝固・鋳造',
		'2'=>'時効析出・相分解',
		'3'=>'塑性加工',
		'4'=>'回復・再結晶、集合組織',
		'5'=>'力学特性',
		'6'=>'腐食・防食',
		'7'=>'水素',
		'8'=>'接合',
		'9'=>'表面処理',
		'10'=>'粉末冶金',
		'11'=>'その他の現象・新手法',
	);

	$CONFIG_TYPE_SECTION_HEAD_3 = array(
		'1'=>'熱分析',
		'2'=>'応力・ひずみ解析',
		'3'=>'組織観察',
		'4'=>'構造解析',
		'5'=>'電気・磁気測定',
		'6'=>'濃度測定',
		'7'=>'計算・シミュレーション',
		'8'=>'その他の新解析法',
	);

	$CONFIG_TYPE_SECTION_HEAD_4 = array(
		'1'=>'リサイクル',
		'2'=>'省エネ・省資源',
		'3'=>'力学特性向上（高強度化等）',
		'4'=>'新機能・付加価値付与',
		'5'=>'萌芽的研究・シーズ提案',
		'6'=>'その他の目的',
	);

	$CONFIG_TYPE_SECTION_HEAD_5 = array(
		'1'=>'鋳塊・鋳物',
		'2'=>'板材',
		'3'=>'押出・抽伸、形・管棒材',
		'4'=>'特定部材',
		'5'=>'ポーラス材',
		'6'=>'その他',
	);


$CONFIG_STAR_TIME_TYPE  = array(
'12' =>  '6:00',
'13' =>  '6:30', '14' =>  '7:00', '15' =>  '7:30', '16' =>  '8:00', '17' =>  '8:30', '18' =>  '9:00',
'19' =>  '9:30', '20' => '10:00', '21' => '10:30', '22' => '11:00', '23' => '11:30', '24' => '12:00',
'25' => '12:30', '26' => '13:00', '27' => '13:30', '28' => '14:00', '29' => '14:30', '30' => '15:00',
'31' => '15:30', '32' => '16:00', '33' => '16:30', '34' => '17:00', '35' => '17:30', '36' => '18:00',
'37' => '18:30', '38' => '19:00', '39' => '19:30', '40' => '20:00', '41' => '20:30', '42' => '21:00',
'43' => '21:30', '44' => '22:00', 
				);

/*
	$yyyy = substr( date( "Ymd" ), 0, 4 );
	$CONFIG_CALENDAR_YEAR_TYPE  = array( 
		$yyyy   => $yyyy,   $yyyy-1 => $yyyy-1, $yyyy-2 => $yyyy-2, $yyyy-3 => $yyyy-3, $yyyy-4 => $yyyy-4,
		$yyyy-5 => $yyyy-5, $yyyy-6 => $yyyy-6,
	);
*/
	$yyyy = date( "Y" );
	$CONFIG_CALENDAR_YEAR_TYPE  = array( 
		$yyyy+3   => $yyyy+3,   $yyyy+2 => $yyyy+2, $yyyy+1 => $yyyy+1, $yyyy => $yyyy, $yyyy-1 => $yyyy-1,
		$yyyy-2 => $yyyy-2, $yyyy-3 => $yyyy-3,
	);

	$CONFIG_CALENDAR_COLORED_TYPE = array(
		0 => '色無し',
		1 => '色有り',
	);


// **********************************************************************************************
// **********************************************************************************************
// ***********************************************
// 会員テーブル IDを元にSELECT
// ***********************************************
function member_Mast_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM member_mast';
	$sql .= '    WHERE';
	$sql .= '        member_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {
			$return_array[ 'member_id' ]      = cn_contract( $res, 0, 'member_id' );
			$return_array[ 'member_userid' ]  = cn_contract( $res, 0, 'member_userid' );
			$return_array[ 'member_pass' ]    = cn_contract( $res, 0, 'member_pass' );
			$return_array[ 'member_name' ]    = cn_contract( $res, 0, 'member_name' );
			$return_array[ 'member_kana' ]    = cn_contract( $res, 0, 'member_kana' );
			$return_array[ 'member_info01' ]  = cn_contract( $res, 0, 'member_info01' );
			$return_array[ 'member_info02' ]  = cn_contract( $res, 0, 'member_info02' );
			$return_array[ 'member_kubun01' ] = cn_contract( $res, 0, 'member_kubun01' );
			$return_array[ 'member_mail' ]    = cn_contract( $res, 0, 'member_mail' );
			$return_array[ 'member_zip1' ]    = cn_contract( $res, 0, 'member_zip1' );
			$return_array[ 'member_zip2' ]    = cn_contract( $res, 0, 'member_zip2' );
			$return_array[ 'member_address' ] = cn_contract( $res, 0, 'member_address' );
			$return_array[ 'member_tel' ]     = cn_contract( $res, 0, 'member_tel' );
			$return_array[ 'member_fax' ]     = cn_contract( $res, 0, 'member_fax' );
			$return_array[ 'update_dt' ]      = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]      = cn_contract( $res, 0, 'regist_dt' );
		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 会員テーブル IDを元にSELECT
// ***********************************************
function member_Mast_Read_By_UserID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM member_mast';
	$sql .= '    WHERE';
	$sql .= '        member_userid = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {
			$return_array[ 'member_id' ]      = cn_contract( $res, 0, 'member_id' );
			$return_array[ 'member_userid' ]  = cn_contract( $res, 0, 'member_userid' );
			$return_array[ 'member_pass' ]    = cn_contract( $res, 0, 'member_pass' );
			$return_array[ 'member_name' ]    = cn_contract( $res, 0, 'member_name' );
			$return_array[ 'member_kana' ]    = cn_contract( $res, 0, 'member_kana' );
			$return_array[ 'member_info01' ]  = cn_contract( $res, 0, 'member_info01' );
			$return_array[ 'member_info02' ]  = cn_contract( $res, 0, 'member_info02' );
			$return_array[ 'member_kubun01' ] = cn_contract( $res, 0, 'member_kubun01' );
			$return_array[ 'member_mail' ]    = cn_contract( $res, 0, 'member_mail' );
			$return_array[ 'member_zip1' ]    = cn_contract( $res, 0, 'member_zip1' );
			$return_array[ 'member_zip2' ]    = cn_contract( $res, 0, 'member_zip2' );
			$return_array[ 'member_address' ] = cn_contract( $res, 0, 'member_address' );
			$return_array[ 'member_tel' ]     = cn_contract( $res, 0, 'member_tel' );
			$return_array[ 'member_fax' ]     = cn_contract( $res, 0, 'member_fax' );
			$return_array[ 'update_dt' ]      = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]      = cn_contract( $res, 0, 'regist_dt' );
		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 会員テーブル INSERT
// ***********************************************
function member_Mast_Insert( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'INSERT INTO member_mast (';
	$sql .= '        member_userid,';
	$sql .= '        member_pass,';
	$sql .= '        member_name,';
	$sql .= '        member_kana,';
	$sql .= '        member_info01,';
	$sql .= '        member_info02,';
	$sql .= '        member_kubun01,';
	$sql .= '        member_mail,';
	$sql .= '        member_zip1,';
	$sql .= '        member_zip2,';
	$sql .= '        member_address,';
	$sql .= '        member_tel,';
	$sql .= '        member_fax,';
	$sql .= '        ninsyou_status,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '    ) VALUES (    ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_userid' ] )  . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_pass' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kana' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info01' ] )  . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info02' ] )  . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kubun01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_mail' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip1' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip2' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_address' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_tel' ] )     . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_fax' ] )     . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'ninsyou_status' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '    )';


	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}


// ***********************************************
// 会員テーブル INSERT（表画面用）
// 認証が０（認証なし状態）
// ***********************************************
function member_Mast_Insert_PC( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'INSERT INTO member_mast (';
	$sql .= '        member_userid,';
	$sql .= '        member_pass,';
	$sql .= '        member_name,';
	$sql .= '        member_kana,';
	$sql .= '        member_info01,';
	$sql .= '        member_info02,';
	$sql .= '        member_kubun01,';
	$sql .= '        member_mail,';
	$sql .= '        member_zip1,';
	$sql .= '        member_zip2,';
	$sql .= '        member_address,';
	$sql .= '        member_tel,';
	$sql .= '        member_fax,';
	$sql .= '        ninsyou_status,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '    ) VALUES (    ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_userid' ] )  . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_pass' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kana' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info01' ] )  . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info02' ] )  . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kubun01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_mail' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip1' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip2' ] )    . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_address' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_tel' ] )     . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_fax' ] )     . '",';
	$sql .= '        0,';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '    )';


	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}


// ***********************************************
// 会員テーブル UPDATE
// ***********************************************
function member_Mast_Update( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE member_mast SET';
	$sql .= '        member_userid  = "' . mysql_real_escape_string( $arr[ 'member_userid' ] )  . '",';
	$sql .= '        member_pass    = "' . mysql_real_escape_string( $arr[ 'member_pass' ] )    . '",';
	$sql .= '        member_name    = "' . mysql_real_escape_string( $arr[ 'member_name' ] )    . '",';
	$sql .= '        member_kana    = "' . mysql_real_escape_string( $arr[ 'member_kana' ] )    . '",';
	$sql .= '        member_info01  = "' . mysql_real_escape_string( $arr[ 'member_info01' ] )  . '",';
	$sql .= '        member_info02  = "' . mysql_real_escape_string( $arr[ 'member_info02' ] )  . '",';
	$sql .= '        member_kubun01 = "' . mysql_real_escape_string( $arr[ 'member_kubun01' ] ) . '",';
	$sql .= '        member_mail    = "' . mysql_real_escape_string( $arr[ 'member_mail' ] )    . '",';
	$sql .= '        member_zip1    = "' . mysql_real_escape_string( $arr[ 'member_zip1' ] )    . '",';
	$sql .= '        member_zip2    = "' . mysql_real_escape_string( $arr[ 'member_zip2' ] )    . '",';
	$sql .= '        member_address = "' . mysql_real_escape_string( $arr[ 'member_address' ] ) . '",';
	$sql .= '        member_tel     = "' . mysql_real_escape_string( $arr[ 'member_tel' ] )     . '",';
	$sql .= '        member_fax     = "' . mysql_real_escape_string( $arr[ 'member_fax' ] )     . '",';
	$sql .= '        update_dt      = "' . date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        member_id = "' . $arr[ 'member_id' ] . '"';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);


}



// ***********************************************
// 会員データのmember_idの最大を取得
// ***********************************************
function member_Id_max_Get() {

	$maxid = 1;

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT max(member_id) AS maxid FROM member_mast";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$maxid = cn_contract($res, 0, "maxid");
		}
	}

	db_close($cnn);

	return $maxid;

}

// ***********************************************
// 会員データ CSV保存
// @return: string: filename
// ***********************************************
function member_Mast_Set_CSV($options) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM member_mast";
	$sql .= "    WHERE";
	$sql .= "        member_kubun01 != 99 AND";
	$sql .= "        member_userid != 0 AND";
	$sql .= "        ninsyou_status != 0 AND";
	$sql .= "        status = 0";
	$sql .= "    ORDER BY member_id";
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			for ( $i=0;$i<$cnt;$i++ ) {

				$d[$i][ 'member_id' ]      = cn_contract( $res, $i, 'member_id' );
				$d[$i][ 'member_userid' ]  = cn_contract( $res, $i, 'member_userid' );
				$d[$i][ 'member_pass' ]    = cn_contract( $res, $i, 'member_pass' );
				$d[$i][ 'member_name' ]    = cn_contract( $res, $i, 'member_name' );
				$d[$i][ 'member_kana' ]    = cn_contract( $res, $i, 'member_kana' );
				$d[$i][ 'member_info01' ]  = cn_contract( $res, $i, 'member_info01' );
				$d[$i][ 'member_info02' ]  = cn_contract( $res, $i, 'member_info02' );
				$d[$i][ 'member_kubun01' ] = cn_contract( $res, $i, 'member_kubun01' );
				$d[$i][ 'member_mail' ]    = cn_contract( $res, $i, 'member_mail' );
				$d[$i][ 'member_zip1' ]    = cn_contract( $res, $i, 'member_zip1' );
				$d[$i][ 'member_zip2' ]    = cn_contract( $res, $i, 'member_zip2' );
				$d[$i][ 'member_address' ] = cn_contract( $res, $i, 'member_address' );
				$d[$i][ 'member_tel' ]     = cn_contract( $res, $i, 'member_tel' );
				$d[$i][ 'member_fax' ]     = cn_contract( $res, $i, 'member_fax' );
				$d[$i][ 'update_dt' ]      = cn_contract( $res, $i, 'update_dt' );
				$d[$i][ 'regist_dt' ]      = cn_contract( $res, $i, 'regist_dt' );

				// データ整形
				$d[$i]['member_kubun01_text'] = $options['member_kubun'][$d[$i][ 'member_kubun01' ]];
				$d[$i]['member_zip']          = $d[$i][ 'member_zip1' ] . ' - ' . $d[$i][ 'member_zip2' ];

			}
		}
	}

	db_close( $cnn );

	// エクセルインポート
	$excel = new PHPExcel();

	// 各種設定
	$save_dir  = '../../csv/';
	$file_name = 'member_data.xls';

	// シートの設定   
	$excel->setActiveSheetIndex(0);
	$sheet = $excel->getActiveSheet();
	$sheet->setTitle('Sheet1');

	$line_cnf_array = array(

		// 参加者情報
		array( 'title' => '会員番号',       'data_id' => 'member_userid' ),
		array( 'title' => 'パスワード',     'data_id' => 'member_pass' ),
		array( 'title' => '会員区分',       'data_id' => 'member_kubun01_text' ),
		array( 'title' => '氏名',           'data_id' => 'member_name' ),
		array( 'title' => 'カナ',           'data_id' => 'member_kana' ),
		array( 'title' => '勤務先/学校',    'data_id' => 'member_info01' ),
		array( 'title' => '所属',           'data_id' => 'member_info02' ),
		array( 'title' => 'メールアドレス', 'data_id' => 'member_mail' ),
		array( 'title' => '電話番号',       'data_id' => 'member_tel' ),
		array( 'title' => 'FAX番号',        'data_id' => 'member_fax' ),
		array( 'title' => '郵便番号',       'data_id' => 'member_zip' ),
		array( 'title' => '住所',           'data_id' => 'member_address' ),

	);

	$line_id_array = array(
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
		'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
	);

	// タイトル行挿入
	$line_cnt = count( $line_cnf_array );
	for ( $i=0;$i<$line_cnt;$i++ ) {
		$col = 1;
		$line_id = $line_id_array[$i];

		$cell  = $line_id . $col;
		$value = $line_cnf_array[$i]['title'];

		$sheet->setCellValue( $cell, $value);
	}

	// データ抽出
	$data_cnt = count( $d );
	for($i=0;$i<$data_cnt;$i++ ) {

		$col = $i+2;

		for ( $j=0;$j<$line_cnt;$j++ ) {

			$line_id = $line_id_array[$j];
			$data_id = $line_cnf_array[$j]['data_id'];

			$cell = $line_id. $col;
			$value = $d[$i][$data_id];

			$sheet->setCellValue($cell,$value);
		}

	}

	// Excel2003形式で保存する
	$writer = PHPExcel_IOFactory::createWriter($excel, "Excel5");
	$writer->save( $save_dir . $file_name );

	return $file_name;

}


// ***********************************************
// 会員の認証を済にする
// ***********************************************
function member_Date_Ninsyou_Set( $member_id ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'UPDATE member_mast SET';
	$sql .= '        ninsyou_status      = 1';
	$sql .= '    WHERE';
	$sql .= '        member_id = "' . mysql_real_escape_string( $member_id ) . '"';
	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

}


// ***********************************************
// 会員のuserid存在・重複チェック
// 0 => 存在無し
// 1 => 1つ存在
// 2 => 重複して存在
// ***********************************************
function member_Userid_Exist_Check( $userid ) {

	$flg = 0;

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM member_mast";
	$sql .= "     WHERE";
	$sql .= "        member_userid = '" . $userid  . "' AND ";
	$sql .= "        ninsyou_status = 1 AND ";
	$sql .= "        status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){

			$flg = 1;

		}
	}

	db_close($cnn);

	if ( $max_cnt > 1 ) {
		$flg = 2;
	}

	return $flg;

}

// ***********************************************
// 会員テーブルエラーチェック
// ***********************************************
function member_Error_Check($arr) {
	
	$err_msg = '';

	if ( ! $arr[ 'member_userid' ] ) {
		$err_msg .= '会員番号が未入力です';
		return $err_msg;
	}

	if ( is_Number( $arr[ 'member_userid' ] ) ) {
		$err_msg .= '会員番号は半角数字以外の入力はできません';
	}

	if ( ! $arr[ 'member_pass' ] ) {
		$err_msg .= 'パスワードが未入力です';
		return $err_msg;
	}

	if ( is_PassWord( $arr[ 'member_pass' ] ) ) {
		$err_msg .= 'パスワードの入力が正しくありません';
		return $err_msg;
	}

	if ( strlen( $arr[ 'member_pass' ] ) > 15 || strlen( $arr[ 'member_pass' ] ) < 4) {
		$err_msg .= 'パスワードは4～15文字で決定してください';
		return $err_msg;
	}

	if ( ! $arr[ 'member_name' ] ) {
		$err_msg .= '名前が未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'member_mail' ] ) {
		$err_msg .= 'メールアドレスが未入力です';
		return $err_msg;
	}

	if ( is_Mail( $arr[ 'member_mail' ] ) ) {
		$err_msg .= 'メールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
		return $err_msg;
	}

	if ( $arr[ 'member_tel' ] ) {
		if ( is_Tell( $arr[ 'member_tel' ] ) ) {
			$err_msg .= '電話番号は' . is_Tell( $arr[ 'member_tel' ] );
			return $err_msg;
		}
	}
	if ( $arr[ 'member_fax' ] ) {
		if ( is_Tell( $arr[ 'member_fax' ] ) ) {
			$err_msg .= 'FAX番号は' . is_Tell( $arr[ 'member_fax' ] );
			return $err_msg;
		}
	}

	if ( $arr[ 'member_zip1' ] ) {
		if ( is_Number( $arr[ 'member_zip1' ] ) ) {
			$err_msg .= '郵便番号1は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
			$err_msg .= '郵便番号1は3桁までしか入力できません';
			return $err_msg;
		}
	}

	if ( $arr[ 'member_zip2' ] ) {
		if ( is_Number( $arr[ 'member_zip2' ] ) ) {
			$err_msg .= '郵便番号2は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
			$err_msg .= '郵便番号2は4桁までしか入力できません';
			return $err_msg;
		}
	}

	if ( ! $arr[ 'member_kubun01' ] ) {
		$err_msg .= '会員区分が選択されていません';
		return $err_msg;
	}

	return $err_msg;
}


// ***********************************************
// 会員テーブルエラーチェック(表画面用）
// ***********************************************
function member_Error_Check_PC($arr) {
	
	$err_msg = '';

	if ( ! $arr[ 'member_kubun01' ] ) {
		$err_msg .= '会員区分が選択されていません';
		return $err_msg;
	}

	if ( ! $arr[ 'member_userid' ] ) {
		$err_msg .= '会員番号が未入力です';
		return $err_msg;
	}

	if ( is_Number( $arr[ 'member_userid' ] ) ) {
		$err_msg .= '会員番号は半角数字以外の入力はできません';
		return $err_msg;
	}

	if ( member_Userid_Exist_Check( $arr[ 'member_userid' ] ) ) {
		$err_msg .= 'ご入力された会員番号はすでに登録されています';
		return $err_msg;
	}

	if ( ! $arr[ 'member_name' ] ) {
		$err_msg .= '名前が未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'member_kana' ] ) {
		$err_msg .= 'フリガナが未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'member_mail' ] ) {
		$err_msg .= 'メールアドレスが未入力です';
		return $err_msg;
	}

	if ( is_Mail( $arr[ 'member_mail' ] ) ) {
		$err_msg .= 'メールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
		return $err_msg;
	}

	if ( ! $arr[ 'member_zip1' ] ) {
		$err_msg .= '郵便番号1が入力されていません';
		return $err_msg;
	}
	if ( is_Number( $arr[ 'member_zip1' ] ) ) {
		$err_msg .= '郵便番号1は半角数字以外の入力はできません';
		return $err_msg;
	}
	if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
		$err_msg .= '郵便番号1は3桁までしか入力できません';
		return $err_msg;
	}

	if ( ! $arr[ 'member_zip2' ] ) {
		$err_msg .= '郵便番号2が入力されていません';
		return $err_msg;
	}
	if ( is_Number( $arr[ 'member_zip2' ] ) ) {
		$err_msg .= '郵便番号2は半角数字以外の入力はできません';
		return $err_msg;
	}
	if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
		$err_msg .= '郵便番号2は4桁までしか入力できません';
		return $err_msg;
	}

	if ( ! $arr[ 'member_address' ] ) {
		$err_msg .= '住所が未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'member_tel' ] ) {
		$err_msg .= '電話番号が未入力です';
		return $err_msg;
	}
	if ( is_Tell( $arr[ 'member_tel' ] ) ) {
		$err_msg .= '電話番号は' . is_Tell( $arr[ 'member_tel' ] );
		return $err_msg;
	}

	if ( $arr[ 'member_fax' ] ) {
		if ( is_Tell( $arr[ 'member_fax' ] ) ) {
			$err_msg .= 'FAX番号は' . is_Tell( $arr[ 'member_fax' ] );
			return $err_msg;
		}
	}
	if ( ! $arr[ 'member_info01' ] ) {
		$err_msg .= '勤務先／学校名が未入力です';
		return $err_msg;
	}
	if ( ! $arr[ 'member_info02' ] ) {
		$err_msg .= '所属が未入力です';
		return $err_msg;
	}


	if ( ! $arr[ 'member_pass' ] ) {
		$err_msg .= 'パスワードが未入力です';
		return $err_msg;
	}

	if ( is_PassWord( $arr[ 'member_pass' ] ) ) {
		$err_msg .= 'パスワードの入力が正しくありません';
		return $err_msg;
	}

	if ( strlen( $arr[ 'member_pass' ] ) > 15 || strlen( $arr[ 'member_pass' ] ) < 4) {
		$err_msg .= 'パスワードは4～15文字で決定してください';
		return $err_msg;
	}

	if ( $arr[ 'member_pass' ] != $arr[ 'member_pass_2' ]) {
		$err_msg .= 'パスワードが一致しません';
		return $err_msg;
	}

	return $err_msg;
}


// ***********************************************
// 会員テーブル修正の場合のエラーチェック(表画面用）
// ***********************************************
function member_Modify_Error_Check_PC($arr) {
	
	$err_msg = '';

	if ( ! $arr[ 'member_name' ] ) {
		$err_msg .= '名前が未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'member_kana' ] ) {
		$err_msg .= 'フリガナが未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'member_mail' ] ) {
		$err_msg .= 'メールアドレスが未入力です';
		return $err_msg;
	}

	if ( is_Mail( $arr[ 'member_mail' ] ) ) {
		$err_msg .= 'メールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
		return $err_msg;
	}

	if ( ! $arr[ 'member_zip1' ] ) {
		$err_msg .= '郵便番号1が入力されていません';
		return $err_msg;
	}
	if ( is_Number( $arr[ 'member_zip1' ] ) ) {
		$err_msg .= '郵便番号1は半角数字以外の入力はできません';
		return $err_msg;
	}
	if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
		$err_msg .= '郵便番号1は3桁までしか入力できません';
		return $err_msg;
	}

	if ( ! $arr[ 'member_zip2' ] ) {
		$err_msg .= '郵便番号2が入力されていません';
		return $err_msg;
	}
	if ( is_Number( $arr[ 'member_zip2' ] ) ) {
		$err_msg .= '郵便番号2は半角数字以外の入力はできません';
		return $err_msg;
	}
	if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
		$err_msg .= '郵便番号2は4桁までしか入力できません';
		return $err_msg;
	}

	if ( ! $arr[ 'member_address' ] ) {
		$err_msg .= '住所が未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'member_tel' ] ) {
		$err_msg .= '電話番号が未入力です';
		return $err_msg;
	}
	if ( is_Tell( $arr[ 'member_tel' ] ) ) {
		$err_msg .= '電話番号は' . is_Tell( $arr[ 'member_tel' ] );
		return $err_msg;
	}

	if ( $arr[ 'member_fax' ] ) {
		if ( is_Tell( $arr[ 'member_fax' ] ) ) {
			$err_msg .= 'FAX番号は' . is_Tell( $arr[ 'member_fax' ] );
			return $err_msg;
		}
	}
	if ( ! $arr[ 'member_info01' ] ) {
		$err_msg .= '勤務先／学校名が未入力です';
		return $err_msg;
	}
	if ( ! $arr[ 'member_info02' ] ) {
		$err_msg .= '所属が未入力です';
		return $err_msg;
	}

	if ( $arr[ 'member_pass_2' ] ) {

		if ( ! $arr[ 'member_pass' ] ) {
			$err_msg .= 'パスワードが未入力です';
			return $err_msg;
		}

		if ( is_PassWord( $arr[ 'member_pass' ] ) ) {
			$err_msg .= 'パスワードの入力が正しくありません';
			return $err_msg;
		}

		if ( strlen( $arr[ 'member_pass' ] ) > 15 || strlen( $arr[ 'member_pass' ] ) < 4) {
			$err_msg .= 'パスワードは4～15文字で決定してください';
			return $err_msg;
		}

		if ( $arr[ 'member_pass' ] != $arr[ 'member_pass_2' ]) {
			$err_msg .= 'パスワードが一致しません';
			return $err_msg;
		}

	}

	return $err_msg;
}


// ***********************************************
// 会員テーブル修正の場合 パスワード変更チェック
// ***********************************************
function member_New_Pass_Check($arr) {

	$flg = FALSE;
	if ( $arr[ 'member_pass_2' ] ) {

		if ( $arr[ 'member_pass' ] === $arr[ 'member_pass_2' ]) {
			$flg = TRUE;
		}

	}

	return $flg;

}


// **********************************************************************************************
// **********************************************************************************************
// ***********************************************
// 未認証会員テーブル IDを元にSELECT
// ***********************************************
function member_Uncertified_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM member_uncertified_mast';
	$sql .= '    WHERE';
	$sql .= '        member_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {
			$return_array[ 'member_id' ]      = cn_contract( $res, 0, 'member_id' );
			$return_array[ 'member_userid' ]  = cn_contract( $res, 0, 'member_userid' );
			$return_array[ 'member_pass' ]    = cn_contract( $res, 0, 'member_pass' );
			$return_array[ 'member_name' ]    = cn_contract( $res, 0, 'member_name' );
			$return_array[ 'member_kana' ]    = cn_contract( $res, 0, 'member_kana' );
			$return_array[ 'member_info01' ]  = cn_contract( $res, 0, 'member_info01' );
			$return_array[ 'member_info02' ]  = cn_contract( $res, 0, 'member_info02' );
			$return_array[ 'member_kubun01' ] = cn_contract( $res, 0, 'member_kubun01' );
			$return_array[ 'member_mail' ]    = cn_contract( $res, 0, 'member_mail' );
			$return_array[ 'member_zip1' ]    = cn_contract( $res, 0, 'member_zip1' );
			$return_array[ 'member_zip2' ]    = cn_contract( $res, 0, 'member_zip2' );
			$return_array[ 'member_address' ] = cn_contract( $res, 0, 'member_address' );
			$return_array[ 'member_tel' ]     = cn_contract( $res, 0, 'member_tel' );
			$return_array[ 'update_dt' ]      = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]      = cn_contract( $res, 0, 'regist_dt' );
		}
	}

	db_close($cnn);

	return $return_array;

}



// **********************************************************************************************
// 大会関連
// **********************************************************************************************
/*
convention_id
conv_name
conv_open
conv_place
kouen_open
kouen_close
sanka_open
sanka_close
type_text
body_text
price01
price02
price03
view_status
status
update_dt
regist_dt
*/
// ***********************************************
// 大会テーブル IDを元にSELECT
// ***********************************************
function convention_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM convention_data';
	$sql .= '    WHERE';
	$sql .= '        convention_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'convention_id' ]  = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'conv_name' ]      = cn_contract( $res, 0, 'conv_name' );
			$return_array[ 'conv_open' ]      = cn_contract( $res, 0, 'conv_open' );
			$return_array[ 'conv_place' ]     = cn_contract( $res, 0, 'conv_place' );
			$return_array[ 'kouen_open' ]     = cn_contract( $res, 0, 'kouen_open' );
			$return_array[ 'kouen_close' ]    = cn_contract( $res, 0, 'kouen_close' );
			$return_array[ 'sanka_open' ]     = cn_contract( $res, 0, 'sanka_open' );
			$return_array[ 'sanka_close' ]    = cn_contract( $res, 0, 'sanka_close' );
			$return_array[ 'type_text' ]      = cn_contract( $res, 0, 'type_text' );
			$return_array[ 'body_text' ]      = cn_contract( $res, 0, 'body_text' );
			$return_array[ 'price01' ]        = cn_contract( $res, 0, 'price01' );
			$return_array[ 'price02' ]        = cn_contract( $res, 0, 'price02' );
			$return_array[ 'price03' ]        = cn_contract( $res, 0, 'price03' );
			$return_array[ 'view_status' ]    = cn_contract( $res, 0, 'view_status' );
			$return_array[ 'status' ]         = cn_contract( $res, 0, 'status' );
			$return_array[ 'update_dt' ]      = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]      = cn_contract( $res, 0, 'regist_dt' );

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 大会の分類配列を吐き出す
// @return: array 分類名 => 分類名, 分類名 => 分類名,,,,
// ***********************************************
function convention_Type_Array_Read( $convention_id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM convention_data';
	$sql .= '    WHERE';
	$sql .= '        convention_id = "' . $convention_id . '"';
	$res = cn_query( $sql, $cnn );
	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$type_text = cn_contract( $res, 0, 'type_text' );
			$type_array = explode( "\t", $type_text );

			$body_text = cn_contract( $res, 0, 'body_text' );
			$body_array = explode( "\t", $body_text );

			$type_cnt = count( $type_array );

			for ( $i=0;$i<$type_cnt;$i++ ) {
				$body = $body_array[$i];
				if ( mb_strlen( $body, 'UTF-8' ) > 37 ) {
					$body = mb_substr( $body, 0, 37, 'UTF-8' ) . '...';
				}
				if ($body) {
					$return_array[ $type_array[$i] ] = $type_array[$i] . ':' . $body;
				}
			}

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 大会テーブル INSERT
// ***********************************************
function convention_Data_Insert( $arr ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = 'INSERT INTO convention_data (';
		$sql .= '        conv_name,';
		$sql .= '        conv_open,';
		$sql .= '        conv_place,';
		$sql .= '        kouen_open,';
		$sql .= '        kouen_close,';
		$sql .= '        sanka_open,';
		$sql .= '        sanka_close,';
		$sql .= '        type_text,';
		$sql .= '        body_text,';
		$sql .= '        price01,';
		$sql .= '        price02,';
		$sql .= '        price03,';
		$sql .= '        view_status,';
		$sql .= '        update_dt,';
		$sql .= '        regist_dt,';
		$sql .= '        status';
		$sql .= '        ) VALUES ( ';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'conv_name' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'conv_open' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'conv_place' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_open' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_close' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'sanka_open' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'sanka_close' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'type_text' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'body_text' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'price01' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'price02' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'price03' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'view_status' ] ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        0';
		$sql .= '        )';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}

// ***********************************************
// 大会テーブル UPDATE
// ***********************************************
function convention_Data_Update( $arr ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE convention_data SET';
		$sql .= '        conv_name = "' .     mysql_real_escape_string( $arr[ 'conv_name' ] ) . '",';
		$sql .= '        conv_open = "' .     mysql_real_escape_string( $arr[ 'conv_open' ] ) . '",';
		$sql .= '        conv_place = "' .    mysql_real_escape_string( $arr[ 'conv_place' ] ) . '",';
		$sql .= '        kouen_open = "' .    mysql_real_escape_string( $arr[ 'kouen_open' ] ) . '",';
		$sql .= '        kouen_close = "' .   mysql_real_escape_string( $arr[ 'kouen_close' ] ) . '",';
		$sql .= '        sanka_open = "' .    mysql_real_escape_string( $arr[ 'sanka_open' ] ) . '",';
		$sql .= '        sanka_close = "' .   mysql_real_escape_string( $arr[ 'sanka_close' ] ) . '",';
		$sql .= '        type_text = "' .     mysql_real_escape_string( $arr[ 'type_text' ] ) . '",';
		$sql .= '        body_text = "' .     mysql_real_escape_string( $arr[ 'body_text' ] ) . '",';
		$sql .= '        price01 = "' .       mysql_real_escape_string( $arr[ 'price01' ] ) . '",';
		$sql .= '        price02 = "' .       mysql_real_escape_string( $arr[ 'price02' ] ) . '",';
		$sql .= '        price03 = "' .       mysql_real_escape_string( $arr[ 'price03' ] ) . '",';
		$sql .= '        view_status = "' .   mysql_real_escape_string( $arr[ 'view_status' ] ) . '",';
		$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . $arr[ 'convention_id' ] . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}


// ***********************************************
// 大会テーブル 表示ＯＮ
// ***********************************************
function convention_Data_View_On( $convention_id ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE convention_data SET';
		$sql .= '        view_status = 1,';
		$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . mysql_real_escape_string( $convention_id ) . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}

// ***********************************************
// 大会テーブル 表示ＯＦＦ
// ***********************************************
function convention_Data_View_Off( $convention_id ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE convention_data SET';
		$sql .= '        view_status = 0,';
		$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        convention_id = "' . mysql_real_escape_string( $convention_id ) . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}



// ***********************************************
// 大会期間のチェック
// ***********************************************
function convention_Date_Check( $chech_date = 'kouen' ) {

	// 最新の大会ID読み込み
	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM convention_data';
	$sql .= '    WHERE';
	$sql .= '        status = 0';
	$sql .= '    ORDER BY';
	$sql .= '        convention_id DESC';
	$sql .= '    LIMIT 1';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'convention_id' ]  = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'conv_name' ]      = cn_contract( $res, 0, 'conv_name' );
			$return_array[ 'conv_open' ]      = cn_contract( $res, 0, 'conv_open' );
			$return_array[ 'conv_place' ]     = cn_contract( $res, 0, 'conv_place' );
			$return_array[ 'kouen_open' ]     = cn_contract( $res, 0, 'kouen_open' );
			$return_array[ 'kouen_close' ]    = cn_contract( $res, 0, 'kouen_close' );
			$return_array[ 'sanka_open' ]     = cn_contract( $res, 0, 'sanka_open' );
			$return_array[ 'sanka_close' ]    = cn_contract( $res, 0, 'sanka_close' );
			$return_array[ 'type_text' ]      = cn_contract( $res, 0, 'type_text' );
			$return_array[ 'body_text' ]      = cn_contract( $res, 0, 'body_text' );
			$return_array[ 'price01' ]        = cn_contract( $res, 0, 'price01' );
			$return_array[ 'price02' ]        = cn_contract( $res, 0, 'price02' );
			$return_array[ 'price03' ]        = cn_contract( $res, 0, 'price03' );
			$return_array[ 'status' ]         = cn_contract( $res, 0, 'status' );
			$return_array[ 'update_dt' ]      = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]      = cn_contract( $res, 0, 'regist_dt' );

		}
	}
	db_close($cnn);


	$now_Ymd = date( 'Ymd' );
	if ( $chech_date == 'kouen' ) {
		if ( $return_array[ 'kouen_open' ] <= $now_Ymd && $return_array[ 'kouen_close' ] >= $now_Ymd ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	if ( $chech_date == 'sanka' ) {
		if ( $return_array[ 'sanka_open' ] <= $now_Ymd && $return_array[ 'sanka_close' ] >= $now_Ymd ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

// ***********************************************
// 大会テーブル MAXID
// ***********************************************
function convention_Data_Maxid_Get() {
	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$max_id = 1;
	$sql  = " SELECT max(convention_id) AS maxid FROM convention_data";
	$sql .= "    WHERE status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$max_id = cn_contract($res, 0, "maxid");
		}
	}
	db_close($cnn);

	return $max_id;

}


// ***********************************************
// 大会分類　初期設定　読込
// @return: array
// ***********************************************
function convention_Cate_Data_Read() {

	$out = array();

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM convention_cate_data";
	$sql .= " WHERE status = 0";
	$sql .= " ORDER BY convention_cate_id";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		if ($max_cnt > 0){

			// データの頁表示
			for ($i=0; $i<$max_cnt; $i++) {

				$cate_id    = cn_contract($res, $i, "convention_cate_id");

				$out['convention_cate_type' ][$i] = cn_contract($res, $i, "type");
				$out['convention_cate_body' ][$i] = cn_contract($res, $i, "body");

			}
		}
	}

	db_close($cnn);

	return $out;

}



// ***********************************************
// 大会料金　初期設定　読込
// @return: array
// ***********************************************
function convention_Price_Data_Read() {

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

				// バラして配列にして表示変数にセット
				$out[1] =  price_Apart( $price01_mixed_text );
				$out[2] =  price_Apart( $price02_mixed_text );
				$out[3] =  price_Apart( $price03_mixed_text );

			}
		}
	}

	db_close($cnn);

	return $out;

}


// ***********************************************
// 大会テーブル エラーチェック
// ***********************************************
function convention_Error_Check( $arr ) {

	$err_msg = '';


		if ( ! $arr[ 'conv_name' ] ) {
			$err_msg .= '大会名が未入力です';
			return $err_msg;
		}

	while( list( , $val ) = each( $arr[ 'p1_arr' ] ) ) {
		if ( $val == '' ) {
			$err_msg .= '料金設定で入力されていないデータがあります。';
			return $err_msg;
		}
		if ( is_Number( $val ) != '' ) {
			$err_msg .= '料金設定は半角数字のみしか入力できません。';
			return $err_msg;
		}
	}

	while( list( , $val ) = each( $arr[ 'p2_arr' ] ) ) {
		if ( $val == '' ) {
			$err_msg .= '料金設定で入力されていないデータがあります。';
			return $err_msg;
		}
		if ( is_Number( $val ) != '' ) {
			$err_msg .= '料金設定は半角数字のみしか入力できません。';
			return $err_msg;
		}
	}

	while( list( , $val ) = each( $arr[ 'p3_arr' ] ) ) {
		if ( $val == '' ) {
			$err_msg .= '料金設定で入力されていないデータがあります。';
			return $err_msg;
		}
		if ( is_Number( $val ) != '' ) {
			$err_msg .= '料金設定は半角数字のみしか入力できません。';
			return $err_msg;
		}
	}

	return $err_msg;

}


// **********************************************************************************************
// 大会ファイル管理関連
// **********************************************************************************************
/*
▼convention_File
-----------------------
file_id
convention_id
file_title
file_name
file_extension
content_type
file_view
status
update_dt
regist_dt


*/
// ***********************************************
// 大会ファイル管理テーブル IDを元にSELECT
// @return: none
// ***********************************************
function convention_File_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM convention_file_data";
	$sql .= "    WHERE";
	$sql .= "        file_id = " . $id;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'file_id' ]         = cn_contract( $res, 0, 'file_id' );
			$return_array[ 'convention_id' ]   = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'file_title' ]      = cn_contract( $res, 0, 'file_title' );
			$return_array[ 'file_name' ]       = cn_contract( $res, 0, 'file_name' );
			$return_array[ 'file_extension' ]  = cn_contract( $res, 0, 'file_extension' );
			$return_array[ 'content_type' ]  = cn_contract( $res, 0, 'content_type' );
			$return_array[ 'file_view' ]       = cn_contract( $res, 0, 'file_view' );
			$return_array[ 'update_dt' ]       = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]       = cn_contract( $res, 0, 'regist_dt' );

		}
	}

	db_close($cnn);

	return $return_array;

}


// ***********************************************
// 大会ファイル管理テーブル 自由に検索できます
// @return: array
// ***********************************************
function convention_File_Data_Read_Custom( $search_array ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	while( list( $key, $val ) = each( $search_array ) ) {
		$sql_col[] = '        ' . $key . ' = "' . mysql_real_escape_string( $val ) . '"';
	}
	$where_sql = implode( ' AND ', $sql_col );

	$sql  = "SELECT * FROM convention_file_data";
	$sql .= "    WHERE";
	$sql .= $where_sql;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'file_id' ]         = cn_contract( $res, 0, 'file_id' );
			$return_array[ 'convention_id' ]   = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'file_title' ]      = cn_contract( $res, 0, 'file_title' );
			$return_array[ 'file_name' ]       = cn_contract( $res, 0, 'file_name' );
			$return_array[ 'file_extension' ]  = cn_contract( $res, 0, 'file_extension' );
			$return_array[ 'content_type' ]  = cn_contract( $res, 0, 'content_type' );
			$return_array[ 'file_view' ]       = cn_contract( $res, 0, 'file_view' );
			$return_array[ 'update_dt' ]       = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]       = cn_contract( $res, 0, 'regist_dt' );

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 大会ファイル管理テーブル 大会IDを元にSELECT
// @return: array
// ***********************************************
function convention_File_Data_Read_By_Conv_ID( $conv_id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM convention_file_data";
	$sql .= "    WHERE";
	$sql .= "        convention_id = '" . $conv_id . "' AND";
	$sql .= "        file_view = '1' AND";
	$sql .= "        status = 0";
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			for($i=0;$i<$cnt;$i++ ) {

				$return_array[$i][ 'file_id' ]         = cn_contract( $res, $i, 'file_id' );
				$return_array[$i][ 'convention_id' ]   = cn_contract( $res, $i, 'convention_id' );
				$return_array[$i][ 'file_title' ]      = cn_contract( $res, $i, 'file_title' );
				$return_array[$i][ 'file_name' ]       = cn_contract( $res, $i, 'file_name' );
				$return_array[$i][ 'file_extension' ]  = cn_contract( $res, $i, 'file_extension' );
				$return_array[$i][ 'content_type' ]    = cn_contract( $res, $i, 'content_type' );
				$return_array[$i][ 'file_view' ]       = cn_contract( $res, $i, 'file_view' );
				$return_array[$i][ 'update_dt' ]       = cn_contract( $res, $i, 'update_dt' );
				$return_array[$i][ 'regist_dt' ]       = cn_contract( $res, $i, 'regist_dt' );
			}

		}
	}

//	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 大会ファイル管理テーブル INSERT
// @return: none
// ***********************************************
function convention_File_Data_Insert( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'INSERT INTO convention_file_data (';
	$sql .= '        convention_id,';
	$sql .= '        file_title,';
	$sql .= '        file_name,';
	$sql .= '        file_extension,';
	$sql .= '        content_type,';
	$sql .= '        file_view,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'file_title' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'file_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'file_extension' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'content_type' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'file_view' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会ファイル管理テーブル UPDATE
// @return: none
// ***********************************************
function convention_File_Data_Update( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE convention_file_data SET';

	$sql .= '        convention_id = "' . mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        file_title = "' . mysql_real_escape_string( $arr[ 'file_title' ] ) . '",';
	$sql .= '        file_name = "' . mysql_real_escape_string( $arr[ 'file_name' ] ) . '",';
	$sql .= '        file_extension = "' . mysql_real_escape_string( $arr[ 'file_extension' ] ) . '",';
	$sql .= '        content_type = "' . mysql_real_escape_string( $arr[ 'content_type' ] ) . '",';
	$sql .= '        file_view = "' . mysql_real_escape_string( $arr[ 'file_view' ] ) . '",';
	$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        file_id = "' . $arr[ 'file_id' ] . '"';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会ファイル管理テーブル 消去
// @return: none
// ***********************************************
function convention_File_Data_Delete( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE convention_file_data SET';
	$sql .= '        status = 1';
	$sql .= '    WHERE';
	$sql .= '        file_id = "' . $arr[ 'file_id' ] . '"';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会ファイル管理テーブル MAXID
// ***********************************************
function convention_File_Data_Maxid_Get() {
	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$max_id = 1;
	$sql  = " SELECT max(file_id) AS maxid FROM convention_file_data";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$max_id = cn_contract($res, 0, "maxid");
		}
	}
	db_close($cnn);

	return $max_id;

}

// ***********************************************
// 大会ファイル管理テーブル 該当ファイルを表示にする
// @return: none
// ***********************************************
function convention_File_Data_View_On( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'UPDATE convention_file_data SET';
	$sql .= '        file_view = 1,';
	$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        file_id = "' . $arr[ 'file_id' ] . '"';
	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会ファイル管理テーブル 該当ファイルを非表示にする
// @return: none
// ***********************************************
function convention_File_Data_View_Off( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'UPDATE convention_file_data SET';
	$sql .= '        file_view = 2,';
	$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        file_id = "' . $arr[ 'file_id' ] . '"';
	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会ファイル管理情報 ファイル名チェック
// ***********************************************
function convention_File_Name_error_check($file_params) {

	$err_msg = '';
	$err_flg = 1;
	
	$file_config = getFileConfigArray();
	$extension = getFileExtension( $file_params[ 'name' ] );

	while( list( $key, $val ) = each( $file_config ) ) {
		if( $extension == $key ) {
			$err_flg = 0;
		}
	}

	if ( $err_flg == 1 ) {
		$err_msg = "保存できないファイル形式です。";
		return $err_msg;
		exit;
	}

	return $err_msg;

}

// ***********************************************
// 大会ファイル管理情報エラーチェック
// ***********************************************
function convention_File_Data_Error_Check($arr, $mode) {
	
	$err_msg = '';

	// 管理画面(登録)
	// -------------------------------------------
	if ( $mode == 'admin_regist' ) {

		if ( ! $arr[ 'file_title' ] ) {
			$err_msg .= 'タイトルが未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'file_view' ] ) {
			$err_msg .= '表示設定が未選択です';
			return $err_msg;
		}

	}

	return $err_msg;
}


// **********************************************************************************************
// 大会遅延申込テーブル
// **********************************************************************************************
// ***********************************************
// 大会遅延申込テーブル、新規登録
// ***********************************************
function convention_Chien_Insert($arr) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'INSERT INTO convention_chien_data (';
	$sql .= '        convention_id,';
	$sql .= '        chien_key,';
	$sql .= '        limit_date,';
	$sql .= '        access_status,';
	$sql .= '        entry_status,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'chien_key' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'limit_date' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'access_status' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'entry_status' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);
}

// ***********************************************
// 大会遅延申込 ページアクセス処理
// ***********************************************
function convention_Chien_Access_Update($conv_id, $key_id) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE convention_chien_data SET';
	$sql .= '        access_status = 1';
	$sql .= '    WHERE';
	$sql .= '        convention_id = "' . $conv_id . '" AND';
	$sql .= '        chien_key = "' . $key_id . '"';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会遅延申込 ID確認
// ***********************************************
function convention_Chien_ID_Check($conv_id, $key_id) {

	$chien_flg = FALSE;

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM convention_chien_data';
	$sql .= '    WHERE';
	$sql .= '        chien_key = "' . $key_id . '" AND';
	$sql .= '        convention_id = "' . $conv_id . '" AND';
	$sql .= '        access_status = 0 AND';
	$sql .= '        status = 0';

	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'convention_id' ]  = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'chien_key' ]      = cn_contract( $res, 0, 'chien_key' );
			$return_array[ 'limit_date' ]     = cn_contract( $res, 0, 'limit_date' );
			$return_array[ 'access_status' ]  = cn_contract( $res, 0, 'access_status' );
			$return_array[ 'entry_status' ]   = cn_contract( $res, 0, 'entry_status' );
			$return_array[ 'status' ]         = cn_contract( $res, 0, 'status' );

			$now_Ymd = date( 'Ymd' );
			if ( $return_array[ 'limit_date' ] >= $now_Ymd ) {
				return TRUE;
			} else {
				return FALSE;
			}

		}
	}
	db_close($cnn);

	return $chien_flg;

}


// **********************************************************************************************
// 大会参加者関連
// **********************************************************************************************
/*
▼sankasya_data
-----------------------
sankasya_id
convention_id
sankasya_uid
pay_status
pay_date
pay_date_plan
pay_way
pay_way_text
pay_money
sanka_menu
pay_bill
sanka_biko1
status
system_dt
update_dt
regist_dt

▼sankasya_member_mast
-----------------------
member_id
sankasya_id
convention_id
member_userid
member_name
member_kana
member_info01
member_info02
member_kubun01
member_mail
member_zip1
member_zip2
member_address
member_tel
member_fax
intro_name
intro_info01
intro_info02
intro_zip1
intro_zip2
intro_address
intro_tel
status
system_dt
update_dt
regist_dt
*/
// ***********************************************
// 大会参加者テーブル IDを元にSELECT
// @return: none
// ***********************************************
function sankasya_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM sankasya_data";
	$sql .= "    INNER JOIN sankasya_member_mast ON";
	$sql .= "    sankasya_data.sankasya_id = sankasya_member_mast.sankasya_id";
	$sql .= "    WHERE";
	$sql .= "        sankasya_data.sankasya_id = " . $id;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'sankasya_id' ]   = cn_contract( $res, 0, 'sankasya_id' );
			$return_array[ 'convention_id' ] = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'sankasya_uid' ]  = cn_contract( $res, 0, 'sankasya_uid' );
			$return_array[ 'pay_status' ]    = cn_contract( $res, 0, 'pay_status' );
			$return_array[ 'pay_date' ]      = cn_contract( $res, 0, 'pay_date' );
			$return_array[ 'pay_date_plan' ] = cn_contract( $res, 0, 'pay_date_plan' );
			$return_array[ 'pay_way' ]       = cn_contract( $res, 0, 'pay_way' );
			$return_array[ 'pay_way_text' ]  = cn_contract( $res, 0, 'pay_way_text' );
			$return_array[ 'pay_money' ]     = cn_contract( $res, 0, 'pay_money' );
			$return_array[ 'sanka_menu' ]    = cn_contract( $res, 0, 'sanka_menu' );
			$return_array[ 'pay_bill' ]      = cn_contract( $res, 0, 'pay_bill' );
			$return_array[ 'sanka_biko1' ]   = cn_contract( $res, 0, 'sanka_biko1' );

			$return_array[ 'member_id' ]      = cn_contract( $res, 0, 'member_id' );
			$return_array[ 'member_userid' ]  = cn_contract( $res, 0, 'member_userid' );
			$return_array[ 'member_name' ]    = cn_contract( $res, 0, 'member_name' );
			$return_array[ 'member_kana' ]    = cn_contract( $res, 0, 'member_kana' );
			$return_array[ 'member_info01' ]  = cn_contract( $res, 0, 'member_info01' );
			$return_array[ 'member_info02' ]  = cn_contract( $res, 0, 'member_info02' );
			$return_array[ 'member_kubun01' ] = cn_contract( $res, 0, 'member_kubun01' );
			$return_array[ 'member_mail' ]    = cn_contract( $res, 0, 'member_mail' );
			$return_array[ 'member_zip1' ]    = cn_contract( $res, 0, 'member_zip1' );
			$return_array[ 'member_zip2' ]    = cn_contract( $res, 0, 'member_zip2' );
			$return_array[ 'member_address' ] = cn_contract( $res, 0, 'member_address' );
			$return_array[ 'member_tel' ]     = cn_contract( $res, 0, 'member_tel' );
			$return_array[ 'member_fax' ]     = cn_contract( $res, 0, 'member_fax' );
			$return_array[ 'intro_name' ]     = cn_contract( $res, 0, 'intro_name' );
			$return_array[ 'intro_info01' ]   = cn_contract( $res, 0, 'intro_info01' );
			$return_array[ 'intro_info02' ]   = cn_contract( $res, 0, 'intro_info02' );
			$return_array[ 'intro_zip1' ]     = cn_contract( $res, 0, 'intro_zip1' );
			$return_array[ 'intro_zip2' ]     = cn_contract( $res, 0, 'intro_zip2' );
			$return_array[ 'intro_address' ]  = cn_contract( $res, 0, 'intro_address' );
			$return_array[ 'intro_tel' ]      = cn_contract( $res, 0, 'intro_tel' );

		}
	}

	db_close($cnn);

	return $return_array;

}


// ***********************************************
// 参加者テーブル 自由に検索できます
// @return: array
// ***********************************************
function sankasya_Data_Read_Custom( $search_array ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	while( list( $key, $val ) = each( $search_array ) ) {
		$sql_col[] = '        ' . $key . ' = "' . mysql_real_escape_string( $val ) . '"';
	}
	$where_sql = implode( ' AND ', $sql_col );

	$sql  = "SELECT * FROM sankasya_data";
	$sql .= "    INNER JOIN sankasya_member_mast ON";
	$sql .= "    sankasya_data.sankasya_id = sankasya_member_mast.sankasya_id";
	$sql .= "    WHERE";
	$sql .= $where_sql;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'sankasya_id' ]   = cn_contract( $res, 0, 'sankasya_id' );
			$return_array[ 'convention_id' ] = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'sankasya_uid' ]  = cn_contract( $res, 0, 'sankasya_uid' );
			$return_array[ 'pay_status' ]    = cn_contract( $res, 0, 'pay_status' );
			$return_array[ 'pay_date' ]      = cn_contract( $res, 0, 'pay_date' );
			$return_array[ 'pay_date_plan' ] = cn_contract( $res, 0, 'pay_date_plan' );
			$return_array[ 'pay_way' ]       = cn_contract( $res, 0, 'pay_way' );
			$return_array[ 'pay_way_text' ]  = cn_contract( $res, 0, 'pay_way_text' );
			$return_array[ 'pay_money' ]     = cn_contract( $res, 0, 'pay_money' );
			$return_array[ 'sanka_menu' ]    = cn_contract( $res, 0, 'sanka_menu' );
			$return_array[ 'pay_bill' ]      = cn_contract( $res, 0, 'pay_bill' );
			$return_array[ 'sanka_biko1' ]   = cn_contract( $res, 0, 'sanka_biko1' );

			$return_array[ 'member_id' ]      = cn_contract( $res, 0, 'member_id' );
			$return_array[ 'member_userid' ]  = cn_contract( $res, 0, 'member_userid' );
			$return_array[ 'member_name' ]    = cn_contract( $res, 0, 'member_name' );
			$return_array[ 'member_kana' ]    = cn_contract( $res, 0, 'member_kana' );
			$return_array[ 'member_info01' ]  = cn_contract( $res, 0, 'member_info01' );
			$return_array[ 'member_info02' ]  = cn_contract( $res, 0, 'member_info02' );
			$return_array[ 'member_kubun01' ] = cn_contract( $res, 0, 'member_kubun01' );
			$return_array[ 'member_mail' ]    = cn_contract( $res, 0, 'member_mail' );
			$return_array[ 'member_zip1' ]    = cn_contract( $res, 0, 'member_zip1' );
			$return_array[ 'member_zip2' ]    = cn_contract( $res, 0, 'member_zip2' );
			$return_array[ 'member_address' ] = cn_contract( $res, 0, 'member_address' );
			$return_array[ 'member_tel' ]     = cn_contract( $res, 0, 'member_tel' );
			$return_array[ 'member_fax' ]     = cn_contract( $res, 0, 'member_fax' );
			$return_array[ 'intro_name' ]     = cn_contract( $res, 0, 'intro_name' );
			$return_array[ 'intro_info01' ]   = cn_contract( $res, 0, 'intro_info01' );
			$return_array[ 'intro_info02' ]   = cn_contract( $res, 0, 'intro_info02' );
			$return_array[ 'intro_zip1' ]     = cn_contract( $res, 0, 'intro_zip1' );
			$return_array[ 'intro_zip2' ]     = cn_contract( $res, 0, 'intro_zip2' );
			$return_array[ 'intro_address' ]  = cn_contract( $res, 0, 'intro_address' );
			$return_array[ 'intro_tel' ]      = cn_contract( $res, 0, 'intro_tel' );

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 大会参加者テーブル INSERT
// @return: none
// ***********************************************
function sankasya_Data_Insert( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sankasya_uid_max = 0;
	$sql  = " SELECT max(sankasya_uid) AS maxid FROM sankasya_data";
	$sql .= "    WHERE convention_id = '" . $arr[ 'convention_id' ] . "'";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$sankasya_uid_max = cn_contract($res, 0, "maxid");
		}
	}

	$arr[ 'sankasya_uid' ] = $sankasya_uid_max + 1;

	$sql = 'INSERT INTO sankasya_data (';
	$sql .= '        convention_id,';
	$sql .= '        sankasya_uid,';
	$sql .= '        pay_status,';
	$sql .= '        pay_date,';
	$sql .= '        pay_date_plan,';
	$sql .= '        pay_way,';
	$sql .= '        pay_way_text,';
	$sql .= '        pay_money,';
	$sql .= '        sanka_menu,';
	$sql .= '        pay_bill,';
	$sql .= '        sanka_biko1,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'sankasya_uid' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_status' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_date' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_date_plan' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_way' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_way_text' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_money' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'sanka_menu' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_bill' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'sanka_biko1' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);

	$sankasya_id_max = 0;
	$sql  = " SELECT max(sankasya_id) AS maxid FROM sankasya_data";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$sankasya_id_max = cn_contract($res, 0, "maxid");
		}
	}
	$arr[ 'sankasya_id' ] = $sankasya_id_max;

	$sql = 'INSERT INTO sankasya_member_mast (';
	$sql .= '        sankasya_id,';
	$sql .= '        convention_id,';
	$sql .= '        member_userid,';
	$sql .= '        member_name,';
	$sql .= '        member_kana,';
	$sql .= '        member_info01,';
	$sql .= '        member_info02,';
	$sql .= '        member_kubun01,';
	$sql .= '        member_mail,';
	$sql .= '        member_zip1,';
	$sql .= '        member_zip2,';
	$sql .= '        member_address,';
	$sql .= '        member_tel,';
	$sql .= '        member_fax,';
	$sql .= '        intro_name,';
	$sql .= '        intro_info01,';
	$sql .= '        intro_info02,';
	$sql .= '        intro_zip1,';
	$sql .= '        intro_zip2,';
	$sql .= '        intro_address,';
	$sql .= '        intro_tel,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'sankasya_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_userid' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kana' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info02' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kubun01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_mail' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_address' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_tel' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_fax' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_info01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_info02' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_zip1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_zip2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_address' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_tel' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

	return $arr[ 'sankasya_uid' ];

}

// ***********************************************
// 大会参加者テーブル UPDATE
// @return: none
// ***********************************************
function sankasya_Data_Update( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE sankasya_data SET';
	$sql .= '        convention_id = "' . mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        sankasya_uid = "' .  mysql_real_escape_string( $arr[ 'sankasya_uid' ] ) . '",';
	$sql .= '        pay_status = "' .    mysql_real_escape_string( $arr[ 'pay_status' ] ) . '",';
	$sql .= '        pay_date = "' .      mysql_real_escape_string( $arr[ 'pay_date' ] ) . '",';
	$sql .= '        pay_date_plan = "' . mysql_real_escape_string( $arr[ 'pay_date_plan' ] ) . '",';
	$sql .= '        pay_way = "' .       mysql_real_escape_string( $arr[ 'pay_way' ] ) . '",';
	$sql .= '        pay_way_text = "' .  mysql_real_escape_string( $arr[ 'pay_way_text' ] ) . '",';
	$sql .= '        pay_money = "' .     mysql_real_escape_string( $arr[ 'pay_money' ] ) . '",';
	$sql .= '        sanka_menu = "' .    mysql_real_escape_string( $arr[ 'sanka_menu' ] ) . '",';
	$sql .= '        pay_bill   = "' .    mysql_real_escape_string( $arr[ 'pay_bill' ] ) . '",';
	$sql .= '        sanka_biko1 = "' .   mysql_real_escape_string( $arr[ 'sanka_biko1' ] ) . '",';
	$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        sankasya_id = "' . $arr[ 'sankasya_id' ] . '"';
	$res = cn_query($sql, $cnn);

	$sql = 'UPDATE sankasya_member_mast SET';
	$sql .= '        sankasya_id = "' .    mysql_real_escape_string( $arr[ 'sankasya_id' ] ) . '",';
	$sql .= '        convention_id = "' .  mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        member_userid = "' .  mysql_real_escape_string( $arr[ 'member_userid' ] ) . '",';
	$sql .= '        member_name = "' .    mysql_real_escape_string( $arr[ 'member_name' ] ) . '",';
	$sql .= '        member_kana = "' .    mysql_real_escape_string( $arr[ 'member_kana' ] ) . '",';
	$sql .= '        member_info01 = "' .  mysql_real_escape_string( $arr[ 'member_info01' ] ) . '",';
	$sql .= '        member_info02 = "' .  mysql_real_escape_string( $arr[ 'member_info02' ] ) . '",';
	$sql .= '        member_kubun01 = "' . mysql_real_escape_string( $arr[ 'member_kubun01' ] ) . '",';
	$sql .= '        member_mail = "' .    mysql_real_escape_string( $arr[ 'member_mail' ] ) . '",';
	$sql .= '        member_zip1 = "' .    mysql_real_escape_string( $arr[ 'member_zip1' ] ) . '",';
	$sql .= '        member_zip2 = "' .    mysql_real_escape_string( $arr[ 'member_zip2' ] ) . '",';
	$sql .= '        member_address = "' . mysql_real_escape_string( $arr[ 'member_address' ] ) . '",';
	$sql .= '        member_tel = "' .     mysql_real_escape_string( $arr[ 'member_tel' ] ) . '",';
	$sql .= '        member_fax = "' .     mysql_real_escape_string( $arr[ 'member_fax' ] ) . '",';
	$sql .= '        intro_name = "' .     mysql_real_escape_string( $arr[ 'intro_name' ] ) . '",';
	$sql .= '        intro_info01 = "' .   mysql_real_escape_string( $arr[ 'intro_info01' ] ) . '",';
	$sql .= '        intro_info02 = "' .   mysql_real_escape_string( $arr[ 'intro_info02' ] ) . '",';
	$sql .= '        intro_zip1 = "' .     mysql_real_escape_string( $arr[ 'intro_zip1' ] ) . '",';
	$sql .= '        intro_zip2 = "' .     mysql_real_escape_string( $arr[ 'intro_zip2' ] ) . '",';
	$sql .= '        intro_address = "' .  mysql_real_escape_string( $arr[ 'intro_address' ] ) . '",';
	$sql .= '        intro_tel = "' .      mysql_real_escape_string( $arr[ 'intro_tel' ] ) . '",';
	$sql .= '        update_dt = "' .      date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        member_id = "' . $arr[ 'member_id' ] . '"';

	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会参加者テーブル 消去
// @return: none
// ***********************************************
function sankasya_Data_Delete( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE sankasya_data SET';
	$sql .= '        status = 1';
	$sql .= '    WHERE';
	$sql .= '        sankasya_id = "' . $arr[ 'sankasya_id' ] . '"';
	$res = cn_query($sql, $cnn);

	$sql = 'UPDATE sankasya_member_mast SET';
	$sql .= '        status = 1';
	$sql .= '    WHERE';
	$sql .= '        sankasya_id = "' . $arr[ 'sankasya_id' ] . '"';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会参加者テーブル 入金確定
// @return: none
// ***********************************************
function sankasya_Data_Pay_On( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'UPDATE sankasya_data SET';
	$sql .= '        pay_status = 2,';
	$sql .= '        pay_date = "' . mysql_real_escape_string( $arr[ 'pay_date' ] ) . '",';
	$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        sankasya_id = "' . $arr[ 'sankasya_id' ] . '"';
	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 大会参加者テーブル 入金取り消し
// @return: none
// ***********************************************
function sankasya_Data_Pay_Off( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'UPDATE sankasya_data SET';
	$sql .= '        pay_status = 1,';
	$sql .= '        pay_date = "",';
	$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        sankasya_id = "' . $arr[ 'sankasya_id' ] . '"';
	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

}


// ***********************************************
// 大会参加者テーブル フォームからの入力の調整
// @return: 調整後の配列
// ***********************************************
function sankasya_Data_Adjust($arr) {

	// 会員番号が0の場合、区分を非会員にする
	if ( $arr[ 'member_userid' ] === '0' ) {
		$arr[ 'member_kubun01' ] = 99;
	} else {
		// それ以外の場合で非会員になっている場合は正会員にする
		if ( $arr[ 'member_kubun01' ] == 99 ) {
			$arr[ 'member_kubun01' ] = 1;
		}
	}

	return $arr;
}


// ***********************************************
// 大会参加者テーブル フォームからの入力の調整
// @return: 調整後の配列
// ***********************************************
function sankasya_Data_Adjust_PC($arr) {

/*
	// 会員番号が0の場合、区分を非会員にする
	if ( $arr[ 'member_userid' ] === '0' ) {
		$arr[ 'member_kubun01' ] = 99;
	} else {
		// それ以外の場合で非会員になっている場合は正会員にする
		if ( $arr[ 'member_kubun01' ] == 99 ) {
			$arr[ 'member_kubun01' ] = 1;
		}
	}
*/

	return $arr;
}


// ***********************************************
// 参加費の計算
// @return: string: 参加費
// ***********************************************
function sankasya_Data_Calc_Price($member_kubun, $sanka_array, $conv_id ) {
	
	$pay_money = 0;

	$convention_price_array = sanka_Price_Read( $conv_id ); // 参加費読込
	$money = 0;
	if( in_array( '1', $sanka_array ) ) { $money += $convention_price_array[1][$member_kubun]; }
	if( in_array( '2', $sanka_array ) ) { $money += $convention_price_array[2][$member_kubun]; }
	if( in_array( '3', $sanka_array ) ) { $money += $convention_price_array[3][$member_kubun]; }
	$pay_money = $money;

	return $pay_money;
}

// ***********************************************
// 参加項目のテキスト化
// @return: string: 参加項目のテキストの羅列を返す
// ***********************************************
function sankasya_Data_Get_Menu_Text($sanka_array, $pay_menu_type, $separator ) {
	
	$sanka_menu_text = '';
	if ( is_array( $sanka_array ) ) {
		reset( $sanka_array );
		while( list( $key, $val ) = each( $sanka_array ) ) {
			$sanka_menu_text .= $pay_menu_type[ $val ] . $separator;
		}
	}
    print_r($sanka_array);die;
	return $sanka_menu_text;
}

// ***********************************************
// 区分別参加費の計算
// @return: array: 参加区分 => 参加費
// ***********************************************
function sankasya_Data_Make_PriceText_List($member_kubun, $conv_id, $price_name_list, $mode='with') {
	
	$moneyText_list = array();

	$price_text = array();
	$price_arr = sanka_Price_Read( $conv_id ); // 参加費読込
	
	$name_count = count($price_name_list);
	
	// 会員である場合
	if ($member_kubun != 99) {
		for($i=1;$i<=$name_count;$i++) {
			$price_text[$i] = (!$price_arr[$i][$member_kubun]) ? '無料' : $price_arr[$i][$member_kubun] . '円';
		}

	// 非会員でeach表記の場合
	} elseif ($mode=='each') {
		for($i=1;$i<=$name_count;$i++) {
			$price_text[$i] = (!$price_arr[$i][$member_kubun]) ? '無料' : $price_arr[$i][$member_kubun] . '円';
		}
	// 非会員で一括表記の場合
	} else {
		$mem_type=getMemberTypeTaikaiSankaNoLogin();
		for($i=1;$i<=$name_count;$i++) {
			$price_text[$i] = $mem_type[99] . ':';
			$price_text[$i] .= (!$price_arr[$i][99]) ? '無料' : $price_arr[$i][99] . '円';
			$price_text[$i] .= ', ' . $mem_type[5] . ':';
			$price_text[$i] .= (!$price_arr[$i][5]) ? '無料' : $price_arr[$i][5] . '円';
		}
	}
	
	for($i=1;$i<=$name_count;$i++) {
		$moneyText_list[$i] = $price_name_list[$i] . ' (' . $price_text[$i] . ')';	
	}

	return $moneyText_list;
}


// ***********************************************
// 参加者テーブル CSV保存
// @return: string: filename
// ***********************************************
function sankasya_Data_Set_CSV($convention_id, $options) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM sankasya_data";
	$sql .= "    INNER JOIN sankasya_member_mast ON";
	$sql .= "    sankasya_data.sankasya_id = sankasya_member_mast.sankasya_id";
	$sql .= "    WHERE";
	$sql .= '        sankasya_data.convention_id = "' . $convention_id . '" AND';
	$sql .= '        sankasya_data.status = 0';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			for ( $i=0;$i<$cnt;$i++ ) {


				$d[$i][ 'sankasya_id' ]   = cn_contract( $res, $i, 'sankasya_id' );
				$d[$i][ 'convention_id' ] = cn_contract( $res, $i, 'convention_id' );
				$d[$i][ 'sankasya_uid' ]  = cn_contract( $res, $i, 'sankasya_uid' );
				$d[$i][ 'pay_status' ]    = cn_contract( $res, $i, 'pay_status' );
				$d[$i][ 'pay_date' ]      = cn_contract( $res, $i, 'pay_date' );
				$d[$i][ 'pay_date_plan' ] = cn_contract( $res, $i, 'pay_date_plan' );
				$d[$i][ 'pay_way' ]       = cn_contract( $res, $i, 'pay_way' );
				$d[$i][ 'pay_way_text' ]  = cn_contract( $res, $i, 'pay_way_text' );
				$d[$i][ 'pay_money' ]     = cn_contract( $res, $i, 'pay_money' );
				$d[$i][ 'sanka_menu' ]    = cn_contract( $res, $i, 'sanka_menu' );
				$d[$i][ 'pay_bill' ]      = cn_contract( $res, $i, 'pay_bill' );
				$d[$i][ 'sanka_biko1' ]   = cn_contract( $res, $i, 'sanka_biko1' );

				$d[$i][ 'member_id' ]      = cn_contract( $res, $i, 'member_id' );
				$d[$i][ 'member_userid' ]  = cn_contract( $res, $i, 'member_userid' );
				$d[$i][ 'member_name' ]    = cn_contract( $res, $i, 'member_name' );
				$d[$i][ 'member_kana' ]    = cn_contract( $res, $i, 'member_kana' );
				$d[$i][ 'member_info01' ]  = cn_contract( $res, $i, 'member_info01' );
				$d[$i][ 'member_info02' ]  = cn_contract( $res, $i, 'member_info02' );
				$d[$i][ 'member_kubun01' ] = cn_contract( $res, $i, 'member_kubun01' );
				$d[$i][ 'member_mail' ]    = cn_contract( $res, $i, 'member_mail' );
				$d[$i][ 'member_zip1' ]    = cn_contract( $res, $i, 'member_zip1' );
				$d[$i][ 'member_zip2' ]    = cn_contract( $res, $i, 'member_zip2' );
				$d[$i][ 'member_address' ] = cn_contract( $res, $i, 'member_address' );
				$d[$i][ 'member_tel' ]     = cn_contract( $res, $i, 'member_tel' );
				$d[$i][ 'member_fax' ]     = cn_contract( $res, $i, 'member_fax' );
				$d[$i][ 'intro_name' ]     = cn_contract( $res, $i, 'intro_name' );
				$d[$i][ 'intro_info01' ]   = cn_contract( $res, $i, 'intro_info01' );
				$d[$i][ 'intro_info02' ]   = cn_contract( $res, $i, 'intro_info02' );
				$d[$i][ 'intro_zip1' ]     = cn_contract( $res, $i, 'intro_zip1' );
				$d[$i][ 'intro_zip2' ]     = cn_contract( $res, $i, 'intro_zip2' );
				$d[$i][ 'intro_address' ]  = cn_contract( $res, $i, 'intro_address' );
				$d[$i][ 'intro_tel' ]      = cn_contract( $res, $i, 'intro_tel' );

				// データ整形
				$d[$i]['member_kubun01_text'] = $options['member_kubun'][$d[$i][ 'member_kubun01' ]];
				$d[$i]['member_zip']          = $d[$i][ 'member_zip1' ] . ' - ' . $d[$i][ 'member_zip2' ];
				$d[$i]['intro_zip']           = $d[$i][ 'intro_zip1' ] . ' - ' . $d[$i][ 'intro_zip2' ];
				$d[$i]['pay_status_text']     = $options['pay_status'][$d[$i][ 'pay_status' ]];
				$d[$i]['pay_date_text']       = date_Format_1( $d[$i][ 'pay_date' ] );
				$d[$i]['pay_date_plan_text']  = date_Format_1( $d[$i][ 'pay_date_plan' ] );
				$d[$i]['pay_way_type_text']   = $options['pay_way'][$d[$i][ 'pay_way' ]];
				$d[$i]['pay_bill_text']       = $options['pay_bill'][$d[$i][ 'pay_bill' ]];

				// 参加項目テキスト生成
				$sanka_menu_array = explode( ",", $d[$i][ 'sanka_menu' ] );
				$d[$i]['sanka_menu_text'] = sankasya_Data_Get_Menu_Text(
								$sanka_array   = $sanka_menu_array,
								$pay_menu_type = $options['pay_menu'],
								$separator     = '　'
				);
                print_r($d[$i]['sanka_menu_text']);die;
				// 参加費の計算
				$d[$i]['pay_money'] = sankasya_Data_Calc_Price(
								$member_kubun = $d[$i][ 'member_kubun01' ],
								$sanka_array  = $sanka_menu_array,
								$conv_id      = $convention_id
				);

			}
		}
	}

	db_close( $cnn );

	// エクセルインポート
	$excel = new PHPExcel();

	// 各種設定
	$save_dir  = '../../csv/';
	$file_name = 'convention_sankasya_data.xls';

	// シートの設定   
	$excel->setActiveSheetIndex(0);
	$sheet = $excel->getActiveSheet();
	$sheet->setTitle('Sheet1');

	$line_cnf_array = array(

		array( 'title' => '参加者番号',       'data_id' => 'sankasya_uid' ),
		array( 'title' => '参加者氏名',       'data_id' => 'member_name' ),
		array( 'title' => '参加者フリガナ',   'data_id' => 'member_kana' ),
		array( 'title' => '会員区分',         'data_id' => 'member_kubun01_text' ),
		array( 'title' => '会員番号',         'data_id' => 'member_userid' ),
		array( 'title' => 'メールアドレス',   'data_id' => 'member_mail' ),
		array( 'title' => '郵便番号',         'data_id' => 'member_zip' ),
		array( 'title' => '住所',             'data_id' => 'member_address' ),
		array( 'title' => '電話番号',         'data_id' => 'member_tel' ),
		array( 'title' => 'FAX番号',          'data_id' => 'member_fax' ),
		array( 'title' => '所属1',            'data_id' => 'member_info01' ),
		array( 'title' => '所属2',            'data_id' => 'member_info02' ),
		array( 'title' => '参加項目',         'data_id' => 'sanka_menu_text' ),
		array( 'title' => '参加費',           'data_id' => 'pay_money' ),
		array( 'title' => '支払い方法',       'data_id' => 'pay_way_type_text' ),
		array( 'title' => '支払い方法(その他', 'data_id' => 'pay_way_text' ),
		array( 'title' => '送金予定日',       'data_id' => 'pay_date_plan_text' ),
		array( 'title' => '備考',             'data_id' => 'sanka_biko1' ),
		array( 'title' => '入金',             'data_id' => 'pay_status_text' ),
		array( 'title' => '入金日',           'data_id' => 'pay_date_text' ),

	);

	$line_id_array = array(
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
		'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
	);

	// タイトル行挿入
	$line_cnt = count( $line_cnf_array );
	for ( $i=0;$i<$line_cnt;$i++ ) {
		$col = 1;
		$line_id = $line_id_array[$i];

		$cell  = $line_id . $col;
		$value = $line_cnf_array[$i]['title'];

		$sheet->setCellValue( $cell, $value);
	}

	// データ抽出
	$data_cnt = count( $d );
	for($i=0;$i<$data_cnt;$i++ ) {

		$col = $i+2;

		for ( $j=0;$j<$line_cnt;$j++ ) {

			$line_id = $line_id_array[$j];
			$data_id = $line_cnf_array[$j]['data_id'];

			$cell = $line_id. $col;
			$value = $d[$i][$data_id];

			$sheet->setCellValue($cell,$value);
		}

	}

	// Excel2003形式で保存する
	$writer = PHPExcel_IOFactory::createWriter($excel, "Excel5");
	$writer->save( $save_dir . $file_name );

	return $file_name;

}



// ***********************************************
// 大会参加者テーブル メール送信
// ***********************************************
function sankasya_Data_Send_Mail( $arr, $options, $mode) {

	// ================================
	// メールメイン部分整形
	// ================================
	$mail_main_text = <<<EOD

-------------------------------
■参加者情報
-------------------------------

[受付番号]
{$arr['sankasya_uid']}

[会員区分]
{$options['member_kubun'][ $arr['member_kubun01'] ]}

[会員番号]
{$arr[ 'member_userid' ]}

[氏名]
{$arr['member_name']}

[カナ]
{$arr['member_kana']}

[メールアドレス]
{$arr['member_mail']}

[勤務先/学校名・所属]
{$arr['member_info01']} / {$arr['member_info02']}

[電話番号]
{$arr['member_tel']}

[FAX番号]
{$arr['member_fax']}

[勤務先/学校名 住所]
〒{$arr['member_zip1']}-{$arr['member_zip2']}
{$arr['member_address']}

-------------------------------
■入金・参加情報
-------------------------------
[参加項目]
{$arr['sanka_menu_text']}

[参加費]
{$arr['pay_money_list']}
----------------------
合計：{$arr['pay_money']}円

[送金予定日]
{$arr['pay_date_plan_format']}

[支払方法]
{$options['pay_way'][$arr['pay_way']]}

[備考]
{$arr['sanka_biko1']}

EOD;
//[請求書希望]
//{$options['pay_bill'][$arr['pay_bill']]}

/*
 * 
[参加項目]
{$arr['sanka_menu_text']}
[参加費]
{$arr['pay_money']}円

-------------------------------
■紹介者情報
-------------------------------
[紹介者名]
{$arr['intro_name']}

[紹介者所属]
{$arr['intro_info01']} / {$arr['intro_info02']}

[紹介者住所]
〒 {$arr['intro_zip1']} - {$arr['intro_zip2']}
{$arr['intro_address']}

[紹介者電話番号]
{$arr['intro_tel']}*/




	// ================================
	// 署名読み込み
	// ================================
	$mail_assign = get_Mail_Assign();


	// ================================
	// 表画面からの登録
	// ================================
	if ( $mode == 'pc_regist' ) {

		// 管理者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'conv_name' ] . ' 参加申込受付メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_SYSTEM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

{$arr[ 'conv_name' ]} 参加申込がありました。

以下【登録】された内容です。

{$mail_main_text}

-------------------------------
■その他の情報

[ログイン状況]
{$options['member_login'][ $arr[ 'login_flg' ] ]}


{$mail_assign}

EOD;

		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

		$mail_data = array();


		// 申込者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'conv_name' ] . ' 参加申込受付メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = $arr[ 'member_mail' ]; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

{$arr[ 'member_name' ]}様

{$arr[ 'conv_name' ]} 参加申込を受付ました。
参加費合計金額は，受付番号を明記の上，１週間以内に必ず送金してください。

※参加費のご送金に当たっては，手数料が一番安い郵便振替のご利用をおすすめします。
郵便局に備え付けの郵便振替用紙に，
　口座番号：00100-3-66805
　加入者名：一般社団法人軽金属学会
とご記入の上，通信欄に受付番号を必ず記入してご送金下さい。

※銀行振込をご利用の場合は，振込者欄に受付番号と申込者の個人名を入れてください。
　振込先：三井住友銀行　銀座支店　普通　口座番号1530334
　口座名義：一般社団法人軽金属学会

以下【登録】された内容です。


{$mail_main_text}


{$mail_assign}


EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

	}


	// ================================
	// 表画面からの編集
	// ================================
	if ( $mode == 'pc_modify' ) {

		// 管理者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'conv_name' ] . ' 参加内容編集メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_SYSTEM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

{$arr[ 'conv_name' ]} 参加内容編集がありました。

以下【編集】された内容です。

{$mail_main_text}

-------------------------------
■その他の情報

[ログイン状況]
{$options['member_login'][ $arr[ 'login_flg' ] ]}


{$mail_assign}


EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

		$mail_data = array();


		// 申込者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'conv_name' ] . ' 参加内容編集メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = $arr[ 'member_mail' ]; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

{$arr[ 'member_name' ]}様

{$arr[ 'conv_name' ]} 参加内容編集を受け付けました。

以下 【編集】された内容です。


【参加費用】の記載もありますので、
ご確認ください。


{$mail_main_text}


{$mail_assign}



EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

	}

}


// ***********************************************
// 参加者情報テーブル 同じ大会での参加者の存在チェック（会員番号で判断）
// @return: TRUE:存在する FALSE:存在しない
// ***********************************************
function sankasya_Data_Userid_Double_Check( $userid, $convention_id ) {

	$flg = FALSE;

	// 非会員以外を判別
	if ( $userid > 0 ) {
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = 'SELECT * FROM sankasya_data';
		$sql .= '    INNER JOIN sankasya_member_mast ON';
		$sql .= '    sankasya_data.sankasya_id = sankasya_member_mast.sankasya_id';
		$sql .= '    WHERE';
		$sql .= '        sankasya_data.convention_id = "' . $convention_id . '" AND';
		$sql .= '        sankasya_member_mast.member_userid = "' . $userid . '" AND';
		$sql .= '        sankasya_data.status = 0';
		$res = cn_query( $sql, $cnn );

		if ( $res == true ) {
			$cnt = cn_count( $res );
			if ( $cnt > 0 ) {

				$flg = TRUE;

			}
		}

//		db_close($cnn);

	}

	return $flg;

}


// ***********************************************
// 参加者情報エラーチェック
// ***********************************************
function sankasya_Data_Error_Check($arr, $mode) {
	
	$err_msg = '';

	// 管理画面(登録)
	// -------------------------------------------
	if ( $mode == 'admin_regist' ) {


		if ( $arr[ 'member_userid' ] !== '0' ) {

			if ( ! $arr[ 'member_userid' ] ) {
				$err_msg .= '参加者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'member_userid' ] ) ) {
				$err_msg .= '参加者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'member_userid' ] ) > 6 || strlen( $arr[ 'member_userid' ] ) < 4) {
				$err_msg .= '参加者の会員番号は4～6文字で決定してください';
				return $err_msg;
			}

			if ( sankasya_Data_Userid_Double_Check( $arr['member_userid'], $arr['convention_id'] ) ) {
				$err_msg .= '同じ会員番号で参加申込されています。ひとり、１枠しか参加申込できません。ああ';
				return $err_msg;
			}

		}


		if ( ! $arr[ 'member_name' ] ) {
			$err_msg .= '参加者の名前が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'member_mail' ] ) {
			$err_msg .= '参加者のメールアドレスが未入力です';
			return $err_msg;
		}

		if ( is_Mail( $arr[ 'member_mail' ] ) ) {
			$err_msg .= '参加者のメールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
			return $err_msg;
		}

		if ( $arr[ 'member_tel' ] ) {
			if ( is_Tell( $arr[ 'member_tel' ] ) ) {
				$err_msg .= '参加者の電話番号は' . is_Tell( $arr[ 'member_tel' ] );
				return $err_msg;
			}
		}

		if ( $arr[ 'member_zip1' ] ) {
			if ( is_Number( $arr[ 'member_zip1' ] ) ) {
				$err_msg .= '参加者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
				$err_msg .= '参加者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'member_zip2' ] ) {
			if ( is_Number( $arr[ 'member_zip2' ] ) ) {
				$err_msg .= '参加者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
				$err_msg .= '参加者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( ! $arr[ 'member_kubun01' ] ) {
			$err_msg .= '参加者の会員区分が選択されていません';
			return $err_msg;
		}

		if ( $arr[ 'intro_zip1' ] ) {
			if ( is_Number( $arr[ 'intro_zip1' ] ) ) {
				$err_msg .= '紹介者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip1' ] ) > 3 ) {
				$err_msg .= '紹介者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_zip2' ] ) {
			if ( is_Number( $arr[ 'intro_zip2' ] ) ) {
				$err_msg .= '紹介者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip2' ] ) > 4 ) {
				$err_msg .= '紹介者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_tel' ] ) {
			if ( is_Tell( $arr[ 'intro_tel' ] ) ) {
				$err_msg .= '紹介者の電話番号は' . is_Tell( $arr[ 'intro_tel' ] );
				return $err_msg;
			}
		}

		if ( ! $arr[ 'sanka_menu' ] ) {
			$err_msg .= '参加項目が未選択です';
			return $err_msg;
		}

	}

	// 管理画面(編集)
	// -------------------------------------------
	if ( $mode == 'admin_modify' ) {
		if ( $arr[ 'member_userid' ] !== '0' ) {

			if ( ! $arr[ 'member_userid' ] ) {
				$err_msg .= '参加者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'member_userid' ] ) ) {
				$err_msg .= '参加者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'member_userid' ] ) > 6 || strlen( $arr[ 'member_userid' ] ) < 4) {
				$err_msg .= '参加者の会員番号は4～6文字で決定してください';
				return $err_msg;
			}

			// 会員番号の重複を避ける(同じ会員番号の場合は通す）
			if ( $arr['old_member_userid'] != $arr['member_userid'] ) {
				if ( sankasya_Data_Userid_Double_Check( $arr['member_userid'], $arr['convention_id'] ) ) {
					$err_msg .= '同じ会員番号で参加申込されています。ひとり、１枠しか参加申込できません。いい';
					return $err_msg;
				}
			}

		}

		if ( ! $arr[ 'member_name' ] ) {
			$err_msg .= '参加者の名前が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'member_mail' ] ) {
			$err_msg .= '参加者のメールアドレスが未入力です';
			return $err_msg;
		}

		if ( is_Mail( $arr[ 'member_mail' ] ) ) {
			$err_msg .= '参加者のメールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
			return $err_msg;
		}

		if ( $arr[ 'member_tel' ] ) {
			if ( is_Tell( $arr[ 'member_tel' ] ) ) {
				$err_msg .= '参加者の電話番号は' . is_Tell( $arr[ 'member_tel' ] );
				return $err_msg;
			}
		}

		if ( $arr[ 'member_zip1' ] ) {
			if ( is_Number( $arr[ 'member_zip1' ] ) ) {
				$err_msg .= '参加者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
				$err_msg .= '参加者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'member_zip2' ] ) {
			if ( is_Number( $arr[ 'member_zip2' ] ) ) {
				$err_msg .= '参加者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
				$err_msg .= '参加者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( ! $arr[ 'member_kubun01' ] ) {
			$err_msg .= '参加者の会員区分が選択されていません';
			return $err_msg;
		}

		if ( $arr[ 'intro_zip1' ] ) {
			if ( is_Number( $arr[ 'intro_zip1' ] ) ) {
				$err_msg .= '紹介者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip1' ] ) > 3 ) {
				$err_msg .= '紹介者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_zip2' ] ) {
			if ( is_Number( $arr[ 'intro_zip2' ] ) ) {
				$err_msg .= '紹介者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip2' ] ) > 4 ) {
				$err_msg .= '紹介者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_tel' ] ) {
			if ( is_Tell( $arr[ 'intro_tel' ] ) ) {
				$err_msg .= '紹介者の電話番号は' . is_Tell( $arr[ 'intro_tel' ] );
				return $err_msg;
			}
		}

		if ( ! $arr[ 'sanka_menu' ] ) {
			$err_msg .= '参加項目が未選択です';
			return $err_msg;
		}
	}


	// 表画面(登録)
	// -------------------------------------------
	if ( $mode == 'pc_regist' ) {

		if ( ! $arr[ 'member_kubun01' ] ) {
			$err_msg .= '参加者の会員区分が選択されていません';
			return $err_msg;
		}

		if ( $arr[ 'member_userid' ] !== '0' ) {

			if ( ! $arr[ 'member_userid' ] ) {
				$err_msg .= '参加者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'member_userid' ] ) ) {
				$err_msg .= '参加者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'member_userid' ] ) > 6 || strlen( $arr[ 'member_userid' ] ) < 4) {
				$err_msg .= '参加者の会員番号は4～6文字で決定してください';
				return $err_msg;
			}

			if ( sankasya_Data_Userid_Double_Check( $arr['member_userid'], $arr['convention_id'] ) ) {
				$err_msg .= '同じ会員番号で参加申込されています。ひとり、１枠しか申込できません。<br />ログインされている方は参加申込内容編集ページお進みください。<br />ログインしていない方はログイン後に参加申込内容編集ページで編集してください。';
				return $err_msg;
			}

		}

		if ( ! $arr[ 'member_name' ] ) {
			$err_msg .= '参加者の名前が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'member_mail' ] ) {
			$err_msg .= '参加者のメールアドレスが未入力です';
			return $err_msg;
		}

		if ( is_Mail( $arr[ 'member_mail' ] ) ) {
			$err_msg .= '参加者のメールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
			return $err_msg;
		}

		if ( ! $arr[ 'member_tel' ] ) {
			$err_msg .= '参加者の電話番号が入力されていません';
			return $err_msg;
		}
		if ( is_Tell( $arr[ 'member_tel' ] ) ) {
			$err_msg .= '参加者の電話番号は' . is_Tell( $arr[ 'member_tel' ] );
			return $err_msg;
		}

		if ( ! $arr[ 'member_zip1' ] ) {
			$err_msg .= '参加者の郵便番号1が入力されていません';
			return $err_msg;
		}
		if ( is_Number( $arr[ 'member_zip1' ] ) ) {
			$err_msg .= '参加者の郵便番号1は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
			$err_msg .= '参加者の郵便番号1は3桁までしか入力できません';
			return $err_msg;
		}

		if ( ! $arr[ 'member_zip2' ] ) {
			$err_msg .= '参加者の郵便番号2が入力されていません';
			return $err_msg;
		}
		if ( is_Number( $arr[ 'member_zip2' ] ) ) {
			$err_msg .= '参加者の郵便番号2は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
			$err_msg .= '参加者の郵便番号2は4桁までしか入力できません';
			return $err_msg;
		}



		if ( ! $arr[ 'sanka_menu' ] ) {
			$err_msg .= '参加項目が未選択です';
			return $err_msg;
		}

		if ( $arr[ 'intro_zip1' ] ) {
			if ( is_Number( $arr[ 'intro_zip1' ] ) ) {
				$err_msg .= '紹介者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip1' ] ) > 3 ) {
				$err_msg .= '紹介者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_zip2' ] ) {
			if ( is_Number( $arr[ 'intro_zip2' ] ) ) {
				$err_msg .= '紹介者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip2' ] ) > 4 ) {
				$err_msg .= '紹介者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_tel' ] ) {
			if ( is_Tell( $arr[ 'intro_tel' ] ) ) {
				$err_msg .= '紹介者の電話番号は' . is_Tell( $arr[ 'intro_tel' ] );
				return $err_msg;
			}
		}
	}



	// 表画面(編集)
	// -------------------------------------------
	if ( $mode == 'pc_modify' ) {


		if ( ! $arr[ 'member_tel' ] ) {
			$err_msg .= '参加者の電話番号が入力されていません';
			return $err_msg;
		}
		if ( is_Tell( $arr[ 'member_tel' ] ) ) {
			$err_msg .= '参加者の電話番号は' . is_Tell( $arr[ 'member_tel' ] );
			return $err_msg;
		}

		if ( ! $arr[ 'member_zip1' ] ) {
			$err_msg .= '参加者の郵便番号1が入力されていません';
			return $err_msg;
		}
		if ( is_Number( $arr[ 'member_zip1' ] ) ) {
			$err_msg .= '参加者の郵便番号1は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
			$err_msg .= '参加者の郵便番号1は3桁までしか入力できません';
			return $err_msg;
		}

		if ( ! $arr[ 'member_zip2' ] ) {
			$err_msg .= '参加者の郵便番号2が入力されていません';
			return $err_msg;
		}
		if ( is_Number( $arr[ 'member_zip2' ] ) ) {
			$err_msg .= '参加者の郵便番号2は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
			$err_msg .= '参加者の郵便番号2は4桁までしか入力できません';
			return $err_msg;
		}



		if ( ! $arr[ 'sanka_menu' ] ) {
			$err_msg .= '参加項目が未選択です';
			return $err_msg;
		}

		if ( $arr[ 'intro_zip1' ] ) {
			if ( is_Number( $arr[ 'intro_zip1' ] ) ) {
				$err_msg .= '紹介者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip1' ] ) > 3 ) {
				$err_msg .= '紹介者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_zip2' ] ) {
			if ( is_Number( $arr[ 'intro_zip2' ] ) ) {
				$err_msg .= '紹介者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip2' ] ) > 4 ) {
				$err_msg .= '紹介者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_tel' ] ) {
			if ( is_Tell( $arr[ 'intro_tel' ] ) ) {
				$err_msg .= '紹介者の電話番号は' . is_Tell( $arr[ 'intro_tel' ] );
				return $err_msg;
			}
		}
	}



	return $err_msg;
}




// **********************************************************************************************
// 講演申し込み関連
// **********************************************************************************************
/*

▼kouensya_data
-----------------------
kouen_id
convention_id
kouen_uid
kouen_type
kouen_keishiki
kouen_hapyo_uid
kouen_userid
kouen_name
kouen_info01
kouen_title
kouen_title_eng
kouen_cmnt1
kouen_mail
kouen_tel
kouen_fax
kouen_zip1
kouen_zip2
kouen_address
kouen_kubun01
kouen_send_name
pay_status
pay_date
pay_way
kouen_biko1
status
system_dt
update_dt
regist_dt

▼kouensya_member_mast
-----------------------
member_id
kouen_id
member_uid
member_userid
member_hapyo
member_name
member_name_eng
member_info01
member_kubun01
status
system_dt
update_dt
regist_dt

*/
// ***********************************************
// 講演者テーブル IDを元にSELECT
// ***********************************************
function kouensya_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM kouensya_data';
	$sql .= '    WHERE';
	$sql .= '        kouen_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'kouen_id' ]        = cn_contract( $res, 0, 'kouen_id' );
			$return_array[ 'convention_id' ]   = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'kouen_uid' ]       = cn_contract( $res, 0, 'kouen_uid' );
			$return_array[ 'kouen_type' ]      = cn_contract( $res, 0, 'kouen_type' );
			$return_array[ 'kouen_keishiki' ]  = cn_contract( $res, 0, 'kouen_keishiki' );
			$return_array[ 'kouen_head' ]      = cn_contract( $res, 0, 'kouen_head' );
			$return_array[ 'kouen_section_head' ]  = cn_contract( $res, 0, 'kouen_section_head' );
			$return_array[ 'kouen_section_head_1' ]  = cn_contract( $res, 0, 'kouen_section_head_1' );
			$return_array[ 'kouen_section_head_2' ]  = cn_contract( $res, 0, 'kouen_section_head_2' );
			$return_array[ 'kouen_section_head_3' ]  = cn_contract( $res, 0, 'kouen_section_head_3' );
			$return_array[ 'kouen_section_head_4' ]  = cn_contract( $res, 0, 'kouen_section_head_4' );
			$return_array[ 'kouen_section_head_5' ]  = cn_contract( $res, 0, 'kouen_section_head_5' );
			$return_array[ 'kouen_hapyo_uid' ] = cn_contract( $res, 0, 'kouen_hapyo_uid' );
			$return_array[ 'kouen_userid' ]    = cn_contract( $res, 0, 'kouen_userid' );
			$return_array[ 'kouen_name' ]      = cn_contract( $res, 0, 'kouen_name' );
			$return_array[ 'kouen_info01' ]    = cn_contract( $res, 0, 'kouen_info01' );
			$return_array[ 'kouen_title' ]     = cn_contract( $res, 0, 'kouen_title' );
			$return_array[ 'kouen_title_eng' ] = cn_contract( $res, 0, 'kouen_title_eng' );
			$return_array[ 'kouen_cmnt1' ]     = cn_contract( $res, 0, 'kouen_cmnt1' );
			$return_array[ 'kouen_mail' ]      = cn_contract( $res, 0, 'kouen_mail' );
			$return_array[ 'kouen_tel' ]       = cn_contract( $res, 0, 'kouen_tel' );
			$return_array[ 'kouen_fax' ]       = cn_contract( $res, 0, 'kouen_fax' );
			$return_array[ 'kouen_zip1' ]      = cn_contract( $res, 0, 'kouen_zip1' );
			$return_array[ 'kouen_zip2' ]      = cn_contract( $res, 0, 'kouen_zip2' );
			$return_array[ 'kouen_address' ]   = cn_contract( $res, 0, 'kouen_address' );
			$return_array[ 'kouen_kubun01' ]   = cn_contract( $res, 0, 'kouen_kubun01' );
			$return_array[ 'kouen_send_name' ] = cn_contract( $res, 0, 'kouen_send_name' );
			$return_array[ 'pay_status' ]      = cn_contract( $res, 0, 'pay_status' );
			$return_array[ 'pay_date' ]        = cn_contract( $res, 0, 'pay_date' );
			$return_array[ 'pay_way' ]         = cn_contract( $res, 0, 'pay_way' );
			$return_array[ 'kouen_biko1' ]     = cn_contract( $res, 0, 'kouen_biko1' );
			$return_array[ 'status' ]          = cn_contract( $res, 0, 'status' );
			$return_array[ 'update_dt' ]       = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]       = cn_contract( $res, 0, 'regist_dt' );

			$sql = 'SELECT * FROM kouensya_member_mast';
			$sql .= '    WHERE';
			$sql .= '        kouen_id = "' . $id . '" AND';
			$sql .= '        status = 0';
			$sql .= '    ORDER BY';
			$sql .= '        member_uid';
			$res2 = cn_query( $sql, $cnn );
			if ( $res2 == TRUE ) {
				$cnt2 = cn_count( $res2 );
				if( $cnt2 > 0 ) {
					for ( $j=0;$j<$cnt2;$j++ ) {

						$member_uid      = cn_contract( $res2, $j, 'member_uid' );
						$view_id = $member_uid - 1;

						$return_array[ 'member_id' ][$view_id]       = cn_contract( $res2, $j, 'member_id' );
						$return_array[ 'member_uid' ][$view_id]      = cn_contract( $res2, $j, 'member_uid' );
						$return_array[ 'member_userid' ][$view_id]   = cn_contract( $res2, $j, 'member_userid' );
						$return_array[ 'member_hapyo' ][$view_id]    = cn_contract( $res2, $j, 'member_hapyo' );
						$return_array[ 'member_name' ][$view_id]     = cn_contract( $res2, $j, 'member_name' );
						$return_array[ 'member_name_eng' ][$view_id] = cn_contract( $res2, $j, 'member_name_eng' );
						$return_array[ 'member_info01' ][$view_id]   = cn_contract( $res2, $j, 'member_info01' );
						$return_array[ 'member_kubun01' ][$view_id]  = cn_contract( $res2, $j, 'member_kubun01' );
					}
				}
			}


		}
	}

	db_close($cnn);

	return $return_array;

}


// ***********************************************
// 講演者テーブル 自由検索対応
// ***********************************************
function kouensya_Read_Custom( $search_array ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	while( list( $key, $val ) = each( $search_array ) ) {
		$sql_col[] = '        ' . $key . ' = "' . mysql_real_escape_string( $val ) . '"';
	}
	$where_sql = implode( ' AND ', $sql_col );

	$sql = 'SELECT * FROM kouensya_data';
	$sql .= '    WHERE';
	$sql .= $where_sql;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'kouen_id' ]        = cn_contract( $res, 0, 'kouen_id' );
			$return_array[ 'convention_id' ]   = cn_contract( $res, 0, 'convention_id' );
			$return_array[ 'kouen_uid' ]       = cn_contract( $res, 0, 'kouen_uid' );
			$return_array[ 'kouen_type' ]      = cn_contract( $res, 0, 'kouen_type' );
			$return_array[ 'kouen_head' ]  = cn_contract( $res, 0, 'kouen_head' );
			$return_array[ 'kouen_section_head' ]  = cn_contract( $res, 0, 'kouen_section_head' );
			$return_array[ 'kouen_section_head_1' ]  = cn_contract( $res, 0, 'kouen_section_head_1' );
			$return_array[ 'kouen_section_head_2' ]  = cn_contract( $res, 0, 'kouen_section_head_2' );
			$return_array[ 'kouen_section_head_3' ]  = cn_contract( $res, 0, 'kouen_section_head_3' );
			$return_array[ 'kouen_section_head_4' ]  = cn_contract( $res, 0, 'kouen_section_head_4' );
			$return_array[ 'kouen_section_head_5' ]  = cn_contract( $res, 0, 'kouen_section_head_5' );
			$return_array[ 'kouen_hapyo_uid' ] = cn_contract( $res, 0, 'kouen_hapyo_uid' );
			$return_array[ 'kouen_userid' ]    = cn_contract( $res, 0, 'kouen_userid' );
			$return_array[ 'kouen_name' ]      = cn_contract( $res, 0, 'kouen_name' );
			$return_array[ 'kouen_info01' ]    = cn_contract( $res, 0, 'kouen_info01' );
			$return_array[ 'kouen_title' ]     = cn_contract( $res, 0, 'kouen_title' );
			$return_array[ 'kouen_title_eng' ] = cn_contract( $res, 0, 'kouen_title_eng' );
			$return_array[ 'kouen_cmnt1' ]     = cn_contract( $res, 0, 'kouen_cmnt1' );
			$return_array[ 'kouen_mail' ]      = cn_contract( $res, 0, 'kouen_mail' );
			$return_array[ 'kouen_tel' ]       = cn_contract( $res, 0, 'kouen_tel' );
			$return_array[ 'kouen_fax' ]       = cn_contract( $res, 0, 'kouen_fax' );
			$return_array[ 'kouen_zip1' ]      = cn_contract( $res, 0, 'kouen_zip1' );
			$return_array[ 'kouen_zip2' ]      = cn_contract( $res, 0, 'kouen_zip2' );
			$return_array[ 'kouen_address' ]   = cn_contract( $res, 0, 'kouen_address' );
			$return_array[ 'kouen_kubun01' ]   = cn_contract( $res, 0, 'kouen_kubun01' );
			$return_array[ 'kouen_send_name' ] = cn_contract( $res, 0, 'kouen_send_name' );
			$return_array[ 'pay_status' ]      = cn_contract( $res, 0, 'pay_status' );
			$return_array[ 'pay_date' ]        = cn_contract( $res, 0, 'pay_date' );
			$return_array[ 'pay_way' ]         = cn_contract( $res, 0, 'pay_way' );
			$return_array[ 'kouen_biko1' ]     = cn_contract( $res, 0, 'kouen_biko1' );
			$return_array[ 'status' ]          = cn_contract( $res, 0, 'status' );
			$return_array[ 'update_dt' ]       = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]       = cn_contract( $res, 0, 'regist_dt' );

			$sql = 'SELECT * FROM kouensya_member_mast';
			$sql .= '    WHERE';
			$sql .= '        kouen_id = "' . $return_array[ 'kouen_id' ] . '" AND';
			$sql .= '        status = 0';
			$sql .= '    ORDER BY';
			$sql .= '        member_uid';
			$res2 = cn_query( $sql, $cnn );
			if ( $res2 == TRUE ) {
				$cnt2 = cn_count( $res2 );
				if( $cnt2 > 0 ) {
					for ( $j=0;$j<$cnt2;$j++ ) {

						$member_uid      = cn_contract( $res2, $j, 'member_uid' );
						$view_id = $member_uid - 1;

						$return_array[ 'member_id' ][$view_id]       = cn_contract( $res2, $j, 'member_id' );
						$return_array[ 'member_uid' ][$view_id]      = cn_contract( $res2, $j, 'member_uid' );
						$return_array[ 'member_userid' ][$view_id]   = cn_contract( $res2, $j, 'member_userid' );
						$return_array[ 'member_hapyo' ][$view_id]    = cn_contract( $res2, $j, 'member_hapyo' );
						$return_array[ 'member_name' ][$view_id]     = cn_contract( $res2, $j, 'member_name' );
						$return_array[ 'member_name_eng' ][$view_id] = cn_contract( $res2, $j, 'member_name_eng' );
						$return_array[ 'member_info01' ][$view_id]   = cn_contract( $res2, $j, 'member_info01' );
						$return_array[ 'member_kubun01' ][$view_id]  = cn_contract( $res2, $j, 'member_kubun01' );
					}
				}
			}


		}
	}

	db_close($cnn);

	return $return_array;

}


// ***********************************************
// 講演者テーブル useridを元にSELECT
// @return: array
// ***********************************************
function kouensya_Read_By_UserID( $userid, $convention_id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM kouensya_data';
	$sql .= '    WHERE';
	$sql .= '        kouen_userid = "' . $userid . '" AND';
	$sql .= '        convention_id = "' . $convention_id . '" AND';
	$sql .= '        status = 0';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			for( $i=0;$i<$cnt;$i++ ) {

				$return_array[$i][ 'kouen_id' ]        = cn_contract( $res, $i, 'kouen_id' );
				$return_array[$i][ 'convention_id' ]   = cn_contract( $res, $i, 'convention_id' );
				$return_array[$i][ 'kouen_uid' ]       = cn_contract( $res, $i, 'kouen_uid' );
				$return_array[$i][ 'kouen_type' ]      = cn_contract( $res, $i, 'kouen_type' );
				$return_array[$i][ 'kouen_keishiki' ]  = cn_contract( $res, $i, 'kouen_keishiki' );
				$return_array[$i][ 'kouen_hapyo_uid' ] = cn_contract( $res, $i, 'kouen_hapyo_uid' );
				$return_array[$i][ 'kouen_userid' ]    = cn_contract( $res, $i, 'kouen_userid' );
				$return_array[$i][ 'kouen_name' ]      = cn_contract( $res, $i, 'kouen_name' );
				$return_array[$i][ 'kouen_info01' ]    = cn_contract( $res, $i, 'kouen_info01' );
				$return_array[$i][ 'kouen_title' ]     = cn_contract( $res, $i, 'kouen_title' );
				$return_array[$i][ 'kouen_title_eng' ] = cn_contract( $res, $i, 'kouen_title_eng' );
				$return_array[$i][ 'update_dt' ]       = cn_contract( $res, $i, 'update_dt' );
				$return_array[$i][ 'regist_dt' ]       = cn_contract( $res, $i, 'regist_dt' );

			}
		}
	}

//	db_close($cnn);

	return $return_array;

}


// ***********************************************
// 講演者テーブル INSERT
// ***********************************************
function kouensya_Data_Insert( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$id_max = 0;
	$sql  = 'SELECT max(kouen_uid) AS maxid FROM kouensya_data';
	$sql .= '    WHERE';
	$sql .= '        convention_id = "' . $arr[ 'convention_id' ] . '"';
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$id_max = cn_contract($res, 0, "maxid");
		}
	}
	$arr[ 'kouen_uid' ] = $id_max + 1;

	$sql = 'INSERT INTO kouensya_data (';
	$sql .= '        convention_id,';
	$sql .= '        kouen_uid,';
	$sql .= '        kouen_type,';
	$sql .= '        kouen_keishiki,';
	$sql .= '        kouen_head,';
	$sql .= '        kouen_section_head,';
	$sql .= '        kouen_section_head_1,';
	$sql .= '        kouen_section_head_2,';
	$sql .= '        kouen_section_head_3,';
	$sql .= '        kouen_section_head_4,';
	$sql .= '        kouen_section_head_5,';
	$sql .= '        kouen_hapyo_uid,';
	$sql .= '        kouen_userid,';
	$sql .= '        kouen_name,';
	$sql .= '        kouen_info01,';
	$sql .= '        kouen_title,';
	$sql .= '        kouen_title_eng,';
	$sql .= '        kouen_cmnt1,';
	$sql .= '        kouen_mail,';
	$sql .= '        kouen_tel,';
	$sql .= '        kouen_fax,';
	$sql .= '        kouen_zip1,';
	$sql .= '        kouen_zip2,';
	$sql .= '        kouen_address,';
	$sql .= '        kouen_kubun01,';
	$sql .= '        kouen_send_name,';
	$sql .= '        pay_status,';
	$sql .= '        pay_date,';
	$sql .= '        pay_way,';
	$sql .= '        kouen_biko1,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_uid' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_type' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_keishiki' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_head' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_section_head' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_section_head_1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_section_head_2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_section_head_3' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_section_head_4' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_section_head_5' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_hapyo_uid' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_userid' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_info01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_title' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_title_eng' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_cmnt1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_mail' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_tel' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_fax' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_zip1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_zip2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_address' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_kubun01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_send_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_status' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_date' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_way' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_biko1' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);

	$id_max = 1;
	$sql  = " SELECT max(kouen_id) AS maxid FROM kouensya_data";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$id_max = cn_contract($res, 0, "maxid");
		}
	}
	$arr[ 'kouen_id' ] = $id_max;

	$member_cnt = count( $arr[ 'member_name' ] );

	for( $i=0;$i<$member_cnt;$i++ ) {

		if ( $arr[ 'member_name' ][$i] ) {

			$member_uid = $i + 1;

			$sql = 'INSERT INTO kouensya_member_mast (';
			$sql .= '        kouen_id,';
			$sql .= '        member_uid,';
			$sql .= '        member_userid,';
			$sql .= '        member_hapyo,';
			$sql .= '        member_name,';
			$sql .= '        member_name_eng,';
			$sql .= '        member_info01,';
			$sql .= '        member_kubun01,';
			$sql .= '        update_dt,';
			$sql .= '        regist_dt,';
			$sql .= '        status';
			$sql .= '        ) VALUES ( ';
			$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_id' ] ) . '",';
			$sql .= '        "' . $member_uid . '",';
			$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_userid' ][ $i ] ) . '",';
			$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_hapyo' ][ $i ] ) . '",';
			$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name' ][ $i ] ) . '",';
			$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name_eng' ][ $i ] ) . '",';
			$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info01' ][ $i ] ) . '",';
			$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kubun01' ][ $i ] ) . '",';
			$sql .= '        "' . date( 'YmdHis' ) . '",';
			$sql .= '        "' . date( 'YmdHis' ) . '",';
			$sql .= '        0';
			$sql .= '        )';
			$res = cn_query($sql, $cnn);

		}
	}

	tr_commit($cnn);
	db_close($cnn);

	return $arr[ 'kouen_uid' ];

}


// ***********************************************
// 講演者テーブル UPDATE
// ***********************************************
function kouensya_Data_Update( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE kouensya_data SET';
	$sql .= '        convention_id = "' .   mysql_real_escape_string( $arr[ 'convention_id' ] ) . '",';
	$sql .= '        kouen_uid = "' .       mysql_real_escape_string( $arr[ 'kouen_uid' ] ) . '",';
	$sql .= '        kouen_type = "' .      mysql_real_escape_string( $arr[ 'kouen_type' ] ) . '",';
	$sql .= '        kouen_head = "' .      mysql_real_escape_string( $arr[ 'kouen_head' ] ) . '",';
	$sql .= '        kouen_section_head = "' .      mysql_real_escape_string( $arr[ 'kouen_section_head' ] ) . '",';
	$sql .= '        kouen_section_head_1 = "' .      mysql_real_escape_string( $arr[ 'kouen_section_head_1' ] ) . '",';
	$sql .= '        kouen_section_head_2 = "' .      mysql_real_escape_string( $arr[ 'kouen_section_head_2' ] ) . '",';
	$sql .= '        kouen_section_head_3 = "' .      mysql_real_escape_string( $arr[ 'kouen_section_head_3' ] ) . '",';
	$sql .= '        kouen_section_head_4 = "' .      mysql_real_escape_string( $arr[ 'kouen_section_head_4' ] ) . '",';
	$sql .= '        kouen_section_head_5 = "' .      mysql_real_escape_string( $arr[ 'kouen_section_head_5' ] ) . '",';
	$sql .= '        kouen_name = "' .      mysql_real_escape_string( $arr[ 'kouen_name' ] ) . '",';
	$sql .= '        kouen_keishiki = "' .  mysql_real_escape_string( $arr[ 'kouen_keishiki' ] ) . '",';
	$sql .= '        kouen_hapyo_uid = "' . mysql_real_escape_string( $arr[ 'kouen_hapyo_uid' ] ) . '",';
	$sql .= '        kouen_userid = "' .    mysql_real_escape_string( $arr[ 'kouen_userid' ] ) . '",';
	$sql .= '        kouen_info01 = "' .    mysql_real_escape_string( $arr[ 'kouen_info01' ] ) . '",';
	$sql .= '        kouen_title = "' .     mysql_real_escape_string( $arr[ 'kouen_title' ] ) . '",';
	$sql .= '        kouen_title_eng = "' . mysql_real_escape_string( $arr[ 'kouen_title_eng' ] ) . '",';
	$sql .= '        kouen_cmnt1 = "' .     mysql_real_escape_string( $arr[ 'kouen_cmnt1' ] ) . '",';
	$sql .= '        kouen_mail = "' .      mysql_real_escape_string( $arr[ 'kouen_mail' ] ) . '",';
	$sql .= '        kouen_tel = "' .       mysql_real_escape_string( $arr[ 'kouen_tel' ] ) . '",';
	$sql .= '        kouen_fax = "' .       mysql_real_escape_string( $arr[ 'kouen_fax' ] ) . '",';
	$sql .= '        kouen_zip1 = "' .      mysql_real_escape_string( $arr[ 'kouen_zip1' ] ) . '",';
	$sql .= '        kouen_zip2 = "' .      mysql_real_escape_string( $arr[ 'kouen_zip2' ] ) . '",';
	$sql .= '        kouen_address = "' .   mysql_real_escape_string( $arr[ 'kouen_address' ] ) . '",';
	$sql .= '        kouen_kubun01 = "' .   mysql_real_escape_string( $arr[ 'kouen_kubun01' ] ) . '",';
	$sql .= '        kouen_send_name = "' . mysql_real_escape_string( $arr[ 'kouen_send_name' ] ) . '",';
	$sql .= '        pay_status = "' .      mysql_real_escape_string( $arr[ 'pay_status' ] ) . '",';
	$sql .= '        pay_date = "' .        mysql_real_escape_string( $arr[ 'pay_date' ] ) . '",';
	$sql .= '        pay_way = "' .         mysql_real_escape_string( $arr[ 'pay_way' ] ) . '",';
	$sql .= '        kouen_biko1 = "' .     mysql_real_escape_string( $arr[ 'kouen_biko1' ] ) . '",';
	$sql .= '        update_dt = "' .       date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        kouen_id = "' . $arr[ 'kouen_id' ] . '"';
	$res = cn_query($sql, $cnn);

	$member_data_max_cnt = 8;

	for ( $i=0;$i<$member_data_max_cnt;$i++ ) {
		$member_uid = $i + 1;

		$sql  = 'SELECT * FROM kouensya_member_mast';
		$sql .= '    WHERE kouen_id = "' . $arr[ 'kouen_id' ] . '" AND';
		$sql .= '          member_uid = "' . $member_uid . '" AND';
		$sql .= '          status = 0';
		$res = cn_query( $sql, $cnn );
		if ( $res == TRUE ) {
			$cnt = cn_count( $res );
			// DBにデータが存在した場合
			if ( $cnt > 0 ) {

				// 格納データがある場合 => 上書き
				if ( $arr[ 'member_name' ][ $i ] || $arr[ 'member_name_eng' ][ $i ]  ) {
					$sql = 'UPDATE kouensya_member_mast SET';
					$sql .= '        member_userid = "' .   mysql_real_escape_string( $arr[ 'member_userid' ][ $i ] ) . '",';
					$sql .= '        member_hapyo = "' .    mysql_real_escape_string( $arr[ 'member_hapyo' ][ $i ] ) . '",';
					$sql .= '        member_name = "' .     mysql_real_escape_string( $arr[ 'member_name' ][ $i ] ) . '",';
					$sql .= '        member_name_eng = "' . mysql_real_escape_string( $arr[ 'member_name_eng' ][ $i ] ) . '",';
					$sql .= '        member_info01 = "' .   mysql_real_escape_string( $arr[ 'member_info01' ][ $i ] ) . '",';
					$sql .= '        member_kubun01 = "' .  mysql_real_escape_string( $arr[ 'member_kubun01' ][ $i ] ) . '",';
					$sql .= '        update_dt = "' .   date( 'YmdHis' ) . '"';
					$sql .= '    WHERE';
					$sql .= '        kouen_id = "' . $arr[ 'kouen_id' ] . '" AND';
					$sql .= '        member_uid = "' . $member_uid . '"';
					$res = cn_query($sql, $cnn);
				} else {
				// 格納データがない場合 => 削除
					$sql = 'UPDATE kouensya_member_mast SET';
					$sql .= '        status = 1';
					$sql .= '    WHERE';
					$sql .= '        kouen_id = "' . $arr[ 'kouen_id' ] . '" AND';
					$sql .= '        member_uid = "' . $member_uid . '"';
					$res = cn_query($sql, $cnn);
				}

			// DBにデータが存在しない場合
			} else {

				if ( $arr[ 'member_name' ][ $i ] || $arr[ 'member_name_eng' ][ $i ]  ) {
					// 格納データがある場合 => 書き込み
					$sql = 'INSERT INTO kouensya_member_mast (';
					$sql .= '        kouen_id,';
					$sql .= '        member_uid,';
					$sql .= '        member_userid,';
					$sql .= '        member_hapyo,';
					$sql .= '        member_name,';
					$sql .= '        member_name_eng,';
					$sql .= '        member_info01,';
					$sql .= '        member_kubun01,';
					$sql .= '        update_dt,';
					$sql .= '        regist_dt,';
					$sql .= '        status';
					$sql .= '        ) VALUES ( ';
					$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouen_id' ] ) . '",';
					$sql .= '        "' . $member_uid . '",';
					$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_userid' ][ $i ] ) . '",';
					$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_hapyo' ][ $i ] ) . '",';
					$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name' ][ $i ] ) . '",';
					$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name_eng' ][ $i ] ) . '",';
					$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info01' ][ $i ] ) . '",';
					$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kubun01' ][ $i ] ) . '",';
					$sql .= '        "' . date( 'YmdHis' ) . '",';
					$sql .= '        "' . date( 'YmdHis' ) . '",';
					$sql .= '        0';
					$sql .= '        )';
					$res = cn_query($sql, $cnn);
				}

			}
		}
	}

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 講演者テーブル CSV保存
// @return: string: filename
// ***********************************************
function kouensya_Data_Set_CSV($convention_id, $options) {

	$options['convention_type'] = convention_Type_Array_Read( $convention_id );

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM kouensya_data';
	$sql .= '    WHERE';
	$sql .= '        convention_id = "' . $convention_id . '" AND';
	$sql .= '        status = 0';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			for ( $i=0;$i<$cnt;$i++ ) {

				$d[$i][ 'kouen_id' ]        = cn_contract( $res, $i, 'kouen_id' );
				$d[$i][ 'convention_id' ]   = cn_contract( $res, $i, 'convention_id' );
				$d[$i][ 'kouen_uid' ]       = cn_contract( $res, $i, 'kouen_uid' );
				$d[$i][ 'kouen_type' ]      = cn_contract( $res, $i, 'kouen_type' );
				$d[$i][ 'kouen_keishiki' ]  = cn_contract( $res, $i, 'kouen_keishiki' );

				$d[$i][ 'kouen_head' ]  = cn_contract( $res, $i, 'kouen_head' );
				$d[$i][ 'kouen_section_head' ]  = cn_contract( $res, $i, 'kouen_section_head' );
				$d[$i][ 'kouen_section_head_1' ]  = cn_contract( $res, $i, 'kouen_section_head_1' );
				$d[$i][ 'kouen_section_head_2' ]  = cn_contract( $res, $i, 'kouen_section_head_2' );
				$d[$i][ 'kouen_section_head_3' ]  = cn_contract( $res, $i, 'kouen_section_head_3' );
				$d[$i][ 'kouen_section_head_4' ]  = cn_contract( $res, $i, 'kouen_section_head_4' );
				$d[$i][ 'kouen_section_head_5' ]  = cn_contract( $res, $i, 'kouen_section_head_5' );

				$d[$i][ 'kouen_hapyo_uid' ] = cn_contract( $res, $i, 'kouen_hapyo_uid' );
				$d[$i][ 'kouen_userid' ]    = cn_contract( $res, $i, 'kouen_userid' );
				$d[$i][ 'kouen_name' ]      = cn_contract( $res, $i, 'kouen_name' );
				$d[$i][ 'kouen_info01' ]    = cn_contract( $res, $i, 'kouen_info01' );
				$d[$i][ 'kouen_title' ]     = cn_contract( $res, $i, 'kouen_title' );
				$d[$i][ 'kouen_title_eng' ] = cn_contract( $res, $i, 'kouen_title_eng' );
				$d[$i][ 'kouen_cmnt1' ]     = cn_contract( $res, $i, 'kouen_cmnt1' );
				$d[$i][ 'kouen_mail' ]      = cn_contract( $res, $i, 'kouen_mail' );
				$d[$i][ 'kouen_tel' ]       = cn_contract( $res, $i, 'kouen_tel' );
				$d[$i][ 'kouen_fax' ]       = cn_contract( $res, $i, 'kouen_fax' );
				$d[$i][ 'kouen_zip1' ]      = cn_contract( $res, $i, 'kouen_zip1' );
				$d[$i][ 'kouen_zip2' ]      = cn_contract( $res, $i, 'kouen_zip2' );
				$d[$i][ 'kouen_address' ]   = cn_contract( $res, $i, 'kouen_address' );
				$d[$i][ 'kouen_kubun01' ]   = cn_contract( $res, $i, 'kouen_kubun01' );
				$d[$i][ 'kouen_send_name' ] = cn_contract( $res, $i, 'kouen_send_name' );
				$d[$i][ 'pay_status' ]      = cn_contract( $res, $i, 'pay_status' );
				$d[$i][ 'pay_date' ]        = cn_contract( $res, $i, 'pay_date' );
				$d[$i][ 'pay_way' ]         = cn_contract( $res, $i, 'pay_way' );
				$d[$i][ 'kouen_biko1' ]     = cn_contract( $res, $i, 'kouen_biko1' );
				$d[$i][ 'status' ]          = cn_contract( $res, $i, 'status' );
				$d[$i][ 'update_dt' ]       = cn_contract( $res, $i, 'update_dt' );
				$d[$i][ 'regist_dt' ]       = cn_contract( $res, $i, 'regist_dt' );

				// データ整形
				$d[$i]['kouen_kubun01_text'] = $options['member_kubun'][$d[$i][ 'kouen_kubun01' ]];
				$d[$i]['kouen_zip']           = $d[$i][ 'kouen_zip1' ] . ' - ' . $d[$i][ 'kouen_zip2' ];
				$d[$i]['pay_status_text']     = $options['pay_status'][$d[$i][ 'pay_status' ]];
				$d[$i]['pay_date_text']       = date_Format_1( $d[$i][ 'pay_date' ] );
				$d[$i]['pay_way_text']        = $options['pay_way'][$d[$i][ 'pay_way' ]];
				$d[$i]['kouen_keishiki_text'] = $options['kouen_keishiki'][$d[$i][ 'kouen_keishiki' ]];
				$d[$i]['kouen_type_text']     = $options['convention_type'][$d[$i][ 'kouen_type' ]];

				$d[$i]['kouen_head_text']     = $options['kouen_head'][$d[$i][ 'kouen_head' ]];
				$d[$i]['kouen_section_head_text']     = $options['kouen_section_head'][$d[$i][ 'kouen_section_head' ]];
				$d[$i]['kouen_section_head_1_text']     = $options['kouen_section_head_1'][$d[$i][ 'kouen_section_head_1' ]];
				$d[$i]['kouen_section_head_2_text']     = $options['kouen_section_head_2'][$d[$i][ 'kouen_section_head_2' ]];
				$d[$i]['kouen_section_head_3_text']     = $options['kouen_section_head_3'][$d[$i][ 'kouen_section_head_3' ]];
				$d[$i]['kouen_section_head_4_text']     = $options['kouen_section_head_4'][$d[$i][ 'kouen_section_head_4' ]];
				$d[$i]['kouen_section_head_5_text']     = $options['kouen_section_head_5'][$d[$i][ 'kouen_section_head_5' ]];

				$sql = 'SELECT * FROM kouensya_member_mast';
				$sql .= '    WHERE';
				$sql .= '        kouen_id = "' . $d[$i][ 'kouen_id' ] . '" AND';
				$sql .= '        status = 0';
				$sql .= '    ORDER BY';
				$sql .= '        member_uid';
				$res2 = cn_query( $sql, $cnn );
				if ( $res2 == TRUE ) {
					$cnt2 = cn_count( $res2 );
					$d[$i]['member_count'] = $cnt2;
					if( $cnt2 > 0 ) {
						for ( $j=0;$j<$cnt2;$j++ ) {

							$member_uid      = cn_contract( $res2, $j, 'member_uid' );
							$view_id = $member_uid;

							$member_id_key       = 'member_id' . '-' .       $view_id;
							$member_uid_key      = 'member_uid' . '-' .      $view_id;
							$member_userid_key   = 'member_userid' . '-' .   $view_id;
							$member_hapyo_key    = 'member_hapyo' . '-' .    $view_id;
							$member_name_key     = 'member_name' . '-' .     $view_id;
							$member_name_eng_key = 'member_name_eng' . '-' . $view_id;
							$member_info01_key   = 'member_info01' . '-' .   $view_id;
							$member_kubun01_key  = 'member_kubun01' . '-' .  $view_id;

							$d[$i][ $member_id_key ]       = cn_contract( $res2, $j, 'member_id' );
							$d[$i][ $member_uid_key ]      = cn_contract( $res2, $j, 'member_uid' );
							$d[$i][ $member_userid_key ]   = cn_contract( $res2, $j, 'member_userid' );
							$d[$i][ $member_hapyo_key ]    = cn_contract( $res2, $j, 'member_hapyo' );
							$d[$i][ $member_name_key ]     = cn_contract( $res2, $j, 'member_name' );
							$d[$i][ $member_name_eng_key ] = cn_contract( $res2, $j, 'member_name_eng' );
							$d[$i][ $member_info01_key ]   = cn_contract( $res2, $j, 'member_info01' );
							$d[$i][ $member_kubun01_key ]  = cn_contract( $res2, $j, 'member_kubun01' );
							
							// データ整形
							$d[$i][ $member_kubun01_key ] = $options['member_kubun'][ $d[$i][ $member_kubun01_key ] ];
						}
					}
				}


			}
		}
	}

	db_close( $cnn );

	// エクセルインポート
	$excel = new PHPExcel();

	// 各種設定
	$save_dir  = '../../csv/';
	$file_name = 'convention_kouensya_data.xls';

	// シートの設定   
	$excel->setActiveSheetIndex(0);
	$sheet = $excel->getActiveSheet();
	$sheet->setTitle('Sheet1');

	$line_cnf_array = array(
		array( 'title' => '受付番号',           'data_id' => 'kouen_uid' ),
		array( 'title' => '旧講演分類',           'data_id' => 'kouen_type' ),
		array( 'title' => '旧講演分類内容',       'data_id' => 'kouen_type_text' ),

		array( 'title' => '講演形式',             'data_id' => 'kouen_head_text' ),
		array( 'title' => '講演分類 大分類',       'data_id' => 'kouen_section_head_text' ),
		array( 'title' => '講演分類 小分類1',       'data_id' => 'kouen_section_head_1_text' ),
		array( 'title' => '講演分類 小分類2',       'data_id' => 'kouen_section_head_2_text' ),
		array( 'title' => '講演分類 小分類3',       'data_id' => 'kouen_section_head_3_text' ),
		array( 'title' => '講演分類 小分類4',       'data_id' => 'kouen_section_head_4_text' ),
		array( 'title' => '講演分類 小分類5',       'data_id' => 'kouen_section_head_5_text' ),

//		array( 'title' => 'セッション番号',     'data_id' => '' ),
//		array( 'title' => '講演番号',           'data_id' => '' ),
		array( 'title' => '和文題目',           'data_id' => 'kouen_title' ),
		array( 'title' => '著者数',             'data_id' => 'member_count' ),
		array( 'title' => '発表者',             'data_id' => 'kouen_hapyo_uid' ),
		array( 'title' => '所属①',             'data_id' => 'member_info01-1' ),
		array( 'title' => '氏名①',             'data_id' => 'member_name-1' ),
		array( 'title' => '所属②',             'data_id' => 'member_info01-2' ),
		array( 'title' => '氏名②',             'data_id' => 'member_name-2' ),
		array( 'title' => '所属③',             'data_id' => 'member_info01-3' ),
		array( 'title' => '氏名③',             'data_id' => 'member_name-3' ),
		array( 'title' => '所属④',             'data_id' => 'member_info01-4' ),
		array( 'title' => '氏名④',             'data_id' => 'member_name-4' ),
		array( 'title' => '所属⑤',             'data_id' => 'member_info01-5' ),
		array( 'title' => '氏名⑤',             'data_id' => 'member_name-5' ),
		array( 'title' => '所属⑥',             'data_id' => 'member_info01-6' ),
		array( 'title' => '氏名⑥',             'data_id' => 'member_name-6' ),
		array( 'title' => '所属⑦',             'data_id' => 'member_info01-7' ),
		array( 'title' => '氏名⑦',             'data_id' => 'member_name-7' ),
		array( 'title' => '所属⑧',             'data_id' => 'member_info01-8' ),
		array( 'title' => '氏名⑧',             'data_id' => 'member_name-8' ),
		array( 'title' => '英文題目',           'data_id' => 'kouen_title_eng' ),
		array( 'title' => '英文氏名①',         'data_id' => 'member_name_eng-1' ),
//		array( 'title' => 'かな姓①',           'data_id' => '' ),
		array( 'title' => '会員番号①',         'data_id' => 'member_userid-1' ),
		array( 'title' => '会員区分①',         'data_id' => 'member_kubun01-1' ),
		array( 'title' => '英文氏名②',         'data_id' => 'member_name_eng-2' ),
//		array( 'title' => 'かな姓②',           'data_id' => '' ),
		array( 'title' => '会員番号②',         'data_id' => 'member_userid-2' ),
		array( 'title' => '会員区分②',         'data_id' => 'member_kubun01-2' ),
		array( 'title' => '英文氏名③',         'data_id' => 'member_name_eng-3' ),
//		array( 'title' => 'かな姓③',           'data_id' => '' ),
		array( 'title' => '会員番号③',         'data_id' => 'member_userid-3' ),
		array( 'title' => '会員区分③',         'data_id' => 'member_kubun01-3' ),
		array( 'title' => '英文氏名④',         'data_id' => 'member_name_eng-4' ),
//		array( 'title' => 'かな姓④',           'data_id' => '' ),
		array( 'title' => '会員番号④',         'data_id' => 'member_userid-4' ),
		array( 'title' => '会員区分④',         'data_id' => 'member_kubun01-4' ),
		array( 'title' => '英文氏名⑤',         'data_id' => 'member_name_eng-5' ),
//		array( 'title' => 'かな姓⑤',           'data_id' => '' ),
		array( 'title' => '会員番号⑤',         'data_id' => 'member_userid-5' ),
		array( 'title' => '会員区分⑤',         'data_id' => 'member_kubun01-5' ),
		array( 'title' => '英文氏名⑥',         'data_id' => 'member_name_eng-6' ),
//		array( 'title' => 'かな姓⑥',           'data_id' => '' ),
		array( 'title' => '会員番号⑥',         'data_id' => 'member_userid-6' ),
		array( 'title' => '会員区分⑥',         'data_id' => 'member_kubun01-6' ),
		array( 'title' => '英文氏名⑦',         'data_id' => 'member_name_eng-7' ),
//		array( 'title' => 'かな姓⑦',           'data_id' => '' ),
		array( 'title' => '会員番号⑦',         'data_id' => 'member_userid-7' ),
		array( 'title' => '会員区分⑦',         'data_id' => 'member_kubun01-7' ),
		array( 'title' => '英文氏名⑧',         'data_id' => 'member_name_eng-8' ),
//		array( 'title' => 'かな姓⑧',           'data_id' => '' ),
		array( 'title' => '会員番号⑧',         'data_id' => 'member_userid-8' ),
		array( 'title' => '会員区分⑧',         'data_id' => 'member_kubun01-8' ),
//		array( 'title' => 'メモ＿１',           'data_id' => '' ),
//		array( 'title' => 'メモ＿２',           'data_id' => '' ),
//		array( 'title' => 'メモ＿３',           'data_id' => '' ),
//		array( 'title' => '上付き・下付き文字', 'data_id' => '' ),
		array( 'title' => '講演要旨',           'data_id' => 'kouen_cmnt1' ),
		array( 'title' => '申込者氏名',         'data_id' => 'kouen_name' ),
//		array( 'title' => '申込者フリガナ',     'data_id' => '' ),
		array( 'title' => '申込者会員区分',     'data_id' => 'kouen_kubun01_text' ),
		array( 'title' => '申込者会員番号',     'data_id' => 'kouen_userid' ),
		array( 'title' => '申込者メール',       'data_id' => 'kouen_mail' ),
		array( 'title' => '申込者郵便番号',     'data_id' => 'kouen_zip' ),
		array( 'title' => '申込者住所',         'data_id' => 'kouen_address' ),
		array( 'title' => '申込者電話番号',     'data_id' => 'kouen_tel' ),
		array( 'title' => '申込者FAX番号',      'data_id' => 'kouen_fax' ),
		array( 'title' => '申込者所属1',        'data_id' => 'kouen_info01' ),
//		array( 'title' => '申込者所属2',        'data_id' => '' ),
		array( 'title' => '支払い方法',         'data_id' => 'pay_way_text' ),
//		array( 'title' => '送金予定日',         'data_id' => '' ),
		array( 'title' => '入金',               'data_id' => 'pay_status_text' ),
		array( 'title' => '備考',               'data_id' => 'kouen_biko1' ),
		array( 'title' => '講演形式',           'data_id' => 'kouen_keishiki_text' ),
		array( 'title' => '入金日',             'data_id' => 'pay_date_text' ),
	);

	$line_id_array = array(
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
		'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
		'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO',
		'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
		'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO',
		'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ',
		'CA', 'CB', 'CC', 'CD', 'CE', 'CF', 'CG', 'CH', 'CI', 'CJ', 'CK', 'CL', 'CM', 'CN', 'CO',
		'CP', 'CQ', 'CR', 'CS', 'CT', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ',
		'DA', 'DB', 'DC', 'DD', 'DE', 'DF', 'DG', 'DH', 'DI', 'DJ', 'DK', 'DL', 'DM', 'DN', 'DO',
		'DP', 'DQ', 'DR', 'DS', 'DT', 'DU', 'DV', 'DW', 'DX', 'DY', 'DZ',
	);

	// タイトル行挿入
	$line_cnt = count( $line_cnf_array );
	for ( $i=0;$i<$line_cnt;$i++ ) {
		$col = 1;
		$line_id = $line_id_array[$i];

		$cell  = $line_id . $col;
		$value = $line_cnf_array[$i]['title'];

		$sheet->setCellValue( $cell, $value);
	}

	// データ抽出
	$data_cnt = count( $d );
	for($i=0;$i<$data_cnt;$i++ ) {

		$col = $i+2;

		for ( $j=0;$j<$line_cnt;$j++ ) {

			$line_id = $line_id_array[$j];
			$data_id = $line_cnf_array[$j]['data_id'];

			$cell = $line_id. $col;
			$value = $d[$i][$data_id];

			$sheet->setCellValue($cell,$value);
		}

	}

	// Excel2003形式で保存する
	$writer = PHPExcel_IOFactory::createWriter($excel, "Excel5");
	$writer->save( $save_dir . $file_name );

	return $file_name;

}



// ***********************************************
// 講演者テーブル メール送信
// ***********************************************
function kouensya_Data_Send_Mail( $arr, $options, $mode) {

	// ================================
	// メールメイン部分整形
	// ================================

	if ($arr['kouen_head'] == 1 || $arr['kouen_head'] == 3)
	{
		$mail_kouen_head_section = <<<EOM
[講演分類]
■大分類
{$options['kouen_section_head'][ $arr['kouen_section_head'] ]}

■小分類1
{$options['kouen_section_head_1'][ $arr['kouen_section_head_1'] ]}

■小分類2
{$options['kouen_section_head_2'][ $arr['kouen_section_head_2'] ]}

■小分類3
{$options['kouen_section_head_3'][ $arr['kouen_section_head_3'] ]}

■小分類4
{$options['kouen_section_head_4'][ $arr['kouen_section_head_4'] ]}

■小分類5
{$options['kouen_section_head_5'][ $arr['kouen_section_head_5'] ]}

EOM;
	}



	$mail_main_text = <<<EOD

-------------------------------
■講演情報
-------------------------------

[受付番号]
{$arr['kouen_uid']}

[講演形式]
{$options['kouen_head'][ $arr['kouen_head'] ]}

{$mail_kouen_head_section}
[和文題目]
{$arr[ 'kouen_title']}

[英文題目]
{$arr[ 'kouen_title_eng']}

[講演要旨]
{$arr[ 'kouen_cmnt1']}

-------------------------------
■研究者一覧
-------------------------------

[発表者]
{$arr[ 'kouen_hapyo_uid']}

EOD;

	for ( $i=0;$i<8;$i++ ) {
		$mem_id = $i + 1;

		$mail_main_text .= <<<EOD

[研究者-{$mem_id}]
　会員番号：{$arr['member_userid'][$i]}
　会員区分：{$options['member_kubun'][$arr['member_kubun01'][$i]]}
　　　氏名：{$arr['member_name'][$i]}
　ローマ字：{$arr['member_name_eng'][$i]}
　　　所属：{$arr['member_info01'][$i]}

EOD;

	}



	$mail_main_text .= <<<EOD

-------------------------------
■申込者情報
-------------------------------

[会員区分]
{$options['member_kubun'][ $arr[ 'kouen_kubun01' ] ]}

[会員番号]
{$arr[ 'kouen_userid' ]}

[氏名]
{$arr[ 'kouen_name' ]}

[メールアドレス]
{$arr[ 'kouen_mail' ]}

[勤務先/学校名・所属]
{$arr[ 'kouen_info01']}

[電話番号]
{$arr[ 'kouen_tel']}

[FAX番号]
{$arr[ 'kouen_fax']}

[所属住所]
〒{$arr[ 'kouen_zip1']}-{$arr[ 'kouen_zip2']}
{$arr[ 'kouen_address']}

[講演発表・登録料 支払方法]
{$options['pay_way'][ $arr['pay_way']]}

[備考]
{$arr['kouen_biko1']}


EOD;


	// ================================
	// 署名読み込み
	// ================================
	$mail_assign = get_Mail_Assign();


	// ================================
	// 表画面からの登録
	// ================================
	if ( $mode == 'pc_regist' ) {

		// 管理者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'conv_name' ] . ' 講演申込受付メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_SYSTEM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

{$arr[ 'conv_name' ]} 講演申込がありました。

以下【登録】された内容です。

{$mail_main_text}

-------------------------------
■その他の情報

[ログイン状況]
{$options['member_login'][ $arr[ 'login_flg' ] ]}


{$mail_assign}

EOD;


		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

		$mail_data = array();


		// 申込者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'conv_name' ] . ' 講演申込受付メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = $arr[ 'kouen_mail' ]; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

{$arr[ 'kouen_name' ]}様

{$arr[ 'conv_name' ]} 講演申込を受付ました。
【注1】講演申込内容の修正は、インターネットサービスにログイン後、
「講演大会・国際会議」-「講演大会」-「募集中の大会」-【講演申込一覧・編集】ページ
で可能です。ただし、修正の受付も講演申込締切と同時に締切ます。

【注2】講演申込費2,000円は，受付番号を明記の上，１週間以内に必ず送金して
ください。


※講演発表料のご送金に当たっては，手数料が一番安い郵便振替のご利用をおすすめします。
郵便局に備え付けの郵便振替用紙に，
　口座番号：00100-3-66805
　加入者名：一般社団法人軽金属学会
とご記入の上，通信欄に必要事項を明記してご送金下さい。

※銀行振込をご利用の場合は，振込者欄に受付番号と申込者の個人名を入れてください。
　振込先：三井住友銀行　銀座支店　普通　口座番号1530334
　口座名義：一般社団法人軽金属学会

以下【登録】された内容です。
ご確認ください。


{$mail_main_text}


{$mail_assign}


EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

	}


	// ================================
	// 表画面からの編集
	// ================================
	if ( $mode == 'pc_modify' ) {

		// 管理者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'conv_name' ] . ' 講演内容編集メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_SYSTEM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

{$arr[ 'conv_name' ]} 講演内容編集がありました。

以下【編集】された内容です。

{$mail_main_text}

-------------------------------
■その他の情報

[ログイン状況]
{$options['member_login'][ $arr[ 'login_flg' ] ]}


{$mail_assign}

EOD;


		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

		$mail_data = array();


		// 申込者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'conv_name' ] . ' 講演内容編集メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = $arr[ 'kouen_mail' ]; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

{$arr[ 'kouen_name' ]}様

{$arr[ 'conv_name' ]} 講演内容編集を受け付けました。

以下 【編集】された内容です。
ご確認ください。


{$mail_main_text}


{$mail_assign}


EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

	}

}

// ***********************************************
// 講演者情報テーブル フォームからの入力の調整
// @return: 調整後の配列
// ***********************************************
function kouensya_Data_Adjust($arr) {

	// 会員番号が0の場合、区分を非会員にする
	if ( $arr[ 'kouen_userid' ] === '0' ) {
		$arr[ 'kouen_kubun01' ] = 99;
	} else {
		// それ以外の場合で非会員になっている場合は正会員にする
		if ( $arr[ 'kouen_kubun01' ] == 99 ) {
			$arr[ 'kouen_kubun01' ] = 1;
		}
	}

	return $arr;
}

// ***********************************************
// 講演者情報テーブル 同じ大会での申込者の存在チェック（会員番号で判断）
// @return: TRUE:存在する FALSE:存在しない
// ***********************************************
function kouensya_Data_Userid_Double_Check( $userid, $convention_id ) {

	$flg = FALSE;

	// 非会員以外を判別
	if ( $userid > 0 ) {
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql = 'SELECT * FROM kouensya_data';
		$sql .= '    WHERE';
		$sql .= '        kouen_userid = "' . $userid . '" AND';
		$sql .= '        convention_id = "' . $convention_id . '" AND';
		$sql .= '        status = 0';
		$res = cn_query( $sql, $cnn );

		if ( $res == true ) {
			$cnt = cn_count( $res );
			if ( $cnt > 0 ) {

				$flg = TRUE;

			}
		}

//		db_close($cnn);

	}

	return $flg;

}

// ***********************************************
// 講演者情報エラーチェック
// ***********************************************
function kouensya_Error_Check($arr, $mode) {
	
	$err_msg = '';

	// 管理画面=>新規登録
	// -------------------------------------------
	if ( $mode == 'admin_regist' ) {
		if ( $arr[ 'kouen_userid' ] !== '0' ) {

			if ( ! $arr[ 'kouen_userid' ] ) {
				$err_msg .= '申込者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'kouen_userid' ] ) ) {
				$err_msg .= '申込者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'kouen_userid' ] ) != 6) {
				$err_msg .= '申込者の会員番号は6文字で決定してください';
				return $err_msg;
			}
/*
			if ( kouensya_Data_Userid_Double_Check( $arr['kouen_userid'], $arr['convention_id'] ) ) {
				$err_msg .= '同じ会員番号で申込されています。ひとり、１枠しか申込できません。';
				return $err_msg;
			}
*/
		}

		if ( $arr[ 'kouen_zip1' ] ) {
			if ( is_Number( $arr[ 'kouen_zip1' ] ) ) {
				$err_msg .= '申込者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'kouen_zip1' ] ) > 3 ) {
				$err_msg .= '申込者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'kouen_zip2' ] ) {
			if ( is_Number( $arr[ 'kouen_zip2' ] ) ) {
				$err_msg .= '申込者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'kouen_zip2' ] ) > 4 ) {
				$err_msg .= '申込者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( ! $arr[ 'kouen_name' ] ) {
			$err_msg .= '申込者の名前が未入力です';
			return $err_msg;
		}


		if ( ! $arr[ 'kouen_mail' ] ) {
			$err_msg .= '申込者のメールアドレスが未入力です';
			return $err_msg;
		}

		if ( is_Mail( $arr[ 'kouen_mail' ] ) ) {
			$err_msg .= '申込者のメールアドレスの' . is_Mail( $arr[ 'kouen_mail' ] );
			return $err_msg;
		}

		if ( $arr[ 'kouen_tel' ] ) {
			if ( is_Tell( $arr[ 'kouen_tel' ] ) ) {
				$err_msg .= '申込者の電話番号は' . is_Tell( $arr[ 'kouen_tel' ] );
				return $err_msg;
			}
		}

		if ( $arr[ 'kouen_fax' ] ) {
			if ( is_Tell( $arr[ 'kouen_fax' ] ) ) {
				$err_msg .= '申込者のFAX番号は' . is_Tell( $arr[ 'kouen_fax' ] );
				return $err_msg;
			}
		}

		if ( ! $arr[ 'kouen_hapyo_uid' ] ) {
			$err_msg .= '発表者が未選択です';
			return $err_msg;
		}
	}

	// 管理画面=>編集登録
	// -------------------------------------------
	if ( $mode == 'admin_modify' ) {
		if ( $arr[ 'kouen_userid' ] !== '0' ) {

			if ( ! $arr[ 'kouen_userid' ] ) {
				$err_msg .= '申込者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'kouen_userid' ] ) ) {
				$err_msg .= '申込者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'kouen_userid' ] ) != 6) {
				$err_msg .= '申込者の会員番号は6文字で決定してください';
				return $err_msg;
			}
/*
			// 会員番号の重複を避ける(同じ会員番号の場合は通す）
			if ( $arr['old_kouen_userid'] != $arr['kouen_userid'] ) {
				if ( kouensya_Data_Userid_Double_Check( $arr['kouen_userid'], $arr['convention_id'] ) ) {
					$err_msg .= '同じ会員番号で申込されています。ひとり、１枠しか申込できません。';
					return $err_msg;
				}
			}
*/
		}

		if ( $arr[ 'kouen_zip1' ] ) {
			if ( is_Number( $arr[ 'kouen_zip1' ] ) ) {
				$err_msg .= '申込者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'kouen_zip1' ] ) > 3 ) {
				$err_msg .= '申込者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'kouen_zip2' ] ) {
			if ( is_Number( $arr[ 'kouen_zip2' ] ) ) {
				$err_msg .= '申込者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'kouen_zip2' ] ) > 4 ) {
				$err_msg .= '申込者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( ! $arr[ 'kouen_name' ] ) {
			$err_msg .= '申込者の名前が未入力です';
			return $err_msg;
		}


		if ( ! $arr[ 'kouen_mail' ] ) {
			$err_msg .= '申込者のメールアドレスが未入力です';
			return $err_msg;
		}

		if ( is_Mail( $arr[ 'kouen_mail' ] ) ) {
			$err_msg .= '申込者のメールアドレスの' . is_Mail( $arr[ 'kouen_mail' ] );
			return $err_msg;
		}

		if ( $arr[ 'kouen_tel' ] ) {
			if ( is_Tell( $arr[ 'kouen_tel' ] ) ) {
				$err_msg .= '申込者の電話番号は' . is_Tell( $arr[ 'kouen_tel' ] );
				return $err_msg;
			}
		}

		if ( $arr[ 'kouen_fax' ] ) {
			if ( is_Tell( $arr[ 'kouen_fax' ] ) ) {
				$err_msg .= '申込者のFAX番号は' . is_Tell( $arr[ 'kouen_fax' ] );
				return $err_msg;
			}
		}

		if ( ! $arr[ 'kouen_hapyo_uid' ] ) {
			$err_msg .= '発表者が未選択です';
			return $err_msg;
		}
	}

	// 表画面=>新規登録
	// -------------------------------------------
	if ( $mode == 'pc_regist' ) {
		if ( $arr[ 'kouen_userid' ] !== '0' ) {

			if ( ! $arr[ 'kouen_userid' ] ) {
				$err_msg .= '申込者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'kouen_userid' ] ) ) {
				$err_msg .= '申込者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'kouen_userid' ] ) != 6) {
				$err_msg .= '申込者の会員番号は6文字で決定してください';
				return $err_msg;
			}
/*
			if ( kouensya_Data_Userid_Double_Check( $arr['kouen_userid'], $arr['convention_id'] ) ) {
				$err_msg .= '同じ会員番号で申込されています。ひとり、１枠しか申込できません。<br />ログインされている方は申込内容編集ページお進みください。<br />ログインしていない方はログイン後に申込内容編集ページで編集してください。';
				return $err_msg;
			}
*/
		}

		// if ( ! $arr[ 'kouen_keishiki' ] ) {
		// 	$err_msg .= '講演形式が未選択です';
		// 	return $err_msg;
		// }

		if ( ! $arr[ 'kouen_head' ] ) {
			$err_msg .= '講演形式が未選択です';
			return $err_msg;
		}

		// 分類
		if ( $arr[ 'kouen_head' ] == 1 ||  $arr[ 'kouen_head' ] == 3) {
			if ( ! $arr[ 'kouen_section_head' ] ) {
				$err_msg .= '大分類・対象材料が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_1' ] ) {
				$err_msg .= '小分類1・現象が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_2' ] ) {
				$err_msg .= '小分類2・用途が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_3' ] ) {
				$err_msg .= '小分類3・検出・解析方法が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_4' ] ) {
				$err_msg .= '小分類4・目的が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_5' ] ) {
				$err_msg .= '小分類5・材料形状が未選択です';
				return $err_msg;
			}
		}

		if ( ! $arr[ 'kouen_title' ] ) {
			$err_msg .= '和文題目が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_title_eng' ] ) {
			$err_msg .= '英文題目が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_cmnt1' ] ) {
			$err_msg .= '講演要旨が未入力です';
			return $err_msg;
		}

		$member_cnt = count( $arr[ 'member_userid' ] );
		for( $i=0;$i<$member_cnt;$i++ ) {

			if ( ! $arr[ 'member_name' ][0] ) {
				$err_msg .= '一人目の研究者の名前は必須です';
				return $err_msg;
			}

			if  ( $arr[ 'member_name' ][$i] != '') {
				if ( ! $arr[ 'member_name_eng' ][$i] ) {
					$err_msg .= 'ローマ字入力は必須です';
					return $err_msg;
				}
			}

			if ( $arr[ 'member_userid' ][$i] != '') {

				if ( is_Number( $arr[ 'member_userid' ][$i] ) ) {
					$err_msg .= '研究者の会員番号は半角数字以外の入力はできません';
					return $err_msg;
				}

				if ( $arr[ 'member_userid' ][$i] != 0 ) {
					if ( strlen( $arr[ 'member_userid' ][$i] ) != 6) {
						$err_msg .= '研究者の会員番号は6文字で入力してください';
						return $err_msg;
					}
				}
			}

			if ( $arr[ 'member_name_eng' ][$i] != '') {

				if ( is_ArphNumber( $arr[ 'member_name_eng' ][$i] ) ) {
					$err_msg .= '研究者のローマ字名には英数字以外の入力はできません（スペースも入力できません）';
					return $err_msg;
				}

			}

		}

		if ( ! $arr[ 'kouen_name' ] ) {
			$err_msg .= '申込者の名前が未入力です';
			return $err_msg;
		}
		if ( ! $arr[ 'kouen_mail' ] ) {
			$err_msg .= '申込者のメールアドレスが未入力です';
			return $err_msg;
		}
		if ( is_Mail( $arr[ 'kouen_mail' ] ) ) {
			$err_msg .= '申込者のメールアドレスの' . is_Mail( $arr[ 'kouen_mail' ] );
			return $err_msg;
		}
		if ( ! $arr[ 'kouen_tel' ] ) {
			$err_msg .= '申込者の電話番号が未入力です';
			return $err_msg;
		}
		if ( is_Tell( $arr[ 'kouen_tel' ] ) ) {
			$err_msg .= '申込者の電話番号は' . is_Tell( $arr[ 'kouen_tel' ] );
			return $err_msg;
		}
		if ( $arr[ 'kouen_fax' ] ) {
			if ( is_Tell( $arr[ 'kouen_fax' ] ) ) {
				$err_msg .= '申込者のFAX番号は' . is_Tell( $arr[ 'kouen_fax' ] );
				return $err_msg;
			}
		}

		if ( ! $arr[ 'kouen_zip1' ] ) {
			$err_msg .= '申込者の郵便番号1が入力されていません';
			return $err_msg;
		}
		if ( is_Number( $arr[ 'kouen_zip1' ] ) ) {
			$err_msg .= '申込者の郵便番号1は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'kouen_zip1' ] ) > 3 ) {
			$err_msg .= '申込者の郵便番号1は3桁までしか入力できません';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_zip2' ] ) {
			$err_msg .= '申込者の郵便番号2が入力されていません';
			return $err_msg;
		}
		if ( is_Number( $arr[ 'kouen_zip2' ] ) ) {
			$err_msg .= '申込者の郵便番号2は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'kouen_zip2' ] ) > 4 ) {
			$err_msg .= '申込者の郵便番号2は4桁までしか入力できません';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_address' ] ) {
			$err_msg .= '申込者の住所が未入力です';
			return $err_msg;
		}


		if ( ! $arr[ 'pay_way' ] ) {
			$err_msg .= '講演発表料支払方法が未選択です';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_hapyo_uid' ] ) {
			$err_msg .= '発表者が未選択です';
			return $err_msg;
		}
	}


	// 表画面=>編集登録
	// -------------------------------------------
	if ( $mode == 'pc_modify' ) {
		// if ( ! $arr[ 'kouen_keishiki' ] ) {
		// 	$err_msg .= '講演形式が未選択です';
		// 	return $err_msg;
		// }

		if ( ! $arr[ 'kouen_head' ] ) {
			$err_msg .= '講演形式が未選択です';
			return $err_msg;
		}

		// 分類
		if ( $arr[ 'kouen_head' ] == 1 ||  $arr[ 'kouen_head' ] == 3) {
			if ( ! $arr[ 'kouen_section_head' ] ) {
				$err_msg .= '大分類・対象材料が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_1' ] ) {
				$err_msg .= '小分類1・現象が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_2' ] ) {
				$err_msg .= '小分類2・用途が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_3' ] ) {
				$err_msg .= '小分類3・検出・解析方法が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_4' ] ) {
				$err_msg .= '小分類4・目的が未選択です';
				return $err_msg;
			}
			if ( ! $arr[ 'kouen_section_head_5' ] ) {
				$err_msg .= '小分類5・材料形状が未選択です';
				return $err_msg;
			}
		}

		if ( ! $arr[ 'kouen_title' ] ) {
			$err_msg .= '和文題目が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_title_eng' ] ) {
			$err_msg .= '英文題目が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_cmnt1' ] ) {
			$err_msg .= '講演要旨が未入力です';
			return $err_msg;
		}

		$member_cnt = count( $arr[ 'member_userid' ] );
		for( $i=0;$i<$member_cnt;$i++ ) {

			if ( ! $arr[ 'member_name' ][0] ) {
				$err_msg .= '一人目の研究者の名前は必須です';
				return $err_msg;
			}

			if  ( $arr[ 'member_name' ][$i] != '') {
				if ( ! $arr[ 'member_name_eng' ][$i] ) {
					$err_msg .= 'ローマ字入力は必須です';
					return $err_msg;
				}
			}

			if ( $arr[ 'member_userid' ][$i] != '') {

				if ( is_Number( $arr[ 'member_userid' ][$i] ) ) {
					$err_msg .= '研究者の会員番号は半角数字以外の入力はできません';
					return $err_msg;
				}

				if ( $arr[ 'member_userid' ][$i] != 0 ) {
					if ( strlen( $arr[ 'member_userid' ][$i] ) != 6) {
						$err_msg .= '研究者の会員番号は6文字で入力してください';
						return $err_msg;
					}
				}
			}

			if ( $arr[ 'member_name_eng' ][$i] != '') {

				if ( is_ArphNumber( $arr[ 'member_name_eng' ][$i] ) ) {
					$err_msg .= '研究者のローマ字名には英数字以外の入力はできません（スペースも入力できません）';
					return $err_msg;
				}

			}
		}

		if ( ! $arr[ 'kouen_name' ] ) {
			$err_msg .= '申込者の名前が未入力です';
			return $err_msg;
		}
		if ( ! $arr[ 'kouen_mail' ] ) {
			$err_msg .= '申込者のメールアドレスが未入力です';
			return $err_msg;
		}
		if ( is_Mail( $arr[ 'kouen_mail' ] ) ) {
			$err_msg .= '申込者のメールアドレスの' . is_Mail( $arr[ 'kouen_mail' ] );
			return $err_msg;
		}
		if ( ! $arr[ 'kouen_tel' ] ) {
			$err_msg .= '申込者の電話番号が未入力です';
			return $err_msg;
		}
		if ( is_Tell( $arr[ 'kouen_tel' ] ) ) {
			$err_msg .= '申込者の電話番号は' . is_Tell( $arr[ 'kouen_tel' ] );
			return $err_msg;
		}
		if ( $arr[ 'kouen_fax' ] ) {
			if ( is_Tell( $arr[ 'kouen_fax' ] ) ) {
				$err_msg .= '申込者のFAX番号は' . is_Tell( $arr[ 'kouen_fax' ] );
				return $err_msg;
			}
		}

		if ( ! $arr[ 'kouen_zip1' ] ) {
			$err_msg .= '申込者の郵便番号1が入力されていません';
			return $err_msg;
		}
		if ( is_Number( $arr[ 'kouen_zip1' ] ) ) {
			$err_msg .= '申込者の郵便番号1は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'kouen_zip1' ] ) > 3 ) {
			$err_msg .= '申込者の郵便番号1は3桁までしか入力できません';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_zip2' ] ) {
			$err_msg .= '申込者の郵便番号2が入力されていません';
			return $err_msg;
		}
		if ( is_Number( $arr[ 'kouen_zip2' ] ) ) {
			$err_msg .= '申込者の郵便番号2は半角数字以外の入力はできません';
			return $err_msg;
		}
		if ( strlen( $arr[ 'kouen_zip2' ] ) > 4 ) {
			$err_msg .= '申込者の郵便番号2は4桁までしか入力できません';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_address' ] ) {
			$err_msg .= '申込者の住所が未入力です';
			return $err_msg;
		}


		if ( ! $arr[ 'pay_way' ] ) {
			$err_msg .= '講演発表料支払方法が未選択です';
			return $err_msg;
		}

		if ( ! $arr[ 'kouen_hapyo_uid' ] ) {
			$err_msg .= '発表者が未選択です';
			return $err_msg;
		}
	}

	return $err_msg;
}



// **********************************************************************************************
// シンポジウム・セミナー関連
// **********************************************************************************************
/*
symp_id
symp_name
symp_subtitle
symp_syusai
symp_kouen
symp_kyousan
symp_date3_text
symp_place
symp_price_text
symp_capacity
symp_sewa
symp_body
symp_date1
symp_date2
symp_date3
symp_pric1
symp_pric2
symp_pric3
symp_pric4
symp_biko01
symp_biko02
symp_rank
view_status
pay_way_view_status
status
regist_dt
update_dt
*/
// ***********************************************
// シンポジウムテーブル IDを元にSELECT
// ***********************************************
function symposium_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM symposium_data';
	$sql .= '    WHERE';
	$sql .= '        symp_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'symp_id' ]         = cn_contract( $res, 0, 'symp_id' );
			$return_array[ 'symp_name' ]       = cn_contract( $res, 0, 'symp_name' );
			$return_array[ 'symp_subtitle' ]   = cn_contract( $res, 0, 'symp_subtitle' );
			$return_array[ 'symp_syusai' ]     = cn_contract( $res, 0, 'symp_syusai' );
			$return_array[ 'symp_kouen' ]      = cn_contract( $res, 0, 'symp_kouen' );
			$return_array[ 'symp_kyousan' ]    = cn_contract( $res, 0, 'symp_kyousan' );
			$return_array[ 'symp_date3_text' ] = cn_contract( $res, 0, 'symp_date3_text' );
			$return_array[ 'symp_place' ]      = cn_contract( $res, 0, 'symp_place' );
			$return_array[ 'symp_price_text' ] = cn_contract( $res, 0, 'symp_price_text' );
			$return_array[ 'symp_capacity' ]   = cn_contract( $res, 0, 'symp_capacity' );
			$return_array[ 'symp_sewa' ]       = cn_contract( $res, 0, 'symp_sewa' );
			$return_array[ 'symp_body' ]       = cn_contract( $res, 0, 'symp_body' );
			$return_array[ 'symp_date1' ]      = cn_contract( $res, 0, 'symp_date1' );
			$return_array[ 'symp_date2' ]      = cn_contract( $res, 0, 'symp_date2' );
			$return_array[ 'symp_date3' ]      = cn_contract( $res, 0, 'symp_date3' );
			$return_array[ 'symp_pric1' ]      = cn_contract( $res, 0, 'symp_pric1' );
			$return_array[ 'symp_pric2' ]      = cn_contract( $res, 0, 'symp_pric2' );
			$return_array[ 'symp_pric3' ]      = cn_contract( $res, 0, 'symp_pric3' );
			$return_array[ 'symp_pric4' ]      = cn_contract( $res, 0, 'symp_pric4' );
			$return_array[ 'symp_biko01' ]     = cn_contract( $res, 0, 'symp_biko01' );
			$return_array[ 'symp_biko02' ]     = cn_contract( $res, 0, 'symp_biko02' );
			$return_array[ 'symp_rank' ]       = cn_contract( $res, 0, 'symp_rank' );
			$return_array[ 'view_status' ]     = cn_contract( $res, 0, 'view_status' );
			$return_array[ 'pay_way_view_status' ] = cn_contract( $res, 0, 'pay_way_view_status' );
			$return_array[ 'status' ]          = cn_contract( $res, 0, 'status' );
			$return_array[ 'regist_dt' ]       = cn_contract( $res, 0, 'regist_dt' );
			$return_array[ 'update_dt' ]       = cn_contract( $res, 0, 'update_dt' );

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// シンポジウムテーブル INSERT
// ***********************************************
function symposium_Data_Insert( $arr ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = 'INSERT INTO symposium_data (';
		$sql .= '        symp_name,';
		$sql .= '        symp_subtitle,';
		$sql .= '        symp_syusai,';
		$sql .= '        symp_kouen,';
		$sql .= '        symp_kyousan,';
		$sql .= '        symp_date3_text,';
		$sql .= '        symp_place,';
		$sql .= '        symp_price_text,';
		$sql .= '        symp_capacity,';
		$sql .= '        symp_sewa,';
		$sql .= '        symp_body,';
		$sql .= '        symp_date1,';
		$sql .= '        symp_date2,';
		$sql .= '        symp_date3,';
		$sql .= '        symp_pric1,';
		$sql .= '        symp_pric2,';
		$sql .= '        symp_pric3,';
		$sql .= '        symp_pric4,';
		$sql .= '        symp_biko01,';
		$sql .= '        symp_biko02,';
		$sql .= '        symp_rank,';
		$sql .= '        view_status,';
		$sql .= '        pay_way_view_status,';
		$sql .= '        regist_dt,';
		$sql .= '        update_dt,';
		$sql .= '        status';
		$sql .= '        ) VALUES ( ';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_name' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_subtitle' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_syusai' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_kouen' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_kyousan' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_date3_text' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_place' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_price_text' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_capacity' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_sewa' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_body' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_date1' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_date2' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_date3' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_pric1' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_pric2' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_pric3' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_pric4' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_biko01' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_biko02' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_rank' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'view_status' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_way_view_status' ] ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        0';
		$sql .= '        )';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}

// ***********************************************
// シンポジウムテーブル UPDATE
// ***********************************************
function symposium_Data_Update( $arr, $id ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE symposium_data SET';
		$sql .= '        symp_name = "' .       mysql_real_escape_string( $arr[ 'symp_name' ] ) . '",';
		$sql .= '        symp_subtitle = "' .   mysql_real_escape_string( $arr[ 'symp_subtitle' ] ) . '",';
		$sql .= '        symp_syusai = "' .     mysql_real_escape_string( $arr[ 'symp_syusai' ] ) . '",';
		$sql .= '        symp_kouen = "' .      mysql_real_escape_string( $arr[ 'symp_kouen' ] ) . '",';
		$sql .= '        symp_kyousan = "' .    mysql_real_escape_string( $arr[ 'symp_kyousan' ] ) . '",';
		$sql .= '        symp_date3_text = "' . mysql_real_escape_string( $arr[ 'symp_date3_text' ] ) . '",';
		$sql .= '        symp_place = "' .      mysql_real_escape_string( $arr[ 'symp_place' ] ) . '",';
		$sql .= '        symp_price_text = "' . mysql_real_escape_string( $arr[ 'symp_price_text' ] ) . '",';
		$sql .= '        symp_capacity = "' .   mysql_real_escape_string( $arr[ 'symp_capacity' ] ) . '",';
		$sql .= '        symp_sewa = "' .       mysql_real_escape_string( $arr[ 'symp_sewa' ] ) . '",';
		$sql .= '        symp_body = "' .       mysql_real_escape_string( $arr[ 'symp_body' ] ) . '",';
		$sql .= '        symp_date1 = "' .      mysql_real_escape_string( $arr[ 'symp_date1' ] ) . '",';
		$sql .= '        symp_date2 = "' .      mysql_real_escape_string( $arr[ 'symp_date2' ] ) . '",';
		$sql .= '        symp_date3 = "' .      mysql_real_escape_string( $arr[ 'symp_date3' ] ) . '",';
		$sql .= '        symp_pric1 = "' .      mysql_real_escape_string( $arr[ 'symp_pric1' ] ) . '",';
		$sql .= '        symp_pric2 = "' .      mysql_real_escape_string( $arr[ 'symp_pric2' ] ) . '",';
		$sql .= '        symp_pric3 = "' .      mysql_real_escape_string( $arr[ 'symp_pric3' ] ) . '",';
		$sql .= '        symp_pric4 = "' .      mysql_real_escape_string( $arr[ 'symp_pric4' ] ) . '",';
		$sql .= '        symp_biko01 = "' .     mysql_real_escape_string( $arr[ 'symp_biko01' ] ) . '",';
		$sql .= '        symp_biko02 = "' .     mysql_real_escape_string( $arr[ 'symp_biko02' ] ) . '",';
		$sql .= '        symp_rank = "' .       mysql_real_escape_string( $arr[ 'symp_rank' ] ) . '",';
		$sql .= '        view_status = "' .     mysql_real_escape_string( $arr[ 'view_status' ] ) . '",';
		$sql .= '        pay_way_view_status = "' .     mysql_real_escape_string( $arr[ 'pay_way_view_status' ] ) . '",';
		$sql .= '        update_dt = "' .       date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        symp_id = "' . $id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}

// ***********************************************
// シンポジウムテーブル 表示ＯＮ
// ***********************************************
function symposium_Data_View_On( $symp_id ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE symposium_data SET';
		$sql .= '        view_status = 1,';
		$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        symp_id = "' . mysql_real_escape_string( $symp_id ) . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}

// ***********************************************
// シンポジウムテーブル 表示ＯＦＦ
// ***********************************************
function symposium_Data_View_Off( $symp_id ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE symposium_data SET';
		$sql .= '        view_status = 0,';
		$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        symp_id = "' . mysql_real_escape_string( $symp_id ) . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}

// ***********************************************
// シンポジウムテーブル 参加期間チェック
// ***********************************************
function symposium_Date_Check( $symp_id ) {

	// 最新のシンポジウムID読み込み
	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM symposium_data';
	$sql .= '    WHERE';
	$sql .= '        symp_id = "' . $symp_id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'symp_date1' ]      = cn_contract( $res, 0, 'symp_date1' );
			$return_array[ 'symp_date2' ]      = cn_contract( $res, 0, 'symp_date2' );
			$return_array[ 'symp_date3' ]      = cn_contract( $res, 0, 'symp_date3' );
		}
	}
	db_close($cnn);


	$now_Ymd = date( 'Ymd' );

	if ( $return_array[ 'symp_date1' ] <= $now_Ymd && $return_array[ 'symp_date2' ] >= $now_Ymd ) {
		return TRUE;
	} else {
		return FALSE;
	}

}



// ***********************************************
// シンポジウム参加費の計算
// @return: string: 参加費
// ***********************************************
function symposium_Data_Calc_Price($member_kubun, $symp_id ) {
	
	$pay_money = 0;

	$price_array = symposium_Price_Read( $symp_id ); // 参加費読込

	$money = 0;
	$money += $price_array[$member_kubun];

	$pay_money = $money;

	return $pay_money;
}


// ***********************************************
// シンポジウム参加費用の読込
// @return 配列
// ***********************************************
function symposium_Price_Read( $symp_id ) {

	$return_array = array();

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM symposium_data";
	$sql .= "     WHERE";
	$sql .= "        symp_id = '" . $symp_id  . "' AND ";
	$sql .= "        status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){

			$price01_mixed_text    = cn_contract($res, 0, "symp_pric1");

			// バラして後に費用計算で使用
			$return_array =  price_Apart( $price01_mixed_text );

		}
	}
//	db_close($cnn);

	return $return_array;

}


// ***********************************************
// シンポジウムテーブル エラーチェック
// ***********************************************
function symp_Error_Check($arr) {
	
	$err_msg = '';

	if ( ! $arr[ 'symp_name' ] ) {
		$err_msg .= '名称が未入力です';
		return $err_msg;
	}

	while( list( $key, $val ) = each( $arr[ 'price1' ] ) ) {

		if ( is_Number( $val ) ) {
			$err_msg .= '料金は半角数字のみしか使用できません';
			return $err_msg;
			break;
		}
	}


	return $err_msg;
}


// **********************************************************************************************
// シンポジウム参加者関連
// **********************************************************************************************
/*
▼symp_sanka_data
-----------------------
sanka_id
symp_id
sanka_uid
pay_status
pay_date
pay_date_plan
pay_way
pay_way_text
pay_money
sanka_biko1
status
system_dt
update_dt
regist_dt

▼symp_sanka_member_mast
-----------------------
member_id
sanka_id
symp_id
member_userid
member_name
member_kana
member_info01
member_info02
member_kubun01
member_mail
member_zip1
member_zip2
member_address
member_tel
member_fax
intro_name
intro_info01
intro_info02
intro_zip1
intro_zip2
intro_address
intro_tel
status
system_dt
update_dt
regist_dt
*/
// ***********************************************
// シンポジウム参加者テーブル IDを元にSELECT
// @return: none
// ***********************************************
function symp_Sanka_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM symp_sanka_data";
	$sql .= "    INNER JOIN symp_sanka_member_mast ON";
	$sql .= "    symp_sanka_data.sanka_id = symp_sanka_member_mast.sanka_id";
	$sql .= "    WHERE";
	$sql .= "        symp_sanka_data.sanka_id = " . $id;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'sanka_id' ]       = cn_contract( $res, 0, 'sanka_id' );
			$return_array[ 'symp_id' ]        = cn_contract( $res, 0, 'symp_id' );
			$return_array[ 'sanka_uid' ]      = cn_contract( $res, 0, 'sanka_uid' );
			$return_array[ 'pay_status' ]     = cn_contract( $res, 0, 'pay_status' );
			$return_array[ 'pay_date' ]       = cn_contract( $res, 0, 'pay_date' );
			$return_array[ 'pay_date_plan' ]  = cn_contract( $res, 0, 'pay_date_plan' );
			$return_array[ 'pay_way' ]        = cn_contract( $res, 0, 'pay_way' );
			$return_array[ 'pay_way_text' ]   = cn_contract( $res, 0, 'pay_way_text' );
			$return_array[ 'pay_money' ]      = cn_contract( $res, 0, 'pay_money' );
			$return_array[ 'sanka_biko1' ]    = cn_contract( $res, 0, 'sanka_biko1' );

			$return_array[ 'member_id' ]      = cn_contract( $res, 0, 'member_id' );
			$return_array[ 'member_userid' ]  = cn_contract( $res, 0, 'member_userid' );
			$return_array[ 'member_name' ]    = cn_contract( $res, 0, 'member_name' );
			$return_array[ 'member_kana' ]    = cn_contract( $res, 0, 'member_kana' );
			$return_array[ 'member_info01' ]  = cn_contract( $res, 0, 'member_info01' );
			$return_array[ 'member_info02' ]  = cn_contract( $res, 0, 'member_info02' );
			$return_array[ 'member_kubun01' ] = cn_contract( $res, 0, 'member_kubun01' );
			$return_array[ 'member_mail' ]    = cn_contract( $res, 0, 'member_mail' );
			$return_array[ 'member_zip1' ]    = cn_contract( $res, 0, 'member_zip1' );
			$return_array[ 'member_zip2' ]    = cn_contract( $res, 0, 'member_zip2' );
			$return_array[ 'member_address' ] = cn_contract( $res, 0, 'member_address' );
			$return_array[ 'member_tel' ]     = cn_contract( $res, 0, 'member_tel' );
			$return_array[ 'member_fax' ]     = cn_contract( $res, 0, 'member_fax' );
			$return_array[ 'intro_name' ]     = cn_contract( $res, 0, 'intro_name' );
			$return_array[ 'intro_info01' ]   = cn_contract( $res, 0, 'intro_info01' );
			$return_array[ 'intro_info02' ]   = cn_contract( $res, 0, 'intro_info02' );
			$return_array[ 'intro_zip1' ]     = cn_contract( $res, 0, 'intro_zip1' );
			$return_array[ 'intro_zip2' ]     = cn_contract( $res, 0, 'intro_zip2' );
			$return_array[ 'intro_address' ]  = cn_contract( $res, 0, 'intro_address' );
			$return_array[ 'intro_tel' ]      = cn_contract( $res, 0, 'intro_tel' );

		}
	}

	db_close($cnn);

	return $return_array;

}


// ***********************************************
// シンポジウム参加者テーブル 自由に検索できます
// @return: array
// ***********************************************
function symp_Sanka_Data_Custom( $search_array ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	while( list( $key, $val ) = each( $search_array ) ) {
		$sql_col[] = '        ' . $key . ' = "' . mysql_real_escape_string( $val ) . '"';
	}
	$where_sql = implode( ' AND ', $sql_col );

	$sql  = "SELECT * FROM symp_sanka_data";
	$sql .= "    INNER JOIN symp_sanka_member_mast ON";
	$sql .= "    symp_sanka_data.sanka_id = symp_sanka_member_mast.sanka_id";
	$sql .= "    WHERE";
	$sql .= $where_sql;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'sanka_id' ]       = cn_contract( $res, 0, 'sanka_id' );
			$return_array[ 'symp_id' ]        = cn_contract( $res, 0, 'symp_id' );
			$return_array[ 'sanka_uid' ]      = cn_contract( $res, 0, 'sanka_uid' );
			$return_array[ 'pay_status' ]     = cn_contract( $res, 0, 'pay_status' );
			$return_array[ 'pay_date' ]       = cn_contract( $res, 0, 'pay_date' );
			$return_array[ 'pay_date_plan' ]  = cn_contract( $res, 0, 'pay_date_plan' );
			$return_array[ 'pay_way' ]        = cn_contract( $res, 0, 'pay_way' );
			$return_array[ 'pay_way_text' ]   = cn_contract( $res, 0, 'pay_way_text' );
			$return_array[ 'pay_money' ]      = cn_contract( $res, 0, 'pay_money' );
			$return_array[ 'sanka_biko1' ]    = cn_contract( $res, 0, 'sanka_biko1' );

			$return_array[ 'member_id' ]      = cn_contract( $res, 0, 'member_id' );
			$return_array[ 'member_userid' ]  = cn_contract( $res, 0, 'member_userid' );
			$return_array[ 'member_name' ]    = cn_contract( $res, 0, 'member_name' );
			$return_array[ 'member_kana' ]    = cn_contract( $res, 0, 'member_kana' );
			$return_array[ 'member_info01' ]  = cn_contract( $res, 0, 'member_info01' );
			$return_array[ 'member_info02' ]  = cn_contract( $res, 0, 'member_info02' );
			$return_array[ 'member_kubun01' ] = cn_contract( $res, 0, 'member_kubun01' );
			$return_array[ 'member_mail' ]    = cn_contract( $res, 0, 'member_mail' );
			$return_array[ 'member_zip1' ]    = cn_contract( $res, 0, 'member_zip1' );
			$return_array[ 'member_zip2' ]    = cn_contract( $res, 0, 'member_zip2' );
			$return_array[ 'member_address' ] = cn_contract( $res, 0, 'member_address' );
			$return_array[ 'member_tel' ]     = cn_contract( $res, 0, 'member_tel' );
			$return_array[ 'member_fax' ]     = cn_contract( $res, 0, 'member_fax' );
			$return_array[ 'intro_name' ]     = cn_contract( $res, 0, 'intro_name' );
			$return_array[ 'intro_info01' ]   = cn_contract( $res, 0, 'intro_info01' );
			$return_array[ 'intro_info02' ]   = cn_contract( $res, 0, 'intro_info02' );
			$return_array[ 'intro_zip1' ]     = cn_contract( $res, 0, 'intro_zip1' );
			$return_array[ 'intro_zip2' ]     = cn_contract( $res, 0, 'intro_zip2' );
			$return_array[ 'intro_address' ]  = cn_contract( $res, 0, 'intro_address' );
			$return_array[ 'intro_tel' ]      = cn_contract( $res, 0, 'intro_tel' );

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// シンポジウム参加者テーブル INSERT
// @return: none
// ***********************************************
function symp_Sanka_Data_Insert( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sanka_uid_max = 0;
	$sql  = " SELECT max(sanka_uid) AS maxid FROM symp_sanka_data";
	$sql .= "    WHERE symp_id = '" . $arr[ 'symp_id' ] . "'";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$sanka_uid_max = cn_contract($res, 0, "maxid");
		}
	}

	$arr[ 'sanka_uid' ] = $sanka_uid_max + 1;

	$sql = 'INSERT INTO symp_sanka_data (';
	$sql .= '        symp_id,';
	$sql .= '        sanka_uid,';
	$sql .= '        pay_status,';
	$sql .= '        pay_date,';
	$sql .= '        pay_date_plan,';
	$sql .= '        pay_way,';
	$sql .= '        pay_way_text,';
	$sql .= '        pay_money,';
	$sql .= '        sanka_biko1,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'sanka_uid' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_status' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_date' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_date_plan' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_way' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_way_text' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'pay_money' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'sanka_biko1' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);

	$sanka_id_max = 0;
	$sql  = " SELECT max(sanka_id) AS maxid FROM symp_sanka_data";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$sanka_id_max = cn_contract($res, 0, "maxid");
		}
	}
	$arr[ 'sanka_id' ] = $sanka_id_max;

	$sql = 'INSERT INTO symp_sanka_member_mast (';
	$sql .= '        sanka_id,';
	$sql .= '        symp_id,';
	$sql .= '        member_userid,';
	$sql .= '        member_name,';
	$sql .= '        member_kana,';
	$sql .= '        member_info01,';
	$sql .= '        member_info02,';
	$sql .= '        member_kubun01,';
	$sql .= '        member_mail,';
	$sql .= '        member_zip1,';
	$sql .= '        member_zip2,';
	$sql .= '        member_address,';
	$sql .= '        member_tel,';
	$sql .= '        member_fax,';
	$sql .= '        intro_name,';
	$sql .= '        intro_info01,';
	$sql .= '        intro_info02,';
	$sql .= '        intro_zip1,';
	$sql .= '        intro_zip2,';
	$sql .= '        intro_address,';
	$sql .= '        intro_tel,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'sanka_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_userid' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kana' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info02' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kubun01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_mail' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_address' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_tel' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_fax' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_info01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_info02' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_zip1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_zip2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_address' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'intro_tel' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

	return $arr[ 'sanka_uid' ];

}

// ***********************************************
// シンポジウム参加者テーブル UPDATE
// @return: none
// ***********************************************
function symp_Sanka_Data_Update( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE symp_sanka_data SET';
	$sql .= '        symp_id = "' .       mysql_real_escape_string( $arr[ 'symp_id' ] ) . '",';
	$sql .= '        sanka_uid = "' .     mysql_real_escape_string( $arr[ 'sanka_uid' ] ) . '",';
	$sql .= '        pay_status = "' .    mysql_real_escape_string( $arr[ 'pay_status' ] ) . '",';
	$sql .= '        pay_date = "' .      mysql_real_escape_string( $arr[ 'pay_date' ] ) . '",';
	$sql .= '        pay_date_plan = "' . mysql_real_escape_string( $arr[ 'pay_date_plan' ] ) . '",';
	$sql .= '        pay_way = "' .       mysql_real_escape_string( $arr[ 'pay_way' ] ) . '",';
	$sql .= '        pay_way_text = "' .  mysql_real_escape_string( $arr[ 'pay_way_text' ] ) . '",';
	$sql .= '        pay_money = "' .     mysql_real_escape_string( $arr[ 'pay_money' ] ) . '",';
	$sql .= '        sanka_biko1 = "' .   mysql_real_escape_string( $arr[ 'sanka_biko1' ] ) . '",';
	$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        sanka_id = "' . $arr[ 'sanka_id' ] . '"';
	$res = cn_query($sql, $cnn);

	$sql = 'UPDATE symp_sanka_member_mast SET';
	$sql .= '        sanka_id = "' .       mysql_real_escape_string( $arr[ 'sanka_id' ] ) . '",';
	$sql .= '        symp_id = "' .        mysql_real_escape_string( $arr[ 'symp_id' ] ) . '",';
	$sql .= '        member_userid = "' .  mysql_real_escape_string( $arr[ 'member_userid' ] ) . '",';
	$sql .= '        member_name = "' .    mysql_real_escape_string( $arr[ 'member_name' ] ) . '",';
	$sql .= '        member_kana = "' .    mysql_real_escape_string( $arr[ 'member_kana' ] ) . '",';
	$sql .= '        member_info01 = "' .  mysql_real_escape_string( $arr[ 'member_info01' ] ) . '",';
	$sql .= '        member_info02 = "' .  mysql_real_escape_string( $arr[ 'member_info02' ] ) . '",';
	$sql .= '        member_kubun01 = "' . mysql_real_escape_string( $arr[ 'member_kubun01' ] ) . '",';
	$sql .= '        member_mail = "' .    mysql_real_escape_string( $arr[ 'member_mail' ] ) . '",';
	$sql .= '        member_zip1 = "' .    mysql_real_escape_string( $arr[ 'member_zip1' ] ) . '",';
	$sql .= '        member_zip2 = "' .    mysql_real_escape_string( $arr[ 'member_zip2' ] ) . '",';
	$sql .= '        member_address = "' . mysql_real_escape_string( $arr[ 'member_address' ] ) . '",';
	$sql .= '        member_tel = "' .     mysql_real_escape_string( $arr[ 'member_tel' ] ) . '",';
	$sql .= '        member_fax = "' .     mysql_real_escape_string( $arr[ 'member_fax' ] ) . '",';
	$sql .= '        intro_name = "' .     mysql_real_escape_string( $arr[ 'intro_name' ] ) . '",';
	$sql .= '        intro_info01 = "' .   mysql_real_escape_string( $arr[ 'intro_info01' ] ) . '",';
	$sql .= '        intro_info02 = "' .   mysql_real_escape_string( $arr[ 'intro_info02' ] ) . '",';
	$sql .= '        intro_zip1 = "' .     mysql_real_escape_string( $arr[ 'intro_zip1' ] ) . '",';
	$sql .= '        intro_zip2 = "' .     mysql_real_escape_string( $arr[ 'intro_zip2' ] ) . '",';
	$sql .= '        intro_address = "' .  mysql_real_escape_string( $arr[ 'intro_address' ] ) . '",';
	$sql .= '        intro_tel = "' .      mysql_real_escape_string( $arr[ 'intro_tel' ] ) . '",';
	$sql .= '        update_dt = "' .      date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        member_id = "' . $arr[ 'member_id' ] . '"';

	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// シンポジウム参加者テーブル 消去
// @return: none
// ***********************************************
function symp_Sanka_Data_Delete( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE symp_sanka_data SET';
	$sql .= '        status = 1';
	$sql .= '    WHERE';
	$sql .= '        sanka_id = "' . $arr[ 'sanka_id' ] . '"';
	$res = cn_query($sql, $cnn);

	$sql = 'UPDATE symp_sanka_member_mast SET';
	$sql .= '        status = 1';
	$sql .= '    WHERE';
	$sql .= '        sanka_id = "' . $arr[ 'sanka_id' ] . '"';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// シンポジウム参加者テーブル 入金確定
// @return: none
// ***********************************************
function symp_Sanka_Data_Pay_On( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'UPDATE symp_sanka_data SET';
	$sql .= '        pay_status = 2,';
	$sql .= '        pay_date = "' . mysql_real_escape_string( $arr[ 'pay_date' ] ) . '",';
	$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        sanka_id = "' . $arr[ 'sanka_id' ] . '"';
	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// シンポジウム参加者テーブル 入金取り消し
// @return: none
// ***********************************************
function symp_Sanka_Data_Pay_Off( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'UPDATE symp_sanka_data SET';
	$sql .= '        pay_status = 1,';
	$sql .= '        pay_date = "",';
	$sql .= '        update_dt = "' . date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        sanka_id = "' . $arr[ 'sanka_id' ] . '"';
	$res = cn_query($sql, $cnn);
	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// シンポジウム参加者テーブル フォームからの入力の調整
// @return: 調整後の配列
// ***********************************************
function symp_Sanka_Adjust($arr) {

	// 会員番号が0の場合、区分を非会員にする
	if ( $arr[ 'member_userid' ] === '0' ) {
		$arr[ 'member_kubun01' ] = 99;
	} else {
		// それ以外の場合で非会員になっている場合は正会員にする
		if ( $arr[ 'member_kubun01' ] == 99 ) {
			$arr[ 'member_kubun01' ] = 1;
		}
	}

	return $arr;
}


// ***********************************************
// シンポジウム参加者テーブル フォームからの入力の調整(表画面用）
// @return: 調整後の配列
// ***********************************************
function symp_Sanka_Adjust_PC($arr) {

	// 調整する
	$arr[ 'pay_status' ] = 1;

/*
	// 会員番号が0の場合、区分を非会員にする
	if ( $arr[ 'member_userid' ] === '0' ) {
		$arr[ 'member_kubun01' ] = 99;
	} else {
		// それ以外の場合で非会員になっている場合は正会員にする
		if ( $arr[ 'member_kubun01' ] == 99 ) {
			$arr[ 'member_kubun01' ] = 1;
		}
	}
*/
	return $arr;
}

// ***********************************************
// シンポジウム参加者テーブル CSV保存
// @return: string: filename
// ***********************************************
function symp_Sanka_Data_Set_CSV($symp_id, $options) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM symp_sanka_data";
	$sql .= "    INNER JOIN symp_sanka_member_mast ON";
	$sql .= "    symp_sanka_data.sanka_id = symp_sanka_member_mast.sanka_id";
	$sql .= "    WHERE";
	$sql .= "        symp_sanka_data.symp_id = '" . $symp_id . "' AND";
	$sql .= "        symp_sanka_data.status  = 0";
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			for ( $i=0;$i<$cnt;$i++ ) {

				$d[$i][ 'sanka_id' ]       = cn_contract( $res, $i, 'sanka_id' );
				$d[$i][ 'symp_id' ]        = cn_contract( $res, $i, 'symp_id' );
				$d[$i][ 'sanka_uid' ]      = cn_contract( $res, $i, 'sanka_uid' );
				$d[$i][ 'pay_status' ]     = cn_contract( $res, $i, 'pay_status' );
				$d[$i][ 'pay_date' ]       = cn_contract( $res, $i, 'pay_date' );
				$d[$i][ 'pay_date_plan' ]  = cn_contract( $res, $i, 'pay_date_plan' );
				$d[$i][ 'pay_way' ]        = cn_contract( $res, $i, 'pay_way' );
				$d[$i][ 'pay_way_text' ]   = cn_contract( $res, $i, 'pay_way_text' );
				$d[$i][ 'pay_money' ]      = cn_contract( $res, $i, 'pay_money' );
				$d[$i][ 'sanka_biko1' ]    = cn_contract( $res, $i, 'sanka_biko1' );

				$d[$i][ 'member_id' ]      = cn_contract( $res, $i, 'member_id' );
				$d[$i][ 'member_userid' ]  = cn_contract( $res, $i, 'member_userid' );
				$d[$i][ 'member_name' ]    = cn_contract( $res, $i, 'member_name' );
				$d[$i][ 'member_kana' ]    = cn_contract( $res, $i, 'member_kana' );
				$d[$i][ 'member_info01' ]  = cn_contract( $res, $i, 'member_info01' );
				$d[$i][ 'member_info02' ]  = cn_contract( $res, $i, 'member_info02' );
				$d[$i][ 'member_kubun01' ] = cn_contract( $res, $i, 'member_kubun01' );
				$d[$i][ 'member_mail' ]    = cn_contract( $res, $i, 'member_mail' );
				$d[$i][ 'member_zip1' ]    = cn_contract( $res, $i, 'member_zip1' );
				$d[$i][ 'member_zip2' ]    = cn_contract( $res, $i, 'member_zip2' );
				$d[$i][ 'member_address' ] = cn_contract( $res, $i, 'member_address' );
				$d[$i][ 'member_tel' ]     = cn_contract( $res, $i, 'member_tel' );
				$d[$i][ 'member_fax' ]     = cn_contract( $res, $i, 'member_fax' );
				$d[$i][ 'intro_name' ]     = cn_contract( $res, $i, 'intro_name' );
				$d[$i][ 'intro_info01' ]   = cn_contract( $res, $i, 'intro_info01' );
				$d[$i][ 'intro_info02' ]   = cn_contract( $res, $i, 'intro_info02' );
				$d[$i][ 'intro_zip1' ]     = cn_contract( $res, $i, 'intro_zip1' );
				$d[$i][ 'intro_zip2' ]     = cn_contract( $res, $i, 'intro_zip2' );
				$d[$i][ 'intro_address' ]  = cn_contract( $res, $i, 'intro_address' );
				$d[$i][ 'intro_tel' ]      = cn_contract( $res, $i, 'intro_tel' );

				// データ整形
				$d[$i]['member_kubun01_text'] = $options['member_kubun'][$d[$i][ 'member_kubun01' ]];
				$d[$i]['member_zip']          = $d[$i][ 'member_zip1' ] . ' - ' . $d[$i][ 'member_zip2' ];
				$d[$i]['pay_status_text']     = $options['pay_status'][$d[$i][ 'pay_status' ]];
				$d[$i]['pay_date_text']       = date_Format_1( $d[$i][ 'pay_date' ] );
				$d[$i]['pay_date_plan_text']  = date_Format_1( $d[$i][ 'pay_date_plan' ] );
				$d[$i]['pay_way_type_text']   = $options['pay_way'][$d[$i][ 'pay_way' ]];

			}
		}
	}

	db_close( $cnn );

	// エクセルインポート
	$excel = new PHPExcel();

	// 各種設定
	$save_dir  = '../../csv/';
	$file_name = 'symp_sankasya_data.xls';

	// シートの設定   
	$excel->setActiveSheetIndex(0);
	$sheet = $excel->getActiveSheet();
	$sheet->setTitle('Sheet1');

	$line_cnf_array = array(

		// 参加者情報
		array( 'title' => '会員番号',       'data_id' => 'member_userid' ),
		array( 'title' => '会員区分',       'data_id' => 'member_kubun01_text' ),
		array( 'title' => '氏名',           'data_id' => 'member_name' ),
		array( 'title' => '勤務先/学校',    'data_id' => 'member_info01' ),
		array( 'title' => '所属',           'data_id' => 'member_info02' ),
		array( 'title' => 'メールアドレス', 'data_id' => 'member_mail' ),
		array( 'title' => '電話番号',       'data_id' => 'member_tel' ),
		array( 'title' => 'FAX番号',        'data_id' => 'member_fax' ),
		array( 'title' => '郵便番号',       'data_id' => 'member_zip' ),
		array( 'title' => '住所',           'data_id' => 'member_address' ),

/*		// 紹介者情報
		array( 'title' => '氏名',           'data_id' => 'intro_name' ),
		array( 'title' => '勤務先/学校',    'data_id' => 'intro_info01' ),
		array( 'title' => '所属',           'data_id' => 'intro_info02' ),
		array( 'title' => '電話番号',       'data_id' => 'intro_tel' ),
		array( 'title' => '郵便番号',       'data_id' => 'intro_zip' ),
		array( 'title' => '住所',           'data_id' => 'intro_address' ),
*/

		// 参加者支払情報
		array( 'title' => '入金状態',          'data_id' => 'pay_status_text' ),
		array( 'title' => '入金日',            'data_id' => 'pay_date_text' ),
		array( 'title' => '入金予定日',        'data_id' => 'pay_date_plan_text' ),
		array( 'title' => '支払方法',          'data_id' => 'pay_way_type_text' ),
		array( 'title' => '支払方法(その他)',  'data_id' => 'pay_way_text' ),
		array( 'title' => '備考',              'data_id' => 'sanka_biko1' ),

	);

	$line_id_array = array(
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
		'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
	);

	// タイトル行挿入
	$line_cnt = count( $line_cnf_array );
	for ( $i=0;$i<$line_cnt;$i++ ) {
		$col = 1;
		$line_id = $line_id_array[$i];

		$cell  = $line_id . $col;
		$value = $line_cnf_array[$i]['title'];

		$sheet->setCellValue( $cell, $value);
	}

	// データ抽出
	$data_cnt = count( $d );
	for($i=0;$i<$data_cnt;$i++ ) {

		$col = $i+2;

		for ( $j=0;$j<$line_cnt;$j++ ) {

			$line_id = $line_id_array[$j];
			$data_id = $line_cnf_array[$j]['data_id'];

			$cell = $line_id. $col;
			$value = $d[$i][$data_id];

			$sheet->setCellValue($cell,$value);
		}

	}

	// Excel2003形式で保存する
	$writer = PHPExcel_IOFactory::createWriter($excel, "Excel5");
	$writer->save( $save_dir . $file_name );

	return $file_name;

}

// ***********************************************
// シンポジウム参加者テーブル メール送信
// ***********************************************
function symp_Sanka_Data_Send_Mail( $arr, $options, $mode) {

	// ================================
	// メールメイン部分整形
	// ================================
	$mail_main_text = <<<EOD

-------------------------------
■参加者情報
-------------------------------

[受付番号]
{$arr[ 'sanka_uid' ]}

[会員区分]
{$options['member_kubun'][ $arr['member_kubun01'] ]}

[会員番号]
{$arr[ 'member_userid' ]}

[氏名]
{$arr['member_name']}

[カナ]
{$arr['member_kana']}

[メールアドレス]
{$arr['member_mail']}

[勤務先/学校名・所属]
{$arr['member_info01']} / {$arr['member_info02']}

[電話番号]
{$arr['member_tel']}

[FAX番号]
{$arr['member_fax']}

[所属住所]
〒{$arr['member_zip1']}-{$arr['member_zip2']}
{$arr['member_address']}

-------------------------------
■入金・参加情報
-------------------------------
[参加費]
{$arr['pay_money']}円

EOD;

	// 支払情報系を操作
	if ( $arr['pay_way_view_status'] == 1 ) {

		$mail_main_text .= <<<EOD

[送金予定日]
{$arr['pay_date_plan_format']}

[支払方法]
{$options['pay_way'][$arr['pay_way']]}

EOD;

	}

	$mail_main_text .= <<<EOD

[備考]
{$arr['sanka_biko1']}

[請求書希望]
{$options['pay_bill'][$arr['pay_bill']]}


EOD;



	// ================================
	// 署名読み込み
	// ================================
	$mail_assign = get_Mail_Assign();


	// ================================
	// 表画面からの登録
	// ================================
	if ( $mode == 'pc_regist' ) {

		// 管理者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'symp_name' ] . ' 参加申込受付メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_SYSTEM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

{$arr[ 'symp_name' ]} 参加申込がありました。

以下【登録】された内容です。

{$mail_main_text}

-------------------------------
■その他の情報

[ログイン状況]
{$options['member_login'][ $arr[ 'login_flg' ] ]}


{$mail_assign}


EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

		$mail_data = array();


		// 申込者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'symp_name' ] . ' 参加申込受付メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = $arr[ 'member_mail' ]; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

{$arr[ 'member_name' ]}様

{$arr[ 'symp_name' ]} 参加申込を受け付けました。
請求書の発行をご希望でない場合，参加費は，受付番号を明記の上，
下記の方法で送金してください。

※参加費のご送金に当たっては，手数料が一番安い郵便振替のご利用をおすすめします。
郵便局に備え付けの郵便振替用紙に，
　口座番号：00100-3-66805
　加入者名：一般社団法人軽金属学会
とご記入の上，通信欄に必要事項を明記してご送金下さい。

※銀行振込をご利用の場合は，振込者欄に受付番号と申込者の個人名を入れてください。
　振込先：三井住友銀行　銀座支店　普通　口座番号1530334
　口座名義：一般社団法人軽金属学会

以下【登録】された内容です。


{$mail_main_text}


{$mail_assign}


EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

	}


	// ================================
	// 表画面からの編集
	// ================================
	if ( $mode == 'pc_modify' ) {

		// 管理者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'symp_name' ] . ' 参加内容編集メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_SYSTEM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

{$arr[ 'symp_name' ]} 参加内容の編集がありました。

以下【編集】された内容です。

{$mail_main_text}

-------------------------------
■その他の情報

[ログイン状況]
{$options['member_login'][ $arr[ 'login_flg' ] ]}


{$mail_assign}


EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

		$mail_data = array();


		// 申込者にメール送信
		// ----------------------------
		$mail_data[ 'subject' ]     = $arr[ 'symp_name' ] . ' 参加内容編集 受付メール'; //件名
		$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
		$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data[ 'to' ]          = $arr[ 'member_mail' ]; //メールの宛先
		$mail_data[ 'body' ]        = <<<EOD

{$arr[ 'member_name' ]}様

{$arr[ 'symp_name' ]} 参加内容の編集を受け付けました。

以下 【編集】された内容です。


【参加費用】の記載もありますので、
ご確認ください。


{$mail_main_text}


{$mail_assign}


EOD;
		// メール送信処理１（管理者宛）
		$err_msg = common_mail_send_1( $mail_data );

	}

}


// ***********************************************
// シンポジウム参加者テーブル 同じ大会での申込者の存在チェック（会員番号で判断）
// @return: TRUE:存在する FALSE:存在しない
// ***********************************************
function symp_Sanka_Userid_Double_Check( $userid, $symp_id ) {

	$flg = FALSE;

	// 非会員以外を判別
	if ( $userid > 0 ) {
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = 'SELECT * FROM symp_sanka_data';
		$sql .= '    INNER JOIN symp_sanka_member_mast ON';
		$sql .= '    symp_sanka_data.sanka_id = symp_sanka_member_mast.sanka_id';
		$sql .= '    WHERE';
		$sql .= '        symp_sanka_data.symp_id = "' . $symp_id . '" AND';
		$sql .= '        symp_sanka_member_mast.member_userid = "' . $userid . '" AND';
		$sql .= '        symp_sanka_data.status = 0';
		$res = cn_query( $sql, $cnn );

		if ( $res == true ) {
			$cnt = cn_count( $res );
			if ( $cnt > 0 ) {

				$flg = TRUE;

			}
		}

//		db_close($cnn);

	}

	return $flg;

}



// ***********************************************
// シンポジウム参加者テーブル エラーチェック
// @return: エラーを一個
// ***********************************************
function symp_Sanka_Error_Check($arr, $mode) {
	
	$err_msg = '';

	// 管理画面  => 登録
	// --------------------------------
	if ( $mode == 'admin_regist' ) {
		if ( $arr[ 'member_userid' ] !== '0' ) {

			if ( ! $arr[ 'member_userid' ] ) {
				$err_msg .= '参加者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'member_userid' ] ) ) {
				$err_msg .= '参加者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'member_userid' ] ) != 6) {
				$err_msg .= '参加者の会員番号は6文字で決定してください';
				return $err_msg;
			}

			if ( symp_Sanka_Userid_Double_Check( $arr['member_userid'], $arr['symp_id'] ) ) {
				$err_msg .= '同じ会員番号で参加申込されています。ひとり、１枠しか参加申込できません。';
				return $err_msg;
			}

		}

		if ( ! $arr[ 'member_name' ] ) {
			$err_msg .= '参加者の名前が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'member_mail' ] ) {
			$err_msg .= '参加者のメールアドレスが未入力です';
			return $err_msg;
		}

		if ( is_Mail( $arr[ 'member_mail' ] ) ) {
			$err_msg .= '参加者のメールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
			return $err_msg;
		}

		if ( $arr[ 'member_tel' ] ) {
			if ( is_Tell( $arr[ 'member_tel' ] ) ) {
				$err_msg .= '参加者の電話番号は' . is_Tell( $arr[ 'member_tel' ] );
				return $err_msg;
			}
		}

		if ( $arr[ 'member_zip1' ] ) {
			if ( is_Number( $arr[ 'member_zip1' ] ) ) {
				$err_msg .= '参加者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
				$err_msg .= '参加者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'member_zip2' ] ) {
			if ( is_Number( $arr[ 'member_zip2' ] ) ) {
				$err_msg .= '参加者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
				$err_msg .= '参加者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( ! $arr[ 'member_kubun01' ] ) {
			$err_msg .= '参加者の会員区分が選択されていません';
			return $err_msg;
		}

		if ( $arr[ 'intro_zip1' ] ) {
			if ( is_Number( $arr[ 'intro_zip1' ] ) ) {
				$err_msg .= '紹介者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip1' ] ) > 3 ) {
				$err_msg .= '紹介者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_zip2' ] ) {
			if ( is_Number( $arr[ 'intro_zip2' ] ) ) {
				$err_msg .= '紹介者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip2' ] ) > 4 ) {
				$err_msg .= '紹介者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_tel' ] ) {
			if ( is_Tell( $arr[ 'intro_tel' ] ) ) {
				$err_msg .= '紹介者の電話番号は' . is_Tell( $arr[ 'intro_tel' ] );
				return $err_msg;
			}
		}
	}


	// 管理画面  => 編集
	// --------------------------------
	if ( $mode == 'admin_modify' ) {
		if ( $arr[ 'member_userid' ] !== '0' ) {

			if ( ! $arr[ 'member_userid' ] ) {
				$err_msg .= '参加者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'member_userid' ] ) ) {
				$err_msg .= '参加者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'member_userid' ] ) != 6) {
				$err_msg .= '参加者の会員番号は6文字で決定してください';
				return $err_msg;
			}

			// 会員番号の重複を避ける(同じ会員番号の場合は通す）
			if ( $arr['old_member_userid'] != $arr['member_userid'] ) {
				if ( symp_Sanka_Userid_Double_Check( $arr['member_userid'], $arr['symp_id'] ) ) {
					$err_msg .= '同じ会員番号で参加申込されています。ひとり、１枠しか参加申込できません。';
					return $err_msg;
				}
			}

		}

		if ( ! $arr[ 'member_name' ] ) {
			$err_msg .= '参加者の名前が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'member_mail' ] ) {
			$err_msg .= '参加者のメールアドレスが未入力です';
			return $err_msg;
		}

		if ( is_Mail( $arr[ 'member_mail' ] ) ) {
			$err_msg .= '参加者のメールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
			return $err_msg;
		}

		if ( $arr[ 'member_tel' ] ) {
			if ( is_Tell( $arr[ 'member_tel' ] ) ) {
				$err_msg .= '参加者の電話番号は' . is_Tell( $arr[ 'member_tel' ] );
				return $err_msg;
			}
		}

		if ( $arr[ 'member_zip1' ] ) {
			if ( is_Number( $arr[ 'member_zip1' ] ) ) {
				$err_msg .= '参加者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
				$err_msg .= '参加者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'member_zip2' ] ) {
			if ( is_Number( $arr[ 'member_zip2' ] ) ) {
				$err_msg .= '参加者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
				$err_msg .= '参加者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( ! $arr[ 'member_kubun01' ] ) {
			$err_msg .= '参加者の会員区分が選択されていません';
			return $err_msg;
		}

		if ( $arr[ 'intro_zip1' ] ) {
			if ( is_Number( $arr[ 'intro_zip1' ] ) ) {
				$err_msg .= '紹介者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip1' ] ) > 3 ) {
				$err_msg .= '紹介者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_zip2' ] ) {
			if ( is_Number( $arr[ 'intro_zip2' ] ) ) {
				$err_msg .= '紹介者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip2' ] ) > 4 ) {
				$err_msg .= '紹介者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_tel' ] ) {
			if ( is_Tell( $arr[ 'intro_tel' ] ) ) {
				$err_msg .= '紹介者の電話番号は' . is_Tell( $arr[ 'intro_tel' ] );
				return $err_msg;
			}
		}
	}


	// 表画面  => 登録
	// --------------------------------
	if ( $mode == 'pc_regist' ) {
		if ( ! $arr[ 'member_kubun01' ] ) {
			$err_msg .= '参加者の会員区分が選択されていません';
			return $err_msg;
		}

		if ( $arr[ 'member_userid' ] !== '0' ) {

			if ( ! $arr[ 'member_userid' ] ) {
				$err_msg .= '参加者の会員番号が未入力です';
				return $err_msg;
			}

			if ( is_Number( $arr[ 'member_userid' ] ) ) {
				$err_msg .= '参加者の会員番号は半角数字以外の入力はできません';
				return $err_msg;
			}

			if ( strlen( $arr[ 'member_userid' ] ) != 6) {
				$err_msg .= '参加者の会員番号は6文字で決定してください';
				return $err_msg;
			}

			if ( symp_Sanka_Userid_Double_Check( $arr['member_userid'], $arr['symp_id'] ) ) {
				$err_msg .= '同じ会員番号で参加申込されています。ひとり、１枠しか申込できません。<br />ログインされている方は参加申込内容編集ページお進みください。<br />ログインしていない方はログイン後に参加申込内容編集ページで編集してください。';
				return $err_msg;
			}

		}

		if ( ! $arr[ 'member_name' ] ) {
			$err_msg .= '参加者の名前が未入力です';
			return $err_msg;
		}

		if ( ! $arr[ 'member_mail' ] ) {
			$err_msg .= '参加者のメールアドレスが未入力です';
			return $err_msg;
		}

		if ( is_Mail( $arr[ 'member_mail' ] ) ) {
			$err_msg .= '参加者のメールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
			return $err_msg;
		}

		if ( $arr[ 'member_tel' ] ) {
			if ( is_Tell( $arr[ 'member_tel' ] ) ) {
				$err_msg .= '参加者の電話番号は' . is_Tell( $arr[ 'member_tel' ] );
				return $err_msg;
			}
		}

	//	if ( $arr[ 'member_zip1' ] ) {
			if ( is_Number( $arr[ 'member_zip1' ] ) ) {
				$err_msg .= '参加者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
				$err_msg .= '参加者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
	//	}

	//	if ( $arr[ 'member_zip2' ] ) {
			if ( is_Number( $arr[ 'member_zip2' ] ) ) {
				$err_msg .= '参加者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
				$err_msg .= '参加者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
	//	}

		if ( ! $arr[ 'member_info01' ] ) {
			$err_msg .= '勤務先／学校名が未入力です';
			return $err_msg;
		}

		if ( $arr[ 'intro_zip1' ] ) {
			if ( is_Number( $arr[ 'intro_zip1' ] ) ) {
				$err_msg .= '紹介者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip1' ] ) > 3 ) {
				$err_msg .= '紹介者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_zip2' ] ) {
			if ( is_Number( $arr[ 'intro_zip2' ] ) ) {
				$err_msg .= '紹介者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip2' ] ) > 4 ) {
				$err_msg .= '紹介者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_tel' ] ) {
			if ( is_Tell( $arr[ 'intro_tel' ] ) ) {
				$err_msg .= '紹介者の電話番号は' . is_Tell( $arr[ 'intro_tel' ] );
				return $err_msg;
			}
		}

	}


	// 表画面  => 編集
	// --------------------------------
	if ( $mode == 'pc_modify' ) {

		if ( $arr[ 'member_tel' ] ) {
			if ( is_Tell( $arr[ 'member_tel' ] ) ) {
				$err_msg .= '参加者の電話番号は' . is_Tell( $arr[ 'member_tel' ] );
				return $err_msg;
			}
		}

	//	if ( $arr[ 'member_zip1' ] ) {
			if ( is_Number( $arr[ 'member_zip1' ] ) ) {
				$err_msg .= '参加者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
				$err_msg .= '参加者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
	//	}

	//	if ( $arr[ 'member_zip2' ] ) {
			if ( is_Number( $arr[ 'member_zip2' ] ) ) {
				$err_msg .= '参加者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
				$err_msg .= '参加者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
	//	}

		if ( ! $arr[ 'member_info01' ] ) {
			$err_msg .= '勤務先／学校名が未入力です';
			return $err_msg;
		}

		if ( $arr[ 'intro_zip1' ] ) {
			if ( is_Number( $arr[ 'intro_zip1' ] ) ) {
				$err_msg .= '紹介者の郵便番号1は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip1' ] ) > 3 ) {
				$err_msg .= '紹介者の郵便番号1は3桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_zip2' ] ) {
			if ( is_Number( $arr[ 'intro_zip2' ] ) ) {
				$err_msg .= '紹介者の郵便番号2は半角数字以外の入力はできません';
				return $err_msg;
			}
			if ( strlen( $arr[ 'intro_zip2' ] ) > 4 ) {
				$err_msg .= '紹介者の郵便番号2は4桁までしか入力できません';
				return $err_msg;
			}
		}

		if ( $arr[ 'intro_tel' ] ) {
			if ( is_Tell( $arr[ 'intro_tel' ] ) ) {
				$err_msg .= '紹介者の電話番号は' . is_Tell( $arr[ 'intro_tel' ] );
				return $err_msg;
			}
		}

	}



	return $err_msg;
}




// ***********************************************
// シンポジウム参加者テーブル エラーチェック(表画面用）
// @return: エラーを一個
// ***********************************************
function symp_Sanka_Error_Check_PC($arr) {
	
	$err_msg = '';



	return $err_msg;
}



// **********************************************************************************************
// 各シンポジウムのプログラム関連
// **********************************************************************************************
/*
program_id
symp_id
start_time
program_name
program_time_text
kouensya_name
kouensya_info01
program_biko01
status
system_dt
update_dt
regist_dt
*/
// **********************************************************************************************

// ***********************************************
// 各シンポジウムのプログラムテーブル IDを元にSELECT
// ***********************************************
function symp_Program_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM symp_program_data';
	$sql .= '    WHERE';
	$sql .= '        program_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {
			$return_array[ 'program_id' ]        = cn_contract( $res, 0, 'program_id' );
			$return_array[ 'symp_id' ]           = cn_contract( $res, 0, 'symp_id' );
			$return_array[ 'start_time' ]        = cn_contract( $res, 0, 'start_time' );
			$return_array[ 'program_name' ]      = cn_contract( $res, 0, 'program_name' );
			$return_array[ 'program_time_text' ] = cn_contract( $res, 0, 'program_time_text' );
			$return_array[ 'kouensya_name' ]     = cn_contract( $res, 0, 'kouensya_name' );
			$return_array[ 'kouensya_info01' ]   = cn_contract( $res, 0, 'kouensya_info01' );
			$return_array[ 'program_biko01' ]    = cn_contract( $res, 0, 'program_biko01' );
			$return_array[ 'status' ]            = cn_contract( $res, 0, 'status' );
			$return_array[ 'system_dt' ]         = cn_contract( $res, 0, 'system_dt' );
			$return_array[ 'update_dt' ]         = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]         = cn_contract( $res, 0, 'regist_dt' );
		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 各シンポジウムのプログラムテーブル INSERT
// ***********************************************
function symp_Program_Data_Insert( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'INSERT INTO symp_program_data (';
	$sql .= '        symp_id,';
	$sql .= '        start_time,';
	$sql .= '        program_name,';
	$sql .= '        program_time_text,';
	$sql .= '        kouensya_name,';
	$sql .= '        kouensya_info01,';
	$sql .= '        program_biko01,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '    ) VALUES (    ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'symp_id' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'start_time' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'program_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'program_time_text' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouensya_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'kouensya_info01' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'program_biko01' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '    )';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}


// ***********************************************
// 各シンポジウムのプログラムテーブル UPDATE
// ***********************************************
function symp_Program_Data_Update( $arr, $id ) {

	if ( $id != '' ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE symp_program_data SET';
		$sql .= '        symp_id = "' .           mysql_real_escape_string( $arr[ 'symp_id' ] ) . '",';
		$sql .= '        start_time = "' .        mysql_real_escape_string( $arr[ 'start_time' ] ) . '",';
		$sql .= '        program_name = "' .      mysql_real_escape_string( $arr[ 'program_name' ] ) . '",';
		$sql .= '        program_time_text = "' . mysql_real_escape_string( $arr[ 'program_time_text' ] ) . '",';
		$sql .= '        kouensya_name = "' .     mysql_real_escape_string( $arr[ 'kouensya_name' ] ) . '",';
		$sql .= '        kouensya_info01 = "' .   mysql_real_escape_string( $arr[ 'kouensya_info01' ] ) . '",';
		$sql .= '        program_biko01 = "' .    mysql_real_escape_string( $arr[ 'program_biko01' ] ) . '",';
		$sql .= '        update_dt = "' .         date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        program_id = "' . $id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

	}
}

// ***********************************************
// 各シンポジウムのプログラムテーブル エラーチェック
// ***********************************************
function symp_Prog_Error_Check($arr) {
	
	$err_msg = '';

	if ( ! $arr[ 'program_name' ] ) {
		$err_msg .= 'プログラム名が未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'kouensya_name' ] ) {
		$err_msg .= '講演者名が未入力です';
		return $err_msg;
	}

	return $err_msg;
}


// **********************************************************************************************
// **********************************************************************************************


// ***********************************************
// 参加費用の読込
// @return 配列
// ***********************************************
function sanka_Price_Read( $convention_id ) {

	$return_array = array();

	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = " SELECT * FROM convention_data";
	$sql .= "     WHERE";
	$sql .= "        convention_id = '" . $convention_id  . "' AND ";
	$sql .= "        status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){

			$price01_mixed_text    = cn_contract($res, 0, "price01");
			$price02_mixed_text    = cn_contract($res, 0, "price02");
			$price03_mixed_text    = cn_contract($res, 0, "price03");

			// バラして後に費用計算で使用
			$return_array[1] =  price_Apart( $price01_mixed_text );
			$return_array[2] =  price_Apart( $price02_mixed_text );
			$return_array[3] =  price_Apart( $price03_mixed_text );
		}
	}
//	db_close($cnn);

	return $return_array;

}


// **********************************************************************************************
// 書籍関連
// **********************************************************************************************
/*
book_id
book_sid
book_name
book_genre
book_year
book_price1
book_price2
book_biko
status
system_dt
update_dt
regist_dt
*/
// ***********************************************
// 書籍テーブル IDを元にSELECT
// ***********************************************
function book_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM book_data';
	$sql .= '    WHERE';
	$sql .= '        book_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'book_id' ]     = cn_contract( $res, 0, 'book_id' );
			$return_array[ 'book_sid' ]     = cn_contract( $res, 0, 'book_sid' );
			$return_array[ 'book_name' ]   = cn_contract( $res, 0, 'book_name' );
			$return_array[ 'book_genre' ]  = cn_contract( $res, 0, 'book_genre' );
			$return_array[ 'book_year' ]   = cn_contract( $res, 0, 'book_year' );
			$return_array[ 'book_price1' ] = cn_contract( $res, 0, 'book_price1' );
			$return_array[ 'book_price2' ] = cn_contract( $res, 0, 'book_price2' );
			$return_array[ 'book_biko' ]   = cn_contract( $res, 0, 'book_biko' );
			$return_array[ 'status' ]      = cn_contract( $res, 0, 'status' );
			$return_array[ 'update_dt' ]   = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]   = cn_contract( $res, 0, 'regist_dt' );

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 書籍テーブル INSERT
// ***********************************************
function book_Data_Insert( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);
	$sql = 'INSERT INTO book_data (';
	$sql .= '        book_sid,';
	$sql .= '        book_name,';
	$sql .= '        book_genre,';
	$sql .= '        book_year,';
	$sql .= '        book_price1,';
	$sql .= '        book_price2,';
	$sql .= '        book_biko,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_sid' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_name' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_genre' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_year' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_price1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_price2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_biko' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 書籍テーブル UPDATE
// ***********************************************
function book_Data_Update( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE book_data SET';
	$sql .= '        book_sid = "' .       mysql_real_escape_string( $arr[ 'book_sid' ] ) . '",';
	$sql .= '        book_name = "' .       mysql_real_escape_string( $arr[ 'book_name' ] ) . '",';
	$sql .= '        book_genre = "' .      mysql_real_escape_string( $arr[ 'book_genre' ] ) . '",';
	$sql .= '        book_year = "' .       mysql_real_escape_string( $arr[ 'book_year' ] ) . '",';
	$sql .= '        book_price1 = "' .     mysql_real_escape_string( $arr[ 'book_price1' ] ) . '",';
	$sql .= '        book_price2 = "' .     mysql_real_escape_string( $arr[ 'book_price2' ] ) . '",';
	$sql .= '        book_biko = "' .       mysql_real_escape_string( $arr[ 'book_biko' ] ) . '",';
	$sql .= '        update_dt = "' .       date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        book_id = "' . $arr[ 'book_id' ] . '"';

	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// 書籍テーブル シリーズNo 最大値取得
// ***********************************************
function book_Data_Get_Max_Sid( $genre_id ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$book_sid_max = 0;
	$sql  = 'SELECT max(book_sid) AS maxid FROM book_data';
	$sql .= '    WHERE';
	$sql .= '        book_genre = "' . $genre_id . '" AND';
	$sql .= '        status = 0';
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$book_sid_max = cn_contract($res, 0, "maxid");
		}
	}

	db_close($cnn);

	return $book_sid_max;

}

// ***********************************************
// 書籍テーブル フォームからの入力の調整
// @return: 調整後の配列
// ***********************************************
function book_Buy_Adjust($arr) {
/*
	// 会員番号が0の場合、区分を非会員にする
	if ( $arr[ 'member_userid' ] === '0' ) {
		$arr[ 'member_kubun01' ] = 99;
	} else {
		// それ以外の場合で非会員になっている場合は正会員にする
		if ( $arr[ 'member_kubun01' ] == 99 ) {
			$arr[ 'member_kubun01' ] = 1;
		}
	}
*/
	return $arr;
}

// ***********************************************
// 書籍の料金計算
// @return: 調整後の配列
// ***********************************************
function book_Buy_Calc_Price($member_kubun01, $book_cnt, $book_price1, $book_price2 ) {

	$book_price_text = '';

	if( $member_kubun01 == 99 ) {

		if ( strpos( $book_price1, 'コピー' )  === FALSE ) {

			$teika = price_Re_Format( $book_price1 );
			$book_price = $teika * $book_cnt;
			$book_price_info = '定価';

		} else {

			$member_kakaku = price_Re_Format( $book_price2 );
			$book_price = $member_kakaku * $book_cnt;
			$book_price_info = 'コピー価格';
		}

	} else {

		if ( strpos( $book_price1, 'コピー' )  === FALSE ) {

			$member_kakaku = price_Re_Format( $book_price2 );
			$book_price = $member_kakaku * $book_cnt;
			$book_price_info = '会員価格';


		} else {

			$member_kakaku = price_Re_Format( $book_price2 );
			$book_price = $member_kakaku * $book_cnt;
			$book_price_info = 'コピー価格';

		}

	}

	$book_price = price_Format( $book_price );

	$book_price_text = price_Format( $book_price ) . '円(' . $book_price_info . ')';

	// 送料別　と付け足す
	$book_price_text .= '（送料別）';

	return $book_price_text;
}


// ***********************************************
// 書籍テーブル エラーチェック
// ***********************************************
function book_Error_Check($arr) {
	
	$err_msg = '';

	if ( ! $arr[ 'book_name' ] ) {
		$err_msg .= '名称が未入力です';
		return $err_msg;
	}
	if ( ! $arr[ 'book_sid' ] || $arr[ 'book_sid' ] == 0 ) {
		$err_msg .= 'シリーズNo.が未入力です';
		return $err_msg;
	}

	return $err_msg;
}

// ***********************************************
// 書籍購入テーブル NGの購入者リスト
// ***********************************************
function book_Buy_get_Ng_name_list() {
    return array('Barnypok', 'Mark777');
}

// ***********************************************
// 書籍テーブル エラーチェック
// ***********************************************
function book_Buy_Error_Check($arr) {
	
	$err_msg = '';

    $ng_names = book_Buy_get_Ng_name_list();

	if ( ! $arr[ 'book_cnt' ] ) {
		$err_msg .= '部数が選択されていません';
		return $err_msg;
	}
/*
	if ( $arr[ 'member_userid' ] !== '0' ) {

		if ( ! $arr[ 'member_userid' ] ) {
			$err_msg .= '会員番号が未入力です';
			return $err_msg;
		}

		if ( is_Number( $arr[ 'member_userid' ] ) ) {
			$err_msg .= '会員番号は半角数字以外の入力はできません';
			return $err_msg;
		}

		if ( strlen( $arr[ 'member_userid' ] ) != 6) {
			$err_msg .= '会員番号は6文字で決定してください';
			return $err_msg;
		}

	}
*/
	if ( ! $arr[ 'member_kubun01' ] ) {
		$err_msg .= '会員区分が選択されていません';
		return $err_msg;
	}

	if ( ! $arr[ 'member_name' ] ) {
		$err_msg .= '氏名が未入力です';
		return $err_msg;
	}
    if (in_array($arr['member_name'], $ng_names)) { // NGリストと照合
        $err_msg .= '購入できません。管理者にお問い合わせ下さい。';
        return $err_msg;
    }
	if ( ! $arr[ 'member_info01' ] ) {
		$err_msg .= '勤務先／学校名が未入力です';
		return $err_msg;
	}
	if ( ! $arr[ 'member_info02' ] ) {
		$err_msg .= '所属が未入力です';
		return $err_msg;
	}
	if ( ! $arr[ 'member_zip1' ] ) {
		$err_msg .= '郵便番号1が未入力です';
		return $err_msg;
	}
	if ( is_Number( $arr[ 'member_zip1' ] ) ) {
		$err_msg .= '郵便番号1は半角数字以外の入力はできません';
		return $err_msg;
	}
	if ( strlen( $arr[ 'member_zip1' ] ) > 3 ) {
		$err_msg .= '郵便番号1は3桁までしか入力できません';
		return $err_msg;
	}

	if ( ! $arr[ 'member_zip2' ] ) {
		$err_msg .= '郵便番号2が未入力です';
		return $err_msg;
	}
	if ( is_Number( $arr[ 'member_zip2' ] ) ) {
		$err_msg .= '郵便番号2は半角数字以外の入力はできません';
		return $err_msg;
	}
	if ( strlen( $arr[ 'member_zip2' ] ) > 4 ) {
		$err_msg .= '郵便番号2は4桁までしか入力できません';
		return $err_msg;
	}
	if ( ! $arr[ 'member_address' ] ) {
		$err_msg .= '住所が未入力です';
		return $err_msg;
	}
	if ( ! $arr[ 'member_mail' ] ) {
		$err_msg .= 'メールアドレスが未入力です';
		return $err_msg;
	}

	if ( is_Mail( $arr[ 'member_mail' ] ) ) {
		$err_msg .= 'メールアドレスの' . is_Mail( $arr[ 'member_mail' ] );
		return $err_msg;
	}

	if ( ! $arr[ 'member_tel' ] ) {
		$err_msg .= '電話番号が未入力です';
		return $err_msg;
	}
	if ( is_Tell( $arr[ 'member_tel' ] ) ) {
		$err_msg .= '電話番号は' . is_Tell( $arr[ 'member_tel' ] );
		return $err_msg;
	}


	if ( $arr[ 'member_fax' ] ) {
		if ( is_Tell( $arr[ 'member_fax' ] ) ) {
			$err_msg .= 'FAX番号は' . is_Tell( $arr[ 'member_fax' ] );
			return $err_msg;
		}
	}

	return $err_msg;
}



// **********************************************************************************************
// 書籍ジャンル関連
// **********************************************************************************************
/*
genre_id
genre_name
genre_order
status
system_dt
update_dt
regist_dt
*/
// ***********************************************
// 書籍ジャンルテーブル IDを元にSELECT
// ***********************************************
function book_Genre_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM book_genre_data';
	$sql .= '    WHERE';
	$sql .= '        genre_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {
			$return_array[ 'genre_id' ]     = cn_contract( $res, 0, 'genre_id' );
			$return_array[ 'genre_name' ]     = cn_contract( $res, 0, 'genre_name' );
			$return_array[ 'genre_order' ]     = cn_contract( $res, 0, 'genre_order' );
			$return_array[ 'status' ]     = cn_contract( $res, 0, 'status' );
			$return_array[ 'update_dt' ]     = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]     = cn_contract( $res, 0, 'regist_dt' );

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 書籍ジャンルテーブル INSERT
// ***********************************************
function book_Genre_Data_Insert( $arr ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);
		$sql = 'INSERT INTO book_genre_data (';
		$sql .= '        genre_name,';
		$sql .= '        genre_order,';
		$sql .= '        update_dt,';
		$sql .= '        regist_dt,';
		$sql .= '        status';
		$sql .= '        ) VALUES ( ';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'genre_name' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'genre_order' ] ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        0';

		$sql .= '        )';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}

// ***********************************************
// 書籍ジャンルテーブル UPDATE
// ***********************************************
function book_Genre_Data_Update( $arr ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE book_genre_data SET';
		$sql .= '        genre_id = "' .       mysql_real_escape_string( $arr[ 'genre_id' ] ) . '",';
		$sql .= '        genre_name = "' .     mysql_real_escape_string( $arr[ 'genre_name' ] ) . '",';
		$sql .= '        genre_order = "' .    mysql_real_escape_string( $arr[ 'genre_order' ] ) . '",';
		$sql .= '        update_dt = "' .      date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        genre_id = "' . $arr[ 'genre_id' ] . '"';

		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}


// ***********************************************
// 書籍ジャンルテーブル エラーチェック
// ***********************************************
function book_Genre_Error_Check($arr) {
	
	$err_msg = '';

	if ( ! $arr[ 'genre_name' ] ) {
		$err_msg .= 'ジャンル名が未入力です';
		return $err_msg;
	}

	return $err_msg;
}


// ***********************************************
// 書籍ジャンルテーブル 
// @return array:表示ランク順に genre_id => genre_name,,,
// ***********************************************
function book_Genre_Data_Read_Options() {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM book_genre_data';
	$sql .= '    WHERE';
	$sql .= '        status = 0';
	$sql .= '    ORDER BY';
	$sql .= '        genre_order,genre_id';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			for ( $i=0;$i<$cnt;$i++ ) {
				$genre_id     = cn_contract( $res, $i, 'genre_id' );
				$genre_name   = cn_contract( $res, $i, 'genre_name' );

				$return_array[ $genre_id ] = $genre_name;
			}
		}
	}

	db_close($cnn);

	return $return_array;

}




// **********************************************************************************************
// ダイレクトメール関連
// **********************************************************************************************
/*
dm_id
mail_type
sender_name
sender_mail
mail_title
mail_body
status
send_dt
update_dt
regist_dt
*/
// ***********************************************
// ダイレクトメールテーブル IDを元にSELECT
// ***********************************************
function DM_Data_Read_By_TYPE( $mail_type ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM dm_data';
	$sql .= '    WHERE';
	$sql .= '        mail_type = "' . $mail_type . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {
			$return_array[ 'dm_id' ]         = cn_contract( $res, 0, 'dm_id' );
			$return_array[ 'mail_type' ]     = cn_contract( $res, 0, 'mail_type' );
			$return_array[ 'sender_name' ]   = cn_contract( $res, 0, 'sender_name' );
			$return_array[ 'sender_mail' ]   = cn_contract( $res, 0, 'sender_mail' );
			$return_array[ 'mail_title' ]    = cn_contract( $res, 0, 'mail_title' );
			$return_array[ 'mail_body' ]     = cn_contract( $res, 0, 'mail_body' );
			$return_array[ 'status' ]        = cn_contract( $res, 0, 'status' );
			$return_array[ 'send_dt' ]       = cn_contract( $res, 0, 'send_dt' );
			$return_array[ 'update_dt' ]     = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]     = cn_contract( $res, 0, 'regist_dt' );
		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// ダイレクトメールテーブル INSERT
// ***********************************************
function DM_Data_Insert( $arr ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

		tr_begin($cnn);

		$sql = 'INSERT INTO dm_data (';
		$sql .= '        mail_type,';
		$sql .= '        sender_name,';
		$sql .= '        sender_mail,';
		$sql .= '        mail_title,';
		$sql .= '        mail_body,';
		$sql .= '        update_dt,';
		$sql .= '        regist_dt,';
		$sql .= '        status';
		$sql .= '        ) VALUES ( ';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'mail_type' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'sender_name' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'sender_mail' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'mail_title' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'mail_body' ] ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        0';
		$sql .= '        )';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);

		db_close($cnn);

}

// ***********************************************
// ダイレクトメールテーブル UPDATE
// ***********************************************
function DM_Data_Update( $arr ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE dm_data SET';

		$sql .= '        mail_type = "' .     mysql_real_escape_string( $arr[ 'mail_type' ] ) . '",';
		$sql .= '        sender_name = "' .   mysql_real_escape_string( $arr[ 'sender_name' ] ) . '",';
		$sql .= '        sender_mail = "' .   mysql_real_escape_string( $arr[ 'sender_mail' ] ) . '",';
		$sql .= '        mail_title = "' .    mysql_real_escape_string( $arr[ 'mail_title' ] ) . '",';
		$sql .= '        mail_body = "' .     mysql_real_escape_string( $arr[ 'mail_body' ] ) . '",';
		$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
		$sql .= '    WHERE';
		$sql .= '        mail_type = "' . $arr[ 'mail_type' ] . '" AND';
		$sql .= '        status = 0';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

}


// ***********************************************
// ダイレクトメール送信処理
// ***********************************************
function DM_Data_Send($arr) {

	// TYPE=1
	// 全会員宛
	if ( $arr[ 'mail_type' ] == 1 ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql = 'SELECT * FROM member_mast';
		$sql .= '    WHERE';
		$sql .= '        ninsyou_status = 1 AND';
		$sql .= '        status = 0';
		$res = cn_query( $sql, $cnn );

		if ( $res == true ) {
			$cnt = cn_count( $res );
			if ( $cnt > 0 ) {
				for( $i=0;$i<$cnt;$i++ ) {
					$member_data[ 'member_userid' ][$i]  = cn_contract( $res, $i, 'member_userid' );
					$member_data[ 'member_name' ][$i]    = cn_contract( $res, $i, 'member_name' );
					$member_data[ 'member_mail' ][$i]    = cn_contract( $res, $i, 'member_mail' );
				}
			}
		}

		db_close($cnn);

	}

	// TYPE=2
	// 大会講演者宛
	if ( $arr[ 'mail_type' ] == 2 ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = "SELECT * FROM kouensya_data";
		$sql .= "    WHERE";
		$sql .= "        convention_id = " . $arr[ 'convention_id' ] . " AND ";
		$sql .= "        status = 0";
		$res = cn_query( $sql, $cnn );

		if ( $res == true ) {
			$cnt = cn_count( $res );
			if ( $cnt > 0 ) {
				for( $i=0;$i<$cnt;$i++ ) {
					$member_data[ 'member_name' ][$i]    = cn_contract( $res, $i, 'kouen_name' );
					$member_data[ 'member_mail' ][$i]    = cn_contract( $res, $i, 'kouen_mail' );
				}
			}
		}

		db_close($cnn);

	}

	// TYPE=3
	// 大会参加者宛
	if ( $arr[ 'mail_type' ] == 3 ) {

		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = "SELECT * FROM sankasya_data";
		$sql .= "    INNER JOIN sankasya_member_mast ON";
		$sql .= "    sankasya_data.sankasya_id = sankasya_member_mast.sankasya_id";
		$sql .= "    WHERE";
		$sql .= "        sankasya_data.convention_id = " . $arr[ 'convention_id' ] . " AND ";
		$sql .= "        sankasya_data.status = 0";
		$sql .= "    ORDER BY sankasya_data.sankasya_uid";
		$res  = cn_query($sql, $cnn);

		if ( $res == true ) {
			$cnt = cn_count( $res );
			if ( $cnt > 0 ) {
				for( $i=0;$i<$cnt;$i++ ) {
					$member_data[ 'member_name' ][$i]    = cn_contract( $res, $i, 'member_name' );
					$member_data[ 'member_mail' ][$i]    = cn_contract( $res, $i, 'member_mail' );
				}
			}
		}

		db_close($cnn);

	}

	// TYPE=4
	// シンポジウム参加者宛
	if ( $arr[ 'mail_type' ] == 4 ) {

		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = "SELECT * FROM symp_sanka_data";
		$sql .= "    INNER JOIN symp_sanka_member_mast ON";
		$sql .= "    symp_sanka_data.sanka_id = symp_sanka_member_mast.sanka_id";
		$sql .= "    WHERE";
		$sql .= "        symp_sanka_data.symp_id = " . $arr[ 'symp_id' ] . " AND ";
		$sql .= "        symp_sanka_data.status = 0";
		$sql .= "    ORDER BY symp_sanka_data.sanka_id DESC";
		$res  = cn_query($sql, $cnn);

		if ( $res == true ) {
			$cnt = cn_count( $res );
			if ( $cnt > 0 ) {
				for( $i=0;$i<$cnt;$i++ ) {
					$member_data[ 'member_name' ][$i]    = cn_contract( $res, $i, 'member_name' );
					$member_data[ 'member_mail' ][$i]    = cn_contract( $res, $i, 'member_mail' );
				}
			}
		}

		db_close($cnn);

	}


	if ( $member_data != NULL ) {

		$send_data[ 'subject' ]     = $arr[ 'mail_title' ]; //件名
		$send_data[ 'sender_mail' ] = $arr[ 'sender_mail' ]; //メールのFROM
		$send_data[ 'fromname' ]    = $arr[ 'sender_name' ]; //FROMの名称（差出人名称)

		$member_cnt = count( $member_data );
		for( $i=0;$i<$member_cnt;$i++ ) {

			$send_data[ 'to' ]          = $member_data[ 'member_mail' ][$i]; //メールの宛先
			$send_data[ 'body' ]        = $member_data[ 'member_name' ][$i] . '様' . "\n\n"
					. $arr[ 'mail_body' ];

			// メール送信処理１（管理者宛）
			$err_msg = common_mail_send_1( $send_data );

		}

	}

}



// ***********************************************
// ダイレクトメール エラーチェック
// ***********************************************
function DM_Error_Check( $arr ) {

	$err_msg = '';

	if ( ! $arr[ 'mail_type' ] ) {
		$err_msg .= 'DM種別が取得できません。管理者にご連絡下さい。';
		return $err_msg;
	}

	// 大会講演者宛DM
	if ( $arr[ 'mail_type' ] == 2) {
		if ( ! $arr[ 'convention_id' ] ) {
			$err_msg .= '大会IDが取得できません。セッションが切れています。';
			return $err_msg;
		}
	}
	// 大会参加者宛DM
	if ( $arr[ 'mail_type' ] == 3) {
		if ( ! $arr[ 'convention_id' ] ) {
			$err_msg .= '大会IDが取得できません。セッションが切れています。';
			return $err_msg;
		}
	}
	// シンポジウム参加者宛DM
	if ( $arr[ 'mail_type' ] == 4) {
		if ( ! $arr[ 'symp_id' ] ) {
			$err_msg .= 'シンポジウムIDが取得できません。セッションが切れています。';
			return $err_msg;
		}
	}

	if ( ! $arr[ 'sender_name' ] ) {
		$err_msg .= '送信者の名前が未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'sender_mail' ] ) {
		$err_msg .= '送信者のメールアドレスが未入力です';
		return $err_msg;
	}

	if ( is_Mail( $arr[ 'sender_mail' ] ) ) {
		$err_msg .= '送信者のメールアドレスの' . is_Mail( $arr[ 'sender_mail' ] );
		return $err_msg;
	}

	if ( ! $arr[ 'mail_title' ] ) {
		$err_msg .= 'タイトルが未入力です';
		return $err_msg;
	}

	if ( ! $arr[ 'mail_body' ] ) {
		$err_msg .= '本文が未入力です';
		return $err_msg;
	}




	return $err_msg;

}


// **********************************************************************************************
// 書籍販売ログ関連
// **********************************************************************************************
/*
▼log_book_sell
--------------------
book_sell_id
book_id
book_cnt
login_flg
member_userid
member_name
member_kubun01
member_mail
member_tel
member_fax
member_info01
member_info02
member_zip1
member_zip2
member_address
status
system_dt
update_dt
regist_dt

▼book_data
--------------------
book_id
book_sid
book_name
book_genre
book_year
book_price1
book_price2
book_biko
status
system_dt
update_dt
regist_dt
*/
// ***********************************************
// 書籍販売ログテーブル INSERT
// @return: 登録したログID
// ***********************************************

function log_Book_Sell_Read_By_ID( $id ) {
	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql = 'SELECT * FROM log_book_sell';
	$sql .= '    INNER JOIN book_data ON';
	$sql .= '        log_book_sell.book_id = book_data.book_id';
	$sql .= '    WHERE';
	$sql .= '        book_sell_id = "' . $id . '"';
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {
			$return_array[ 'book_sell_id' ]   = cn_contract( $res, 0, 'book_sell_id' );
			$return_array[ 'book_id' ]        = cn_contract( $res, 0, 'book_id' );
			$return_array[ 'book_cnt' ]       = cn_contract( $res, 0, 'book_cnt' );
			$return_array[ 'login_flg' ]      = cn_contract( $res, 0, 'login_flg' );
			$return_array[ 'member_userid' ]  = cn_contract( $res, 0, 'member_userid' );
			$return_array[ 'member_name' ]    = cn_contract( $res, 0, 'member_name' );
			$return_array[ 'member_kubun01' ] = cn_contract( $res, 0, 'member_kubun01' );
			$return_array[ 'member_mail' ]    = cn_contract( $res, 0, 'member_mail' );
			$return_array[ 'member_tel' ]     = cn_contract( $res, 0, 'member_tel' );
			$return_array[ 'member_fax' ]     = cn_contract( $res, 0, 'member_fax' );
			$return_array[ 'member_info01' ]  = cn_contract( $res, 0, 'member_info01' );
			$return_array[ 'member_info02' ]  = cn_contract( $res, 0, 'member_info02' );
			$return_array[ 'member_zip1' ]    = cn_contract( $res, 0, 'member_zip1' );
			$return_array[ 'member_zip2' ]    = cn_contract( $res, 0, 'member_zip2' );
			$return_array[ 'member_address' ] = cn_contract( $res, 0, 'member_address' );
			$return_array[ 'regist_dt' ]      = cn_contract( $res, 0, 'log_book_sell.regist_dt' );
			$return_array[ 'book_id' ]        = cn_contract( $res, 0, 'book_id' );
			$return_array[ 'book_sid' ]       = cn_contract( $res, 0, 'book_sid' );
			$return_array[ 'book_name' ]      = cn_contract( $res, 0, 'book_name' );
			$return_array[ 'book_genre' ]     = cn_contract( $res, 0, 'book_genre' );
			$return_array[ 'book_year' ]      = cn_contract( $res, 0, 'book_year' );
			$return_array[ 'book_price1' ]    = cn_contract( $res, 0, 'book_price1' );
			$return_array[ 'book_price2' ]    = cn_contract( $res, 0, 'book_price2' );
			$return_array[ 'book_biko' ]      = cn_contract( $res, 0, 'book_biko' );

		}
	}

	db_close($cnn);

	return $return_array;

}

// ***********************************************
// 書籍販売ログテーブル INSERT
// @return: 登録したログID
// ***********************************************
function log_Book_Sell_Set( $arr ) {

		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

		tr_begin($cnn);

		$sql = 'INSERT INTO log_book_sell (';
		$sql .= '        book_id,';
		$sql .= '        book_cnt,';
		$sql .= '        login_flg,';
		$sql .= '        member_userid,';
		$sql .= '        member_name,';
		$sql .= '        member_kubun01,';
		$sql .= '        member_mail,';
		$sql .= '        member_tel,';
		$sql .= '        member_fax,';
		$sql .= '        member_info01,';
		$sql .= '        member_info02,';
		$sql .= '        member_zip1,';
		$sql .= '        member_zip2,';
		$sql .= '        member_address,';
		$sql .= '        update_dt,';
		$sql .= '        regist_dt,';
		$sql .= '        status';
		$sql .= '        ) VALUES ( ';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_id' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'book_cnt' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'login_flg' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_userid' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_name' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_kubun01' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_mail' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_tel' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_fax' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info01' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_info02' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip1' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_zip2' ] ) . '",';
		$sql .= '        "' . mysql_real_escape_string( $arr[ 'member_address' ] ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        "' . date( 'YmdHis' ) . '",';
		$sql .= '        0';
		$sql .= '        )';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);

		db_close($cnn);

		$maxid = 0;
		$maxid = log_Book_Sell_MaxID_Get();
		
		return $maxid;

}

// ***********************************************
// 書籍販売ログテーブル INSERT
// @return: 登録したログID
// ***********************************************
function log_Book_Sell_MaxID_Get() {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$maxid = 0;
	$sql  = " SELECT max(book_sell_id) AS maxid FROM log_book_sell";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$maxid = cn_contract($res, 0, "maxid");
		}
	}
	db_close($cnn);

	return $maxid;
}



// **********************************************************************************************
// ファイルアップロード関連
// **********************************************************************************************
// ***********************************************
// 拡張子設定ファイルを取得
// @return: array:設定ファイル
// ***********************************************
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
		'xml'	=>	'text/xml',
		'xpm'	=>	'image/x-xpixmap',
		'xsl'	=>	'text/xml',
		'xwd'	=>	'image/x-xwindowdump',
		'xyz'	=>	'chemical/x-xyz',
		'zip'	=>	'application/zip'
	);

	return $file_header_config;
}

// ***********************************************
// Content-Typeを取得
// @return: string：Content-Type
// ***********************************************
function getFileContentType( $extension ) {

	$file_config = getFileConfigArray();

	$content_type = '';
	reset( $file_config );
	while( list( $key, $val ) = each( $file_config ) ) {
		if ( $extension == $key ) {
			$content_type = $val;
		}
	}
	return $content_type;
}

// ***********************************************
// 拡張子を取得
// @return: string：拡張子
// ***********************************************
function getFileExtension( $filename ) {
	$extension = '';
	$pathinfo = pathinfo( $filename );
	$extension = $pathinfo[ 'extension' ];
	return $extension;
}

// ***********************************************
// PDFエラーチェック
// @param:file_array: $_FILESの配列
// @return: err_msg(string)
// ***********************************************
function pdf_error_check( $file_array ) {
	
	$err_msg = '';

	if( ! stristr( $file_array[ 'name' ], '.pdf' ) ) {
		$err_msg = "送信できるファイルはPDFのみです。";
		return $err_msg;
		exit;
	}

	return $err_msg;
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
	$mail->Host = JILM_SMTP_HOST . ':587';
	$mail->SMTPAuth = TRUE;
	$mail->Username = JILM_SMTP_USER;
	$mail->Password = JILM_SMTP_PASS;

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

// ***********************************************
// 署名の読み込み
// @return: string:ヒアドキュメント：署名
// ***********************************************
function get_Mail_Assign() {

	$mail_assign = <<<EOD

-------------------------------
一般社団法人 軽金属学会
webmaster@jilm.or.jp　
〒104-0061　東京都中央区銀座4-2-15
TEL 03-3538-0232　FAX 03-3538-0226
-------------------------------------

EOD;

	return $mail_assign;
}




// **********************************************************************************************
// カレンダー管理関連
// **********************************************************************************************
/*
▼calendar_data
-----------------------
cal_id
cal_date
cal_date_text
cal_text_1
cal_text_2
cal_link_1
cal_link_2
cal_syusai
cal_syusai_link
cal_colored
dl_type
status
update_dt
regist_dt


*/
// ***********************************************
// カレンダー管理テーブル IDを元にSELECT
// @return: none
// ***********************************************
function calendar_Data_Read_By_ID( $id ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM calendar_data";
	$sql .= "    WHERE";
	$sql .= "        cal_id = " . $id;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'cal_id' ]           = cn_contract( $res, 0, 'cal_id' );
			$return_array[ 'cal_date' ]         = cn_contract( $res, 0, 'cal_date' );
			$return_array[ 'cal_date_text' ]    = cn_contract( $res, 0, 'cal_date_text' );
			$return_array[ 'cal_text_1' ]       = cn_contract( $res, 0, 'cal_text_1' );
			$return_array[ 'cal_text_2' ]       = cn_contract( $res, 0, 'cal_text_2' );
			$return_array[ 'cal_link_1' ]       = cn_contract( $res, 0, 'cal_link_1' );
			$return_array[ 'cal_link_2' ]       = cn_contract( $res, 0, 'cal_link_2' );
			$return_array[ 'cal_syusai' ]       = cn_contract( $res, 0, 'cal_syusai' );
			$return_array[ 'cal_syusai_link' ]  = cn_contract( $res, 0, 'cal_syusai_link' );
			$return_array[ 'cal_colored' ]      = cn_contract( $res, 0, 'cal_colored' );
			$return_array[ 'dl_type' ]          = cn_contract( $res, 0, 'dl_type' );
			$return_array[ 'update_dt' ]        = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]        = cn_contract( $res, 0, 'regist_dt' );

		}
	}

	db_close($cnn);

	return $return_array;

}


// ***********************************************
// カレンダー管理テーブル 自由に検索できます
// @return: array
// ***********************************************
function calendar_Data_Read_Custom( $search_array ) {

	$return_array = array();

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	while( list( $key, $val ) = each( $search_array ) ) {
		$sql_col[] = '        ' . $key . ' = "' . mysql_real_escape_string( $val ) . '"';
	}
	$where_sql = implode( ' AND ', $sql_col );

	$sql  = "SELECT * FROM calendar_data";
	$sql .= "    WHERE";
	$sql .= $where_sql;
	$res = cn_query( $sql, $cnn );

	if ( $res == true ) {
		$cnt = cn_count( $res );
		if ( $cnt > 0 ) {

			$return_array[ 'cal_id' ]           = cn_contract( $res, 0, 'cal_id' );
			$return_array[ 'cal_date' ]         = cn_contract( $res, 0, 'cal_date' );
			$return_array[ 'cal_date_text' ]    = cn_contract( $res, 0, 'cal_date_text' );
			$return_array[ 'cal_text_1' ]       = cn_contract( $res, 0, 'cal_text_1' );
			$return_array[ 'cal_text_2' ]       = cn_contract( $res, 0, 'cal_text_2' );
			$return_array[ 'cal_link_1' ]       = cn_contract( $res, 0, 'cal_link_1' );
			$return_array[ 'cal_link_2' ]       = cn_contract( $res, 0, 'cal_link_2' );
			$return_array[ 'cal_syusai' ]       = cn_contract( $res, 0, 'cal_syusai' );
			$return_array[ 'cal_syusai_link' ]  = cn_contract( $res, 0, 'cal_syusai_link' );
			$return_array[ 'cal_colored' ]      = cn_contract( $res, 0, 'cal_colored' );
			$return_array[ 'dl_type' ]          = cn_contract( $res, 0, 'dl_type' );
			$return_array[ 'update_dt' ]        = cn_contract( $res, 0, 'update_dt' );
			$return_array[ 'regist_dt' ]        = cn_contract( $res, 0, 'regist_dt' );

		}
	}

	db_close($cnn);

	return $return_array;

}



// ***********************************************
// カレンダー管理テーブル INSERT
// @return: none
// ***********************************************
function calendar_Data_Insert( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'INSERT INTO calendar_data (';
	$sql .= '        cal_date,';
	$sql .= '        cal_date_text,';
	$sql .= '        cal_text_1,';
	$sql .= '        cal_text_2,';
	$sql .= '        cal_link_1,';
	$sql .= '        cal_link_2,';
	$sql .= '        cal_syusai,';
	$sql .= '        cal_syusai_link,';
	$sql .= '        cal_colored,';
	$sql .= '        dl_type,';
	$sql .= '        update_dt,';
	$sql .= '        regist_dt,';
	$sql .= '        status';
	$sql .= '        ) VALUES ( ';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_date' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_date_text' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_text_1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_text_2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_link_1' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_link_2' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_syusai' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_syusai_link' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'cal_colored' ] ) . '",';
	$sql .= '        "' . mysql_real_escape_string( $arr[ 'dl_type' ] ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        "' . date( 'YmdHis' ) . '",';
	$sql .= '        0';
	$sql .= '        )';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// カレンダー管理テーブル UPDATE
// @return: none
// ***********************************************
function calendar_Data_Update( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE calendar_data SET';
	$sql .= '        cal_date = "' . mysql_real_escape_string( $arr[ 'cal_date' ] ) . '",';
	$sql .= '        cal_date_text = "' . mysql_real_escape_string( $arr[ 'cal_date_text' ] ) . '",';
	$sql .= '        cal_text_1 = "' . mysql_real_escape_string( $arr[ 'cal_text_1' ] ) . '",';
	$sql .= '        cal_text_2 = "' . mysql_real_escape_string( $arr[ 'cal_text_2' ] ) . '",';
	$sql .= '        cal_link_1 = "' . mysql_real_escape_string( $arr[ 'cal_link_1' ] ) . '",';
	$sql .= '        cal_link_2 = "' . mysql_real_escape_string( $arr[ 'cal_link_2' ] ) . '",';
	$sql .= '        cal_syusai = "' . mysql_real_escape_string( $arr[ 'cal_syusai' ] ) . '",';
	$sql .= '        cal_syusai_link = "' . mysql_real_escape_string( $arr[ 'cal_syusai_link' ] ) . '",';
	$sql .= '        cal_colored = "' . mysql_real_escape_string( $arr[ 'cal_colored' ] ) . '",';
	$sql .= '        dl_type = "' . mysql_real_escape_string( $arr[ 'dl_type' ] ) . '",';
	$sql .= '        update_dt = "' .     date( 'YmdHis' ) . '"';
	$sql .= '    WHERE';
	$sql .= '        cal_id = "' . mysql_real_escape_string( $arr[ 'cal_id' ] ) . '"';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// カレンダー管理テーブル 消去
// @return: none
// ***********************************************
function calendar_Data_Delete( $arr ) {

	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	tr_begin($cnn);

	$sql = 'UPDATE calendar_data SET';
	$sql .= '        status = 1';
	$sql .= '    WHERE';
	$sql .= '        cal_id = "' . mysql_real_escape_string( $arr[ 'cal_id' ] ) . '"';
	$res = cn_query($sql, $cnn);

	tr_commit($cnn);
	db_close($cnn);

}

// ***********************************************
// カレンダー管理テーブル MAXID
// ***********************************************
function calendar_Data_Maxid_Get() {
	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$max_id = 1;
	$sql  = " SELECT max(cal_id) AS maxid FROM calendar_data";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$max_id = cn_contract($res, 0, "maxid");
		}
	}
	db_close($cnn);

	return $max_id;

}

// ***********************************************
// カレンダー管理テーブル MAXID
// ***********************************************
function calendar_Data_MaxDate_Get() {
	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);

	$max_id = 1;
	$sql  = " SELECT max(cal_date) AS maxdate FROM calendar_data";
	$sql .= "    WHERE status = 0";
	$res  = cn_query($sql, $cnn);
	if ($res == true){
		$max_cnt = cn_count($res);
		if ($max_cnt > 0){
			$maxdate = cn_contract($res, 0, "maxdate");
		}
	}
	db_close($cnn);

	return $maxdate;

}

// ***********************************************
// カレンダー管理情報エラーチェック
// ***********************************************
function calendar_Data_Error_Check($arr, $mode) {
	
	$err_msg = '';

	// 管理画面(登録)
	// -------------------------------------------
	if ( $mode == 'admin_regist' ) {



	}

	return $err_msg;
}


// **********************************************************************************************
// 便利関数
// **********************************************************************************************

// ***********************************************
// 参加費用の分離処理
// 区分-料金,区分-料金,,,,のテキスト　=> array( 区分 => 料金, 区分 => 料金,,,,)
// @return 配列
// ***********************************************
function price_Apart( $text ) {
	$mixed_array = explode( ",", $text);
	$return_array = array();
	while( list( , $val ) = each( $mixed_array ) ) {
		$pos_line = strpos( $val, '-' );
		$pos_line_plus = $pos_line + 1;
		$len = strlen( $val );
		$type_key = substr( $val, 0, $pos_line );
		$price = substr( $val, $pos_line_plus, $len - $pos_line_plus );
		$return_array[ $type_key ] = $price;
	}
	return $return_array;
}

// ***********************************************
// 参加費用の結合処理
// array( 0 => 料金, 1 => 料金,,,,) => 区分-料金,区分-料金,,,,のテキスト
// @return テキスト（stripslashes済）
// ***********************************************
function price_Combine( $arr, $config_array ) {
	$i = 0;
	$mixed_array = array();
	while( list( $key, $val ) = each( $config_array ) ) {
		$mixed_array[] = $key . '-' . stripslashes( preg_replace('/[^0-9]+/', '', $arr[$i]) );
		$i++;
	}
	$return_text = implode( ",", $mixed_array );
	return $return_text;
}


// ***********************************************
// 日時のフォーマット 
// Ymd => Y/m/d に変換
// ***********************************************
function date_Format_1( $date_text = '' ) {
	$return_text = substr( $date_text, 0, 4 ) . '/' . substr( $date_text, 4, 2 ) . '/' . substr( $date_text, 6, 2 );
	return $return_text;
}

// ***********************************************
// 金額のフォーマット戻し
// 例：10,000 => 10000 に変換
// ***********************************************
function price_Re_Format( $price_text = '' ) {

	$replace_list = array( ",", "，", "、");

	$price_text = str_replace( $replace_list, "", $price_text );
	$price_text = mb_convert_kana( $price_text, "n", "UTF-8" );

	return $price_text;
}

// ***********************************************
// 金額のフォーマット
// 例：10000 => 10,000 に変換
// ***********************************************
function price_Format( $price_text = '' ) {

	$replace_list = array( ",", "，", "、");
	$price_text = str_replace( $replace_list, "", $price_text );
	$price_text = mb_convert_kana( $price_text, "n", "UTF-8" );

	$price_text = number_format( (double)$price_text );

	return $price_text;
}


// *******************************************
// チェックボックスボックス生成(smarty風に生成）
// *******************************************
function html_checkboxes( $op_arr, $selected=array(), $op_name='', $separator='', $col='' ) {

	$op = '';
	$i = 1;
	if ( is_array( $selected ) ) {
		$selected = array_flip( $selected ); // key,val反転
	} else {
		$selected = array(); // $selectedに配列以外が入ってきた時の対策
	}
	if ( is_array( $op_arr ) ) {
		reset( $op_arr );

		while( list( $key, $val ) = each ( $op_arr ) ) {

			$op .= "<input type='checkbox' ";
			$op .= "name='" . $op_name . "[]' ";
			$op .= "value='" . $key . "' ";
			$op .= "id='checkbox_" . $op_name . $key . "' ";

			if ( isset( $selected[ $key ] ) ) {
				$op .= "checked";
			}

			$op .= ">";
			$op .= "<label for='checkbox_" . $op_name . $key ."' >";

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

// *******************************************
// チェックボックスボックス生成(smarty風に生成）(LABELタグを使わない）
// *******************************************
function html_checkboxes2( $op_arr, $selected=array(), $op_name='', $separator='', $col='' ) {
	$op = '';
	$i = 1;
	if ( is_array( $selected ) ) {
		$selected = array_flip( $selected ); // key,val反転
	} else {
		$selected = array(); // $selectedに配列以外が入ってきた時の対策
	}
	if ( is_array( $op_arr ) ) {
		reset( $op_arr );
		while( list( $key, $val ) = each ( $op_arr ) ) {
			$op .= "<input type='checkbox' ";
			$op .= "name='" . $op_name . "[]' ";
			$op .= "value='" . $key . "' ";
//			$op .= "id='checkbox_" . $op_name . $key . "' ";
			if ( isset( $selected[ $key ] ) ) {
				$op .= "checked";
			}
			$op .= ">";
//			$op .= "<label for='checkbox_" . $op_name . $key ."' >";
			$op .= $val;
//			$op .= "</label>";
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





