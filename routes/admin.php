<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->middleware(['login.session', 'login.admin'])->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin');
});
