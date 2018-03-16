<?php

namespace Ado\Shopify\Facades;
use Illuminate\Support\Facades\Facade;
class Shopify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shopify';
    }
}
