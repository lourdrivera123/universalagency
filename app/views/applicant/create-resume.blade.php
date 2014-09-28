@extends('applicant.layouts.default')

@section('title')
@if(checkresumeifcomplete())
<title>Update Resume | Universal Agency</title>
@else
<title>Create Resume | Universal Agency</title>
@endif
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
                    @if(checkresumeifcomplete())
                    <h1 class="h1-page-title">Update Your Resume</h1>
                    @else
                    <h1 class="h1-page-title">Create Your Resume</h1>
                    @endif
                    <!-- BreadCrumb -->
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="active">Make it presentable, so that employers will notice you.</li>
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

        @include('applicant.partials._wizard')

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 animated" data-animtype="flipInY"
                data-animrepeat="0"
                data-speed="1s"
                data-delay="0.5s">


                <div class="space-sep20"></div>
            </div>            
        </div>

        <div class="row">
            <div class="col-md-9 col-sm-9 centered">
                <div class="classic-form">
                    {{ Form::model($resume, ['id' => 'create_resume', 'files' => true, 'action' => 'ResumeController@store', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate']) }}
                    <input type="hidden" name="resume_id" id="resume_id" value="{{ Auth::user()->resume()->first()->id }}"/>
                    @if(Session::has('flash_message'))
                    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @elseif(Session::has('invalid_credentials'))
                    <div class="alert alert-danger">{{ Session::get('invalid_credentials') }}</div>
                    @endif

                    <center>
                       <h1>Profile Overview</h1>
                   </center>

                   <div class="title-block clearfix">
                    <h3 class="h3-body-title">Account</h3>
                    <div class="title-seperator"></div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">Add a Photo</label>
                    <div class="col-sm-9">
                        <i class="fa fa-camera fa-3x" id="icon_to_trigger"></i>
                        {{ Form::file('photo', ['id' => 'photo', 'class' => 'hide']) }}<br/>
                        <center>
                            <img src="{{ $resume->photo }}" id="img-render-photo" class="img-responsive img_render_profilephoto"/>
                        </center>
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">Skills</label>
                    <div class="col-sm-9">
                        {{ Form::text('titleofexpertise', null, ['id' => 'titleofexpertise', 'placeholder' => '(example: Full-time Finance Manager )', 'class' => 'form-control']) }}
                        {{ $errors->first('titleofexpertise','<div class="alert alert-danger">Title Field is required</div>') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="overview" class="col-sm-3 control-label">Overview</label>
                    <div class="col-sm-9">
                        {{ Form::textarea('overview', null, ['id' => 'overview', 'class' => 'form-control', 'placeholder' => 'Say something about yourself, job experiences, skills you have and write it like your personal resume.']) }}
                        {{ $errors->first('overview','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="english_level" class="col-sm-3 control-label">Job Category</label>
                    <div class="col-sm-9">
                        {{ Form::select('position_desired', $jobcategories, null, ['class' => 'form-control']) }}
                        {{ $errors->first('position_desired','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="title-block clearfix">
                    <h3 class="h3-body-title">BASIC INFORMATION</h3>
                    <div class="title-seperator"></div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        {{ Form::text('first_name', null, ['id' => 'first_name', 'placeholder' => 'What\'s your given name?', 'class' => 'form-control']) }}
                        {{ $errors->first('first_name','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        {{ Form::text('last_name', null, ['id' => 'last_name', 'placeholder' => 'What\'s your family name?', 'class' => 'form-control']) }}
                        {{ $errors->first('last_name','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">Birth Date</label>
                    <div class="col-sm-9">
                        <input type="text" name="birth_date" id="birth_date" class="form-control" placeholder="You were born on (yyyy-mm-dd) ?" value="{{ $resume->birth_date }}" />
                        <div class="alert alert-danger" style="display:none" id="birthdateerror">You must be 18 years old and above</div>
                        {{ $errors->first('birth_date','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                        {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female'], null, ['id' => 'gender', 'placeholder' => 'Gender', 'class' => 'form-control'])}}
                        {{ $errors->first('gender','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">Marital Status</label>
                    <div class="col-sm-9">
                        {{ Form::select('marital_status', ['Single' => 'Single', 'Married' => 'Married', 'Widowed' => 'Widowed'], null, ['id' => 'marital_status', 'placeholder' => 'Marital Status', 'class' => 'form-control'])}}
                        {{ $errors->first('marital_status','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">Mobile Number</label>
                    <div class="col-sm-9">
                        {{ Form::text('phone_number', null, ['id' => 'phone_number', 'placeholder' => 'What\'s your mobile number?', 'class' => 'form-control']) }}
                        {{ $errors->first('phone_number','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_picture" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        {{ Form::text('address', null, ['id' => 'address', 'placeholder' => 'Where do you live?', 'class' => 'form-control']) }}
                        {{ $errors->first('address','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="title-block clearfix" id="scrollarea">
                    <h3 class="h3-body-title">Background</h3>
                    <div class="title-seperator"></div>
                </div>

                <div class="alert alert-info">
                    <div class="msg">
                        <p><i class="fa fa-warning fa-2x"></i>&nbsp; Adding Educational Background and Employment History is Optional, but it is useful to get more job invitations. </p>
                    </div>
                </div>

                <div class="form-group" >
                    <label for="english_level" class="col-sm-3 control-label">Employment History</label>
                    <div class="col-sm-9" id="jobhistory_list">
                        @if(count($jobhistories) > 0)
                        @foreach($jobhistories as $jobhistory)
                        <div class="list-group">
                            <div class="list-group-item">
                                <strong>
                                    <h4 class="list-group-item-heading">{{ $jobhistory->company_name}}</h4>
                                </strong>
                                <h6 class="list-group-item-text">{{ $jobhistory->title}}</h6>
                                <h6 class="list-group-item-text">
                                    {{ date('F', strtotime("$jobhistory->year_from-$jobhistory->month_from-01")) }} {{ $jobhistory->year_from }} - 
                                    {{ date('F', strtotime("$jobhistory->year_from-$jobhistory->month_to-01")) }} {{ $jobhistory->year_to }}
                                </h6>

                                <br>
                                <p class="list-group-item-text">{{ $jobhistory->description }}</p> <br>
                                <p>
                                   <button type="button" class="btn btn-sm btn-red" onClick="deleteJobhistory($(this))" data-id="{{ $jobhistory->id }}">delete</button>
                               </p>
                           </div>
                       </div>
                       @endforeach
                       @endif
                       <br/>
                       <div class="accordion" data-toggle="on" data-active-index="" id="add_job_history_accordion">
                        <div class="accordion-row">
                            <div class="">
                                <div class="title">
                                    <div class="open-icon"></div>
                                    <h4 id="triggerable">Add Job History</h4>
                                </div>
                                <div class="desc">
                                    <div class="form-group">
                                        <label for="company_name" class="col-sm-4 control-label">Company Name</label>
                                        <div class="col-sm-8">
                                            {{ Form::text('company_name', null, ['id' => 'company_name', 'placeholder' => 'Company Name', 'class' => 'form-control']) }}
                                            <div class="alert alert-danger" style="display:none" id="companynameerror">Please State the Company Name</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="title" class="col-sm-4 control-label">Title</label>
                                        <div class="col-sm-8">
                                            {{ Form::text('title', null, ['id' => 'title', 'placeholder' => 'Title', 'class' => 'form-control']) }}
                                            <div class="alert alert-danger" style="display:none" id="titleerror">Please State the Company Name</div>
                                        </div>
                                    </div>

                                    <center>
                                        <div class="form-group">
                                            <label for="title" class="col-sm-8 control-label">Time Period</label>
                                            <div class="col-sm-12" style="padding:0px">
                                                <div class="col-md-2"> </div>
                                                <div class="col-md-3">
                                                    <label>From</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>-</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>To</label>
                                                </div> 
                                                <div class="col-md-1"> </div><br>

                                                <div class="col-md-3">
                                                    <label for="month_from">Month</label>
                                                    {{ Form::selectMonth('month_from', null, ['class' => 'form-control no-padding-selectbox']) }}
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="year_from">Year</label>
                                                    {{ Form::selectRange('year_from', date('Y'), date('Y') - 50, null, ['class' => 'form-control no-padding-selectbox'])}}
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="month_to">Month</label>
                                                    {{ Form::selectMonth('month_to', null, ['class' => 'form-control no-padding-selectbox']) }}
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="year_to">Year</label>
                                                    {{ Form::selectRange('year_to', date('Y'), date('Y') - 50, null, ['class' => 'form-control no-padding-selectbox'])}}
                                                </div>
                                                {{ $errors->first('year','<div class="alert alert-danger">:message</div>') }}

                                            </div>
                                        </div>
                                        <span class="alert alert-danger" style="display:none" id="timeofperioderror">Date Attended must be before Date Ended</span>
                                    </center><br/>

                                    <div class="form-group">
                                        <label for="overview" class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-8">
                                            {{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Description (Optional)']) }}
                                            {{ $errors->first('description','<div class="alert alert-danger">:message</div>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="button" name="btn_add_job_history" id="btn_add_job_history" class="btn btn-block btn-green">Add</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="education" class="col-sm-3 control-label" id="scrollarea2">Education</label>
                <div class="col-sm-9" id="education_list">
                    @if(count($educations) > 0)
                    @foreach($educations as $education)
                    <div class="list-group">
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">
                                {{ $education->school_name}} ( {{ $education->year_from_education }} - {{ $education->year_to_education }} )  
                            </h4>
                            <h6 class="list-group-item-text">
                                {{ Degreelevel::whereId($education->degree_level)->first()->levelname }} 
                                @if($education->field_of_study != "")
                                - {{ $education->field_of_study }}
                                @endif
                            </h6>

                            <br>
                            <p class="list-group-item-text">{{ $education->additional_notes }}</p> <br>
                            <p>
                                <button type="button" data-id="{{ $education->id }}" onClick="deleteEducation($(this))" class="btn btn-sm btn-red">delete</button>
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <br/>
                    <div class="accordion" data-toggle="on" data-active-index="" id="add_education_accordion">
                        <div class="accordion-row">
                            <div class="">
                                <div class="title">
                                    <div class="open-icon"></div>
                                    <h4 id="sotriggerable">Add Education</h4>
                                </div>
                                <div class="desc">
                                    <div class="form-group">
                                        <label for="school_name" class="col-sm-4 control-label">School Name</label>
                                        <div class="col-sm-8">
                                            {{ Form::text('school_name', null, ['id' => 'school_name', 'placeholder' => 'School Name', 'class' => 'form-control']) }}
                                            <div class="alert alert-danger" id="schoolnameerror" style="display: none">Please Input State the School Name</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="title" class="col-sm-4 control-label">Degree Level</label>
                                        <div class="col-sm-8">
                                            {{ Form::select('degree_level', ['1' => 'High School', '2' => 'Vocational', '3' => 'College Diploma', '4' => 'Bachelor\'s Degree', '5' => 'Master\'s Degree', '6' => 'Doctorate'], null, ['class' => 'form-control', 'id' => 'degree_level']) }}
                                            {{ $errors->first('degree_level','<div class="alert alert-danger">:message</div>') }}
                                        </div>
                                    </div>

                                    <div class="form-group" id="field_of_study_div" style="display:none">
                                        <label for="field_of_study" class="col-sm-4 control-label">Field of Study</label>
                                        <div class="col-sm-8">
                                            {{ Form::text('field_of_study', null, ['id' => 'field_of_study', 'placeholder' => 'Field of Study', 'class' => 'form-control']) }}
                                            <div class="alert alert-danger" id="fieldofstudyerror" style="display: none">Please Input the Field of Study</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="title" class="col-sm-4 control-label">Time Period</label>

                                        <div class="col-sm-8">
                                            <div class="col-sm-5">
                                                <center><label>From </label><br>
                                                    <label for="year_from_education">Year </label></center>
                                                    {{ Form::selectRange('year_from_education', date('Y') - 1, date('Y') - 50, null, ['class' => 'input-sm'])}}
                                                </div>
                                                <div class="col-sm-2"> - </div>
                                                <div class="col-sm-5">
                                                    <center><label>To</label><br>
                                                        <label for="year_to_education">Year </label></center>
                                                        <select name="year_to_education" class="input-sm">
                                                        <option name="present">Present</option>
                                                            @for( $x = date('Y'); $x >= (date('Y') - 50); $x-- )
                                                                <option name="{{ $x; }}">{{ $x; }}</option>
                                                            @endfor
                                                        </select>
                                                        {{ $errors->first('year','<div class="alert alert-danger">:message</div>') }}
                                                    </div><br>
                                                </div>
                                                <center><br><br>
                                                    <span class="alert alert-danger" style="display:none" id="educationtimeperioderror">Year Attended must be before Year Ended</span>
                                                </center>
                                                <div class="space-sep20"></div>

                                                <div class="form-group">
                                                    <label for="overview" class="col-sm-3 control-label">Additional Notes</label>
                                                    <div class="col-sm-8">
                                                        {{ Form::textarea('additional_notes', null, ['id' => 'additional_notes', 'class' => 'form-control', 'placeholder' => 'Additional Notes']) }}
                                                        {{ $errors->first('additional_notes','<div class="alert alert-danger">:message</div>') }}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <button type="button" name="btn_add_education" id="btn_add_education" class="btn btn-block btn-green">Add</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="btn_submitresume" id="btn_submitresume" class="btn btn-block btn-primary">Save</button>
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

@section('modals')
<!-- Add Modal -->
<div class="modal fade" id="editjobhistorymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel1">Add Job</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    {{ Form::open(['id' => 'editjobhistoryform', 'class' => 'smart-form']) }}
                    <div class="col-md-12">
                        <section>
                            <label class="label"><i> Company Name </i></label>
                        </section>

                        <section>
                            <label class="label"><i>Job Category</i> </label>
                        </section>

                        <section>
                            <label class="label"><i>Job Title</i></label>
                            <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Give us a sentence that can describe the job.">

                        </section>

                        <section>
                            <label class="label"><i>Job Description</i></label>
                            <textarea rows="3" class="form-control" name="description" id="description" placeholder="Describe the Job to be done"></textarea> 
                        </section>

                        <section>
                            <label class="label"><i>Requirements</i></label>
                            <textarea rows="3" class="form-control" name="requirements" id="requirements" placeholder="Please state the requirements"></textarea> 
                        </section>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
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
{{ HTML::script('js/jquery.validate.js')}}
{{ HTML::script('js/jQuery.XDomainRequest.js')}}
{{ HTML::script('js/kanzi.js') }}
{{ HTML::script('js/retina.js') }}
{{ HTML::script('js/personalizedscript.js') }}
{{ HTML::script('js/bootstrap-datepicker.js') }}
{{ HTML::script('js/validateresumeform.js') }}

<script type="text/javascript">
    // $('[name="presentlystudying"]').change(function(){
    //     // $('[name="presentlystudying"]').prop('checked', true);
    //     $('[name="year_to_education"]').prop("disabled", true);
    // });

$('[name="presentlystudying"]').click(function(){
    if ($(this).is(":checked")) { 
        $('[name="year_to_education"]').prop("disabled", true);
        // $('[name="year_to_education"]').val('0');
    } else {
        $('[name="year_to_education"]').prop('disabled', false);
    }

});
</script>
@stop