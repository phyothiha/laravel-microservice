<?php

namespace Meraki\Ticket\Infrastructure\Repositories;

use Meraki\Foundations\Infrastructure\BaseRepository;
use Meraki\Ticket\Contracts\TicketRepositoryContract;
use Meraki\Ticket\Domain\Models\Ticket;

class TicketRepository extends BaseRepository implements TicketRepositoryContract
{
    public function __construct(Ticket $model)
    {
        parent::__construct($model);
    }

    // public function newQuery()
    // {
    //     return $this->model->query();
    // }

    // public function assignToAgent($ticket_id, $agent_id)
    // {
    //     $column = ['agent_id' => $agent_id];

    //     return $this->updateById($column, $ticket_id);
    // }
}
