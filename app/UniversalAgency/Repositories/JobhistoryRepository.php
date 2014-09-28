<?php namespace UniversalAgency\Repositories;

use Jobhistory;

class JobhistoryRepository {
	
	function create($input)
	{
		$jobhistory = new Jobhistory;
		$jobhistory->resume_id = $input['resume_id'];
		$jobhistory->company_name = $input['company_name'];
		$jobhistory->title = $input['title'];
		$jobhistory->month_from = $input['month_from'];
		$jobhistory->year_from = $input['year_from'];
		$jobhistory->month_to = $input['month_to'];
		$jobhistory->year_to = $input['year_to'];
		$jobhistory->description = $input['description'];
		$jobhistory->save();

		return $jobhistory;
	}

	function delete($input)
	{
		$jobhistory = Jobhistory::findOrFail($input['id']);
		$jobhistory->delete();

		return 'deleted';
	}

}