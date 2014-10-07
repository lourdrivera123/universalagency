<?php

use UniversalAgency\Forms\FormValidationException;
use UniversalAgency\Forms\PersonalityForm;
use UniversalAgency\Repositories\PersonalityTestRepository;
use UniversalAgency\Repositories\NotificationRepository;

class PersonalityTestController extends \BaseController {

	protected $personalitytest;
	protected $personalityForm;
	protected $notification;

	function __construct(PersonalityTestRepository $personalitytest, PersonalityForm $personalityForm, NotificationRepository $notification )
	{
		$this->personalitytest = $personalitytest;
		$this->personalityForm = $personalityForm;
		$this->notification = $notification;
	}

	function personalitytest()
	{
		if(!is_null(getPersonalityResult()))
		{
			return Redirect::to('personalityresult/'.getPersonalityResult()->hash);
		}

		$personalityquestions = $this->personalitytest->getAllQuestions();

		return View::make('applicant.personalitytest')
		->withPersonalityquestions($personalityquestions);
	}

	function personalityresult($hash)
	{
		$result = $this->personalitytest->getResult($hash);

		return View::make('applicant.personalityresult')
		->withResult($result->result)
		->withEmployerid($result->employerid)
		->withHash($hash);
	}

	function store()
	{
		try
		{
			$this->personalityForm->validate(Input::all());

			$result = $this->personalitytest->measurePersonality(Input::all());
			
			$personalitytest = $this->personalitytest->recordpersonalityresult($result);

			if ( checkIfUserHasTakenTests(Auth::user()->id) != 'all tests taken!' ){
				$testStatus = checkIfUserHasTakenTests(Auth::user()->id);

				if ( $testStatus == 'did not take iq test' )
				{
					return Redirect::to('personalityresult/'.$personalitytest->hash)
					->withReminder('Thank you for taking the test, you may now take the IQ test ');
				}
			}

				return Redirect::to('personalityresult/'.$personalitytest->hash)
					->withReminder('Thank you for taking the test, you may now continue applying for jobs');
			}
			catch (FormValidationException  $e)
			{
				return Redirect::back()->withInput()->withErrors($e->getErrors());
			}
		}
	}