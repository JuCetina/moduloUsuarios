<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */ 
	public function index()
	{
		$users = User::paginate();
		return view('admin.users.index', compact('users'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(/**Request $request**/ CreateUserRequest $request)
	{	/** PARA LAS DOS PRIMERAS OPCIONES USAR EL PARAMETRO COMENTADO **/
		/** Usando Validator **/
		//$data = $request->all();

		//$rules = array(
		//	'first_name' => 'required', 
		//	'last_name' => 'required', 
		//	'email' => 'required', 
		//	'password' => 'required', 
		//	'type' => 'required'
		//);

		//$v = Validator::make($data, $rules);
		
		//if($v->fails())
		//{
		//	return redirect()->back()
		//	->withErrors($v->errors())
		//	->withInput($request->except('password'));
		//}

		/** Usando validate() **/
		//$rules = array(
		//	'first_name' => 'required', 
		//	'last_name' => 'required', 
		//	'email' => 'required', 
		//	'password' => 'required', 
		//	'type' => 'required'
		//);
		//$this->validate($request, $rules);

		$user = User::create($request->all());

		return \Redirect::route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditUserRequest $request)
	{
		$user = User::findOrFail($id);
		$user->fill($request->all());
		$user->save();

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
