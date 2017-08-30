<?php 
include_once 'includes/functions.php';
$allowed_formats = array (
		"zip",
		"ZIP" 
);
if (isset ( $_FILES ['file'] )) {
	$Noti_Icon = fileUploader ( $_FILES ['file'], $allowed_formats );
}
echo "File Uploaded:".$Noti_Icon;

?>