<?php

namespace Modules\RedisDriver\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\RedisDriver\Services\RedisOverrideService;

class RedisDriverServiceProvider extends ServiceProvider
{
    private const MODULE_NAME = 'redisdriver';

    public function register(): void
    {
        // RedisOverrideService::override();
        $this->app->booting(function () {
            RedisOverrideService::override();
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', self::MODULE_NAME);
        $this->hooks();
    }

    public function registerViews()
    {
        $viewPath = resource_path('views/modules/redisdriver');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/redisdriver';
        }, \Config::get('view.paths')), [$sourcePath]), 'redisdriver');
    }

    /**
     * Module hooks.
     */
    public function hooks()
    {
    }
}
