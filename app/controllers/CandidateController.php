<?php

use UniversalAgency\Repositories\CandidatesRepository;
use UniversalAgency\Repositories\NotificationRepository;
use Illuminate\Support\Collection as Collection;
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
		
		$available_resumes = Resume::whereStatus('Available')->lists('last_name', 'user_id');

		// $available_applicants = User::lists('email', 'id');
		// $candidates = Candidate::all();

		return View::make('admin.adminjobcandidates')
		->withJobrequests($jobrequests)
		->withInvitations($invitations)
		->withUnderinterviews($underinterviews)
		->withUnderreviews($underreviews)
		->withCandidates($candidates)
		->withAvailableResumes($available_resumes)
		->withJobId($id);
	}

	function admindeclineApplicantUnderReview()
	{
		$candidate = Candidate::whereJobId(Input::get('jobid'))->whereApplicantId(Input::get('applicantid'))->first();
		$candidate->status = 'declined';
		$candidate->save();

		$notification = $this->notification->sendSorryNoteForBeingDeclined(Input::get('applicantid'), Input::get('jobid'));

		return $candidate;
	}

	function adminjobhires($id)
	{
		$recruitcontracts = Recruitcontract::whereJobId($id)->get();

		return View::make('admin.adminjobhires')
		->withRecruitcontracts($recruitcontracts);
	}
}