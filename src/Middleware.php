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

use Closure;

class Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if any of logging type is enabled we will listen database to get all
        // executed queries
        if (config('ibrand.dblogger.log_queries') ||
            config('ibrand.dblogger.log_slow_queries')) {
            $user = null;
            $currentGuard = '';

            $guards = array_keys(config('auth.guards'));

            foreach ($guards as $guard) {
                if ($user = auth($guard)->user()) {
                    $currentGuard = $guard;
                    break;
                }
            }

            // create logger class
            $logger = app(DbLogger::class);

            $logger->setOperator($user);
            $logger->setGuard($currentGuard);

            // listen to database queries
            app('db')->listen(function ($query, $bindings = null, $time = null) use ($logger) {
                $logger->log($query, $bindings, $time);
            });
        }

        return $next($request);
    }
}
