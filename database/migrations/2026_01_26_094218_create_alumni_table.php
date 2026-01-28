<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();

            // IDENTITAS ALUMNI
            $table->string('nama');

            // RELASI FAKULTAS
            $table->unsignedBigInteger('faculty_id');
            $table->foreign('faculty_id')
                  ->references('id')
                  ->on('faculties')
                  ->onDelete('cascade');

            // RELASI PRODI
            $table->unsignedBigInteger('prodi_id');
            $table->foreign('prodi_id')
                  ->references('id')
                  ->on('prodis')
                  ->onDelete('cascade');

            // DATA AKADEMIK
            $table->year('tahun_lulus')->nullable();

            // PEKERJAAN SAAT INI
            $table->string('perusahaan')->nullable();
            $table->string('jabatan')->nullable();

            // PESAN & KESAN
            $table->text('pesan_kesan')->nullable();

            // FOTO
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
