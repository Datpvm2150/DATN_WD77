<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\DanhGiaSanPham;
use App\Models\HoaDon;
use App\Models\lien_hes;
use App\Observers\NotificationObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Chia sẻ danh sách danh mục với view clients.block.header
        View::composer('clients.block.header', function ($view) {
            $danhMucs = DanhMuc::all(); // Lấy tất cả danh mục
            $view->with('danhMucs', $danhMucs);
        });
        View::composer('layouts.client', function ($view) {
            $danhMucs = DanhMuc::all(); // Lấy tất cả danh mục
            $view->with('danhMucs', $danhMucs);
        });

        User::observe(NotificationObserver::class);
        DanhGiaSanPham::observe(NotificationObserver::class);
        HoaDon::observe(NotificationObserver::class);
        lien_hes::observe(NotificationObserver::class);
    }
}
