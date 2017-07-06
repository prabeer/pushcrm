<?php
$apk_name = $a ['Apk_Location'];
$loc = $_SERVER ['SERVER_NAME'] . '/WAR/Advert/uploads/' . $apk_name;
$apk_package = "";
if (isset ( $a ['Apk_Package'] )) {
	$apk_package = $a ['Apk_Package'];
}

if ($status == 'start') {
	
	$res = array (
			"status" => "forceins",
			"camp_id" => $a ['campaign_id'],
			"data" => "http://" . $loc,
			"pkg" => $apk_package			
	);
	echo json_encode ( $res );
} elseif ($status == 'install') {
	$res = array (
			"status" => "forceins",
			"data" => "http://" . $loc,
			"pkg" => $apk_package
					
	);
	echo json_encode ( $res );
}