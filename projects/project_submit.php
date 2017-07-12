<?php
ob_start ();
include_once '../includes/functions.php';
include_once '../includes/database2.php';
include_once '../includes/sessionV2.php';

if (isset ( $_POST ['proj_name'] )) {
	$proj_name = $_POST ['proj_name'];
}
if (isset ( $_POST ['desc'] )) {
	$description = $_POST ['desc'];
}
if (isset ( $_POST ['tac_code'] )) {
	$tac_code = explode ( ',', preg_replace ( '/[^0-9],/', "", $_POST ['tac_code'] ) );
}

if (isset ( $_POST ['IMEI'] )) {
	$imei = $_POST ['IMEI'];
}

$add_insert = new database ( 'EDIT' );
$select_data = new database ( 'VIEW' );

$condition = array (
		'proj_name' => $proj_name,
		'desc' => $description,
		'status' => 'enable' 
);

$query = 'INSERT INTO `project_details` (`project_name`, `project_details`, `project_insert_date`, `project_status`)
VALUES (:proj_name, :desc, now(), :status)';

$res = $add_insert->query_result ( $query, $condition );
// echo $query;

if ($res == 1) {
	foreach ( $tac_code as $t ) {
		$query = "select MAX(s_no) id from project_details";
		$camp_res = $select_data->query_result ( $query );
		$camp_id = "";
		if (count ( $camp_res ) == 1) {
			$camp_id = $camp_res [0] ['id'];
		}
	}
	redirect ( '../project.php?r=success' );
} else {
	echo $res;
}

//redirect('http://localhost/WAR/InstallApk.php');




