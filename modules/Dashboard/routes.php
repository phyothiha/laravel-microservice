<?php

use Illuminate\Support\Facades\Route;
use Meraki\Dashboard\Application\Http\Controllers\TicketSummary;

Route::prefix('api/v1')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function () {
        Route::get('dashboard/ticket-summary', TicketSummary::class);
        // Route::get('dashboard/customer-satisfaction')
    });
