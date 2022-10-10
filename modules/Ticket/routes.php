<?php

use Illuminate\Support\Facades\Route;
use Meraki\Ticket\Application\Http\Controllers\TicketController;
use Meraki\Ticket\Application\Http\Controllers\TicketReplyController;

Route::prefix('api/v1')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function () {
        Route::apiResource('tickets', TicketController::class);
        Route::apiResource('tickets.replies', TicketReplyController::class)
            ->only(['store', 'show', 'destroy']);
    });
