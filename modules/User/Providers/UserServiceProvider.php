<?php

namespace Meraki\User\Providers;

use Illuminate\Support\ServiceProvider;
use Meraki\User\Contracts\UserRepositoryContract;
use Illuminate\Database\Eloquent\Relations\Relation;;
use Meraki\User\Infrastructure\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    public $bindings = [
        UserRepositoryContract::class => UserRepository::class,
    ];

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Infrastructure/Database/Migrations');

        // Custom Polymorphic Types
        // Relation::enforceMorphMap([
        //     'App\Models\User' => 'Meraki\User\Domain\Models\User',
        // ]);
    }
}
