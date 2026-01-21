<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();

            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_hp');

            $table->string('fakultas');
            $table->string('program_studi');

            $table->string('tahun_akademik'); // contoh: 2025/2026
            $table->year('tahun_masuk')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
