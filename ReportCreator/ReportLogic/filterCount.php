<?php
class filterCount{
    function getFilterCount(){
        $query = "SELECT filter_name, imei_count FROM filter_count;";
              
        include_once '/includes/database/ConnectDBView.php';
        $instance = ConnectDbView::getInstance();
        $ViewConn = $instance->getConnection();
        $results =  $ViewConn->query_result($query);

        if(count($results) > 0){
            return $results;
        }else{
            return 0;
        }
    }
}