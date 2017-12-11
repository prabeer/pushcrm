<?php
include_once 'constants.php';
include_once 'mob/updateStatus.class.php';
include_once 'includes/database2.php';
$apk_name = $a['Apk_Location'];
$loc = $upload_folder . $apk_name;
$apk_package = "";
if (isset($a['Apk_Package'])) {
    $apk_package = $a['Apk_Package'];
}
if (isset($a['Noti_Icon'])) {
    $icon_name = $http_protocol . $upload_folder . $a['Noti_Icon'];
} else {
    $icon_name = "";
}
if (isset($a['Noti_Banner'])) {
    $banner = $http_protocol . $upload_folder . $a['Noti_Banner'];
} else {
    $banner = '';
}
$update_status = new updateStatus();
if ($status == 'start') {
    
    $res = array(
        "status" => "askins",
        "camp_id" => $a['campaign_id'],
        "data" => $a['Noti_Heading'] . "|" . $a['Noti_Description'] . "|" . $a['Noti_Type'] . "|" . $icon_name . "|" . $apk_package . "|" . $banner . "|" . $a['campaign_id']
    );
    if ($update_status->updateCampStatus($a['campaign_id'], $imei, 'ReqSent', new database('EDIT'))) {} else {
        file_put_contents('error.txt', 'updateCampStatus: Failed' . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
    echo json_encode($res);
} elseif ($status == 'install') {
    $res = array(
        "status" => "forceins",
        "data" => $http_protocol . $loc
    );
    if ($update_status->updateCampStatus($a['campaign_id'], $imei, 'ReqSent', new database('EDIT'))) {} else {
        file_put_contents('error.txt', 'updateCampStatus: Failed' . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
    echo json_encode($res);
}