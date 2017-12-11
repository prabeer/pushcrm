<?php
error_reporting(E_ALL | E_STRICT);
require('includes/UploadHandler.php');
class CustomUploadHandler extends UploadHandler {
  
    protected function trim_file_name($file_path, $name, $size, $type, $error, $index, $content_range) {
        $name_apd = md5($name.date("Ymdh"));
       $name =  $name_apd."_".$name;
       // $name = str_replace('.', '', $name);
        return $name;
    }
}
$upload_handler = new CustomUploadHandler();