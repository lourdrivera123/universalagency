<?php

use UniversalAgency\Repositories\PendingjobrequestRepository;
use UniversalAgency\Repositories\PersonalityTestRepository;
use UniversalAgency\Repositories\IqTestRepository;
use UniversalAgency\Repositories\FaqRepository;
use UniversalAgency\Repositories\UsersRepository;

class InboxController extends \BaseController {

	protected $pendingjobrequest;
	protected $personality;
	protected $iqtest;
	protected $faq;
	protected $user;

	function __construct(PendingjobrequestRepository $pendingjobrequest, PersonalityTestRepository $personality, 
		IqTestRepository $iqtest, FaqRepository $faq, UsersRepository $user )
	{
		$this->pendingjobrequest = $pendingjobrequest;
		$this->personality = $personality;
		$this->iqtest = $iqtest;
		$this->faq = $faq;
		$this->user = $user;
	}

	function admininbox()
	{
		$faq = $this->faq->get_all_faq();

		$pendingjobrequests = $this->pendingjobrequest->get_requests_where_status_is(0);

		return View::make('admin.adminInbox')
		->withFaq($faq)
		->withPendingjobrequests($pendingjobrequests);
	}

	function admininboxlist()
	{
		$faq = $this->faq->get_all_faq();
		
		$iq = $this->iqtest->get_all_iq_results();

		$personality = $this->personality->get_all_personality_results();

		$pendingjobrequests = $this->pendingjobrequest->get_requests_where_status_is(0);

		return View::make('admin.inbox.adminInboxList')
		->withFaq($faq)
		->withIq($iq)
		->withPersonality($personality);
	}

	function admincompose()
	{		
		$role = $this->user->get_role_by_name('applicant');

		$emails = $role->user()->get();

		return View::make('admin.inbox.admincompose')
		->withEmails($emails);
	}

	function adminopened()
	{
		$iqresult = $this->iqtest->get_iqresult_by_id(Input::get('iqid'));

		$personalityresult = $this->personality->get_personality_result_by_id(Input::get('personalityid'));

		$user = $this->user->getUserById(Input::get('userid'));

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