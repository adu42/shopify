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
            session(['shopify.oauth-state' => $nonce]);
        });

        return redirect($this->authorizationUrl($shopify, $nonce));
    }

    protected function authorizationUrl($shopify, $nonce)
    {
        return $shopify->authorize(
            config('shopify.client_id'), config('shopify.scope'), config('shopify.redirect_uri'), $nonce
        );
    }
}