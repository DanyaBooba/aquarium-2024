<?php

use App\Http\Controllers\User\BlockUserController;
use Illuminate\Support\Facades\Route;

Route::get('blocked', [BlockUserController::class, 'index'])->name('user.blocked');
