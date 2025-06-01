<?php


use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SanPhamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DanhMucController;
use App\Http\Controllers\Admin\BaiVietController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    //san pham
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
    //Banner
    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('create', [BannerController::class, 'create'])->name('create');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::get('/{vi_tri}', [BannerController::class, 'show'])->name('show');
        Route::get('/{vi_tri}/edit', [BannerController::class, 'edit'])->name('edit');
        Route::put('/update', [BannerController::class, 'update'])->name('update');
        Route::post('/{id}/onOffBanner', [BannerController::class, 'onOffBanner'])->name('onOffBanner');
        Route::delete('/{id}', [BannerController::class, 'destroy'])->name('destroy');
    });

    // Bài viết
    Route::prefix('baiviets')->name('baiviets.')->group(function () {
        Route::get('/', [BaiVietController::class, 'index'])->name('index');
        Route::get('create', [BaiVietController::class, 'create'])->name('create');
        Route::post('store', [BaiVietController::class, 'store'])->name('store');
        Route::get('/{id}', [BaiVietController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [BaiVietController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BaiVietController::class, 'update'])->name('update');
        Route::post('/{id}/onOffBaiViet', [BaiVietController::class, 'onOffBaiViet'])->name('onOffBaiViet');
        Route::delete('/{id}/destroy', [BaiVietController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [BaiVietController::class, 'show'])->name('show');

    //danh muc
    Route::prefix('danhmucs')->name('danhmucs.')->group(function () {
        Route::get('/', [DanhMucController::class, 'index'])->name('index');
        Route::get('create', [DanhMucController::class, 'create'])->name('create');
        Route::post('store', [DanhMucController::class, 'store'])->name('store');
        Route::get('/{id}/show', [DanhMucController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [DanhMucController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [DanhMucController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');
        Route::delete('/{id}/softDelete', [DanhMucController::class, 'softDelete'])->name('softDelete');
        Route::post('/{id}/restore', [DanhMucController::class, 'restore'])->name('restore');

    });

});
