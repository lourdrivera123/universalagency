@extends('applicant.layouts.default')

@section('title')
	<title>Reset Password | Universal Agency</title>
@stop

@section('description')
	<meta name="description" content="Universal Agency Signin">
@stop

@section('toptitlebar')
	<div class="top-title-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="page-info">
                        <h1 class="h1-page-title">Reset Password</h1>
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
                    <h2 class="h2-section-title">Reset Your Password</h2>

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
                       
                        @if(Session::has('status'))
                            <div class="alert alert-success">{{ Session::get('status') }}</div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        {{ Form::open(['name' => 'resetpasswordform',  'class' => 'form-horizontal', 'role' => 'form', 'novalidate']) }}
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email']) }}
                                    {{ $errors->first('email','<div class="alert alert-danger">:message</div>') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" name="btn_resetpassword" id="btn_resetpassword" class="btn btn-block btn-primary">Reset</button>
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
@stop