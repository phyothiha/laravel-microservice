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

    /**
     * @param  string  $role
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersByRole(string $role)
    {
        return $this->model
                    ->ofFilterByRole($role)
                    ->get();
    }
}
