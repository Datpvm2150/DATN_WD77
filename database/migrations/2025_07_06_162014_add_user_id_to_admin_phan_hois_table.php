<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAdminPhanHoisTable extends Migration
{
    public function up()
    {
        Schema::table('admin_phan_hois', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('lien_hes_id');
        });
    }

    public function down()
    {
        Schema::table('admin_phan_hois', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}