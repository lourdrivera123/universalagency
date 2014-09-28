<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Jobcategory extends \Eloquent {
	protected $fillable = [];
	use SoftDeletingTrait;
	protected $softDelete = true; 

	protected $dates = ['deleted_at'];

	// function resume()
	// {
	// 	return $this->hasMany('Resume', 'position_desired');
	// }

	function job()
	{
		return $this->hasMany('Job');
	}

	function candidate()
	{
		return $this->hasMany('Candidate');
	}
}