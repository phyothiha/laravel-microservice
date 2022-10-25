<?php

namespace Meraki\Ticket\Application\Http\Controllers;

use Meraki\Foundations\Application\BaseController;
use Meraki\Ticket\Domain\Models\Ticket;
use Meraki\Ticket\Domain\Services\TicketReplyService;
use Meraki\Ticket\Application\Http\Resources\TicketReplyResource;
use Meraki\Ticket\Application\Http\Requests\StoreTicketReplyRequest;

class TicketReplyController extends BaseController
{
    public function __construct(
        protected TicketReplyService $ticketReplyService
    )
    {
        //
    }

    public function index(int $ticket_id)
    {
        return TicketReplyResource::collection(
            $this->ticketReplyService->getAll($ticket_id)
        );
    }

    public function store(StoreTicketReplyRequest $request, int $ticket_id)
    {
        $validated = $request->safe()->only(['content']);

        // $cc_emails = $request->safe()->except(['content']);

        // $result = $this->ticketReplyService->create($validated, $ticket, $cc_emails);
        $result = $this->ticketReplyService->create($validated, $ticket_id);

        return new TicketReplyResource($result);
    }

    public function destroy(int $ticket_id, int $reply_id)
    {
        $this->ticketReplyService->delete($reply_id);

        return $this->simpleSuccessResponse('Ticket Deleted.');
    }
}
