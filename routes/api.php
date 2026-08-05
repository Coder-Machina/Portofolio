<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:60,1'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index']);
});
