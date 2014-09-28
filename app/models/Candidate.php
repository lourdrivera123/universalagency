<?php

class Candidate extends \Eloquent {
	protected $fillable = [];

	protected $table = 'candidates';

	function user()
	{
		return $this->belongsTo('User', 'applicant_id');
	}

	function job()
	{
		return $this->belongsTo('Job', 'job_id');
	}

	function jobcategory()
	{
		return $this->belongsTo('Jobcategory', 'job_category');
	}

	function resume()
	{
		return $this->belongsTo('Resume', 'user_id');
	}
}