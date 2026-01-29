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
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama Dokumen (misal: Kalender Akademik 2024)
            $table->string('file_path'); // Lokasi file tersimpan
            
            // Kategori biar rapi
            $table->enum('category', ['akademik', 'kemahasiswaan', 'panduan', 'umum'])
                ->default('umum');
                
            $table->text('description')->nullable(); // Keterangan singkat (opsional)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
};
