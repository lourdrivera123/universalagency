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
                    <h1 class="h1-page-title">Daily Time Record</h1>
                    @endif
                    <!-- BreadCrumb -->
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="active">xxx</li>
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
                <div class="col-md-12 col-sm-12 animated" data-animtype="flipInY"
                data-animrepeat="0"
                data-speed="1s"
                data-delay="0.5s">

                <div class="i-section-title">
                    <i class="icon-users-outline"> </i>
                </div>



                <div class="space-sep20"></div>

            </div>            
        </div>

<table border="0" >
    <tr style="width:100%">
        <td style="width:5%">
            <form class="form-horizontal" role="form">
                <div class="form-group form-group-sm">
                    <label class="col-sm-2 control-label" for="formGroupInputSmall">Name:</label>
        </td>
        <td style="width:30%">
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Name" size="10">
                        </div>
        </td>
        
                    </div>
            </form>           
       
        <td style="width:5%">
            <form class="form-horizontal" role="form">
                <div class="form-group form-group-sm">
                    <label class="col-sm-2 control-label" for="formGroupInputSmall">Position:</label>
        </td>
        <td style="width:25%">
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Position" size="2">
                        </div>
                    </div>
            </form>           
        </td> 
           
            <td style="width:10%">
            <label for="exampleInputEmail1">For the month of</label></td>
        <td style="width:10%">
<form class="form-horizontal" role="form">
            <select class="form-control">
                     <option>January</option>
                     <option>Febuary</option>
                     <option>March</option>
                     <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
</select></form></td>
            </tr>

            </table>

        <div class="row">
            <div class="col-md-9 col-sm-9 centered">
            <div id="thetable"> 
<br><br>

                <table  id="mainTable" class="table table-striped">
              
              <thead><tr><th style="text-align:center">Days</th><th style="text-align:center">Hours worked</th><th style="text-align:center">Overtime</th></tr></thead>
             
              <tbody>
              <tr style="width:100%"><th style="width:5%">1</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">2</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">3</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">4</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">5</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">6</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">7</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">8</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">9</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">10</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">11</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">12</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">13</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">14</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">15</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">16</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">17</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">18</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">19</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">20</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">21</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">22</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">23</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">24</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">25</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">26</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">27</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">28</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">29</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">30</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
              <tr style="width:100%"><th style="width:5%">31</th><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td><td style="width:47.5%" tabindex="1" style="cursor: pointer;"></td></tr>
            
            </tbody>
			<tfoot><tr><th><strong>TOTAL</strong></th><th>1290</th></tr>
          </tfoot>
          </table>
          </div>
          	<button id="try">Trial</button>
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
{{ HTML::script('js/jquery.ouFredSel-6.2.1-packed.js')}}
{{ HTML::script('js/jquery.cycle.js')}}
{{ HTML::script('js/jquery.cycle2.ousel.js')}}
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
{{ HTML::script('js/mindmup-editabletable.js') }}
<script type="text/javascript">
	$('#mainTable').editableTableWidget();
	$('#mainTable').editableTableWidget({editor: $('<textarea>')});
	$('#try').click(function(){
		console.log($('#thetable').html());
	});
</script>
@stop