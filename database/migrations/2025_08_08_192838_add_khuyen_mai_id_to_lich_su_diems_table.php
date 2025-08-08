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
        Schema::table('lich_su_diems', function (Blueprint $table) {
            $table->foreignId('khuyen_mai_id')->nullable()->after('user_id')->constrained('khuyen_mais')->nullOnDelete();
            $table->foreign('khuyen_mai_id')->references('id')->on('khuyen_mais')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lich_su_diems', function (Blueprint $table) {
            $table->dropForeign(['khuyen_mai_id']);
            $table->dropColumn('khuyen_mai_id');
        });
    }
};