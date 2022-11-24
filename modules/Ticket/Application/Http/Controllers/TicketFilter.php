<?php

namespace Meraki\Ticket\Application\Http\Controllers;

use Illuminate\Http\Request;
use Meraki\Foundations\Application\BaseController;
use Meraki\Ticket\Infrastructure\Repositories\TicketRepository;

class TicketFilter extends BaseController
{
    public function __construct(
        protected TicketRepository $ticketRepository
    )
    {
        //
    }

    /**
     * Return the results of a solution search with applied filters.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return 'json';

        // $tickets = $this->ticketRepository->newQuery();

        // $tickets->when($request->input('from'), function ($query, $term) {
        //     return $query->where('title', 'like', '%' . $term . '%');
        // });

        // where in
        // $tickets->when($request->input('type'), function ($query, $type) {
        //     return $query->where('type', $type);
        // });

        // where in
        // $tickets->when($request->input('status'), function ($query, $status) {
        //     return $query->where('status', $status);
        // });

        // where in
        // $tickets->when($request->input('priority'), function ($query, $priority) {
        //     return $query->where('priority', $priority);
        // });

        // $solutions->when($request->input('user'), function ($query, $user) {
        //     return $query->where('user_id', $user);
        // });

        // $solutions->when($request->input('user'), function ($query, $user) {
        //     return $query->where('user_id', $user);
        // });


        // $validated = $request->validated();

        // $this->ticket$ticketRepository->update($id, $validated);

        // return $this->simpleSuccessResponse('Ticket Properties Updated.');
    }
}
