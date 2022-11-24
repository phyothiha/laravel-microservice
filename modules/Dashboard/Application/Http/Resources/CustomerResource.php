<?php

namespace Meraki\Dashboard\Application\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => 'customer'
        ];
    }
}
