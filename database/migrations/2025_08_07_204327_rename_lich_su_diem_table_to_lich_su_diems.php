<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::rename('lich_su_diem', 'lich_su_diems');
    }

    public function down(): void
    {
        Schema::rename('lich_su_diems', 'lich_su_diem');
    }
};