<?php

class Resumepdf extends \Eloquent {
	protected $fillable = [];
	protected $table = 'resumepdfs';

	function resume()
	{
		return $this->belongsTo('Resume', 'resume_id');
	}
}