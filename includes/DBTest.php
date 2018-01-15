<?php
include_once 'database/ConnectDBView.php';

$instance = ConnectDbView::getInstance();
$ViewConn = $instance->getConnection();
//var_dump($ViewConn);
$x = $ViewConn->query_result('select * from campaign_filters');
print_r($x);