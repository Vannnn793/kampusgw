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
        Schema::create('facility_tagline', function (Blueprint $table) {
            $table->id();
            // Hubungkan ke tabel facilities yg sudah ada
            $table->foreignId('facility_id')->constrained('facilities')->onDelete('cascade');
            // Hubungkan ke tabel taglines baru
            $table->foreignId('tagline_id')->constrained('taglines')->onDelete('cascade');
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_tagline');
    }
};
