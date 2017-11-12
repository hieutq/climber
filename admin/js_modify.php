<?PHP

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	// ファイルが変更された
	if( $_POST[ "file_select" ] != "" ){
		$_SESSION[ "JILM_JS_FILE" ] = $_POST[ "file_select" ];
	}

	// フォルダ定義、ファイル名取得
	$jsdir = './../society/js';
	if ( $d_handle = @OpenDir($jsdir) ) { 
		while ( $filename = ReadDir( $d_handle ) ) {
			if ($filename != "." && $filename != "..") {
				if( $filename == $_SESSION[ "JILM_JS_FILE" ] ){
					$js_tbl .= "<option value=\"" . $filename . "\" selected>" . $filename . "</option>\n";
				}else{
					$js_tbl .= "<option value=\"" . $filename . "\">" . $filename . "</option>\n";
				}
			}
		}
	}
	CloseDir($d_handle);

	// データ定義
	$js_data = $jsdir . "/" . $_SESSION[ "JILM_JS_FILE" ];

	// ｊｓファイル読み込み
	$js_file = file_get_contents( $js_data );

	// 変更ボタンが押された
	if( $_POST[ "OK_1" ] != "" ){
		$_POST[ "OK_1" ] = "";

		// 内容を格納
		$modify_js = $_POST[ "modify_js" ];

		// ファイル上書き
		$js = fopen( $js_data, "w" );
		fwrite( $js, $modify_js );
		fclose($js);

		// 自身にリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/js_modify.php" );
		exit;
	}


// ******************************************************************

	$action = "js_modify.php";
	$title  = "jsファイル編集";
	$submit = "　変 更　";

?>