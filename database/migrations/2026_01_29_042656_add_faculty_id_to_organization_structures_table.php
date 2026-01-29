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
        // Perhatikan kita pakai 'Schema::table', BUKAN 'create'
        Schema::table('organization_structures', function (Blueprint $table) {
            
            // 1. Tambah Foreign Key ke tabel faculties
            // Ditaruh setelah 'id' biar rapi urutannya
            $table->foreignId('faculty_id')
                  ->nullable() // Wajib nullable (buat Rektor/Admin)
                  ->after('id') 
                  ->constrained('faculties') // Nyambung ke tabel faculties
                  ->onDelete('set null'); // Kalau fakultas dihapus, datanya gak ilang tapi jadi null

            // 2. Tambah NIDN (Nomor Induk Dosen)
            $table->string('nidn')->nullable()->after('name');

            // 3. Tambah Kategori (Penting buat filter tampilan)
            $table->enum('category', ['pimpinan_univ', 'pimpinan_fakultas', 'dosen', 'staff'])
                  ->default('dosen')
                  ->after('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organization_structures', function (Blueprint $table) {
            // Hapus foreign key dulu (format: nama_table_nama_kolom_foreign)
            $table->dropForeign(['faculty_id']);
            
            // Baru hapus kolom-kolomnya
            $table->dropColumn(['faculty_id', 'nidn', 'category']);
        });
    }
};