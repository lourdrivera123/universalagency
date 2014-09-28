<?php namespace UniversalAgency\Forms;

class EvaluationForm extends Form {

	protected $rules = [
		'rating' => 'required',
		'evaluation' => 'required'
	];
} 