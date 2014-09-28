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
		<li>Admin</li><li>View Staff</li>
	</ol>
	<!-- end breadcrumb -->
</div>
@stop

@section('maincontent')
<div id="content">
	<section id="widget-grid" class="">
		<div class="row">
			<div class="alert alert-success" id="staffupdates" style="display: none"></div>

			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>List of Staff</h2>
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
										<th><i class="fa fa-fw fa-key text-muted hidden-md hidden-sm hidden-xs"></i> ID</th>
										<th><i class="fa fa-fw fa-key text-muted hidden-md hidden-sm hidden-xs"></i> Photo</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Staff Name</th>
										<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Email </th>
										<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Phone </th>
										<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Address </th>
										<th><i class="fa fa-fw fa-edit text-muted hidden-md hidden-sm hidden-xs"></i> Edit </th>
										<th><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i>
											/<i class="fa fa-fw fa-times text-muted hidden-md hidden-sm hidden-xs"></i> Enable/Disable </th>
										</tr>
									</thead>
									<tbody id="stafftable">
										@if(count($staff) > 0)
										@foreach($staff as $staffs)
										<tr id="{{ $staffs->id }}">
											<td>{{ $staffs->id }}</td>
											<td><img src="{{ URL::asset($staffs->photo) }}" class="img-circle" style="height:50px;width:50px;"></td>
											<td> {{ $staffs->last_name }} , {{ $staffs->first_name }} </td>
											<td>{{ $staffs->user()->withTrashed()->first()->email }}</td>
											<td>{{ $staffs->phone_number }}</td>
											<td>{{ $staffs->address }}</td>
											<td><a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editemployermodal" onclick="editemployer($(this))"><i class="fa fa-edit"></i></a></td>
											
											@if($staffs->user()->withTrashed()->first()->trashed())
											<td><a href="#" class="btn btn-success btn-circle" onclick="enableemployer($(this))"><i class="fa fa-check"></i></a></td>
											@else
											<td><a href="#" class="btn btn-danger btn-circle" onclick="disableemployer($(this))"><i class="fa fa-times"></i></a></td>
											@endif
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</article>
			</div>
		</section>
	</div>
	@stop

	@section('modals')
	<div class="modal fade" id="addstaffmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">Add New Staff</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						{{ Form::open(['files' => 'true', 'id' => 'addstaffform', 'class' => 'smart-form']) }}
						<div class="col-md-12">
							<section>
								<i class="fa fa-camera fa-3x" id="icon_to_trigger"></i><h4>&nbsp;Add a Photo </h4>
								{{ Form::file('photo', ['id' => 'photo', 'class' => 'hide']) }}<br/>
								<center>
									<img src="{{ URL::asset('images/employer_pictures/user.jpg') }}" id="img-render-photo" class="img-responsive img_render_profilephoto"/>
								</center>
							</section>

							<section>
								<label class="input"> <i class="icon-append fa fa-edit"></i>
									<input type="email" name="email" id="email" placeholder="Email Address">
								</label>
							</section>

							<section>
								<label class="input"> <i class="icon-append fa fa-edit"></i>
									<input type="text" name="first_name" id="first_name" placeholder="Firstname">
								</label>
							</section>

							<section>
								<label class="input"> <i class="icon-append fa fa-edit"></i>
									<input type="text" name="last_name" id="last_name" placeholder="Lastname">
								</label>
							</section>

							<section>
								<label class="input"> <i class="icon-append fa fa-edit"></i>
									<input type="text" name="phone_number" id="phone_number" placeholder="Phone Number">
								</label>
							</section>

							<section>
								<label class="input"> <i class="icon-append fa fa-edit"></i>
									<input type="text" name="address" id="address" placeholder="Address">
								</label>
							</section>
						</div>
					</div>

					<div class="modal-footer" id="addstafffooter">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Cancel
						</button>
						<button id="addstaffsubmit" type="submit" class="btn btn-primary">
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

			$("div.toolbar").html('<div class="ColVis"><button data-toggle="modal" data-target="#addstaffmodal" class="ColVis_Button ColVis_MasterButton"><i class="fa fa-plus"></i>&nbsp;Add Staff</button></div>');


			/* END TABLETOOLS */

		})

	</script>
	@stop