<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
	<meta charset="utf-8">
	<title> Headquarters | Universal Agency</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">

	<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">


	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">


	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">


	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">


	<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

</head>

<body class="animated fadeInDown">

	<header id="header">

		<div id="logo-group">
			<span id="logo"> <img src="{{ URL::asset('images/main_logo.png') }}" alt="Universal Agency"> </span>
		</div>

		<span id="extr-page-header-space"> <span class="hidden-mobile">Forgot Password?</span> <a href="{{ URL::to('password/remind') }}" class="btn btn-danger">Reset My Password</a> </span>

	</header>

	<div id="main" role="main">

		<!-- MAIN CONTENT -->
		<div id="content" class="container">

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">

				@if(Session::has('invalid_credentials'))
					<div class="alert alert-danger" style="padding:5px;">
						{{ Session::get('invalid_credentials') }}
					</div>
					<br/>
				@elseif(Session::has('flash_message'))
					<div class="alert alert-success" style="padding:5px;">
						{{ Session::get('flash_message') }}
					</div>
					<br/>
				@endif
				
					<div class="well no-padding">

						{{ Form::open(['action' => 'SessionsController@adminstore', 'id' => 'login-form', 'class' => 'smart-form client-form']) }}

						<header>
							Sign In
						</header>

						<fieldset>

							<section>
								<label class="label">E-mail</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									{{ Form::email('email') }}
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
								</section>

								<section>
									<label class="label">Password</label>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										{{ Form::password('password') }}
										<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
									</section>

								</fieldset>
								<footer>
									<button id="admin_btnsignin" type="submit" class="btn btn-primary">
										Sign in
									</button>
								</footer>
								{{ Form::close() }}

							</div>


						</div>
					</div>
				</div>

			</div>

			<!--================================================== -->	

			<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
			<script src="js/plugin/pace/pace.min.js"></script>

			<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
			<script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');} </script>

			<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
			<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>
		
		<!-- JQUERY MASKED INPUT -->
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>
		
		<!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
			<![endif]-->

			<!-- MAIN APP JS FILE -->
			<script src="js/app.min.js"></script>

			<script type="text/javascript">
				runAllForms();

				$(function() {
				// Validation
				$("#login-form").validate({
					// Rules for form validation
					rules : {
						email : {
							required : true,
							email : true
						},
						password : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						}
					},

					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
			});

			$('#admin_btnsignin').click(function(){
				$(this).addClass('disabled');
				$(this).html('Signing you in.. <i class="fa fa-gear fa-spin"></i>');
			});
			</script>

		</body>
		</html>