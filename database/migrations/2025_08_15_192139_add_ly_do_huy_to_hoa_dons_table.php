<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLyDoHuyToHoaDonsTable extends Migration
{
    public function up()
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->text('ly_do_huy')->nullable()->after('ghi_chu');
        });
    }

    public function down()
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->dropColumn('ly_do_huy');
        });
    }
}