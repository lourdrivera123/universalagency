<?php

class InboxController extends \BaseController {

	function admininbox()
	{
		$faq = Faq::all();
		$pendingjobrequests = Pendingjobrequest::where('status', 0)->get();

		return View::make('admin.adminInbox')
		->withFaq($faq)
		->withPendingjobrequests($pendingjobrequests);
	}

	function admininboxlist()
	{
		$faq = Faq::all();
		$iq = Iqresult::all();
		$personality = Personalityresult::all();

		$pendingjobrequests = Pendingjobrequest::where('status', 0)->get();

		return View::make('admin.inbox.adminInboxList')
		->withFaq($faq)
		->withIq($iq)
		->withPersonality($personality);
	}

	function admincompose()
	{
		$role = Role::whereName('applicant')->first();
		$emails = $role->user()->get();

		return View::make('admin.inbox.admincompose')
		->withEmails($emails);
	}

	function adminopened()
	{
		$iqresult = Iqresult::find(Input::get('iqid'));
		$personalityresult = Personalityresult::find(Input::get('personalityid'));
		$user = User::find(Input::get('userid'));
		$resume = $user->resume()->first();

		return View::make('admin.inbox.adminopened')
		->withIqresult($iqresult)
		->withPersonalityresult($personalityresult)
		->withResume($resume);
	}

	function adminreply()
	{
		
		return View::make('admin.inbox.adminreply');
	}
}