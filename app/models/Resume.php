<?php

class Resume extends \Eloquent {
	protected $fillable = [];
	protected $table = 'resume_info';

	function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	function jobhistory()
	{
		return $this->hasMany('Jobhistory');
	}	

	function education()
	{
		return $this->hasMany('Education');
	}

	// function jobcategory()
	// {
	// 	return $this->hasOne('Jobcategory', 'id');
	// }

	function resumepdf()
	{
		return $this->hasOne('Resumepdf');
	}

	function getFullNameAttribute()
	{
		return $this->attributes['first_name'] .' '.$this->attributes['last_name'];
	}

	function candidate()
	{
		return $this->hasMany('Candidate', 'applicant_id');
	}
}