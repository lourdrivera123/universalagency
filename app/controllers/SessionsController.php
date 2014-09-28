<?php

use UniversalAgency\Forms\FormValidationException;
use UniversalAgency\Forms\Signin;
use UniversalAgency\Repositories\UsersRepository;

class SessionsController extends \BaseController {

	protected $signinForm;
	protected $user;

	function __construct(Signin $signinForm, UsersRepository $user)
	{
		$this->signinForm = $signinForm;
		$this->user = $user;
	}

	function store()
	{
		if(!$this->user->isConfirmed(Input::get('email')))
			return Redirect::back()->withInput()->with('invalid_credentials', 'Please check your email and confirm your account');

		try {
			$this->signinForm->validate(Input::all());

			if($this->user->authenticate(Input::all())){

				if(Auth::user()->roles()->first()->id == 1)
				{	
					if( empty(Auth::user()->resume()->first()->titleofexpertise) )
					{
						return Redirect::to('create_resume')->withFlashMessage('Please Complete Your Profile');						
					
					} else if ( checkIfUserHasTakenTests(Auth::user()->id) != 'all tests taken!' ){
						$testStatus = checkIfUserHasTakenTests(Auth::user()->id);
						
						if ( $testStatus == 'did not take personality test')
						{
							return Redirect::to('pleasetakepersonalitytest')
							->withPersonalitytestreminder('Please take Personality test');
						
						} else if ( $testStatus == 'did not take iq test' )
						{
							return Redirect::to('pleasetakeiqtest')
							->withIqtestreminder('Please take IQ test');
						}
					}

					return Redirect::intended('joblist');
				}

				if(Auth::user()->roles()->first()->id == 2)
					return Redirect::intended('employerside');

				if(Auth::user()->roles()->first()->id == 3){
					Auth::logout();

					return Redirect::intended('adminlogin')->withFlashMessage('Admin must login here');
				
				if(Auth::user()->roles()->first()->id == 4)
					return Redirect::intended('staffside');

				}
			}

			return Redirect::back()->withInput()->with('invalid_credentials', 'Invalid Credentials');

		} catch(FormValidationException  $e){
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}

	function adminstore()
	{
		try {
			$this->signinForm->validate(Input::all());

			if($this->user->authenticateadmin(Input::all()))
				return Redirect::intended('adminviewreports');

			return Redirect::back()->withInput()->with('invalid_credentials', 'Invalid Credentials');

		} catch(FormValidationException  $e){
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}

	function destroy()
	{
		Auth::logout();

		return Redirect::to('signin');
	}

}