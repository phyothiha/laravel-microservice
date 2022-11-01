<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function () {
        //
    });
