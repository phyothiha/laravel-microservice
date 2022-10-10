<?php

namespace Meraki\UserGroup\Application\Http\Controllers;

use Meraki\Foundations\Application\BaseController;
use Meraki\UserGroup\Domain\Services\UserGroupService;
use Meraki\UserGroup\Application\Http\Resources\UserGroupResource;
use Meraki\UserGroup\Application\Http\Requests\StoreUserGroupRequest;

class UserGroupController extends BaseController
{
    public function __construct(
        protected UserGroupService $userGroupService
    )
    {
        //
    }

    public function index()
    {
        return 'index route';
    }

    public function store(StoreUserGroupRequest $request)
    {
        $inputs = $request->validated();

        $this->userGroupService->create($inputs);

        return $this->simpleSuccessResponse();
    }

    public function show(int $id): UserGroupResource
    {
        return new UserGroupResource(
            $this->userGroupService->read($id)
        );
    }

    public function update(int $id)
    {
        $this->userGroupService->update($id);

        return $this->simpleSuccessResponse();
    }

    public function destroy(int $id)
    {
        $this->userGroupService->delete($id);

        return $this->simpleSuccessResponse();
    }
}
