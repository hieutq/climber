<?php
// *******************************************************************
// お問い合わせ　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_CONTACT2_FORM';

	// 設定配列
	$sex_options = $CONFIG_SEX_TYPE;
	$add1_options = $PREF_TYPE;


// リクエスト処理
// ------------------------------------

	if ( $_POST['REGIST'] != '' ) {

		// 内容をDBに格納
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = "INSERT INTO contact2_log (";
		$sql .= "             ctct_name,";
		$sql .= "             ctct_kana,";
		$sql .= "             ctct_company,";
		$sql .= "             ctct_mail,";
		$sql .= "             ctct_tel,";
		$sql .= "             ctct_zip,";
		$sql .= "             ctct_add1,";
		$sql .= "             ctct_add2,";
		$sql .= "             ctct_add3,";
		$sql .= "             ctct_cmnt,";
		$sql .= "             regist_dt";
		$sql .= "     ) VALUES (";
		$sql .= "        '" . $_SESSION[$s_name]['name'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['kana'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['company'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['mail'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['tel'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['zip'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['add1'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['add2'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['add3'] . "',";
		$sql .= "        '" . $_SESSION[$s_name]['cmnt'] . "',";
		$sql .= "        '" . date(YmdHis) . "'";
		$sql .= "     )";

		$res = cn_query($sql, $cnn);
		tr_commit($cnn);
		db_close($cnn);

		// お問い合わせ番号取得
		$max_id=1;
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql = "SELECT MAX(ctct_id) AS max_id FROM contact2_log";
		$res = cn_query($sql, $cnn);
		if ($res == true){
			$max_cnt = cn_count($res);
			if ($max_cnt > 0){
				$max_id = cn_contract($res, 0, "max_id");
			}
		}
		db_close($cnn);
		$contact_id=sprintf("%03d", $max_id);

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
					$mail_data['subject']     = 'HPから維持会員技術相談がありました（相談番号' . $contact_id . '）'; //件名
					$mail_data['sender_mail'] = CMN_ADMIN_MAIL; //メールのFROM
					$mail_data['fromname']    = '軽金属学会HP'; //FROMの名称（差出人名称)
					$mail_data['to']          = $to; //メールの宛先
					$mail_data['body']        = <<<EOD

軽金属学会HP 管理者様

HPから維持会員技術相談がありました（相談番号{$contact_id}）

-------------------------------
[お名前]
{$_SESSION[$s_name]['name']}

[フリガナ]
{$_SESSION[$s_name]['kana']}

[会社名・所属・役職]
{$_SESSION[$s_name]['company']}

[メールアドレス]
{$_SESSION[$s_name]['mail']}

[電話番号]
{$_SESSION[$s_name]['tel']}

[所属住所]
{$_SESSION[$s_name]['zip']}
{$PREF_TYPE[$_SESSION[$s_name]['add1']]}
{$_SESSION[$s_name]['add2']}
{$_SESSION[$s_name]['add3']}

[ご相談内容]
{$_SESSION[$s_name]['cmnt']}

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
		$mail_data2['subject']     = '技術相談室のご利用ありがとうございます（相談番号' . $contact_id . '）'; //件名
		$mail_data2['sender_mail'] = CMN_ADMIN_MAIL; //メールのFROM
		$mail_data2['fromname']    = '軽金属学会HP'; //FROMの名称（差出人名称)
		$mail_data2['to']          = $_SESSION[$s_name]['mail']; //メールの宛先
		$mail_data2['body']        = <<<EOD

{$_SESSION[$s_name]['name']}様

維持会員技術相談室のご利用ありがとうございます。
このメールは自動送信されています。

相談番号は{$contact_id}です。
後ほど担当者よりご連絡させていただきます。


ご返信までに数日かかる場合がありますので予めご了承ください。

今後とも軽金属学会をよろしくお願いします。

-------------------------------
一般社団法人 軽金属学会


EOD;

		// メール送信処理2（ユーザー宛）
		$err_msg = common_mail_send_1( $mail_data2 );

		// セッションクリア
		$_SESSION[$s_name] = NULL;

		// 一覧にリダイレクト
		header( "Location: http://" . $_SERVER["HTTP_HOST"] . ""
		 . dirname( $_SERVER["PHP_SELF"] )	. "/?mode=contact2_fin" );
		exit;

	}

	if ( $_POST['BACK'] != '' ) {

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER["HTTP_HOST"] . ""
		 . dirname( $_SERVER["PHP_SELF"] )	. "/?mode=contact2" );
		exit;
	}



// 出力設定
// -----------------------------------------------
	$dsp = $_SESSION[$s_name];




?>