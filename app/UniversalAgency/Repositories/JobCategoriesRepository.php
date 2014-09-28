<?php namespace UniversalAgency\Repositories;

use Jobcategory;

class JobCategoriesRepository {

	function create($input)
	{
		$jobcategory = new Jobcategory;
		$jobcategory->category = $input['category_name'];
		$jobcategory->description = $input['description'];
		$jobcategory->save();

		return $jobcategory;
	}

	function update($input)
	{
		$jobcategory = Jobcategory::withTrashed()->findOrFail($input['jobcategory_id']);
		$jobcategory->category = $input['category_name'];
		$jobcategory->description = $input['description'];
		$jobcategory->save();

		return $jobcategory;
	}

	function disable($input)
	{
		$jobcategory = Jobcategory::withTrashed()->findOrFail($input['id']);
		$jobcategory->delete();

		return $jobcategory;
	}

	function enable($input)
	{
		$jobcategory = Jobcategory::withTrashed()->findOrFail($input['id']);
		$jobcategory->restore();

		return $jobcategory;
	}

	function listcategories()
	{
		$jobcategories = Jobcategory::lists('category', 'id');

		return $jobcategories;
	}

	function checkUniqueJobcategory($input)
	{
		$jobcategory = Jobcategory::whereCategory($input['category_name'])->first();

		if(count($jobcategory) > 0){

		if( isset($input['jobcategory_id']) && $input['jobcategory_id'] == $jobcategory->id )
		{

			return 'true';
		} else {

			return 'false';
		}

		}
		return 'true';
	}
}