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
		<li>Admin</li><li>View Job Requests</li>
	</ol>
	<!-- end breadcrumb -->
</div>
@stop

@section('maincontent')

{{ Form::open(['id' => 'jobinvitationsform']) }}
{{ Form::close() }}

<!-- MAIN CONTENT -->
<div id="content">
	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			<div class="alert alert-success" id="applicantupdates" style="display: none"></div>

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>List of Jobs</h2>
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

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th>ID</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Job Title</th>
										<th><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Applicants </th>
										<!-- <th colspan="2"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> Action</th> -->
									</tr>
								</thead>
								<tbody>								
									@foreach($candidates as $candidate)
									<tr data-jobid="{{ $candidate->job_id }}">
										<td>{{ $candidate->id }}</td>
										<td>	<a href="{{ URL::to('job/'.$candidate->job()->first()->id ) }}" target="_blank"> {{ $candidate->job()->first()->job_title }} </a> </td>
										<td><span data-toggle="modal" data-target="#listcandidate" onclick="listcandidates($(this))" class="badge pull-right inbox-badge bg-color-blue" style="padding:12px;cursor:hand"> {{ countcandidate($candidate->job_id).' applicant/s invited for this job' }}</span></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- end widget content -->
					</div>
					<!-- end widget div -->
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

@section('modals')

<!-- List Candidates Modal -->
<div class="modal fade" id="listcandidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel1">List of Possible Candidates</h4>
			</div>
			<div class="modal-body" style="height:550px;overflow:auto;">
				<table class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<tr>
							<th><i class="fa fa-fw fa-key text-muted hidden-md hidden-sm hidden-xs"></i> Applicant Name</th>
							<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Request Timeline </th>
							<th colspan="2"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs" ></i> Status </th>
						</tr>
					</thead>
					<tbody id="candidatestable"></tbody>
				</table>
			</div>
		</div>
	</div>
</div><!-- /.modal -->

@stop

@section('additional_scripts')
<!-- PAGE RELATED PLUGIN(S) -->
<script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">		
	$(document).ready(function() {
		pageSetUp();

		$('#dt_basic').dataTable();
		
		/* END TABLETOOLS */
	});

</script>
@stop