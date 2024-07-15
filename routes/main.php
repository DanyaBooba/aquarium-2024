<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainRouteController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\ThemeController;

Route::prefix('/')->group(function () {
    Route::get('/', [MainRouteController::class, 'index'])->name('main');

    Route::get('get', [MainRouteController::class, 'download'])->name('main.download');
    Route::get('faq', [MainRouteController::class, 'faq'])->name('main.faq');

    Route::get('setlocale/{locale}', [LocaleController::class, 'store'])->name('main.setlocale');

    Route::get('setlighttheme/{theme}', [ThemeController::class, 'light'])->name('main.settheme.light');
    Route::get('setdarktheme/{theme}', [ThemeController::class, 'dark'])->name('main.settheme.dark');

    Route::prefix('about')->group(function () {
        Route::get('/', [MainRouteController::class, 'about'])->name('main.about');

        Route::get('oauth', [MainRouteController::class, 'oauth'])->name('main.oauth');
        Route::get('api', [MainRouteController::class, 'api'])->name('main.api');
        Route::get('tech', [MainRouteController::class, 'tech'])->name('main.tech');
        Route::get('brand', [MainRouteController::class, 'brand'])->name('main.brand');
        Route::get('accessibility', [MainRouteController::class, 'accessibility'])->name('main.accessibility');
        Route::get('history', [MainRouteController::class, 'history'])->name('main.history');

        Route::prefix('terms')->group(function () {
            Route::get('/', [MainUserController::class, 'index'])->name('main.terms');

            Route::get('privacy', [MainUserController::class, 'privacy'])->name('main.terms.privacy');
            Route::get('termsofuse', [MainUserController::class, 'termsofuse'])->name('main.terms.termsofuse');
            Route::get('cookie', [MainUserController::class, 'cookie'])->name('main.terms.cookie');
        });

        Route::get('brandbook', function () {
            return redirect()->route('main.brand');
        });

        Route::get('download', function () {
            return redirect()->route('main.get');
        });
    });
});
