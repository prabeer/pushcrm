<?php
$apk_name = $a ['Apk_Location'];
$loc = $_SERVER ['SERVER_NAME'] . '/WAR/Advert/uploads/' . $apk_name;
$apk_package = "";
if (isset ( $a ['Apk_Package'] )) {
	$apk_package = $a ['Apk_Package'];
}
if(isset($a['Noti_Icon'])){
	$icon_name = 'http://'.$_SERVER ['SERVER_NAME'] . '/WAR/Advert/uploads/' .$a['Noti_Icon'];
}else{
	$icon_name = "";
}
if ($status == 'start') {
	
	$res = array (
			"status" => "askins",
			"data" => array (
					"camp_id" => $a ['campaign_id'],
					"heading" => $a ['Noti_Heading'],
					"desc" => $a ['Noti_Description'],
					"Apk_Icon" => $icon_name,
					"Apk_Package" => $apk_package 
			) 
	);
	echo json_encode ( $res );
} elseif ($status == 'install') {
	$res = array (
			"status" => "forceins",
			"data" => "http://" . $loc 
	);
	echo json_encode ( $res );
}