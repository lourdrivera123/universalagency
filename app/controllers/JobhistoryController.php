<?php

use UniversalAgency\Repositories\JobhistoryRepository;

class JobhistoryController extends \BaseController {

	protected $jobhistory;

	function __construct(JobhistoryRepository $jobhistory)
	{
		$this->jobhistory = $jobhistory;
	}

	function addJobHistory()
	{
		$jobhistory = $this->jobhistory->create(Input::all());

		// return 'saved';
		return Response::json(['jobhistoryid' => $jobhistory->id, 'company_name' => $jobhistory->company_name, 'desc' => $jobhistory->description, 'jobtitle' => $jobhistory->title,
		 'fromdate' => date("F", strtotime("$jobhistory->year_from-$jobhistory->month_from-01")).' '.$jobhistory->year_from, 'todate' => date("F", strtotime("$jobhistory->year_from-$jobhistory->month_to-01")).' '.$jobhistory->year_to
		  ]);
	}

	function deleteJobhistory()
	{
		$jobhistory = $this->jobhistory->delete(Input::all());

		return 'deleted';
	}

}