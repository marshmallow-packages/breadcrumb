<?php

namespace Marshmallow\Breadcrumb;

use Illuminate\Support\ServiceProvider;
use Marshmallow\Breadcrumb\Console\Commands\CreateCrumbCommand;
use Marshmallow\Breadcrumb\Console\Commands\InstallCommand;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Breadcrumb::class, function ($app) {
            return new Breadcrumb(config('breadcrumb'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Views
         */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'marshmallow');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/marshmallow'),
        ]);


        /**
         * Config
         */
        $this->publishes([
            __DIR__.'/../config/breadcrumb.php' => config_path('breadcrumb.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                CreateCrumbCommand::class,
            ]);
        }
    }
}
