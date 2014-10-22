<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;


class Contract extends \Eloquent {

	use SoftDeletingTrait;

	protected $fillable = [];

	protected $softDelete = true; 
	

	protected $dates = ['deleted_at'];


	protected $table = 'contracts';

	function employer()
	{
		return $this->belongsTo('Employer', 'employer')->withTrashed();
	}

	function recruitcontract()
	{
		return $this->hasMany('Recruitcontract')->withTrashed();
	}
}