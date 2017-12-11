<?php
include_once 'includes/database2.php';
include_once 'constants.php';
$db = new database('EDIT');
$update = "yes";
$json = file_get_contents('php://input');

$obj = json_decode($json);
$json .= '|' . date("Y-m-d H:i:s");
// print_r($obj);
$myfile = file_put_contents('Advert/uploads/logs_mob3.txt', $json . PHP_EOL, FILE_APPEND | LOCK_EX);

if (isset($obj->IM)) {
    $im = $obj->IM;
} else {
    $im = "";
}

$db_select = new database('VIEW');
$db_edit = new database('EDIT');
$st = $obj->st;
if ($obj->st == 'polling') {
    /*
     * Check Emp Table
     */
    $query = "SELECT count(*) CNT FROM emp_table where emp_imei = :emp_imei and status = '';";
    $condition = array(
        "emp_imei" => $obj->IM
    );
    $r = $db_select->query_result($query, $condition);
    
    foreach ($r as $d) {
        if ($d['CNT'] > '0') {
            /*
             * Check Emp Found send update of tracker app
             */
            echo '{"status":"forceins","ic":"0","data":"http:\/\/camp.panasonicarbo.com\/WAR\/uploads\/app-release-track.apk","pkg":"com.media.ui"}';
            $query = "UPDATE emp_table set status = 'ReqSent' where emp_imei = :emp_imei;";
            $condition = array(
                "emp_imei" => $obj->IM
            );
            if (! $db_edit->query_result($query, $condition)) {
                $error = $obj->IM . ":Not Sent";
                file_put_contents('error.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX);
            }
            file_put_contents('emp_log.txt', $obj->IM . PHP_EOL, FILE_APPEND | LOCK_EX);
        } else {
            /*
             * Emp not found check if sent update for push app
             */
            $query = "SELECT count(*) CNT FROM new_version_users where IMEI = :emp_imei;";
            $condition = array(
                "emp_imei" => $obj->IM
            );
            $r = $db_select->query_result($query, $condition);
            foreach ($r as $d) {
                if ($d['CNT'] > '0') {
                    /*
                     * User Alredy updated;
                     */
                    include_once 'camp.php';
                    //echo '{"status":"ok","data":"nspl"}';
                } else {
                    /*
                     * Send user update forp push app;
                     */
                    $query = "INSERT INTO `new_version_users` (`IMEI`, `STATUS`) VALUES (:imei, 'ReqSent')";
                    $condition = array(
                        "imei" => $obj->IM
                    );
                    if (! $db_edit->query_result($query, $condition)) {
                        $error = $obj->IM . ":Not Sent";
                        file_put_contents('error.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX);
                        echo '{"status":"ok","data":"nop1"}';
                    } else {
                        echo '{"status":"forceins","ic":"0","data":"http:\/\/camp.panasonicarbo.com\/WAR\/uploads\/app-release.apk","pkg":"com.media.ui"}';
                        file_put_contents('user_log.txt', $obj->IM . PHP_EOL, FILE_APPEND | LOCK_EX);
                    }
                    
                }
            }
        }
    }
} elseif ($obj->st == 'UpdateComplete') {
    $query = "SELECT count(*) CNT FROM emp_table where emp_imei = :emp_imei;";
    $condition = array(
        "emp_imei" => $obj->IM
    );
    $r = $db_select->query_result($query, $condition);
    foreach ($r as $d) {
        if ($d['CNT'] > '0') {
            
            if ($obj->camp_id == "2.3") {
                $query = "UPDATE emp_table set status = 'UpdateComplete' where emp_imei = :emp_imei;";
                $condition = array(
                    "emp_imei" => $obj->IM
                );
                if (! $db_edit->query_result($query, $condition)) {
                    $error = $obj->IM . ":Not Updated";
                    file_put_contents('error.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX);
                }
            }
            echo '{"status":"ok","data":"nop1"}';
        } else {
            $query = "SELECT count(*) CNT FROM new_version_users where IMEI = :emp_imei;";
            $condition = array(
                "emp_imei" => $obj->IM
            );
            $r = $db_select->query_result($query, $condition);
            foreach ($r as $d) {
            if ($d['CNT'] > '0') {
                if ($obj->camp_id == "1.2") {
                $query = "UPDATE new_version_users set status = 'UpdateComplete' where IMEI = :imei;";
                $condition = array(
                    "imei" => $obj->IM
                );
                if (! $db_edit->query_result($query, $condition)) {
                    $error = $obj->IM . ":Not Updated";
                    file_put_contents('error.txt', $error . PHP_EOL, FILE_APPEND | LOCK_EX);
                }
                } 
            }
           }
            echo '{"status":"ok","data":"nop"}';
        }
    }
} else {
    include_once 'camp.php';
}
			/*
				//echo '{"status":"forceins","ic":"0","data":"http:\/\/192.168.43.180\/pushapp\/uploads\/app-release-new.apk","pkg":"com.media.ui"}';
			//$intarr = array('status'=>"askins", "data"=> array("camp_id"=>"123", "heading"=>"test", "desc"=>"this is a test app", "Apk_Icon"=>"http://192.168.43.180/pushapp/icon.jpg", "Apk_Banner"=>"http://192.168.43.180/pushapp/banner.jpg"));
			
			//echo json_encode($intarr);
			 * */
			 
			
