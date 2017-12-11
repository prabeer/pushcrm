<?php
include_once 'includes/database2.php';
include_once 'constants.php';
$db = new database('EDIT');
$update = "yes";
$json = file_get_contents('php://input');
$obj = json_decode($json);
// var_dump($json);
$json .= '|' . date("Y-m-d H:i:s");
// print_r($obj);
$myfile = file_put_contents('Advert/uploads/logs.txt', $json . PHP_EOL, FILE_APPEND | LOCK_EX);

if (isset($obj->IM)) {
    $im = $obj->IM;
} else {
    $im = "";
}
if (isset($obj->st)) {
    $st = $obj->st;
} else {
    $st = "";
}
if (isset($obj->loc)) {
    $loc = $obj->loc;
} else {
    $loc = "";
}
if (isset($obj->mcc)) {
    $mcc = $obj->mcc;
} else {
    $mcc = "";
}
if (isset($obj->cel)) {
    $cel = $obj->cel;
} else {
    $cel = "";
}
if (isset($obj->dev)) {
    $modal = $obj->dev;
} else {
    $modal = "";
}
if (isset($obj->ver)) {
    $app_ver = $obj->ver;
} else {
    $app_ver = "";
}
$status = "";
if (isset($obj->camp_id)) {
    $camp_id = $obj->camp_id;
}
if (isset($obj->dt)) {
    $data = $obj->dt;
}
$f = "";

$query = "insert into polling (IMEI, TimeStamp, status, gps_loc, mcc_mnc, cell_id, modal_name) values (:IMEI, now(),:status,:gps_loc,:mcc_mnc, :cell_id, :modal);";
$data = array(
    "IMEI" => $im,
    "status" => $st,
    "gps_loc" => $loc,
    "mcc_mnc" => $mcc,
    "cell_id" => $cel,
    "modal" => $modal
);
$qr = $db->query_result($query, $data);

$query = "update imei_table SET last_update = now(), gps_loc = :gps_loc, mcc_mnc = :mcc_mnc, cell_id = :cell_id, modal_name = :modal, app_ver = :app_ver where imei = :imei ;";
$mdl_arr = explode("|", $modal);
$modal = $mdl_arr[0];
$data1 = array(
    "imei" => $im,
    "gps_loc" => $loc,
    "mcc_mnc" => $mcc,
    "cell_id" => $cel,
    "modal" => $modal,
    "app_ver" => $app_ver
);
$qr = $db->query_result($query, $data1);
// print_r($data1);
// echo $qr;
if ($qr < 1) {
    $query = "insert into imei_table (imei, last_update, gps_loc, mcc_mnc, cell_id, modal_name, app_ver) values (:imei, now(),:gps_loc,:mcc_mnc, :cell_id, :modal, :app_ver);";
    $data1 = array(
        "imei" => $im,
        "gps_loc" => $loc,
        "mcc_mnc" => $mcc,
        "cell_id" => $cel,
        "modal" => $modal,
        "app_ver" => $app_ver
    );
    $qr = $db->query_result($query, $data1);
}

$db_select = new database('VIEW');
$pkg_stat = explode("|", $st);

switch ($st) {
    case polling:
        include_once 'mob/polling.php';
        break;
    case InsCnf:
        include_once 'mob/cnfInstall.php';
        break;
    case InsBanCnf:
        include_once 'mob/cnfInstall.php';
        break;
    default:
        include_once 'mob/updateStatus.php';
}
// echo "pre:".$pkg_stat;

$db->conn_close();
$db_select->conn_close();


//{"IM":"351372098243494","st":"NotiReceived"}