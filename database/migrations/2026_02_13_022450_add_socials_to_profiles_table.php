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
    Schema::table('profiles', function (Blueprint $table) {
        // Ganti 'profiles' dengan nama tabel setting kamu (misal: 'settings' atau 'schools')
        $table->string('facebook_url')->nullable();
        $table->string('instagram_url')->nullable();
        $table->string('youtube_url')->nullable();
        $table->string('twitter_url')->nullable();
        $table->string('tiktok_url')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
        });
    }
};
