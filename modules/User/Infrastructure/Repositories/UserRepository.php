<?php

namespace Meraki\User\Infrastructure\Repositories;

use Meraki\Foundations\Infrastructure\BaseRepository;
use Meraki\User\Contracts\UserRepositoryContract;
use Meraki\User\Domain\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getUsersByRole(string $role)
    {
        return $this->model
                    ->ofFilterByRole($role)
                    ->get();
    }

    public function searchUserByRole(string $q, string $role)
    {
        return $this->model
                    ->ofSearchByRole($q, $role)
                    ->limit(10)
                    ->get();
    }
}
