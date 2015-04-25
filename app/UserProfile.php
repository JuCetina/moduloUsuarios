<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	public function getAgeAttribute()
	{
		return \Carbon\Carbon::parse($this->birthdate)->age; //Carbon componente incluido con laravel que permite trabajar con fechas
	}

}
