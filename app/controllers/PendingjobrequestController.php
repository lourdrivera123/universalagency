<?php

use UniversalAgency\Repositories\PendingjobrequestRepository;
use UniversalAgency\Repositories\NotificationRepository;

class PendingjobrequestController extends \BaseController {

	protected $pendingjobrequest;
	protected $notification;

	function __construct(PendingjobrequestRepository $pendingjobrequest, NotificationRepository $notification)
	{
		$this->pendingjobrequest = $pendingjobrequest;
		$this->notification = $notification;
	}

	function adminjobrequests()
	{
		$pendingjobrequests = Pendingjobrequest::where('status', 0)->get();

		return View::make('admin.adminjobrequests')
		->withPendingjobrequests($pendingjobrequests);
	}

	function apply()
	{
		$pendingjobrequest = $this->pendingjobrequest->apply(Input::all());

		// $user = User::findOrFail(Input::get('applicant_id'));
		$resume = Auth::user()->resume()->first();
		$resume->status = 'application';
		$resume->save();

		return Response::json(['status' => 'request sent', 'id' => $pendingjobrequest->id]);
	}

	function listrequestingapplicants()
	{
		$requestingapplicants = $this->pendingjobrequest->listrequestingapplicants(Input::all());

		return $requestingapplicants;
	}

	function approverequest()
	{
		$job = Job::find(Input::get('jobid'));
		$user = User::find(Input::get('applicantid'));
		
		$jobid = Input::get('jobid');
		$userid = Input::get('applicantid');

		$employerid = $job->employer()->first()->id;

		$pendingjobrequest = Pendingjobrequest::whereJobId($jobid)->whereUserId($userid)->first();
		$pendingjobrequest->request_status = 'initial screening';
		$pendingjobrequest->save();

		$this->notification->sendApproveRequest( $job->job_title, $user->resume()->first()->first_name, $userid, $employerid, $jobid );
	}

	function disapproverequest()
	{
		$job = Job::find(Input::get('jobid'));
		$user = User::find(Input::get('applicantid'));
		$jobid = $job->id;
		$userid = $user->id;
		$employerid = $job->employer()->first()->id;

		$pendingjobrequest = Pendingjobrequest::whereJobId($jobid)->whereUserId($userid)->first();
		$pendingjobrequest->request_status = 'disapproved';
		$pendingjobrequest->save();

		$pendingjobrequest->delete();

		$this->notification->sendDisapproveRequest( $job->job_title, $user->resume()->first()->first_name, $userid, $employerid, $jobid );
	}

	function adminrequestapproval()
	{

	}
}