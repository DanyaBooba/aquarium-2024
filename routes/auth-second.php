<?php

use App\Http\Controllers\Auth\CodeController;
use App\Http\Controllers\Auth\EnterCodeController;
use App\Http\Controllers\Auth\EnterRestoreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RestoreController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\TestAccountController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('second')->middleware(['login.session', 'login.no-test'])->group(function () {
    Route::prefix('sign')->group(function () {
        Route::get('help', [AuthController::class, 'help'])->name('second.auth.help');

        Route::get('restore', [RestoreController::class, 'index'])->name('second.auth.restore');
        Route::post('restore', [RestoreController::class, 'store'])->name('second.auth.restore.store');
        Route::get('restore/success', [RestoreController::class, 'success'])->name('second.auth.restore.success');

        Route::get('restore/code/{code}', [EnterRestoreController::class, 'index'])->name('second.auth.restore.enter');
        Route::post('restore/code/{code}', [EnterRestoreController::class, 'store'])->name('second.auth.restore.enter.store');

        Route::get('code', [CodeController::class, 'index'])->name('second.auth.code');
        Route::post('code', [CodeController::class, 'store'])->name('second.auth.code.store');

        Route::get('code/enter', [EnterCodeController::class, 'index'])->name('second.auth.code.enter');
        Route::post('code/enter', [EnterCodeController::class, 'store'])->name('second.auth.code.enter.store');
    });

    Route::prefix('signin')->group(function () {
        Route::get('', [LoginController::class, 'second_index'])->name('second.auth.signin');
        Route::get('email', [LoginController::class, 'second_email'])->name('second.auth.signin.email');
        Route::post('email', [LoginController::class, 'second_store'])->name('second.auth.signin.email.store');

        Route::get('yandex', [SocialController::class, 'second_yandex'])->name('second.auth.signin.yandex');
        Route::get('google', [SocialController::class, 'second_google'])->name('second.auth.signin.google');
        // Route::get('github', [SocialController::class, 'github'])->name('second.auth.signin.github');
        // Route::get('mailru', [SocialController::class, 'mailru'])->name('second.auth.signin.mailru');
        // Route::get('vk', [SocialController::class, 'vk'])->name('second.auth.signin.vk');
    });

    Route::get('login', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('sign', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('sign/in', function () {
        return redirect()->route('auth.signin');
    });
});
