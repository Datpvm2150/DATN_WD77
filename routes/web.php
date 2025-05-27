<?php

use Illuminate\Support\Facades\Route;

// Admin Routes
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DashboardController;


Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('danhmucs')->name('danhmucs.')->group(function () {
        Route::get('/', [DanhMucController::class, 'index'])->name('index');
        Route::get('create', [DanhMucController::class, 'create'])->name('create');
        Route::post('store', [DanhMucController::class, 'store'])->name('store');
        Route::get('/{id}/show', [DanhMucController::class, 'show'])->name('show');
    });
});
