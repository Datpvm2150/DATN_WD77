<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('danh_gia_san_phams', function (Blueprint $table) {
            // Xóa unique index (nếu có)
            $table->dropUnique('unique_review_per_order_item');
        });
    }

    public function down(): void
    {
        Schema::table('danh_gia_san_phams', function (Blueprint $table) {
            // Khôi phục unique
            $table->unique(['hoa_don_id', 'san_pham_id'], 'unique_review_per_order_item');
        });
    }
};

