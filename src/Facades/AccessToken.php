<?php

namespace Ado\Shopify\Facades;
use Illuminate\Support\Facades\Facade;
class AccessToken extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'accesstoken';
    }
}
