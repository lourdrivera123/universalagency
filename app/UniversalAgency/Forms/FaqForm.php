<?php namespace UniversalAgency\Forms;

class FaqForm extends Form {

	protected $rules = [
		'user_name' => 'required',
		'question' => 'required'
	];
} 