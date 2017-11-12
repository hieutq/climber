<?php
// *******************************************************************
// ログアウト処理　PHP　Encording UTF-8
// *******************************************************************


	// ログインセッションクリア
	$_SESSION[ LOGIN_SESSION_NAME ] = NULL;

	//TOPへリダイレクト
	header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
	 . dirname( $_SERVER[ "PHP_SELF" ] )	. "/" );
	exit;


?>