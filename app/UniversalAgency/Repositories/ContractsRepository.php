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

	function adminsaveemployercontractrenew($input)
	{
		$contract = Contract::withTrashed()->findOrFail(1);
		$contract->salary = $input['salary_renew'];
		$contract->job = $input['job_renew'];
		$contract->num_of_employees = $input['num_of_employees_renew'];
		$contract->other = $input['others_renew'];
		$contract->cut_off_period = $input['cut_off_period_renew'];
		$contract->starting_date = $input['starting_date_renew'];
		$contract->closing_date = $input['closing_date_renew'];
		$contract->employmenttype = $input['employmenttype_renew'];
		$contract->save();

		$contract->restore();

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
		$contracts = Contract::withTrashed()->get();

		return $contracts;
	}

	function search_for_expiring_contracts_and_delete()
	{
		$contracts = Contract::where('closing_date', '<=', Carbon::now()->toDateString())->get();

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

	function admindeleteemployeecontract($id)
	{
		$recruitcontract = Recruitcontract::findOrFail($id);
		$recruitcontract->delete();

		return 'done';
	}
}