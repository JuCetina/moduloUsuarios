<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditUserRequest extends Request {

	public function __construct(Route $route)
	{
		$this->route = $route;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'first_name' => 'required', 
			'last_name' => 'required', 
			'email' => 'required|unique:users,email,'. $this->route->getparameter('users'), //Ultima parte obtiene el id del usuario para hacer una exclusion del email del mismo par que permita guardar el mismo email
			'password' => '', 
			'type' => 'required|in:user,admin' //Para que el usuario solo ingrese esos valores por el select del formulario y no otros valores
		];
	}

}
