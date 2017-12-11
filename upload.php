<?php
include_once 'includes/functions.php';
$allowed_formats = array(
    "zip",
    "ZIP"
);
if (isset($_FILES['file'])) {
    $file_name = fileUploader($_FILES['file'], $allowed_formats, 'yes');
    $file_name_arr = explode("_", $file_name);
 //   print_r($file_name_arr);
    $imei = $file_name_arr[1];
    include_once 'includes/database2.php';
    include_once 'mob/dataCollection.php';
    $data_coll_update = new dataCollection();
    $x = $data_coll_update->updateCollectionStatus($imei, new database('EDIT'), 'collected');
  }

?>