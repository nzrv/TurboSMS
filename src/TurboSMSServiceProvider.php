<?php

namespace Nzrv\TurboSMS;

use Illuminate\Support\ServiceProvider;

class TurboSMSServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('turbosms.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
           __DIR__.'/config/config.php', 'turbosms'
        );

        $this->app->bind('turbosms', function($app) {
            return new TurboSMS();
        });
    }
}