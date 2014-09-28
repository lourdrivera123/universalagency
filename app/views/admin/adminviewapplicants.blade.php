@extends('admin.layouts.default')

@section('ribbon')
<!-- RIBBON -->
<div id="ribbon">
	
	<a href="">
		<span class="ribbon-button-alignment"> 
			<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
				<i class="fa fa-refresh"></i>
			</span> 
		</span>
	</a>

	<!-- breadcrumb -->
	<ol class="breadcrumb">
		<li>Admin</li><li>View Applicants</li>
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
			<div class="alert alert-success" id="applicantupdates" style="display: none"></div>

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>List of Applicants</h2>
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
										<th>Name</th>
										<th style="display:none">Title </th>
										<th>Job Category</th>
										<th>Gender</th>
										<th>Age</th>
										<th>Email</th>
										<th>Phone number</th>
										<th>Address</th>
										<th><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i>
											/<i class="fa fa-fw fa-times text-muted hidden-md hidden-sm hidden-xs"></i> Enable/Disable 
										</th>
										<th>Status</th>
									</tr>
									</thead>
									<tbody>
										@if(count($resumes) > 0)
										@foreach($resumes as $resume)
										<tr>
											<td>  {{ $resume->id }}</td>
											<td><a href="{{ URL::to('applicant/'.$resume->id ) }}" target="_blank"> {{ $resume->last_name }}, {{ $resume->first_name }} </a> </td>
											<td style="display:none">{{ (!is_null($resume->titleofexpertise)) ? Str::limit($resume->titleofexpertise, 40) : '' }}</td>
											<td>{{ (($resume->position_desired != 0)) ? Str::title(getPosition($resume->position_desired)) : '' }}</td>
											<td>{{ (!is_null($resume->gender)) ? Str::title($resume->gender) : '' }}</td>
											<td>{{ (($resume->birth_date != 000-00-00)) ? calculateAge($resume->birth_date) : '' }}</td>
											<td>{{ (!is_null($resume->user()->first()->email)) ? $resume->user()->first()->email : '' }}</td>
											<td>{{ (!is_null($resume->phone_number)) ? $resume->phone_number : '' }}</td>
											<td>{{ (!is_null($resume->address)) ? Str::limit($resume->address, 20) : '' }}</td>
											@if($resume->user()->withTrashed()->first()->trashed())
											<td><a href="javascript:void(0)" class="btn btn-success btn-circle" onclick="enableapplicant($(this))"><i class="fa fa-check"></i></a></td>
											@else
											<td><a href="javascript:void(0)" class="btn btn-danger btn-circle" onclick="disableapplicant($(this))"><i class="fa fa-times"></i></a></td>
											<td>{{ $resume->status }}</td>
											@endif
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
	@stop

	@section('additional_scripts')
	{{ HTML::script('js/plugin/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('js/plugin/datatables/dataTables.colVis.min.js') }}
	{{ HTML::script('js/plugin/datatables/dataTables.tableTools.min.js') }}
	{{ HTML::script('js/plugin/datatables/dataTables.bootstrap.min.js') }}

	<script type="text/javascript">		
		$(document).ready(function() {
			pageSetUp();

			$('#dt_basic').dataTable();
			
			/* END TABLETOOLS */
		});

	</script>
	@stop