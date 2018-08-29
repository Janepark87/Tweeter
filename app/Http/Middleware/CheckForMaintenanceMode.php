<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        'admin/*'
    ];


    public function handle($request, Closure $next)
    {
        if($this->app->isDownForMaintenance() && ! $this->app->shouldPassThrough($request))
        {
            throw new HttpException(503);

        }
        return $next($request);

    }
}
