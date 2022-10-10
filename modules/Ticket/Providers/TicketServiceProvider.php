<?php

namespace Meraki\Ticket\Providers;

use Illuminate\Support\ServiceProvider;
use Meraki\Ticket\Providers\AuthServiceProvider;
use Meraki\Ticket\Contracts\TicketRepositoryContract;
use Meraki\Ticket\Contracts\TicketReplyRepositoryContract;
use Meraki\Ticket\Infrastructure\Repositories\TicketRepository;
use Meraki\Ticket\Infrastructure\Repositories\TicketReplyRepository;

class TicketServiceProvider extends ServiceProvider
{
    public $bindings = [
        TicketRepositoryContract::class => TicketRepository::class,
        TicketReplyRepositoryContract::class => TicketReplyRepository::class,
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ticket.php', 'ticket');

        $this->app->register(AuthServiceProvider::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Infrastructure/Database/Migrations');
    }
}
