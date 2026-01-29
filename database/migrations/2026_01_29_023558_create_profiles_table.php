<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        
        // --- Bagian Sambutan Rektor ---
        $table->string('nama_rektor')->nullable();
        $table->string('foto_rektor')->nullable(); // Path foto rektor
        $table->longText('sambutan_rektor')->nullable(); // Teks sambutan panjang

        // --- Bagian Tentang Kampus ---
        $table->string('logo_path')->nullable();
        $table->longText('sejarah_kampus')->nullable();
        $table->longText('visi')->nullable();
        $table->longText('misi')->nullable();
        
        // --- Tambahan jika perlu ---
        $table->string('link_video_profil')->nullable(); // Misal ada link Youtube profil kampus
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
