<?php 


if ($status == 'start') {
	
	if($cmd == 'pulldata'){
	$res = array (
			"status" => "pulldata",
			"data" => "",
			"camp_id" => $camp_id
	);
	echo json_encode ( $res );
	}
}
?>