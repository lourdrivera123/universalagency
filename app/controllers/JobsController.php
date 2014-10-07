<?php

use UniversalAgency\Repositories\JobsRepository;
use UniversalAgency\Repositories\JobCategoriesRepository;
use UniversalAgency\Repositories\EmployersRepository;
use UniversalAgency\Repositories\ContractsRepository;

class JobsController extends \BaseController {
	
	protected $job;
	protected $jobcategory;
	protected $employer;
	protected $contract;
	
	function __construct(JobsRepository $job, JobCategoriesRepository $jobcategory, 
		EmployersRepository $employer, ContractsRepository $contract )
	{
		$this->job = $job;
		$this->jobcategory = $jobcategory;
		$this->employer = $employer;
		$this->contract = $contract;
	}

	function adminaddjob()
	{		
		$jobcategories = $this->jobcategory->listcategories();

		$businesses = $this->employer->listemployers();

		return View::make('admin.adminaddjob')
		->withJobcategories($jobcategories)
		->withBusinesses($businesses);
	}

	function adminjobs()
	{
		$jobs = $this->job->get_all_jobs_with_trashed();

		$businesses = $this->employer->listemployers();

		$jobcategories = $this->jobcategory->listcategories();

		$contracts = $this->contract->list_employer_contracts();

		$allcontract = $this->contract->getAllContracts();

		$alljobs = $this->job->get_all_jobs();

		foreach( $allcontract as $allcon )
		{
			foreach ( $alljobs as $alljob)
			{
				if ( $allcon->job == $alljob->job_title )
				{
					unset( $allcon->job );
				}
			}
		}

		$contracts = $allcontract->lists('job', 'job');

		return View::make('admin.adminjobs')
		->withJobs($jobs)
		->withBusinesses($businesses)
		->withJobcategories($jobcategories)
		->withJobs($jobs)
		->withContracts($contracts);
	}

	function getjob($id)
	{
		try{

			$job = $this->job->get_job_with_trashed_by_id($id);

			$employerid = $job->employer()->first()->id;
	
			return View::make('applicant.job')
			->withJob($job);	

		} catch(Exception $e)
		{
			return View::make('404');
		}
		
	}

	function store()
	{
		$job = $this->job->create(Input::all());

		return Response::json(['id' => $job->id, 'category' => $job->category()->first()->category, 
			'businessname' => $job->employer()->first()->businessname, 'job_title' => $job->job_title, 
			'desc' => $job->description, 'requirements' => $job->requirements, 'gender' => $job->gender, 
			'agefrom' => $job->agefrom, 'ageto' => $job->ageto, 'education' => $job->education, 
			'minimumyearsofexperience' => $job->minimumyearsofexperience, 
			'others' => $job->others, 'maximumyearsofexperience' => $job->maximumyearsofexperience,
			'invitationexpiration' => $job->invitationexpiration, 'joblocation' => $job->location ]);

	}

	function update()
	{
		$job = $this->job->update(Input::all());

		return Response::json(['id' => $job->id, 'category' => $job->category()->first()->category, 
			'businessname' => $job->employer()->first()->businessname, 'job_title' => $job->job_title, 
			'desc' => $job->description, 'requirements' => $job->requirements, 'gender' => $job->gender, 
			'agefrom' => $job->agefrom, 'ageto' => $job->ageto, 'education' => $job->education, 
			'minimumyearsofexperience' => $job->minimumyearsofexperience, 
			'others' => $job->others, 'maximumyearsofexperience' => $job->maximumyearsofexperience,
			'invitationexpiration' => $job->invitationexpiration, 'joblocation' => $job->location ]);
	}

	function disable()
	{
		$job = $this->job->disable(Input::all());

		return Response::json(['id' => $job->id, 'jobname' => $job->job_title ]);
	}

	function enable()
	{
		$job = $this->job->enable(Input::all());
		
		return Response::json(['id' => $job->id, 'jobname' => $job->job_title]);
	}

	function checkJobTitle()
	{
		$job = $this->job->getJobByTitle(Input::all());

		if(count($job) > 0)
			return 'false';

		return 'true';
	}

	function checkJobTitleforUpdate()
	{
		$job = $this->job->getJobByTitle(Input::all());

		if( count($job) > 0 && Input::get('job_id') != $job->id )
			return 'false';

		return 'true';
	}

	function getcompanyname()
	{

		$employerid = $this->contract->get_contract_employer_id_by_job_title(Input::get('jobtitle'));
		
		$employername = $this->user->get_employer_name($employerid);	

		return $employername;
	}
}