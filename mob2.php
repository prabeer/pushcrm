<?php
$json = file_get_contents ( 'php://input' );
$obj = json_decode($json);
$json .= '|' . date ( "Y-m-d H:i:s" );
file_put_contents ( 'logs_f.txt', $json . PHP_EOL, FILE_APPEND | LOCK_EX );
//$res = array('status'=>'ok','data'=>'null');

$st = $obj->st;
if (isset ( $obj->IM )) {
	$im = ( $obj->IM );
	//$im = substr($obj->IM,0,8);
	//echo $im;
if($im = '351372098128794'){
	if($st == "polling"){}
		$res = array (
			"status" => "askins",
			"camp_id" => "123456",
			"data" =>"Push Test|Testing Push app Script|banner|http://192.168.43.180/pushapp/icon.jpg||http://192.168.43.180/pushapp/banner.jpg|123456"
					
				//	 logg("ddatta:"+Push Test+"|"+Testing Push app Script+"|"+banner+"|"+"Noti_Intent"+"|"+det[3]+"|"+det[5]+"|"+camp_id);
	);
	echo json_encode($res);
}elseif($st == "inscnf"){
	
}
} else {
	$res = array('status'=>'ok','data'=>'null');
	echo json_encode($res);
	$im = "";
} 
 