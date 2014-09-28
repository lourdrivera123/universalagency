@extends('applicant.layouts.default')

@section('title')
<title> FAQ | Universal Agency</title>
@stop

@section('description')
<meta name="description" content="Universal Agency FAQ">
@stop

@section('toptitlebar')
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-info">
                    <h1 class="h1-page-title">F.A.Q.</h1>

                    <h2 class="h2-page-desc">
                        Do you have Any question for us?
                    </h2>

                    <!-- BreadCrumb -->
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::to('loggedin') }}">Home</a>
                            </li>
                            <li class="active">FAQ</li>
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
                    <div class="space-sep10"></div>

            @if(Session::has("flash_message"))
                <div class="alert alert-success">
                    {{ Session::get("flash_message") }}
                </div>
            @endif
                <div class="col-md-12 col-sm-12 animated" data-animtype="flipInY"
                data-animrepeat="0"
                data-speed="1s"
                data-delay="0.5s">
                <h2 class="h2-section-title">We Have The Answers</h2>

                <div class="i-section-title">
                    <i class="icon-lifebuoy">

                    </i>
                </div>

                <div class="space-sep20"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="tab-container"  id="tab-container-1" >
                    <ul class="etabs">
                        <li class="tab">
                            <a href="#tab1"><i class=icon-home-house-streamline></i>The Agency</a>
                        </li>
                        <li class="tab">
                            <a href="#tab2"><i class=icon-users-outline></i>The Applicants</a>
                        </li>
                        <li class="tab">
                            <a href="#tab3"><i class=icon-users></i>The Employers</a>
                        </li>
                        <li class="tab">
                            <a href="#tab4"><i class=icon-world></i>The Website</a>
                        </li>
                    </ul>            

                    <div class="tabs-content">
                        <div id="tab1">
                            <div class="accordion accordion2" data-toggle="on" data-active-index="">
                                <div class="accordion-row">
                                    <div class="title">
                                        <div class="open-icon"></div>
                                        <h4>What is Universal Agency?</h4>
                                    </div>
                                    <div class="desc">
                                       Say something
                                   </div>
                               </div>

                               <div class="accordion-row">
                                <div class="title">
                                    <div class="open-icon"></div>
                                    <h4>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo ?</h4>
                                </div>
                                <div class="desc">Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.</div>
                            </div>
                        </div> 
                    </div>
                    <div id="tab2">
                        <div class="accordion accordion2" data-toggle="on" data-active-index="">
                            <div class="accordion-row">
                                <div class="title">
                                    <div class="open-icon"></div>
                                    <h4>What is Universal Agency?</h4>
                                </div>
                                <div class="desc">
                                   Say something
                               </div>
                           </div>

                           <div class="accordion-row">
                            <div class="title">
                                <div class="open-icon"></div>
                                <h4>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo ?</h4>
                            </div>
                            <div class="desc">Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.</div>
                        </div>
                    </div> 
                </div>
                <div id="tab3">
                    <div class="accordion accordion2" data-toggle="on" data-active-index="">
                        <div class="accordion-row">
                            <div class="title">
                                <div class="open-icon"></div>
                                <h4>What is Universal Agency?</h4>
                            </div>
                            <div class="desc">
                               Say something
                           </div>
                       </div>

                       <div class="accordion-row">
                        <div class="title">
                            <div class="open-icon"></div>
                            <h4>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo ?</h4>
                        </div>
                        <div class="desc">Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.</div>
                    </div>
                </div> 
            </div>
            <!-- START OF QUESTIONS FOR THE AGENCY -->
            <div id="tab4">
                <div class="accordion accordion2" data-toggle="on" data-active-index="">
                    <div class="accordion-row">
                        <div class="title">
                            <div class="open-icon"></div>
                            <h4>How to view or change the details of my account?</h4>
                        </div>
                        <div class="desc">
                           Say something
                       </div>
                   </div>

                   <div class="accordion-row">
                    <div class="title">
                        <div class="open-icon"></div>
                        <h4>I did not receive a confirmation email after registering. What should I do?</h4>
                    </div>
                    <div class="desc">Say something</div>
                </div>

                <div class="accordion-row">
                    <div class="title">
                        <div class="open-icon"></div>
                        <h4>Who can I contact if I am having problems?</h4>
                    </div>
                    <div class="desc">Say something</div>
                </div>

                <div class="accordion-row">
                    <div class="title">
                        <div class="open-icon"></div>
                        <h4>Do you accept applications by e-mail?</h4>
                    </div>
                    <div class="desc">Say something</div>
                </div>
            </div> 
        </div>
        <!-- END OF QUESTIONS FOR THE AGENCY -->
    </div>
</div>               
</div>
</div>
<div class="row">
    <div class="space-sep40"></div>
    <div class="col-md-8 col-sm-8">
        <h3 class="h3-body-title">Could not find the answer?</h3>
        <p> Ask a Question </p>
        {{ Form::open(['action' => 'FaqController@store', 'name' => 'FaqForm', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate']) }}
        <div class="form-group">
            <div class="row">
                <div class="container">
                    <div class="col-xs-7">
                        <label for="name"> Name <span style="color:red; font-weight:bold;"> * </span> </label>
                        {{ Form::text('user_name', null, ['id' => 'user_name', 'placeholder' => 'Your name', 'class' => 'form-control']) }}
                        {{ $errors->first('user_name','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="container">
                    <div class="col-xs-7">
                        <label for="subject"> Choose Subject <span style="color:red; font-weight:bold;"> * </span> </label><br>
                        {{ Form::select('subject', ['agency' => 'The Agency', 'applicant' => 'The Applicants', 'employer' => 'The Employer', 'website' => 'The Website']) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="container">
                    <div class="col-xs-7">
                        <label for="question"> Question <span style="color:red; font-weight:bold;"> * </span> </label>
                        {{ Form::textarea('question', null, ['id' => 'question', 'placeholder' => 'Your Question', 'class' => 'form-control']) }}
                        {{ $errors->first('question','<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" name="btn-ask-question" id="btn-ask-question" class="btn btn-primary">Submit</button>
            </div>
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
@stop