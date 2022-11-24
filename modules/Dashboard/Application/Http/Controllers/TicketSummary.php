<?php

namespace Meraki\Dashboard\Application\Http\Controllers;

use Illuminate\Http\Request;
use Meraki\Foundations\Application\BaseController;
use Meraki\Foundations\Domain\UserInformationTrait;
use Meraki\Ticket\Domain\Services\TicketService;
use Meraki\Ticket\Infrastructure\Repositories\TicketRepository;

class TicketSummary extends BaseController
{
    use UserInformationTrait;

    public function __construct(
        protected TicketRepository $ticketRepository,
        protected TicketService $ticketService,
    )
    {
        //
    }

    public function __invoke(Request $request)
    {
        // customer, customer-admin
        // agent, agent-admin

        // if current authenticated user is customer

        // if current


        if ($this->doesUserHasCustomerRole()) {
            return response()->json([
                'data' => [
                    'open' => $this->getUser()->tickets()->ofStatusCode(config('ticket.status.open'))->count(),
                    'closed' => $this->getUser()->tickets()->ofStatusCode(config('ticket.status.closed'))->count(),
                    'hello' => 'world',
                    'testing' => $this->ticketRepository->getUserTicketByStatusCode($this->getUser(), 1)->count(),
                ]
            ]);
        } elseif ($this->doesUserHasAgentRole()) {
            return response()->json([
                'data' => [
                    'open' => $this->getUser()->tickets()->ofStatusCode(config('ticket.status.open'))->count(),
                    'closed' => $this->getUser()->tickets()->ofStatusCode(config('ticket.status.closed'))->count(),
                ]
            ]);
        }


    }
}
