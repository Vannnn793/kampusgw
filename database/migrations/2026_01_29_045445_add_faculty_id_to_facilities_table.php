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
        Schema::table('facilities', function (Blueprint $table) {
            // Kita taruh setelah ID biar rapi
            // Nullable artinya: kalau kosong berarti fasilitas umum (milik universitas)
            // Constrained: Relasi ke tabel faculties
            // Cascade: Kalau fakultas dihapus, fasilitasnya ikut kehapus
            $table->foreignId('faculty_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('faculties')
                  ->onDelete('cascade');
                  
            // Opsional: Tambah slug biar link-nya cantik (misal: /fasilitas/lab-komputer)
            $table->string('slug')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropForeign(['faculty_id']); // Hapus relasi dulu
            $table->dropColumn(['faculty_id', 'slug']); // Baru hapus kolom
        });
    }
};