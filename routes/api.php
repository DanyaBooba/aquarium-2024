<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('users', [ApiUserController::class, 'all']);

Route::prefix('user')->group(function () {
    Route::get('id/{id}', [ApiUserController::class, 'id']);
    Route::get('{nickname}', [ApiUserController::class, 'nickname']);
});
