<?php

use App\Http\Controllers\User\Post\ViewPostController;
use App\Http\Controllers\User\BlockUserController;
use App\Http\Controllers\User\ComplainController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ExitController;
use App\Http\Controllers\User\DeleteController;
use App\Http\Controllers\User\Post\AddPostController;
use App\Http\Controllers\User\Post\DeletePostController;
use App\Http\Controllers\User\Post\EditPostController;
use App\Http\Controllers\User\Post\ImportPostController;
use App\Http\Controllers\User\Post\LikePostController;
use App\Http\Controllers\User\Settings\AppearanceController;
use App\Http\Controllers\User\Settings\NotificationsController;
use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\Settings\ProfileEmailController;
use App\Http\Controllers\User\Settings\ProfilePasswordController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\ShowUser\ShowUserController;
use App\Http\Controllers\User\SubscribeController;
use App\Http\Controllers\User\VerifyController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware(['login.session', 'user.blocked'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('verify', [VerifyController::class, 'viewverify'])->name('user.viewverify');
    Route::get('blocked', [BlockUserController::class, 'index'])->name('user.blocked');
    Route::get('second/change', [UserController::class, 'changeToSecondAccount'])->name('user.change-account');
    Route::get('second/remove', [UserController::class, 'removeSecondAccount'])->name('user.remove-second-account');

    Route::get('sub/{id}', [SubscribeController::class, 'index'])->name('user.sub');
    Route::get('complain/{id}', [ComplainController::class, 'index'])->name('user.complain');

    Route::get('search', [UserController::class, 'search'])->name('user.search');
    Route::get('notifications', [UserController::class, 'notifications'])->name('user.notifications');
    Route::get('achievements', [UserController::class, 'achievements'])->name('user.achievements');
    Route::get('feed', [UserController::class, 'feed'])->name('user.feed');
    Route::get('trends', [UserController::class, 'trends'])->name('user.trends');

    Route::get('exit', [ExitController::class, 'index'])->name('user.exit');

    Route::get('addpost', [AddPostController::class, 'index'])->name('user.addpost');
    Route::post('addpost', [AddPostController::class, 'post'])->name('user.addpost.post');

    Route::post('changepost', [EditPostController::class, 'post'])->name('user.changepost.post');

    Route::get('importpost', [ImportPostController::class, 'index'])->name('user.import.post');
    Route::post('importpost', [ImportPostController::class, 'post'])->name('user.import.post');

    Route::get('delete', [DeleteController::class, 'index'])->name('user.delete');
    Route::post('delete', [DeleteController::class, 'post'])->name('user.delete.post');
    Route::post('delete/service', [DeleteController::class, 'service'])->name('user.delete.service.post');

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings');

        Route::middleware(['user.verified'])->group(function () {
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
            // Route::post('appearance', [AppearanceController::class, 'loadfile'])->name('settings.appearance.loadfile');
        });

        Route::get('themes', [SettingsController::class, 'themes'])->name('settings.themes');
        Route::get('language', [SettingsController::class, 'language'])->name('settings.language');
    });
});

Route::get('user/exit/exactly', [ExitController::class, 'exit'])->name('user.exit.exactly');

Route::get('user/editpost/{idPost}', [EditPostController::class, 'index'])->name('user.post.edit');
Route::get('user/deletepost/{idPost}', [DeletePostController::class, 'delete'])->name('user.post.delete');

Route::get('user/likepost/{id}/{idPost}', [LikePostController::class, 'like'])->name('user.post.like');

Route::get('user/id/{id}', [ShowUserController::class, 'id'])->name('user.show.id');
Route::get('user/{nickname}', [ShowUserController::class, 'nickname'])->name('user.show.nickname');

Route::get('user/id/{id}/{idPost}', [ViewPostController::class, 'id'])->name('user.post.show.id');
