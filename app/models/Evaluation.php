<?php

class Evaluation extends \Eloquent {
	protected $fillable = [];

	protected $table = 'evaluations';

	function user()
	{
		return $this->belongsTo('User', 'applicant_id')->withTrashed();
	}

	function job()
	{
		return $this->belongsTo('Job', 'job_id')->withTrashed();
	}
}