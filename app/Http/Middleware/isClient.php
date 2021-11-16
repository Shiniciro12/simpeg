<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Models\Identitas;
use Closure;

class isClient
{
    public function handle($request, Identitas $identitas, Closure $next)
    {
        if (!Auth::check() || $identitas->hasRole('client')) {
            abort(403);  // for other user throw 403 for forbiden
        }
        return $next($request);
    }
}
