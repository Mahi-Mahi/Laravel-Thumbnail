<?php

namespace Mahi\Thumbnail;

use Illuminate\Support\ServiceProvider;
use Mahi\Thumbnail\Console\ThumbnailCmd;

class ThumbnailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Optional methods to load your package assets
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-thumbnail');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-thumbnail');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-thumbnail.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-thumbnail'),
            ], 'views');*/

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-thumbnail'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-thumbnail'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
            if ($this->app->runningInConsole()) {
                $this->commands([
                    ThumbnailCmd::class,
                ]);
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-thumbnail');

        // Register the main class to use with the facade
        // $this->app->singleton('thumbnail', function () {
        //     return new Thumbnail();
        // });
        $this->app->bind('thumbnail', function () {
            return new Thumbnail();
        });
    }
}
