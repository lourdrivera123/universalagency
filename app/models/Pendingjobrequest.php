<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Pendingjobrequest extends \Eloquent {

	use SoftDeletingTrait;

	protected $softDelete = true; 

	protected $dates = ['deleted_at'];


	protected $fillable = [];

	function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	function job()
	{
		return $this->belongsTo('Job', 'job_id');
	}

	// function 
}