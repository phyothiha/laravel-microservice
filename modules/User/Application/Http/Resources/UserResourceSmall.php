<?php

namespace Meraki\User\Application\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResourceSmall extends JsonResource
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
            'username' => $this->username,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'work_number' => $this->work_number,
        ];
    }
}
