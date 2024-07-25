<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\AdminPostsController;
use App\Http\Controllers\Admin\AdminUsersController;

Route::prefix('admin')->middleware(['login.session', 'login.admin'])->group(function () {
    Route::get('', [AdminMainController::class, 'index'])->name('admin');
    Route::get('posts', [AdminMainController::class, 'posts'])->name('admin.posts');
    Route::get('complains', [AdminMainController::class, 'complains'])->name('admin.complains');

    Route::get('set-user-active/{iduser}', [AdminUsersController::class, 'set_user_active'])->name('admin.set-user-active');
    Route::get('set-user-unactive/{iduser}', [AdminUsersController::class, 'set_user_unactive'])->name('admin.set-user-unactive');

    Route::get('block-user/{iduser}', [AdminUsersController::class, 'block_user'])->name('admin.block-user');
    Route::get('unblock-user/{iduser}', [AdminUsersController::class, 'unblock_user'])->name('admin.unblock-user');

    Route::get('post-set-status/1/{idpost}', [AdminPostsController::class, 'post_set_status_active'])->name('admin.post.set-status.1');
    Route::get('post-set-status/0/{idpost}', [AdminPostsController::class, 'post_set_status_unactive'])->name('admin.post.set-status.0');
    Route::get('post-set-status/-1/{idpost}', [AdminPostsController::class, 'post_set_status_block'])->name('admin.post.set-status.-1');
});
