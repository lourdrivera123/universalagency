@extends('staff.layouts.evaluationdefault')

@section('title')
<title> Applicant Evaluation | Universal Agency</title>
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
                    <h1 class="h1-page-title" id="scrollpointtitle"> Applicant Evaluation</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('body')

{{ Form::open(['id' => 'applicantevaluationform']) }}

<input type="hidden" name="applicantid" value="{{ $evaluation->applicant_id }}" />
<input type="hidden" name="jobid" value="{{ $evaluation->job_id }}" />

{{ Form::close() }}
<div class="content-wrapper hide-until-loading"><div class="body-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 animated" data-animtype="bounce"
            data-animrepeat="0"
            data-speed="1s"
            data-delay="0.5s">

            <center>

                <h4>{{ $evaluation->user->first()->resume()->first()->first_name.' '.$evaluation->user->first()->resume()->first()->last_name }}</h4>
                <br/>
                <div class="smart-form ">
                    <div class="rating">
                        <h5>Rating: </h5>
                        @for($x=1; $x <= $evaluation->rating; $x++)
                        <i style="color:yellow" class="fa fa-star "></i>
                        @endfor

                        <strong>{{ $evaluation->rating.'/10' }}</strong>

                        <div class="title-block clearfix">
                            <h3 class="h3-body-title">Evaluation</h3>
                            <div class="title-seperator"></div>
                        </div> 

                        <div>
                            {{ $evaluation->evaluation }}
                        </div>

                        <div class="title-block clearfix">
                            <h3 class="h3-body-title">Hire/Decline</h3>
                            <div class="title-seperator"></div>
                        </div> 

                        @if(check_if_slot_is_not_available($evaluation->job_id))
                        <div id="decisionarea"><div class="alert alert-danger"><div class="msg">There are no available vacancy for this job, to change employees, you have to remove an employee first in the closed jobs table.</div></div></div>
                        @elseif( getCandidateUsingEvaluationId($evaluation)->status == 'declined' )
                        <div id="decisionarea">
                            <div class="alert alert-danger"><div class="msg">This Applicant has been declined for this Job.</div></div>
                        </div>
                        @elseif( getCandidateUsingEvaluationId($evaluation)->status == 'hired' )
                        <div id="decisionarea">
                            <div class="alert alert-success"><div class="msg">This Applicant has been hired for this Job.</div></div>
                        </div>
                        @else
                        <div id="decisionarea">
                            <button type="button" data-toggle="modal" data-target="#recruitmentformmodal" name="btn_hire" class="btn btn-green"><i class="fa fa-check"></i> Hire</button>
                            <button type="button" id="smart-mod-eg1" name="btn_decline" class="btn btn-red"><i class="fa fa-times"></i> Decline</button>
                        </div>
                        @endif  


                    </div>
                </div>

            </center>

        </div>            
    </div>
    <div class="clients-list"></div>

</div>
</div>
</div>
@stop

@section('modals')
<!-- Add Modal -->
<div class="modal fade" id="recruitmentformmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel1">Set Employee Contract</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    {{ Form::open(['id' => 'recruitmentform']) }}

                    <input type="hidden" name="jobidrecruitmentform" value="{{ $evaluation->job_id }}"/>
                    <input type="hidden" name="applicantidrecruitmentform" value="{{ $evaluation->applicant_id }}" />
                    <input type="hidden" name="employeridrecruitmentform" value="{{ getEmployerIdUsingJobName($evaluation->job()->first()->job_title) }}" />
                    <input type="hidden" name="contract_id" value="{{ getContractIDByJobTitle($evaluation->job()->first()->job_title) }}" />


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="job">Job Title</label>
                            {{ Form::text('job', $evaluation->job()->first()->job_title, ['class' => 'form-control', 'readonly' => '']) }}
                        </div>

                        <div class="form-group">
                            <label for="employer">Employer</label>
                            {{ Form::text('employer', $evaluation->job()->first()->employer()->first()->businessname, ['class' => 'form-control', 'readonly' => '']) }}
                        </div>

                        <div class="form-group">
                            <label for="employee">Employee</label>
                            {{ Form::text('employee', $evaluation->user()->first()->resume()->first()->first_name.' '.$evaluation->user()->first()->resume()->first()->last_name, ['class' => 'form-control', 'readonly' => '']) }}
                        </div>

                        <div class="form-inline">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <label for="percentage">Recruitment Fee (%)</label>
                                    {{ Form::number('percentage', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <label for="basic_pay">Basic Pay (PHP)</label>
                                    {{ Form::number('basic_pay', getSalary($evaluation->job()->first()->job_title), ['class' => 'form-control', 'readonly' => '']) }}
                                </div>
                            </div>
                        </div>
                        <br/>

                    </div>
                    
                </div>

                <div class="modal-footer" id="recruitmentfromfooter">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button id="recruitmentformsubmit" type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
                {{ Form::close() }}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
{{ HTML::script('js/jQuery.XDomainRequest.js')}}
{{ HTML::script('js/kanzi.js') }}
{{ HTML::script('js/retina.js') }}
{{ HTML::script('js/plugin/markdown/markdown.min.js') }}
{{ HTML::script('js/plugin/markdown/to-markdown.min.js')}}
{{ HTML::script('js/plugin/markdown/bootstrap-markdown.min.js') }}
{{ HTML::script('js/notification/SmartNotification.min.js') }}
{{ HTML::script('js/app.min.js') }}
{{ HTML::script('js/plugin/msie-fix/jquery.mb.browser.min.js') }}
{{ HTML::script('js/plugin/fastclick/fastclick.min.js') }}
{{ HTML::script('js/demo.min.js') }}
{{ HTML::script('js/app.min.js') }}
{{ HTML::script('js/plugin/masked-input/jquery.maskedinput.min.js') }}
{{ HTML::script('js/plugin/sparkline/jquery.sparkline.min.js') }}
{{ HTML::script('js/plugin/jquery-validate/jquery.validate.min.js') }}
{{ HTML::script('js/applicantevaluation.js')}}
@stop