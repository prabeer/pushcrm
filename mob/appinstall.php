<?php
include_once 'constants.php';
$apk_name = $a ['Apk_Location'];
$loc = $upload_folder . $apk_name;
$apk_package = "";
if (isset ( $a ['Apk_Package'] )) {
	$apk_package = $a ['Apk_Package'];
}
if(isset($a['Noti_Icon'])){
	$icon_name = 'http://'.$_SERVER ['SERVER_NAME'] . '/pushapp/Advert/uploads/' .$a['Noti_Icon'];
}else{
	$icon_name = "";
}
if ($status == 'start') {
	
	$res = array (
			"status" => "askins",
			"camp_id" => $a ['campaign_id'],
			"data" =>
					$a ['Noti_Heading']."|". $a ['Noti_Description']."|".$icon_name."|".$apk_package 
	);
	echo json_encode ( $res );
} elseif ($status == 'install') {
	$res = array (
			"status" => "forceins",
			"data" => "http://" . $loc 
	);
	echo json_encode ( $res );
}