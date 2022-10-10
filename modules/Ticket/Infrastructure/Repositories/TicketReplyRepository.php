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
}
