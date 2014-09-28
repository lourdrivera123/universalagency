<?php

class UploadRequirement extends \Eloquent {
	protected $fillable = [];
	protected $table = 'uploadrequirement';

	function user(){
		return $this->belongsTo('User', 'user_id');
	}	
}