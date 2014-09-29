<?php namespace UniversalAgency\Repositories;

use Candidate;
use Resume;
use User;

class CandidatesRepository {

	function create($userID, $jobID)
	{
		$candidate = new Candidate;
		$candidate->applicant_id = $userID;
		$candidate->job_id = $jobID;
		$candidate->save();

		return $candidate;
	}

	function updateCandidateToUnderReview($applicant_id, $job_id)
	{
		$candidate = Candidate::whereJobId($job_id)->whereApplicantId($applicant_id)->first();
		$candidate->status = 'under review';
		$candidate->save();

		return $candidate;

	}


	// function acceptinvitation($input)
	// {
	// 	$candidate = Candidate::whereJobId($input['jobid'])->whereApplicantId($input['applicantid'])->first();
	// 	$candidate->request_status = 'accepted';
	// 	$candidate->save();
	
	// 	return $candidate;
	// }

	

	// function create($candidateID, $jobID, $jobCategory)
	// {
	// 	$candidate = new Candidate;
	// 	$candidate->applicant_id = $candidateID;
	// 	$candidate->job_id = $jobID;
	// 	$candidate->job_category = $jobCategory;
	// 	$candidate->save();

	// 	return $candidate;
	// }

	// function create()
	// {

	// }

	// function listcandidates($input)
	// {
	// 	$candidates = Candidate::whereJobId($input['jobid'])->get();

	// 	foreach ( $candidates as $candidate)
	// 	{
	// 		$candidate->applicant_name = $candidate->user()->first()->resume()->first()->first_name.' '.$candidate->user()->first()->resume()->first()->last_name;
	// 		$candidate->job_title = $candidate->job()->first()->job_title;
	// 		$candidate->jobcategory = $candidate->jobcategory()->first()->category;
	// 		$candidate->timeofrequest = ago($candidate->created_at);
	// 		$candidate->resume_id = $candidate->user()->first()->resume()->first()->id;
	// 	}
	// 	return $candidates;
	// }

	// function deleteUninterestedCandidatesUsingJobID($jobid)
	// {
	// 	$candidates = Candidate::whereJobId($jobid)->get();		
		
	// 	foreach ( $candidates as $candidate )
	// 	{
	// 		if ( $candidate->request_status == 'pending' || $candidate->request_status == 'declined' )
	// 			$candidate->delete();
	// 	}

	// 	return 1;
	// }
}