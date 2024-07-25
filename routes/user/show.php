<?php

use App\Http\Controllers\User\ShowUser\ShowUserController;
use Illuminate\Support\Facades\Route;

Route::get('show/id/{id}', [ShowUserController::class, 'id'])->name('user.show.id');
Route::get('show/{nickname}', [ShowUserController::class, 'nickname'])->name('user.show.nickname');
