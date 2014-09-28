<?php namespace UniversalAgency\Forms;

class ResumeForm extends Form {

	protected $rules = [
		'titleofexpertise' => 'required',
		'overview' => 'required',
		'position_desired' => 'required',
		'first_name' => 'required',
		'last_name' => 'required',
		'birth_date' => 'required|date',
		'gender' => 'required',
		'marital_status' => 'required',
		'phone_number' => 'required|alpha_num',
		'address' => 'required'
	];
} 