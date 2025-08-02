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
<<<<<<<< HEAD:database/migrations/2025_07_17_024454_create_notifications_table.php
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
========
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->string('ma_khuyen_mai')->nullable()->after('giam_gia');
>>>>>>>> bb8d0279ba687f0980a781abcc8e0ac657f25540:database/migrations/2025_07_16_231009_add_ma_khuyen_mai_to_hoa_dons_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2025_07_17_024454_create_notifications_table.php
        Schema::dropIfExists('notifications');
========
        Schema::table('hoa_dons', function (Blueprint $table) {
             $table->dropColumn('ma_khuyen_mai');
        });
>>>>>>>> bb8d0279ba687f0980a781abcc8e0ac657f25540:database/migrations/2025_07_16_231009_add_ma_khuyen_mai_to_hoa_dons_table.php
    }
};
