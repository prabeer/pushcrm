<?php
if ($status == 'start') {
if(isset($a['Noti_Banner'])){
	$banner = 'http://'.$_SERVER ['SERVER_NAME'] . '/WAR/Advert/uploads/' .$a['Noti_Banner'];
}else{
	$banner = "";
}

if(isset($a['Noti_Icon'])){
	$app_icon = 'http://'.$_SERVER ['SERVER_NAME'] . '/WAR/Advert/uploads/' .$a['Noti_Icon'];
}else{
	$app_icon = "";
}
	//echo $loc;
	$res = array (
			"status" => "noti",
			"data" => array (
					"camp_id" => $a ['campaign_id'],
					"heading" => $a ['Noti_Heading'],
					"desc" => $a['Noti_Description'],
					"Noti_type" => $a['Noti_Type'],
					"Noti_Icon" => $app_icon,
					"Noti_Intent" => $a['Noti_Intent'],
					"Noti_Banner" => $banner
			)
	);
	echo json_encode ( $res );
}