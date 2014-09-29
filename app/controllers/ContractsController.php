<?php

use UniversalAgency\Repositories\ContractsRepository;
use UniversalAgency\Repositories\JobsRepository;
use UniversalAgency\Repositories\EmployersRepository;
use UniversalAgency\Repositories\ResumeRepository;
use UniversalAgency\Repositories\PdfgeneratorRepository;
use UniversalAgency\Repositories\NotificationRepository;

class ContractsController extends \BaseController {

	protected $contract;
	protected $job;
	protected $employer;
	protected $resume;
	protected $pdfgenerator;
	protected $notification

	function __construct(ContractsRepository $contract, JobsRepository $job,
	 EmployersRepository $employer, ResumeRepository $resume, PdfgeneratorRepository $pdfgenerator,
	 NotificationRepository $notification )
	{
		$this->contract = $contract;
		$this->job = $job;
		$this->employer = $employer;
		$this->resume = $resume;
		$this->pdfgenerator = $pdfgenerator;
		$this->notification = $notification;
	}

	function adminsetemployercontract()
	{
		$jobs = $this->job->listjobs();
		$employers = $this->employer->listemployers();
		$employees = $this->resume->getEmployees();

		return View::make('admin.adminsetemployercontract')
		->withJobs($jobs)
		->withEmployers($employers)
		->withEmployees($employees);
	}

	function generateEmployerContract()
	{
		$generatedpdf = $this->pdfgenerator->generateEmployerContract(Input::all());

		$contract = $this->contract->adminsaveemployercontract(Input::all(), $generatedpdf);

		// return $contract;
		return Response::json(['id' => $contract->id, 'contract_title' => $contract->contract_title ,'salary' => $contract->salary, 'job_title' => $contract->job, 'num_of_employees' => $contract->num_of_employees, 'businessname' => getEmployerName($contract->employer), 'cut_off_period' => $contract->cut_off_period ]);
	}

	function generateEmployeeContract()
	{
	
		$contract = new Recruitcontract;
		$contract->employee_id = Input::get('applicantidrecruitmentform');
		$contract->employer_id = Input::get('employeridrecruitmentform');
		$contract->job_id = Input::get('jobidrecruitmentform');
		$contract->percentage = Input::get('percentage');
		$contract->basic_pay = Input::get('basic_pay');
		$contract->starting_date = Input::get('starting_date');
		$contract->closing_date = Input::get('closing_date');
		$contract->save();

		$user = User::findOrFail($contract->employee_id);
		$resume = $user->resume()->first();
		$resume->status = 'hired';
		$resume->save();

		$candidate = Candidate::whereJobId($contract->job_id)->whereApplicantId($contract->employee_id)->first();
		$candidate->status = 'hired';
		$candidate->save();

		$job = Job::findOrFail($contract->job_id);

		//employee end
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $contract->employee_id;
		$notification->subject = 'You\'re Hired !';
		$notification->message = 'We would like to inform you that you are now hired for the job "'.$job->job_title.'". Happy Working ! :)';
		$notification->save();

		//employer end
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $contract->employer_id;
		$notification->subject = 'You now have a trusted worker';
		$notification->message = 'We would like to inform you that we have selected the qualifying worker for your job "'.$job->job_title.'". Happy Working ! :)';
		$notification->save();


		$job->delete();

		return Response::json($contract);
		// return Redirect::to('adminjobcandidates/'.$contract->job1_id);
	}

	function adminemployercontracts()
	{
		$contracts = Contract::all();
		$jobs = $this->job->listjobs();
		$employers = $this->employer->listemployers();
		// $employees = $this->resume->getEmployees();

		return View::make('admin.adminemployercontracts')
		->withContracts($contracts)
		->withJobs($jobs)
		->withEmployers($employers);
		// ->withEmployees($employees);
	}

}