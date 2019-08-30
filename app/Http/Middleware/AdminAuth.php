<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ログイン済かつ管理者でなければトップページにリダイレクト
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }
        return redirect('/')->with('alert_msg', '不正アクセスです');
    }
}
