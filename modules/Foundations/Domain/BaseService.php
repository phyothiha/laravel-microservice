<?php

namespace Meraki\Foundations\Domain;

use Illuminate\Support\Facades\Auth;

abstract class BaseService
{
    public function getUser()
    {
        return Auth::user();
    }

    public function getUserId()
    {
        return $this->getUser()->id;
    }

    protected function userHasCertainRole($role)
    {
        return $this->getUser()->hasRole($role);
    }

    public function doesUserHasCustomerRole()
    {
        return $this->userHasCertainRole('customer');
    }

    public function doesUserHasAgentRole()
    {
        return $this->userHasCertainRole('agent');
    }
}
