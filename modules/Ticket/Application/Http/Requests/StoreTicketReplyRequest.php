<?php

namespace Meraki\Ticket\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Meraki\Ticket\Domain\Services\TicketService;

class StoreTicketReplyRequest extends FormRequest
{
    public function __construct(
        protected TicketService $ticketService
    )
    {
        //
    }

    public function authorize()
    {
        $ticket = $this->ticketService->findById(
            $this->route('ticket_id')
        );

        return $this->user()->can('create-reply', $ticket);

        // An authenticated user can do 'create-reply' action on a given ticket that he owns.
        // return $ticket &&
        //        $this->user()->can('create-reply', $ticket);
    }

    public function rules()
    {
        $rules = [
            'content' => ['required'],
            'cc' => ['nullable', 'array'],
            'cc.*' => ['email'],
            'bcc' => ['nullable', 'array'],
            'bcc.*' => ['email'],
        ];

        return $rules;
    }
}
