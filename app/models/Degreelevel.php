<?php

class Degreelevel extends \Eloquent {
	protected $fillable = [];

	protected $table = 'degreelevels';

	function education()
	{
		return $this->hasMany('Education');
	}
}