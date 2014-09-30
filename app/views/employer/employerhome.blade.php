@extends('employer.layouts.default')

@section('title')
<title>Applicant List | Universal Agency</title>
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
      <div class="row">
        <div class="col-md-2">
          <img class="img img-circle" style="width:150px; height:150px;" 
          src="{{ URL::asset(Auth::user()->employer()->first()->photo) }}"> <br><br>

          <ul class="nav nav-pills nav-stacked">
            <li class="active">
              <a href="#tab_employees" role="tab" data-toggle="tab">Employees</a>
            </li>
          </ul>
        </div>
        <div class="col-md-10">
          <div class="tab-content">
            <div class="tab-pane active" id="tab_profile">
              @foreach($recruitcontracts as $recruitcontract)
              <h5> 
                {{ getJobTitle($recruitcontract->job_id)->job_title }} 
                (Basic pay: {{ $recruitcontract->basic_pay }})
              </h5>
              <br>

              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="col-md-2">
                    <img src="{{ URL::asset(getEmployeePhoto($recruitcontract->employee_id)) }}" style="width:100px; height:100px; ">
                  </div>

                  <div class="col-md-8">
                    <h5 class="panel-title">
                      <a href="{{ URL::to('applicant/'.$recruitcontract->employee_id) }}">
                        {{ getCompleteName($recruitcontract->employee_id) }}
                      </a><br>
                        <p>
                          {{ getEmail($recruitcontract->employee_id) }}<br>
                          {{ getAddress($recruitcontract->employee_id) }}<br/>
                          Contract: {{ formatdatestring($recruitcontract->starting_date).' - '.formatdatestring($recruitcontract->closing_date) }}
                        </p>
                    </h5>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
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