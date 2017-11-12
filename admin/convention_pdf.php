<?php

// 設定
// ----------------------------------------
	// セッション名
	$s_name = 'JILM_ADMIN_CONVENTION_PDF';




	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// 初期設定


	// 前ページからのセッション
	$convention_id = $_SESSION[ 'JILM_CONVENTION_ID' ];



	// ディレクトリ設定
	$pdf_dir = "../pdf/conv/" . $convention_id . "/";
	$tmp_dir = "../pdf/conv/";

	// pdfファイル接頭辞
	$file_prefix = 'pdf_';

	// ファイル配列
	$preview_files = array( 
		1 => $pdf_dir. $file_prefix . '1.pdf',
		2 => $pdf_dir. $file_prefix . '2.pdf',
		3 => $pdf_dir. $file_prefix . '3.pdf',
	);

// リクエスト処理
// ----------------------------------------
	// 編集ボタンが押された
	if( $_POST[ "PDF_UP" ] != "" ){
		$_POST[ "PDF_UP" ] = "";

		$pdf_id = stripslashes( $_POST[ 'pdf_id' ] );

		// 画像名のエラーチェツク
		$err_msg = pdf_error_check( $_FILES['pdf'] );


		// 問題が無い場合
		if( $err_msg == "" ){

			if (! file_exists( $pdf_dir )) { mkdir( $pdf_dir, 0777 ); }

			$file_name = $file_prefix . $pdf_id . '.pdf';

			if ( ! move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_dir . $file_name) ) {
				$_SESSION[ 'JILM_ERROR' ] = 'エラー：アップロードできませんでした';
			}


			if ( $_SESSION[ 'JILM_ERROR' ] == '' ) {
				// コメント生成
				$_SESSION[ 'JILM_COMMENT' ] = 'PDFをアップロードしました';

				// 自身にリダイレクト
				header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
				 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_pdf.php" );
				exit;
			}

		}

	}

	// 戻るボタンが押された
	if( $_POST[ "BACK" ] != "" ){
		$_POST[ "BACK" ] = "";

		$_SESSION[ 'JILM_CONVENTION_ID' ] = NULL;

		// 一覧にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/convention_list.php" );
		exit;

	}


// データ読出
// ----------------------------------------

	// 大会データ読み込み
	$data = convention_Data_Read_By_ID( $convention_id );

	$i = 1;
	reset( $preview_files );
	while( list( $key, $val ) = each( $preview_files ) ) {

		if ( file_exists( $val ) ) {
			$preview[ $i ] = '<a href="' . $val . '" target="_blank">'
							. 'プレビュー'
							. '</a><br />';
		} else {
			$preview[ $i ] = '';
		}
		$i++;
	}



	// コメント処理
	// --------------------------------------------------------
	if ( $_SESSION[ 'JILM_COMMENT' ] != '' ) {
		$comment_msg = $_SESSION[ 'JILM_COMMENT' ];
		$_SESSION[ 'JILM_COMMENT' ] = NULL;
	}

	// エラー処理
	// --------------------------------------------------------
	if ( $_SESSION[ 'JILM_ERROR' ] != '' ) {
		$err_msg = $_SESSION[ 'JILM_ERROR' ];
		$_SESSION[ 'JILM_ERROR' ] = NULL;
	}



// ******************************************************************

	$action = "convention_pdf.php";
	$title  = "大会 PDF管理";
	$title2  = "PDF管理";
	$submit = "　登録　";
	$submit_back = "　一覧に戻る　";

	$dsp = $data;



?>