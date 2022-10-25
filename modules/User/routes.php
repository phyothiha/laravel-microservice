<?php

use Illuminate\Support\Facades\Route;
use Meraki\User\Application\Http\Controllers\UserController;

Route::prefix('api/v1')
    // ->middleware(['api', 'auth:sanctum'])
    ->middleware(['api'])
    ->group(function () {
        Route::apiResource('users', UserController::class);
    });
