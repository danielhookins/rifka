<?php

namespace rifka\Http\Middleware;

use Closure;

class CheckUserType
{
    /**
     * Check if the user matches the given user type:
     * Deny or Accept access request depending on mode variable
     * (default is to accept request).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $checkType
     * @param  string $mode
     * @return mixed
     */
    public function handle($request, Closure $next, $checkType, $mode = "Accept")
    {
        $userType = $request->user()->jenis;

        if ($mode == "Deny")
        {
            
            // Deny access to the specified usertype
            if ($userType == $checkType)
            {
                return response('Unauthorized.', 401);
            } 
            // Accept access request from all other usertypes
            else
            {
                return $next($request);
            }
        }
        else if ($mode == "Accept")
        {

            // Grant access to all Managers, Developers
            // and specified type
            if($userType == "Manager" || 
            $userType == "Developer" ||
            $userType == $checkType)
            {
                return $next($request);
            }
            else
            {
                return response('Unauthorized.', 401);
            }
        }
        
    }
}
