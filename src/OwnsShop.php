<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-3-16
 * Time: 11:58
 */

namespace Ado\Shopify;

use Illuminate\Support\Str;
trait OwnsShop
{
    public static function createForShop($shop, $token)
    {
        return self::create([
            'name' => $shop['name'],
            'email' => $shop['email'],
            'password' => bcrypt(Str::random(30)),
            'shopify_id' => $shop['id'],
            'shopify_domain' => $shop['myshopify_domain'],
            'shopify_token' => $token['access_token'],
            'shopify_scope' => $token['scope'],
        ]);
    }

    public function scopeShopOwner($query, $shop)
    {
        return $query->where('shopify_domain', $shop);
    }
}