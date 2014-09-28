@extends('applicant.layouts.default')

@section('title')
<title>Messages | Universal Agency</title>
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="page-info">
					<h1 class="h1-page-title">Messages</h1>
					<!-- BreadCrumb -->
					<div class="breadcrumb-container">
						<ol class="breadcrumb">
							@if(isset($specificmsg))
							<li><a href="{{ URL::to('messages') }}"> Messages </a></li>
							@endif
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
				<div class="col-md-12">
					@if(isset($specificmsg))
					<div class="col-md-2">
						<img src="{{ URL::asset('images/admin.png')  }}" class="img-circle" style="width:80px; height:80px; ">
					</div>
					<div class="col-md-10">
						<label style="color:#0093f0; font-size:20px;">{{ $specificmsg->subject }}</label><br>
						<p style="font-size:10px;">
							Universal Agency | {{ datedifference($specificmsg->created_at) }}
						</p>
						<div class="space-sep30"></div>
						{{ $specificmsg->message }}

						<div class="space-sep30"></div>

						<div class="divider divider-shadow"></div>
						<div class="replypane"></div>


						<div class="col-md-12">
							<label>Reply</label>
						</div>

						<div class="row">
							{{ Form::open(['id' => 'replyform', 'files' => 'true']) }}
							<div class="col-md-1"></div>

							<input type="hidden" name="subject" value="{{ $specificmsg->subject }}"/>

							<div class="col-md-9">
								<textarea class="form-control" rows="10" name="message"></textarea>
							</div>
							<input type="file" name="replyattachment" style="display:none" id="replyattachment"/>
							<div class="col-md-2"></div>

							<div class="space-sep50"></div>
							<div id="attachmentshere">
								
							<span style="color:#0093f0;"> <a href="javascript:void(0)" id="replyattachmenttrigger">+ Attach a file</a></span>
						</div>
						<center>
							<button type="submit" class="btn btn-default btn-sm" id="btn_send">Send</button>
						</center>	
						{{ Form::close() }}
					</div>
				</div>
				<div class="space-sep20"></div>
				@else
				<div class="col-md-12">
					<div class="divider divider-shadow"></div>
				</div>
				@if(count($messages) > 0)
				@foreach($messages as $message)
				<div class="row">
					<div class="col-md-1">
						<img src="{{ URL::asset('images/admin.png')  }}" class="img-circle" style="width:50px; height:50px; ">
					</div>
					<div class="col-md-2">
						<label>Universal Agency</label><br>
						<p style="font-size:10px;">{{ datedifference($message->created_at) }}</p>
					</div>
					<div class="col-md-9">
						<label style="color:#0093f0;"><a href="{{ 'messages/'.$message->id }}">{{ $message->subject }}</a></label><br>
						{{ Str::limit($message->message, 30) }}
					</div>
				</div>
				<div class="col-md-12">
					<div class="divider divider-shadow"></div>
				</div>
				<div class="space-sep20"></div>
				@endforeach
				@else
				<h1 class="error-text-2">Nothing Here <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span> </h1>
				@endif
				@endif
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
{{ HTML::script('js/personalizedscript.js') }}
{{ HTML::script('js/bootstrap-datepicker.js') }}
{{ HTML::script('js/validateresumeform.js') }}
@stop