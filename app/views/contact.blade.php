@extends('applicant.layouts.default')

@section('title')
<title>Universal Agency | Homepage</title>
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
                        <h1 class="h1-page-title">Contact Us</h1>
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
        <div class="space-sep10"></div>
        @if(Session::has("flash_message"))
            <div class="alert alert-success">
                {{ Session::get("flash_message") }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <img src="images/placeholders/location.png" alt="FILENAME"
                style="width:100%;">      
            </div>
        </div>
        <div class="space-sep20"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="contact-body">
                        <h3 class="h3-body-title"> Leave A Message </h3>

                        <p class="body_paragraph contact-paragraph">
                            Say something
                        </p>

                        {{ Form::open(['action' => 'CommentController@store', 'name' => 'commentForm', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate']) }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-7">
                                    <label for="name"> Name <span style="color:red; font-weight:bold;"> * </span> </label>
                                    {{ Form::text('name', null, ['id' => 'name', 'placeholder' => 'Your name', 'class' => 'form-control']) }}
                                    {{ $errors->first('name','<div class="alert alert-danger">:message</div>') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-7">
                                    <label for="email"> Email <span style="color:red; font-weight:bold;"> * </span> </label>
                                    {{ Form::text('email', null, ['id' => 'email', 'placeholder' => 'Your Email', 'class' => 'form-control']) }}
                                    {{ $errors->first('email','<div class="alert alert-danger">:message</div>') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-7">
                                    <label for="subject"> Subject </label>
                                    {{ Form::text('subject', null, ['id' => 'subject', 'placeholder' => 'Your Subject', 'class' => 'form-control']) }}
                                    {{ $errors->first('subject','<div class="alert alert-danger">:message</div>') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-7">
                                    <label for="message"> Message <span style="color:red; font-weight:bold;"> * </span> </label>
                                    {{ Form::textarea('message', null, ['id' => 'message', 'placeholder' => 'Your Message', 'class' => 'form-control']) }}
                                    {{ $errors->first('message','<div class="alert alert-danger">:message</div>') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 col-sm-2 offset2">
                                <button type="submit" class="btn btn-block btn-primary" name="btn_submit" id="btn_submit">Submit</button>
                            </div>
                        </div>
                        {{ Form::close() }}  
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-md-offset-1 col-sm-offset-1">
                    <div class="sidebar">
                        <div class="sidebar-block">
                            <h3 class="h3-sidebar-title"> Contact Us </h3>
                            <div class="sidebar-icon-item">
                                <i class="icon-phone"></i> (082) 221 6722
                            </div>
                            <div class="sidebar-icon-item">
                                <i class="icon-email"></i> universalagency@gmail.com
                            </div>
                            <div class="sidebar-icon-item">
                                <i class="icon-home"></i>   V. Co. Building, D. Suazo Street, Davao City, Davao Del Sur
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="space-sep40"></div>
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
