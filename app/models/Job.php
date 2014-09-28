<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Job extends \Eloquent {
	protected $fillable = [];

	use SoftDeletingTrait;
	protected $softDelete = true; 

	protected $dates = ['deleted_at'];
	
	function employer()
	{
		return $this->belongsTo('Employer', 'company');
	}

	function category()
	{
		return $this->belongsTo('Jobcategory', 'job_category');
	}

	function candidate()
	{
		return $this->hasMany('Candidate');
	}

	function pendingjobrequest()
	{
		return $this->hasMany('Pendingjobrequest');
	}	
	
}