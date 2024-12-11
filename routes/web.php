<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationsController;

Route::get('/', function () {
    return redirect()->route('notifications.index');
});

Route::prefix('notifications')->name('notifications.')->group(function () {
    Route::get('/', [NotificationsController::class, 'index'])->name('index');
    Route::get('/create', [NotificationsController::class, 'create'])->name('create');
    Route::post('/', [NotificationsController::class, 'store'])->name('store');
});