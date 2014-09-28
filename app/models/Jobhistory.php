<?php

class Jobhistory extends \Eloquent {
	protected $fillable = [];
	protected $table = 'job_history';

	function resume()
	{
		return $this->belongsTo('Resume', 'resume_id');
	}
}