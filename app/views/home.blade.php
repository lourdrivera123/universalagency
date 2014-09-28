
@extends('applicant.layouts.default')

@section('title')
<title>Universal Agency | Homepage</title>
@stop

@section('description')
<meta name="description" content="Universal Agency Homepage">
@stop

@section('body')
<div class="slider-fixed-container">
    <div class="slider-fixed-frame">
        <div class="rev-slider-full">
            <div class="rev-slider-banner-full  rev-slider-full">
                <ul>
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="300" >
                        <img src="images/placeholders/slider1/21.jpg"  alt="rev-full1" data-fullwidthcentering="on">

                        <div class="tp-caption lft stb stl" data-x="900" data-y="5" data-speed="500" data-start="500" data-easing="easeOutExpo">
                            <img src="images/placeholders/slider1/boss.png" alt="Image 1">
                        </div>

                        <div class="tp-caption lfb stb stl" data-x="500" data-y="300" data-speed="500" data-start="700" data-easing="easeOutExpo">
                            <img src="images/placeholders/slider1/txt4.png" alt="Image 1">
                        </div>

                        <div class="tp-caption lfr stb stl" data-x="751" data-y="350" data-speed="1000" data-start="1000" data-easing="easeOutExpo">
                            <img src="images/placeholders/slider1/txt3.png" alt="Image 1">
                        </div>

                        <div class="tp-caption slider-text-title sft str" data-x="20" data-y="150" data-speed="300" data-start="800" data-easing="easeOutCubic">
                            <img src="images/placeholders/slider1/txt1.png" alt="Image 1">
                        </div>

                        <div class="tp-caption slider-text-description sft str"  data-x="20" data-y="200" data-start="1000" data-easing="easeOutBack">
                            <img src="images/placeholders/slider1/txt2.png" alt="Image 1">
                        </div>                  
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>        
    </div>
</div>

<div class="loading-container">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>


