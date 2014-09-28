<?php namespace UniversalAgency\Repositories;

use User;
use Resume;
use Hash;
use Activation;
use Auth;
use Carbon\Carbon;
use Role;

class UsersRepository {

	function getUserById($id)
	{
		return User::find($id);
	}

	function updateEmail($input ,$employer)
	{
		$user = $employer->user()->first();
		$user->email = $input['email'];

		$user->save();

		return $user;
	}

	function createEmployer($input, $randomPass)
	{
		$user = new User;
		$user->email = $input['email'];
		$user->password = Hash::make($randomPass);
		$user->confirmed = 1;
		$user->save();

		$user->assignRole(2);

		return $user;
	}

	function createStaff($input, $randomPass)
	{
		$user = new User;
		$user->email = $input['email'];
		$user->password = Hash::make($randomPass);
		$user->confirmed = 1;
		$user->save();

		$user->assignRole(4);

		return $user;
	}
	
	function create($input)
	{
		$user = new User;
		$user->email = $input['email'];
		$user->password = Hash::make($input['password']);
		$user->save();

		$user->first_name = $input['first_name'];
		$user->last_name = $input['last_name'];

		$this->addConfirmToken($user->email);
		$this->addResume($user->id, $user->first_name, $user->last_name);

		$user->assignRole(1);

		return $user;
	}

	protected function addConfirmToken($email)
	{
		$token = new Activation;
		$token->token = md5(uniqid($email, true));
		$user = User::where('email', '=' ,$email)->first();
		$user->activation()->save($token);
	}

	function addResume($id, $firstname, $lastname)
	{
		$resume = new Resume;
		$resume->user_id = $id; 
		$resume->first_name = $firstname;
		$resume->last_name = $lastname;
		$resume->photo = '/images/applicant_pictures/user.jpg';
		$resume->position_desired = 1;
		$resume->birth_date = Carbon::now()->subYears(18)->toDateString(); 
		$resume->save();
	}

	function activate($token)
	{

		$activation = Activation::with('user')->where('token','=',$token)->first(); 	
		$user = $activation->user;
		
		//confirm user
		$user->confirmed =1;
		$user->save();

		//delete activation code
		$activation->delete();
	}

	function authenticate($input)
	{
		$credentials = [
			"email" => $input["email"],
			"password" => $input["password"],
			"confirmed" => 1
		];

		return Auth::attempt($credentials);
	}

	function authenticateadmin($input)
	{
		$credentials = [
			'email' => $input['email'],
			'password' => $input['password']
		];

		return Auth::attempt($credentials);
	}

	function update($password)
	{
		$user = Auth::user();
		$user->password = Hash::make($password);
		$user->save();
	}

	function isConfirmed($email)
	{
		$user = User::whereEmail($email)->first();
		
		if(!is_null($user))
		{	
			if($user->confirmed == 1) return true;
			return false;
		}

		return true;
	}

	function checkUniqueEmail($input)
	{
		$user = User::whereEmail($input['email'])->first();
		

		if(count($user) > 0){

		if( isset($input['employer_id']) && $input['employer_id'] == $user->employer()->first()->id )
		{

			return 'true';
		} else {

			return 'false';
		}

		}
		return 'true';
	}

	function getUserIdByEmail( $email )
	{
		$id = User::whereEmail($email)->first()->id;

		return $id;
	}

	function getAllStaff()
	{
		$role = Role::whereName('staff')->first();
		$staffs = $role->user()->get();

		return $staffs->lists('email', 'id');
	}

	function getAllApplicant()
	{
		$role = Role::whereName('applicant')->first();
		$applicants = $role->user()->get();

		return $applicants->lists('email', 'id');
	}
}