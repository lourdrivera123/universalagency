@extends('applicant.layouts.default')

@section('title')
<title>Job List | Universal Agency</title>
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
          <h1 class="h1-page-title">
           Job List
         </h1>
         <!-- BreadCrumb -->
         <div class="breadcrumb-container">
          <ol class="breadcrumb">
            <li class="active">Home</li>
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
      @if(isset($_GET['keyword']) && isset($_GET['searchby']))
      <div class="row">
        @if(isset($searchjobs))
        @foreach($searchjobs as $job)
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-md-2">
                <img src="{{ URL::asset($job->employer()->first()->photo) }}" style="width:100px; height:100px; ">
              </div>

              <div class="col-md-8">
                <h2 class="panel-title"><a href="{{ URL::to('job/'.$job->id) }}"><u> {{ $job->job_title }} </u></a></h2>

                <span style="font-size:13px;"> <b>{{ $job->location }}</b></span> <br>
                <span style="font-size:12px;"><sb> Basic pay: </b>{{ getSalary($job->job_title) }}</span> <br>
                <span><i> {{ Str::limit($job->description, 90) }} <a href="{{ URL::to('job/'.$job->id) }}"> </i>(Read More) </a></span> <br>
              </div>

              <div class="col-md-2">
                <i class="icon-calendar"></i>
                <span>{{ ago($job->created_at) }}</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @elseif(isset($searchcompany))
        @foreach($searchcompany as $job)
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-md-2">
                <img src="{{ URL::asset($job->employer()->first()->photo) }}" style="width:100px; height:100px; ">
              </div>

              <div class="col-md-8">
                <h2 class="panel-title"><a href="{{ URL::to('job/'.$job->id) }}"><u> {{ $job->job_title }} </u></a></h2>

                <span style="font-size:13px;"> <b>{{ $job->location }}</b></span> <br>
                <span style="font-size:12px;"><b> Basic pay: </b>{{ getSalary($job->job_title) }}</span> <br>
                <span><i> {{ Str::limit($job->description, 90) }} <a href="{{ URL::to('job/'.$job->id) }}"> </i>(Read More) </a></span> <br>
              </div>

              <div class="col-md-2">
                <i class="icon-calendar"></i>
                <span>{{ ago($job->created_at) }}</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @elseif(isset($searchlocation))
        @foreach($searchlocation as $job)
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-md-2">
                <img src="{{ URL::asset($job->employer()->first()->photo) }}" style="width:100px; height:100px; ">
              </div>

              <div class="col-md-8">
                <h2 class="panel-title"><a href="{{ URL::to('job/'.$job->id) }}"><u> {{ $job->job_title }} </u></a></h2>

                <span style="font-size:13px;"> <b>{{ $job->location }}</b></span> <br>
                <span style="font-size:12px;"><b> Basic pay: </b>{{ getSalary($job->job_title) }}</span> <br>
                <span><i> {{ Str::limit($job->description, 90) }} <a href="{{ URL::to('job/'.$job->id) }}"> </i>(Read More) </a></span> <br>
              </div>

              <div class="col-md-2">
                <i class="icon-calendar"></i>
                <span>{{ ago($job->created_at) }}</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>          
      @endif

      <!-- JOBS UNDER ONE JOB CATEGORY -->
      @if(isset($jobs2) && count($jobs2 )> 0 )
      <center> <h3>{{ $jobcategory }}</h3> </center>
      <div class="col-md-9">
        @foreach($jobs2 as $job)
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-md-2">
                <img src="{{ URL::asset($job->employer()->first()->photo) }}" style="width:100px; height:100px; ">
              </div>

              <div class="col-md-8">
                <h2 class="panel-title"><a href="{{ URL::to('job/'.$job->id) }}"><u> {{ $job->job_title }} </u></a></h2>

                <span style="font-size:13px;"> <b>{{ $job->location }}</b></span> <br>
                <span style="font-size:12px;"><b> Basic pay: </b>{{ getSalary($job->job_title) }}</span> <br>
                <span><i> {{ Str::limit($job->description, 90) }} <a href="{{ URL::to('job/'.$job->id) }}"> </i>(Read More) </a></span> <br>
              </div>

              <div class="col-md-2">
                <i class="icon-calendar"></i>
                <span>{{ ago($job->created_at) }}</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="col-md-3">
        <div class="price-table ">
          <div class="price-table-header">
            <div class="price-label">
              <div class="price-label-name">
                Job Categories:
              </div>
            </div>
          </div>

          <div class="price-table-rows">
            @if(count($categories) > 0)
            @foreach($categories as $category)            
            <div class="price-table-row">
              <a href="{{ URL::to('joblist/'.$category->id) }}">
                {{ $category->category }}
              </a>
            </div>
            @endforeach
            @endif
          </div>    
        </div>
      </div>
      @elseif(isset($jobs2))
      <div class="col-md-9">
        <center> 
          <h3>{{ $jobcategory }}</h3> <br> <br>
          <h5> No job openings fall under this category. Please try again some time. </h5> 
        </center>
      </div>

      <div class="col-md-3">
        <div class="price-table ">
          <div class="price-table-header">
            <div class="price-label">
              <div class="price-label-name">
                Job Categories:
              </div>
            </div>
          </div>

          <div class="price-table-rows">
            @if(count($categories) > 0)
            @foreach($categories as $category)            
            <div class="price-table-row">
              <a href="{{ URL::to('joblist/'.$category->id) }}">
                {{ $category->category }}
              </a>
            </div>
            @endforeach
            @endif
          </div>    
        </div>
      </div>
      @endif
      <!-- END OF JOBS UNDER ONE JOB CATEGORY --> 

      <!-- NORMAL JOBLIST -->
      @if(isset($jobs) && count($jobs) > 0)
      <div class="col-md-9">
        @foreach($jobs as $job)
        <div class="col-md-12">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-md-2">
                  <img src="{{ URL::asset($job->employer()->first()->photo) }}" style="width:100px; height:100px; ">
                </div>

                <div class="col-md-7">
                  <h2 class="panel-title"><a href="{{ URL::to('job/'.$job->id) }}"><u> {{ $job->job_title }} </u></a></h2>

                  <span style="font-size:13px;"> <b> {{ $job->location }} </b> </span> <br>
                  <span style="font-size:12px;"><b> Basic pay: </b>{{ getSalary($job->job_title) }} </span> <br>
                  <span><i> {{ Str::limit($job->description, 90) }} <a href="{{ URL::to('job/'.$job->id) }}"> </i>(Read More) </a></span> <br>
                </div>

                <div class="col-md-3">
                  <i class="icon-calendar"></i>
                  <span>{{ ago($job->created_at) }}</span>
                </div>
              </div> <!-- end panel-body -->
            </div> <!-- end panel panel-default -->
          </div> <!-- end row -->
        </div> <!-- end col-md-12 -->
        @endforeach
      </div>
      <div class="col-md-3">
        <div class="price-table ">
          <div class="price-table-header">
            <div class="price-label">
              <div class="price-label-name">
                Job Categories:
              </div>
            </div>
          </div>

          <div class="price-table-rows">
            @if(count($categories) > 0)
            @foreach($categories as $category)            
            <div class="price-table-row">
              <a href="{{ URL::to('joblist/'.$category->id) }}">
                {{ $category->category }}
              </a>
            </div>
            @endforeach
            @endif
          </div>    
        </div>
      </div>
      @endif
      <!-- END OF NORMAL JOBLIST -->

      <!-- EMPLOYER JOBLIST -->
      @if(isset($jobs3) && count($jobs3) > 0)
      <div class="col-md-9">
        @foreach($jobs3 as $job)
        <div class="col-md-12">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-md-3">
                  <img src="{{ URL::asset($job->employer()->first()->photo) }}" style="width:100px; height:100px; ">
                </div>

                <div class="col-md-6">
                  <h2 class="panel-title"><a href="{{ URL::to('job/'.$job->id) }}"><u> {{ $job->job_title }} </u></a></h2>

                  <span style="font-size:13px;"> <b>{{ $job->location }}</b></span> <br>
                  <span style="font-size:12px;"><b> Basic pay: </b>{{ getSalary($job->job_title) }}</span> <br>
                  <span><i> {{ Str::limit($job->description, 90) }} <a href="{{ URL::to('job/'.$job->id) }}"> </i>(Read More) </a></span> <br>
                </div>

                <div class="col-md-3">
                  <i class="icon-calendar"></i>
                  <span>{{ ago($job->created_at) }}</span>
                </div>
              </div> <!-- end of panel-body -->
            </div> <!-- end of panel panel-default -->
          </div> <!-- end of row -->
        </div> <!-- end of col-md-12 -->
        @endforeach
      </div>

      <div class="col-md-3">
        <div class="price-table ">
          <div class="price-table-header">
            <div class="price-label">
              <div class="price-label-name">
                Employers:
              </div>
            </div>
          </div>

          <div class="price-table-rows">
            @if(count($employers) > 0)
            @foreach($employers as $employer)            
            <div class="price-table-row">
              <a href="{{ URL::to('joblist/employer/'.$employer->id) }}">
                {{ $employer->businessname }}
              </a>
            </div>
            @endforeach
            @endif
          </div>    
        </div>
      </div>

      @elseif(isset($jobs3))
      <div class="col-md-9">
        <div class="col-md-12">
          <center>
            <h3>{{ $employer->businessname }}</h3> <br> <br>
            <h5> No job openings fall under this employer. Please try again some time. </h5>  
          </center>
        </div>
      </div>

      <div class="col-md-3">
        <div class="price-table ">
          <div class="price-table-header">
            <div class="price-label">
              <div class="price-label-name">
                Employers:
              </div>
            </div>
          </div>

          <div class="price-table-rows">
            @if(count($employers) > 0)
            @foreach($employers as $employer)            
            <div class="price-table-row">
              <a href="{{ URL::to('joblist/employer/'.$employer->id) }}">
                {{ $employer->businessname }}
              </a>
            </div>
            @endforeach
            @endif
          </div>    
        </div>
      </div>
      @endif
      <!-- END OF EMPLOYER JOBLIST -->
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
