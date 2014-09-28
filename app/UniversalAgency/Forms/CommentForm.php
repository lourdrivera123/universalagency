<?php namespace UniversalAgency\Forms;

class CommentForm extends Form {

	protected $rules = [
		'name' => 'required',
		'message' => 'required',
		'email' => 'required'
	];
} 