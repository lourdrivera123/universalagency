<?php

class Personalityanswer extends \Eloquent {
	protected $fillable = ['question_id'];

	function question()
	{
		return $this->belongsTo('Personalityquestion', 'question_id');
	}
}