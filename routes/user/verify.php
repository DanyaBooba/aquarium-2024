<?php

use App\Http\Controllers\User\VerifyController;
use Illuminate\Support\Facades\Route;

Route::get('verify/v/{code}', [VerifyController::class, 'code'])->name('verify.code');

Route::get('verify/set/verify', [VerifyController::class, 'set'])->name('verify.set');

Route::get('verify', [VerifyController::class, 'view'])->name('verify.view');
