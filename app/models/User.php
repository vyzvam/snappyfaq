<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';
	protected $fillable = array('username', 'password');

	public $rules = array(
		'username' 				=> 'required|unique:users||min:4',
		'password' 				=> 'required|alphaNum|between:4,8|confirmed',
		'password_confirmation' => 'required|alphaNum|between:4,8',
	);

	public function questions() { $this->hasMany('Question'); }
	public function answers() { $this->hasMany('Answer'); }


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}