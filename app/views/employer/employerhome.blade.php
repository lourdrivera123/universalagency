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
          <h1 class="h1-page-title">
           Applicant List
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
      <div class="row animated" data-animtype="fadeInUp" data-animrepeat="0"
      data-animdelay="0.4s">
      @if(count($resumes) > 0)
      @foreach($resumes as $resume )
      <div class="col-md-3 col-sm-3">
        <div class="team-member">
          <div class="team-member-image img-overlay">
            <img src="{{ URL::asset($resume->photo) }}" alt="Eric Lorman"/>

            <div class="item-img-overlay">
              <a class="portfolio-zoom fa fa-plus" href="{{ URL::to('applicant/'.$resume->id) }}"
                data-rel="" title="{{ $resume->first_name.' '.$resume->last_name }}"></a>
              </div>

            </div>
          </div>
          <center>
          <div class="team-member-content">
            <h3 class="team-member-name h3-body-title">
            <br/>
              {{ $resume->first_name.' '.$resume->last_name }}
            </h3>

            <div class="team-member-position" style="color:#279FBB">
              {{ $resume->jobcategory()->first()->category }}
            </div>
            <div class="team-member-short-bio">
              {{ $resume->overview }}
            </div>
          </div>
          </center>
        </div>
      </div>
      @endforeach
      @endif

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