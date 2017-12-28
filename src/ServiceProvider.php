<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-18
 * Time: 21:24
 */

namespace Ibrand\DatabaseLogger;



class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    protected $defer = true;

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('ibrand/dblogger.php'),
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'ibrand.dblogger'
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