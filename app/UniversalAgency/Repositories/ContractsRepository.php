<?php namespace UniversalAgency\Repositories;

use Contract;

class ContractsRepository {

	function adminsaveemployercontract($input, $generatedpdf)
	{
		$contract = new Contract;
		$contract->salary = $input['salary'];
		$contract->job = $input['job'];
		$contract->num_of_employees = $input['num_of_employees'];
		$contract->employer = $input['employer'];
		$contract->other = $input['others'];
		$contract->path = $generatedpdf;
		$contract->cut_off_period = $input['cut_off_period'];
		$contract->save();

		return $contract;
	}
}