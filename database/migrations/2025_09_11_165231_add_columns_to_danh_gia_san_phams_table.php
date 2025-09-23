<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('danh_gia_san_phams', function (Blueprint $table) {
            if (!Schema::hasColumn('danh_gia_san_phams', 'hoa_don_id')) {
                $table->bigInteger('hoa_don_id')->unsigned()->nullable()->after('san_pham_id');
                $table->foreign('hoa_don_id')->references('id')->on('hoa_dons')->onDelete('cascade');
            }

            if (!Schema::hasColumn('danh_gia_san_phams', 'chi_tiet_hoa_don_id')) {
                $table->unsignedBigInteger('chi_tiet_hoa_don_id')->nullable()->after('hoa_don_id');
                $table->foreign('chi_tiet_hoa_don_id')->references('id')->on('chi_tiet_hoa_dons')->onDelete('cascade');
            }
        });

        // check index tồn tại chưa trước khi thêm
        $indexExists = DB::select("
            SELECT COUNT(1) as cnt 
            FROM INFORMATION_SCHEMA.STATISTICS 
            WHERE table_schema = DATABASE() 
              AND table_name = 'danh_gia_san_phams' 
              AND index_name = 'unique_review_per_order_item'
        ");

        if ($indexExists[0]->cnt == 0) {
            Schema::table('danh_gia_san_phams', function (Blueprint $table) {
                $table->unique(
                    ['user_id', 'hoa_don_id', 'chi_tiet_hoa_don_id', 'san_pham_id'],
                    'unique_review_per_order_item'
                );
            });
        }
    }

    public function down(): void
    {
        Schema::table('danh_gia_san_phams', function (Blueprint $table) {
            if (Schema::hasColumn('danh_gia_san_phams', 'hoa_don_id')) {
                $table->dropForeign(['hoa_don_id']);
                $table->dropColumn('hoa_don_id');
            }

            if (Schema::hasColumn('danh_gia_san_phams', 'chi_tiet_hoa_don_id')) {
                $table->dropForeign(['chi_tiet_hoa_don_id']);
                $table->dropColumn('chi_tiet_hoa_don_id');
            }

            $table->dropUnique('unique_review_per_order_item');
        });
    }
};
