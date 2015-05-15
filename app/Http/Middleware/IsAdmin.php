<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\SUpport\Facades\Session;

class IsAdmin {

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!$this->auth->user()->isAdmin())
		{
			$this->auth->logout();

			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				Session::flash('message', 'No tiene autorización para ingresar a este sitio.');
				return redirect()->to('auth/login');
			}
		}

		return $next($request);
	}

}
