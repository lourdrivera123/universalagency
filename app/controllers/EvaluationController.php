<?php

use UniversalAgency\Forms\FormValidationException;
use UniversalAgency\Forms\EvaluationForm;
use UniversalAgency\Repositories\EvaluationRepository;

class EvaluationController extends \BaseController {

	protected $evaluationForm;
	protected $evaluation;

	function __construct(EvaluationForm $evaluationForm, EvaluationRepository $evaluation)
	{
		$this->evaluationForm = $evaluationForm;
		$this->evaluation = $evaluation;
	}

	function evaluateApplicant()
	{
		return View::make('staff.staffevaluateapplicant');
	}

	function store()
	{
		try
		{
			$this->evaluationForm->validate(Input::all());
			
			$evaluation = $this->evaluation->create(Input::all());

			return Redirect::to('/');

		}
		catch(FormValidationException  $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}
}