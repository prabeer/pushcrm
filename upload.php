<?php
include_once 'includes/functions.php';
$allowed_formats = array(
    "zip",
    "ZIP"
);
if (isset($_FILES['file'])) {
    $file_name = fileUploader($_FILES['file'], $allowed_formats, 'yes');
    $file_name_arr = explode('_',$file_name);
    $imei = $file_name_arr[1];
    include_once 'includes/database/database2.php';
    include_once 'mob/dataCollection.php';
    $data_coll_update = new dataCollection();
   $log =  $data_coll_update->updateCollectionStatus($imei, new database('EDIT'), 'collected');
  // file_put_contents('error_logs.txt', $file_name."|".$imei."|".$log . PHP_EOL, FILE_APPEND | LOCK_EX);
}

?>