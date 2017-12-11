<?php
    $mysqli = new mysqli("10.85.28.49", "camp_mgmt", "campmgmt", "camp_mgmt_db");
	if($mysqli->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}else{
		echo "Connected successfully";
	}
?>