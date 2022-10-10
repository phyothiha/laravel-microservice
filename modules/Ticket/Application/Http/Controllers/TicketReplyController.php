<?php

namespace Meraki\Ticket\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Meraki\Ticket\Domain\Models\Ticket;
use Meraki\Ticket\Domain\Services\TicketReplyService;
use Meraki\Ticket\Application\Http\Resources\TicketReplyResource;
use Meraki\Ticket\Application\Http\Requests\StoreTicketReplyRequest;

class TicketReplyController extends Controller
{
    public function __construct(
        protected TicketReplyService $ticketReplyService
    )
    {
        //
    }

    public function store(StoreTicketReplyRequest $request, Ticket $ticket)
    {
        $inputs = $request->safe()->only(['content']);

        $cc_emails = $request->safe()->except(['content']);

        $result = $this->ticketReplyService->create($inputs, $ticket, $cc_emails);

        return new TicketReplyResource($result);
    }

    public function show()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
