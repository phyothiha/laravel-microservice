<?php

namespace Meraki\Ticket\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Meraki\Ticket\Domain\Services\TicketService;

class UpdateTicketContentRequest extends FormRequest
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
            $this->route('id')
        );

        return $this->user()->can('update-content', $ticket);
    }

    public function rules()
    {
        $rules = [
            'subject' => ['required', 'min:5', 'max:255'],
            'description' => ['required'],
        ];

        $current_user = $this->user();

        if ($current_user->isAgent()) {
            $rules['customer_id'] = ['required'];
        }

        return $rules;
    }
}
