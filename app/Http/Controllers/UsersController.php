<?php namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
	//Usando ORM
	public function getOrm()
	{
		//$users = User::get(); //Guarda en $users una coleccion con todos los registros de la tabla users

		//Combinacion de ORM con Fluent
		$users = User::select('id','first_name')
		->with('profile') //Para traer el perfil del usuario
		->where('first_name', '<>', 'Juliette')
		->orderBy('first_name', 'ASC')
		->get(); 

		//$user = User::first(); //El primer usuario

		//dd($user->full_name); //Metodo magico getFullNameAttribute
		//dd($user->profile); //Trae los datos del perfil del usuario
		//dd($user->profile->age); //Trae la edad registrada en el perfil de usuario
		//dd($users); //Muestra la coleccion
		dd($users->toArray()); //Muestra la coleccion convertida en array
	}

	//Usando Fluent
	public function getIndex()
	{
		$result = \DB::table('users')
		->select(
		 	'users.*',
		 	'user_profiles.id as profile_id',
		 	'user_profiles.twitter',
		 	'user_profiles.birthdate'
		 )
		//->where('first_name', '<>' ,'Juliette')
		->orderBy('users.id', 'ASC')
		//->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
		->leftjoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
		->get();

		foreach($result as $row)
		{
			$row->full_name = $row->first_name." ".$row->last_name;
			$row->age = \Carbon\Carbon::parse($row->birthdate)->age; //Carbon componente incluido con laravel que permite trabajar con fechas
		}

		dd($result);

		return $result;
	}
}