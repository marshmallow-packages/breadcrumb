<?php

namespace Marshmallow\Breadcrumb;

use Illuminate\Support\ServiceProvider;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/breadcrumb.php',
            'breadcrumb'
        );

        $this->app->singleton(Breadcrumb::class, function () {
            $breadcrumb = new Breadcrumb;
            $breadcrumb->add(
                config('breadcrumb.default.name'),
                config('breadcrumb.default.url'),
                config('breadcrumb.default.icon')
            );

            return $breadcrumb;
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
    }
}
