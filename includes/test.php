<?php 
require  'sessionV2.php';
$session = new session ();
// Set to true if using https
$session->start_session ( '_s', false );

$_SESSION ['something'] = 'A value.';
echo $_SESSION ['something'];

?>