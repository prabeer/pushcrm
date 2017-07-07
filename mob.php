<?php
include_once 'includes/database2.php';
$db = new database ( 'EDIT' );
$update = "yes";
$json = file_get_contents ( 'php://input' );
$obj = json_decode ( $json );
$json .= '|' . date ( "Y-m-d H:i:s" );
// print_r($obj);
$myfile = file_put_contents ( 'Advert/uploads/logs.txt', $json . PHP_EOL, FILE_APPEND | LOCK_EX );

if (isset ( $obj->IM )) {
	$im = $obj->IM;
} else {
	$im = "";
}
if (isset ( $obj->st )) {
	$st = $obj->st;
} else {
	$st = "";
}
if (isset ( $obj->loc )) {
	$loc = $obj->loc;
} else {
	$loc = "";
}
if (isset ( $obj->mcc )) {
	$mcc = $obj->mcc;
} else {
	$mcc = "";
}
if (isset ( $obj->cel )) {
	$cel = $obj->cel;
} else {
	$cel = "";
}
$status = "";
if (isset ( $obj->ci )) {
	$camp_id = $obj->ci;
}
if (isset ( $obj->dt )) {
	$data = $obj->dt;
}
$f = "";

$query = "insert into polling (IMEI, TimeStamp, status, gps_loc, mcc_mnc, cell_id) values (:IMEI, now(),:status,:gps_loc,:mcc_mnc, :cell_id);";
$data = array (
		"IMEI" => $im,
		"status" => $st,
		"gps_loc" => $loc,
		"mcc_mnc" => $mcc,
		"cell_id" => $cel 
);
$qr = $db->query_result ( $query, $data );

// echo $qr;
// print_r($data);
if ($qr == 1) {
	$db_select = new database ( 'VIEW' );
	$pkg_stat = explode ( "|", $obj->st );
	// echo "pre:".$pkg_stat;
	if ($obj->st == 'polling') {
		// ***************polling****************//
		include_once 'mob/polling.php';
	} elseif ($obj->st == 'NotiReceived') {
		// ***************Receiver****************//
		$status = "Notified";
		$f = 'NotPollig';
	} elseif ($obj->st == 'Inst') {
		// ***************Install****************//
		$query = "SELECT 
    `IMEI`,
    `campaign_id`,
    `status`,
    `Last_update`,
    `method_type`,
    `select_list`,
    `start_date`,
    `end_date`,
    `Apk_Location`,
    `Noti_Description`,
    `Entry_date`,
    `campaign_name`,
    `campaign_type`,
    `Noti_Heading`,
    `Noti_Icon`,
    `Noti_Intent`,
    `Apk_Package`,
    `Noti_Banner`,
    `Noti_Type`
FROM
    `campaigns`
WHERE
    start_date <= NOW()
        AND end_date >= NOW()
        AND IMEI = :IMEI
		AND campaign_id = :campaign_id;		
ORDER BY start_date ASC;";
		$condition = array (
				"IMEI" => $obj->IM,
				"campaign_id" => $obj->ci 
		);
		$r = $db_select->query_result ( $query, $condition );
		$apk_name = $r [0] ['Apk_Location'];
		$apk_pkg = $r [0] ['Apk_Package'];
		$loc = $_SERVER ['SERVER_NAME'] . '/WAR/Advert/uploads/' . $apk_name;
		$res = array (
				"status" => "AskIns",
				"data" => "http://" . $loc,
				"int" => $apk_pkg 
		);
		$status = "installReq";
		$f = 'NotPollig';
		echo json_encode ( $res );
	} elseif ($obj->st == 'Cancel') {
		$status = "installCancel";
		// ***************Cancel****************//
		$f = 'NotPollig';
		$res = array (
				"status" => "Ok",
				"data" => "" 
		);
		echo json_encode ( $res );
	} elseif ($obj->st == 'cmdrst') {
		$datalist = json_decode ( $data );
	} elseif ($pkg_stat [0] == "pkgs") {
		
		$pkg = json_decode ( $pkg_stat [1] );
		$i = 0;
		foreach ( $pkg as $s ) {
			$IMEI = $im;
			$package = $s->pkg;
			$version_name = $s->vrn;
			$version_num = $s->vno;
			$ins_location = $s->inl;
			$ins_time = $s->int;
			$lst_update = $s->lnt;
			$query = "SELECT IMEI, package, version_name, version_num, install_status FROM imei_wise_package_list where IMEI = :IMEI and package = :package and version_name = :version_name and version_num = :version_num and install_status = 'install';";
			$condition = array (
					'IMEI' => xssafe($IMEI),
					'package' => xssafe($package),
					'version_name' => xssafe($version_name),
					'version_num' => xssafe($version_num) 
			);
			$res_select = $db_select->query_result($query,$condition);
			if(empty($res_select)){
				$query = "insert into imei_wise_package_list (IMEI, package, version_name, version_num, install_status, update_date, ins_location, ins_time, lst_update) values (:IMEI, :package, :version_name, :version_num,'install',now(), :ins_location, :ins_time, :lst_update);";
				$condition = array (
						'IMEI' => xssafe($IMEI),
						'package' => xssafe($package),
						'version_name' => xssafe($version_name),
						'version_num' => xssafe($version_num),
						'ins_location' => xssafe($ins_location),
						'ins_time' => $ins_time,
						'lst_update' => $lst_update						
				);
				$res = $db->query_result($query,$condition);
			}
		}
		// print_r($pkg->a0->pkg);
		// echo $pkg_stat ;
		$status = "rcvd";
		$condition = array (
				'campaign_id' => $camp_id,
				'IMEI' => $im,
				'status' => $status 
		);
		// print_r($condition);
		$query = "UPDATE `campaign_IMEI` SET `status` = :status, `Last_update` = now() WHERE `IMEI` = :IMEI and campaign_id = :campaign_id;";
		$r = $db->query_result ( $query, $condition );
	} else {
		$status = $obj->st;
		$f = 'NotPollig';
		$res = array (
				"status" => "Ok",
				"data" => "" 
		);
		echo json_encode ( $res );
	}
	
	if ($f == 'NotPollig') {
		$condition = array (
				'campaign_id' => $camp_id,
				'IMEI' => $im,
				'status' => $status 
		);
		// print_r($condition);
		$query = "UPDATE `campaign_IMEI` SET `status` = :status, `Last_update` = now() WHERE `IMEI` = :IMEI and campaign_id = :campaign_id;";
		$r = $db->query_result ( $query, $condition );
		if ($r == 1) {
		}
	}
	$db->conn_close ();
	$db_select->conn_close ();
}

//{"IM":"351372098243494","st":"NotiReceived"}