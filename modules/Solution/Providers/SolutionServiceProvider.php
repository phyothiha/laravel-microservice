<?php

namespace Meraki\Solution\Providers;

use Illuminate\Support\ServiceProvider;
use Meraki\Solution\Contracts\SolutionRepositoryContract;
use Meraki\Solution\Infrastructure\Repositories\SolutionRepository;

class SolutionServiceProvider extends ServiceProvider
{
    public $bindings = [
        SolutionRepositoryContract::class => SolutionRepository::class,
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/solution.php', 'solution');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Infrastructure/Database/Migrations');
    }
}
