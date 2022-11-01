<?php

namespace Meraki\Tag\Application\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        // return array_merge(
        //     parent::toArray($request), // All primary attributes
        //     [
        //         'tickets' => $this->whenLoaded('tickets'),
        //         'solutions' => $this->whenLoaded('solutions'),
        //     ]
        // );

        $tickets_count = $this->tickets->count();
        $solutions_count = $this->solutions->count();
        $users_count = $this->users->count();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'tickets_count' => $tickets_count,
            'solutions_count' => $solutions_count,
            'users_count' => $users_count,
            'total_count' => $tickets_count + $solutions_count + $users_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
