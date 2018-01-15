
<?php
include_once '../../includes/database/database2.php';
$search = $_GET['search'];
$query = "SELECT city FROM city_list where upper(city) like upper('%".$search."%');";
$db = new database ( "VIEW" );
$data = $db->query_result ( $query );
$farr = array ();
foreach ( $data as $d ) {
	$arr = array (
			"text" => $d ["city"],
			"value" => $d ["city"] 
	);
	array_push ( $farr, $arr );
}
echo json_encode($farr);
