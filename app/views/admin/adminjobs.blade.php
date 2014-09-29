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
		<li>Admin</li><li>Jobs</li>
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
			<div class="alert alert-success" id="jobupdates" style="display: none"></div>

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

							<div class="well well-sm well-light">

								<div id="tabs">
									<ul>
										<li>
											<a href="#tabs-a">Open Jobs</a>
										</li>
										<li>
											<a href="#tabs-b">Close Jobs</a>
										</li>
									</ul>

									<div id="tabs-a">
										


										<!-- <a href="#" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#addjobmodal"><i class="fa fa-plus"></i></a> -->
										<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th> ID</th>
													<th> Job Title </th>
													<th> Description </th>
													<th> Category</th>
													<th> Location </th>
													<th> Company </th>
													<th> Candidates </th>
													<th><i class="fa fa-fw fa-edit text-muted hidden-md hidden-sm hidden-xs"></i> Edit </th>
													<th><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i>
														/<i class="fa fa-fw fa-times text-muted hidden-md hidden-sm hidden-xs"></i> Enable/Disable </th>
														<th class="hide"></th>
														<th class="hide"></th>
														<th class="hide"></th>
														<th class="hide"></th>
														<th class="hide"></th>
														<th class="hide"></th>
														<th class="hide"></th>
														<th class="hide"></th>

													</tr>
												</thead>
												<tbody id="jobstable">
													@if(count($jobs) > 0)
													@foreach($jobs as $job)
													<tr id="{{ $job->id }}">
														<td>{{ $job->id }}</td>
														<td><a href="{{ URL::to('job/'.$job->id) }}" target="_blank">{{ $job->job_title }}</a></td>
														<td><div id="profile-description"><div class="text show-more-height">{{ $job->description }}</div></div></td>
														<td>{{ $job->category()->first()->category }}</td>
														<td> {{ $job->location }}</td>
														<td>{{ $job->employer()->first()->businessname }}</td>
														<td class="hide">{{ $job->gender }}</td>
														<td class="hide">{{ $job->agefrom }}</td>
														<td class="hide">{{ $job->ageto }}</td>
														<td class="hide">{{ $job->education }}</td>
														<td class="hide">{{ $job->minimumyearsofexperience }}</td>
														<td class="hide">{{ $job->maximumyearsofexperience }}</td>
														<td class="hide">{{ $job->others }}</td>
														<td class="hide">{{ $job->invitationexpiration }}</td>
														<!-- <td><a href="#" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#listcandidatesmodal" onclick="listcandidates($(this))"><i class="fa fa-user"></i></a></td> -->
														<td><a href="{{ URL::to('adminjobcandidates/'.$job->id) }}" class="btn btn-primary btn-circle" ><i class="fa fa-user"></i></a></td>
														<td><a href="javascript:void(0)" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editjobmodal" onclick="editjob($(this))"><i class="fa fa-edit"></i></a></td>
														@if($job->trashed())
														<td><a href="javascript:void(0)" class="btn btn-success btn-circle" onclick="enablejob($(this))"><i class="fa fa-check"></i></a></td>
														@else
														<td><a href="javascript:void(0)" class="btn btn-danger btn-circle" onclick="disablejob($(this))"><i class="fa fa-times"></i></a></td>
														@endif
													</tr>
													@endforeach
													@endif
												</tbody>
											</table>
										</div>

										<div id="tabs-b">
											<table id="dt_basic1" class="table table-striped table-bordered table-hover" width="100%">
												<thead>
													<tr>
														<th> ID</th>
														<th> Job Title </th>
														<th> Company </th>
														<th> Employee/s</th>
													</tr>
												</thead>
												<tbody id="closedjobstable">
													<tr id="enteridhere">
														<td></td>
														<td></td>
														<td></td>
														<td></td>

													</tr>
												</tbody>
											</table>
										</div>

									</div>

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

		@section('modals')
		<!-- Add Modal -->
		<div class="modal fade" id="addjobmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header blackened">
						<button type="button" class="close whitenize" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel1" >Add Job</h4>
					</div>

					<div class="modal-body" id="addjobmodalbody">
						<div class="row">
							<div class="widget-body">
								{{ Form::open(['id' => 'addjobform', 'class' => 'smart-form']) }}
								<div class="col-md-12">
									<header style="margin-top:-20px;font-weight:bold;">Job Details</header>
									<br/>

									<section>
										<label class="label"><i>Job Title</i></label>
										<label class="input">
											<!-- <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Give us a sentence that can describe the job."> -->
											{{ Form::select('job_title', $contracts, null, ['class' => 'form-control', 'id' => 'addjob_title']) }}
											<!-- <b class="tooltip tooltip-bottom-right">Give us a sentence that can describe the job.</b> -->
											<i></i></label>
										</section>

										<section>
											<label class="label"><i>Job Category</i> </label>
											{{ Form::select('job_category', $jobcategories, null, ['class' => 'form-control']) }}
										</section>

										<section>
											<label class="label"><i>Job Description</i></label>
											<label class="textarea"><i class="icon-append fa fa-info-circle"></i>
												<textarea rows="3" class="form-control" name="description" id="description" placeholder="Describe the Job to be done"></textarea> 
												<b class="tooltip tooltip-bottom-right">Describe the Job to be done</b>
											</label>
										</section>

										<section>
											<label class="label"><i>Employment Type</i></label>
											<label class="select">
												{{ Form::select('employmenttype', ['Full-time' => 'Full-time', 'Part-time' => 'Part-time'], null, ['class' => 'form-control']) }}
												<i></i>
											</label>
										</section>

										<section>
											<label class="label"><i> Employer </i></label>
											<label class="input"><i class="icon-append fa fa-building-o"></i>
												<input style="color:black; padding-left:5px;" type="text" class="form-control disabled" placeholder="Employer Name" id="addcompanyname" name="company" readonly="" />
											</label>
										</section>

										<section>
											<label class="label"><i>Location</i></label>
											<label class="input"><i class="icon-append fa fa-location-arrow"></i>
												<input type="text" class="form-control" name="job_location" id="job_location" placeholder="Location">
												<b class="tooltip tooltip-bottom-right">Location where employees will work.</b>
											</label>
										</section>

										<header style="font-weight:bold">Qualifications</header>
										<br/>

										<section>
											<div class="inline-group">
												<label class="label"> Gender </label>
												<label class="radio" >
													{{ Form::radio('gender', 'male') }}
													<i></i>Male
												</label>

												<label class="radio" >
													{{ Form::radio('gender', 'female') }}
													<i></i>Female
												</label>

												<label class="radio" >
													{{ Form::radio('gender', 'both') }}
													<i></i>Both
												</label>

											</div>
										</section>

										<section>
											<div class="inline-group">
												<div class="col-md-3">
													<label class="label"><i>Age From</i> </label>
													{{ Form::selectRange('agefrom', 18, 59, null, ['class' => 'form-control agefromqualification', 'id' => 'agefromqualification']) }}
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-3">
													<label class="label"><i>Age To</i> </label>
													{{ Form::selectRange('ageto', 19, 60, null, ['class' => 'form-control agetoqualification', 'id' => 'agetoqualification']) }}
												</div>
											</div>
										</section>

										<section>
											<label class="label"><i>Education</i></label>
											{{ Form::select('education', ['1' => 'High School', '2' => 'Vocational', '3' => 'College Diploma', '4' => 'Bachelor\'s Degree', '5' => 'Master\'s Degree', '6' => 'Doctorate'], null, ['class' => 'form-control']) }}
										</section>

										<section>
											<div class="inline-group">
												<div class="col-md-3">
													<label class="label"><i>Minimum Years of Experience</i> </label>
													{{ Form::selectRange('minimumyearsofexperience', 1, 19, null, ['class' => 'form-control', 'id' => 'minimumyearsofexperiencequalification']) }}
												</div>

												<div class="col-md-1"></div>

												<div class="col-md-1"></div>

												<div class="col-md-4">
													<label class="checkbox" >
														{{ Form::checkbox('anyworkexperience', 'any', false) }}
														<i></i> Any Work Experience
													</label>
												</div>
											</div>
										</section>

										<section>
											<label class="label"><i>Others</i></label>
											<label class="textarea"><i class="icon-append fa fa-info"></i>
												<textarea rows="3" class="form-control" name="others" id="others" placeholder="Other Qualifications, please specify"></textarea> 
												<b class="tooltip tooltip-bottom-right">Other Qualifications, please specify</b>
											</label>
										</section>

										<header style="font-weight:bold;">Date until invitation expires</header><br/>

										<section>
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="invitationexpiration" id="addinvitationexpiration" placeholder="Expiration date">
												<b class="tooltip tooltip-bottom-right">Date until invitations are expired.</b>
											</label>
										</section>

									</div>

								</div>

								<div class="modal-footer" id="addjobfooter">
									<button type="button" class="btn btn-default cancelize" data-dismiss="modal">
										Cancel
									</button>
									<button type="submit" class="btn btn-primary primarize" id="addjobsubmit">
										Save
									</button>
								</div>
								{{ Form::close() }}
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			</div>

			<!-- Edit Modal -->
			<div class="modal fade" id="editjobmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header blackened">
							<button type="button" class="close whitenize" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
							<h4 class="modal-title" id="myModalLabel1">Edit Job</h4>
						</div>
						<div class="modal-body">

							<div class="row">
								<div class="widget-body">
									{{ Form::open(['id' => 'editjobform', 'class' => 'smart-form']) }}
									{{ Form::hidden('job_id') }}
									<div class="col-md-12">
										<header style="margin-top:-20px;font-weight:bold;">Job Details</header>
										<br/>
										<section>
											<label class="label"><i> Company Name </i></label>
											{{ Form::select('company', $businesses, null,  ['id' => 'addcompanyname', 'class' => 'form-control']) }}
										</section>

										<section>
											<label class="label"><i>Job Category</i> </label>
											{{ Form::select('job_category', $jobcategories, null, ['class' => 'form-control']) }}
										</section>

										<section>
											<label class="label"><i>Job Title</i></label>
											<label class="input"><i class="icon-append fa fa-briefcase"></i>
												<input type="text" class="form-control" name="job_title" id="job_title" placeholder="Give us a sentence that can describe the job.">
												<b class="tooltip tooltip-bottom-right">Give us a sentence that can describe the job.</b>
											</label>
										</section>

										<section>
											<label class="label"><i>Job Description</i></label>
											<label class="textarea"><i class="icon-append fa fa-info-circle"></i>
												<textarea rows="3" class="form-control" name="description" id="description" placeholder="Describe the Job to be done"></textarea> 
												<b class="tooltip tooltip-bottom-right">Describe the Job to be done</b>
											</label>
										</section>

										<section>
											<label class="label"><i>Location</i></label>
											<label class="input"><i class="icon-append fa fa-location-arrow"></i>
												<input type="text" class="form-control" name="editjob_location" id="editjob_location" placeholder="Location">
												<b class="tooltip tooltip-bottom-right">Location where employees will work.</b>
											</label>
										</section>

										<header style="font-weight:bold">Qualifications</header>
										<br/>

										<section>
											<div class="inline-group">
												<label class="label"> Gender </label>
												<label class="radio" >
													<input name="gender" type="radio" value="male" id="gendermale">
													<i></i>Male
												</label>

												<label class="radio" >
													<input name="gender" type="radio" value="female" id="genderfemale">
													<i></i>Female
												</label>

												<label class="radio" >
													<input name="gender" type="radio" value="both" id="genderboth">
													<i></i>Both
												</label>

											</div>
										</section>

										<section>
											<div class="inline-group">
												<div class="col-md-3">
													<label class="label"><i>Age From</i> </label>
													{{ Form::selectRange('agefrom', 18, 59, null, ['class' => 'form-control agefromqualify', 'id' => 'agefrom']) }}
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-3">
													<label class="label"><i>Age To</i> </label>
													{{ Form::selectRange('ageto', 19, 60, null, ['class' => 'form-control agetoqualify', 'id' => 'ageto']) }}
												</div>
											</div>
										</section>

										<section>
											<label class="label"><i>Education</i></label>
											{{ Form::select('education', ['1' => 'High School', '2' => 'Vocational', '3' => 'College Diploma', '4' => 'Bachelor\'s Degree', '5' => 'Master\'s Degree', '6' => 'Doctorate'], null, ['class' => 'form-control', 'id' => 'education']) }}
										</section>

										<section>
											<div class="inline-group">
												<div class="col-md-3">
													<label class="label"><i>Minimum Years of Experience</i> </label>
													{{ Form::selectRange('minimumyearsofexperience', 1, 19, null, ['class' => 'form-control minimumyearsofexperiencequalification', 'id' => 'minimumyearsofexperience']) }}
												</div>

												<div class="col-md-1"></div>

												<div class="col-md-3">
													<label class="label"><i>Maximum Years of Experience</i> </label>
													{{ Form::selectRange('maximumyearsofexperience', 2, 20, null, ['class' => 'form-control maximumyearsofexperiencequalification', 'id' => 'maximumyearsofexperience']) }}
												</div>

												<div class="col-md-1"></div>

												<div class="col-md-3">
													<label class="label"><i>Any Work Experience</i> </label>
													<label class="checkbox" >
														{{ Form::checkbox('anyworkexperienceedit', 'any') }}
														<i></i>Any
													</label>
												</div>

											</div>
										</section>

										<section>
											<label class="label"><i>Others</i></label>
											<label class="textarea"><i class="icon-append fa fa-info"></i>
												<textarea rows="3" class="form-control" name="others" id="others" placeholder="Other Qualifications, please specify"></textarea> 
												<b class="tooltip tooltip-bottom-right">Other Qualifications, please specify</b>
											</label>
										</section>

										<header style="font-weight:bold;">Date until invitation expires</header><br/>

										<section>
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="invitationexpiration" id="updateinvitationexpiration" placeholder="Expiration date">
												<b class="tooltip tooltip-bottom-right">Date until invitations are expired.</b>
											</label>
										</section>
									</div>
								</div>
							</div>

							<div class="modal-footer" id="editjobfooter">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Cancel
								</button>
								<button id="editjobsubmit" type="submit" class="btn btn-primary">
									Save
								</button>
							</div>
							{{ Form::close() }}
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			</div>

			<!-- List Candidates Modal -->
			<div class="modal fade" id="listcandidatesmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
										<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Job Title </th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Job Category</th>
										<th><i class="fa fa-fw fa-info-circle text-muted hidden-md hidden-sm hidden-xs"></i> Request Status </th>
									</tr>
								</thead>
								<tbody id="candidatestable">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div><!-- /.modal -->
			@stop

			@section('additional_scripts')

			<!-- PAGE RELATED PLUGIN(S) -->
			{{ HTML::script('js/plugin/datatables/jquery.dataTables.min.js') }}
			{{ HTML::script('js/plugin/datatables/dataTables.colVis.min.js') }}
			{{ HTML::script('js/plugin/datatables/dataTables.tableTools.min.js') }}
			{{ HTML::script('js/plugin/datatables/dataTables.bootstrap.min.js') }}
			{{ HTML::script('js/plugin/summernote/summernote.min.js')}}
			<script type="text/javascript">
				$(function () {
					$("[rel='tooltip']").tooltip();
				});
			</script>

			<script type="text/javascript">		
				$(document).ready(function() {
					pageSetUp();
					setEmployer();

					var otable = $('#dt_basic').DataTable({

						"sDom": "<'dt-toolbar'<'col-xs-6'<'toolbar'>l><'col-xs-6'f>>"

					});

					$("div.toolbar").html('<div class="ColVis"><button data-toggle="modal" data-target="#addjobmodal" class="ColVis_Button ColVis_MasterButton"><i class="fa fa-plus"></i>&nbsp;Add Job</button></div>');

					var otable1 = $('#dt_basic1').DataTable({

						"sDom": "<'dt-toolbar'<'col-xs-6'l><'col-xs-6'f>>"

					});

					/* END TABLETOOLS */

				});

