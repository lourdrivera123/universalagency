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

                        @if( getCandidateUsingEvaluationId($evaluation)->status == 'declined' )
                        <div id="decisionarea">
                            <div class="alert alert-danger"><div class="msg">This Applicant has been declined for this Job.</div></div>
                        </div>
                        @elseif( getCandidateUsingEvaluationId($evaluation)->status == 'hired' )
                        <div id="decisionarea">
                            <div class="alert alert-success"><div class="msg">This Applicant has been hired for this Job.</div></div>
                        </div>
                        @else
                        <div id="decisionarea">
                            <button type="button" name="btn_hire" class="btn btn-green"><i class="fa fa-check"></i> Hire</button>
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
{{ HTML::script('js/notification/SmartNotification.min.js') }}
{{ HTML::script('js/app.min.js') }}
{{ HTML::script('js/plugin/msie-fix/jquery.mb.browser.min.js') }}
{{ HTML::script('js/plugin/fastclick/fastclick.min.js') }}
{{ HTML::script('js/demo.min.js')}}
{{ HTML::script('js/plugin/sparkline/jquery.sparkline.min.js') }}


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

                 /*
            * SmartAlerts
            */
            // With Callback
            $("#smart-mod-eg1").click(function(e) {

                var _token = $('#applicantevaluationform > input[name="_token"]').val();
                var applicantid = $('[name="applicantid"]').val();
                var jobid = $('[name="jobid"]').val();

                $('html, body').animate({
                    scrollTop: $(this).offset().top }, 200);    

                $.SmartMessageBox({
                    title : "Are you sure you dont want to hire this applicant for the job?",
                    content : "",
                    buttons : '[No][Yes]'
                }, function(ButtonPressed) {
                    if (ButtonPressed === "Yes") {

                        $.post('/admindeclineApplicantUnderReview', { _token: _token, applicantid: applicantid, jobid: jobid }, function(data){

                            $('#decisionarea').html('<div class="alert alert-danger"><div class="msg">This Applicant has been declined for this Job.</div></div>');

                            $.smallBox({
                                title : "Applicant has been declined",
                                content : "<i class='fa fa-clock-o'></i> <i>just now...</i>",
                                color : "#C46A69",
                                iconSmall : "fa fa-check fa-2x fadeInRight animated",
                                timeout : 4000
                            });

                            $('html, body').animate({ scrollTop: $('#scrollpointtitle').offset().top }, 200);

                        });



                    }
                    if (ButtonPressed === "No") {

                      $('html, body').animate({ scrollTop: $('#scrollpointtitle').offset().top }, 200);

                      return 0;
                  }

              });

e.preventDefault();

})


})

</script>
@stop