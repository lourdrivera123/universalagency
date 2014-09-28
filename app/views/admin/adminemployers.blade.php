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
		<li>Admin</li><li>Employers</li>
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
			<div class="alert alert-success" id="employerupdates" style="display: none"></div>

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>List of Employers</h2>
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
							<!-- <a href="#" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#addemployermodal"><i class="fa fa-plus"></i></a> -->
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th>ID</th>
										<th>Photo</th>
										<th>Business Name</th>
										<th>Business Type</th>
										<th>Description </th>
										<th>Email</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Edit </th>
										<th><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i>
											/<i class="fa fa-fw fa-times text-muted hidden-md hidden-sm hidden-xs"></i> Enable/Disable </th>
										</tr>
									</thead>
									<tbody id="employerstable">
										@if(count($employers) > 0)
										@foreach($employers as $employer)
										<tr id="{{ $employer->id }}">
											<td>{{ $employer->id }}</td>
											<td><img src="{{ URL::asset($employer->photo) }}" class="img-circle" style="height:50px;width:50px;"></td>
											<td><a href="{{ URL::to('employer/'.$employer->id) }}">{{ $employer->businessname }}</a></td>
											<td>{{ $employer->businesstype }}</td>
											<td><div id="profile-description"><div class="text show-more-height">{{ $employer->description }}</div></div></td>
											<td>{{ $employer->user()->withTrashed()->first()->email }}</td>
											<td>{{ $employer->phone_number }}</td>
											<td>{{ $employer->address }}</td>
											<td><a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editemployermodal" onclick="editemployer($(this))"><i class="fa fa-edit"></i></a></td>
											@if($employer->user()->withTrashed()->first()->trashed())
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
<!-- Modal -->
<div class="modal fade" id="addemployermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Add New Employer</h4>
			</div>
			<div class="modal-body">


				<div class="row">
					{{ Form::open(['files' => 'true', 'id' => 'addemployerform', 'class' => 'smart-form']) }}
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
								<input type="text" name="businessname" id="businessname" placeholder="Business Name">
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-edit"></i>
								<input type="text" name="businesstype" id="businesstype" placeholder="Business Type">
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

						<section>
							<label class="label"></label>
							<label class="textarea"> <i class="icon-append fa fa-info"></i> 										
								<textarea rows="3" name="description" id="description" placeholder="Description"></textarea> 
							</label>
						</section>

					</div>
				</div>

				<div class="modal-footer" id="addemployerfooter">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cancel
					</button>
					<button id="addemployersubmit" type="submit" class="btn btn-primary">
						Save
					</button>
				</div>
				{{ Form::close() }}
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>

<!-- Modal -->
<div class="modal fade" id="editemployermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Edit Employer</h4>
			</div>
			<div class="modal-body">


				<div class="row">
					{{ Form::open(['files' => 'true', 'id' => 'editemployerform', 'class' => 'smart-form']) }}
					{{ Form::hidden('employer_id') }}
					<div class="col-md-12">

						<section>
							<i class="fa fa-camera fa-3x" id="icon_to_trigger_editphoto"></i><h4>&nbsp;Add a Photo </h4>
							{{ Form::file('editphoto', ['id' => 'editphoto', 'class' => 'hide']) }}<br/>
							<center>
								<img src="{{ URL::asset('images/employer_pictures/user.jpg') }}" id="img-render-editphoto" class="img-responsive img_render_profilephoto"/>
							</center>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-edit"></i>
								<input type="text" name="email" id="email" placeholder="Email Address">
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-edit"></i>
								<input type="text" name="businessname" id="businessname" placeholder="Business Name">
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-edit"></i>
								<input type="text" name="businesstype" id="businesstype" placeholder="Business Type">
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

						<section>
							<label class="label"></label>
							<label class="textarea"> <i class="icon-append fa fa-info"></i> 										
								<textarea rows="3" name="description" id="description" placeholder="Description"></textarea> 
							</label>
						</section>

					</div>
				</div>

				<div class="modal-footer" id="editemployerfooter">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cancel
					</button>
					<button id="editemployersubmit" type="submit" class="btn btn-primary">
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

		$("div.toolbar").html('<div class="ColVis"><button data-toggle="modal" data-target="#addemployermodal" class="ColVis_Button ColVis_MasterButton"><i class="fa fa-plus"></i>&nbsp;Add Employer</button></div>');


		/* END TABLETOOLS */

	})

</script>
@stop