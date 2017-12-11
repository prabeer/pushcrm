<?php
include_once 'includes/database2.php';
include_once 'constants.php';
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

$db_select = new database ( 'VIEW' );
$db_edit = new database ( 'EDIT' );

if ($obj->st == 'polling') {

	$query = "SELECT emp_imei, status FROM emp_table where emp_imei = :emp_imei and status = 'UpdateComplete';";
	$condition = array (
				"emp_imei" => $obj->IM
		);
	$r = $db_select->query_result ( $query, $condition );
	if(count($r) != 0){
	foreach($r as $d){
		
		echo '{"status":"pulldata","data":"nop"}';
		$query = "UPDATE emp_table set status = 'PollReq' where emp_imei = :emp_imei;";
		$condition = array (
				"emp_imei" => $obj->IM
			);
			if(!$db_edit->query_result ( $query, $condition )){
				$error = $obj->IM.":Not Updated";
				file_put_contents ( 'error.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX );
				}
			}
	}else{
		
		echo '{"status":"ok","data":"nop"}';
	}

}elseif ($obj->st == 'UpdateComplete'){
	$query = "SELECT count(*) CNT FROM emp_table where emp_imei = :emp_imei;";
	$condition = array (
				"emp_imei" => $obj->IM
		);
	$r = $db_select->query_result ( $query, $condition );
	foreach($r as $d){
		if($d['CNT'] == '1'){
			
			if($obj->camp_id == "2.3"){
			$query = "UPDATE emp_table set status = 'UpdateComplete' where emp_imei = :emp_imei;";
		$condition = array (
				"emp_imei" => $obj->IM
			);
			if(!$db_edit->query_result ( $query, $condition )){
				$error = $obj->IM.":Not Updated";
				file_put_contents ( 'error.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX );
				}
			}
			echo '{"status":"ok","data":"nop"}';
		}else{
			echo '{"status":"ok","data":"nop"}';
		}
	}
	
}