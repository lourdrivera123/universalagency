@extends('applicant.layouts.default')

@section('title')
<title> Personality Test | Universal Agency</title>
@stop

@section('description')
<meta name="description" content="Universal Agency Please take Personality test">
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="page-info">

					<!-- BreadCrumb -->
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('body')
<div class="content-wrapper hide-until-loading">
	<div class="body-wrapper">

	@include('applicant.partials._wizard')
	
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 animated" data-animtype="flipInY"
				data-animrepeat="0"
				data-speed="1s"
				data-delay="0.5s">

				<div class="space-sep20"></div>
				
			</div>            
		</div>
		<div class="row">
		<center>
		
			@if(Session::has('personalitytestreminder'))
				<div class="alert alert-info">
					<div class="msg">
						{{ Session::get('personalitytestreminder') }}
					</div>
				</div>
			@endif

			<h1>Personality Test</h1>
			<h4>This Test consists of <strong style="color:red">13 multiple choice questions</strong> and please don't leave any unanswered questions. </h4>
			<a href="{{ URL::to('personalitytest') }}" class="btn btn-primary">Take the Test</a>
		</center>
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
{{ HTML::script('js/personalizedscript.js') }}
{{ HTML::script('js/bootstrap-datepicker.js') }}
{{ HTML::script('js/validateresumeform.js') }}
@stop