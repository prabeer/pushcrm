<?php
error_reporting ( 0 );
include_once 'includes/sessionV2.php';
$session = new session ();
// Set to true if using https
$session->start_session ( '_s', false );
include_once 'includes/functions.php';
include_once 'includes/database2.php';

/*
 * User Status=
 * Active = 1
 * Reset = 0
 *
 */

if (isset ( $_POST ['password'] ) && isset ( $_POST ['username'] )) {
	$user_data = new database ( 'VIEW' );
	
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	$query = 'SELECT `username`,  `user_login_time`, `user_login_flag`, `user_status`, `user_attempts`, `user_last_login_time`, `user_login_ip`, `user_last_login_ip`, `password`, `last_password`, akey
FROM `userid_details` where username =:username;';
	$condition = [ 
			'username' => $username 
	];
	$user_result = $user_data->query_result ( $query, $condition );
	if (count ( $user_result ) == 1) {
		foreach ( $user_result as $userid_data ) {
			$attempts = $userid_data ['user_attempts'];
			if ($userid_data ['user_status'] == 0) {
				redirect ( 'login_reset.php?uid=' . $userid_data ['akey'] );
				exit ();
				echo 'Password Reset';
			} elseif ($userid_data ['user_status'] == 1) {
				if ($userid_data ['user_attempts'] >= 4) {
					redirect ( 'login.php?e=invalid' );
					exit ();
					echo 'Invalid Attempts';
				} else {
					$hash = $userid_data ['password'];
					$user_ins = new database ( 'EDIT' );
					// echo password_hashing($password).'<br>'.$hash;
					
					if (password_varifying ( $password, $hash )) {
						
						if (is_empty ( $userid_data ['user_login_time'] )) {
							$last_login_time = date ( 'Y-m-d H:i:s' );
						} else {
							$last_login_time = $userid_data ['user_login_time'];
						}
						
						$condition = [ 
								'user_last_login_time' => $last_login_time,
								'user_login_ip' => xssafe ( $_SERVER ['REMOTE_ADDR'] ),
								'user_last_login_ip' => $userid_data ['user_login_ip'],
								'username' => $userid_data ['username'] 
						];
						// print_r($condition);
						$query = "update userid_details SET user_login_time = now(), user_last_login_time = :user_last_login_time, user_attempts = '0', user_login_ip= :user_login_ip, user_last_login_ip = :user_last_login_ip where username = :username;";
						$result = $user_ins->query_result ( $query, $condition );
						if ($result == 1) {
							
							$query = "SELECT `s.no` S_NO,
    `user_name`,
    `user_first_name`,
    `user_designation`,
    `user_profile_photo`,
    `user_description`,
    `user_create_time`,
    `user_last_mod_time`,
    `user_creation_id`,
    `user_last_name`,
    `user_contact_no`,
    `user_address`,
    `user_type`,
    `user_location`,
   `user_bar_code`,
    `user_email`
FROM `user_details` where user_name = :user_name;";
							$condition = [ 
									'user_name' => $username 
							];
							$result_data = $user_data->query_result ( $query, $condition );
							
							if (is_array ( $result_data ) && count ( $result_data ) == 1) {
								foreach ( $result_data as $user ) {
									$_SESSION ['userid'] = $user ['S_NO'];
									$_SESSION ['username'] = $user ['user_name'];
									if (isset ( $user ['user_first_name'] )) {
										$userFullName = $user ['user_first_name'] . " ";
									}
									if (isset ( $user [`user_last_name`] )) {
										$userFullName .= $user ['user_last_name'];
									}
									
									$_SESSION ['user_full_name'] = $userFullName;
									redirect ( 'index.php' );
									exit ();
									echo 'Login Success';
								}
							}
						} else {
							// redirect ( 'login.php?f=invalid' );
							// exit ();
							echo 'Insert Error' . $result;
						}
					} else {
						$condition = [ 
								'attempts' => $attempts + 1 
						];
						$query = "update userid_details SET  user_attempts = :attempts";
						$r = $user_ins->query_result ( $query, $condition );
						redirect ( 'login.php?e=invalid' );
						exit ();
						echo 'Invalid Username Password';
					}
				}
			} else {
				$condition = [ 
						'attempts' => $attempts + 1 
				];
				$query = "update userid_details SET  user_attempts = :attempts";
				$r = $user_ins->query_result ( $query, $condition );
				redirect ( 'login.php?e=invalid' );
				exit ();
				echo 'Invalid Username Password';
			}
		}
	} else {
		redirect ( 'login.php?e=invalid' );
		exit ();
		echo 'Invalid Username Password';
	}
	$user_data->conn_close ();
} else {
	redirect ( 'login.php?e=invalid' );
	exit ();
	echo 'Invalid Username Password';
}
$user_ins->conn_close ();
