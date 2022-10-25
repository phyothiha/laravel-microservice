<?php

namespace Meraki\Ticket\Application\Http\Controllers;

use Meraki\Foundations\Application\BaseController;
use Meraki\Ticket\Domain\Services\TicketService;
use Meraki\Ticket\Application\Http\Requests\UpdateTicketPropertyRequest;

class TicketProperties extends BaseController
{
    public function __construct(
        protected TicketService $ticketService
    )
    {
        //
    }

    public function __invoke(UpdateTicketPropertyRequest $request, int $id)
    {
        $validated = $request->validated();

        $this->ticketService->update($id, $validated);

        return $this->simpleSuccessResponse('Ticket Properties Updated.');
    }
}
