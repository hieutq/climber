<?php
// *******************************************************************
// お問い合わせ　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_CONTACT_FORM';

	// 設定配列
	$sex_options = $CONFIG_SEX_TYPE;
	$add1_options = $PREF_TYPE;


// リクエスト処理
// ------------------------------------

	if ( $_POST[ 'REGIST' ] != '' ) {

		$title=$_SESSION[ $s_name ][ 'title' ];
		$c_name=$_SESSION[ $s_name ][ 'c_name' ];
		$city=$_SESSION[ $s_name ][ 'city' ];
		$state=$_SESSION[ $s_name ][ 'state' ];
		$cmnt=$_SESSION[ $s_name ][ 'cmnt' ];

		$comment=<<<EOM
Title: {$title}
Company Name: {$c_name}
City: {$city}
State: {$state}
Comment: {$cmnt}
EOM;

		// 内容をDBに格納
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = "INSERT INTO contact_log (";
		$sql .= "             ctct_name,";
		$sql .= "             ctct_kana,";
		$sql .= "             ctct_sex,";
		$sql .= "             ctct_mail,";
		$sql .= "             ctct_tel,";
		$sql .= "             ctct_zip,";
		$sql .= "             ctct_add1,";
		$sql .= "             ctct_add2,";
		$sql .= "             ctct_add3,";
		$sql .= "             ctct_cmnt,";
		$sql .= "             regist_dt";
		$sql .= "     ) VALUES (";
		$sql .= "        '" . $_SESSION[ $s_name ][ 'name' ] . "',";
		$sql .= "        '',";
		$sql .= "        '',";
		$sql .= "        '" . $_SESSION[ $s_name ][ 'mail' ] . "',";
		$sql .= "        '" . $_SESSION[ $s_name ][ 'tel' ] . "',";
		$sql .= "        '',";
		$sql .= "        '',";
		$sql .= "        '',";
		$sql .= "        '',";
		$sql .= "        '" . $comment . "',";
		$sql .= "        '" . date(YmdHis) . "'";
		$sql .= "     )";

		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// 内容を管理者に送付
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM mail_admin";
		$sql .= " WHERE status = 0";
		$res  = cn_query($sql, $cnn);

		if ($res == true){
			$max_cnt = cn_count($res);
			if ($max_cnt > 0){
				for ($i=0; $i<$max_cnt; $i++) {
					$to = cn_contract($res, $i, "mlad_mail");

					// 管理者にメール送信
					// -----------------------------------------
					$mail_data[ 'subject' ]     = 'HPからお問い合わせがありました'; //件名
					$mail_data[ 'sender_mail' ] = CMN_ADMIN_MAIL; //メールのFROM
					$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
					$mail_data[ 'to' ]          = $to; //メールの宛先
					$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

HPからお問い合わせがありました

-------------------------------

[お名前]
{$_SESSION[ $s_name ][ 'name' ]}


[メールアドレス]
{$_SESSION[ $s_name ][ 'mail' ]}

[電話番号]
{$_SESSION[ $s_name ][ 'tel' ]}


[ご用件]
{$comment}

-------------------------------

EOD;

					// メール送信処理１（管理者宛）
					$err_msg = common_mail_send_1( $mail_data );

				}
			}
		}
		db_close($cnn);


		// ユーザーにメール送信
		// -----------------------------------------
		$mail_data2[ 'subject' ]     = 'Thank you for your inquiry'; //件名
		$mail_data2[ 'sender_mail' ] = CMN_ADMIN_MAIL; //メールのFROM
		$mail_data2[ 'fromname' ]    = 'The Japan Institute of Light Metals'; //FROMの名称（差出人名称)
		$mail_data2[ 'to' ]          = $_SESSION[ $s_name ][ 'mail' ]; //メールの宛先
		$mail_data2[ 'body' ]        = <<<EOD

Dear {$_SESSION[ $s_name ][ 'name' ]}

Thank you for your inquiry.
This e-mail has been sent automatically.


We will contact you from the person in charge later.


Please note that it may take a few days to reply.

-------------------------------
The Japan Institute of Light Metals


EOD;

		// メール送信処理2（ユーザー宛）
		$err_msg = common_mail_send_1( $mail_data2 );

		// セッションクリア
		$_SESSION[ $s_name ] = NULL;

		// 一覧にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=contact_fin" );
		exit;

	}

	if ( $_POST[ 'BACK' ] != '' ) {

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=contact" );
		exit;
	}



// 出力設定
// -----------------------------------------------
	$dsp = $_SESSION[ $s_name ];




?>