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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // --- Bagian Informasi Utama Kampus ---
            $table->string('campus_name')->nullable();
            $table->string('tagline')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('gambar_kampus')->nullable(); // Gambar gedung samping kiri
            $table->longText('sejarah_kampus')->nullable();
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();

            // --- Bagian Sambutan Rektor ---
            $table->string('nama_rektor')->nullable();
            $table->string('foto_rektor')->nullable(); // Path foto rektor
            $table->longText('sambutan_rektor')->nullable(); // Teks sambutan panjang

            // --- Bagian Statistik Kampus ---
            $table->string('tahun_beroperasi')->nullable();
            $table->string('total_prodi')->nullable();
            $table->string('total_alumni')->nullable();
            $table->string('total_dosen')->nullable();
            $table->bigInteger('mahasiswa_aktif')->default(0);

            // --- Bagian Kontak dan Alamat ---
            $table->text('address')->nullable(); // Alamat fisik
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('gmaps_iframe')->nullable();
            
            // --- Bagian Sosial Media & Tautan ---
            $table->string('whatsapp_url')->nullable(); // <--- Tambahan Link WhatsApp
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('link_video_profil')->nullable(); // Link Youtube profil kampus
            
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