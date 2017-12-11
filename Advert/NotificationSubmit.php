<?php
ob_start ();
include_once '../includes/functions.php';
include_once '../includes/database2.php';
include_once '../includes/sessionV2.php';
$allowed_formats = array (
		"apk",
		"APK" 
);

$allowed_formats2 = array (
		"jpg",
		"JPG",
		"jpeg",
		"JPEG",
		"png",
		"PNG" 
);

if (isset ( $_POST ['camp_name'] )) {
	$camp_name = $_POST ['camp_name'];
}

$select_list_modals = "NIL";
$select_flag_modal = 'OR';
$select_list_region = "NIL";
$select_flag_region = 'OR';
$select_list_oper = "NIL";
$select_flag_oper = 'OR';
$select_list_filter = "NIL";
$select_flag_filter = 'OR';

/*
 * //////////////////////////////////--Filter Data--///////////////////////////
 */
if (isset($_POST['list'])) {
    $list = $_POST['list'];
} else {
    $list = array();
}
// Modals
if (in_array("modals", $list)) {
    if (isset($_POST['select_list_modals'])) {
        $select_list_modals = $_POST['select_list_modals'];
    } else {
        $select_list_modals = "%";
    }
    if (in_array("region", $list)) {
        $select_flag_modal = $_POST['select_flag_modal'];
    } else {
        $select_flag_modal = 'OR';
    }
}

// Region
if (in_array("region", $list)) {
    if (isset($_POST['select_list_region'])) {
        $select_list_region = $_POST['select_list_region'];
    } else {
        $select_list_region = "%";
    }
    if (in_array("oper", $list)) {
        $select_flag_region = $_POST['select_flag_region'];
    } else {
        $select_flag_region = 'OR';
    }
}
// Oper
if (in_array("oper", $list)) {
    if (isset($_POST['select_list_oper'])) {
        $select_list_oper = $_POST['select_list_oper'];
    } else {
        $select_list_oper = "%";
    }
    if (in_array("filter", $list)) {
        $select_flag_oper = $_POST['select_flag_oper'];
    } else {
        $select_flag_oper = 'OR';
    }
}
// Filter
if (in_array("filter", $list)) {
    if (isset($_POST['select_list_filter'])) {
        $select_list_filter = $_POST['select_list_filter'];
    } else {
        $select_list_filter = "%";
    }
    if (in_array("imei", $list)) {
        $select_flag_filter = $_POST['select_flag_filter'];
    } else {
        $select_flag_filter = 'OR';
    }
}
//
$method = "";
$select_list = "";
/*
 * ///////////////////////////////////////////////////////////////////////////
 * */

if (isset ( $_POST ['start'] )) {
	$start_time = date ( 'Y-m-d H:i:s', strtotime ( str_replace ( '-', '/', $_POST ['start'] ) ) );
}
if (isset ( $_POST ['end'] )) {
	$end_date = date ( 'Y-m-d H:i:s', strtotime ( str_replace ( '-', '/', $_POST ['end'] ) ) );
}
if (isset ( $_POST ['IMEI'] )) {
	$imei = $_POST ['IMEI'];
}

if (isset ( $_POST ['noti_head'] )) {
	$Noti_Heading = $_POST ['noti_head'];
}
if (isset ( $_POST ['noti_desc'] )) {
	$Noti_Description = $_POST ['noti_desc'];
}
if (isset ( $_POST ['noti_link'] )) {
	$noti_link = $_POST ['noti_link'];
}

if (isset ( $_FILES ['icon'] )) {
	$Noti_Icon = fileUploader ( $_FILES ['icon'], $allowed_formats2 );
}
if (isset ( $_FILES ['banner'] )) {

	if ($_FILES['banner']['size'] == 0 && $_FILES['banner']['error'] > 0){
	
	$condition = array (
			'method_type' => $method,
			'select_list' => $select_list,
			'start_date' => $start_time,
			'end_date' => $end_date,
			'Noti_Description' => $Noti_Description,
			'campaign_name' => $camp_name,
			'campaign_type' => 'Notification',
			'Noti_Heading' => $Noti_Heading,
			'Noti_Icon' => $Noti_Icon,
			'Noti_Banner' => "",
			'noti_link' => $noti_link,
			'Noti_Type' => 'text'
	);
	
	}else{
		$Noti_ban = fileUploader ( $_FILES ['banner'], $allowed_formats2 );
		$condition = array (
			'method_type' => $method,
			'select_list' => $select_list,
			'start_date' => $start_time,
			'end_date' => $end_date,
			'Noti_Description' => $Noti_Description,
			'campaign_name' => $camp_name,
			'campaign_type' => 'Notification',
			'Noti_Heading' => $Noti_Heading,
			'Noti_Icon' => $Noti_Icon,
			'Noti_Banner' => $Noti_ban,
			'noti_link' => $noti_link,
			'Noti_Type' => 'banner'
	);
	}
} else {
	$condition = array (
			'method_type' => $method,
			'select_list' => $select_list,
			'start_date' => $start_time,
			'end_date' => $end_date,
			'Noti_Description' => $Noti_Description,
			'campaign_name' => $camp_name,
			'campaign_type' => 'Notification',
			'Noti_Heading' => $Noti_Heading,
			'Noti_Icon' => $Noti_Icon,
			'Noti_Banner' => "",
			'noti_link' => $noti_link,
			'Noti_Type' => 'text'
	);
}

