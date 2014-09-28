@extends('applicant.layouts.default')

@section('title')
<title>Sample | Universal Agency</title>
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
						
					</h1>
					<!-- BreadCrumb -->
					<div class="breadcrumb-container">
						<ol class="breadcrumb">
							<li class="active">
								
							</li>
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
			<?php 
			$salary = 8000;
			$dependent = 0;
			$pagibig = 100.00; 
			$taxpayer = 50000;
			$taxable_amt = 0;

			$sss = Sss::where('min_compensation', '<=', $salary)->where('max_compensation', '>=', $salary)->first();
			$phic = Phic::where('salary', '<=', $salary)->where('not_over', '>=', $salary)->first();
			$total = $sss->ee + $phic->es + $pagibig;

			$annual_income = 12 * $salary;
			$annual_deductions = 12 * $total;
			$annual_exemptions = $taxpayer + $annual_deductions + ($dependent * 25000);

			if ($annual_income <= $annual_exemptions) {
				$taxable_amt = 0;
			}
			else {
				$taxable_amt = $annual_income - $annual_exemptions;
			}

			if($taxable_amt < 10000) {
				$bracket = "A";
				$tax = 0.5 * $taxable_amt / 12;
			}
			elseif($taxable_amt < 30000) {
				$bracket = "B";
				$tax = 500 / 12 + 0.1 * $taxable_amt / 12 - 0.1 * 10000 / 12;
			}	
			elseif($taxable_amt < 70000) {
				$bracket = "C";
				$tax = 2500 / 12 + 0.15 * $taxable_amt / 12 - 0.15 * 30000 / 12;
			}
			elseif($taxable_amt < 140000) {
				$bracket = "D";
				$tax = 8500 / 12 + 0.2 * $taxable_amt / 12 - 0.2 * 70000/12;
			}
			elseif($taxable_amt < 250000) {
				$bracket = "E";
				$tax = 22500 / 12 + 0.25 * $taxable_amt / 12 - 0.25 * 140000 / 12;
			}
			elseif($taxable_amt < 500000) {
				$bracket = "F";
				$tax = 50000 / 12 + 0.3 * $taxable_amt / 12 - 0.3 * 250000 / 12;
			}
			else {
				$bracket = "G";
				$tax = 125000 / 12 + 0.32 * $taxable_amt / 12 - 0.32 * 500000 / 12;
			}

			$netpay = $salary - $total - $tax;
			?>
			{{ Form::open() }}			
			<div class="col-md-12">
				<div class="title-block clearfix">
					<h3 class="h3-body-title">Income</h3>
					<div class="title-seperator"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">Period:</label>
					<div class="col-md-3">
						{{ Form::select('period', ['monthly' => 'Monthly', 'semi_monthly' => 'Semi-monthly'], null, ['id' => 'period', 'placeholder' => 'Period', 'class' => 'form-control'])}}	
					</div>
				</div>
			</div> 

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;"># of Working Days:</label>
					<div class="col-md-3">
						{{ Form::text('working_days', null, ['id' => 'working_days', 'placeholder' => '# of working days', 'class' => 'form-control']) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">Basic Pay:</label>
					<div class="col-md-3">
						{{ Form::text('basic_pay', null, ['id' => 'basic_pay', 'placeholder' => '00.00', 'class' => 'form-control']) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">Gross Income:</label>
					<div class="col-md-3">
						{{ Form::text('gross_income', null, ['id' => 'gross_income', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly']) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="title-block clearfix">
					<h3 class="h3-body-title">OT Hrs./Day</h3>
					<div class="title-seperator"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">Loan/Cash Advance:</label>
					<div class="col-md-3">
						{{ Form::text('cash_advance', null, ['id' => 'cash_advance', 'placeholder' => '00.00', 'class' => 'form-control' ]) }}	
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">OT pay (hours):</label>
					<div class="col-md-3">
						{{ Form::text('ot_hours', null, ['id' => 'ot_hours', 'placeholder' => 'Overtime hours', 'class' => 'form-control' ]) }}	
					</div>
					<label class="col-sm-2 control-label" style="font-size:13px;">Regular OT:</label>
					<div class="col-md-3">
						{{ Form::text('ot_pay', null, ['id' => 'ot_pay', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly' ]) }}	
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">Holiday pay (hours):</label>
					<div class="col-md-3">
						{{ Form::text('hol_hours', null, ['id' => 'hol_hours', 'placeholder' => '', 'class' => 'form-control' ]) }}	
					</div>
					<label class="col-sm-2 control-label" style="font-size:13px;">Holiday Pay:</label>
					<div class="col-md-3">
						{{ Form::text('hol_pay', null, ['id' => 'hol_pay', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly' ]) }}	
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">COLA:</label>
					<div class="col-md-3">
						{{ Form::text('cola', null, ['id' => 'cola', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly' ]) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="title-block clearfix">
					<h3 class="h3-body-title">Statutory Deductions</h3>
					<div class="title-seperator"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">SSS:</label>
					<div class="col-md-3">
						{{ Form::text('sss', $sss->ee, ['id' => 'sss', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly' ]) }}	
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">PHIC:</label>
					<div class="col-md-3">
						{{ Form::text('philhealth', $phic->es, ['id' => 'philhealth', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly' ]) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">HMDF:</label>
					<div class="col-md-3">
						{{ Form::text('pagibig', $pagibig, ['id' => 'pagibig', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly' ]) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="title-block clearfix">
					<h3 class="h3-body-title">Tax Computation</h3>
					<div class="title-seperator"></div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">No. of Dependents:</label>
					<div class="col-md-3">
						{{ Form::text('dependents', null, ['id' => 'dependents', 'placeholder' => 'maximum of 4', 'class' => 'form-control']) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">Taxable Income:</label>
					<div class="col-md-3">
						{{ Form::text('taxable_income', $taxable_amt, ['id' => 'taxable_income', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly']) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:13px;">Withholding Tax:</label>
					<div class="col-md-3">
						{{ Form::text('tax', $tax, ['id' => 'tax', 'placeholder' => '00.00', 'class' => 'form-control', 'readonly']) }}
					</div>
				</div>
			</div>

			<div class="space-sep20"></div>
			<div class="col-md-12">
				<center><p class="bg-success" style="font-size:17px;">
					<b> NET INCOME: </b> {{ $netpay }}
				</p></center>
			</div>
			
			{{ Form::close() }}
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
@stop
