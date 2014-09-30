@extends('admin.layouts.default')

@section('ribbon')
<!-- RIBBON -->
<div id="ribbon">

	<span class="ribbon-button-alignment"> 
		<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
			<i class="fa fa-refresh"></i>
		</span> 
	</span>

	<!-- breadcrumb -->
	<ol class="breadcrumb">
		<li>Admin</li><li>Employer Contracts</li>
	</ol>
	<!-- end breadcrumb -->

</div>
@stop

@section('maincontent')
<!-- MAIN CONTENT -->
<div id="content">
	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			<div class="alert alert-success" id="employercontractupdates" style="display: none"></div>

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>List of Employer Contracts</h2>
					</header>
					<!-- widget div-->
					<div>
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding">
							<div class="dt-toolbar">
							</div>
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th><i class="fa fa-fw fa-key text-muted hidden-md hidden-sm hidden-xs"></i> ID</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Contract Title</th>
										<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Salary </th>
										<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Cut-off Period </th>
										<th><i class="fa fa-fw fa-edit text-muted hidden-md hidden-sm hidden-xs"></i> Job Title </th>
										<th><i class="fa fa-fw fa-edit text-muted hidden-md hidden-sm hidden-xs"></i> Number of Employees </th>
										<th><i class="fa fa-fw fa-edit text-muted hidden-md hidden-sm hidden-xs"></i> Employer </th>
										<th><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i>
											/<i class="fa fa-fw fa-times text-muted hidden-md hidden-sm hidden-xs"></i> Enable/Disable </th>
										</tr>
									</thead>
									<tbody id="employercontracttable">
									@if(count($contracts) > 0)
										@foreach($contracts as $contract)
										<tr id="{{ $contract->id }}">
											<td>{{ $contract->id }}</td>
											<td>{{ $contract->contract_title }}</td>
											<td>{{ $contract->salary }}</td>
											<td>{{ $contract->cut_off_period }}</td>
											<td>{{ $contract->job }}</td>
											<td>{{ $contract->num_of_employees }}</td>
											<td>{{ getEmployerName($contract->employer) }}</td>
											<td><a href="#" class="btn btn-danger btn-circle" onclick="disablecontract($(this))"><i class="fa fa-times"></i></a></td>
										</tr>
										@endforeach
									@endif
									</tbody>
								</table>
							</div> <!-- end widget content -->
						</div> <!-- end widget div -->
					</div> <!-- end widget -->
				</article> <!-- WIDGET END -->
			</div> <!-- end row -->
		</section> <!-- end widget grid -->
	</div> <!-- END MAIN CONTENT -->
</div> <!-- END MAIN PANEL -->
@stop

@section('modals')
<!-- Add Modal -->
<div class="modal fade" id="addemployercontractmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel1">Set Contract Form</h4>
			</div>
			<div class="modal-body">

				<div class="widget-body no-padding">
					{{ Form::open(['id' => 'contract_form', 'class' => 'smart-form']) }}
					<header>
						Contract Information
					</header>

					<fieldset>
						<div class="row">

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
					</div>

					<div class="modal-footer" id="addemployercontractfooter">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Cancel
						</button>
						<button id="addemployercontractsubmit" type="submit" class="btn btn-primary">
							Save
						</button>
					</div>
					{{ Form::close() }}
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
	@stop

@section('additional_scripts')

{{ HTML::script('js/plugin/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('js/plugin/datatables/dataTables.colVis.min.js') }}
{{ HTML::script('js/plugin/datatables/dataTables.tableTools.min.js') }}
{{ HTML::script('js/plugin/datatables/dataTables.bootstrap.min.js') }}

	<script type="text/javascript">		
		$(document).ready(function() {
			pageSetUp();

			var otable = $('#dt_basic').DataTable({

				"sDom": "<'dt-toolbar'<'col-xs-6'<'toolbar'>l><'col-xs-6'f>>"

			});

			$("div.toolbar").html('<div class="ColVis"><button data-toggle="modal" data-target="#addemployercontractmodal" class="ColVis_Button ColVis_MasterButton"><i class="fa fa-plus"></i>&nbsp;Add Employer Contract</button></div>');
		})

	</script>
@stop