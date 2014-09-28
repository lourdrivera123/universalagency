<?php namespace UniversalAgency\Repositories;

use Pendingjobrequest;

class PendingjobrequestRepository {
	
	function apply($input)
	{
		$pendingjobrequest = new Pendingjobrequest;
		$pendingjobrequest->user_id = $input['applicantid'];
		$pendingjobrequest->job_id = $input['jobid'];
		$pendingjobrequest->save();

		return $pendingjobrequest;
	}

	function listrequestingapplicants($input)
	{
		$requestingapplicants = Pendingjobrequest::whereJobId($input['jobid'])->get();

		foreach ($requestingapplicants as $requestingapplicant)
		{
			$requestingapplicant->resume_id = $requestingapplicant->user()->first()->resume()->first()->id;
			$requestingapplicant->applicant_name = $requestingapplicant->user()->first()->resume()->first()->last_name.', '.$requestingapplicant->user()->first()->resume()->first()->first_name;
			$requestingapplicant->timeofrequest = ago($requestingapplicant->created_at);
		}

		return $requestingapplicants;
	}

	// function approverequest()
	// {
		
	// }
}