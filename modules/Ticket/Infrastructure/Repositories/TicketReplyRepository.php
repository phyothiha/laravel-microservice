<?php

namespace Meraki\Ticket\Infrastructure\Repositories;

use Meraki\Ticket\Domain\Models\TicketReply;
use Meraki\Foundations\Infrastructure\BaseRepository;
use Meraki\Ticket\Contracts\TicketRepositoryContract;

class TicketReplyRepository extends BaseRepository implements TicketRepositoryContract
{
    public function __construct(TicketReply $model)
    {
        parent::__construct($model);
    }

    public function selectAllByRelation(int $ticket_id, $limit = 10)
    {
        return $this->model->where('ticket_id', $ticket_id)
                    ->latest()
                    ->paginate($limit);
    }
}
