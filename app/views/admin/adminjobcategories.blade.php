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
		<li>Admin</li><li>Job Categories</li>
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
			<div class="alert alert-success" id="jobcategoryupdated" style="display: none"></div>
		
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>List of Job Categories</h2>
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
															<!-- <a href="#" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#addjobcategorymodal"><i class="fa fa-plus"></i></a> -->

							</div>
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th><i class="fa fa-fw fa-key text-muted hidden-md hidden-sm hidden-xs"></i> ID</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Category</th>
										<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Description </th>
										<th><i class="fa fa-fw fa-edit text-muted hidden-md hidden-sm hidden-xs"></i> Edit </th>
										<th><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i>
										/<i class="fa fa-fw fa-times text-muted hidden-md hidden-sm hidden-xs"></i> Enable/Disable </th>
									</tr>
								</thead>
								<tbody id="jobcategoriestable">
									@foreach($jobcategories as $jobcategory)
									<tr id="{{ $jobcategory->id }}">
										<td>{{ $jobcategory->id }}</td>
										<td>{{ $jobcategory->category }}</td>
										<td><div id="profile-description"><div class="text show-more-height">{{ $jobcategory->description }}</div></div></td>
										<td><a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editjobcategorymodal" onclick="editjobcategory($(this))"><i class="fa fa-edit"></i></a></td>
										@if($jobcategory->trashed())
											<td><a href="#" class="btn btn-success btn-circle" onclick="enablejobcategory($(this))"><i class="fa fa-check"></i></a></td>
										@else
											<td><a href="#" class="btn btn-danger btn-circle" onclick="disablejobcategory($(this))"><i class="fa fa-times"></i></a></td>
										@endif
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

	<!-- Edit Modal -->
	<div class="modal fade" id="editjobcategorymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">Edit Job Category</h4>
				</div>
				<div class="modal-body">

					<div class="row">
					{{ Form::open(['id' => 'editcategoryform']) }}
						{{ Form::hidden('jobcategory_id') }}
						<div class="col-md-12">
							<div class="form-group">
								<input name="category_name" id="category_name" type="text" class="form-control" placeholder="Category Name" required />
							</div>
							<div class="form-group">
								<textarea name="description" id="description" class="form-control" placeholder="Content" rows="5" required></textarea>
							</div>
						</div>
					
					</div>

				<div class="modal-footer" id="editjobcategoryfooter">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cancel
					</button>
					<button id="editjobcategorysubmit" type="submit" class="btn btn-primary">
						Save
					</button>
				</div>
				{{ Form::close() }}
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	</div>

	<!-- Add Modal -->
	<div class="modal fade" id="addjobcategorymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel1">Add Job Category</h4>
				</div>
				<div class="modal-body">

					<div class="row">
					{{ Form::open(['id' => 'addjobcategoryform']) }}
						<div class="col-md-12">
							<div class="form-group">
								<input name="category_name" id="category_name" type="text" class="form-control" placeholder="Job Category Name" required />
							</div>
							<div class="form-group">
								<textarea name="description" id="description" class="form-control" placeholder="Describe the Category" rows="5" required></textarea>
							</div>
						</div>
					
					</div>

				<div class="modal-footer" id="addjobcategoryfooter">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cancel
					</button>
					<button id="addjobcategorysubmit" type="submit" class="btn btn-primary">
						Save
					</button>
				</div>
				{{ Form::close() }}
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	</div>

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

<script type="text/javascript">		
	$(document).ready(function() {
		pageSetUp();

		var otable = $('#dt_basic').DataTable({

			"sDom": "<'dt-toolbar'<'col-xs-6'<'toolbar'>l><'col-xs-6'f>>"

		});

		$("div.toolbar").html('<div class="ColVis"><button data-toggle="modal" data-target="#addjobcategorymodal" class="ColVis_Button ColVis_MasterButton"><i class="fa fa-plus"></i>&nbsp;Add Job Category</button></div>');


		/* END TABLETOOLS */

	})

</script>
@stop