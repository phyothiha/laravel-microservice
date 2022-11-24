<?php

namespace Meraki\Dashboard\Application\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerAdminResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => 'customer-admin'
        ];
    }
}
