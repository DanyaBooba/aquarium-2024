<?php

use App\Http\Controllers\Api\ApiAppController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApiPostsController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Users

Route::prefix('/')->group(function () {
    Route::get('users', [ApiUserController::class, 'all']);

    Route::prefix('user')->group(function () {
        Route::get('id/{id}', [ApiUserController::class, 'id']);
        Route::get('{nickname}', [ApiUserController::class, 'nickname']);
    });
});

// Posts

Route::prefix('/')->group(function () {
    Route::get('posts', [ApiPostsController::class, 'all']);
    Route::get('posts/{id}', [ApiPostsController::class, 'userposts']);

    Route::prefix('post')->group(function () {
        Route::get('{id}/{idPost}', [ApiPostsController::class, 'post']);
    });
});

// App

// Route::prefix('app')->group(function () {

// });

// Fallback

Route::get('/', function () {
    return "{}";
});

Route::fallback(function () {
    return "{}";
});
