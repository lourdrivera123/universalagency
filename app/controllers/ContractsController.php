<?php

use UniversalAgency\Repositories\ContractsRepository;
use UniversalAgency\Repositories\JobsRepository;
use UniversalAgency\Repositories\EmployersRepository;
use UniversalAgency\Repositories\ResumeRepository;
use UniversalAgency\Repositories\PdfgeneratorRepository;
use UniversalAgency\Repositories\NotificationRepository;
use UniversalAgency\Repositories\UsersRepository;
use UniversalAgency\Repositories\CandidatesRepository;

class ContractsController extends \BaseController {

	protected $contract;
	protected $job;
	protected $employer;
	protected $resume;
	protected $pdfgenerator;
	protected $notification;
	protected $user;
	protected $candidate;

	function __construct(ContractsRepository $contract, JobsRepository $job,
	 EmployersRepository $employer, ResumeRepository $resume, PdfgeneratorRepository $pdfgenerator, 
	 NotificationRepository $notification, UsersRepository $user, CandidatesRepository $candidate )
	{
		$this->contract = $contract;
		$this->job = $job;
		$this->employer = $employer;
		$this->resume = $resume;
		$this->pdfgenerator = $pdfgenerator;
		$this->notification = $notification;
		$this->user = $user;
		$this->candidate = $candidate;
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
		// $generatedpdf = $this->pdfgenerator->generateEmployerContract(Input::all());

		$contract = $this->contract->adminsaveemployercontract(Input::all());

		return Response::json(['id' => $contract->id, 'contract_title' => $contract->contract_title ,'salary' => $contract->salary, 'job_title' => $contract->job, 'num_of_employees' => $contract->num_of_employees, 'businessname' => getEmployerName($contract->employer), 'cut_off_period' => $contract->cut_off_period ]);
	}

	function generateEmployeeContract()
	{
	
		$contract = $this->contract->generateEmployeeContract(Input::all());

		$user = $this->user->updateResumeStatusToHired($contract->employee_id);

		$candidate = $this->candidate->updateCandidateStatusToHired($contract->job_id, $contract->employee_id);

		$job = $this->job->getJobById($contract->job_id);

		$employee_notification = $this->notification->notify_employee_about_contract($contract->employee_id, $job->job_title);

		$employer_notification = $this->notification->notify_employer_about_contract($contract->employer_id, $job->job_title );

		if(check_if_slot_is_not_available($job->id))
		{
			$job->delete();
		}

		return Response::json($contract);
	}

	function adminemployercontracts()
	{
		$contracts = $this->contract->getAllContracts();
		
		$jobs = $this->job->listjobs();
		
		$employers = $this->employer->listemployers();

		return View::make('admin.adminemployercontracts')
		->withContracts($contracts)
		->withJobs($jobs)
		->withEmployers($employers);
	}

	function adminpoplulaterenewcontract()
	{
		$id = Input::get('contract_id');

		$contract = Contract::withTrashed()->findOrFail($id);

		return Response::json($contract);
	}

	function adminsaveemployercontractrenew()
	{
		$contract = $this->contract->adminsaveemployercontractrenew(Input::all());

		return $contract;
	}

	function admindeleteemployeecontract($id)
	{
		$recruitcontract = $this->contract->admindeleteemployeecontract($id);

		return Redirect::back();
	}
}