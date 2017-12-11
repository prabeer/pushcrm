<?php
$status = $st;
$condition = array (
    'campaign_id' => $camp_id,
    'IMEI' => $im,
    'status' => $status
);
$query = "UPDATE `campaign_imei` SET `status` = :status, `Last_update` = now() WHERE `IMEI` = :IMEI and campaign_id = :campaign_id;";
$r = $db->query_result ( $query, $condition );
if($r==1){
    $res = array('status'=>'ok','data'=>'null', 'camp_id'=>'0');
    echo json_encode($res);
}else{
    $res = array('status'=>'ok','data'=>'null', 'camp_id'=>'0');
    echo json_encode($res);
}