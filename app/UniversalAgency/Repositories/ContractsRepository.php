<?php namespace UniversalAgency\Repositories;

use Contract;
use Recruitcontract;

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
		$contract->save();

		return $contract;
	}

	function getAllContracts()
	{
		$contracts = Contract::all();

		return $contracts;
	}

	function get_employee_contract_by_id($id)
	{
		$recruitcontracts = Recruitcontract::whereJobId($id)->get();

		return $recruitcontracts;
	}

	function get_contracts_by_employer_id($id)
	{
		$recruitcontracts = Recruitcontract::whereEmployerId($id)->get();

		return $recruitcontracts;
	}

	function list_employer_contracts()
	{
		$contracts = Contract::lists('job', 'id');

		return $contracts;
	}

	function get_contract_employer_id_by_job_title($title)
	{
		$employerid = Contract::whereJob($title)->first()->employer;

		return $employerid;
	}

	function get_employee_contracts_by_employee_id($id)
	{
		$recruitcontracts = Recruitcontract::whereEmployerId($id)->get();

		return $recruitcontracts;
	}
}