<?php

use UniversalAgency\Repositories\CandidatesRepository;
use UniversalAgency\Repositories\NotificationRepository;
use UniversalAgency\Repositories\PendingjobrequestRepository;
use UniversalAgency\Repositories\InvitationRepository;
use UniversalAgency\Repositories\InterviewRepository;
use UniversalAgency\Repositories\EvaluationRepository;
use UniversalAgency\Repositories\ContractsRepository;

class CandidateController extends \BaseController {

	protected $candidate;
	protected $notification;
	protected $pendingjobrequest;
	protected $invitation;
	protected $interview;
	protected $evaluation;
	protected $contract;

	function __construct(CandidatesRepository $candidate, NotificationRepository $notification
		PendingjobrequestRepository $pendingjobrequest, InvitationRepository $invitation, 
		InterviewRepository $interview, EvaluationRepository $evaluation, 
		ContractsRepository $contract)
	{
		$this->candidate = $candidate;
		$this->notification = $notification;
		$this->pendingjobrequest = $pendingjobrequest;
		$this->invitation = $invitation;
		$this->interview = $interview;
		$this->evaluation = $evaluation;
		$this->contract = $contract;
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

		$underinterviews = $this->interview->get_jobs_with_user_by_id($id);

		$underreviews = $this->evaluation->get_jobs_with_user_by_id($id);
		
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
		$candidate = $this->candidate->set_candidate_status_to_declined(Input::all());

		$notification = $this->notification->sendSorryNoteForBeingDeclined(Input::all());

		return $candidate;
	}

	function adminjobhires($id)
	{
		$recruitcontracts = $this->contract->get_employee_contract_by_id($id);

		return View::make('admin.adminjobhires')
		->withRecruitcontracts($recruitcontracts);
	}
}