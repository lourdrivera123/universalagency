<?php

use UniversalAgency\Repositories\EducationRepository;

class EducationController extends \BaseController {

	protected $education;

	function __construct(EducationRepository $education)
	{
		$this->education = $education;
	}

	function addEducation()
	{
		$education = $this->education->create(Input::all());

		return Response::json(['id' => $education->id, 'company_name' => $education->school_name,
			'desc' => $education->additional_notes, 'year_from' => $education->year_from_education,
			'year_to' => $education->year_to_education, 'level' => $education->degreelevel()->first()->levelname,
			'field_of_study' => $education->field_of_study ]);
	}

	function deleteEducation()
	{
		$education = $this->education->delete(Input::all());

		return 'deleted';
	}
}