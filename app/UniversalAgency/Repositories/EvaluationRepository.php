<?php namespace UniversalAgency\Repositories;

use Evaluation;
use Auth;

class EvaluationRepository {
	
	function create($input)
	{
		$evaluation = new Evaluation;
		$evaluation->applicant_id = $input['applicant_id'] ;
		$evaluation->staff_id = Auth::user()->id;
		$evaluation->rating = $input['rating'];
		$evaluation->evaluation = $input['evaluation'];
		$evaluation->save();

		return $evaluation;
	}

}