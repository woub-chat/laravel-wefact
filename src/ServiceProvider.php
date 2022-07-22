<?php

namespace Bfg\Wefact;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/wefact.php' => config_path('wefact.php')
        ], 'config');

        \Auth::provider('wefact', function ($app, array $config) {
            return new \Bfg\Wefact\Providers\WefactProvider();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Bfg\Wefact\Wefact', 'Wefact'];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias('Bfg\Wefact\Wefact', 'Wefact');
    }
}
