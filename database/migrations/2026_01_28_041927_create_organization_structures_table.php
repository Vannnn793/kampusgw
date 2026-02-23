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
        Schema::create('organization_structures', function (Blueprint $table) {
            $table->id();

            // --- Relasi (Foreign Key) ---
            $table->foreignId('faculty_id')
                  ->nullable() // Wajib nullable (buat Rektor/Admin/Pimpinan Univ)
                  ->constrained('faculties') // Nyambung ke tabel faculties
                  ->onDelete('set null'); // Kalau fakultas dihapus, datanya gak ilang tapi jadi null

            // --- Kategori & Peran ---
            $table->enum('category', ['pimpinan_univ', 'pimpinan_fakultas','pimpinan_prodi', 'dosen', 'staff'])
                  ->default('dosen'); // Kategori untuk filter tampilan
            
            // --- Informasi Personal ---
            $table->string('name');
            $table->string('nidn')->nullable(); // NIDN (Nomor Induk Dosen Nasional)
            $table->string('position'); // Jabatan (misal: Dekan, Kaprodi, Rektor)
            $table->string('photo')->nullable();
            $table->text('description')->nullable();

            // --- Pengaturan Tampilan ---
            $table->integer('order')->default(0); // Untuk urutan tampil di website

            // --- Waktu (Timestamps) ---
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_structures');
    }
};