<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user->is_admin === 0) {
            return  ! $request->expectsJson()
                ? response()->json(['message' => '无权限访问'])
                : response()->json(['message' => '无权限访问']);
        }

        return $next($request);
    }
}
