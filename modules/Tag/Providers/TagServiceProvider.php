<?php

namespace Meraki\Tag\Providers;

use Illuminate\Support\ServiceProvider;
use Meraki\Tag\Contracts\TagRepositoryContract;
use Meraki\Tag\Infrastructure\Repositories\TagRepository;

class TagServiceProvider extends ServiceProvider
{
    public $bindings = [
        TagRepositoryContract::class => TagRepository::class,
    ];

    public function register()
    {
        // $this->mergeConfigFrom(__DIR__ . '/../config/Tag.php', 'Tag');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        // $this->loadMigrationsFrom(__DIR__ . '/../Infrastructure/Database/Migrations');
    }
}
