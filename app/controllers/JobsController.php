<?php

use UniversalAgency\Repositories\JobsRepository;

class JobsController extends \BaseController {
	
	protected $job;
	
	function __construct(JobsRepository $job)
	{
		$this->job = $job;
	}

	function adminaddjob()
	{
		$jobcategories = Jobcategory::lists('category', 'id');
		$businesses = Employer::lists('businessname', 'id');

		return View::make('admin.adminaddjob')
		->withJobcategories($jobcategories)
		->withBusinesses($businesses);
	}

	function adminjobs()
	{
		$jobs = Job::withTrashed()->get();
		$businesses = Employer::lists('businessname', 'id');
		$jobcategories = Jobcategory::lists('category', 'id');
		$contracts = Contract::lists('job', 'id');

		$allcontract = Contract::all();
		// dd($allcontract)
		$alljobs = Job::all();
		// dd($alljob);
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
			$job = Job::findOrFail($id);
			$employerid = $job->employer()->first()->id;
			
			if (Session::has('employerid'))
			{
				Session::forget('employerid');
			} else {
				Session::put('employerid', $employerid);				
			}

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
		$employerid = Contract::whereJob(Input::get('jobtitle'))->first()->employer;
		
		$employername = User::find($employerid)->employer()->first()->businessname;

		return $employername;
	}
}