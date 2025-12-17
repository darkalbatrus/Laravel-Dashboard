<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', PanelController::class);

Route::prefix("admin")->group(function () {
    Route::get('', PanelController::class);
    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    Route::get('/user/deleted', [UserController::class, 'deleted'])->name('admin.user.deleted');
    Route::put('/user/restore/{id}', [UserController::class, 'restore'])->name('admin.user.restore');
    Route::get('/user/forceDelete', [UserController::class, 'forceDelete'])->name('admin.user.forceDelete');
});
