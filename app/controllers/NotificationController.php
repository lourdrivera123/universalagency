<?php

use UniversalAgency\Repositories\NotificationRepository;

class NotificationController extends \BaseController {

	protected $notification;

	function __construct(NotificationRepository $notification)
	{
		$this->notification = $notification;
	}

	function notifications()
	{
		if( isAdmin() )
			return View::make('YouAreAdmin');

		$notifications = Notification::whereToUserid(Auth::user()->id)->orderBy('created_at', 'DESC')->get();

		return View::make('applicant.notifications')
		->withNotifications($notifications);
	}

	function viewnotification($id)
	{
		if( isAdmin() )
			return View::make('YouAreAdmin');
		
		$notification = Notification::whereId($id)->whereToUserid(Auth::user()->id)->first();


		return View::make('applicant.notifications')
		->withNotification($notification);
	}

	function notifystaffaboutid()
	{
		$interview = Interview::whereApplicantId(Auth::user()->id)->first();	
		
		$notification = new Notification;
		$notification->from_userid = Auth::user()->id;
		$notification->to_userid = $interview->staff_id;
		$notification->employerid = 1;
		$notification->jobid = 1;
		$notification->subject = 'Applicant ID';
		
		$notification->message = 'Hello'.'!<br/>
		Applicant\'s ID : '.Input::get('interviewid').'.
		<br/><br/>';

		$notification->save();
	}

}