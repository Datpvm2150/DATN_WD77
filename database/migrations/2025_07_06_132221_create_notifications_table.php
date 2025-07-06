<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Loại thông báo: user, danh_gia, hoa_don, lien_he
            $table->unsignedBigInteger('data_id'); // ID của bản ghi tương ứng
            $table->boolean('is_read')->default(false); // Trạng thái đọc
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}