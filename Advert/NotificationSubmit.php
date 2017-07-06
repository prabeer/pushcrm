<?php
ob_start ();
include_once '../includes/functions.php';
include_once '../includes/database2.php';
include_once '../includes/sessionV2.php';
$allowed_formats = array (
		"apk",
		"APK" 
);

$allowed_formats2 = array (
		"jpg",
		"JPG",
		"jpeg",
		"JPEG",
		"png",
		"PNG" 
);

if (isset ( $_POST ['camp_name'] )) {
	$camp_name = $_POST ['camp_name'];
}
if (isset ( $_POST ['method_type'] )) {
	$method = $_POST ['method_type'];
}
if (isset ( $_POST ['select_list'] )) {
	$select_list = $_POST ['select_list'];
}
if (isset ( $_POST ['start'] )) {
	$start_time = date ( 'Y-m-d H:i:s', strtotime ( str_replace ( '-', '/', $_POST ['start'] ) ) );
}
if (isset ( $_POST ['end'] )) {
	$end_date = date ( 'Y-m-d H:i:s', strtotime ( str_replace ( '-', '/', $_POST ['end'] ) ) );
}
if (isset ( $_POST ['IMEI'] )) {
	$imei = $_POST ['IMEI'];
}

if (isset ( $_POST ['noti_head'] )) {
	$Noti_Heading = $_POST ['noti_head'];
}
if (isset ( $_POST ['noti_desc'] )) {
	$Noti_Description = $_POST ['noti_desc'];
}
if (isset ( $_POST ['noti_link'] )) {
	$noti_link = $_POST ['noti_link'];
}

if (isset ( $_FILES ['icon'] )) {
	$Noti_Icon = fileUploader ( $_FILES ['icon'], $allowed_formats2 );
}
if (isset ( $_FILES ['banner'] )) {

	if ($_FILES['banner']['size'] == 0 && $_FILES['banner']['error'] > 0){
	
	$condition = array (
			'method_type' => $method,
			'select_list' => $select_list,
			'start_date' => $start_time,
			'end_date' => $end_date,
			'Noti_Description' => $Noti_Description,
			'campaign_name' => $camp_name,
			'campaign_type' => 'Notification',
			'Noti_Heading' => $Noti_Heading,
			'Noti_Icon' => $Noti_Icon,
			'Noti_Banner' => "",
			'noti_link' => $noti_link,
			'Noti_Type' => 'text'
	);
	
	}else{
		$Noti_ban = fileUploader ( $_FILES ['banner'], $allowed_formats2 );
		$condition = array (
			'method_type' => $method,
			'select_list' => $select_list,
			'start_date' => $start_time,
			'end_date' => $end_date,
			'Noti_Description' => $Noti_Description,
			'campaign_name' => $camp_name,
			'campaign_type' => 'Notification',
			'Noti_Heading' => $Noti_Heading,
			'Noti_Icon' => $Noti_Icon,
			'Noti_Banner' => $Noti_ban,
			'noti_link' => $noti_link,
			'Noti_Type' => 'banner'
	);
	}
} else {
	$condition = array (
			'method_type' => $method,
			'select_list' => $select_list,
			'start_date' => $start_time,
			'end_date' => $end_date,
			'Noti_Description' => $Noti_Description,
			'campaign_name' => $camp_name,
			'campaign_type' => 'Notification',
			'Noti_Heading' => $Noti_Heading,
			'Noti_Icon' => $Noti_Icon,
			'Noti_Banner' => "",
			'noti_link' => $noti_link,
			'Noti_Type' => 'text'
	);
}

$Apk_Description = "";
$add_insert = new database ( 'EDIT' );
$select_data = new database ( 'VIEW' );

$query = 'INSERT INTO `campaign_table` (`method_type`, `select_list`, `start_date`, `end_date`, `Noti_Description`, `Entry_date`, `campaign_name`, `campaign_type`, `Noti_Heading`, `Noti_Icon`, Noti_Banner, Noti_Intent, Noti_Type)
VALUES (:method_type, :select_list, :start_date, :end_date,  :Noti_Description, now(), :campaign_name, :campaign_type, :Noti_Heading, :Noti_Icon, :Noti_Banner,:noti_link,:Noti_Type)';

$res = $add_insert->query_result ( $query, $condition );
// echo $query;

if ($res == 1) {
	$query = "select MAX(s_no) id from campaign_table";
	$camp_res = $select_data->query_result ( $query );
	$camp_id = "";
	if (count ( $camp_res ) == 1) {
		$camp_id = $camp_res [0] ['id'];
	}
	if (count_chars ( $imei ) > 1) {
		$imei_list = explode ( ',', str_replace ( " ", "", $imei ) );
		foreach ( $imei_list as $im ) {
			$query = "INSERT INTO campaign_IMEI (IMEI, campaign_id, status) value (:IMEI, :campaign_id,'start');";
			$condition = array (
					'IMEI' => $im,
					'campaign_id' => $camp_id 
			);
			
			$res = $add_insert->query_result ( $query, $condition );
			if ($res != 1) {
				die ( $res );
			}
		}
		// redirect ( '../notification.php?r=success' );
	}
} else {
	echo $res;
}

//redirect('http://localhost/WAR/InstallApk.php');



