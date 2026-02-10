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
    Schema::create('taglines', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Contoh: "Free WiFi"
        $table->string('icon'); // Contoh: "bi bi-wifi"
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taglines');
    }
};
