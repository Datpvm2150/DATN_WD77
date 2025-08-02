<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('diem_tich_luy')->default(0)->after("ten");
            });
        }

        public function down()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('diem_tich_luy');
            });
        }
};
