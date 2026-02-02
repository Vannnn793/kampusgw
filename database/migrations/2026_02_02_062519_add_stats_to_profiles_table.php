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
        // Kita pakai string biar bisa isi "15+" atau "1000+" (ada plus-nya)
        $table->string('tahun_beroperasi')->nullable()->after('misi');
        $table->string('total_prodi')->nullable()->after('tahun_beroperasi');
        $table->string('total_alumni')->nullable()->after('total_prodi');
        $table->string('total_dosen')->nullable()->after('total_alumni');
        
        // Kolom buat gambar gedung samping kiri
        $table->string('gambar_kampus')->nullable()->after('logo_path');
    });
}

public function down()
{
    Schema::table('profiles', function (Blueprint $table) {
        $table->dropColumn(['tahun_beroperasi', 'total_prodi', 'total_alumni', 'total_dosen', 'gambar_kampus']);
    });
}
};
