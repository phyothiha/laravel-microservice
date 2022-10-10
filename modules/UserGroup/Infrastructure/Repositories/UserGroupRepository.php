<?php

namespace Meraki\UserGroup\Infrastructure\Repositories;

use Meraki\Foundations\Infrastructure\BaseRepository;
use Meraki\UserGroup\Contracts\UserGroupRepositoryContract;
use Meraki\UserGroup\Domain\Models\UserGroup;

class UserGroupRepository extends BaseRepository implements UserGroupRepositoryContract
{
    public function __construct(UserGroup $model)
    {
        parent::__construct($model);
    }
}
