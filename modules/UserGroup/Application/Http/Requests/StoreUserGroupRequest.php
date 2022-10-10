<?php

namespace Meraki\UserGroup\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => ['required', 'min:5', 'max:255'],
            'description' => ['nullable', 'max:300'],
            'note' => ['nullable', 'max:300'],
            'domains' => ['nullable', 'array'],
            'health' => ['nullable', 'max:255'],
            'tier' => ['nullable', 'max:255'],
            'industry' => ['nullable', 'max:255'],
            'subscribed_at' => ['nullable'],
            'expired_at' => ['nullable'],
            'renewed_at' => ['nullable'],
        ];

        return $rules;
    }
}
