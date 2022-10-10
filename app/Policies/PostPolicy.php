<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Meraki\User\Domain\Models\User;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
