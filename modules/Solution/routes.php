<?php

use Illuminate\Support\Facades\Route;
use Meraki\Solution\Application\Http\Controllers\SolutionFilter;
use Meraki\Solution\Application\Http\Controllers\SolutionController;

Route::prefix('api/v1')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function () {
        Route::get('solutions/filters', SolutionFilter::class)->name('solutions.filter');
        Route::apiResource('solutions', SolutionController::class);
    });
