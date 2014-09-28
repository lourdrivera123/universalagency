<?php namespace UniversalAgency\Forms;

class ChangePassword extends Form {

	protected $rules = [
		'password' => 'required|confirmed'
	];
} 