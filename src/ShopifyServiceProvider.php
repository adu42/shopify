<?php

namespace Ado\Shopify;

use Illuminate\Support\ServiceProvider;

class ShopifyServiceProvider extends ServiceProvider
{
    protected $defer = true; // 延迟加载服务
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'shopify');
        $this->mergeConfigFrom(__DIR__.'/config.php', 'shopify');

        $this->publishes([
            __DIR__.'/config.php' => config_path('shopify.php'),
            __DIR__.'/routes.php' => base_path('/routes/shopify.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind(Shopify::class, function () {
            return new Shopify(request('shop'));
        });

        $this->app->bind(Request::class, function () {
            return new Request(config('shopify.client_secret'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['shopify'];
    }
}
