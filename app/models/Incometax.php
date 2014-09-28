<?php

class Incometax extends \Eloquent {
	protected $fillable = ['brackets', 'over', 'not_over', 'amount', 'rate', 'excess'];

	protected $table = 'annual_income_tax';
}