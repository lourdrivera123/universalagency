@extends('applicant.layouts.default')

@section('title')
<title>Upload Requirements | Universal Agency</title>
@stop

@section('description')
<meta name="description" content="Universal Agency User">
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-info">
                    <h1 class="h1-page-title">Upload requirements</h1>
                    <!-- BreadCrumb -->
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="active">BE SURE TO UPLOAD VALID DOCUMENTS/REQUIREMENTS.</li>
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
            <div class="row">
                <div class="col-md-12 col-sm-12 animated" data-animtype="flipInY"
                data-animrepeat="0"
                data-speed="1s"
                data-delay="0.5s">
                    <div class="i-section-title">
                        <i class="icon-users-outline"> </i>
                    </div>

                    <div class="space-sep20"></div>
                </div>            
            </div>
            <div class="row">
            <div class="col-md-9 col-sm-9 centered">
                <div class="classic-form">
                    {{ Form::open(['id' => 'requirement_upload', 'files' => true, 'action' => 'UploadRequirementController@store', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate']) }}
                        
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                        @endif

                        <div class="title-block clearfix">
                            <h3 class="h3-body-title">Images</h3>
                            <div class="title-seperator"></div>
                        </div>

                        <div class="form-group">
                            <label for="profile_picture" class="col-sm-3 control-label">Attach a Photo</label>
                            <div class="col-sm-9">
                            <i class="fa fa-camera fa-3x" id="icon_to_trigger"></i>
                                {{ Form::file('uploadrequirement', ['id' => 'uploadrequirement', 'class' => 'hide']) }}<br/>
                                <center>
                                
                                </center>
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
{{ HTML::script('js/personalizedscript.js') }}
@stop