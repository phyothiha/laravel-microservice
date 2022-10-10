<?php

namespace Meraki\UserGroup\Providers;

use Illuminate\Support\ServiceProvider;
use Meraki\UserGroup\Contracts\UserGroupRepositoryContract;
use Meraki\UserGroup\Infrastructure\Repositories\UserGroupRepository;

class UserGroupServiceProvider extends ServiceProvider
{
    public $bindings = [
        UserGroupRepositoryContract::class => UserGroupRepository::class,
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/user-group.php', 'UserGroup');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Infrastructure/Database/Migrations');
    }
}
