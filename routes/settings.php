<?php

use App\Http\Controllers\User\Settings\AppearanceController;
use App\Http\Controllers\User\Settings\AppearanceLoadAvatarController;
use App\Http\Controllers\User\Settings\AppearanceLoadCapController;
use App\Http\Controllers\User\Settings\AppearanceLoadFileController;
use App\Http\Controllers\User\Settings\NotificationsController;
use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\Settings\ProfileEmailController;
use App\Http\Controllers\User\Settings\ProfilePasswordController;
use App\Http\Controllers\User\Settings\SessionController;
use App\Http\Controllers\User\SettingsController;
use Illuminate\Support\Facades\Route;

Route::prefix('user/settings')->middleware(
    ['login.session', 'user.blocked', 'user.verified']
)->group(function () {

    Route::get('/', [SettingsController::class, 'index'])->name('settings');

    Route::prefix('profile')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('settings.profile');
        Route::post('', [ProfileController::class, 'store'])->name('settings.profile.store');

        Route::get('password', [ProfilePasswordController::class, 'index'])->name('settings.profile.password');
        Route::post('password', [ProfilePasswordController::class, 'store'])->name('settings.profile.password.store');

        Route::get('email', [ProfileEmailController::class, 'index'])->name('settings.profile.email');
        Route::post('email', [ProfileEmailController::class, 'store'])->name('settings.profile.email.store');
    });

    Route::get('notifications', [NotificationsController::class, 'index'])->name('settings.notifications');
    Route::post('notifications', [NotificationsController::class, 'store'])->name('settings.notifications.store');

    Route::get('appearance', [AppearanceController::class, 'index'])->name('settings.appearance');
    Route::post('appearance', [AppearanceController::class, 'store'])->name('settings.appearance.store');

    Route::post('appearance/load/avatar', [AppearanceLoadAvatarController::class, 'store']);
    Route::post('appearance/load/cap', [AppearanceLoadCapController::class, 'store']);

    Route::get('session', [SessionController::class, 'index'])->name('settings.session');
    Route::post('session', [SessionController::class, 'store'])->name('settings.session.store');

    // Route::get('test', [App\Http\Controllers\TestController::class, 'test']);
});
