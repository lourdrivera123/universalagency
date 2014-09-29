@extends('applicant.layouts.default')

@section('title')
	<title>Sign Up | Universal Agency</title>
@stop

@section('description')
	<meta name="description" content="Universal Agency Signup">
@stop

@section('toptitlebar')
	<div class="top-title-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="page-info">
                        <h1 class="h1-page-title">Sign Up</h1>


                        <!-- BreadCrumb -->
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="">Home</a>
                                </li>
                                <li class="active">Sign Up Page</li>
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
	<div class="content-wrapper hide-until-loading"><div class="body-wrapper">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12 col-sm-12 animated" data-animtype="flipInY"
	                     data-animrepeat="0"
	                     data-speed="1s"
	                     data-delay="0.5s">
	                    <h2 class="h2-section-title">Sign Up</h2>

	                    <div class="i-section-title">
	                        <i class="icon-users-outline">

	                        </i>
	                    </div>

	                    <div class="space-sep20"></div>
	                </div>            
	            </div>

	            <div class="row">

	                <div class="col-md-6 col-sm-6 centered">
	                    <div class="classic-form">
                            {{ Form::open(['action' => 'UsersController@store', 'name' => 'signupform', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate']) }}
	                            <div class="form-group">
	                                <label for="first_name" class="col-sm-3 control-label">First Name</label>
	                                <div class="col-sm-9">
                                        {{ Form::text('first_name', null, ['id' => 'first_name', 'placeholder' => 'What\'s your given name?', 'class' => 'form-control']) }}
                                        {{ $errors->first('first_name','<div class="alert alert-danger">:message</div>') }}
                                    </div>
	                            </div>
	                            <div class="form-group">
	                                <label for="family_name" class="col-sm-3 control-label">Last Name</label>
	                                <div class="col-sm-9">
	                                    {{ Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'What\'s your family name?']) }}
                                        {{ $errors->first('last_name','<div class="alert alert-danger">:message</div>') }}
                                    </div>
	                            </div>
	                            <div class="form-group">
	                                <label for="email" class="col-sm-3 control-label">Email</label>
	                                <div class="col-sm-9">
	                                   {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'What\'s your email address?']) }}
                                        {{ $errors->first('email','<div class="alert alert-danger">:message</div>') }}
                                    </div>
	                            </div>
	                            <div class="form-group">
	                                <label for="password" class="col-sm-3 control-label">Password</label>
	                                <div class="col-sm-9">
	                                    {{ Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Should be atleast 6 characters']) }}
                                        {{ $errors->first('password','<div class="alert alert-danger">:message</div>') }}
                                    </div>
	                            </div>
	                            <div class="form-group">
	                                <label for="password_confirmation" class="col-sm-3 control-label">Confirm Password</label>
	                                <div class="col-sm-9">
	                                    {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Please re-enter your password']) }}
                                        {{ $errors->first('password','<div class="alert alert-danger">:message</div>') }}
                                    </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-sm-offset-3 col-sm-9">
	                                    <div class="checkbox">
	                                        <label>
	                                           {{ Form::checkbox('terms_and_conditions') }} I Accept All The <a href="{{ URL::to('termsofuse') }}" class="skin-text">Terms And Conditions</a>.
                                            </label>
                                            {{ $errors->first('terms_and_conditions','<div class="alert alert-danger">You forgot to Agree on our Terms and Conditions</div>') }}
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-sm-offset-3 col-sm-9">
	                                    <button type="submit" class="btn btn-block btn-primary" name="btn_signup" id="btn_signup">Sign Up</button>
	                                </div>
	                            </div>
	                            <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <a href="{{ URL::to('signin') }}">I'm already Signed Up</a>
                                    </div>
                                </div>
	                        {{ Form::close() }}                   
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
    $('#btn_signup').click(function(){
    	$(this).addClass('disabled');
    	$(this).html('Signing up.. <i class="fa fa-gear fa-spin"></i>');
    });
    </script>
@stop