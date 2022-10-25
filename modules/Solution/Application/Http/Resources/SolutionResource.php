<?php

namespace Meraki\Solution\Application\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Meraki\User\Application\Http\Resources\UserResourceSmall;

class SolutionResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'status_name' => $this->status_name,
            'user' => new UserResourceSmall($this->whenLoaded('user')),
            'tags' => $this->tags->map->only(['id', 'name', 'slug']),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
