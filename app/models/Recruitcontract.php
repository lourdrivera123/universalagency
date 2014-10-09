<?php

class Recruitcontract extends \Eloquent {
	protected $fillable = [];

	protected $table = 'recruit_contracts';

	function contract()
	{
		return $this->belongsTo('Contract', 'contract_id');
	}
}