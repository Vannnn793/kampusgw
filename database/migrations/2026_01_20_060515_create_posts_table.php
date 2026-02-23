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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // --- Relasi (Foreign Key) ---
            $table->foreignId('category_id')
                  ->constrained() // Otomatis mencari tabel 'categories' dan kolom 'id'
                  ->cascadeOnDelete();

            // --- Informasi Utama Postingan ---
            $table->string('title');
            $table->boolean('is_slider')->default(false); // Penanda apakah post ini masuk slider
            $table->string('slider_title')->nullable();   // Judul khusus untuk slider (jika ada)
            $table->string('slug')->unique();             // URL unik untuk SEO
            $table->string('thumbnail')->nullable();
            $table->text('content');

            // --- Waktu (Timestamps) ---
            $table->timestamp('published_at')->nullable(); // Waktu publish (bisa untuk fitur draft/publish)
            $table->timestamps();                          // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};