<?php

class Education extends \Eloquent {
	protected $fillable = [];
	protected $table = 'education';

	function resume()
	{
		return $this->belongsTo('Resume', 'resume_id');
	}

	function degreelevel()
	{
		return $this->belongsTo('Degreelevel', 'degree_level');
	}
}