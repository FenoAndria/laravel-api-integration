<?php

namespace FenoAndria\LaravelApiIntegration\Commands;

use Illuminate\Console\Command;

class LaravelApiIntegrationCommand extends Command
{
    public $signature = 'laravel-api-integration';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
