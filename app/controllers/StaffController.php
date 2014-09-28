<?php

use UniversalAgency\Repositories\StaffRepository;
use UniversalAgency\Repositories\UsersRepository;

class StaffController extends \BaseController {

	protected $staff;
	protected $user;
	
	function __construct(StaffRepository $staff, UsersRepository $user)
	{
		$this->staff = $staff;
		$this->user = $user;	
	}

	function staff() {
		$staff = Staff::all();

		return View::make('admin.adminviewstaff')
		->withStaff($staff);
	}

	function checkStaffPhoneNumber()
	{
		$staff = Staff::wherePhoneNumber(Input::get('phone_number'))->first();

		if(count($staff) > 0){

		if( !is_null(Input::get('staff_id')) && Input::get('staff_id') == $staff->id )
		{

			return 'true';
		} else {

			return 'false';
		}

		}
		return 'true';
	}
	
	function store()
	{
		$randomPass = $this->staff->generateRandomString();
		$user = $this->user->createStaff(Input::all(), $randomPass);
		$staff = $this->staff->create(Input::all(), $randomPass, $user);

		return Response::json(['id' => $staff->id, 'photo' => $staff->photo, 'first_name' => $staff->first_name, 'last_name' => $staff->last_name, 'email' => $user->email, 'phone_number' => $staff->phone_number, 'address' => $staff->address]);
	}

	function home()
	{
		return View::make('staff.staffhome');
	}

	function staffchangepassword()
	{
		return View::make('staff.staffchangepassword');
	}

}