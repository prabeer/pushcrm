<?php

class dataCollection
{

    public function checkCollectionStatus($imei, $conn)
    {
        $query = "select IMEI, status, time_stamp from data_collection where time_stamp < DATE_SUB(now(), INTERVAL 1 DAY) and IMEI = :imei";
        
        $condition = array(
            "imei" => $imei
        );
        $r = $conn->query_result($query, $condition);
        // print_r($r);
        $conn->conn_close();
        if (count($r) > 0) {
            return $r;
        }
        return false;
    }

    public function updateCollectionStatus($imei, $conn, $status)
    {
        $query = "update data_collection set time_stamp = now(), status = :status where IMEI = :IMEI;";
        $condition = array(
            "IMEI" => $imei,
            "status" => $status
        );
        $r = $conn->query_result($query, $condition);
        $conn->conn_close();
        if ($r > 0) {
            return true;
        }
        return false;
    }

    public function insertCollectionStatus($imei, $conn, $status)
    {
        $query = "insert into data_collection ('IMEI', 'time_stamp', 'status') values (:IMEI, now(), 'start');";
        $condition = array(
            "IMEI" => $imei
        );
        $r = $conn->query_result($query, $condition);
        $conn->conn_close();
        if ($r > 0) {
            return true;
        }
        return false;
    }
}