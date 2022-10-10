<?php

namespace Meraki\User\Contracts;

interface UserRepositoryContract
{
    /**
     * @param  string  $role
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersByRole(string $role);
}
