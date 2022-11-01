<?php

namespace Meraki\Attachment\Providers;

use Illuminate\Support\ServiceProvider;
use Meraki\Attachment\Contracts\AttachmentRepositoryContract;
use Meraki\Attachment\Infrastructure\Repositories\AttachmentRepository;

class AttachmentServiceProvider extends ServiceProvider
{
    public $bindings = [
        AttachmentRepositoryContract::class => AttachmentRepository::class,
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/attachment.php', 'attachment');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Infrastructure/Database/Migrations');
    }
}
