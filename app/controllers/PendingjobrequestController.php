<?php

use UniversalAgency\Repositories\PendingjobrequestRepository;
use UniversalAgency\Repositories\NotificationRepository;
use UniversalAgency\Repositories\UsersRepository;
use UniversalAgency\Repositories\JobsRepository;

class PendingjobrequestController extends \BaseController {

	protected $pendingjobrequest;
	protected $notification;
	protected $user;
	protectesd $job;

	function __construct(PendingjobrequestRepository $pendingjobrequest, NotificationRepository $notification, 
		UsersRepository $user, JobsRepository $job )
	{
		$this->pendingjobrequest = $pendingjobrequest;
		$this->notification = $notification;
		$this->user = $user;
		$this->job = $job;
	}

	function adminjobrequests()
	{
		$pendingjobrequests = $this->pendingjobrequest->get_requests_where_status_is(0);

		return View::make('admin.adminjobrequests')
		->withPendingjobrequests($pendingjobrequests);
	}

	function apply()
	{
		$pendingjobrequest = $this->pendingjobrequest->apply(Input::all());

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
		$job = $this->job->getJobById(Input::get('jobid'));

		$user = $this->user->getUserById(Input::get('applicantid'));

		$jobid = Input::get('jobid');

		$userid = Input::get('applicantid');

		$employerid = $job->employer()->first()->id;

		$pendingjobrequest = $this->pendingjobrequest->change_request_status_to_initial_screening($jobid, $userid);

		$this->notification->sendApproveRequest( $job->job_title, $user->resume()->first()->first_name, $userid, $employerid, $jobid );
	}

	function disapproverequest()
	{
		$job = $this->job->getJobById(Input::get('jobid'));
		
		$user = $this->user->getUserById(Input::get('applicantid'));	

		$jobid = $job->id;

		$userid = $user->id;

		$employerid = $job->employer()->first()->id;

		$pendingjobrequest = $this->pendingjobrequest->delete_and_change_status_to_decline($jobid, $userid);

		$this->notification->sendDisapproveRequest( $job->job_title, $user->resume()->first()->first_name, $userid, $employerid, $jobid );
	}

	function adminrequestapproval()
	{

	}
}