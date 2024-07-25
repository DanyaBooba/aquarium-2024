<?php

use App\Http\Controllers\User\ComplainController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ExitController;
use App\Http\Controllers\User\DeleteController;
use App\Http\Controllers\User\Post\AddPostController;
use App\Http\Controllers\User\Post\EditPostController;
use App\Http\Controllers\User\Post\ImportPostController;
use App\Http\Controllers\User\Second\SecondAccountController;
use App\Http\Controllers\User\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['login.session', 'user.blocked'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('user');

        Route::get('search', [UserController::class, 'search'])->name('user.search');
        Route::get('notifications', [UserController::class, 'notifications'])->name('user.notifications');
        Route::get('achievements', [UserController::class, 'achievements'])->name('user.achievements');
        Route::get('feed', [UserController::class, 'feed'])->name('user.feed');

        Route::get('sub/{id}', [SubscribeController::class, 'index'])->name('user.sub');
        Route::get('complain/{id}', [ComplainController::class, 'index'])->name('user.complain');

        Route::get('importpost', [ImportPostController::class, 'index'])->name('user.importpost');
        Route::post('importpost', [ImportPostController::class, 'post'])->name('user.importpost');

        Route::get('second/change', [SecondAccountController::class, 'change'])->name('user.second.change');
        Route::get('second/remove', [SecondAccountController::class, 'remove'])->name('user.second.remove');

        Route::get('delete', [DeleteController::class, 'index'])->name('user.delete');
        Route::post('delete', [DeleteController::class, 'post'])->name('user.delete.store');
        Route::post('delete/service', [DeleteController::class, 'service'])->name('user.delete.service.store');
    });
});

Route::get('user/exit', [ExitController::class, 'index'])->name('user.exit');
Route::get('user/exit/exactly', [ExitController::class, 'exit'])->name('user.exit.exactly');
