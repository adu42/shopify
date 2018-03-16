<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-3-16
 * Time: 11:27
 */
return [
    'client_key' => env('SHOPIFY_KEY'),
    'client_secret' => env('SHOPIFY_SECRET'),

    'redirect_uri' => env('APP_URL').'/shopify/register',

    'scope' => [
        'read_products',
        'read_orders',
    ],
];