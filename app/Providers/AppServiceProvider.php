<?php

namespace App\Providers;

use App\Models\DanhMuc;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
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
    }
}
