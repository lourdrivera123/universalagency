<?php

use UniversalAgency\Forms\FormValidationException;
use UniversalAgency\Forms\EvaluationForm;
use UniversalAgency\Repositories\EvaluationRepository;
use UniversalAgency\Repositories\UsersRepository;

class EvaluationController extends \BaseController {

	protected $evaluationForm;
	protected $evaluation;
	protected $user;

	function __construct(EvaluationForm $evaluationForm, EvaluationRepository $evaluation 
		UsersRepository $user)
	{
		$this->evaluationForm = $evaluationForm;
		$this->evaluation = $evaluation;
		$this->user = $user;
	}

	function evaluateApplicant()
	{
		$user = $this->user->getUserById(Input::get('applicantid'));

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
		$evaluation = $this->evaluation->get_evaluation_with_job_and_user_by_id($id);
		
		return View::make('admin.applicantevaluation1')
		->withEvaluation($evaluation);
	}
}