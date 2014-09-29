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
		<li>Admin</li><li>Schedule of Interviews</li>
	</ol>
	<!-- end breadcrumb -->
</div>
@stop

@section('maincontent')
<div id="content">
	<div class="col-sm-12 col-md-12 col-lg-12">

		<center><button data-toggle="modal" data-target="#addeventmodal" type="button" name="addevent" /><i class="fa fa-plus"></i> Add Schedule for Interview</button></center><br/>
		<div class="jarviswidget jarviswidget-color-blueDark">
			<header>1
				<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
				<h2> My Events </h2>
				<div class="widget-toolbar">
					<!-- add: non-hidden - to disable auto hide -->
					<div class="btn-group">
						<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
							Showing <i class="fa fa-caret-down"></i>
						</button>
						<ul class="dropdown-menu js-status-update pull-right">
							<li>
								<a href="javascript:void(0);" id="mt">Month</a>
							</li>
							<li>
								<a href="javascript:void(0);" id="ag">Agenda</a>
							</li>
							<li>
								<a href="javascript:void(0);" id="td">Today</a>
							</li>
						</ul>
					</div>
				</div>
			</header>

			<!-- widget div-->
			<div>

				<div class="widget-body no-padding">
					<!-- content goes here -->
					<div class="widget-body-toolbar">

						<div id="calendar-buttons">

							<div class="btn-group">
								<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
								<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
					<div id="calendar"></div>

					<!-- end content -->
				</div>

			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->

	</div>

</div>

<!-- end row -->
</div>
@stop

@section('modals')
<!-- Modal -->
<div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Add Scheduled Interview</h4>
			</div>
			<div class="modal-body">


				<div class="row">
					{{ Form::open(['id' => 'addeventform', 'class' => 'smart-form']) }}
					<!-- <div class="col-md-12"> -->
					<section>
						<label class="label" style="font-weight:bold">Title of Event</label>
						<label class="input"> <i class="icon-append fa fa-edit"></i>
							<input type="text" name="event_title" id="event_title" placeholder="Untitled Event">
						</label>
					</section>

					<section>
						<div class="inline-group">
							<label class="label" style="font-weight:bold"> Date and Time of Event </label>
							
							<div class="col col-3">
								{{ Form::selectMonth('event_date_month', getMonthNow(), ['class' => 'form-control']) }}
							</div>

							<div class="col col-2">
								{{ Form::selectRange('event_date_day', 1, 31, getDayNow(), ['class' => 'form-control', 'id' => 'event_date_day']) }}
							</div>
							
							<div class="col col-2">
								{{ Form::selectRange('event_date_year', getYearNow(), getYearNow()+1, getYearNow(), ['class' => 'form-control', 'id' => 'event_date_year']) }}
							</div>

							<!-- <div class="col col-1">-</div> -->

							<div class="col col-2">
								{{ Form::selectRange('event_time_hour', 00, 24, null, ['class' => 'form-control', 'id' => 'event_time_hour']) }}
							</div>

							<div class="col col-2">
								{{ Form::selectRange('event_time_minute', 00, 59, null, ['class' => 'form-control', 'id' => 'event_time_minute']) }}
							</div>
							
						</div>
						
					</section>

					<section>
						<label class="label" style="font-weight:bold">Job Title</label>
						<label class="select">
							{{ Form::select('job', $jobs, null, ['class' => 'form-control']) }}
							<i></i>
						</label>
					</section>

					<section>
						<label class="label" style="font-weight:bold">Staff</label>
						<label class="select">
							{{ Form::select('staff', $staffs, null, ['class' => 'form-control']) }}
							<i></i>
						</label>
					</section>

					<section>
						<label class="label" style="font-weight:bold">Applicant</label>
						<label class="select">
							{{ Form::select('applicant', $applicants, null, ['class' => 'form-control']) }}
							<i></i>
						</label>
					</section>

					<section>
						<label class="label" style="font-weight:bold">Additional Notes</label>
						<label class="textarea"> <i class="icon-append fa fa-info"></i> 										
							<textarea rows="3" name="additional_notes" id="additional_notes" placeholder="Notes"></textarea> 
						</label>
					</section>

					<!-- </div> -->
				</div>

			</section>

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
@stop

@section('additional_scripts')

<!-- PAGE RELATED PLUGIN(S) -->
{{ HTML::script('js/plugin/fullcalendar/jquery.fullcalendar.min.js') }}


