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
		$jobrequests = $this->pendingjobrequest->get_jobs_with_user_by_id($id);

		$invitations = $this->invitation->get_jobs_with_user_by_id($id);

		$candidates = $this->candidate->get_jobs_with_user_by_id($id);	

		$underinterviews = $this->interview->get_jobs_with_user_by_id($id);

		$underreviews = $this->evaluation->get_jobs_with_user_by_id($id);
		
		return View::make('admin.adminjobcandidates')
		->withJobrequests($jobrequests)
		->withInvitations($invitations)
		->withUnderinterviews($underinterviews)
		->withUnderreviews($underreviews)
		->withCandidates($candidates);
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