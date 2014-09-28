<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ URL::asset('js/plugin/pace/pace.min.js')}}"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="{{ URL::asset('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') }}"></script>
		
		{{ HTML::script("js/libs/jquery-2.0.2.min.js") }}
			
		{{ HTML::script("js/libs/jquery-ui-1.10.3.min.js") }}

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->
		<script src="{{ URL::asset('js/bootstrap/bootstrap.min.js') }}"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="{{ URL::asset('js/notification/SmartNotification.min.js') }}"></script>

		<!-- JARVIS WIDGETS -->
		<script src="{{ URL::asset('js/smartwidgets/jarvis.widget.min.js') }}"></script>

		<!-- EASY PIE CHARTS -->
		<script src="{{ URL::asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

		<!-- SPARKLINES -->
		<script src="{{ URL::asset('js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{ URL::asset('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="{{ URL::asset('js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="{{ URL::asset('js/plugin/select2/select2.min.js') }}"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{{ URL::asset('js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

		<!-- browser msie issue fix -->
		<script src="{{ URL::asset('js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

		<!-- FastClick: For mobile devices -->
		<script src="{{ URL::asset('js/plugin/fastclick/fastclick.min.js') }}"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		

		<!-- MAIN APP JS FILE -->
		<script src="{{ URL::asset('js/app.min.js') }}"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="{{ URL::asset('js/plugin/flot/jquery.flot.cust.min.js') }}"></script>
		<script src="{{ URL::asset('js/plugin/flot/jquery.flot.resize.min.js') }}"></script>
		<script src="{{ URL::asset('js/plugin/flot/jquery.flot.tooltip.min.js') }}"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="{{ URL::asset('js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
		<script src="{{ URL::asset('js/plugin/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
		
		<!-- Full Calendar -->
		<script src="{{ URL::asset('js/plugin/fullcalendar/jquery.fullcalendar.min.js') }}"></script>
		
		{{ HTML::script('js/personalizedscript.js') }}