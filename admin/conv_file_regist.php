<?php


// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_ADMIN_CONV_FILE_REGIST';

	// 設定配列
	$file_view_type   = $CONFIG_FILE_VIEW_TYPE;

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// 初期設定
	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_name ] = NULL;
	}

	// 前ページからのセッション
	$convention_id = $_SESSION[ 'JILM_CONVENTION_ID' ];

	// ディレクトリ設定
	$save_dir = "../file/conv/" . $convention_id . "/";
	$tmp_dir  = "../file/conv/";

	// pdfファイル接頭辞
	$file_prefix = 'jilm-' . $convention_id . '-';


// リクエスト処理
// ----------------------------------------

	// 編集ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 入力データを変数に変換
		$_SESSION[ $s_name ][ 'convention_id' ]  = stripslashes( $_POST[ 'convention_id' ] );
		$_SESSION[ $s_name ][ 'file_title' ]     = stripslashes( $_POST[ 'file_title' ] );
		$_SESSION[ $s_name ][ 'file_view' ]      = stripslashes( $_POST[ 'file_view' ] );

		$err_msg = convention_File_Data_Error_Check($_SESSION[ $s_name ], 'admin_regist');

		// 画像を実体化
		if( $_FILES['upfile']['name'] !== "" ){
			// 画像名のエラーチェック
			$err_msg2 = convention_File_Name_error_check( $_FILES['upfile'] );
			if ( !empty( $err_msg ) ) {
				$err_msg .= '<br>' . $err_msg2;
			} else {
				$err_msg = $err_msg2;
			}
		}

		// 問題が無い場合
		if( $err_msg == "" && $err_msg2 == '' ){

			// 画像を実体化
			if( $_FILES['upfile']['name'] !== "" ){

				if (! file_exists( $save_dir )) { mkdir( $save_dir, 0777 ); }

				$extension = getFileExtension( $_FILES['upfile']['name'] );

				$max_file_id   = convention_File_Data_Maxid_Get();
				$file_id   = $max_file_id + 1;

				$file_name = $file_prefix . $file_id  . '.' . $extension;

				if ( ! move_uploaded_file($_FILES['upfile']['tmp_name'], $save_dir . $file_name) ) {
					$_SESSION[ 'JILM_ERROR' ] = 'エラー：アップロードできませんでした';
				}

				// セッションにセット
				$_SESSION[ $s_name ]['file_name' ]     = $file_name;
				$_SESSION[ $s_name ]['file_extension'] = $extension;
				$_SESSION[ $s_name ]['content_type']   = getFileContentType( $extension );
			}

			// DBにINSERT
			convention_File_Data_Insert( $_SESSION[ $s_name ] );

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			// リダイレクト用にセッションセット
			$_SESSION[ 'JILM_CONVENTION_ID' ] = stripslashes( $_POST[ 'convention_id' ] );

			// 一覧画面にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/conv_file_list.php" );
			exit;

		}



	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

			// セッションをクリア
			$_SESSION[ $s_name ] = NULL;

			$_SESSION[ 'JILM_CONVENTION_ID' ]    = stripslashes( $_POST[ 'convention_id' ] );

			// 一覧にリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/conv_file_list.php" );
			exit;
	}



// データ読出
// ----------------------------------------

	if ( empty( $_SESSION[ $s_name ] )  ) {
		$_SESSION[$s_name]['convention_id'] = $_SESSION[ 'JILM_CONVENTION_ID' ];
	}

	// デフォルト値設定
	// --------------------------------------------------------
	


// ******************************************************************
	$action = "conv_file_regist.php";
	$title  = "大会関連ファイル 登録";
	$title2  = "新規登録";
	$submit = "　登 録　";
	$submit_back = "　一覧に戻る　";

	$dsp = $_SESSION[ $s_name ];




?>