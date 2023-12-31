<?php

namespace Anam\LaravelShield;

use Anam\LaravelShield\Console\Commands\AppCleanup;
use Anam\LaravelShield\Http\Middleware\Maintenance;
use Anam\LaravelShield\Http\Middleware\ShieldAccess;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelShieldServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-shield.php', 'laravel-shield'
        );
    }

    public function boot()
    {
        /** @var Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', Maintenance::class);

        if (!$this->app->runningInConsole()) {
            Route::prefix('shield')
                ->middleware(ShieldAccess::class)
                ->group(__DIR__ . '/../routes/local.php');
        }

        $this->commands([
            AppCleanup::class,
        ]);
    }
}
