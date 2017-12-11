<?php

class updateStatus
{

    public function updateCampStatus($camp_id, $imei, $status, $conn)
    {
        $condition = array(
            'campaign_id' => $camp_id,
            'IMEI' => $im,
            'status' => $status
        );
        $query = "UPDATE `campaign_imei` SET `status` = :status, `Last_update` = now() WHERE `IMEI` = :IMEI and campaign_id = :campaign_id;";
        $r = $conn->query_result($query, $condition);
        $conn->conn_close();
        if ($r == 1) {
            return true;
        } else {
            return false;
        }
        
    }
}