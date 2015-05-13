<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request {

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
			'email' => 'required|unique:users,email', //Obligatorio, Unico y que revise en tabla users en el campo email
			'password' => 'required', 
			'type' => 'required'
		];
	}

}
