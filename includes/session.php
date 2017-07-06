<?php
function sec_session_start() {
	$session_name = '377d9832e963f1722e9148485989a3c81292e5c8772e51073b720d66dcd1d619dbbe1f6371d3719266870ee80e88989b9276285e11c367ed4e895a198aca1875'; // Set a custom session name
	$secure = FALSE;
	// This stops JavaScript being able to access the session id.
	$httponly = TRUE;
	// Forces sessions to only use cookies.
	if (ini_set ( 'session.use_only_cookies', 1 ) === FALSE) {
		header ( "Location: error.php" );
		exit ();
	}
	// Gets current cookies params.
	
	
	session_set_cookie_params ( 36000, "/", "", $secure, $httponly );
	
	// Sets the session name to the one set above.
	
	
		session_start (); // Start the PHP session
	
	session_regenerate_id ( true ); // regenerated the session, delete the old one.
}