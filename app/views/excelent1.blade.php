@extends('applicant.layouts.defaultexcel')

@section('toptitlebar')
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-info">
                    <h1 class="h1-page-title" id="scrollpointtitle"> Payroll Summary for the month of October</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('body')
</p>CSC Form 48</p>
</p>ME RECORD</p>
<br/>
</p>_________________</p>
</p>NAME</p>
<br/>
</p>For the month of ________________</p>
</p>official hours for arrival (Regular) days and</p>
</p>departure (Saturdays) </p>

<table class="table table-responsive" border="1">

	<th colspan="3"> AM </th>
	<th colspan="2"> PM </th>
	<th colspan="2"> UNDERTIME </th>
	<th colspan="2"> OVERTIME </th>
	@foreach($table as $row)
	<tr>
		@foreach($row as $column)
		<td>{{$column}}</td>
		@endforeach
	</tr>	
	@endforeach

</table>
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