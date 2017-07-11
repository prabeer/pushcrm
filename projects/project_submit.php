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
	$tac_code = explode(',', preg_replace ( '/[^0-9],/', "", $_POST ['tac_code']));
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
	
		redirect ( '../project.php?r=success' );
	}
 else {
	echo $res;
}

//redirect('http://localhost/WAR/InstallApk.php');