$Apk_Description = "";
$add_insert = new database ( 'EDIT' );
$select_data = new database ( 'VIEW' );

$query = 'INSERT INTO `campaign_table` (`method_type`, `select_list`, `start_date`, `end_date`, `Noti_Description`, `Entry_date`, `campaign_name`, `campaign_type`, `Noti_Heading`, `Noti_Icon`, Noti_Banner, Noti_Intent, Noti_Type)
VALUES (:method_type, :select_list, :start_date, :end_date,  :Noti_Description, now(), :campaign_name, :campaign_type, :Noti_Heading, :Noti_Icon, :Noti_Banner,:noti_link,:Noti_Type)';

$res = $add_insert->query_result ( $query, $condition );
// echo $query;

if ($res == 1) {
    $query = "select MAX(s_no) id from campaign_table";
    $camp_res = $select_data->query_result($query);
    $camp_id = "";
    if (count($camp_res) == 1) {
        $camp_id = $camp_res[0]['id'];
    }
    if (insertCampFilter($camp_id, 'modal', $select_flag_modal, $select_list_modals) == 1) {
        if (insertCampFilter($camp_id, 'region', $select_flag_region, $select_list_region) == 1) {
            if (insertCampFilter($camp_id, 'operator', $select_flag_oper, $select_list_oper) == 1) {
                if (insertCampFilter($camp_id, 'filter', $select_flag_filter, $select_list_filter) == 1) {
                    $query = "select  campaign_filter_name, campaign_filter_condition, campaign_filter_value from campaign_filters where campaign_id = :campaign_id;";
                    $condition = array(
                        'campaign_id' => $camp_id
                    );
                    $camps = $select_data->query_result($query, $condition);
                    $modal_name = '%';
                    $opr = '%';
                    $state = '%';
                    $filter = '%';
                    $modal_cond = 'OR';
                    $opr_cond = 'OR';
                    $state_cond = 'OR';
                    $filter_cond = 'OR';
                    
                    foreach ($camps as $camp) {
                        if ($camp['campaign_filter_name'] == 'modal') {
                            $modal_name = $camp['campaign_filter_value'];
                            $modal_cond = $camp['campaign_filter_condition'];
                        } elseif ($camp['campaign_filter_name'] == 'operator') {
                            $opr = $camp['campaign_filter_value'];
                            $opr_cond = $camp['campaign_filter_condition'];
                        } elseif ($camp['campaign_filter_name'] == 'region') {
                            $state = $camp['campaign_filter_value'];
                            $state_cond = $camp['campaign_filter_condition'];
                        } elseif ($camp['campaign_filter_name'] == 'filter') {
                            $filter = $camp['campaign_filter_value'];
                            $filter_cond = $camp['campaign_filter_condition'];
                        }
                    }
                    $query = "select imei from imei_filter_oper_map where modal_name like '" . $modal_name . "' " . $modal_cond . " opr1 like '" . $opr . "' or opr2 like '" . $opr . "' " . $opr_cond . " state1 like '" . $state . "' or state2 like '" . $state . "' " . $state_cond . " filter_name like '" . $filter . "';";
                    $rs = $select_data->query_result($query);
                    foreach ($rs as $im) {
                        $query = "INSERT INTO campaign_imei (IMEI, campaign_id, status) value (:IMEI, :campaign_id,'start');";
                        $condition = array(
                            'IMEI' => $im['imei'],
                            'campaign_id' => $camp_id
                        );
                        
                        $res = $add_insert->query_result($query, $condition);
                        if ($res != 1) {
                            die($res);
                        }
                    }
                }
            }
        }
    }
    print_r($list);
    if (in_array("imei", $list)) {
        echo 'IMEI Filter';
        if (count_chars($imei) > 0) {
            echo 'IMEI char';
            $imei_list = explode(',', $imei);
            foreach ($imei_list as $im) {
                $query = "INSERT INTO campaign_imei (IMEI, campaign_id, status) value (:IMEI, :campaign_id,'start');";
                $condition = array(
                    'IMEI' => $im,
                    'campaign_id' => $camp_id
                );
                
                $res = $add_insert->query_result($query, $condition);
                if ($res != 1) {
                    die($res);
                }
            }
             redirect('../InstallApk.php?r=success');
        }
    }
} else {
     redirect('../InstallApk.php?r=fail&error=' . $res);
}
//redirect('http://localhost/WAR/InstallApk.php');

function insertCampFilter($camp_id, $campaign_filter_name, $campaign_filter_condition, $campaign_filter_value)
{
    $insert_fil = new database('EDIT');
    $query = "INSERT INTO `camp_mgmt`.`campaign_filters`
(`campaign_id`,
`campaign_filter_name`,
`campaign_filter_condition`,
`campaign_filter_value`)
VALUES (:campaign_id,
:campaign_filter_name,
:campaign_filter_condition,
:campaign_filter_value)";
    $condition = array(
        'campaign_id' => $camp_id,
        'campaign_filter_name' => $campaign_filter_name,
        'campaign_filter_condition' => $campaign_filter_condition,
        'campaign_filter_value' => $campaign_filter_value
    );
    
    return $insert_fil->query_result($query, $condition);
}

