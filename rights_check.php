<?php 
$rights_db = new database('VIEW');

$query = "select rights_id, user_right_name, user_right_type, user_right_page, user_right_status, user_right_details, rights_page_part, user_id from rights_select where user_id = :user_id";

$condition = array(
		'user_id' => $_SESSION ['userid']
);

$rights = $rights_db->query_result($query, $condition);
// print_r($rights);

$query = "select project_id from user_project_rights where user_id = :user_id";

$condition = array(
		'user_id' => $_SESSION ['userid']
);

$prights = $rights_db->query_result($query, $condition);
// print_r($result_data);

$rights_db->conn_close();

function rights_data(array $data, $parent, $child = null) {
	$result = 0;
	foreach ($data as $rights) {
		if (strtoupper($parent) == strtoupper($rights['user_right_type'])) {
			if (isset($child)) {
				if (strtoupper($child) == strtoupper($rights['user_right_name'])) {
					$result = 1;
					break;
				} else {
					$result = 0;
				}
			} else {
				$result = 1;
				break;
			}
		} else {
			$result = 0;
		}
	}
	return $result;
}

function project_rights(array $data, $project_id) {
	foreach ($data as $prights) {
		if (strtoupper($project_id) == strtoupper($prights['project_id'])) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}