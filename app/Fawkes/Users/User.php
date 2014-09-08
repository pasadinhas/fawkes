<?php namespace Fawkes\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;

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
	protected $hidden = array('password', 'remember_token', 'access_token', 'refresh_token');

    protected $fillable = ['name', 'username', 'email'];

    public static function register($name, $username, $email)
    {
        return new static([
            'name' => $name,
            'username' => $username,
            'email' => $email,
        ]);
    }
}
