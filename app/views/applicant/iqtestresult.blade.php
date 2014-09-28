@extends('applicant.layouts.default')

@section('title')
<title>IQ Test Result | Universal Agency</title>
@stop

@section('description')
<meta name="description" content="Universal Agency IQ Test">
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-info">
                    <h1 class="h1-page-title">IQ Test</h1>
                    <!-- BreadCrumb -->
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="active"> We've already calculated your IQ score</li>
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

        @if(Session::has('reminder'))
            <div class="alert alert-warning">
                <div class="msg">
                    <i class="fa fa-info-circle"></i> {{ Session::get('reminder') }} <a href="{{ URL::to('joblist') }}" style="color:blue;">click here.</a>
                </div>
            </div>
          @endif
          
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ URL::asset('images/albert.jpg') }}" class="img-circle" style="width:200px;height:200px;">
                </div>
                <div class="col-md-9">
                    <h4>
                        Your IQ score is <strong style="font-size:50px">{{ $iq }} </strong> <br><br>
                        <div class="col-md-12 bg-success"><br>
                            A person whose IQ score is {{ $iq }} is considered to have
                            <strong style="font-size:20px;"> {{ $iqresult }} </strong><br><br>
                        </div>
                    </h4> <br> <br>
                </div>
            </div>
            <div class="space-sep40"></div>
            <div class="row">
                <h5>
                    <strong>Note:</strong>
                    This number is based on a scientific formula that compares how many questions you have answered correctly on our IQ Test.
                </h5>                    
            </div>
            <div class="row">
                <div class="col-md-2"><label>Share your IQ score: </label></div>
                <div class="col-md-10">
                   <div class="social-icons">
                    <ul>
                       <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('iqtestresult/'.$hash) }}" 
                            title="Share on Facebook" class="share facebook social-media-icon facebook-icon">facebook</a>
                        </li>
                        <li>
                            <a href="https://twitter.com/intent/tweet?url={{ URL::to('iqtestresult/'.$hash) }}" 
                            title="Share on Twitter" class="share twitter social-media-icon twitter-icon">twitter</a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/share?url={{ URL::to('iqtestresult/'.$hash) }}" 
                            title="Share on Googleplus" class="share google social-media-icon googleplus-icon">googleplus</a>
                        </li>
                    </ul>
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
{{ HTML::script('js/bootstrap-datepicker.js') }}
{{ HTML::script('js/validateresumeform.js') }}
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
