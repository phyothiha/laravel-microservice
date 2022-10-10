<?php

use Illuminate\Support\Facades\Route;
use Meraki\UserGroup\Application\Http\Controllers\UserGroupController;

Route::prefix('api/v1/a')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function () {
        Route::apiResource('companies', UserGroupController::class);
    });
