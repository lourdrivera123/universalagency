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

		$staff_notification = $this->notification->notify_staff_for_interview_today($interview->event_date_time, $interview->staff_id);
		$applicant_notification = $this->notification->notify_applicant_for_interview_today($interview->event_date_time, $interview->applicant_id);

		return $interview;
		
	}


}