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

	function get_jobs_with_user_by_id($id)
	{
		$jobrequests = Pendingjobrequest::whereJobId($id)->with('user')->get();
		
		return $jobrequests;
	}

	function get_requests_where_status_is($status)
	{
		$pendingjobrequests = Pendingjobrequest::where('status', $status)->get();

		return $pendingjobrequests;
	}

	function change_request_status_to_initial_screening($jobid, $userid)
	{
		$pendingjobrequest = Pendingjobrequest::whereJobId($jobid)->whereUserId($userid)->first();
		$pendingjobrequest->request_status = 'initial screening';
		$pendingjobrequest->save();

		return $pendingjobrequest;
	}

	function delete_and_change_status_to_decline($jobid, $userid)
	{
		$pendingjobrequest = Pendingjobrequest::whereJobId($jobid)->whereUserId($userid)->first();
		$pendingjobrequest->request_status = 'disapproved';
		$pendingjobrequest->save();

		$pendingjobrequest->delete();

		return $pendingjobrequest;
	}
}