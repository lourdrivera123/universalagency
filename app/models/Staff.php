<?php

class Staff extends \Eloquent {
	protected $fillable = [];

	protected $table = 'staff_info';

	function user(){
		return $this->belongsTo('User', 'user_id');
	}
}