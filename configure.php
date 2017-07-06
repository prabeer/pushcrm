<?php
// include_once 'includes/function.php';
$uri = htmlentities ( $_SERVER ['REQUEST_URI'] );
$u = explode ( '/', $uri );
$uri = $u ['1'];
if (!defined('URI')) define ( 'URI', $uri );
function calc_flag($flag, $value) {
	$flag_val = array ();
	if (strtoupper ( $flag ) == 'PRIORITY') {
		$flag_val [1] = 'Minor';
		$flag_val [2] = 'Major';
		$flag_val [3] = 'Critical';
	} elseif (strtoupper ( $flag ) == 'BUGSTATUS') {
		$flag_val [1] = 'Open';
		$flag_val [2] = 'Fixed by ODM';
		$flag_val [3] = 'Resolved';
		$flag_val [4] = 'Running Change';
		$flag_val [5] = 'Closed';
		$flag_val [6] = 'Removed';		
	} elseif (strtoupper ( $flag ) == 'BUGFREQUENCY') {
		$flag_val [3] = 'Always';
		$flag_val [2] = 'Sometimes';
		$flag_val [1] = 'Once';
	}elseif (strtoupper ( $flag ) == 'TCSTATUS') {
		$flag_val [1] = 'Open';
		$flag_val [2] = 'Pass';
		$flag_val [3] = 'Failed';
		$flag_val [4] = 'Invalid Test';
                $flag_val [5] = 'Lack of Resources';
	} else {
		return 'Invalid Flag';
	}
	
	if (isset ( $flag_val [$value] )) {
		return $flag_val [$value];
	} else {
		return 'Invalid';
	}
}
