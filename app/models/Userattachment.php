<?php

class Userattachment extends \Eloquent {
	protected $fillable = [];

	protected $table = 'user_attachments';

	function user()
	{
		return $this->belongsTo('User', 'user_id');
	}	
}