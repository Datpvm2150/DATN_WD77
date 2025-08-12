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
        Schema::table('khuyen_mais', function (Blueprint $table) {
            $table->integer('diem_can')->default(0)->after('loai_ma');
        });
    }

    public function down()
    {
        Schema::table('khuyen_mais', function (Blueprint $table) {
            $table->dropColumn(['diem_can']);
        });
    }
};
