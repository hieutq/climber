<?php

// 設定
// ----------------------------------------
	$s_search = 'JILM_MEMBER_UNCERTIFIED_SEARCH'; // 検索用セッション名

	// 設定配列
	$member_kubun01_type  = $CONFIG_MEMBER_TYPE_MEMBER_REGIST;

	// フラグチェック
	if( $_SESSION[ "JILM_ADMIN_EDIT_FLG" ] != "ON" ){
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . "" );
		exit;
	}

	if ( $_GET[ 'INIT_FLG' ] != '' ) {
		$_GET[ 'INIT_FLG' ] = '';
		$_SESSION[ $s_search ] = NULL;
	}


// リクエスト処理
// ----------------------------------------
	if ( $_POST[ 'SEARCH_ON' ] != '' ) {
		$_POST[ 'SEARCH_ON' ] = NULL;
		$_SESSION[ $s_search ]['member_name']    = stripslashes( $_POST[ 'search_name' ] );
		$_SESSION[ $s_search ]['member_userid']  = stripslashes( $_POST[ 'search_userid' ] );
		$_SESSION[ $s_search ]['member_id']      = stripslashes( $_POST[ 'search_id' ] );
		$_SESSION[ $s_search ]['member_info']    = stripslashes( $_POST[ 'search_info' ] );
		$_SESSION[ $s_search ]['member_mail']    = stripslashes( $_POST[ 'search_mail' ] );
		$_SESSION[ $s_search ]['member_kubun01'] = stripslashes( $_POST[ 'search_kubun' ] );
	}

	if ( $_POST[ 'SEARCH_RESET' ] != '' ) {

		$_SESSION[ $s_search ] = NULL;

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/member_uncertified_list.php" );
		exit;
	}
	
	if ( $_GET[ 'CERTIFY' ] != '' ) {
		$_GET[ 'CERTIFY' ] != '';
		
		$member_id = stripslashes( $_GET[ 'member_id' ] );

		// 情報読出
		$input = member_Mast_Read_By_ID( $member_id );

		// 認証済状態に変更
		$input[ 'ninsyou_status' ] = 1;

		if ( member_Userid_Exist_Check( $input[ 'member_userid' ] ) == 0 ) {

			// 認証済にする
			member_Date_Ninsyou_Set( $member_id );

			// 認証メールを送信
			// -----------------------------------------
			$mail_data[ 'subject' ]     = 'インターネット会員に認証されました'; //件名
			$mail_data[ 'sender_mail' ] = CMN_FROM_MAIL; //メールのFROM
			$mail_data[ 'fromname' ]    = '軽金属学会HP'; //FROMの名称（差出人名称)
			$mail_data[ 'to' ]          = $input['member_mail']; //メールの宛先
			$mail_data[ 'body' ]        = <<<EOD

{$input['member_name']}様

インターネット会員に認証されました。
次回よりインターネットサービスをご利用いただけます。

以下登録された情報です。
お確かめください。
-------------------------------
■登録情報

[会員番号]
{$input[ 'member_userid' ]}

[会員区分]
{$member_kubun01_type[ $input[ 'member_kubun01' ] ]}

[氏名]
{$input[ 'member_name' ]}

[カナ]
{$input[ 'member_kana' ]}

[メールアドレス]
{$input[ 'member_mail' ]}

[所属]
{$input[ 'member_info01' ]} / {$input[ 'member_info02' ]}

[所属住所]
{$input[ 'member_zip1' ]} - {$input[ 'member_zip2' ]}
{$input[ 'member_address' ]}

[電話番号]
{$input[ 'member_tel' ]}

[FAX番号]
{$input[ 'member_fax' ]}



EOD;

			$mail_data[ 'body' ] .= get_Mail_Assign(); // 認証を追加

			// メール送信処理１（管理者宛）
			$err_msg = common_mail_send_1( $mail_data );



/*
			// 会員DBをUPDATE
			$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
			tr_begin($cnn);
			$sql = 'UPDATE member_mast SET';
			$sql .= '        ninsyou_status      = 1';
			$sql .= '    WHERE';
			$sql .= '        member_id = "' . $member_id . '"';
			$res = cn_query($sql, $cnn);
			tr_commit($cnn);
			db_close($cnn);
*/
			// 自身ヘリダイレクト
			header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
				. dirname( $_SERVER[ "PHP_SELF" ] ) . "/member_uncertified_list.php" );
			exit;

		} else {
			$err_msg = '会員番号が重複しているので認証出来ません。会員一覧でご確認ください。';
		}

	}


	if ( $_GET[ 'DELETE' ] != '' ) {
		$_GET[ 'DELETE' ] != '';
		
		$member_id = stripslashes( $_GET[ 'member_id' ] );

		// DBをUPDATE
		$cnn =  db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
		tr_begin($cnn);

		$sql = 'UPDATE member_mast SET';
		$sql .= '        status = 1';
		$sql .= '    WHERE';
		$sql .= '        member_id = "' . $member_id . '"';
		$res = cn_query($sql, $cnn);

		tr_commit($cnn);
		db_close($cnn);

		// 自身ヘリダイレクト
		header( "Location: http://" . $_SERVER[ "HTTP_HOST" ] . ""
			. dirname( $_SERVER[ "PHP_SELF" ] ) . "/member_uncertified_list.php" );
		exit;

	}


