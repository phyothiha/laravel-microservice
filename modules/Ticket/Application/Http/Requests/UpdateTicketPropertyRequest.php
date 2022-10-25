<?php

namespace Meraki\Ticket\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Meraki\Ticket\Domain\Services\TicketService;

class UpdateTicketPropertyRequest extends FormRequest
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

        return $this->user()->can('update-property', $ticket);
    }

    public function rules()
    {
        $rules = [];

        $current_user = $this->user();

        if ($current_user->isCustomer()) {
            $rules = [
                'status' => ['required']
            ];
        } else {
            $rules = [
                'type' => ['required'],
                'status' => ['required'],
                'priority' => ['required'],
                'customer_id' => ['required'],
            ];
        }

        return $rules;
    }
}
