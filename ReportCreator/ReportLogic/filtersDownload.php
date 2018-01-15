<?php

class filtersDownload
{

    function getfilterDownloads($filter_name)
    {
        $query = "select imei, filter_name from filter_view where UPPER(filter_name) = UPPER(:filter_name)";
        $data = array(
            "filter_name" => $filter_name
        );
        
        include_once '../includes/database/ConnectDBView.php';
        $instance = ConnectDbView::getInstance();
        $ViewConn = $instance->getConnection();
        $results =  $ViewConn->query_result($query, $data);
        
        if(count($results) > 0){
            return $results;
        }else{
            return 0;
        }
    }
    

}