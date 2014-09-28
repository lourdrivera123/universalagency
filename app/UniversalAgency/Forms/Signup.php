<?php namespace UniversalAgency\Forms;

class Signup extends Form {

	protected $rules = [
		'first_name' => 'required',
		'last_name' => 'required',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed|alpha_dash|min:6',
		'terms_and_conditions' => 'required'
	];
} 