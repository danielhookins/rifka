<?php namespace rifka\Http\Middleware;

use Closure;

class CheckUserType {

  /*
  |--------------------------------------------------------------------------
  | Check User Type Middleware
  |--------------------------------------------------------------------------
  |
  | Check against an array of allowed user types
  | NOTE: Requires PHP v.5.6+
  |
  */

  public function handle($request, Closure $next, ...$params) {
    $userType = $request->user()->jenis;
    
    // Correct User Type
    if (in_array($userType, $params)) return $next($request);

    // Incorrect User Type
    return response('Unauthorized.', 401);
  }
  
}
