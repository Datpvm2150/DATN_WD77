<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->string('ten_san_pham')->nullable()->after('bien_the_san_pham_id');
        });
    }

    public function down(): void
    {
        Schema::table('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->dropColumn('ten_san_pham');
        });
    }
};