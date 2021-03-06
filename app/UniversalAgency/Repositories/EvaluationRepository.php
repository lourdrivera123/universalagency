<?php namespace UniversalAgency\Repositories;

use Evaluation;
use Auth;
use UniversalAgency\Repositories\CandidatesRepository;

class EvaluationRepository {
		
	protected $candidate;

	function __construct( CandidatesRepository $candidate )
	{
		 $this->candidate = $candidate;
	}

	function create($input)
	{
		$evaluation = new Evaluation;
		$evaluation->applicant_id = $input['applicantid'];
		$evaluation->job_id = $input['jobid'];
		$evaluation->staff_id = Auth::user()->id;
		$evaluation->rating = $input['rating'];
		$evaluation->evaluation = $input['evaluation'];
		$evaluation->save();

		$candidate = $this->candidate->updateCandidateToUnderReview( $evaluation->applicant_id, $evaluation->job_id );

		return $evaluation;
	}

	function get_jobs_with_user_by_id($id)
	{
		$underreviews = Evaluation::whereJobId($id)->with('user')->get();

		return $underreviews;
	}

	function get_evaluation_with_job_and_user_by_id($id)
	{
		$evaluation = Evaluation::with('user', 'job')->findOrFail($id);

		return $evaluation;
	}

}