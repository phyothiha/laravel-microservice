<?php

namespace Meraki\Ticket\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Meraki\Ticket\Domain\Services\TicketService;
use Meraki\Ticket\Application\Http\Resources\TicketResource;
use Meraki\Ticket\Application\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{
    public function __construct(
        protected TicketService $ticketService
    )
    {
        //
    }

    public function index()
    {
        return 'index route';
    }

    public function store(StoreTicketRequest $request)
    {
        $inputs = $request->validated();

        $result = $this->ticketService->create($inputs);

        return new TicketResource($result);
    }
}
