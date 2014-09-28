<?php

class Personalityquestion extends \Eloquent {
	protected $fillable = [];

	function answers()
	{
		return $this->hasMany('Personalityanswer', 'id');
	}
}