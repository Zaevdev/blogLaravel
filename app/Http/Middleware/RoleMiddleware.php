<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null): mixed
    {
        if (Auth::guest()) {
            abort(404);
        }

        if (!Auth::user()->hasRole($role)) {
            abort(404);
        }
        if ($permission !== null && !Auth::user()->can($permission)) {
            abort(404);
        }
        return $next($request);
    }
}