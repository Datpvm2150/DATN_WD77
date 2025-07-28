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
        Schema::table('khuyen_mais', function (Blueprint $table) {
            $table->string('loai_ma')->default('cong_khai')->after('da_su_dung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khuyen_mais', function (Blueprint $table) {
            $table->dropColumn('loai_ma');
        });
    }
};
