<?php namespace UniversalAgency\Repositories;

use Invitation;
use UniversalAgency\Repositories\CandidatesRepository;
use User;

class InvitationRepository {

	protected $candidate;

	function __construct(CandidatesRepository $candidate)
	{
		$this->candidate = $candidate;
	}

	function declineinvitation($input)
	{
		$invitation = Invitation::whereJobId($input['jobid'])->whereApplicantId($input['applicantid'])->first();
		$invitation->request_status = 'declined';
		$invitation->save();

		$checkcandidacy = Invitation::where('job_id', '!=', $input['jobid'])->where('request_status', '!=', 'declined')->first();

		if(is_null($checkcandidacy))
		{
			$user = User::find($input['applicantid']);
			$resume = $user->resume()->first();
			$resume->status = 'available';
			$resume->save();
		}

		return $invitation;
	}

	function acceptinvitation($input)
	{
		$invitation = Invitation::whereJobId($input['jobid'])->whereApplicantId($input['applicantid'])->first();
		$invitation->request_status = 'accepted';
		$invitation->save();
		
		$candidate = $this->candidate->create( $invitation->applicant_id, $invitation->job_id );

		return $invitation;
	}

	function create( $applicantID, $jobID, $jobCategory )
	{
		$invitation = new Invitation;
		$invitation->applicant_id = $applicantID;
		$invitation->job_id = $jobID;
		$invitation->job_category = $jobCategory;
		$invitation->save();

		return $invitation;
	}

	function deleteInvitationsUsingJobId($jobid)
	{
		$candidates = Invitation::whereJobId($jobid)->get();		
		
		foreach ( $candidates as $candidate )
		{
			if ( $candidate->request_status == 'pending' || $candidate->request_status == 'declined' )
				$candidate->delete();
		}

		return 1;
	}
	
}