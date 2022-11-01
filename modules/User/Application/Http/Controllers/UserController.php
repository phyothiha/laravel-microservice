<?php

namespace Meraki\User\Application\Http\Controllers;

use Illuminate\Http\Request;
use Meraki\User\Domain\Services\UserService;
use Meraki\Foundations\Application\BaseController;
use Meraki\User\Application\Http\Resources\UserResource;
use Meraki\User\Application\Http\Resources\UserResourceSmall;

class UserController extends BaseController
{
    public function __construct(
        protected UserService $userService
    )
    {
        //
    }

    public function index(Request $request)
    {
        $params = $request->only(['q', 'role']);

        return UserResource::collection(
            $this->userService->searchUserByRole($params)
        );
    }

    public function show(int $id)
    {
        return new UserResourceSmall(
            $this->userService->findById($id)
        );
    }
}
