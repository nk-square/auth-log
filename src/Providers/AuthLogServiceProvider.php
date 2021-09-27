<?php

namespace Nksquare\AuthLog\Providers;

use Illuminate\Support\ServiceProvider;
use Nksquare\AuthLog\Console\Commands\AuthLogTable;

class AuthLogServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ .'/../config/authlog.php', 'authlog');

        $this->publishes([
            __DIR__.'/../config/authlog.php' => config_path('authlog.php')
        ],'authlog-config');

        if ($this->app->runningInConsole()) 
        {
            $this->commands([AuthLogTable::class]);
        }
    }
}
