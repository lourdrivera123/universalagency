@extends('applicant.layouts.defaultexcel')

@section('toptitlebar')
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-info">
                    <h1 class="h1-page-title" id="scrollpointtitle"> Payroll Report for the month of  {{ date('F', strtotime($payroll_report->month)) }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('body')

<table class="table table-responsive" border="1">

<tr>
	<th rowspan="2"> Gross Income </th>
	<th colspan="3"> Statutory Deductions </th>
	<th colspan="2"> Deductions </th>
	<th rowspan="2"> Netpay </th>
</tr>
<tr>
	<th>SSS</th>
	<th>PHIC</th>
	<th>Pag ibig</th>
	<th>C/A</th>
	<th>Loan</th>
</tr>
	@foreach($table as $row)
	<tr>
		@foreach($row as $column)
		<td>{{$column}}</td>
		@endforeach
	</tr>	
	@endforeach

</table>

<div class="alert alert-info">
	<div class="msg">
		<h4>Take Home Pay: {{ $payroll_report->take_home_pay }}</h4>
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
@stop