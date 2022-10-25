<?php

namespace Meraki\Tag\Infrastructure\Repositories;

use Spatie\Tags\Tag;
use Meraki\Tag\Contracts\TagRepositoryContract;
use Meraki\Foundations\Infrastructure\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryContract
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
}
