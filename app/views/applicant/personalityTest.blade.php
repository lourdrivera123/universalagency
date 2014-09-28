<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Career Personality Test</title>
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

 </style>
	</head>

	<body>
		<div class="container">
			<!-- Top Navigation -->
			
			<header>
				<h1><b>Career Personality Test</b><span style="color:black;"> The following are questions would help us determine your personality.</span></h1>
				<p>There's no time limit, please answer the questions HONESTLY.</p>	
			</header>

			{{ Form::open(['id' => 'personalitytestform', 'action' => 'PersonalityTestController@store', 'class' => 'ac-custom ac-radio ac-fill', 'autocomplete' => 'off']) }}
			
			<br/>

			@foreach($personalityquestions as $personalityquestion) 

			<p style="font-size:22px;font-weight: bold;">{{ $personalityquestion->id }} ) {{ $personalityquestion->question }}</p>

			{{ $errors->first('question'.$personalityquestion->id, '<div class="alert alert-danger">Please answer this item</div>') }}

			<ul>
				@foreach( getAssociatedPersonalityAns($personalityquestion->id) as $personalityanswer)
				<li>{{ Form::radio('question'.$personalityanswer->question_id, $personalityanswer->personality ) }}<label for="{{ 'question'.$personalityanswer->id }}" style="font-size:20px;font-weight: bold;">{{ $personalityanswer->answer }}</label></li>
				@endforeach
			</ul>
			<div class="alert alert-danger" style="display: none" id="requirepersonality"></div>
			
			<div class="divider stripe-4"></div>
			@endforeach
			<section>
				<center>
					<!-- <button type="submit" class="progress-button" data-style="flip-open" data-perspective data-horizontal>Submit</button> -->
					<button type="submit" class="progress-button">Submit</button>
				</center>
			</section>
			{{ Form::close() }}
			
		</div><!-- /container -->
		
		{{ HTML::script('js/_jq.js') }}
		{{ HTML::script('js/_jquery.placeholder.js')}}
		{{ HTML::script('js/activeaxon_menu.js')}}
		{{ HTML::script('js/animationEnigne.js')}}
		{{ HTML::script('js/bootstrap.min.js')}}
		{{ HTML::script('js/ie-fixes.js')}}
		{{ HTML::script('js/jq.appear.js')}}
		{{ HTML::script('js/jquery.base64.js')}}
		{{ HTML::script('js/jquery.carouFredSel-6.2.1-packed.js')}}
		{{ HTML::script('js/jquery.cycle.js')}}
		{{ HTML::script('js/jquery.cycle2.carousel.js')}}
		{{ HTML::script('js/jquery.easing.1.3.js')}}
		{{ HTML::script('js/jquery.easytabs.js')}}
		{{ HTML::script('js/jquery.infinitescroll.js')}}
		{{ HTML::script('js/jquery.isotope.js')}}
		{{ HTML::script('js/jquery.prettyPhoto.js')}}
		{{ HTML::script('js/jQuery.scrollPoint.js')}}
		{{ HTML::script('js/jquery.themepunch.plugins.min.js')}}
		{{ HTML::script('js/jquery.themepunch.revolution.js')}}
		{{ HTML::script('js/jquery.tipsy.js')}}
		{{ HTML::script('js/jquery.validate.js')}}
		{{ HTML::script('js/jQuery.XDomainRequest.js')}}
		{{ HTML::script('js/kanzi.js') }}
		{{ HTML::script('js/retina.js') }}
		{{ HTML::script('js/svgcheckbx.js') }}
		{{ HTML::script('js/classie.js') }}
		{{ HTML::script('js/progressButton.js') }}
		{{ HTML::script('js/personalizedscript.js') }}

	</body>
	</html>