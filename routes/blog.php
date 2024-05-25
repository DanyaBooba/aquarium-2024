<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');

    Route::get('{id}', [BlogController::class, 'show'])->name('blog.show');
});
