<?php

use UniversalAgency\Repositories\ContractsRepository;
use UniversalAgency\Repositories\JobsRepository;
use UniversalAgency\Repositories\EmployersRepository;
use UniversalAgency\Repositories\ResumeRepository;
use UniversalAgency\Repositories\PdfgeneratorRepository;

class ContractsController extends \BaseController {

	protected $contract;
	protected $job;
	protected $employer;
	protected $resume;
	protected $pdfgenerator;

	function __construct(ContractsRepository $contract, JobsRepository $job,
	 EmployersRepository $employer, ResumeRepository $resume, PdfgeneratorRepository $pdfgenerator )
	{
		$this->contract = $contract;
		$this->job = $job;
		$this->employer = $employer;
		$this->resume = $resume;
		$this->pdfgenerator = $pdfgenerator;
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