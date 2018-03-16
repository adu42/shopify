<?php

namespace Ado\Shopify\Facades;
use Illuminate\Support\Facades\Facade;
class Shop extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shop';
    }
}
