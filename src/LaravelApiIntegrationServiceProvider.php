<?php

namespace FenoAndria\LaravelApiIntegration;

use FenoAndria\LaravelApiIntegration\Commands\LaravelApiIntegrationCommand;
use FenoAndria\LaravelApiIntegration\Services\ApiClient;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelApiIntegrationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-api-integration')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_api_integration_table')
            ->hasCommand(LaravelApiIntegrationCommand::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // This line of code merges the configuration settings from the api-integration.php file, located in the same directory as the current file (__DIR__), into the Laravel application's configuration under the key api-integration.
        $this->mergeConfigFrom(__DIR__.'/config/api-integration.php', 'api-integration');

        // This code registers a singleton instance of ApiClient in the Laravel application container.
        // In simpler terms, it ensures that only one instance of ApiClient is created, and that instance is shared throughout the application. The instance is created with the base_url and api_key values from the api-integration configuration.
        $this->app->singleton(ApiClient::class, function ($app) {
            return new ApiClient(
                config('api-integration.base_url'),
                config('api-integration.api_key')
            );
        });
    }

    /**
     * Bootstrap the application services.
     *
     * This method is called after all other service providers have been registered,
     * meaning you have access to all other facade and container instances.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/api-integration.php' => config_path('api-integration.php'),
        ]);
    }
}
