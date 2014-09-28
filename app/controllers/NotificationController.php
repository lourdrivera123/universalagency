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

}