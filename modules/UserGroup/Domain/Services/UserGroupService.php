<?php

namespace Meraki\UserGroup\Domain\Services;

use Illuminate\Support\Arr;
use Meraki\Foundations\Domain\BaseService;
use Meraki\UserGroup\Domain\Models\UserGroup;
use Meraki\UserGroup\Infrastructure\Repositories\UserGroupRepository;

class UserGroupService extends BaseService
{
    public function __construct(
        protected UserGroupRepository $userGroupRepository,
    ) {
        //
    }

    public function create(array $inputs): void
    {
        if (Arr::exists($inputs, 'domains')) {
            $inputs['domains'] = implode(',', $inputs['domains']);
        }

        $this->userGroupRepository->insert($inputs);
    }

    public function read(int $id): UserGroup
    {
        return $this->userGroupRepository->selectById($id);
    }

    public function update(int $id): void
    {
        //
    }

    public function delete(int $id): void
    {
        $this->userGroupRepository->deleteById($id);
    }
}
