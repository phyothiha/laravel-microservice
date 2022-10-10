<?php

namespace Meraki\Ticket\Providers;

use Meraki\Ticket\Domain\Models\Ticket;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Meraki\Ticket\Application\Policies\TicketPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Ticket::class => TicketPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
