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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            
            // --- Informasi Partner ---
            $table->string('name');
            $table->string('logo'); // Menyimpan path gambar/logo partner
            
            // --- Waktu (Timestamps) ---
            $table->timestamps(); // created_at & updated_at selalu di bawah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};