<?php

namespace Meraki\Tag\Infrastructure\Repositories;

use Meraki\Tag\Domain\Models\Tag;
use Meraki\Tag\Contracts\TagRepositoryContract;
use Meraki\Foundations\Infrastructure\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryContract
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
}
