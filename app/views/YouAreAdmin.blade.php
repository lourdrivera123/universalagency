@extends('applicant.layouts.default')

@section('title')
<title>Please Sign Out as admin | Universal Agency</title>
@stop

@section('description')
<meta name="description" content="Universal Agency You are Admin">
@stop

@section('additional_styles')
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-info">
                <!-- <h1 class="error-text-2 bounceInDown animated"> Page not found <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span></h1> -->
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
            <div class="col-md-12 col-sm-12 animated" data-animtype="flipInY"
            data-animrepeat="0"
            data-speed="1s"
            data-delay="0.5s">

            <center>
            <h1 class="error-text-2">Please Sign Out as Admin <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span> </h1>
            </center>
            <!-- <div class="i-section-title">
                <i class="fa fa-frown-o">
                </i>
            </div> -->

            <div class="space-sep20"></div>
        </div>            
    </div>

    <div class="row">

        <div class="col-md-12 col-sm-12 centered">
            <div class="classic-form">
                <h1> <a href="{{ URL::to('logout') }}" class="btn btn-primary"><i class="fa fa-sign-out"></i> Log Me Out</a>  </h1>							              
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
<script type="text/javascript">
    
</script>
@stop