<?php

namespace App\Http\Middleware;

use Closure;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd(\Route::current());exit;
        $access_allowed = true;
        $controller = class_basename(\Route::current()->controller);
//        switch ($controller) {
//            case "UserController":
//                $access_allowed = check_privilege('users');
//                break;
//        }
        if (!$access_allowed)
            return redirect('/cwadmin/not_authorized');
        return $next($request);
    }
}
