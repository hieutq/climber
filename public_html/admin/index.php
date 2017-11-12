<?php
	error_reporting('E_ALL & ~E_NOTICE');
	session_start();

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
		. dirname( $_SERVER[ "PHP_SELF" ] ) . "/admin_login_check.php" );
		exit;
	}
	$test = $_GET[ "mode" ];
	if($test == "admin"){
		$_SESSION[ "JILM_TEST MODE" ] = true;
	}

?>
<html>

<head>
<meta http-equiv="Content-Language" content="ja">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Applied ControlPanel</title>
</head>

<frameset framespacing="1" border="0" cols="168,*" frameborder="0">
  <frame name="side" target="main" src="admin_side.php" class="side">
  <frame name="main" src="contents_list.php" scrolling="auto">
  <noframes>
  <body>


  </body>
  </noframes>
</frameset>

</html>
