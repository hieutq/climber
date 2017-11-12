<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// ファイルが変更された
	if( $_POST[ "file_select" ] != "" ){
		$_SESSION[ "JILM_CSS_FILE" ] = $_POST[ "file_select" ];
	}

	// フォルダ定義、ファイル名取得
	$cssdir = './../society/css';
	if ( $d_handle = @OpenDir($cssdir) ) { 
		while ( $filename = ReadDir( $d_handle ) ) {
			if ($filename != "." && $filename != "..") {
				if( $filename == $_SESSION[ "JILM_CSS_FILE" ] ){
					$css_tbl .= "<option value=\"" . $filename . "\" selected>" . $filename . "</option>\n";
				}else{
					$css_tbl .= "<option value=\"" . $filename . "\">" . $filename . "</option>\n";
				}
			}
		}
	}
	CloseDir($d_handle);

	// データ定義
	$css_data = $cssdir . "/" . $_SESSION[ "JILM_CSS_FILE" ];

	// ＣＳＳファイル読み込み
	$css_file = file_get_contents( $css_data );

	// 変更ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 内容を格納
		$modify_css = $_POST[ "modify_css" ];

		// ファイル上書き
		$css = fopen( $css_data, "w" );
		fwrite( $css, $modify_css );
		fclose($css);

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/css_modify.php" );
		exit;
	}


// ******************************************************************

	$action = "css_modify.php";
	$title  = "CSSファイル編集";
	$submit = "　変 更　";

?>