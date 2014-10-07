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

	function updateCandidateStatusToHired($jobid, $employeeid)
	{
		$candidate = Candidate::whereJobId($jobid)->whereApplicantId($employeeid)->first();
		$candidate->status = 'hired';
		$candidate->save();

		return $candidate;
	}

	function get_jobs_with_user_by_id($id)
	{
		$candidates = Candidate::whereJobId($id)->with('user')->get();

		return $candidates;
	}

	function get_job_by_applicant_and_job_id($input)
	{
		$candidate = Candidate::whereJobId($input['jobid'])->whereApplicantId($input['applicantid'])->first();
		$candidate->status = 'declined';
		$candidate->save();

		return $candidate;

	}

}