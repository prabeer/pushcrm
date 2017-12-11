<?php
include_once 'includes/database2.php';

/*
 * if (isset($_POST['inv'])) {
 * $inv = $_POST['inv'];
 * } else {
 * $inv = "";
 * }
 */
function getModalList()
{
    $select_data = new database('VIEW');
    $query = "SELECT modal_name FROM modal_details;";
    $res = $select_data->query_result($query);
    return $res;
}

function getStateList()
{
    $select_data = new database('VIEW');
    $query = "SELECT distinct(state) modal_name FROM mcc_mnc_list;";
    $res = $select_data->query_result($query);
    return $res;
}

function getOperatorList()
{
    $select_data = new database('VIEW');
    $query = "SELECT distinct(operator) modal_name FROM mcc_mnc_list;";
    $res = $select_data->query_result($query);
    return $res;
}

function getFilterList()
{
    $select_data = new database('VIEW');
    $query = "SELECT distinct(filter_name) modal_name FROM category_filters;";
    $res = $select_data->query_result($query);
    return $res;
}

/*
switch ($inv) {
    case "Project":
        getModalList();
        break;
    case "Region":
        getStateList();
        break;
    case "Oper":
        getOperatorList();
        break;
    case "CustType":
        getFilterList();
        break;
    default:
        $res = array(
            array(
                "modal_name" => "nodata"
            )
        );
        echo json_encode($res);
}
        
        */
    
