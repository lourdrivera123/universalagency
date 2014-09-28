<?php

class Invitation extends \Eloquent {
	protected $fillable = [];

	protected $table = 'invitations';

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
	
}