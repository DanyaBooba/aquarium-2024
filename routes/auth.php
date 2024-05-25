<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\CodeController;
use App\Http\Controllers\Auth\EnterCodeController;
use App\Http\Controllers\Auth\EnterRestoreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\RestoreController;
use App\Http\Controllers\Auth\SocialRegisterController;
use App\Http\Controllers\Auth\TestAccountController;
use Illuminate\Support\Facades\Route;

Route::middleware(['log', 'unlogin'])->group(function () {

    Route::prefix('sign')->group(function () {
        Route::get('help', [AuthController::class, 'help'])->name('auth.help');

        Route::get('restore', [RestoreController::class, 'index'])->name('auth.restore');
        Route::post('restore', [RestoreController::class, 'store'])->name('auth.restore.store');
        Route::get('restore/success', [RestoreController::class, 'success'])->name('auth.restore.success');

        Route::get('restore/code/{code}', [EnterRestoreController::class, 'index'])->name('auth.restore.enter');
        Route::post('restore/code/{code}', [EnterRestoreController::class, 'store'])->name('auth.restore.enter.store');

        Route::get('code', [CodeController::class, 'index'])->name('auth.code');
        Route::post('code', [CodeController::class, 'store'])->name('auth.code.store');

        Route::get('code/enter', [EnterCodeController::class, 'index'])->name('auth.code.enter');
        Route::post('code/enter', [EnterCodeController::class, 'store'])->name('auth.code.enter.store');
    });

    Route::prefix('signin')->group(function () {
        Route::post('test', [LoginController::class, 'test']);

        Route::get('', [LoginController::class, 'index'])->name('auth.signin');
        Route::get('email', [LoginController::class, 'email'])->name('auth.signin.email');
        Route::post('email', [LoginController::class, 'store'])->name('auth.signin.email.store');

        Route::get('yandex', [SocialController::class, 'yandex'])->name('auth.signin.yandex');
        Route::get('google', [SocialController::class, 'google'])->name('auth.signin.google');
        Route::get('github', [SocialController::class, 'github'])->name('auth.signin.github');
        Route::get('mailru', [SocialController::class, 'mailru'])->name('auth.signin.mailru');
        Route::get('vk', [SocialController::class, 'vk'])->name('auth.signin.vk');
    });

    Route::prefix('signup')->group(function () {
        Route::get('', [RegisterController::class, 'index'])->name('auth.signup');
        Route::get('email', [RegisterController::class, 'email'])->name('auth.signup.email');
        Route::post('email', [RegisterController::class, 'store'])->name('auth.signup.email.store');

        Route::get('yandex', [SocialController::class, 'yandex'])->name('auth.signup.yandex');
        Route::get('google', [SocialController::class, 'google'])->name('auth.signup.google');
        Route::get('github', [SocialController::class, 'github'])->name('auth.signup.github');
        Route::get('mailru', [SocialController::class, 'mailru'])->name('auth.signup.mailru');
        Route::get('vk', [SocialController::class, 'vk'])->name('auth.signup.vk');
    });

    Route::get('sign/test', [TestAccountController::class, 'index'])->name('auth.sign.test');

    Route::get('login', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('sign', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('sign/in', function () {
        return redirect()->route('auth.signin');
    });

    Route::get('register', function () {
        return redirect()->route('auth.signup');
    });

    Route::get('registration', function () {
        return redirect()->route('auth.signup');
    });

    Route::get('sign/up', function () {
        return redirect()->route('auth.signup');
    });
});

Route::get('sign/fromtest', [TestAccountController::class, 'exit'])->name('auth.sign.test.exit');
