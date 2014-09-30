<?php

use Carbon\Carbon;
use UniversalAgency\Repositories\UsersRepository;
use UniversalAgency\Repositories\NotificationRepository;
use UniversalAgency\Repositories\JobsRepository;
use Illuminate\Support\Collection as Collection;

class InterviewController extends \BaseController {

	protected $user;
	protected $notification;
	protected $job;

	function __construct(UsersRepository $user, NotificationRepository $notification
		, JobsRepository $job )
	{
		$this->user = $user;
		$this->notification = $notification;
		$this->job = $job;
	}

	function adminscheduledinterviews()
	{
		$staffs = $this->user->getAllStaff();
		$applicants = $this->user->getAllApplicant();
		$jobs = $this->job->listjobs();

		return View::make('admin.adminscheduledinterviews')
		->withStaffs($staffs)
		->withJobs($jobs)
		->withApplicants($applicants);
	}

	function adminaddevent()
	{
		$event_date_time = Input::get('event_date_year').'-'.Input::get('event_date_month').'-'.Input::get('event_date_day').' '.Input::get('event_time_hour').':'.Input::get('event_time_minute').':00';
		$event_date_time_timestamp = new Carbon($event_date_time);

		$interview = new Interview;
		$interview->staff_id = Input::get('staffid');
		$interview->applicant_id = Input::get('applicantid');
		$interview->job_id = Input::get('job');
		$interview->event_title = Input::get('event_title');
		$interview->event_date_year = Input::get('event_date_year');
		$interview->event_date_month = Input::get('event_date_month');
		$interview->event_date_day = Input::get('event_date_day');
		$interview->event_time_hour = Input::get('event_time_hour');
		$interview->event_time_minute = Input::get('event_time_minute');
		$interview->additional_notes = Input::get('additional_notes');
		$interview->event_date_time = $event_date_time_timestamp;
		$interview->save();

		$applicant_notification = $this->notification->pre_notify_applicant_for_interview($event_date_time_timestamp, $interview->applicant_id);
		$staff_notification = $this->notification->pre_notify_staff_for_interview($event_date_time_timestamp, $interview->staff_id);

		return $interview;
	}

	function adminFetchInterviewEvents()
	{
		$interviews = Interview::all();
		// $collections = new Collection;

		foreach( $interviews as $interview )
		{
			// $startISO = date('c', $interview->event_date_time);
				// $carbonated = Carbon::createFromTimeStamp($interview->event_date_time);
				$instance = new Carbon($interview->event_date_time);
				$interview->title = $interview->event_title;
				$interview->start = $instance->format('D M d Y H:i:s');
				$interview->description = $interview->additional_notes;	
				$interview->className = 'bg-color-greenLight';
				$interview->icon = 'fa-check';
				$interview->allDay = false;
		}

		return Response::json($interviews);
	}

	function staffinterviewer()
	{
		return View::make('staff.staffinterviewer');
	}

	function applicantinterviewee()
	{
		// $this->notification->notifyaboutid();
		return View::make('applicant.applicantinterviewee');
	}	

	function thankyoufortheinterview()
	{
		return View::make('applicant.thankyoufortheinterview');
	}

}