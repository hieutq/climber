<?php
//***********************************************************************
//  トップページ　Encording UTF-8
//***********************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );
	include_once( "./../../src/common_setup.php" );




	$mode = $_GET[ "mode" ];

	// 検索結果
	if ( ! empty( $_GET[ 'keywords1' ] ) ) {
		$mode = 'keywords1';
	}

	// コンテンツ閲覧
	if( $mode == 'content' ){

		// 大会一覧
		if ( $_GET[ "pid" ] == 78 ) {
			include_once( "./convention_list.php" );
			include( "./templates/common_tmpl2.html" );

		// 大会講演 申込
		} elseif ( $_GET[ "pid" ] == 33 ) {
			$_SESSION[ 'JILM_CONVENTION_ID' ] = intval( $_GET[ 'cid' ] );
			include_once( "./conv_kouen_entry.php" );
			include( "./templates/common_tmpl2.html" );

		// 大会参加 申込
		} elseif ( $_GET[ "pid" ] == 34 ) {
			$_SESSION[ 'JILM_CONVENTION_ID' ] = intval( $_GET[ 'cid' ] );
			include_once( "./conv_sanka_entry.php" );
			include( "./templates/common_tmpl2.html" );

		// シンポジウム一覧
		} elseif ( $_GET[ "pid" ] == 36 ) {
			include_once( "./symp_list.php" );
			include( "./templates/common_tmpl2.html" );

		// これまでに開催したシンポジウム・・・
		} elseif ( $_GET[ "pid" ] == 37 ) {
			header( 'Location: ./?mode=booklist' );

		// J-STAGE
		} elseif ( $_GET[ "pid" ] == 41 ) {
			header( 'Location: http://www.jstage.jst.go.jp/browse/jilm/-char/ja/' );

		// アルミニウムデータベース
		} elseif ( $_GET[ "pid" ] == 64 ) {
			header( 'Location: http://metal.matdb.jp/JAA-DB/' );

		// アルミニウムデータベース
		} elseif ( $_GET[ "pid" ] == 65 ) {
			header( 'Location: http://metal.matdb.jp/magne/' );

		// 著作権規程
//		} elseif ( $_GET[ "pid" ] == 45 ) {
//			header( 'Location: ./?mode=content&pid=44#chosakuken' );

		// 執筆要領
		} elseif ( $_GET[ "pid" ] == 46 ) {
			header( 'Location: ./?mode=content&pid=44#youryou' );

		// インターンシップ
		} elseif ( $_GET[ "pid" ] == 50 ) {
			header( 'Location: http://www.aluminum.or.jp/internship/index.htm' );

		// 会員情報変更
		} elseif ( $_GET[ "pid" ] == 71 ) {
			include_once( "./member_modify.php" );
			$contents = "./templates/part_member_modify.html";
			include( "./templates/common_tmpl3.html" );

		// ネットサービス登録
		} elseif ( $_GET[ "pid" ] == 72 ) {
			include_once( "./member_regist.php" );
			$contents = "./templates/part_member_regist.html";
			include( "./templates/common_tmpl3.html" );

		// 利用の手引き
		} elseif ( $_GET[ "pid" ] == 74 ) {
			include_once( "./member_regist.php" );
			$contents = "./templates/part_member_regist.html";
			include( "./templates/common_tmpl3.html" );

		// 新規登録
		} elseif ( $_GET[ "pid" ] == 75 ) {
			include_once( "./member_regist.php" );
			$contents = "./templates/part_member_regist.html";
			include( "./templates/common_tmpl3.html" );

		// ログイン画面
		} elseif ( $_GET[ "pid" ] == 76 ) {
			include_once( "./login.php" );
			include( "./templates/common_tmpl2.html" );

		// 通常ページ
		} else {
			include_once( "./../../src/part_content.php" );
			include( "./templates/common_tmpl2.html" );
		}

	// 英語圏
	} elseif ( $mode == 'english' ) {
		header( 'Location: ./english/Englishtop.htm' );

	// 大会・講演内容編集
	} elseif ( $mode == 'conv_kouen_edit' ) {
		$_SESSION[ 'JILM_KOUEN_ID' ]      = intval( $_GET[ 'kid' ] );
		$_SESSION[ 'JILM_CONVENTION_ID' ] = intval( $_GET[ 'cid' ] );
		include_once( "./conv_kouen_edit.php" );
		include( "./templates/common_tmpl2.html" );

	// 大会・参加内容編集
	} elseif ( $mode == 'conv_sanka_edit' ) {
		include_once( "./conv_sanka_edit.php" );
		include( "./templates/common_tmpl2.html" );

	// 書籍一覧
	} elseif ( $mode == 'booklist' ) {
		include_once( "./book_list.php" );
		include( "./templates/common_tmpl2.html" );

	// 書籍購入
	} elseif ( $mode == 'bookbuy' ) {
		include_once( "./book_buy.php" );
		include( "./templates/common_tmpl2.html" );

	// 書籍購入完了
	} elseif ( $mode == 'bookbuy_fin' ) {
		include_once( "./book_buy_fin.php" );
		include( "./templates/common_tmpl2.html" );

	// ロードマップ
	} elseif ( $mode == 'roadmap' ) {
		include_once( "./roadmap.php" );
		$contents = "./templates/part_roadmap.html";
		include( "./templates/common_tmpl3.html" );

	// カレンダー
	} elseif ( $mode == 'calendar' ) {
		include_once( "./calendar.php" );
		include( "./templates/common_tmpl3.html" );

	// カレンダー
	} elseif ( $mode == 'calendar_list' ) {
		if ( ! empty( $_GET[ 'year' ] ) ) {
			$_SESSION[ 'CALENDAR_YEAR' ] = intval( $_GET[ 'year' ] );
		} else {
			$_SESSION[ 'CALENDAR_YEAR' ] = date('Y');
		}
		include_once( "./calendar_list.php" );
		include( "./templates/common_tmpl3.html" );

	// インターネット会員登録
	} elseif ( $mode == 'member_regist_fin' ) {
		include_once( "./member_regist_fin.php" );
		include( "./templates/common_tmpl2.html" );

	// 会員情報変更完了
	} elseif ( $mode == 'member_modify_fin' ) {
		include_once( "./member_modify_fin.php" );
		include( "./templates/common_tmpl2.html" );

	// お問い合わせ
	} elseif ( $mode == 'contact' ) {
		include_once( "./contact.php" );
		$contents = "./templates/part_contact.html";
		include( "./templates/common_tmpl3.html" );

	// お問い合わせ確認
	} elseif ( $mode == 'contact_confirm' ) {
		include_once( "./contact_confirm.php" );
		$contents = "./templates/part_contact_confirm.html";
		include( "./templates/common_tmpl3.html" );

	// お問い合わせ完了
	} elseif ( $mode == 'contact_fin' ) {
		include_once( "./contact_fin.php" );
		include( "./templates/common_tmpl2.html" );

	// 技術相談
	} elseif ( $mode == 'contact2' ) {
		include_once( "./contact2.php" );
		$contents = "./templates/part_contact2.html";
		include( "./templates/common_tmpl3.html" );

	// 技術相談 確認
	} elseif ( $mode == 'contact2_confirm' ) {
		include_once( "./contact2_confirm.php" );
		$contents = "./templates/part_contact2_confirm.html";
		include( "./templates/common_tmpl3.html" );

	// 技術相談 完了
	} elseif ( $mode == 'contact2_fin' ) {
		include_once( "./contact2_fin.php" );
		include( "./templates/common_tmpl2.html" );

	//プライバシーポリシー
	} elseif ( $mode == 'privacy' ) {
		include_once( "./privacy.php" );
		include( "./templates/common_tmpl2.html" );
	

	// サイト内検索
	} elseif ( $mode == 'keywords1' ) {
		include_once( "./search_site.php" );
		$contents = "./templates/part_search_site.html";
		include( "./templates/common_tmpl3.html" );

	// ログアウト
	} elseif ( $mode == 'logout' ) {
		include_once( "./logout.php" );
		
	// テスト
	} elseif ( $mode == 'test' ) {
		$_SESSION[ 'JILM_CONVENTION_ID' ] = intval( $_GET[ 'cid' ] );
		include( "./conv_sanka_entry_test.php" );
		include( "./templates/common_tmpl2.html" );


	} else {
		// トップページ
		include_once( "./../../src/part_index.php" );
		$contents = "./templates/part_index.html";
		include( "./templates/common_tmpl.html" );
	}



?>