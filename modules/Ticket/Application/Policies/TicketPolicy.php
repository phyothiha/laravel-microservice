<?php

namespace Meraki\Ticket\Application\Policies;

use Meraki\User\Domain\Models\User;
use Meraki\Ticket\Domain\Models\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function updateContent(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->agent_id ||
               $user->id === $ticket->customer_id;
    }

    public function updateProperty(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->agent_id ||
               $user->id === $ticket->customer_id;
    }

    public function createReply(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->customer_id ||
               $user->id === $ticket->agent_id;
    }
}
