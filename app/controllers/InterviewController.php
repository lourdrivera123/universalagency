<?php

use Carbon\Carbon;
use UniversalAgency\Repositories\UsersRepository;
use UniversalAgency\Repositories\NotificationRepository;
use UniversalAgency\Repositories\JobsRepository;
use UniversalAgency\Repositories\InterviewRepository;
use Illuminate\Support\Collection as Collection;

class InterviewController extends \BaseController {

	protected $user;
	protected $notification;
	protected $job;
	protected $interview;

	function __construct(UsersRepository $user, NotificationRepository $notification
		, JobsRepository $job, InterviewRepository $interview )
	{
		$this->user = $user;
		$this->notification = $notification;
		$this->job = $job;
		$this->interview = $interview;
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
		$interview = $this->interview->create(Input::all());

		$applicant_notification = $this->notification->pre_notify_applicant_for_interview($event_date_time_timestamp, $interview->applicant_id);

		$staff_notification = $this->notification->pre_notify_staff_for_interview($event_date_time_timestamp, $interview->staff_id);

		return $interview;
	}

	function adminFetchInterviewEvents()
	{
		$interviews = $this->interview->get_all_interviews();

		foreach( $interviews as $interview )
		{
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
		return View::make('applicant.applicantinterviewee');
	}	

	function thankyoufortheinterview()
	{
		return View::make('applicant.thankyoufortheinterview');
	}

}