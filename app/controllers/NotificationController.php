<?php

use UniversalAgency\Repositories\NotificationRepository;
use UniversalAgency\Repositories\InterviewRepository;

class NotificationController extends \BaseController {

	protected $notification;
	protected $interview;

	function __construct(NotificationRepository $notification, InterviewRepository $interview)
	{
		$this->notification = $notification;
		$this->interview = $interview;
	}

	function notifications()
	{
		if( isAdmin() )
			return View::make('YouAreAdmin');

		$notifications = $this->notification->get_notifications_for_loggedin_user(Auth::user()->id);

		return View::make('applicant.notifications')
		->withNotifications($notifications);
	}

	function viewnotification($id)
	{
		if( isAdmin() )
			return View::make('YouAreAdmin');
		
		$notification = $this->notification->get_notification_by_id($id);

		return View::make('applicant.notifications')
		->withNotification($notification);
	}

	function notifystaffaboutid()
	{
		// $interview = $this->interview->get_interview_by_applicantid(Auth::user()->id);

		// $notification = new Notification;
		// $notification->from_userid = Auth::user()->id;
		// $notification->to_userid = $interview->staff_id;
		// $notification->employerid = 1;
		// $notification->jobid = 1;
		// $notification->subject = 'Applicant ID';
		
		// $notification->message = 'Hello'.'!<br/>
		// Applicant\'s ID : '.Input::get('interviewid').'.
		// <br/><br/>';

		// $notification->save();
	}

}