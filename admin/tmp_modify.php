<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// ファイルが変更された
	if( $_POST[ "file_select" ] != "" ){
		$_SESSION[ "JILM_TMPL_FILE" ] = $_POST[ "file_select" ];
		$_POST[ "file_select" ] = NULL;
	}

	// フォルダ定義、ファイル名取得
	$tmpl_dir = './../society/templates';
	if ( $d_handle = @OpenDir($tmpl_dir) ) { 
		while ( $filename = ReadDir( $d_handle ) ) {
			if ($filename != "." && $filename != "..") {
				if( $filename == $_SESSION[ "JILM_TMPL_FILE" ] ){
					$tmpl_tbl .= "<option value=\"" . $filename . "\" selected>" . $filename . "</option>\n";
				}else{
					$tmpl_tbl .= "<option value=\"" . $filename . "\">" . $filename . "</option>\n";
				}
			}
		}
	}
	CloseDir($d_handle);

	// データ定義
	$tmpl_data = $tmpl_dir . "/" . $_SESSION[ "JILM_TMPL_FILE" ];

	// ファイル読み込み
	$tmpl_file = file_get_contents( $tmpl_data );

	// 変更ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 内容を格納
		$modify_tmpl = $_POST[ "modify_tmpl" ];

		// ファイル上書き
		$tmpl = fopen( $tmpl_data, "w" );
		fwrite( $tmpl, $modify_tmpl );
		fclose($tmpl);

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/tmp_modify.php" );
		exit;
	}

// ******************************************************************

	$action = "tmp_modify.php";
	$title  = "テンプレート編集";
	$submit = "　変 更　";

?>