<?php

namespace FenoAndria\LaravelApiIntegration;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use FenoAndria\LaravelApiIntegration\Commands\LaravelApiIntegrationCommand;

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
}
