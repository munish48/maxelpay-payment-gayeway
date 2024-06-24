<?php

namespace Maxelpay;

use Illuminate\Support\ServiceProvider;

class MaxelpayServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/maxelpay.php',
            'maxelpay'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
       
        $this->publishes([
            __DIR__ . '/config/maxelpay.php' => config_path('maxelpay.php'),
        ]);
    }
}

