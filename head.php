<?php
include_once 'includes/sessionV2.php';
$session = new session ();
// Set to true if using https
$session->start_session ( '_s', false );
?>
<!DOCTYPE html>

<?php
// @ob_start ();
// $_SESSION ['userid'] = '1';
// $_SESSION ['username'] = 'Super Admin';

include_once 'includes/functions.php';
include_once 'includes/database2.php';
if (isset ( $_SESSION ['username'] )) {
	if (is_empty ( $_SESSION ['username'] ) || is_empty ( $_SESSION ['userid'] )) {
		$_SESSION ['username'] = "";
		$_SESSION ['userid'] = "";
		redirect ( "login.php" );
		exit ();
	}
} else {
	redirect ( "login.php" );
	exit ();
}
// $_SESSION ['userid'] = '1';
// $_SESSION ['username'] = 'Super Admin';
?>
<html>
<head>
<title>Weattach Robot</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="assets/images/favicon.ico">
<link
	href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
	rel='stylesheet' type='text/css'>
 
	<?php
	$uri_check = "";
	$uri = substr ( explode ( '?', strtoupper ( $_SERVER ['REQUEST_URI'] ) ) ['0'], 1 );
	$uri_arr = explode ( '/', $uri );
	$uri_arrx = explode ( '/', $uri );
	
	$arr_c = count ( $uri_arr );
	// echo $arr_c;
	if ($arr_c > 1) {
		array_pop ( $uri_arr );
		$ar = implode ( "", $uri_arr );
		$uri_check = $ar . $uri_arrx [$arr_c - 1];
	} else {
		$ar = '';
		$uri_check = implode ( "", $uri_arr );
	}
	
	//echo '<span style="color:white;">'.$uri_check.'</span>';
	
	if (($uri_check == $ar.'INDEX.PHP')||($uri_check == $ar.'ADVERT_DASHBOARD.PHP')) {
		?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/jquery-jvectormap.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/dashboard-projects.css">
<!-- --- -->

<?php
	} elseif (($uri_check == $ar.'PROJECTLIST.PHP')) {
		?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/chosen.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/projects.css">
	<?php
	} elseif ($uri_check == $ar.'CREATEPROJECT.PHP') {
		
		?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="assets/css/bootstrap3-wysihtml5.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
			<?php
	}elseif ($uri_check == $ar.'INSTALLAPK.PHP') {
		
		?>

<link rel="stylesheet" href="assets/css/bootstrap.css">
<link href="plugins/fileupload/cssfileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="assets/css/bootstrap3-wysihtml5.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
			<?php
	} elseif (($uri_check == $ar.'CREATEPROJECT2.PHP') || ($uri_check == $ar.'MODIFYPROJECT2.PHP')) {
		
		?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/ion-range-slider.css">
<link rel="stylesheet" href="assets/css/ion-range-slider-skin-flat.css">
<link rel="stylesheet" href="assets/css/bootstrap-slider.css">
<link rel="stylesheet" href="assets/css/nouislider.css">
<link rel="stylesheet" href="assets/css/switchery.css">
<link rel="stylesheet" href="assets/css/bootstrap-switch.css">
<link rel="stylesheet" href="assets/css/jasny-bootstrap.css">
<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="assets/css/bootstrap-clockpicker.css">
<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.css">
<link rel="stylesheet" href="assets/css/chosen.css">
<link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables-bs3.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
			<?php
	} elseif (($uri_check == $ar.'CREATEPROJECT3.PHP') || ($uri_check == $ar.'MODIFYPROJECT3.PHP')) {
		
		?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/chosen.css">

<link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/project.css">
			<?php
	} elseif ($uri_check == $ar.'MODIFYPROJECT.PHP') {
		?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/bootstrap3-wysihtml5.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
		<?php
	} elseif (($uri_check == $ar.'ADDNEWUSER.PHP') || ($uri_check == $ar.'ASSIGNRIGHTS.PHP') || ($uri_check == $ar.'ADDNEWGROUP.PHP') || ($uri_check == $ar.'MODPROJECT.PHP')) {
		?>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/chosen.css">
<link rel="stylesheet" href="assets/css/bootstrap3-wysihtml5.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/account.css">
		
<?php
	} elseif (($uri_check == $ar.'PROJECTDETAILS.PHP') || ($uri_check == $ar.'TESTCASEDETAILS.PHP')) {
		
		?>
	
	<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/chosen.css">
<link rel="stylesheet" href="assets/css/charts-morris-default.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/project.css">
		
	<?php
	} elseif (($uri_check == $ar.'USERDETAIL.PHP') || ($uri_check == $ar.'GROUPDETAILS.PHP')) {
		?>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/charts-morris-default.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/member.css">
	<?php
	} elseif (($uri_check == $ar.'USERLIST.PHP') || ($uri_check == $ar.'GROUPLIST.PHP')) {
		?>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/chosen.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/members.css">
	
	<?php
	} elseif ($uri_check == $ar.'USERMESSAGES.PHP') {
		?>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/icheck-minimal.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/account.css">
		<?php
	} elseif ($uri_check == $ar.'ACTIVITYLOGS.PHP') {
		?> 
		<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/activities.css">
		<?php
	} elseif (($uri_check == $ar.'BUGLIST.PHP') || ($uri_check == $ar.'TESTCASEAPPROVAL.PHP') || ($uri_check == $ar.'TESTCASELIST.PHP') || ($uri_check == $ar.'PROJECTTESTCASE.PHP')) {
		?> 
		<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/chosen.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/tickets.css">
		
		<?php
	} elseif ($uri_check == $ar.'DRIVE.PHP') {
		?><link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/account.css">
 <?php
	} elseif ($uri_check == $ar.'TODOLIST.PHP') {
		?>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">	
		
		<?php
	} elseif ($uri_check == $ar.'CALENDAR.PHP') {
		?>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/fullcalendar.css">
<link rel="stylesheet" href="assets/css/fullcalendar-print.css"
	media="print">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
		
		
		<?php
	} elseif ($uri_check == $ar.'TESTCASEUPLOADER.PHP') {
		?>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/jasny-bootstrap.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables-bs3.css">
<link rel="stylesheet" href="assets/css/dropzone.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
		
		
		<?php
	} elseif ($uri_check == $ar.'PROJECTDISCUSSIONS.PHP') {
		?>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/bootstrap-markdown.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/discussion.css">
		
		 <?php
	} elseif ($uri_check == $ar.'PROJECTINVENTRYLIST.PHP') {
		?> <link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/charts-morris-default.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/invoices.css"><?php
	} elseif ($uri_check == $ar.'PROJECTINVENTRY.PHP') {
		?>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables-bs3.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/tickets.css">
		<?php
	} elseif (($uri_check == $ar.'BUGLISTNEW.PHP')) {
		?> 
		<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/chosen.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables-bs3.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/tickets.css">
		
		<?php
	} elseif ($uri_check == $ar.'INVENTRYMANAGER.PHP') {
		?>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/ion-range-slider.css">
<link rel="stylesheet" href="assets/css/ion-range-slider-skin-flat.css">
<link rel="stylesheet" href="assets/css/bootstrap-slider.css">
<link rel="stylesheet" href="assets/css/nouislider.css">
<link rel="stylesheet" href="assets/css/switchery.css">
<link rel="stylesheet" href="assets/css/bootstrap-switch.css">
<link rel="stylesheet" href="assets/css/jasny-bootstrap.css">
<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="assets/css/bootstrap-clockpicker.css">
<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.css">
<link rel="stylesheet" href="assets/css/chosen.css">
<link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables.css">
<link rel="stylesheet" href="assets/css/jquery-data-tables-bs3.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">	
		<?php
	} else {
		?>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/jquery-jvectormap.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/dashboard-projects.css">
	<?php
	}
	?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>