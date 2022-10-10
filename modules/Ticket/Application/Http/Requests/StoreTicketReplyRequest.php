<?php

namespace Meraki\Ticket\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketReplyRequest extends FormRequest
{
    public function authorize()
    {
        // An authenticated user can do 'create-reply' action on a given ticket.
        return $this->ticket &&
               $this->user()
                    ->can('create-reply', $this->ticket);
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
