@extends('applicant.layouts.default')

@section('title')
<title>{{ $job->job_title }} | Universal Agency</title>

@stop

@section('description')
<meta name="description" content="Universal Agency User">
@stop

@section('body')
<div class="section-content section-color-bg white-text" style="background-color:#ffffff">
  <div class="top-title-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="page-info">
            <h1 class="h1-page-title">{{ $job->job_title }}</h1>

            <h2 class="h2-page-desc">
              {{ $job->employer()->first()->businessname }}
            </h2>
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
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="col-md-2">
          <img src="{{ URL::asset($job->employer()->first()->photo) }}" class="img-circle" style='height:100px;width:100px;'>
        </div>

        <div class="col-md-10" id="notifier">
          <h2 style="color:#279fbb;">
            {{ Form::open(['id' => 'applyjobform']) }}
            {{ $job->job_title }}

            @if( isApplicant() )
            <?php $userid = Auth::user()->id; $jobid= $job->id ?>


            @if( isHired() )
            
            <div class="alert alert-info">
              <div class="msg">
                <h4>You cannot accept jobs while you are working for someone.</h4>
              </div>
            </div>
            @elseif( checkIfUserHasTakenTests($userid, $jobid) != 'all tests taken!' )
            
            <div class="alert alert-info">
              <div class="msg">
                <h4> Before you proceed, we would like to inform you that we require everyone to take <a href="{{ URL::to("pleasetakepersonalitytest") }}" style="color:blue; font-size:13px; font-weight:bold">Personality test</a> and <a href="{{ URL::to("pleasetakeiqtest") }}" style="color:blue; font-size:13px; font-weight:bold">IQ test</a>. This will help us identify your personality and your intellectual capacity.</h4>
              </div>
            </div>
            @elseif( checkIfApplicantRequested($userid, $jobid) )
            
            <div class="form-inline" style="margin-left:5px;">
              <a href="javascript:void(0)" id="{{ Auth::user()->pendingjobrequest()->first()->id }}" class="btn btn-red disabled" data-jobid="{{ $job->id }}" data-applicantid="{{ Auth::user()->id }}" data-jobrequestid="{{ Auth::user()->pendingjobrequest()->first()->id }}">You already requested to this job</a>
            </div>
            @elseif( checkIfApplicantRequestedAndApproved($userid, $jobid) )
            
            <div class="row">
              <div class="alert alert-info col-md-12" style="margin-left:5px;">
                <div class="col-md-12">
                  Your request to this job has been approved.
                </div>                
              </div>
            </div>
            @elseif( checkIfApplicantRequestedButDisapproved($userid, $jobid) )
            
            <div class="row">
              <div class="alert alert-info col-md-12" style="margin-left:5px;">
                <div class="msg">
                  Your request to this job has been disapproved.
                </div>                
              </div>
            </div>
            @elseif(isInvited($userid, $jobid) )
            
            <div class="row">
              <div class="form-inline" style="margin-left:5px;">
                <a href="javascript:void(0)" id="" onclick="acceptinvitation($(this))" class="btn btn-green" data-jobid="{{ $job->id }}" data-applicantid="{{ Auth::user()->id }}">Accept</a>
                <a href="javascript:void(0)" id="" onclick="confirm('Are you sure you want to decline?') ? declineinvitation($(this)) : ''" class="btn btn-red" data-jobid="{{ $job->id }}" data-applicantid="{{ Auth::user()->id }}">Decline</a>
              </div>
            </div>
            @elseif( hasBeenInvitedButDeclined($userid, $jobid) )
            
            <div class="row">
              <div class="alert alert-info" style="margin-left:5px;">
                <div class="msg">
                  <i class="fa fa-warning"></i> You were invited on this job before, but you neglected
                </div>
              </div>
            </div>
            @elseif( hasBeenInvitedAndAccepted($userid, $jobid) )
            
            <div class="row">
              <div class="alert alert-info">
                <div class="msg">
                  <h4> You already applied on this job.</h4>
                </div>
              </div>
            </div>
            @elseif(isTaken($jobid))
             <div class="row">
              <div class="alert alert-info">
                <div class="msg">
                  <h4> This Job has already been taken.</h4>
                </div>
              </div>
            </div>
            @else
            <div class="form-inline" style="margin-left:5px;">
              <a href="javascript:void(0)" id="" class="btn btn-primary" data-jobid="{{ $job->id }}" data-applicantid="{{ Auth::user()->id }}" onclick="apply($(this))">I am interested on this job</a>
            </div>
            @endif
            @endif

            {{ Form::close() }}
          </h2>
        </div>
        
        <div class="space-sep80"></div>

        <div class="row">
          <div class="col-md-5">
            <div class="title-block clearfix">
              <h3 class="h3-body-title"><i class="fa fa-pencil-square"> </i> Job Description </h3>
              <div class="title-seperator"></div>
            </div>
            <p> {{ $job->description }}</p>

            <p> <b>Basic Pay:</b> {{ getSalary($job->job_title) }} </p>

            <p> <b>Job location:</b> {{ $job->location }}</p>

            <p> <b>Opening Date:</b> {{ $job->created_at->toDateString() }}</p>

            <p> <b>Closing Date:</b> {{ $job->invitationexpiration }}</p>

            <div class="space-sep30"></div>

            <div class="title-block clearfix">
              <h3 class="h3-body-title"><i class="fa fa-list-ol"></i> Job Qualifications</h3>
              <div class="title-seperator"></div>
            </div>
            @if($job->gender == "both")
            <p> <b>Gender: </b> Male/Female </p>
            @else
            <p> <b>Gender: </b> {{ $job->gender }} </p>
            @endif
            <p> <b>Age: </b> {{ $job->agefrom }} - {{ $job->ageto }} yrs. old </p>
            <p> <b>Minimum Educational Attainment: </b> {{ Degreelevel::find($job->education)->levelname }} </p>

            @if($job->minimumyearsofexperience == 0)
            <p> <b>Required Years of Experience: </b> none </p>
            @else
            <p> <b>Required Years of Experience: </b> {{ $job->minimumyearsofexperience }} years </p>
            @endif

            <div class="space-sep30"></div>

            <div class="title-block clearfix">
              <h3 class="h3-body-title"><i class="fa fa-list-ol"></i> Other Requirements</h3>
              <div class="title-seperator"></div>
            </div>
            <p> {{ $job->others }}</p>
          </div>

          <div class="col-md-1"></div>

          <div class="col-md-6">
            <div class="title-block clearfix">
              <h3 class="h3-body-title"><i class="fa fa-building-o"></i> Company Information </h3>
              <div class="title-seperator"></div>
            </div>

            <div class="row">
              <h6 class="col-md-4 col-xs-4"> Company name </h6>

              <h6 class="col-md-8 col-xs-8"> 
                <a href="{{ URL::to('employer/'.$job->employer()->first()->id) }}"> 
                  <b> : {{ $job->employer()->first()->businessname }} </b>
                </a>
              </h6>
            </div>
            
            <div class="row">
              <h6 class="col-md-4 col-xs-4"> Address </h6>

              <h6 class="col-md-8 col-xs-8"> : {{ $job->employer()->first()->address }} </h6>
              <div class="space-sep20"></div>
            </div>
            
            <div class="title-block clearfix">
              <h3 class="h3-body-title"><i class="fa fa-list-ol"></i> Company Overview</h3>
              <div class="title-seperator"></div>
            </div>
            <p> {{ $job->employer()->first()->description }} </p>

          </div>
        </div>

        <div class="space-sep30"> </div>

        <div class="row">
          <div class="row">
            <div class="col-md-8 col-xs-1"></div>

            <div class="col-md-1 col-xs-2">
              <img src="{{ URL::asset('images\related.jpg') }}" style="width:30px; height:30px; ">
            </div>

            <div class="col-md-3 col-xs-9">
              <a href="{{ URL::to('joblist/'.$job->job_category) }}"><label style="font-size:15px;"> View Similar Jobs</label></a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 col-xs-1"></div>

            <div class="col-md-1 col-xs-2">
              <img src="{{ URL::asset('images\briefcase.png') }}" style="width:30px; height:30px; ">
            </div>

            <div class="col-md-3 col-xs-9">
              <a href="{{ URL::to('joblist/employer/'.$job->employer()->first()->id) }}"><label style="font-size:15px;"> Other Jobs from this Employer</label></a>
            </div>
          </div>
        </div>

        <div class="space-sep50"> </div>

        <div class="row"> 
          <div class="col-md-2">
            <div class="blog-post-details-item blog-post-details-item-left icon-calendar">
              {{  ago($job->created_at) }}
            </div>
          </div>           

          <div class="col-md-10">
            <div class="social-icons">
              <ul> 
                <li>  </li>
                <li>
                 <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('job/'.$job->id) }}" 
                  title="Share on Facebook" class="share facebook social-media-icon facebook-icon">facebook</a>
                </li>
                <li>
                  <a href="https://twitter.com/intent/tweet?url={{ URL::to('job/'.$job->id) }}" 
                    title="Share on Twitter" class="share twitter social-media-icon twitter-icon">twitter</a>
                  </li>
                  <li>
                    <a href="https://plus.google.com/share?url={{ URL::to('job/'.$job->id) }}" 
                      title="Share on Googleplus" class="share google social-media-icon googleplus-icon">googleplus</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @stop

    @section('modals')
    <!-- Modal -->
   <!--  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Notification</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-info" id="thankyounotification" style="display:none" ><div class="msg" ><i class="fa fa-info-circle"></i> Thank you for accepting the invitation. Please check you notifications and take the test/s.</div></div>
            <div class="alert alert-info" id="compliedtestsnotification" style="display:none" ><div class="msg"><i class="fa fa-info-circle"></i> You've already taken the test. Our Staff will send you the list of requirements, please regularly check your messages.</div></div>
            <br/><a style="display:none" id="personalitytestlink" href="{{ URL::to('personalitytest') }}">Take Personality Test</a>
            <br/><a style="display:none" id="iqtestlink" href="{{ URL::to('iqtest') }}">Take IQ Test</a>
            <br/>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Alert Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Notification</h4>
          </div>
          <div class="modal-body" id="alertmodalbody">
            <h4> Before you proceed, we would like to inform you that we require everyone to take <a href="{{ URL::to('personalitytest') }}" style="color:blue; font-size:13px; font-weight:bold">Personality test</a> and <a href="{{ URL::to('iqtest') }}" style="color:blue; font-size:13px; font-weight:bold">IQ test</a>. This will help us identify your personality and your intellectual capacity.</h4>
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
    <script type="text/javascript">
    // create social networking pop-ups
    (function() {

      var Config = {
        Link: "a.share",
        Width: 500,
        Height: 500
      }
      ;

          // add handler links
          var slink = document.querySelectorAll(Config.Link);
          for (var a = 0; a < slink.length; a++) {
            slink[a].onclick = PopupHandler;
          }

          // create popup
          function PopupHandler(e) {

            e = (e ? e : window.event);
            var t = (e.target ? e.target : e.srcElement);
            
            // popup position
            var
            px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
            py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);
            
            // open popup
            var popup = window.open(t.href, "social", "width="+Config.Width+",height="+Config.Height+",left="+px+",top="+py+",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
            if (popup) {
              popup.focus();
              if (e.preventDefault) e.preventDefault();
              e.returnValue = false;
            }

            return !!popup;
          }

        }
        ());
</script>
@stop