<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('danh_gia_san_phams', function (Blueprint $table) {
            // Cho phép null để tránh lỗi khi dữ liệu cũ không khớp
            $table->unsignedBigInteger('hoa_don_id')->nullable()->change();
            $table->unsignedBigInteger('chi_tiet_hoa_don_id')->nullable()->change();

            // Thêm foreign key
            $table->foreign('hoa_don_id')
                ->references('id')->on('hoa_dons')
                ->onDelete('set null');

            $table->foreign('chi_tiet_hoa_don_id')
                ->references('id')->on('chi_tiet_hoa_dons')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('danh_gia_san_phams', function (Blueprint $table) {
            $table->dropForeign(['hoa_don_id']);
            $table->dropForeign(['chi_tiet_hoa_don_id']);
        });
    }
};
