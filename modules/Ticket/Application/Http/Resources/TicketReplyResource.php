<?php

namespace Meraki\Ticket\Application\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Meraki\User\Application\Http\Resources\UserResourceSmall;

class TicketReplyResource extends JsonResource
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
            'user_id' => $this->user_id,
            'ticket_id' => $this->ticket_id,
            'content' => $this->content,
            'user' => new UserResourceSmall($this->whenLoaded('user')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
