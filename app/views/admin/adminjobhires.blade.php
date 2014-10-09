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
		<li>Admin</li><li>Job Hires</li>
	</ol>
	<!-- end breadcrumb -->

</div>
@stop

@section('maincontent')
{{ Form::open(['id' => 'approvalform']) }}
{{ Form::close() }}


<!-- MAIN CONTENT -->
<div id="content">
	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			<div class="alert alert-success" id="jobcategoryupdated" style="display: none"></div>

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>List of Job Hires</h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox"></div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body no-padding">

							<div class="dt-toolbar"></div>

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Applicant Status</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="requestedtable">
									@if(count($recruitcontracts) > 0)
									@foreach($recruitcontracts as $recruitcontract)
									<tr id="{{ $recruitcontract->id }}">
										<td><a href="{{ URL::to('applicant/'.getEmployeeByRecruitContract($recruitcontract->employee_id)->id) }}" target="_blank">{{ getEmployeeByRecruitContract($recruitcontract->employee_id)->first_name.' '.getEmployeeByRecruitContract($recruitcontract->employee_id)->last_name }}</a></td>
										<td>{{ getEmployeeByRecruitContract($recruitcontract->employee_id)->status }}</td>
										<td>{{ datedifference($recruitcontract->created_at) }}</td>
										<td><a href="{{ URL::to('../../admindeleteemployeecontract/'.$recruitcontract->id) }}" class="btn btn-danger">Remove Employee</a></td>
									</tr>
									@endforeach
									@endif


								</tbody>
							</table>

						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->


				</div>

			</div>
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->
	<!-- end row -->
</section>
<!-- end widget grid -->

</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN PANEL -->	
@stop

@section('additional_scripts')

<!-- PAGE RELATED PLUGIN(S) -->
{{ HTML::script('js/plugin/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('js/plugin/datatables/dataTables.colVis.min.js') }}
{{ HTML::script('js/plugin/datatables/dataTables.tableTools.min.js') }}
{{ HTML::script('js/plugin/datatables/dataTables.bootstrap.min.js') }}

{{ HTML::script('js/plugin/x-editable/moment.min.js')}}
{{ HTML::script('js/plugin/x-editable/jquery.mockjax.min.js')}}

{{ HTML::script('js/plugin/x-editable/x-editable.min.js')}}



<script type="text/javascript">		
	$(document).ready(function() {
		pageSetUp();

		var otable = $('#dt_basic').DataTable({

			"sDom": "<'dt-toolbar'<'col-xs-6'<'toolbar'>l><'col-xs-6'f>>"

		});

		// $("div.toolbar").html('<div class="ColVis"><button data-toggle="modal" data-target="#addjobcategorymodal" class="ColVis_Button ColVis_MasterButton"><i class="fa fa-plus"></i>&nbsp;Add Job Category</button></div>');


		/* END TABLETOOLS */

		$('.statusapproval').click(function(){

			var _token = $('#approvalform > input[name="_token"]').val();
			var jobid = $(this).attr('data-jobid');
			var applicantid = $(this).attr('data-applicantid');
			var obj = $(this);
			$.SmartMessageBox({

				title : "Approval",
				content : "Approve or Disapprove an applicant, please take your actions carefully, this cannot be undone.",
				buttons : "[Approve][Disapprove][Cancel]"

			}, function(ButtonPress, Value) {

				if (ButtonPress == "Approve")
				{
					approverequest( _token, jobid, applicantid, obj );
				} else if(ButtonPress == 'Disapprove') {
					disapproverequest(_token, jobid, applicantid, obj );
				} else
				{
					return 0;
				}
				
			});
		});

		$('#tabs').tabs();

	})

</script>
@stop