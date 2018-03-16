<?php

namespace Ado\Shopify\Http\Middleware;

use Closure;

class HasValidNonce
{
    public function handle($request, Closure $next)
    {
        if ($this->validNonce()) {
            return $next($request);
        }

        app()->abort(403, 'Client Error: 403');
    }

    protected function validNonce()
    {
        return strlen(request('state')) && request('state') === session('carter.oauth-state');
    }
}