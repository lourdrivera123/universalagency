<?php namespace UniversalAgency\Forms;

class Signin extends Form {

	protected $rules = [
		'email' => 'required|email',
		'password' => 'required|alpha_dash|min:6'
	];
} 