@extends('applicant.layouts.default')

@section('title')
	<title>Features | Universal Agency</title>
@stop

@section('description')
	<meta name="description" content="Universal Agency Features">
@stop

@section('toptitlebar')
	<div class="top-title-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="page-info">
                        <h1 class="h1-page-title">Features</h1>

                        <h2 class="h2-page-desc">
                            Take A look at the reasons why you should choose us
                        </h2>
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
                    <div class="col-md-12 col-sm-12 animated"  data-animtype="fadeInUp"
                         data-animrepeat="0"
                         data-speed="1s"
                         data-delay="0.4s">
                        <h2 class="h2-section-title">Features</h2>
                        <div class="i-section-title">
                            <i class="icon-cloud">

                            </i>
                        </div>
                    </div>
                </div>
                <div class="space-sep20"></div>

                <div class="row">
                    <div class="col-md-4 col-sm-4"> 
                        <div class="content-box style5 small  animated"
                             data-animtype="fadeIn"
                             data-animrepeat="0"
                             data-animspeed="1s"
                             data-animdelay="0.2s"
                             >
                            <h4 class="h4-body-title">
                                <i class="icon-man-people-streamline-user"></i>
                                <strong>automated applicant tracking </strong>
                            </h4>
                            <div class="content-box-text">
                                Most of the time in hiring is spent in emailing candidates, assigning people to interview them, 
                                or simply screening applicants from a pile.

                                UniversalAgency helps you minimize the time spent on administrative tasks. 
                                Spend less time "managing" hiring and more time actually hiring.
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4"> 
                        <div class="content-box style5 small  animated"
                             data-animtype="fadeIn"
                             data-animrepeat="0"
                             data-animspeed="1s"
                             data-animdelay="0.2s"
                             >
                            <h4 class="h4-body-title">
                                <i class="icon-search"></i>
                                <strong>Search within candidate profile</strong>
                            </h4>
                            <div class="content-box-text">
                                Allows you to pull up any candidate by any word within their resume or feedback. If you just wanted to draw up a search of all candidates who worked at LBC, then you would simply have to search the word "LBC" and our system would pull up therequisite material.
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4"> 
                        <div class="content-box style5 small  animated"
                             data-animtype="fadeIn"
                             data-animrepeat="0"
                             data-animspeed="1s"
                             data-animdelay="0.2s"
                             >
                            <h4 class="h4-body-title">
                                <i class="icon-share"></i>
                                <strong>PUblish openings to social media </strong>
                            </h4>
                            <div class="content-box-text">
                                Job opening's link can be shared to your social media profile such as: Facebook, Twitter and Google+
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-sep40"></div>

                <div class="row">
                    
                    <div class="col-md-4 col-sm-4"> 
                        <div class="content-box style5 small  animated"
                             data-animtype="fadeIn"
                             data-animrepeat="0"
                             data-animspeed="1s"
                             data-animdelay="0.2s"
                             >
                            <h4 class="h4-body-title">
                                <i class="icon-pen-streamline-3"></i>
                                <strong>Create and Designate tasks</strong>
                            </h4>
                            <div class="content-box-text">
                                Allows you to create and assign tasks such as interviews and screening, for anyone on the team, and reminds you to complete them.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4"> 
                        <div class="content-box style5 small  animated"
                             data-animtype="fadeIn"
                             data-animrepeat="0"
                             data-animspeed="1s"
                             data-animdelay="0.2s"
                             >
                            <h4 class="h4-body-title">
                                <i class="icon-bubble-1"></i>
                                <strong>Get Important Notifications</strong>
                            </h4>
                            <div class="content-box-text">
                                Notifies you when you have moved from one stage to another and reminds you when you have upcoming screenings/livechats. 
                            </div>

                        </div>
                    </div>


                </div>         
                <div class="space-sep40"></div>
            </div>
            <div class="container"></div>
        </div>        
        <div class="testimonial-big">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-10" >
                        <div class="testimonial-big-text animated" data-animtype="fadeInRight"
                             data-animrepeat="1"
                             data-speed="1s"
                             data-delay="0s">
                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                            nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="testimonial-big-img animated" data-animtype="fadeInLeft"
                             data-animrepeat="1"
                             data-speed="1s"
                             data-delay="0s">
                            <img src="images/placeholders/testimonial-big.png" alt=""/>
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