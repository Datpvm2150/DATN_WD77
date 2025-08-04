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
        Schema::create('doi_quas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('khuyen_mai_id')->constrained('khuyen_mais')->onDelete('cascade');
            $table->integer('diem_su_dung'); // Lưu lại số điểm đã trừ
            $table->timestamp('ngay_doi')->useCurrent();
            $table->string('trang_thai')->default('thanh_cong'); 
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doi_quas');
    }
};
