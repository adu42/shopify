<?php

namespace Ado\Shopify\Http\Middleware;

use Closure;
use Ado\Shopify\Helper\Request;

class HasValidHmac
{
    protected $hmac;

    public function __construct(Request $hmac)
    {
        $this->hmac = $hmac;
    }
    public function handle($request, Closure $next)
    {
        if ($this->hmac->verify($request->all())) {
            return $next($request);
        }

        app()->abort(403, 'Client Error: 403');
    }
}