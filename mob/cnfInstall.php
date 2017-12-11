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
		AND campaign_id = :campaign_id;
ORDER BY start_date ASC;";
$condition = array (
    "IMEI" => $obj->IM,
    "campaign_id" => $obj->camp_id
);
$r = $db_select->query_result ( $query, $condition );
$apk_name = $r [0] ['Apk_Location'];
$apk_pkg = $r [0] ['Apk_Package'];
$loc = $apk_folder . $apk_name;
$res = array (
    "status" => "installApp",
    "data" => "http://" . $loc ."|" .$apk_pkg,
    "camp_id"=> $obj->camp_id
);
$status = "installReq";
$f = 'NotPollig';
$status = $st;
$condition = array (
    'campaign_id' => $camp_id,
    'IMEI' => $im,
    'status' => $status
);
$query = "UPDATE `campaign_IMEI` SET `status` = :status, `Last_update` = now() WHERE `IMEI` = :IMEI and campaign_id = :campaign_id;";
$r = $db->query_result ( $query, $condition );

echo json_encode ( $res );