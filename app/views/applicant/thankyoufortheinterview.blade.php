@extends('staff.layouts.evaluationdefault')

@section('title')
<title> Thank you for the Interview | Universal Agency</title>
@stop

@section('description')
<meta name="description" content="Universal Agency Thank you for the interview">
@stop

@section('additional_styles')
{{ HTML::style('css/smartadmin-production.min.css') }}
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-info">
                    <h1 class="h1-page-title">Thank you for the Interview</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('body')
<div class="content-wrapper hide-until-loading"><div class="body-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 animated" data-animtype="bounce"
            data-animrepeat="0"
            data-speed="1s"
            data-delay="0.5s" style="text-align:center">

            <h3>Thank you for the interview !</h3>
            <br/>
            <h4>Meanwhile, we are evaluating you, based on the interview and on your resume.<br/>You will be notified once were done with the evaluation. </h4>

            <blockquote>~ Universal Agency</blockquote>

            <br/>

         <!--    <a href="{{ URL::to('joblist') }}" style="color:blue"><>Browse for Jobs</a>
            <br/>
            <a href="{{ URL::to('/') }}">Return Home</a>
 -->
            <div class="list-group">
                <a href="{{ URL::to('joblist') }}" class="list-group-item list-group-item-success">Browse for Jobs</a>
              <a href="{{ URL::to('/') }}" class="list-group-item list-group-item-info">Return Home</a><!-- 
              <a href="#" class="list-group-item list-group-item-warning">Porta ac consectetur ac</a>
              <a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a> -->
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
@stop