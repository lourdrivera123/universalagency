@extends('applicant.layouts.default')

@section('title')
<title>Universal Agency | Career Personality Test</title>
@stop

@section('description')
<meta name="description" content="Universal Agency Personality Test">
@stop

@section('additional_styles')
{{ HTML::style('css/component.css') }}
@stop

@section('body')
<div id="wrapper"  >
	<div class="top-title-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="page-info">
						<h1 class="h1-page-title">Career Personality Test</h1>

						<div class="breadcrumb-container">
							<ol class="breadcrumb">
								<li>
									<a href="{{ URL::to('loggedin') }}">Home</a>
								</li>
								<li class="active">Personality Test</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--.top wrapper end -->

<div class="loading-container">
	<div class="spinner">
		<div class="double-bounce1"></div>
		<div class="double-bounce2"></div>
	</div>
</div>

<div class="content-wrapper hide-until-loading">
	<div class="body-wrapper">
		<div class="space-sep40"></div>
		<div class="container">
			<div class="row">
				<div class="classic-form" style="background-color: #279FBB">
					{{ Form::open(['id' => 'personalitytestform', 'action' => 'PersonalityTestController@store', 'class' => 'ac-custom ac-radio ac-fill', 'autocomplete' => 'off']) }}
					@foreach($personalityquestions as $personalityquestion) 

					<section>
						<h2>{{ $personalityquestion->id }} ) {{ $personalityquestion->question }}</h2>
						<ul>
							@foreach( getAssociatedPersonalityAns($personalityquestion->id) as $personalityanswer)
							<li><input name="{{ 'question'.$personalityanswer->question_id }}" data-personality="{{ $personalityanswer->personality }}" type="radio"><label for="{{ 'question'.$personalityanswer->id }}">{{ $personalityanswer->answer }}</label></li>
							@endforeach
						</ul>
						<div class="alert alert-danger" style="display: none" id="requirepersonality"></div>
					</section>
					<div class="divider stripe-4"></div>
					@endforeach
					<center><button type="submit" class="btn btn-lg btn-green"><i class="fa fa-check"></i>Submit</button></center>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts')
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
{{ HTML::script('js/personalizedscript.js') }}
@stop