//Change Value of Dropdowns for Add job form yearsofexperience
var removed;

$('#minimumyearsofexperiencequalification').change( function() {
	var value = this.value;
	$('#maximumyearsofexperiencequalification').prepend(removed);
	var toKeep = $('#maximumyearsofexperiencequalification option').filter( function( ) {
		return parseInt(this.value, 10) > parseInt( value, 10);
	} );
	removed =  $('#maximumyearsofexperiencequalification option').filter( function( ) {
		return parseInt(this.value, 10) < parseInt( value, 10);
	} );
	$('#maximumyearsofexperiencequalification').html(toKeep);
});
//End of Code

//Change Value of Dropdowns for Add job form yearsofexperience
var removed;

$('.minimumyearsofexperiencequalification').change( function() {
	var value = this.value;
	$('.maximumyearsofexperiencequalification').prepend(removed);
	var toKeep = $('.maximumyearsofexperiencequalification option').filter( function( ) {
		return parseInt(this.value, 10) > parseInt( value, 10);
	} );
	removed =  $('.maximumyearsofexperiencequalification option').filter( function( ) {
		return parseInt(this.value, 10) < parseInt( value, 10);
	} );
	$('.maximumyearsofexperiencequalification').html(toKeep);
});
//End of Code

//Change Value of Dropdowns for Add job form age qualification
var removed;

