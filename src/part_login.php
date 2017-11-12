<?php
// *******************************************************************
// ログイン処理　PHP　Encording UTF-8
// *******************************************************************

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_MEMBER_LOGIN_FORM';

	// 設定配列


	$referer = $_SERVER["HTTP_REFERER"];
	// 初期化
	if( $referer ) {
		if ( strpos( $referer, '?mode=content&pid=76' ) ) {

		} else {
			$_SESSION[ $s_name ] = NULL;
		}

	} else {
		$_SESSION[ $s_name ] = NULL;
	};



// リクエスト処理
// ------------------------------------
	if ( $_POST[ 'USER_LOGIN' ] != '' ) {

		// 入力データを変数に変換
		$_SESSION[ $s_name ][ 'userid' ]   = stripslashes( $_POST[ 'kid' ] );
		$_SESSION[ $s_name ][ 'passwd' ]  = stripslashes( $_POST[ 'pass' ] );

		$err_msg = member_Loign_Error_Check($_SESSION[ $s_name ]);

		// 問題が無い場合
		if( $err_msg == "" ){

			if ( member_Login_Check( $_SESSION[ $s_name ], $s_name ) ) {

				// ログインチェック用セッションにセット
				$_SESSION[ LOGIN_SESSION_NAME ][ 'userid' ] = $_SESSION[ $s_name ][ 'userid' ];
	    		$_SESSION[ LOGIN_SESSION_NAME ][ 'passwd' ] = $_SESSION[ $s_name ][ 'passwd' ];

				// フォームセッションクリア
				$_SESSION[ $s_name ] = NULL;

				//TOPへリダイレクト
				header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
				 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/" );
				exit;

			} else {

				$err_msg = 'ログインできません<br />会員番号・パスワードをご確認ください';

			}
		}
	}

	if ( $_POST[ 'RESET' ] != '' ) {

		$_SESSION[ $s_name ] = NULL;

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/?mode=content&pid=76" );
		exit;
	}


// 出力処理
// ------------------------------------

	$dsp = $_SESSION[ $s_name ];



// ぱんくず読み出し
// ----------------------------------------
	$pid = $_GET[ "pid" ];
	if( $pid != "" ){

		// セッションクリア
		Jilm_Contents_Session_clear();

		Jilm_Contents_Read_1( $pid );

		// 非公開の場合はエラー表示
		if( $_SESSION[ "JILM_CONTENTS_STATUS" ] > 0 ){
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "/?mode=pgerror" );
			exit;
		}

		// 階層表示
		$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		$sql  = " SELECT * FROM content_category";
		$sql .= " WHERE ctgr_id = '" . $_SESSION[ "JILM_CONTENTS_CTGR" ] . "'";
		$res  = cn_query($sql, $cnn);
		if ($res == true){
			$class_tmp = cn_contract($res, 0, "ctgr_name");
			$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
			$_SESSION[ "JILM_CLASS_LIST" ] = "<li>" . $class_tmp . "</li>\n";
		}
		db_close($cnn);

		// 親がある場合は親の名前追加
		if( $ctgr_fold != "0" ){
			Jilm_Fold_List_3( $ctgr_fold );
		}

		$action   = "./?mode=content&pid=" . $pid;
		$title    = $_SESSION[ "JILM_CONTENTS_TITLE" ];
		$class    = $_SESSION[ "JILM_CLASS_LIST" ] . "<li>" . $_SESSION[ "JILM_CONTENTS_TITLE" ] . "</li>\n";
//		$contents = $_SESSION[ "JILM_CONTENTS_BODY" ];
	}

?>