<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Message extends \Eloquent {

	use SoftDeletingTrait;

	protected $softDelete = true; 

	protected $dates = ['deleted_at'];

	protected $fillable = [];

	protected $table = 'messages';

	function user() {
		return $this->belongsTo('User', 'to_userid');
	}
}