<?php
class Employer extends \Eloquent {
	protected $fillable = [];
	protected $table = 'employer_info';

	function job()
	{
		return $this->hasMany('Job');
	}

	function user()
	{
		return $this->belongsTo('User', 'user_id');
	}
}