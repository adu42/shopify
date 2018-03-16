<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-3-16
 * Time: 12:12
 */
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Ado\Shopify\Http\Middleware\Authenticate;
use Ado\Shopify\Http\Middleware\HasShopDomain;
use Ado\Shopify\Http\Middleware\HasValidHmac;
use Ado\Shopify\Http\Middleware\HasValidHostname;
use Ado\Shopify\Http\Middleware\HasValidNonce;
use Ado\Shopify\Http\Middleware\RedirectIfAuthenticated;

Route::group(['namespace' => 'NickyWoolf\\Carter\\Http\\Controllers'], function (Router $router) {

    /* Guest Routes */
    $router->group(['middleware' => [RedirectIfAuthenticated::class]], function (Router $router) {

        $router->get('shopify/signup', 'InstalledAppsController@create')->name('carter.signup');

        $router->match(['get', 'post'], 'shopify/install', 'InstalledAppsController@store')->middleware([
            HasShopDomain::class,
        ])->name('carter.install');

        $router->get('shopify/register', 'RegisteredShopsController@store')->middleware([
            HasValidNonce::class,
            HasValidHmac::class,
            HasValidHostname::class,
        ])->name('carter.register');

        $router->get('shopify/login', 'AuthenticatedShopsController@store')->middleware([
            HasShopDomain::class,
        ])->name('carter.login');

        $router->get('/shopify/expired_session', 'ExpiredSessionsController@index')->name('carter.expired-session');

    });

    /* Auth Routes */
    $router->group(['middleware' => [Authenticate::class]], function (Router $router) {

        $router->get('shopify/dashboard', 'DashboardController@index')->name('carter.dashboard');

    });

});