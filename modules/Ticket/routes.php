<?php

use Illuminate\Support\Facades\Route;
use Meraki\Ticket\Application\Http\Controllers\TicketController;
use Meraki\Ticket\Application\Http\Controllers\TicketFilter;
use Meraki\Ticket\Application\Http\Controllers\TicketProperties;
use Meraki\Ticket\Application\Http\Controllers\TicketReplyController;

Route::prefix('api/v1')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function () {
        Route::put('/tickets/{id}/properties', TicketProperties::class)
                ->name('tickets.properties');

        Route::get('tickets/filters', TicketFilter::class)->name('tickets.filter');

        Route::apiResource('tickets', TicketController::class)
                ->parameters([
                    'tickets' => 'id'
                ]);

        Route::apiResource('tickets.replies', TicketReplyController::class)
                ->parameters([
                    'tickets' => 'ticket_id',
                    'replies' => 'reply_id',
                ])
                ->only(['index', 'store', 'destroy']);
    });
