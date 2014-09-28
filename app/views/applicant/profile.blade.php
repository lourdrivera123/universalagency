@extends('applicant.layouts.default')

@section('title')
<title>{{ $resume->last_name, $resume->first_name }} | Homepage</title>
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
                        <h1 class="h1-page-title">Applicant Profile</h1>

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
                <div class="col-md-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="team-member">
                            <div class="team-member-image img-overlay">
                                <img src="{{ URL::asset($resume->photo) }}" style="max-width:180px; max-height:180px;" alt="{{ Str::title($resume->firstname) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-12">
                        <br><center>
                        <p style="font-size:27px;"> {{ Str::title($resume->first_name) }} {{ Str::title($resume->last_name) }} </p>
                        <p style="color: #279fbb; "> {{ $resume->titleofexpertise }} </p>
                    </center>

                    <div class="space-sep20"></div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="#tab_profile" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li>
                            <a href="#tab_attachment" role="tab" data-toggle="tab">Attachments</a>
                        </li>
                        <li>
                            <a href="#tab_results" role="tab" data-toggle="tab">Test Results</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-1"> </div>

            <div class="col-md-7">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_profile">
                        <div class="title-block clearfix">
                            <h3 class="h3-body-title"><i class="fa fa-pencil-square"> </i> About </h3>
                            <div class="title-seperator"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <p style="font-weight:bold; font-size:15px;"> Birthdate </p>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;">: {{ formatdate($resume->birth_date) }} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <p style="font-weight:bold; font-size:15px;"> Gender </p>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;">: {{ Str::title($resume->gender) }} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <p style="font-weight:bold; font-size:15px;"> Marital status </p>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;">: {{ $resume->marital_status }} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <p style="font-weight:bold; font-size:15px;"> Phone Number </p>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;">: {{ $resume->phone_number }} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <p style="font-weight:bold; font-size:15px;"> Address </p>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;">: {{ $resume->address }} </p>
                            </div>
                        </div>

                        <div class="space-sep40"></div>

                        <div class="title-block clearfix">
                            <h3 class="h3-body-title"><i class="fa fa-book"></i> Educational Background</h3>
                            <div class="title-seperator"></div>
                        </div>

                        @if(count($educations) > 0)
                        @foreach($educations as $education)
                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <p style="font-weight:bold; font-size:15px;"> {{ $education->year_from_education }} - {{ $education->year_to_education }} </p>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;"> {{ $education->degreelevel()->first()->levelname }} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-xs-4"> </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;"> {{ $education->field_of_study }} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-xs-4"> </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;"> {{ $education->school_name }} </p>
                            </div>
                        </div>

                        <div class="space-sep30"></div>
                        @endforeach
                        @endif

                        <div class="space-sep10"></div>

                        <div class="row">
                            <div class="title-block clearfix">
                                <h3 class="h3-body-title"><i class="fa fa-briefcase"></i> Employment History</h3>
                                <div class="title-seperator"></div>
                            </div>
                        </div>

                        @if(count($jobs) > 0)
                        @foreach($jobs as $job)
                        <div class="row">
                            <div class="col-md-3 col-xs-4">
                                <p style="font-weight:bold; font-size:15px;">
                                    {{ $job->month_from }}/{{ $job->year_from }} - {{  $job->month_to }}/{{ $job->year_to }} 
                                </p>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;"> {{ $job->title }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-xs-4"> 
                                <p style="font-weight:bold; font-size:15px;"> </p>
                            </div>
                            <div class="col-md-9 col-xs-8">
                                <p style="font-size:15px;"> {{ $job->company_name }} </p>
                            </div>
                        </div>

                        <div class="space-sep30"></div>
                        @endforeach
                        @endif

                        <div class="space-sep10"></div>
                    </div>
                    <div class="tab-pane" id="tab_attachment">
                        @if(count($attachments) > 0)
                            @foreach($attachments as $attachment)
                                <img src="{{ URL::asset($attachment->path) }}">
                            @endforeach
                        @endif
                    </div>
                    <div class="tab-pane" id="tab_results">
                        RESULTS
                    </div>
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
