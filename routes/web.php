<?php

use App\Http\Controllers\Admin\SanPhamController;
use Illuminate\Support\Facades\Route;

//san pham
Route::prefix('admin')->name('admin.')->group(function () {

Route::prefix('sanphams')->name('sanphams.')->group(function () {
    Route::get('/', [SanPhamController::class, 'index'])->name('index');
    Route::get('create', [SanPhamController::class, 'create'])->name('create');
    Route::post('store', [SanPhamController::class, 'store'])->name('store');
    Route::get('/{id}/show', [SanPhamController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [SanPhamController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [SanPhamController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/restore', [SanPhamController::class, 'restore'])->name('restore');
    Route::get('/sanpham/{id}/filterDanhGia/{star}', [SanPhamController::class, 'filterDanhGia'])->name('filterDanhGia');
    Route::post('/admin/sanpham/{sanpham}/danhgias', [SanPhamController::class, 'storeReview'])->name('admin.sanpham.danhgias');
    Route::post('/{id}/isHot', [SanPhamController::class, 'isHot'])->name('isHot');
});
});