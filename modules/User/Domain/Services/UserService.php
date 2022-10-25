<?php

namespace Meraki\User\Domain\Services;

use Meraki\Foundations\Domain\BaseService;
use Meraki\User\Infrastructure\Repositories\UserRepository;

class UserService extends BaseService
{
    public function __construct(
        protected UserRepository $userRepository,
    ) {
        //
    }

    public function searchUserByRole(array $params)
    {
        return $this->userRepository->searchUserByRole(...$params);
    }
}
