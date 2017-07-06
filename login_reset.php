<?php
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Weattach Robot - Login Reset</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="assets/images/favicon.ico">
<link
	href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
	rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/elegant-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons.css">
<link rel="stylesheet" href="assets/css/pe-7-icons-helper.css">
<link rel="stylesheet" href="assets/css/tether-shepherd.css">
<link rel="stylesheet" href="assets/css/jstree-default.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/authentication.css">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body class="layout-no-leftnav">
	<section class="login-section auth-section">
		<div class="container">
			<div class="row">
				<div
					class="form-box col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-0 xs-offset-0">
					<h1 class="form-box-heading text-center">
						<span class="pe-icon pe-7s-box2 icon"></span><span
							class="highlight">WeAttach</span>Robot
					</h1>
<?php

if (is_empty ( $_GET ['uid'] )) {
	redirect ( 'login.php' );
	exit ();
} else {
	$enc_id = xssafe ( trim ( $_GET ['uid'] ) );
}
?>
					<div class="form-box-inner">
						<h2 class="title text-center">Reset Password</h2>
						<div class="row">
							<div class="form-container col-md-5 col-sm-12 col-xs-12">
								<form class="login-form" action="reset_password.php"
									method="POST">
									<div class="form-group password">
										<label class="sr-only" for="login-password">Enter Password</label>
										<span class="fa fa-lock icon"></span> <input
											id="login-password" type="password"
											class="form-control login-password"
											placeholder="Enter Password" name="password">

									</div>
									<div class="form-group password">
										<label class="sr-only" for="login-password">Re-enter Password</label>
										<span class="fa fa-lock icon"></span> <input
											id="login-password" type="password"
											class="form-control login-password"
											placeholder="Re-enter Password" name="repassword">

									</div>
									<input type="hidden" value="<?php echo $enc_id?>" name="id" />

									<button type="submit" class="btn btn-block btn-primary">Reset</button>



								</form>
							</div>

							<div
								class="social-btns col-md-5 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-sm-offset-0">

								<ul class="list-unstyled">
									<li>This is a secure connection</li>
									<li>You accept the Terms & Condition by loging in to the System
									</li>
									<li>This software is a propritery of Weattach Technologies</li>
									<li>
										<button class="social-btn github-btn btn" type="button">Terms
											and Condition</button>
									</li>

								</ul>
							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="copyright text-center">&copy; 2016 - WeAttach
				Technologies</div>
		</div>

	</section>

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/metisMenu.js"></script>
	<script src="assets/js/imagesloaded.js"></script>
	<script src="assets/js/masonry.js"></script>
	<script src="assets/js/pace.js"></script>
	<script src="assets/js/tether.js"></script>
	<script src="assets/js/tether-shepherd.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/tour.js"></script>
	<script src="assets/js/demo.js"></script>
</body>
</html>