<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			

			"use strict";
			
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			
			var hdr = {
				left: 'title',
				center: 'month,agendaWeek,agendaDay',
				right: 'prev,today,next'
			};
			
			// var initDrag = function (e) {
			//         // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			//         // it doesn't need to have a start or end

			//         var eventObject = {
			//             title: $.trim(e.children().text()), // use the element's text as the event title
			//             description: $.trim(e.children('span').attr('data-description')),
			//             icon: $.trim(e.children('span').attr('data-icon')),
			//             className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
			//         };
			//         // store the Event Object in the DOM element so we can get to it later
			//         e.data('eventObject', eventObject);

			//         // make the event draggable using jQuery UI
			//         e.draggable({
			//         	zIndex: 999,
			//             revert: true, // will cause the event to go back to its
			//             revertDuration: 0 //  original position after the drag
			//         });
			//     };

			console.log(new Date(y, m, d, 10, 30));
			

			    /* initialize the calendar
			    -----------------------------------------------------------------*/

			    $('#calendar').fullCalendar({

			    	header: hdr,
			    	buttonText: {
			    		prev: '<i class="fa fa-chevron-left"></i>',
			    		next: '<i class="fa fa-chevron-right"></i>'
			    	},

			    	editable: false,
			        droppable: false, // this allows things to be dropped onto the calendar !!!

			        select: function (start, end, allDay) {
			        	var title = prompt('Event Title:');
			        	if (title) {
			        		calendar.fullCalendar('renderEvent', {
			        			title: title,
			        			start: start,
			        			end: end,
			        			allDay: allDay
			                    }, true // make the event "stick"
			                    );
			        	}
			        	calendar.fullCalendar('unselect');
			        },

			    //     events: [{
			    //     	title: 'All Day Event',
			    //     	start: new Date(y, m, 1),
			    //     	description: 'long description',
			    //     	className: ["event", "bg-color-greenLight"],
			    //     	icon: 'fa-check'
			    //     }, {
			    //     	title: 'Long Event',
			    //     	start: new Date(y, m, d - 5),
			    //     	end: new Date(y, m, d - 2),
			    //     	className: ["event", "bg-color-red"],
			    //     	icon: 'fa-lock'
			    //     }, {
			    //     	id: 999,
			    //     	title: 'Repeating Event',
			    //     	start: new Date(y, m, d - 3, 16, 0),
			    //     	allDay: false,
			    //     	className: ["event", "bg-color-blue"],
			    //     	icon: 'fa-clock-o'
			    //     }, {
			    //     	id: 999,
			    //     	title: 'Repeating Event',
			    //     	start: new Date(y, m, d + 4, 16, 0),
			    //     	allDay: false,
			    //     	className: ["event", "bg-color-blue"],
			    //     	icon: 'fa-clock-o'
			    //     }, {
			    //     	title: 'Meeting',
			    //     	start: new Date(y, m, d, 10, 30),
			    //     	allDay: false,
			    //     	className: ["event", "bg-color-darken"]
			    //     }, {
			    //     	title: 'Lunch',
			    //     	start: new Date(y, m, d, 12, 0),
			    //     	end: new Date(y, m, d, 14, 0),
			    //     	allDay: false,
			    //     	className: ["event", "bg-color-darken"]
			    //     }, {
			    //     	title: 'Birthday Party',
			    //     	start: new Date(y, m, d + 1, 19, 0),
			    //     	end: new Date(y, m, d + 1, 22, 30),
			    //     	allDay: false,
			    //     	className: ["event", "bg-color-darken"]
			    //     }, {
			    //     	title: 'Smartadmin Open Day',
			    //     	start: new Date(y, m, 28),
			    //     	end: new Date(y, m, 29),
			    //     	className: ["event", "bg-color-darken"]
			    //     }],

			    events : '/adminFetchInterviewEvents',

			         // Convert the allDay from string to boolean
			         eventRender: function(event, element, view) {
			         	
			         	event.allDay = false;
			         },

			        // events: function(start, end, timezone, callback) {
			        // 	$.ajax({
			        // 		url: '/adminFetchInterviewEvents',
			        // 		dataType: 'json',
			        // 		data: {

			        // 		},
			        // 		success: function(doc) {
			        // 			var events = [];
			        // 			// $(doc).each(function() {
			        // 			// 	events.push({
			        // 			// 		title: doc.event_title,
           //    //           				start: doc.event_date_time // will be parsed
           //    //           			});
			        // 			// });
			        // 			$.each( doc, function( key, value ) {
			        // 				events.push({
			        // 					title: value.event_title,
			        // 					start: value.event_date_time
			        // 				});
			        // 			});
			        // 			callback(events);
			        // 		}
			        // 	});
			        // },

			        // events: function(){
			        // 	$.get('/adminFetchInterviewEvents', {}, function(data){
			        // 		return data;
			        // 	});
			        // },

			        eventRender: function (event, element, icon) {
			        	if (!event.description == "") {
			        		element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
			        			"</span>");
			        	}
			        	if (!event.icon == "") {
			        		element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
			        			" '></i>");
			        	}
			        },

			        windowResize: function (event, ui) {
			        	$('#calendar').fullCalendar('render');
			        }
			    });

/* hide default buttons */
$('.fc-header-right, .fc-header-center').hide();


$('#calendar-buttons #btn-prev').click(function () {
	$('.fc-button-prev').click();
	return false;
});

$('#calendar-buttons #btn-next').click(function () {
	$('.fc-button-next').click();
	return false;
});

$('#calendar-buttons #btn-today').click(function () {
	$('.fc-button-today').click();
	return false;
});

$('#mt').click(function () {
	$('#calendar').fullCalendar('changeView', 'month');
});

$('#ag').click(function () {
	$('#calendar').fullCalendar('changeView', 'agendaWeek');
});

$('#td').click(function () {
	$('#calendar').fullCalendar('changeView', 'agendaDay');
});		

// $("#event_time_from").mask("99:99");	

// $('#event_time_to').mask("99:99");

		// $('#timepicker').timepicker();

		// $('#basic_example_1').datetimepicker();

		// $('#datetimepicker').datetimepicker({
		// 	format: 'yyyy-MM-dd hh:mm',
		// 	pickSeconds: false
		// });

                // $('#datetimepicker1').datetimepicker();

            });

</script>
@stop