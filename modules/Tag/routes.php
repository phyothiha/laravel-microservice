<?php

use Illuminate\Support\Facades\Route;
use Meraki\Tag\Application\Http\Controllers\TagFilter;
use Meraki\Tag\Application\Http\Controllers\TagController;

Route::prefix('api/v1')
    ->middleware(['api', 'auth:sanctum'])
    ->group(function () {
        Route::get('tags/filters', TagFilter::class)->name('tags.filter');
        Route::apiResource('tags', TagController::class);
    });
