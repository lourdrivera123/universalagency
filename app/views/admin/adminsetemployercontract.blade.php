@extends('admin.layouts.default')

@section('ribbon')
<!-- RIBBON -->
<div id="ribbon">

	<span class="ribbon-button-alignment"> 
		<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
			<i class="fa fa-refresh"></i>
		</span> 
	</span>

	<ol class="breadcrumb">
		<li>Admin</li><li>Set Contract</li>
	</ol>
</div>
@stop

@section('maincontent')
<div id="content">
	<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
		<header>
			<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
			<h2>Set Contract Form</h2>				

		</header>

		<div>
			<div class="jarviswidget-editbox">
				<!-- This area used as dropdown edit box -->	
			</div>

			<div class="widget-body no-padding">
				{{ Form::open(['id' => 'contract_form', 'class' => 'smart-form']) }}
				<header>
					Contract Information
				</header>

				<fieldset>
					<div class="row">
						<section class="col col-6">
							<label for="contract_title" class="label">Contract Title</label>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								<input type="text" name="contract_title" placeholder="Contract Title">
							</label>
						</section>

						<section class="col col-6">
							<label for="salary" class="label">Salary</label>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								<input type="text" name="salary" placeholder="Salary">
							</label>
						</section>
					</div>
				</fieldset>

				<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="label" for="cut_off_period">Cut Off Period</label>
							<label class="select">
								<select name="cut_off_period">
									<option value="semi_monthly">Semi-monthly</option>
									<option value="monthly">Monthly</option>
									<option value="weekly">Weekly</option>
									<option value="daily">Daily</option>
									<option value="consultation">Consultation</option>
								</select> <i></i> </label>
							</section>

							<section class="col col-6">
								<label class="label" for="job">Job Title</label>
								<label class="input"> <i class="icon-append fa fa-briefcase"></i>
									<input type="text" name="job" placeholder="Job Title">
								</label>
							</section>

							<section class="col col-6">
								<label class="label" for="employer">Number of Employees</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="number" name="num_of_employees" placeholder="Number of employees"/>
								</label>
							</section>

							<section class="col col-6">
								<label class="label" for="employer">Employer</label>
								<label class="input"> 
									{{ Form::select('employer', $employers, null, ['class' => 'form-control']) }}
								</label>
							</section>
						</div>
					</fieldset>

					<fieldset>
						<div class="row">
							<section class="col col-md-12 col-xs-12 col-lg-12">
								<label class="label" for="others">Specific Terms and Regulations</label>
								<label class="textarea"> <i class="icon-append fa fa-user"></i>
									<textarea name="others" placeholder="Specified Terms and Regulations" rows="15" class="form-control"></textarea>
								</label>
							</section>
						</div>
					</fieldset>

					<footer>
						<button type="submit" class="btn btn-primary">
							Submit
						</button>
					</footer>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>	
	@stop

	@section('additional_scripts')

	<!-- PAGE RELATED PLUGIN(S) -->
	{{ HTML::script('js/plugin/jquery-validate/jquery.validate.min.js') }}
	{{ HTML::script('js/plugin/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('js/plugin/datatables/dataTables.colVis.min.js') }}
	{{ HTML::script('js/plugin/datatables/dataTables.tableTools.min.js') }}
	{{ HTML::script('js/plugin/datatables/dataTables.bootstrap.min.js') }}
	<script type="text/javascript">
					//// START AND FINISH DATE
					$('#start_date').datepicker({
						dateFormat : 'yy-mm-dd',
						prevText : '<i class="fa fa-chevron-left"></i>',
						nextText : '<i class="fa fa-chevron-right"></i>',
						onSelect : function(selectedDate) {
							$('#end_date').datepicker('option', 'minDate', selectedDate);
						}
					});

					$('#end_date').datepicker({
						dateFormat : 'yy-mm-dd',
						prevText : '<i class="fa fa-chevron-left"></i>',
						nextText : '<i class="fa fa-chevron-right"></i>',
						onSelect : function(selectedDate) {
							$('#start_date').datepicker('option', 'maxDate', selectedDate);
						}
					});
					//End of Code
				</script>
				@stop