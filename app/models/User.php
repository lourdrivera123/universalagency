<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;
	
	protected $softDelete = true; 

	protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	function activation(){
		return $this->hasOne('Activation');
	}

	function resume()
	{
		return $this->hasOne('Resume');
	}

	function roles(){
		return $this->belongsToMany('Role')->withTimestamps();
	}

	function requirement(){
		return $this->hasMany('UploadRequirement');
	}

	function pendingjobrequest()
	{
		return $this->hasMany('Pendingjobrequest');
	}	

	function employer()
	{
		return $this->hasOne('Employer');
	}

	function hasRole($name)
	{
		foreach ($this->roles as $role)
		{
			if ($role->name == $name) return true;
		}

		return false;
	}

	function assignRole($role)
	{
		return $this->roles()->attach($role);
	}

	function removeRole($role)
	{
		return $this->roles()->detach($role);
	}

	function candidate()
	{
		return $this->hasMany('Candidate');
	}

	function staff() {
		return $this->hasOne('Staff');
	}

	function personalityresult()
	{
		return $this->hasOne('Personalityresult');
	}

	function iqresult()
	{
		return $this->hasOne('Iqresult');
	}

	function userattachment()
	{
		return $this->hasMany('Userattachment');
	}
}