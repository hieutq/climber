<?php
// *******************************************************************
// 会員情報編集　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_MEMBER_MODIFY_FORM';

	// 設定配列
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE_MEMBER_REGIST;

	// 初期化
	$referer = $_SERVER["HTTP_REFERER"];
	// 初期化
	if( $referer ) {
		if ( strpos( $referer, '?mode=content&pid=71' ) ) {

		} else {
			$_SESSION[ $s_name ] = NULL;
		}

	} else {
		$_SESSION[ $s_name ] = NULL;
	};


// リクエスト処理
// ------------------------------------
if ( $config_login_flg ) {

	if ( $_POST[ 'MEMBER_MODIFY_SEND' ] != '' ) {


		$_SESSION[ $s_name ][ 'member_name' ]    = stripslashes( $_POST[ 'name' ] );
		$_SESSION[ $s_name ][ 'member_kana' ]    = stripslashes( $_POST[ 'kana' ] );
		$_SESSION[ $s_name ][ 'member_info01' ]  = stripslashes( $_POST[ 'belong1' ] );
		$_SESSION[ $s_name ][ 'member_info02' ]  = stripslashes( $_POST[ 'belong2' ] );
		$_SESSION[ $s_name ][ 'member_mail' ]    = stripslashes( $_POST[ 'mail' ] );
		$_SESSION[ $s_name ][ 'member_zip1' ]    = stripslashes( $_POST[ 'zip1' ] );
		$_SESSION[ $s_name ][ 'member_zip2' ]    = stripslashes( $_POST[ 'zip2' ] );
		$_SESSION[ $s_name ][ 'member_address' ] = stripslashes( $_POST[ 'address' ] );
		$_SESSION[ $s_name ][ 'member_tel' ]     = stripslashes( $_POST[ 'tel' ] );
		$_SESSION[ $s_name ][ 'member_fax' ]     = stripslashes( $_POST[ 'fax' ] );

		$_SESSION[ $s_name ][ 'member_pass' ]   = stripslashes( $_POST[ 'pass1' ] );
		$_SESSION[ $s_name ][ 'member_pass_2' ] = stripslashes( $_POST[ 'pass2' ] );

		$err_msg = member_Modify_Error_Check_PC( $_SESSION[ $s_name ] );

		// 問題が無い場合
		if( $err_msg == "" ){

			// パスワード変更チェック
			$new_pass_flg = member_New_Pass_Check( $_SESSION[ $s_name ] );

			// 会員の旧データ読み込み
			$old_data = member_Mast_Read_By_UserID( $_SESSION[ $s_name ][ 'member_userid' ] );

			// パスワード変更なしの場合、旧データ挿入
			if ( ! $new_pass_flg ) {
				$_SESSION[ $s_name ][ 'member_pass' ] = $old_data[ 'member_pass' ];
			}

			// DBに格納
			member_Mast_Update( $_SESSION[ $s_name ] );

			// メールメイン部分を生成
			$mail_assign = get_Mail_Assign();
			$mail_main_text = <<<EOD
■登録情報

[会員区分]
{$member_kubun01_type[ $_SESSION[ $s_name ][ 'member_kubun01' ] ]}

[会員番号]
{$_SESSION[ $s_name ][ 'member_userid' ]}

[会員氏名]
(旧）{$old_data[ 'member_name' ]}
(新）{$_SESSION[ $s_name ][ 'member_name' ]}

[フリガナ]
(旧）{$old_data[ 'member_kana' ]}
(新）{$_SESSION[ $s_name ][ 'member_kana' ]}

[メールアドレス]
(旧）{$old_data[ 'member_mail' ]}
(新）{$_SESSION[ $s_name ][ 'member_mail' ]}

[連絡先住所]
(旧）
{$old_data[ 'member_zip1' ]}-{$old_data[ 'member_zip2' ]}
{$old_data[ 'member_address' ]}
(新）
{$_SESSION[ $s_name ][ 'member_zip1' ]}-{$_SESSION[ $s_name ][ 'member_zip2' ]}
{$_SESSION[ $s_name ][ 'member_address' ]}

[電話番号]
(旧）{$old_data[ 'member_tel' ]}
(新）{$_SESSION[ $s_name ][ 'member_tel' ]}

[FAX番号]
(旧）{$old_data[ 'member_fax' ]}
(新）{$_SESSION[ $s_name ][ 'member_fax' ]}

[勤務先／学校名・所属]
(旧）{$old_data[ 'member_info01' ]}/{$old_data[ 'member_info02' ]}
(新）{$_SESSION[ $s_name ][ 'member_info01' ]}/{$_SESSION[ $s_name ][ 'member_info02' ]}


EOD;


			// 管理者にメール送信
			// -----------------------------------------
			$mail_data[ 'subject' ]     = 'インターネットサービスの変更手続き(会員番号：'
										 . $_SESSION[ $s_name ][ 'member_userid' ] . ')がありました'; //件名
			$mail_data[ 'sender_mail' ] = CMN_SYSTEM_MAIL; //メールのFROM
			$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
			$mail_data[ 'to' ]          = CMN_ADMIN_MAIL; //メールの宛先
			$mail_data[ 'body' ]        = <<<EOD

軽金属学会HP 管理者様

インターネットサービスの変更手続きがありました。

-------------------------------

{$mail_main_text}

[パスワード]
(旧）{$old_data[ 'member_pass' ]}
(新）{$_SESSION[ $s_name ][ 'member_pass' ]}


{$mail_assign}


EOD;

			// メール送信処理１（管理者宛）
			$err_msg = common_mail_send_1( $mail_data );


			// ユーザーにメール送信
			// -----------------------------------------
			$mail_data[ 'subject' ]     = 'インターネットサービスの登録内容変更を受け付けました'; //件名
			$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
			$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
			$mail_data[ 'to' ]          = $_SESSION[ $s_name ][ 'member_mail' ]; //メールの宛先
			$mail_data[ 'body' ]        = <<<EOD

{$_SESSION[ $s_name ][ 'member_name' ]} 様

インターネットサービスの登録内容変更を受け付けました。

-------------------------------

{$mail_main_text}


{$mail_assign}


EOD;

			// メール送信処理１（ユーザー宛）
			$err_msg = common_mail_send_1( $mail_data );


			// ログインセッションに新データをセット
			$_SESSION[ LOGIN_SESSION_NAME ][ 'userid' ] = $_SESSION[ $s_name ][ 'member_userid' ];
    		$_SESSION[ LOGIN_SESSION_NAME ][ 'passwd' ] = $_SESSION[ $s_name ][ 'member_pass' ];

			// セッションクリア
			$_SESSION[ $s_name ] = NULL;

			// 完了画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=member_modify_fin" );
			exit;
		}

	}

	if ( $_POST[ 'RESET' ] != '' ) {

		$_SESSION[ $s_name ] = NULL;

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=content&pid=71" );
		exit;
	}

} else {
	$err_msg = 'ログインしてください';
}

// データ読出
// ----------------------------------------
	// ログインしていた場合は会員情報を読み出す
	if ( $_SESSION[ $s_name ] == NULL ) {

		if ( $config_login_flg ) {

			$_SESSION[ $s_name ] = member_Mast_Read_By_ID( $_SESSION[ LOGIN_SESSION_NAME ][ 'id' ] );

		}
	}



// ******************************************************************
	$dsp = $_SESSION[ $s_name ];

?>