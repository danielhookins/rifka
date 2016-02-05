<?php

namespace rifka\Http\Middleware;

use Closure;

class CheckUserType
{

    /**
     * Take an array of allowed user types
     * NOTE: Php v.5.6 required for this function.
     */
    public function handle($request, Closure $next, ...$params)
    {
        $userType = $request->user()->jenis;
        
        // Correct User Type
        if (in_array($userType, $params)) return $next($request);

        // Incorrect User Type
        return response('Unauthorized.', 401);
    }
}
