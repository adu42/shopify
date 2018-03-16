<?php

namespace Ado\Shopify\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return $next($request);
        }

        return redirect()->route('shopify.dashboard');
    }
}