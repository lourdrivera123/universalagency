<?php namespace UniversalAgency\Repositories;

use Contract;
use Recruitcontract;
use Carbon\Carbon;

class ContractsRepository {

	function adminsaveemployercontract($input)
	{
		$contract = new Contract;
		$contract->salary = $input['salary'];
		$contract->job = $input['job'];
		$contract->num_of_employees = $input['num_of_employees'];
		$contract->employer = $input['employer'];
		$contract->other = $input['others'];
		// $contract->path = $generatedpdf;
		$contract->cut_off_period = $input['cut_off_period'];
		$contract->starting_date = $input['starting_date'];
		$contract->closing_date = $input['closing_date'];
		$contract->employmenttype = $input['employmenttype'];
		$contract->save();

		return $contract;
	}

	function generateEmployeeContract($input)
	{
		$contract = new Recruitcontract;
		$contract->employee_id = $input['applicantidrecruitmentform'];
		$contract->employer_id = $input['employeridrecruitmentform'];
		$contract->job_id = $input['jobidrecruitmentform'];
		$contract->percentage = $input['percentage'];
		$contract->basic_pay = $input['basic_pay'];
		$contract->contract_id = $input['contract_id'];
		$contract->save();

		return $contract;
	}

	function getAllContracts()
	{
		$contracts = Contract::withTrashed()->all();

		return $contracts;
	}

	function search_for_expiring_contracts_and_delete()
	{
		$contracts = Contract::where('closing_date', '=', Carbon::now()->toDateString())->get();

		foreach( $contracts as $contract )
		{
			$recruitcontracts = Recruitcontract::whereContractId($contract->id)->get();
			
			foreach ($recruitcontracts as $recruitcontract ) {
				$recruitcontract->delete();
			}

			$contract->delete();
		}

		return "done";
	}
}