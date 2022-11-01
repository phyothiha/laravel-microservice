<?php

namespace Meraki\User\Domain\Services;

use Meraki\User\Infrastructure\Repositories\UserRepository;

class UserService
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

    public function findById(int $id)
    {
        return $this->userRepository->selectById($id);
    }
}