<div class="content-wrapper hide-until-loading">
    <div class="section-content top-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12"> 
                    <div class="content-box content-style4 medium animated"
                    data-animtype="fadeIn"
                    data-animrepeat="0"
                    data-animspeed="1s"
                    data-animdelay="0.2s"
                    >
                    <h4 class="h4-body-title">
                        <i class="icon-checkbox-checked"></i>
                        Why choose us?
                    </h4>
                    <div class="content-box-text">
                        Find out the reasons why our top employers trust us.
                        <br>See our Features
                        <div>
                            <a href="{{ URL::to('features') }}" class=" btn btn-sm">
                                <span>read more</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12"> 
                <div class="content-box content-style4 medium animated"
                data-animtype="fadeIn"
                data-animrepeat="0"
                data-animspeed="1s"
                data-animdelay="0.2s"
                >
                <h4 class="h4-body-title">
                    <i class="icon-camera-streamline-video"></i>
                    SOMETHING
                </h4>
                <div class="content-box-text">
                    SAMPLE TEXT .. MUST BE LONG
                    SAMPLE TEXT .. MUST BE LONG
                    SAMPLE TEXT .. MUST BE LONG
                    <div>
                        <a href="#" class=" btn btn-sm">
                            <span>read more</span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-md-3 col-xs-12"> 
            <div class="content-box content-style4 medium animated"
            data-animtype="fadeIn"
            data-animrepeat="0"
            data-animspeed="1s"
            data-animdelay="0.2s"
            >
            <h4 class="h4-body-title">
                <i class="icon-computer-imac"></i>
                SOMETHING
            </h4>
            <div class="content-box-text">
                SAMPLE TEXT .. MUST BE LONG
                SAMPLE TEXT .. MUST BE LONG
                SAMPLE TEXT .. LIMIT TO THREE LINES
                <div>
                    <a href="#" class=" btn btn-sm">
                        <span>read more</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
    <div class="col-md-3 col-xs-12"> 
        <div class="content-box content-style4 medium animated"
        data-animtype="fadeIn"
        data-animrepeat="0"
        data-animspeed="1s"
        data-animdelay="0.2s"
        >
        <h4 class="h4-body-title">
            <i class="icon-paint-bucket-streamline"></i>
            SOMETHING
        </h4>
        <div class="content-box-text">
            SAMPLE TEXT .. MUST BE LONG
            SAMPLE TEXT .. MUST BE LONG
            SAMPLE TEXT .. LIMIT TO THREE LINES
            <div>
                <a href="#" class=" btn btn-sm">
                    <span>read more</span>
                </a>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
    <div class="space-sep100"></div>
        <div class="container">
            <div class="row">
                <div class="section-content section-color-dark-blue white-text">
                    <div class="container">
                        <div class="row">
                            <h2 class="h2-section-title"> Search Jobs </h2>
                                
                            <center>
                            {{ Form::open(['url' => 'search', 'class' => 'form-inline', 'method' => 'get']) }}
                                <div class="input-group col-md-6">

                                    <div class="input-group-btn" style="width:65px;">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-briefcase"></i> Job Title<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li id="job_title"><a style="color:black"><i class="fa fa-briefcase"></i> Job Title</a></li>
                                            <li id="company"><a style="color:black"><i class="fa fa-building-o"></i> Company</a></li>
                                            <li id="location"><a style="color:black"><i class="fa fa-location-arrow"></i> Location</a></li>
                                        </ul>

                                    </div>
                                        
                                    <input type="hidden" name="searchby" id="searchby" value="job_title"/>

                                    <input type="text" name="keyword" class="typeahead form-control input-sm" 
                                    placeholder="Keyword..." style="background-color:#2c3e50;">
                                </div>
                            {{ Form::close() }}
                            </center>
                        </div>
                    </div>
                </div>

                <div class="space-sep30"></div>

                <div class="col-md-12 col-sm-12 animated" data-animtype="fadeInRight" data-animrepeat="0" data-speed="1s" data-delay="0.5s">
                    <div class="title-block clearfix">
                        <h3 class="h3-body-title">View Jobs by Category:</h3>
                        <div class="title-seperator"></div>
                    </div>
                    <ul class="icons-list check-2 colored-list">
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <li class="col-md-3 col-sm-3">
                                <a href="{{ URL::to('joblist/'.$category->id) }}">
                                    {{ $category->category }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                    </ul>            
                </div>
            </div>
        </div>
    <div class="space-sep100"></div>
</div>
    <div class="space-sep40"></div>
    <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h2 class="h2-section-title">Featured Employers</h2>

                                <div class="i-section-title">
                                    <i class="icon-users-outline">

                                    </i>
                                </div>

                                <p class="p-section-info animated" data-animtype="fadeInUp" data-animrepeat="0"
                                   data-animdelay="0.4s">
                                    Universal Agency is proud to be affiliated with the following organizations:
                                </p>
                                <div class="space-sep20"></div>
                            </div>
                        </div>
    <div class="section-content bottom-body clients-section">
        <div class="container">
            <div class="row">
                <ul class="bottom-body-clients">
                    @if( count($employers) > 0 )
                        @foreach( $employers as $employer )
                            <li class="animated" data-animtype="bounceIn" data-animrepeat="0" data-animdelay="0.2s">
                                <img src="{{ URL::asset($employer->photo) }}" alt="Logo" class="img-circle client-image" style="width:100px; height:100px; " />
                            </li>
                        @endforeach
                    @endif
                </ul>            
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

$(".dropdown-menu li a").click(function(){
  var selText =  $(this).html();
  $(this).parents('.input-group').find('.dropdown-toggle').html(selText+'<span class="caret"></span>');
});

$('#job_title').click(function(){
    $('#searchby').val('job_title');
});

$('#company').click(function(){
    $('#searchby').val('company');
});

$('#location').click(function(){
    $('#searchby').val('location');
});

</script>
@stop