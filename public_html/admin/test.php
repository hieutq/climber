<?php
// *******************************************************************
// DM処理　PHP　Encording UTF-8
// *******************************************************************

	session_start();
	include_once( "./../../include/az_constant.php" );
	include_once( "./../../include/az_common.php" );
	include_once( "./../../include/az_common_2.php" );




	$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = 'SELECT * FROM kouensya_member_mast';
	$sql .= '    WHERE kouen_id = "' . $arr[ 'kouen_id' ] . '" AND';
	$sql .= '          amember_uid = "' . $member_uid . '" AND';
	$sql .= '          status = 0';
	$res = cn_query( $sql, $cnn );
echo 'READY<br>';
	if ( $res == TRUE ) {
echo 'TRUE<br>';
		$cnt = cn_count( $res );
		// DBにデータが存在した場合
		if ( $cnt > 0 ) {

echo 'CNT<br>';

		} 
	}

	db_close($cnn);



?>

