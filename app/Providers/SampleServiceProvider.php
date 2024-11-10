<?php

namespace Mxent\Sample\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class SampleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'sample');
        $this->publishes([
            __DIR__.'/../../config/sample.php' => config_path('sample.php'),
        ], 'sample-config');
        $this->publishes([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], 'sample-migrations');
        $this->publishes([
            __DIR__.'/../../database/seeders' => database_path('seeders'),
        ], 'sample-seeders');
        $this->publishes([
            __DIR__.'/../../resources/lang' => $this->app->langPath('vendor/sample'),
        ], 'sample-lang');
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/sample'),
        ], 'sample-views');
        $this->publishes([
            __DIR__.'/../../resources/js' => resource_path('js/vendor/sample'),
        ], 'sample-js');
        $this->publishes([
            __DIR__.'/../../resources/css' => resource_path('css/vendor/sample'),
        ], 'sample-css');

        Vite::prefetch(concurrency: 3);
    }

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../../config/sample.php', 'sample');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'sample');
    }
}
