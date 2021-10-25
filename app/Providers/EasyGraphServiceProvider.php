<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EasyGraphServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Services\EasyGraph', function ($app) {
            return new \App\Services\EasyGraph();
        });
    }
}
