<?php

use UniversalAgency\Repositories\JobCategoriesRepository;

class JobCategoriesController extends \BaseController {
	
	protected $jobcategory;

	function __construct(JobCategoriesRepository $jobcategory)
	{
		$this->jobcategory = $jobcategory;
	}

	function adminaddjobposition()
	{
		return View::make('admin.adminaddjobposition');
	}

	function adminjobcategories()
	{
		$jobcategories = Jobcategory::withTrashed()->get();
		return View::make('admin.adminjobcategories')
		->withJobcategories($jobcategories);
	}

	function store()
	{
		$jobcategory = $this->jobcategory->create(Input::all());

		return Response::json(['id' => $jobcategory->id, 'category' => $jobcategory->category, 'desc' => $jobcategory->description ]);
	}

	function update()
	{
		$jobcategory = $this->jobcategory->update(Input::all());

		return Response::json(['id' => $jobcategory->id, 'category_name' => $jobcategory->category, 'desc' => $jobcategory->description ]);
	}

	function disablejobcategory()
	{
		
		$jobcategory = $this->jobcategory->disable(Input::all());

		return Response::json(['id' => $jobcategory->id, 'category_name' => $jobcategory->category ]);
	}

	function enablejobcategory()
	{
		$jobcategory = $this->jobcategory->enable(Input::all());

		return Response::json(['id' => $jobcategory->id, 'category_name' => $jobcategory->category ]);
	}

	function checkUniqueJobcategory()
	{
		$status = $this->jobcategory->checkUniqueJobcategory(Input::all());

		return $status;
	}
}