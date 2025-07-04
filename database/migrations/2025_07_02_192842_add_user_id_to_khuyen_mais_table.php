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
            $table->unsignedBigInteger('user_id')->nullable()->after('giam_toi_da');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('so_luong')->nullable()->after('user_id'); // Số lần được sử dụng tối đa
            $table->integer('da_su_dung')->default(0)->after('so_luong'); // Số lần đã được dùng
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khuyen_mais', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'so_luong', 'da_su_dung']);
        });
    }
};
