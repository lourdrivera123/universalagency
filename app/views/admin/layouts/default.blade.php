<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> SmartAdmin </title>
		<meta name="description" content="">
		<meta name="author" content="">

		@include('admin.partials._styles')

		@yield('additional_styles')
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	</head>
	<body class="smart-style-1">

	@include('admin.partials._header')

		@include('admin.partials._sidebar')

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			@yield('ribbon')

			@yield('maincontent')

			@yield('modals')

		</div>
		<!-- END MAIN PANEL -->

		@include('admin.partials._footer')

		@include('admin.partials._scripts')

		@yield('additional_scripts')
	</body>

</html>