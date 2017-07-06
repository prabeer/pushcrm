<?php
ob_start ();
include_once '../includes/functions.php';
include_once '../includes/database2.php';
include_once '../includes/sessionV2.php';


if (isset ( $_POST ['camp_name'] )) {
	$camp_name = $_POST ['camp_name'];
}
if (isset ( $_POST ['method_type'] )) {
	$method = $_POST ['method_type'];
}
if (isset ( $_POST ['select_list'] )) {
	$select_list = $_POST ['select_list'];
}
if (isset ( $_POST ['cmd_list'] )) {
	$cmd_list = $_POST ['cmd_list'];
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




$Apk_Description = "";
$add_insert = new database ( 'EDIT' );
$select_data = new database ( 'VIEW' );

$condition = array (
		'method_type' => $method,
		'select_list' => $select_list,
		'start_date' => $start_time,
		'end_date' => $end_date,
		'Apk_Location' => $cmd_list,
		'campaign_name' => $camp_name,
		'campaign_type' => 'ExecCmd'		
);

$query = 'INSERT INTO `campaign_table` (`method_type`, `select_list`, `start_date`, `end_date`,`Apk_Location`, `Entry_date`, `campaign_name`, `campaign_type`)
VALUES (:method_type, :select_list, :start_date, :end_date, :Apk_Location,  now(), :campaign_name, :campaign_type)';

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
		redirect ( '../CmdCenter.php?r=success' );
	}
} else {
	echo $res;
}

//redirect('http://localhost/WAR/InstallApk.php');




