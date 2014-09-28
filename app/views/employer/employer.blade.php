@extends('applicant.layouts.default')

@section('title')
<title>{{ $employer->businessname }} | Homepage</title>
@stop

@section('description')
<meta name="description" content="Universal Agency Homepage">
@stop

@section('body')
<div id="wrapper"  >
    <div class="top-title-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="page-info">
                        <h1 class="h1-page-title">Employer Profile</h1>

                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{ URL::to('loggedin') }}">Home</a>
                                </li>
                                <li class="active">Profile</li>
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
                <div class="col-md-3 col-sm-3">
                    <div class="team-member">
                        <div class="team-member-image img-overlay">
                            <img src="{{ URL::asset($employer->photo) }}" alt="{{ $employer->businessname }}"/>

                            <div class="item-img-overlay">
                                <div class="social-icons item_img_overlay_content">
                                    <a href="#" title="rss" target="_blank" class="social-media-icon rss-icon">rss</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="team-member-content">
                        <center>
                            <h2 style="color:#279fbb;"> {{ $employer->businessname }} </h2> 
                        </center>
                    </div>
                </div>
            </div> 
        
            <div class="space-sep50"></div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <div class="title-block clearfix">
                        <h3 class="h3-body-title"><i class ="fa fa-building-o"></i> Company Information</h3>
                        <div class="title-seperator"></div>
                    </div>
                    
                    <div class="row">
                        <strong>Phone Number : </strong> {{ $employer->phone_number }} <br>
                        <strong>Address : </strong> {{ $employer->address }}
                    </div>

                    <div class="space-sep20"></div>

                    <div class="title-block clearfix">
                        <h3 class="h3-body-title"><i class ="fa fa-building-o"></i> Overview </h3>
                        <div class="title-seperator"></div>
                    </div>
                    
                    <div class="row">
                        <h6> "{{ $employer->description }}" </h6>
                    </div>
                </div>
                
                <div class="col-md-1"></div>
                
                <div class="col-md-6">
                    <div class="title-block clearfix">
                        <h3 class="h3-body-title"><i class = "fa fa-briefcase"></i> Current Job Openings</h3>
                        <div class="title-seperator"></div>
                    </div>
                   
                    @if(count($job) > 0)
                        @foreach($job as $job)
                        <div class="col-md-3">
                            {{ $job->created_at->toDateString() }}
                        </div>

                        <div class="col-md-9">
                            <a href="{{ URL::to('job/'.$job->id) }}"> {{ $job->job_title }} </a>
                        </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            No job openings for this employer
                        </div>
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
@stop
