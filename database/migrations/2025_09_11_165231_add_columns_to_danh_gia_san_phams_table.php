<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('danh_gia_san_phams', function (Blueprint $table) {
            

            $table->unsignedBigInteger('chi_tiet_hoa_don_id')->after('hoa_don_id');
            $table->foreign('chi_tiet_hoa_don_id')->references('id')->on('chi_tiet_hoa_dons')->onDelete('cascade');

            $table->unique(['user_id', 'hoa_don_id', 'chi_tiet_hoa_don_id', 'san_pham_id'], 'unique_review_per_order_item');
        });
    }

    public function down(): void
    {
        Schema::table('danh_gia_san_phams', function (Blueprint $table) {
            $table->dropForeign(['hoa_don_id']);
            $table->dropForeign(['chi_tiet_hoa_don_id']);
            $table->dropColumn(['hoa_don_id', 'chi_tiet_hoa_don_id']);
            $table->dropUnique('unique_review_per_order_item');
        });
    }

};