@extends('applicant.layouts.default')

@section('title')
<title>Notifications | Universal Agency</title>
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="page-info">
					<h1 class="h1-page-title">Notifications</h1>
					<!-- BreadCrumb -->
					<div class="breadcrumb-container">
						<ol class="breadcrumb">
						</ol>
					</div>
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
		<div class="container">
			<div class="row">
				@if(isset($notifications) && count($notifications) > 0)						
				@foreach ( $notifications as $notification )
				<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">			
					<div class="col-md-10 col-xs-10">
						<span style="font-size:14px;">
							<a href="{{ 'notification/'.$notification->id }}">{{ $notification->subject }} </a>
						</span>
					</div>
					<div class="col-md-2 col-xs-10">
						<span style="font-size:10px;">
							{{ datedifference($notification->created_at) }}
						</span>
					</div>
					<div class="divider"></div>
				</div>
				<div class="col-md-1"></div>
				</div>
				@endforeach
				@elseif	( isset($notification) && !is_null($notification) )
				<div class="panel panel-info">

					<div class="panel-heading">
						<h4>{{ $notification->subject }}</h4>	
					</div>

					<div class="panel-body">
						<p>{{ $notification->message }}</p>

						@if( $notification->employerid != 0)
						<?php Session::put('employerid', $notification->employerid ); ?>
						@endif

						@if ( $notification->jobid != 0 )
						<p><a href="{{ URL::to('job/'.$notification->jobid) }}"
							class="btn btn-primary"> View Job </a></p>
							@endif
						</div>

						<div class="panel-footer">
							Universal Agency | <i>{{ datedifference($notification->created_at) }}</i>
						</div>

					</div>
					@else
					<h1 class="error-text-2">Nothing Here <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span> </h1>
					@endif
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