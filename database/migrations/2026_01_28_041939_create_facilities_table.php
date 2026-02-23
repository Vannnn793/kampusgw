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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            
            // --- Relasi (Foreign Key) ---
            $table->foreignId('faculty_id')
                  ->nullable()
                  ->constrained('faculties') // Otomatis terhubung ke id di tabel faculties
                  ->onDelete('cascade');     // Jika data fakultas dihapus, fasilitas ini ikut terhapus
                  
            // --- Informasi Fasilitas ---
            $table->string('name');
            $table->string('slug')->nullable(); // Slug untuk URL cantik (misal: /fasilitas/lab-komputer)
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};