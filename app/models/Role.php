<?php

class Role extends \Eloquent {
	protected $fillable = [];

	function user()
	{
		return $this->belongsToMany('User');
	}
}