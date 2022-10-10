<?php

namespace Meraki\Acme\Providers;

use Illuminate\Support\ServiceProvider;
use Meraki\Acme\Contracts\AcmeRepositoryContract;
use Meraki\Acme\Infrastructure\Repositories\AcmeRepository;

class AcmeServiceProvider extends ServiceProvider
{
    public $bindings = [
        AcmeRepositoryContract::class => AcmeRepository::class,
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/acme.php', 'Acme');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Infrastructure/Database/Migrations');
    }
}
