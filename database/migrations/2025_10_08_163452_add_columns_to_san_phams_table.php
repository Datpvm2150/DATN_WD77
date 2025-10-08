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
        Schema::table('san_phams', function (Blueprint $table) {
         $table->integer('trang_thai')->default(0)->after('mo_ta');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_phams', function (Blueprint $table) {
            $table->dropColumn(['trang_thai']);
        });
    }
};
