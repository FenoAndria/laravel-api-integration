<?php

namespace FenoAndria\LaravelApiIntegration\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FenoAndria\LaravelApiIntegration\LaravelApiIntegration
 */
class LaravelApiIntegration extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \FenoAndria\LaravelApiIntegration\LaravelApiIntegration::class;
    }
}
