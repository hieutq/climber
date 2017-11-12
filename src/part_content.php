<?php
// *******************************************************************
// コンテンツ閲覧　PHP　Encording UTF-8
// *******************************************************************


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
		if ($res == true) {
			$max_cnt = cn_count($res);
			if( $max_cnt > 0 ) {
				$class_tmp = cn_contract($res, 0, "ctgr_name");
				$ctgr_fold = cn_contract($res, 0, "ctgr_oya");
				$_SESSION[ "JILM_CLASS_LIST" ] = "<li>" . $class_tmp . "</li>\n";
			}
		}
		db_close($cnn);

		// 親がある場合は親の名前追加
		if( $ctgr_fold != "0" ){
			Jilm_Fold_List_3( $ctgr_fold );
		}

		$action   = "./?mode=content&pid=" . $pid;
		$title    = $_SESSION[ "JILM_CONTENTS_TITLE" ];
		if(($_SESSION[ "JILM_CONTENTS_CTGR" ] == 20)||($_SESSION[ "JILM_CONTENTS_CTGR" ] == 23)){
			$class  = $_SESSION[ "JILM_CLASS_LIST" ] . "\n";
		}else{
			$class  = $_SESSION[ "JILM_CLASS_LIST" ] . "<li>" . $_SESSION[ "JILM_CONTENTS_TITLE" ] . "</li>\n";
		}
		$contents = $_SESSION[ "JILM_CONTENTS_BODY" ];
	}else{
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

?>