<?php

namespace Weirongxu\LaravelQueryRoute;

use Exception;
use Illuminate\Support\Facades\Config;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->bound('routes')) {
            throw new Exception('routes provider must register before query-route');
        }

        if (Config::get('query-route.enable', true)) {
            $this->app['url'] = new UrlGenerator($this->app['routes'], $this->app['request']);
        }

        $this->publishes([
            __DIR__ . '/../config/query-route.php' => config_path('query-route.php')
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
