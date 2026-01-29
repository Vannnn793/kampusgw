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
    Schema::create('pmb_infos', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Contoh: "Gelombang 1 - Jalur Reguler"
        $table->string('slug');  // Contoh: gelombang-1-reguler
        
        // Deskripsi lengkap (Syarat, Biaya, Cara Daftar) - Pakai Summernote nanti
        $table->longText('content'); 
        
        $table->string('image')->nullable(); // Brosur/Poster jalur ini
        
        // Status Pendaftaran
        $table->boolean('is_active')->default(true); // True = Buka, False = Tutup
        
        // Link Eksternal (Kalau daftarnya di web pmb.kampus.ac.id)
        $table->string('registration_link')->nullable(); 
        
        // Tanggal Penting (Opsional, buat display countdown atau info)
        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();
        
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pmb_infos');
}
};
