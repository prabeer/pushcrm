<?php
$query = "SELECT camp_name, camp_device, camp_click, camp_install, camp_launch, camp_imei, camp_notirecvd FROM campaign_temp where camp_imei = :camp_imei;";
$condition = array(
    "camp_imei" => $obj->IM
);
$camp_data = $db_select->query_result($query, $condition);
// print_r($camp_data);
if (count($camp_data) == 0) {
    $query = "INSERT INTO `campaign_temp` (`camp_imei`, `camp_reqsent`) VALUES (:imei, 'ReqSent')";
    $condition = array(
        "imei" => $obj->IM
    );
    if (! $db_edit->query_result($query, $condition)) {
        $error = $obj->IM . ":Not Sent";
        file_put_contents('error.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX);
        
        $intarr = array(
            'status' => "askins",
            "data" => array(
                "camp_id" => "123",
                "heading" => "test",
                "desc" => "this is a test app",
                "Apk_Icon" => "http://camp.panasonicarbo.com/pushapp/icon.jpg",
                "Apk_Banner" => "http://camp.panasonicarbo.com/pushapp/banner.jpg"
            )
        );
    }
    echo json_encode($intarr);
} else {
    foreach ($camp_data as $data) {
        switch ($st) {
            case 'inst':
                updatecampaign_temp('camp_click', 'ok');
                echo '{"status":"forceins","ic":"0","data":"http:\/\/camp.panasonicarbo.com\/pushapp\/uploads\/vas-app.apk","pkg":"com.media.ui"}';
                break;
            case 'AskInc':
                updatecampaign_temp('camp_install', 'Inc');
                break;
            case substr($obj->st, 0, 3) == 'AFL':
                updatecampaign_temp('camp_launch', 'AFL');
                break;
            case 'NotiReceived':
                updatecampaign_temp('camp_notirecvd', 'NotiReceived');
                break;
            case 'Cancel':
                updatecampaign_temp('camp_click', 'cancel');
                break;
            final
                echo '{"status":"ok","data":"nop1"}';
        }
    }
}

function updatecampaign_temp($col, $data)
{
    $query = "UPDATE campaign_temp set " . $col . " = '" . $data . "' where camp_imei = :camp_imei;";
    $condition = array(
        "camp_imei" => $obj->IM
    );
    if (! $db_edit->query_result($query, $condition)) {
        $error = $obj->IM . ":Not Updated";
        file_put_contents('error.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}