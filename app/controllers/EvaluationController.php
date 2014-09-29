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
		$user = User::find(Input::get('applicantid'));
		$name = $user->resume()->first()->first_name.' '.$user->resume()->first()->last_name;

		
		return View::make('staff.staffevaluateapplicant')
		->withApplicantid($user->id)
		->withJobid(Input::get('jobid'))
		->withName($name);
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

	function adminapplicantevaluation($id)
	{
		$evaluation = Evaluation::with('user', 'job')->findOrFail($id);
		
		return View::make('admin.applicantevaluation')
		->withEvaluation($evaluation);
	}
}