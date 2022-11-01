<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Meraki\User\Application\Http\Controllers\UserController;

Route::prefix('api/v1')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function () {
        Route::apiResource('users', UserController::class);
    });
