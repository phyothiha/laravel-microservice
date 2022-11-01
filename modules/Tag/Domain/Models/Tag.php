<?php

namespace Meraki\Tag\Domain\Models;

use Spatie\Tags\Tag as SpatieTag;
use Meraki\User\Domain\Models\User;
use Meraki\Ticket\Domain\Models\Ticket;
use Meraki\Solution\Domain\Models\Solution;

class Tag extends SpatieTag
{
    // protected $withCount = ['tickets', 'solutions'];

    /**
     * Eloquent: Relationships
     *
     * @link https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-polymorphic-relations
     */
    public function tickets()
    {
        return $this->morphedByMany(Ticket::class, 'taggable');
    }

    public function solutions()
    {
        return $this->morphedByMany(Solution::class, 'taggable');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'taggable');
    }
}
