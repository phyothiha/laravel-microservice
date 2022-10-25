<?php

namespace Meraki\Ticket\Application\Http\Controllers;

use Meraki\Ticket\Domain\Models\Ticket;
use Meraki\Ticket\Domain\Services\TicketService;
use Meraki\Foundations\Application\BaseController;
use Meraki\Ticket\Application\Http\Resources\TicketResource;
use Meraki\Ticket\Application\Http\Requests\StoreTicketRequest;
use Meraki\Ticket\Application\Http\Requests\UpdateTicketContentRequest;

class TicketController extends BaseController
{
    public function __construct(
        protected TicketService $ticketService
    )
    {
        //
    }

    public function index()
    {
        return TicketResource::collection(
            $this->ticketService->getAll()
        );
    }

    public function store(StoreTicketRequest $request)
    {
        $validated = $request->validated();

        $this->ticketService->create($validated);

        return $this->simpleSuccessResponse('Ticket Created.');
    }

    public function show(int $id)
    {
        return new TicketResource(
            $this->ticketService->findById($id)
        );
    }

    public function update(UpdateTicketContentRequest $request, int $id)
    {
        $validated = $request->validated();

        $this->ticketService->update($id, $validated);

        return $this->simpleSuccessResponse('Ticket Updated.');
    }

    public function destroy(int $id)
    {
        $this->ticketService->delete($id);

        return $this->simpleSuccessResponse('Ticket Deleted.');
    }
}
