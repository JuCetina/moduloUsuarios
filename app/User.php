<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'email', 'password', 'type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function profile() //Metodo para crear la relacion de la tabla users con user_profiles
	{
		return $this->hasOne('App\UserProfile'); 
		//Un usuario tiene un perfil
	}

	public function getFullNameAttribute()//Metodo magico
	{
		return $this->first_name." ".$this->last_name;
	}

	public function setPasswordAttribute($value)
	{
		if (!empty($value))
		{
			$this->attributes['password'] = bcrypt($value);
		}
		
	}

	public function scopeName($query, $name)
	{
		if(trim($name) != ""){
			$query->where(\DB::raw("CONCAT(first_name, ' ', last_name)"), "LIKE", "%$name%");
		}
	}
}
