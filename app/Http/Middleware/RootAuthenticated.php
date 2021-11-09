<?php

namespace App\Http\Middleware;

// use Auth;
use Illuminate\Support\Facades\Auth;
use Closure;

class RootAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            if ($request->user()->hasRole('bkppd')) {
                return redirect('/bkppd/dashboard');
            } else if ($request->user()->hasRole('unit-kerja')) {
                return redirect('/unit-kerja/dashboard');
            } else if ($request->user()->hasRole('client')) {
                return redirect('/client/dashboard');
            } else if ($request->user()->hasRole('root')) {
                return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
}
