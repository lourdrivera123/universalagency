<?php

use UniversalAgency\Repositories\IqTestRepository;
use UniversalAgency\Repositories\NotificationRepository;

class IqTestController extends \BaseController {

	protected $iqtest;
	protected $notification;

	function __construct(IqTestRepository $iqtest, NotificationRepository $notification)
	{
		$this->iqtest = $iqtest;
		$this->notification = $notification;
	}

	function iqtest()
	{
		// if ( !Session::has('employerid') )
		// 	return View::make('404');

		// $employerid = Session::get('employerid');

		if(!is_null(getIQResult()))
		{
			return Redirect::to('iqtestresult/'.getIQResult()->hash);
		}
		
		$iqquestions = $this->iqtest->getAllQuestions();

		return View::make('applicant.iqtest')
		->withIqquestions($iqquestions);
		
		// ->withEmployerid($employerid);
	}

	function iqtestresult($hash)
	{
		$iq = $this->iqtest->getTestResult($hash);

		$iq_result = $this->iqtest->identifyIq($iq->result);


		return View::make('applicant.iqtestresult')
		->withIq($iq->result)
		->withEmployerid($iq->employerid)
		->withIqresult($iq_result)
		->withHash($hash);
	}

	function store() 
	{
		$iq = $this->iqtest->measureIq(Input::all());

		$iqtestresult = $this->iqtest->recordIqTest($iq);

		if ( checkIfUserHasTakenTests(Auth::user()->id) != 'all tests taken!' ){
			$testStatus = checkIfUserHasTakenTests(Auth::user()->id);

			if ( $testStatus == 'did not take iq test' )
			{
				return Redirect::to('iqtestresult/'.$iqtestresult->hash)
				->withReminder('Thank you for taking the test, you may now take the Personality test ');
			}
		}

		// $employerid = $iqtestresult->employerid;

		// $userid = Auth::user()->id;

		// if ( hasTakenPersonalityTestOnSpecificEmployer($employerid, $userid ) )
		// {
		// 	$this->notification->allUpForTakingTests($employerid, $userid);
		// }

		return Redirect::to('iqtestresult/'.$iqtestresult->hash)
		->withReminder('Thank you for taking the test, you may now continue applying for jobs');

	}
}