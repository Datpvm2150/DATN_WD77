<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('khuyen_mais', function (Blueprint $table) {
            if (!Schema::hasColumn('khuyen_mais', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('giam_toi_da');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }

            if (!Schema::hasColumn('khuyen_mais', 'so_luong')) {
                $table->integer('so_luong')->nullable()->after('user_id');
            }

            if (!Schema::hasColumn('khuyen_mais', 'da_su_dung')) {
                $table->integer('da_su_dung')->default(0)->after('so_luong');
            }
        });
    }

    public function down(): void
    {
        Schema::table('khuyen_mais', function (Blueprint $table) {
            if (Schema::hasColumn('khuyen_mais', 'user_id')) {
                try {
                    $table->dropForeign(['user_id']);
                } catch (\Throwable $e) {
                    // Ignore if foreign key doesn't exist
                }
                $table->dropColumn('user_id');
            }

            if (Schema::hasColumn('khuyen_mais', 'so_luong')) {
                $table->dropColumn('so_luong');
            }

            if (Schema::hasColumn('khuyen_mais', 'da_su_dung')) {
                $table->dropColumn('da_su_dung');
            }
        });
    }
};
