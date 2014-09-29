<?php

class Contract extends \Eloquent {
	protected $fillable = [];

	protected $table = 'contracts';

	function employer()
	{
		return $this->belongsTo('Employer', 'employer');
	}
}