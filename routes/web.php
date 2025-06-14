<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\MauSacController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\BaiVietController;
use App\Http\Controllers\Admin\DungLuongController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Http\Controllers\Admin\DanhGiaSanPhamController;

use App\Http\Controllers\Client\TrangChuController;
use App\Http\Controllers\Client\TrangSanPhamController;
use App\Http\Controllers\Client\ChiTietSanPhamController;
use App\Http\Controllers\Client\YeuThichController;

Route::prefix('admin')->name('admin.')->group(function () {
    // San phẩm
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

    // Banner
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
    });

    // Danh mục
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

    // Dung lượng
    Route::prefix('dungluongs')->name('dungluongs.')->group(function () {
        Route::get('/', [DungLuongController::class, 'index'])->name('index');
        Route::get('create', [DungLuongController::class, 'create'])->name('create');
        Route::post('store', [DungLuongController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DungLuongController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [DungLuongController::class, 'update'])->name('update');
        Route::post('/{id}/onOffDungLuong', [DungLuongController::class, 'onOffDungLuong'])->name('onOffDungLuong');
        Route::delete('/{id}/destroy', [DungLuongController::class, 'destroy'])->name('destroy');
    });

    // Tag
    Route::prefix('tag')->name('tag.')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('create', [TagController::class, 'create'])->name('create');
        Route::post('store', [TagController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TagController::class, 'update'])->name('update');
        Route::post('/{id}/onOffTag', [TagController::class, 'onOffTag'])->name('onOffTag');
        Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
    });

    // Màu sắc
    Route::prefix('mausacs')->name('mausacs.')->group(function () {
        Route::get('/', [MauSacController::class, 'index'])->name('index');
        Route::get('create', [MauSacController::class, 'create'])->name('create');
        Route::post('store', [MauSacController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MauSacController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [MauSacController::class, 'update'])->name('update');
        Route::post('/{id}/onOffMauSac', [MauSacController::class, 'onOffMauSac'])->name('onOffMauSac');
        Route::delete('/{id}/destroy', [MauSacController::class, 'destroy'])->name('destroy');
    });

    // Khuyến mãi
    Route::prefix('khuyen_mais')->name('khuyen_mais.')->group(function () {
        Route::get('/', [KhuyenMaiController::class, 'index'])->name('index');
        Route::get('create', [KhuyenMaiController::class, 'create'])->name('create');
        Route::post('store', [KhuyenMaiController::class, 'store'])->name('store');
        Route::get('/{id}', [KhuyenMaiController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [KhuyenMaiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KhuyenMaiController::class, 'update'])->name('update');
        Route::get('/update-expired', [KhuyenMaiController::class, 'updateExpiredKhuyenMai'])->name('updateExpired');
        Route::post('/{id}/onOffKhuyenMai', [KhuyenMaiController::class, 'onOffKhuyenMai'])->name('onOffKhuyenMai');
        Route::delete('/{id}', [KhuyenMaiController::class, 'destroy'])->name('destroy');
    });

    // Đánh giá
    Route::prefix('Danhgias')->name('Danhgias.')->group(function () {
        Route::get('/', [DanhGiaSanPhamController::class, 'index'])->name('index');
        Route::get('/danh-gia/{danhGiaId}', [DanhGiaSanPhamController::class, 'show'])->name('show');
        Route::post('/danh-gia/{danhGiaId}/tra-loi', [DanhGiaSanPhamController::class, 'traLoi'])->name('traLoi');
        Route::put('admin/danhgias/tra-loi/{id}', [DanhGiaSanPhamController::class, 'updateResponse'])->name('traLoi.update');
    });
});

// Client
Route::get('/', [TrangChuController::class, 'index'])->name('/');
Route::get('/trangchu', [TrangChuController::class, 'index'])->name('trangchu');
Route::get('/san-pham', [TrangSanPhamController::class, 'index'])->name('san-pham');

Route::get('/chitietsanpham/{id}', [ChiTietSanPhamController::class, 'show'])->name('chitietsanpham');
Route::get('/sanphamtag/{id}', [TagController::class, 'sanphamtag'])->name('sanphamtag');
Route::get('/sanpham/lay-gia-bien-the', [ChiTietSanPhamController::class, 'layGiaBienThe'])->name('sanpham.lay_gia_bien_the');
Route::get('/get-so-luong-bien-the', [ChiTietSanPhamController::class, 'getSoLuongBienThe'])->name('sanpham.get_so_luong_bien_the');
Route::post('/danh-gia/{danhGia}/reply', [ChiTietSanPhamController::class, 'reply'])->name('admin.danhgia.reply');
Route::put('/danh-gia/tra-loi/{traLoi}', [ChiTietSanPhamController::class, 'editReply'])->name('admin.danhgia.editReply');

Route::get('/Add-To-Love/{id}', [YeuThichController::class, 'addToLove'])->name('love.add');
Route::get('/yeuthich', [YeuThichController::class, 'showYeuThich'])->name('yeuthich');
Route::get('/Delete-From-Love/{id}', [YeuThichController::class, 'deleteLove'])->name('love.delete');
Route::get('/Loved-List', [YeuThichController::class, 'lovedList'])->name('love.list');
