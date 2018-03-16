<?php

namespace Ado\Shopify;

use Ado\Shopify\Helper\Shopify;

class AccessToken
{
    protected $shopify;

    public function __construct(Shopify $shopify)
    {
        $this->shopify = $shopify;
    }

    public function request($code)
    {
        return $this->shopify->post('oauth/access_token', $this->requestData($code))->json();
    }

    protected function requestData($code)
    {
        return [
            'client_id' => config('shopify.client_id'),
            'client_secret' => config('shopify.client_secret'),
            'code' => $code,
        ];
    }
}