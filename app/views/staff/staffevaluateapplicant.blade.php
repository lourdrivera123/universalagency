@extends('staff.layouts.evaluationdefault')

@section('title')
<title> Evaluate Applicant | Universal Agency</title>
@stop

@section('description')
<meta name="description" content="Universal Agency Evaluate Applicant">
@stop

@section('additional_styles')
{{ HTML::style('css/smartadmin-production.min.css') }}
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-info">
                    <h1 class="h1-page-title">Evaluate Applicant - {{ $name }} </h1>
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
            <div class="col-md-12 col-sm-12 animated" data-animtype="bounce"
            data-animrepeat="0"
            data-speed="1s"
            data-delay="0.5s">

            
            {{ Form::open(['action' => 'EvaluationController@store', 'id' => 'evaluate_applicant_form', 'name' => 'evaluate_applicant_form']) }}
            
            <input type="hidden" name="applicantid" value="{{ $applicantid }}" />
            <input type="hidden" name="jobid" value="{{ $jobid }}"/>

            <div class="smart-form ">
            <div class="rating">
                <input type="radio" name="rating" id="asterisks-rating-10" value="10">
                <label for="asterisks-rating-10"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-9" value="9">
                <label for="asterisks-rating-9"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-8" value="8">
                <label for="asterisks-rating-8"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-7" value="7">
                <label for="asterisks-rating-7"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-6" value="6">
                <label for="asterisks-rating-6"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-5" value="5">
                <label for="asterisks-rating-5"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-4" value="4">
                <label for="asterisks-rating-4"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-3" value="3">
                <label for="asterisks-rating-3"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-2" value="2">
                <label for="asterisks-rating-2"><i class="fa fa-star"></i></label>
                <input type="radio" name="rating" id="asterisks-rating-1" value="1">
                <label for="asterisks-rating-1"><i class="fa fa-star"></i></label>
                <h4>Rate this applicant</h4>
            </div>
            </div>

            <br/><br/>

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                    <h2 style="color:white">Evaluation</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->


                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <textarea id="evaluation" name="evaluation" class="custom-scroll" style="min-height:300px;">
                            Enter your evaluation here..                       
                        </textarea>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

            <div style="text-align:center">
                <button type="submit" class="btn btn-primary" id="evaluate_form_btn_submit">Save</button>
            </div>
            {{ Form::close() }}

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
{{ HTML::script('js/plugin/markdown/markdown.min.js') }}
{{ HTML::script('js/plugin/markdown/to-markdown.min.js')}}
{{ HTML::script('js/plugin/markdown/bootstrap-markdown.min.js') }}

<script type="text/javascript">

            // DO NOT REMOVE : GLOBAL FUNCTIONS!
            
            $(document).ready(function() {


                /*
                 * MARKDOWN EDITOR
                 */

                 $("#evaluation").markdown({
                    autofocus:false,
                    savable: false,
                })


             })

        </script>
        @stop