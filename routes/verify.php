<?php

use App\Http\Controllers\User\VerifyController;
use Illuminate\Support\Facades\Route;

Route::get('user/v/{code}', [VerifyController::class, 'tryverify'])->name('user.tryverify');

Route::get('user/set/verify', [VerifyController::class, 'setverify'])->name('user.setverify');
