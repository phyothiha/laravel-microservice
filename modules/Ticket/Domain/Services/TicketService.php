<?php

namespace Meraki\Ticket\Domain\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Meraki\Foundations\Domain\BaseService;
use Symfony\Component\HttpFoundation\Response;
use Meraki\Ticket\Domain\Mail\TicketOpenedMail;
use Meraki\User\Infrastructure\Repositories\UserRepository;
use Meraki\Ticket\Infrastructure\Repositories\TicketRepository;

class TicketService extends BaseService
{
    public function __construct(
        protected TicketRepository $ticketRepository,
        protected UserRepository $userRepository,
    )
    {
        //
    }

    public function getAll()
    {
        return $this->ticketRepository->selectAll();
    }

    public function create(array $inputs)
    {
        // An agent is opening for a ticket on behalf of a customer
        // else a customer is opening a ticket.
        $inputs['customer_id'] = Arr::exists($inputs, 'customer_id')
                                    ? $inputs['customer_id']
                                    : $this->getUserId();

        try {
            return DB::transaction(function () use ($inputs) {
                $ticket = $this->ticketRepository->insert($inputs);

                // $agents = $this->userRepository
                //                 ->getUsersByRole('agent');

                // An agent is opening for a ticket on behalf of a customer.
                // if ($this->userHasCertainRole('agent')) {
                //     $customer = $this->userRepository
                //                     ->selectById($ticket->customer_id);

                //     Mail::to($customer)
                //         ->send(new TicketOpenedMail($ticket));
                // }

                // Mail::to($agents)
                //     ->send(new TicketOpenedMail($ticket));

                return $ticket;
            });
        } catch (\Exception $e) {
            abort(Response::HTTP_BAD_REQUEST);
        }
    }

    public function findById(int $ticket_id)
    {
        return $this->ticketRepository->selectById($ticket_id);
    }

    public function update(int $ticket_id, array $attributes)
    {
        return $this->ticketRepository->updateById($ticket_id, $attributes);
    }

    public function delete(int $id)
    {
        $this->ticketRepository->deleteById($id);
    }

    // public function loadNewQuery()
    // {
    //     if (!$this->doesUserHasCustomerRole()) {
    //         return $this->ticketRepository
    //             ->newQuery();
    //     }

    //     return $this->ticketRepository
    //         ->newQuery()
    //         ->without(['customer', 'agent']);
    // }

    // public function apply(array $filters)
    // {
    //     $tickets = $this->loadNewQuery();

    //     if (Arr::has($filters, 'filter.status')) {
    //         $collection = $this->explodeFilterConstraints(
    //             Arr::get($filters, 'filter.status')
    //         );

    //         $tickets->whereIn('status', $collection);
    //     }

    //     if (Arr::has($filters, 'filter.type')) {
    //         $collection = $this->explodeFilterConstraints(
    //             Arr::get($filters, 'filter.type')
    //         );

    //         $tickets->whereIn('type', $collection);
    //     }

    //     if (Arr::has($filters, 'filter.priority')) {
    //         $collection = $this->explodeFilterConstraints(
    //             Arr::get($filters, 'filter.priority')
    //         );

    //         $tickets->whereIn('priority', $collection);
    //     }

    //     // ORDER column BY direction
    //     if (Arr::has($filters, 'order.column')) {
    //         $columns = $this->explodeFilterConstraints(
    //             Arr::get($filters, 'order.column')
    //         );

    //         $direction = Arr::get($filters, 'order.direction', 'asc');

    //         foreach ($columns as $column) {
    //             if ($column == 'created_at') {
    //                 $tickets->orderByRaw("date($column) $direction");
    //             } else {
    //                 $tickets->orderBy($column, $direction);
    //             }
    //         }
    //     }

    //     if (!$this->doesUserHasCustomerRole()) {
    //         $tickets->where('agent_id', $this->getUserId());
    //     } else {
    //         $tickets->where('customer_id', $this->getUserId());
    //     }

    //     return $tickets->paginate(10)
    //         ->withQueryString();
    // }

    // public function assignToAgent($ticket_id, $agent_id)
    // {
    //     return $this->ticketRepository->assignToAgent($ticket_id, $agent_id);
    // }

    // public function explodeFilterConstraints(string $constraints, string $delimiter = ',')
    // {
    //     return Str::of($constraints)->explode($delimiter);
    // }
}
