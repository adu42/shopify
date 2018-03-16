<?php

namespace Ado\Shopify\Http\Controllers;


use Ado\Shopify\Helper\Shopify;
use Illuminate\Support\Str;

class InstalledAppsController extends Controller
{
    public function store(Shopify $shopify)
    {
        $s = Str::random(30);
        $nonce = tap($s, function ($nonce) {
            session(['carter.oauth-state' => $nonce]);
        });

        return redirect($this->authorizationUrl($shopify, $nonce));
    }

    protected function authorizationUrl($shopify, $nonce)
    {
        return $shopify->authorize(
            config('carter.client_id'), config('carter.scope'), config('carter.redirect_uri'), $nonce
        );
    }
}