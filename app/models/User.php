<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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

	public function units(){
		return $this->hasMany("Unit");
	}

	public function leases(){
		return $this->hasMany("Lease");
	}

	public function workorders(){
		return $this->hasMany("Workorder");
	}

	public function replies(){
		return $this->hasMany("Reply");
	}

}
