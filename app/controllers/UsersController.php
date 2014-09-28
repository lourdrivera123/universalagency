<?php

use UniversalAgency\Forms\FormValidationException;
use UniversalAgency\Forms\Signup;
use UniversalAgency\Forms\ChangePassword;
use UniversalAgency\Repositories\UsersRepository;


class UsersController extends \BaseController {

	protected $signupForm;
	protected $changepasswordForm;                     
	protected $user;

	function __construct(Signup $signupForm, UsersRepository $user, ChangePassword $changepasswordForm)
	{
		$this->signupForm = $signupForm;
		$this->changepasswordForm = $changepasswordForm;
		$this->user = $user;
		Event::listen('user.signup','UniversalAgency\Mailers\UserActivationMailer@send');
		Event::listen('user.changepassword', 'UniversalAgency\Mailers\ChangePasswordMailer@notify');
	}

	function changepassword()
	{
		return View::make('applicant.changepassword');
	}
	
	function store()
	{
		
		try
		{
			$this->signupForm->validate(Input::all());

			$user = $this->user->create(Input::all());

			Event::fire('user.signup',[$user]);

			return Redirect::to('signin')->withFlashMessage('Thank You For Joining Us ! <br/> You may now check your email and <strong>confirm</strong> your account');
		}
		catch(FormValidationException  $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}

	function activate($token)
	{
		try
		{
			$this->user->activate($token);	
		}
		catch(Exception $e)
		{
			return Redirect::to('signin')->withFlashMessage('You may have done this before, you\'re free to Sign In anyways');
		}

		return Redirect::to('signin')->withFlashMessage('Welcome! You can now login.');
	}

	function updatePassword()
	{
		try
		{		
			$user = Auth::user();
			
			if(!Hash::check(Input::get('oldpassword'), $user->password))
				return Redirect::back()->with('oldpass', 'Current Password don\'t match.');
			
			$this->changepasswordForm->validate(Input::all());

			$this->user->update(Input::get('password'));

			Event::fire('user.changepassword',[$user]);
			
			return Redirect::back()->withFlashMessage('Password Changed Succesfully!');
		}
		catch(FormValidationException  $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}

	function checkUniqueEmail()
	{
		$status = $this->user->checkUniqueEmail(Input::all());
		
		return $status;		
	}

	function checkmail()
	{
		return User::whereEmail('lourdrivera123@gmail.com')->first()->email;
	}

	function adminlogout()
	{
		Auth::logout();

		return Redirect::to('adminlogin');
	}
}