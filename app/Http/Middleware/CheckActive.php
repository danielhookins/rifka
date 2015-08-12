<?php namespace rifka\Http\Middleware;

use Closure;

class CheckActive{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
		if($request->user()->active)
		{
			return $next($request);
		}
		
		if ($request->ajax())
		{
			return response('Unauthorized.', 401);
		}
		else
		{
			return view('auth.inactive');
		}

	}

}
