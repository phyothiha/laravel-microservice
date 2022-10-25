<?php

namespace Meraki\User\Application\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Meraki\User\Domain\Services\UserService;
use Meraki\User\Application\Http\Resources\UserResource;

class UserController extends Controller
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
}
