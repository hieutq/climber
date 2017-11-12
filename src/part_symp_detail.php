<?php
// *******************************************************************
// シンポジウム情報　PHP　Encording UTF-8
// *******************************************************************

	// データ読出
	if ( $_GET[ 'ID' ] != '' ) {
		$symp_id = intval( $_GET[ 'ID' ] );
		$data = symposium_Data_Read_By_ID( $symp_id );
		$_GET[ 'ID' ] = '';
	}

	// 改行 => br
	$data[ 'symp_biko01' ]  = nl2br( $data[ 'symp_biko01' ] );
	$data[ 'symp_biko02' ]  = nl2br( $data[ 'symp_biko02' ] );
	$data[ 'symp_kyousan' ] = nl2br( $data[ 'symp_kyousan' ] );
	$data[ 'symp_place' ]   = nl2br( $data[ 'symp_place' ] );

	// 区切り => ", "
	$data[ 'symp_sewa' ]    = preg_replace( '/\n/', ', ', $data[ 'symp_sewa' ] );

	$contents_tbl_1 = ''
. '<span style="font-weight: bold;">' . $data[ 'symp_name' ] . '</span><br />' . "\n"
. $data[ 'symp_subtitle' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[概要]</span><br />'   . $data[ 'symp_biko01' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[詳細]</span><br />'   . $data[ 'symp_biko02' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[主催]</span><br />'   . $data[ 'symp_syusai' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[後援]</span><br />'   . $data[ 'symp_kouen' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[協賛]</span><br />'   . $data[ 'symp_kyousan' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[会場]</span><br />'   . $data[ 'symp_place' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[参加費]</span><br />' . $data[ 'symp_price_text' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[定員]</span><br />'   . $data[ 'symp_capacity' ] . '<br /><br />' . "\n"
. '<span style="font-weight: bold;">[世話人]</span><br />' . $data[ 'symp_sewa' ] . '<br /><br />' . "\n";

	$contents_tbl_2 = ''
. '日時：'   . $data[ 'symp_date3_text' ] . '<br />' . "\n";

?>