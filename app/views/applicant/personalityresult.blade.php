@extends('applicant.layouts.default')

@section('title')
<title>Personality Result | Universal Agency</title>
@stop

@section('description')
<meta name="description" content="Personality Result">
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="page-info">
					<h1 class="h1-page-title">Personality Test Result</h1>
					<!-- BreadCrumb -->
					<div class="breadcrumb-container">
						<ol class="breadcrumb">
							<li class="active">We've already calculated your personality test.</li>
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
		 
		 @if(Session::has('reminder'))
            <div class="alert alert-warning">
                <div class="msg">
                    <i class="fa fa-info-circle"></i> {{ Session::get('reminder') }} <a href="{{ URL::to('pleasetakeiqtest') }}" style="color:blue;">click here.</a>
                </div>
            </div>
          @endif

		<div class="section-content section-px stones-bg white-text">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					@if($result == 'stabili')
					<div class="col-md-8 col-sm-8">
					
					<center>
						<img src="{{ URL::asset('images/stabilizer.jpg') }}" class="img-rounded img-responsive" style="width:250px; height:250px; ">
					</center><br><br>
						<div class="content-box content-style3">
							<div class="content-style3-icon icon-users-outline"></div>
							<div class="content-style3-title">
								<h3 class="h4-body-title" style="color:#000000;">The Stabilizer</h3>
							</div>
							<div class="content-style3-text">
								Your career personality type is The Stabilizer. You like order and are purpose-minded.
								You also prefer to engage internally and are very thoughtful. A work environment where you
								can work quietly and gather information before making a decision is best for you.
							</div>

						</div>
					</div>
					@elseif($result == 'crisisMgr')
					<div class="col-md-8 col-sm-8">

					<center>
						<img src="{{ URL::asset('images/crisis_manager.jpg') }}" class="img-rounded img-responsive" style="width:250px; height:250px; ">
					</center><br><br>

						<div class="content-box content-style3">
							<div class="content-style3-icon icon-users-outline"></div>
							<div class="content-style3-title">
								<h3 class="h4-body-title" style="color:#000000;">The Crisis Manager</h3>
							</div>
							<div class="content-style3-text">
								Your career personality type is The Crisis Manager. You like creative freedom and are action-minded.
								You can get restless so you need a work environment that offers variety. You also prefer to engage internally and are
								very thoughtful. A work environment where you can work quietly and gather information before making 
								a decision is best for you.
							</div>

						</div>
					</div>
					@elseif($result == 'bigPicture')
					<div class="col-md-8 col-sm-8">

					<center>
						<img src="{{ URL::asset('images/big_picture.jpg') }}" class="img-rounded img-responsive" style="width:250px; height:250px; ">
					</center><br><br>

						<div class="content-box content-style3">
							<div class="content-style3-icon icon-users-outline"></div>
							<div class="content-style3-title">
								<h4 class="h4-body-title" style="color:#000000;">The Big Picture</h4>
							</div>
							<div class="content-style3-text">
								Your career personality type is The Big Picture Person. You like conceptualizing a project and
								enjoy debating with others. You get your best ideas when you have someone to bounce them off of and you feel most
								comfortable when you feel you have a handle on the future of your work.
							</div>

						</div>
					</div>
					@elseif($result == 'harmonizer')
					<div class="col-md-8 col-sm-8">

					<center>
						<img src="{{ URL::asset('images/harmonizer.jpg') }}" class="img-rounded img-responsive" style="width:250px; height:250px; ">
					</center><br><br>

						<div class="content-box content-style3">
							<div class="content-style3-icon icon-users-outline"></div>
							<div class="content-style3-title">
								<h4 class="h4-body-title" style="color:#000000;">The Harmonizer</h4>
							</div>
							<div class="content-style3-text">
								Your career pesonality type is The Harmonizer. You like harmony and enjoy helping others. You are also
								nergized by what is happening outside of yourself and find that you get restless when you go too long
								without external stimulation.
							</div>

						</div>
					</div>

					@endif

					<div class="col-md-2"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<br/>
			<div class="col-md-3" style="font-weight:bold;padding:15px">Share your personality test result: </div>
			<div class="col-md-9">
				<div class="social-icons">
					<ul>
						<li>
							<a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('personalityresult/'.$hash) }}" 
							title="Share on Facebook" class="share facebook social-media-icon facebook-icon">facebook</a>
						</li>
						<li>
							<a href="https://twitter.com/intent/tweet?url={{ URL::to('personalityresult/'.$hash) }}" 
							title="Share on Twitter" class="share twitter social-media-icon twitter-icon">twitter</a>
						</li>
						<li>
							<a href="https://plus.google.com/share?url={{ URL::to('personalityresult/'.$hash) }}" 
							title="Share on Googleplus" class="share google social-media-icon googleplus-icon">googleplus</a>
						</li>
					</ul>           
				</div>
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
<script type="text/javascript">
    // create social networking pop-ups
    (function() {

    	var Config = {
    		Link: "a.share",
    		Width: 500,
    		Height: 500
    	}
    	;

          // add handler links
          var slink = document.querySelectorAll(Config.Link);
          for (var a = 0; a < slink.length; a++) {
          	slink[a].onclick = PopupHandler;
          }

          // create popup
          function PopupHandler(e) {

          	e = (e ? e : window.event);
          	var t = (e.target ? e.target : e.srcElement);

            // popup position
            var
            px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
            py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);
            
            // open popup
            var popup = window.open(t.href, "social", "width="+Config.Width+",height="+Config.Height+",left="+px+",top="+py+",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
            if (popup) {
            	popup.focus();
            	if (e.preventDefault) e.preventDefault();
            	e.returnValue = false;
            }

            return !!popup;
        }

    }
    ());
</script>
@stop