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


	$referer = $_SERVER["HTTP_REFERER"];
	// 初期化
	if( $referer ) {
		if ( strpos( $referer, '?mode=contact' ) ) {

		} else {
			$_SESSION[ $s_name ] = NULL;
		}

	} else {
		$_SESSION[ $s_name ] = NULL;
	};

	// エラーの初期化
	$err_msg = array();


// リクエスト処理
// ------------------------------------

	if ( $_POST[ 'CONFIRM' ] != '' ) {

		$_SESSION[ $s_name ][ 'name' ]    = stripslashes( $_POST[ 'name' ] );
		$_SESSION[ $s_name ][ 'kana' ]    = stripslashes( $_POST[ 'kana' ] );
		$_SESSION[ $s_name ][ 'sex' ]    = stripslashes( $_POST[ 'sex' ] );
		$_SESSION[ $s_name ][ 'mail' ]    = stripslashes( $_POST[ 'mail' ] );
		$_SESSION[ $s_name ][ 'mail_check' ]    = stripslashes( $_POST[ 'mail_check' ] );
		$_SESSION[ $s_name ][ 'tel' ]      = stripslashes( $_POST[ 'tel' ] );
		$_SESSION[ $s_name ][ 'zip' ]    = stripslashes( $_POST[ 'zip' ] );
		$_SESSION[ $s_name ][ 'add1' ]    = stripslashes( $_POST[ 'add1' ] );
		$_SESSION[ $s_name ][ 'add2' ]    = stripslashes( $_POST[ 'add2' ] );
		$_SESSION[ $s_name ][ 'add3' ]    = stripslashes( $_POST[ 'add3' ] );
		$_SESSION[ $s_name ][ 'cmnt' ]    = stripslashes( $_POST[ 'cmnt' ] );
		$_SESSION[ $s_name ][ 'check' ]    = stripslashes( $_POST[ 'check' ] );


		$err_msg = contact_Form_Error_Check( $_SESSION[ $s_name ] );

		if ( count( $err_msg ) == 0 ) {

			header( 'Location: ./?mode=contact_confirm' );

		}


	}



// 出力設定
// -----------------------------------------------
	// エラーの出力処理
	reset( $err_msg );
	while( list( $key, $val ) = each( $err_msg ) ) {
		$err_style1[ $key ] = ' style="color: #F00;"';
		$err_style2[ $key ] = ' style="display: block;"';
	}



	if ( $_SESSION[ $s_name ][ 'check' ] != '' ) {
		$_SESSION[ $s_name ][ 'check_checked' ] = 'checked';
	}

	if ( $_SESSION[ $s_name ][ 'sex' ] != '' ) {
		$_SESSION[ $s_name ][ 'sex_checked' ][$_SESSION[ $s_name ][ 'sex' ]] = 'checked';
	}

	$dsp = $_SESSION[ $s_name ];



function contact_Form_Error_Check( $arr ) {

	$err_msg = array();


	if ( ! $arr[ 'name' ] ) {
		$err_msg[ 'name' ] = '名前が未入力です';
	}

	if ( ! $arr[ 'mail' ] ) {
		$err_msg[ 'mail' ] = 'メールアドレスが未入力です';
	}
	if ( is_Mail( $arr[ 'mail' ] ) ) {
		if ( $err_msg[ 'mail' ] == '' ) {
			$err_msg[ 'mail' ] = 'メールアドレスの' . is_Mail( $arr[ 'mail' ] );
		}
	}

	if ( ! $arr[ 'mail_check' ] ) {
		$err_msg[ 'mail_check' ] = '確認用メールアドレスが未入力です';
	}
	if ( $arr[ 'mail_check' ] != $arr[ 'mail' ] ) {
		if ( $err_msg[ 'mail_check' ] == '' ) {
			$err_msg[ 'mail_check' ] = '確認用メールアドレスが一致しません';
		}
	}

	if ( $arr[ 'zip' ] ) {
		if ( is_Tell( $arr[ 'zip' ] ) ) {
			$err_msg[ 'zip' ] = '郵便番号1は半角数字とﾊｲﾌﾝ(-)以外の入力はできません';
		}
		if ( strlen( $arr[ 'zip' ] ) > 8 ) {
			if ( $err_msg[ 'zip' ] == '' ) {
				$err_msg[ 'zip' ] = '郵便番号は8桁までしか入力できません';
			}
		}
	}

	if ( $arr[ 'tel' ] ) {
		if ( is_Tell( $arr[ 'tel' ] ) ) {
			$err_msg[ 'tel' ] .= '電話番号は' . is_Tell( $arr[ 'tel' ] );
		}
	}

	if ( ! $arr[ 'cmnt' ] ) {
		$err_msg[ 'cmnt' ] = 'ご用件が未入力です';
	}

	if ( ! $arr[ 'check' ] ) {
		$err_msg[ 'check' ] = 'チェックされていません';
	}

	return $err_msg;

}

?>