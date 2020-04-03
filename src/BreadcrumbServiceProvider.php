<?php

namespace Marshmallow\Breadcrumb;

use Illuminate\Support\ServiceProvider;
use Marshmallow\Breadcrumb\App\Console\Commands\InstallCommand;
use Marshmallow\Breadcrumb\App\Console\Commands\CreateCrumbCommand;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->loadViewsFrom(__DIR__.'/views/breadcrumb', 'breadcrumb');

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
        $this->loadViewsFrom(__DIR__.'/views', 'marshmallow');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/marshmallow'),
        ]);


        /**
         * Config
         */
        $this->publishes([
            __DIR__.'/config/breadcrumb.php' => config_path('breadcrumb.php')
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                CreateCrumbCommand::class,
            ]);
        }
    }
}
