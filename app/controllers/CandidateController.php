<?php

use UniversalAgency\Repositories\CandidatesRepository;
use UniversalAgency\Repositories\NotificationRepository;
// use UniversalAgency\Repositories\MessagesRepository;

class CandidateController extends \BaseController {

	protected $candidate;
	protected $notification;
	// protected $message;

	function __construct(CandidatesRepository $candidate, NotificationRepository $notification)
	{
		$this->candidate = $candidate;
		$this->notification = $notification;
		// $this->message = $message;
	}

	function adminjobcandidates($id)
	{
		$jobrequests = Pendingjobrequest::whereJobId($id)->with('user')->get();
		$invitations = Invitation::whereJobId($id)->with('user')->get();
		$candidates = Candidate::whereJobId($id)->with('user')->get();
		$underinterviews = Interview::whereJobId($id)->with('user')->get();
		$underreviews = Evaluation::whereJobId($id)->with('user')->get();
		
		// $candidates = Candidate::all();

		return View::make('admin.adminjobcandidates')
		->withJobrequests($jobrequests)
		->withInvitations($invitations)
		->withUnderinterviews($underinterviews)
		->withUnderreviews($underreviews)
		->withCandidates($candidates);
	}

	function admindeclineApplicantUnderReview()
	{
		$candidate = Candidate::whereJobId(Input::get('jobid'))->whereApplicantId(Input::get('applicantid'))->first();
		$candidate->status = 'declined';
		$candidate->save();

		$notification = $this->notification->sendSorryNoteForBeingDeclined(Input::get('applicantid'), Input::get('jobid'));

		return $candidate;
	}
}











// function listcandidates()
	// {
	// 	$candidates = $this->candidate->listcandidates(Input::all());

	// 	return $candidates;
	// }

	// function acceptinvitation()
	// {
	// 	$candidate = $this->candidate->acceptinvitation(Input::all());

	// 	// $employerid = $candidate->job()->first()->employer()->first()->id;

	// 	$userid = $candidate->user()->first()->id;

	// 	$jobid = $candidate->job_id;

	// 	if ( checkIfUserHasTakenTests(Auth::user()->id) != 'all tests taken!' )
	// 	{
	// 		$testStatus = checkIfUserHasTakenTests(Auth::user()->id);

	// 		if ( $testStatus == 'did not take personality test')
	// 		{
	// 			$candidate->hastakenpersonalitytest = 1;
	// 		}

	// 		if ( $testStatus == 'did not take iq test' )
	// 		{
	// 			$candidate->hastakeniqtest = 1;
	// 		}
	// 	}

	// 	return $candidate;
	// }

	// function declineinvitation()
	// {
	// 	$candidate = $this->candidate->declineinvitation(Input::all());

	// 	return $candidate;
	// }

	// function adminjobinvitations()
	// {
	// 	$candidates = Candidate::all();

	// 	return View::make('admin.adminjobinvitations')
	// 	->withCandidates($candidates);
	// }