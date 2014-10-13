<?php

use UniversalAgency\Repositories\EmployersRepository;
use UniversalAgency\Repositories\UsersRepository;
use Illuminate\Support\Collection as Collection;

class EmployersController extends \BaseController {

	protected $employer;
	protected $user;

	function __construct(EmployersRepository $employer, UsersRepository $user)
	{
		$this->employer = $employer;
		$this->user = $user;
	}

	function getemployer($id)
	{
		$employer = Employer::findOrFail($id);
		$job = Job::whereCompany($id)->get();

		return View::make('employer.employer')
		->withEmployer($employer)
		->withJob($job);
	}

	function employerchangepassword()
	{
		return View::make('employer.changepassword');
	}

	function adminemployers()
	{
		$employers = Employer::all();
		
		return View::make('admin.adminemployers')
		->withEmployers($employers);
	}

	function store()
	{
		$randomPass = $this->employer->generateRandomString();
		$user = $this->user->createEmployer(Input::all(), $randomPass);
		$employer = $this->employer->create(Input::all(), $randomPass, $user);

		return Response::json(['id' => $employer->id, 'photo' => $employer->photo, 'businessname' => $employer->businessname, 'email' => $user->email, 'phone_number' => $employer->phone_number, 'address' => $employer->address, 'deschasdas' => $employer->description, 'businesstype' => $employer->businesstype ]);
	}

	function update()
	{
		$employer = $this->employer->update(Input::all());
		$user = $this->user->updateEmail(Input::all(), $employer);

		return Response::json(['id' => $employer->id, 'photo' => $employer->photo, 'businessname' => $employer->businessname, 'email' => $user->email, 'phone_number' => $employer->phone_number, 'address' => $employer->address, 'deschasdas' => $employer->description, 'businesstype' => $employer->businesstype]);
	}

	function disable()
	{
		$employer = $this->employer->disable(Input::all());

		return Response::json(['id' => $employer->id, 'businessname' => $employer->businessname ]);
	}

	function enable()
	{
		$employer = $this->employer->enable(Input::all());

		return Response::json(['id' => $employer->id, 'businessname' => $employer->businessname]);
	}

	function checkBusinessName()
	{
		$status = $this->employer->checkBusinessName(Input::all());

		return $status;
	}

	function checkEmployerPhoneNumber()
	{
		$status = $this->employer->checkEmployerPhoneNumber(Input::all());

		return $status;
	}

	function employerdtrupload()
	{
		$recruitcontracts = Recruitcontract::whereEmployerId(Auth::user()->id)->get();

		$collection = new Collection;

		foreach( $recruitcontracts as $recruitcontract )
		{
			$user = User::findOrFail($recruitcontract->employee_id);
			$resume = $user->resume()->first();

			$collection->push($resume);
		}

		// dd($collection);

		return View::make('employer.employerdtrupload')->withEmployees($collection->lists('last_name', 'user_id'));
	}

	function showreports()
	{
		$dtrs = Dtr::whereEmployerid(Auth::user()->id)->get();

		return View::make('employer.employerreports')
		->withDtrs($dtrs);
	}

	function employer_payroll_summary_upload()
	{
		$recruitcontracts = Recruitcontract::whereEmployerId(Auth::user()->id)->get();

		$collection = new Collection;

		foreach( $recruitcontracts as $recruitcontract )
		{
			$user = User::findOrFail($recruitcontract->employee_id);
			$resume = $user->resume()->first();

			$collection->push($resume);
		}

		return View::make('employer.employer_payroll_summary_upload')->withEmployees($collection->lists('last_name', 'user_id'));
	}
}