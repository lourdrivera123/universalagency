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
		<li>Admin</li><li>Job Candidates</li>
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
						<h2>List of Job Candidates</h2>
					</header>


					<div class="well well-sm well-light">

						<div id="tabs">
							<ul>
								<li>
									<a href="#tabs-a">Requested</a>
								</li>
								<li>
									<a href="#tabs-b">Invited</a>
								</li>
								<li>
									<a href="#tabs-c">Under Initial Screening</a>
								</li>
								<li>
									<a href="#tabs-d">Under Interview</a>
								</li>
								<li>
									<a href="#tabs-e">Under Review</a>
								</li>
							</ul>




							<div id="tabs-a">

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
													<th>Request Status</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody id="requestedtable">
												@if(count($jobrequests) > 0)
												@foreach($jobrequests as $jobrequest)
												<tr id="{{ $jobrequest->id }}">
													<td><a href="{{ URL::to('applicant/'.$jobrequest->user->resume()->first()->id) }}" target="_blank">{{ $jobrequest->user->resume()->first()->first_name.' '.$jobrequest->user->resume()->first()->last_name }}</a></td>
													<td>{{ $jobrequest->user->resume()->first()->status }}</td>
													
													@if( $jobrequest->request_status == 'requesting for application approval' )
													<td><a href="javascript:void(0);" class="statusapproval" rel="popover-hover" data-jobid="{{ $jobrequest->job_id }}" data-applicantid="{{ $jobrequest->user_id }}" data-placement="top" data-original-title="Applicant Requested for the job" data-content="Please review the applicant profile and check if he/she matches the qualifications required for this job."><strong>{{ $jobrequest->request_status }}</strong></a></td>
													@elseif($jobrequest->request_status == 'initial screening')
													<td><a href="javascript:void(0);" class="initialscreeningapproval" rel="popover-hover" data-jobid="{{ $jobrequest->job_id }}" data-applicantid="{{ $jobrequest->user_id }}" data-placement="top" data-original-title="Applicant is under initial screening" data-content="Please review the applicant's test results and requirements by clicking his/her name."><strong>{{ $jobrequest->request_status }}</strong></a></td>
													@endif

													<td>{{ datedifference($jobrequest->created_at) }}</td>
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




							<div id="tabs-b">
								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox"></div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body no-padding">

										<div class="dt-toolbar"></div>

										<table id="dt_basic1" class="table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th>Name</th>
													<th>Applicant Status</th>
													<th>Request Status</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody id="invitationstable">
												@if(count($invitations) > 0)
												@foreach($invitations as $invitation)
												<tr id="{{ $invitation->id }}">
													<td><a href="{{ URL::to('applicant/'.$invitation->user->resume()->first()->id) }}" target="_blank">{{ $invitation->user->resume()->first()->first_name.' '.$invitation->user->resume()->first()->last_name }}</a></td>
													<td>{{ $invitation->user->resume()->first()->status }}</td>
													<td>{{ $invitation->request_status }}</td> <!-- Status like pending, initial screening, interviewed -->
													<td>{{ datedifference($invitation->created_at) }}</td>
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



							<div id="tabs-c">
								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox"></div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body no-padding">

										<div class="dt-toolbar"></div>

										<table id="dt_basic2" class="table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th>Name</th>
													<th>Applicant Status</th>
													<th>Request Status</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody id="candidatetable">
												@if(count($candidates) > 0)
												@foreach($candidates as $candidate)
												<tr id="{{ $candidate->id }}">
													<td><a href="{{ URL::to('applicant/'.$candidate->user->resume()->first()->id) }}" target="_blank">{{ $candidate->user->resume()->first()->first_name.' '.$candidate->user->resume()->first()->last_name }}</a></td>
													<td><a href="javascript:void(0);" class="invitationstatus" rel="popover-hover" data-jobid="{{ $candidate->job_id }}" data-applicantid="{{ $candidate->user_id }}" data-placement="top" data-original-title="Applicant Requested for the job" data-content="Please review the applicant profile and check if he/she matches the qualifications required for this job."><strong>{{ $candidate->user()->first()->resume()->first()->status }}</strong></a></td>
													<td>{{ $candidate->status }}</td> <!-- Status like pending, initial screening, interviewed -->
													<td>{{ formatdatestring($candidate->created_at) }}</td>
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




							<div id="tabs-d">
									<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox"></div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body no-padding">

										<div class="dt-toolbar"></div>

										<table id="dt_basic3" class="table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th>Name</th>
													<th>Applicant Status</th>
													<th>Request Status</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody id="underreviewtable">
												@if(count($underinterviews) > 0)
												@foreach($underinterviews as $underinterview)
												<tr id="{{ $underinterview->id }}">
													<td><a href="{{ URL::to('applicant/'.$underinterview->user->resume()->first()->id) }}" target="_blank">{{ $underinterview->user->resume()->first()->first_name.' '.$underinterview->user->resume()->first()->last_name }}</a></td>
													<td><a href="javascript:void(0);" class="interviewstatus" rel="popover-hover" data-jobid="{{ $underinterview->job_id }}" data-applicantid="{{ $underinterview->user_id }}" data-placement="top" data-original-title="Applicant Requested for the job" data-content="Please review the applicant profile and check if he/she matches the qualifications required for this job."><strong>{{ $underinterview->user()->first()->resume()->first()->status }}</strong></a></td>
													<td>{{ $underinterview->status }}</td> <!-- Status like pending, initial screening, interviewed -->
													<td>{{ formatdatestring($underinterview->created_at) }}</td>
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


							<div id="tabs-e">
									<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox"></div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body no-padding">

										<div class="dt-toolbar"></div>

										<table id="dt_basic4" class="table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th>Name</th>
													<th>Applicant Status</th>
													<th>Review Evaluation</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody id="underreviewtable">
												@if(count($underreviews) > 0)
												@foreach($underreviews as $underreview)
												<tr id="{{ $underreview->id }}">
													<td><a href="{{ URL::to('applicant/'.$underreview->user->resume()->first()->id) }}" target="_blank">{{ $underreview->user->resume()->first()->first_name.' '.$underreview->user->resume()->first()->last_name }}</a></td>
													<td><a href="javascript:void(0);" class="reviewstatus" rel="popover-hover" data-jobid="{{ $underreview->job_id }}" data-applicantid="{{ $underreview->user_id }}" data-placement="top" data-original-title="Applicant Requested for the job" data-content="Please review the applicant profile and check if he/she matches the qualifications required for this job."><strong>{{ $underreview->user()->first()->resume()->first()->status }}</strong></a></td>
													<td><a href="{{ URL::to('adminapplicantevaluation/'.$underreview->id) }}" target="_blank"><button class="btn btn-primary btn-circle"><i class="fa fa-file-text-o"></i></button></a></td> <!-- Status like pending, initial screening, interviewed -->
													<td>{{ formatdatestring($underreview->created_at) }}</td>
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

		var otable1 = $('#dt_basic1').DataTable({

			"sDom": "<'dt-toolbar'<'col-xs-6'<'toolbar'>l><'col-xs-6'f>>"

		});

		var otable2 = $('#dt_basic2').DataTable({

			"sDom": "<'dt-toolbar'<'col-xs-6'<'toolbar'>l><'col-xs-6'f>>"

		});

		var otable3 = $('#dt_basic3').DataTable({

			"sDom": "<'dt-toolbar'<'col-xs-6'<'toolbar'>l><'col-xs-6'f>>"

		});

		var otable4 = $('#dt_basic4').DataTable({

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