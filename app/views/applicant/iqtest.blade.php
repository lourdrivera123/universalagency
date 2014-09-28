<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>IQ Test</title>
	<meta name="description" content="Animated Checkboxes and Radio Buttons with SVG: Using SVG for adding some fancy 'check' animations to form inputs" />
	<meta name="keywords" content="animated checkbox, svg, radio button, styled checkbox, css, pseudo element, form, animated svg" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="../favicon.ico">
	<!-- <link rel="stylesheet" type="text/css" href="css/normalize.css" /> -->
	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/demo.css') }}
	{{ HTML::style('css/component.css') }}

			<!-- <link rel="stylesheet" type="text/css" href="css/demo.css" />
			<link rel="stylesheet" type="text/css" href="css/component.css" /> -->
			{{ HTML::script('js/modernizr.custom.js') }}

			<script language="javascript">

				var mins
				var secs;

				function cd() {
 		mins = 1 * m("40"); // change minutes here
 		secs = 0 + s(":01"); 
 		redo();
 	}

 	function m(obj) {
 		for(var i = 0; i < obj.length; i++) {
 			if(obj.substring(i, i + 1) == ":")
 				break;
 		}
 		return(obj.substring(0, i));
 	}

 	function s(obj) {
 		for(var i = 0; i < obj.length; i++) {
 			if(obj.substring(i, i + 1) == ":")
 				break;
 		}
 		return(obj.substring(i + 1, obj.length));
 	}

 	function dis(mins,secs) {
 		var disp;
 		if(mins <= 9) {
 			disp = " 0";
 		} 
 		else {
 			disp = " ";
 		}
 		disp += mins + " .";

 		if(secs <= 9) {
 			disp += "0" + secs;
 		} 
 		else {
 			disp += secs;
 		}
 		return(disp);
 	}

 	function redo() {
 		secs--;
 		if(secs == -1) {
 			secs = 59;
 			mins--;
 		}

	 	document.cd.disp.value = dis(mins,secs); // setup additional displays here.
	 	if((mins == 0) && (secs == 0)) {
	 		window.alert(" Hey Time is up. Press OK to continue."); 
	  		 // window.location = "{{ URL::to('iqtestresult') }}" // redirects to specified page once timer ends and ok button is pressed
	  		$('#submitiqtest').trigger('click');
	  		} 
	  		else {
	  			cd = setTimeout("redo()",1000);
	  		}
	  	}

	  	function init() {
	  		cd();
	  	}

	  	window.onload = init;

	  </script>
	</head>
	<body>
		<div class="container">

			<form name="cd">
				<span class="labe">Remaining Time</span>:
				<input name="disp" type="text" class="clock" id="txt" value="10:00" size="10" readonly="true" align="right" border="1" />
				<span class="labe">Minutes</span>
			</form>
			<header>
				<h1><b>IQ Test</b>
					<span style="color:black;"> This IQ Test consists of different questions, whose purpose is to determine the level of intelligence of the job applicant. </span>
				</h1>
				<p>Have you ever wondered what is your IQ? Take our IQ test and find out what is your level of intelligence right now! </p>	
				<p>Completing the test is absolutely for free!</p>
			</header>

			{{ Form::open(['action' => 'IqTestController@store', 'id' => 'iqtestform', 'class' => 'ac-custom ac-radio ac-circle', 'autocomplete' => 'off']) }}
			
			@foreach($iqquestions as $iqquestion) 
			<br>
			<p style="font-size:22px;font-weight: bold;">{{ $iqquestion->id }} ) {{ $iqquestion->questions }}</p>
			<ul>
				<li>
					<input name="{{ 'question'.$iqquestion->id }}" type="radio" value="{{ $iqquestion->option_A }}">
					<label for="r5"  style="font-size:20px;font-weight: bold;">{{ $iqquestion->option_A }}</label>
				</li>
				<li>
				<input name="{{ 'question'.$iqquestion->id }}" type="radio" value="{{ $iqquestion->option_B }}">
					<label for="r5"  style="font-size:20px;font-weight: bold;">{{ $iqquestion->option_B }}</label>
				</li>
				<li>
					<input name="{{ 'question'.$iqquestion->id }}" type="radio" value="{{ $iqquestion->option_C }}">
					<label for="r5"  style="font-size:20px;font-weight: bold;">{{ $iqquestion->option_C }}</label>
				</li>
				<li>
				<input name="{{ 'question'.$iqquestion->id }}" type="radio" value="{{ $iqquestion->option_D }}">
					<label for="r5"  style="font-size:20px;font-weight: bold;">{{ $iqquestion->option_D }}</label>
				</li>
			</ul>
			@endforeach
			<section>
				<center>
					<button id="submitiqtest" class="progress-button" type="submit">Submit</button>
				</center>
			</section>
			{{ Form::close() }}
		</div><!-- /container -->
		<script src="js/svgcheckbx.js"></script>
	</body>
	</html>