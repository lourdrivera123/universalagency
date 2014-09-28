<?php

class Interview extends \Eloquent {
	protected $fillable = [];

	protected $table = 'interviews';

	function staff()
	{
		return $this->belongsTo('User', 'staff_id');
	}

	function applicant()
	{
		return $this->belongsTo('User', 'applicant_id');
	}
	
}