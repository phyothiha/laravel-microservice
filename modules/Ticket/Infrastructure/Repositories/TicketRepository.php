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

    public function selectAll($limit = 10)
    {
        return $this->model->latest()->paginate($limit);
    }

    // customer_id, agent_id
    public function getUserTicketByStatusCode($user_id, $status_code)
    {
        return $this->model
                    ->ofStatusCode($status_code)
                    ->where('customer_id', $user_id);
    }

    // public function get


    // user's tickets -> customer pov
    // users tickets -> customer admin pov

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
