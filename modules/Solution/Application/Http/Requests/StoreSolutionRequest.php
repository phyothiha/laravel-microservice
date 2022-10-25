<?php

namespace Meraki\Solution\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolutionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => ['required'],
            'content' => ['required'],
            'status' => ['required'],
            'tags' => ['nullable', 'array'],
        ];

        return $rules;
    }
}
