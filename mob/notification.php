<?php
if ($status == 'start') {
	if($camp_id != NULL ){
if(isset($a['Noti_Banner'])){
	$banner = 'http://'.$_SERVER ['SERVER_NAME'] . '/pushapp/Advert/uploads/' .$a['Noti_Banner'];
}else{
	$banner = "";
}

if(isset($a['Noti_Icon'])){
	$app_icon = 'http://'.$_SERVER ['SERVER_NAME'] . '/pushapp/Advert/uploads/' .$a['Noti_Icon'];
}else{
	$app_icon = "";
}
	//echo $loc;
	$res = array (
			"status" => "noti",
			"camp_id" => $camp_id,
			"data" => 
			$a ['Noti_Heading']."|".$a['Noti_Description']."|".$a['Noti_Type']."|".$app_icon."|".$a['Noti_Intent']."|".$banner
			
	);
	echo json_encode ( $res );
	}
}