$('.agefromqualification').change( function() {
	var value = this.value;
	$('.agetoqualification').prepend(removed);
	var toKeep = $('.agetoqualification option').filter( function( ) {
		return parseInt(this.value, 10) > parseInt( value, 10);
	} );
	removed1 =  $('.agetoqualification option').filter( function( ) {
		return parseInt(this.value, 10) < parseInt( value, 10);
	} );
	$('.agetoqualification').html(toKeep);
});
//End of Code

//Change Value of Dropdowns for Add job form age qualification
var removed;

$('.agefromqualify').change( function() {
	var value = this.value;
	$('.agetoqualify').prepend(removed);
	var toKeep = $('.agetoqualify option').filter( function( ) {
		return parseInt(this.value, 10) > parseInt( value, 10);
	} );
	removed1 =  $('.agetoqualify option').filter( function( ) {
		return parseInt(this.value, 10) < parseInt( value, 10);
	} );
	$('.agetoqualify').html(toKeep);
});
//End of Code

//Invitation Expiration
$('#addinvitationexpiration').datepicker({
	dateFormat : 'yy-mm-dd',
	prevText : '<i class="fa fa-chevron-left"></i>',
	nextText : '<i class="fa fa-chevron-right"></i>',

});

var datenow = new Date();

$( "#addinvitationexpiration" ).datepicker( "option", "showAnim", "drop" );
$( "#addinvitationexpiration" ).datepicker( "option", "minDate", new Date(datenow.getFullYear('yy'), datenow.getMonth(), datenow.getDate() + 7));
$("#addinvitationexpiration").datepicker( "option", "setDate" , new Date(datenow.getFullYear('yy'), datenow.getMonth(), datenow.getDate() + 7) );

$('#updateinvitationexpiration').datepicker({
	dateFormat : 'yy-mm-dd',
	prevText : '<i class="fa fa-chevron-left"></i>',
	nextText : '<i class="fa fa-chevron-right"></i>',

});

$('#addjob_title').change(function(){
	var jobtitle = $('#addjob_title').val();
	// var _token = $('')
	$.get('/admingetcompanyname', { jobtitle: jobtitle }, function(data){
		$('#addcompanyname').val(data);
	});
});

function setEmployer()
{
	var jobtitle = $('#addjob_title').val();
	
	// var _token = $('')
	
	$.get('/admingetcompanyname', { jobtitle: jobtitle }, function(data){
		$('#addcompanyname').val(data);
	});
}

$('#tabs').tabs();


//End of Code
</script>
@stop