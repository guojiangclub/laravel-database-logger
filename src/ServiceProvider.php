<?php

/*
 * This file is part of ibrand/laravel-database-logger.
 *
 * (c) ibrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iBrand\DatabaseLogger;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('ibrand/dblogger.php'),
            ]);
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'ibrand.dblogger'
        );

        $this->app->singleton(DbLogger::class, function ($app) {
            return new DbLogger();
        });

        $this->app[\Illuminate\Routing\Router::class]->middleware('databaselogger', Middleware::class);

        //$this->app[\Illuminate\Contracts\Http\Kernel::class]->pushMiddleware(Middleware::class);
    }

    public function provides()
    {
        return [DbLogger::class];
    }
}
