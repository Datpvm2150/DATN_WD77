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
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->string('ma_khuyen_mai')->nullable()->after('giam_gia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
             $table->dropColumn('ma_khuyen_mai');
        });
    }
};
