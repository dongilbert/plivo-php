<?php

namespace Treblig\Plivo\Laravel;

use Illuminate\Support\ServiceProvider;
use Treblig\Plivo\Plivo;

class PlivoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/plivo.php' => config_path('plivo.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    public function register()
    {
        $this->app->singleton('plivo', function($app) {
            return new Plivo(config('plivo.PLIVO_AUTH_ID'), config('plivo.PLIVO_AUTH_TOKEN'));
        });
    }
}