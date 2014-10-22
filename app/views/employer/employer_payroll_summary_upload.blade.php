@extends('employer.layouts.default')

@section('title')
	<title>Employer Payroll Summary Upload | Universal Agency</title>
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
                        <h1 class="h1-page-title">PAYROLL SUMMARY UPLOAD</h1>

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
                        <h2 class="h2-section-title">Payroll Summary Upload form</h2>

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

                    @if(empty($employees))
                    <center>
                        <div class="form-group"><h4>No employee hired</h4></div>
                    </center>
                    @else
                    
                            {{ Form::open(['id' => 'upload_payroll_summary_form', 'files' => 'true', 'action' => 'PayrollsummaryController@store']) }} 
                            
                            <div class="form-group" style="text-align:center">
                            <label for="name"> Name of Employee </label>
                                {{ Form::select('employeeid', $employees, null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="text-align:center">
                            <label for="name"> Month </label>
                                {{ Form::selectMonth('month', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="text-align:center">
                            <label for="name"> Upload .xls file </label>
                                {{ Form::file('file', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="text-align:center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            </div>

                            {{ Form::close() }}       
                    @endif
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