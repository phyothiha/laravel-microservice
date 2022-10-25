<?php

namespace Meraki\Ticket\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $current_user = $this->user();

        $rules = [
            'subject' => ['required', 'min:5', 'max:255'],
            'description' => ['required'],
            'type' => ['required'],
            'status' => ['required'],
            'priority' => ['required'],
        ];

        if ($current_user->isAgent()) {
            $rules['customer_id'] = ['required'];
            $rules['agent_id'] = ['nullable'];
        }

        return $rules;
    }
}
