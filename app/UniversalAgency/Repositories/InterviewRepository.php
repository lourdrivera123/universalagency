<?php namespace UniversalAgency\Repositories;

use Interview;
use Carbon\Carbon;
use UniversalAgency\Repositories\NotificationRepository;

class InterviewRepository {

	protected $notification;

	function __construct(NotificationRepository $notification)
	{
		$this->notification = $notification;
	}
	
	function searchForInterviewsToday()
	{
		// $interviews = Interview::where(DATE('event_date_time'), '=', Carbon::now()->toDateString());
		$interviews  = Interview::whereBetween('event_date_time', [ Carbon::now()->toDateString().' 00:00:00', Carbon::now()->toDateString().' 23:59:59'])->get();

		return $interviews;
	}

	function notifyInterviewerandIntervieweeToday($id)
	{
		$interview = Interview::find($id);

		$staff_notification = $this->notification->notify_staff_for_interview_today($interview->event_date_time, $interview->staff_id, $interview->applicant_id, $interview->job_id );
		$applicant_notification = $this->notification->notify_applicant_for_interview_today($interview->event_date_time, $interview->applicant_id);

		return $interview;
	}

	function get_jobs_with_user_by_id($id)
	{
		$underinterviews = Interview::whereJobId($id)->with('user')->get();

		return $underinterviews;
	}

	function create($input)
	{
		$event_date_time = $input['event_date_year'].'-'.$input['event_date_month'].'-'.$input['event_date_day'].' '.$input['event_time_hour'].':'.$input['event_time_minute'].':00';
		$event_date_time_timestamp = new Carbon($event_date_time);

		$interview = new Interview;
		$interview->staff_id = $input['staffid'];
		$interview->applicant_id = $input['applicantid'];
		$interview->job_id = $input['job'];
		$interview->event_title = $input['event_title'];
		$interview->event_date_year = $input['event_date_year'];
		$interview->event_date_month = $input['event_date_month'];
		$interview->event_date_day = $input['event_date_day'];
		$interview->event_time_hour = $input['event_time_hour'];
		$interview->event_time_minute = $input['event_time_minute'];
		$interview->additional_notes = $input['additional_notes'];
		$interview->event_date_time = $event_date_time_timestamp;
		$interview->save();

		return $interview;
	}

	function get_all_interviews()
	{
		$interviews = Interview::all();

		return $interviews;
	}

	function get_interview_by_applicantid($id)
	{
		$interview = Interview::whereApplicantId($id)->first();	

		return $interview;
	}
}