<?php

namespace Meraki\Ticket\Application\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Meraki\User\Application\Http\Resources\UserResourceSmall;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'description' => $this->description,
            'type' => $this->type,
            'type_name' => $this->type_name,
            'status' => $this->status,
            'status_name' => $this->status_name,
            'priority' => $this->priority,
            'priority_name' => $this->priority_name,
            'customer' => new UserResourceSmall($this->whenLoaded('customer')),
            'agent' => new UserResourceSmall($this->whenLoaded('agent')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
