<?php

class Iqresult extends \Eloquent {
	protected $fillable = [];

	function user()
	{
		return $this->belongsToMany('User', 'user_id');
	}
}