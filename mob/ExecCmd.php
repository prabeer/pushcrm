<?php 


if ($status == 'start') {
	
	$res = array (
			"status" => "execcmd",
			"data" => array (
					"camp_id" => $a ['campaign_id'],
					"cmd" => $a ['Apk_Location']
			) 
	);
	echo json_encode ( $res );
}
?>