// 情報読込
// ----------------------------------------
	// 一覧出力
	$tbl = '';
	$cnn  = db_connect(CMN_HOST, CMN_USER, CMN_PASS, CMN_DATB, CMN_PORT);
	$sql  = "SELECT * FROM member_mast";
	$sql .= "    WHERE";
	$sql .= "        ninsyou_status = 0 AND";
	$sql .= "        member_userid != 0 AND";
	$sql .= "        status = 0";
	$sql .= "    ORDER BY member_id";
	$res  = cn_query($sql, $cnn);

	if ($res == true){
		$max_cnt = cn_count($res);

		// ページ当たりの件数の取得
		$dsp_cnt = 25;
		$dsp_page = $_GET[ "dsp_page" ];
		if ($dsp_page == "")    { $dsp_page = 1; }

		// ＭＡＸページの取得
		$max_page = floor($max_cnt / $dsp_cnt) + 1;
		if (!($max_cnt % $dsp_cnt)) { $max_page--; }

		// ページリンクの作成
		for ($i=1; $i<=$max_page; $i++) {
			if ($dsp_page != 1 && $i == $dsp_page - 1) {
				$page_link1 = "[ <a href='member_uncertified_list.php?dsp_page=$i'>前の" . $dsp_cnt . "件</a> ]";
			}
			if ($dsp_page != $max_page && $i == $dsp_page + 1) {
				$page_link2 = "[ <a href='member_uncertified_list.php?dsp_page=$i'>次の" . $dsp_cnt . "件</a> ]";
			}
		}
		if ($dsp_page != $max_page || $max_cnt % $dsp_cnt == 0) {
			$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . $dsp_cnt . "件表示";
		} else {
			$page_info = $max_cnt . "件中 " . (($dsp_page - 1) * $dsp_cnt + 1) . "件から " . ($max_cnt % $dsp_cnt) . "件表示";
		}

		$stt_cnt = ($dsp_page - 1) * $dsp_cnt;
		$end_cnt = $dsp_page * $dsp_cnt - 1;


		// データの頁表示
		for ($i=0; $i<$max_cnt; $i++) {

			if ( $i >= $stt_cnt && $i <= $end_cnt ) {

				$member_id      = cn_contract( $res, $i, 'member_id' );
				$member_userid  = cn_contract( $res, $i, 'member_userid' );
				$member_name    = cn_contract( $res, $i, 'member_name' );
				$member_kana    = cn_contract( $res, $i, 'member_kana' );
				$member_info01  = cn_contract( $res, $i, 'member_info01' );
				$member_info02  = cn_contract( $res, $i, 'member_info02' );
				$member_kubun01 = cn_contract( $res, $i, 'member_kubun01' );
				$member_mail    = cn_contract( $res, $i, 'member_mail' );
				$member_zip1    = cn_contract( $res, $i, 'member_zip1' );
				$member_zip2    = cn_contract( $res, $i, 'member_zip2' );
				$member_address = cn_contract( $res, $i, 'member_address' );
				$member_tel     = cn_contract( $res, $i, 'member_tel' );

				$tbl .= '<form method="GET" name="listForm' . $member_id . '" action="">' . "\n";
				$tbl .= '<tr>' . "\n";

				$tbl .= '<input type="hidden" name="member_id" value="' . $member_id . '">' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $member_id . '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap;">' . "\n";
				$tbl .= '<input type="submit" name="CERTIFY" value=" 認証する ">&nbsp;' . "\n";
				$tbl .= '<input type="submit" name="DELETE" value=" 削除 " onClick="delete_ok(' . $member_id . ',\'' . $member_name . '\')">&nbsp;' . "\n";
				$tbl .= '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $member_userid . '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . '</td>' . "\n";

				$tbl .= '<td style="text-align: center;white-space: nowrap;">' . $CONFIG_MEMBER_TYPE[ $member_kubun01 ] . '</td>' . "\n";

				$tbl .= '<td>';
				$tbl .= $member_name . '(' . $member_kana . ')<br>';
				$tbl .=  '<a href="mailto:' . $member_mail . '">' . $member_mail . '</a>';
				$tbl .=  '</td>' . "\n";

				$tbl .= '<td style="white-space: nowrap;">';
				$tbl .= '所属：' . $member_info01 . '<br>';
				$tbl .= '部署：' . $member_info02 . '<br>';
				$tbl .=  '</td>' . "\n";


				$tbl .= '</tr>' . "\n";
				$tbl .= '</form>' . "\n";

			}
			if ($i >= $end_cnt) { break; }

		}
	}

	db_close($cnn);




// ******************************************************************

	$action = "member_uncertified_list.php";
	$title  = "インターネットサービス申込中一覧";
	$submit = "　登 録　";

	$dsp_tbl = $tbl;
	$dsp_search = $_SESSION[ $s_search ];

?>