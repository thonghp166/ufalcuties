<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdminLogin
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
        // nếu user đã đăng nhập
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu level =1 (admin)thì cho qua.
            if ($user->level == 1)
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('home');
            }
        } else
            return redirect()->route('login');
    }
}
