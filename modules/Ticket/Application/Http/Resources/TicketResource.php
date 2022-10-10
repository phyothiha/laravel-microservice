<?php

namespace Meraki\Ticket\Application\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Meraki\User\Application\Http\Resources\UserResource;

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
            'id'                    =>  $this->id,
            'subject'               =>  $this->subject,
            'description'           =>  $this->description,
            'type'                  =>  $this->type,
            'type_name'             =>  $this->type_name,
            'status'                =>  $this->status,
            'status_name'           =>  $this->status_name,
            'priority'              =>  $this->priority,
            'priority_name'         =>  $this->priority_name,
            'customer'              =>  new UserResource($this->whenLoaded('customer', function () {
                                            return [
                                                'id' => $this->customer->id,
                                                'full_name' => $this->customer->full_name,
                                                'email' => $this->customer->email,
                                                'work_number' => $this->customer->work_number,
                                            ];
                                        })),
            'agent'                 =>  new UserResource($this->whenLoaded('agent', function () {
                                            return [
                                                'id' => $this->agent->id,
                                                'full_name' => $this->agent->full_name,
                                                'email' => $this->agent->email,
                                                'work_number' => $this->agent->work_number,
                                            ];
                                        })),
        ];
    }
}
